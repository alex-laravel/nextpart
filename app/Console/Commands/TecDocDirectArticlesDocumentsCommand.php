<?php

namespace App\Console\Commands;

use App\Models\TecDoc\DirectArticleDocument\DirectArticleDocument;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class TecDocDirectArticlesDocumentsCommand extends TecDocCommand
{
    const ARTICLE_DOCUMENTS_STORAGE_NAME = 'articles';

    /**
     * @var string
     */
    protected $signature = 'tecdoc:direct-articles-documents {vehicleId} {articleId} {articleDocId} {articleDocTypeId} {--thumbnail}';

    /**
     * @var string
     */
    protected $description = 'Sync TecDoc Direct Article Documents';

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return boolean
     */
    public function handle()
    {
        \Log::debug('CALL COMMAND [tecdoc:direct-articles-documents]');

        $vehicleId = (int)$this->argument('vehicleId');
        $articleId = (int)$this->argument('articleId');
        $articleDocId = $this->argument('articleDocId');
        $articleDocTypeId = (int)$this->argument('articleDocTypeId');
        $thumbnail = (int)$this->option('thumbnail');

        try {
            $responseDocument = Http::withHeaders(['X-Api-Key' => config('tecdoc.api.key')])
                ->retry(5, 3)
                ->get(config('tecdoc.asset.url') . '/' . config('tecdoc.api.provider') . '/' . $articleDocId . '/' . $thumbnail);
        } catch (\Exception $exception) {
            \Log::alert('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
            \Log::alert('FAIL DIRECT ARTICLE ASSETS RESPONSE FOR ID [' . $articleId . '] AND articleDocId [' . $articleDocId . ']!');
            \Log::alert($exception->getCode());
            \Log::alert($exception->getMessage());
            \Log::alert('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
            return false;
        }

        if ($responseDocument->ok()) {
            $documentName = $this->generateDirectArticleDocumentName($responseDocument->header('Content-Type'), $vehicleId, $articleId . $articleDocId . $thumbnail);

            DirectArticleDocument::create([
                'articleId' => $articleId,
                'articleDocId' => $articleDocId,
                'articleDocTypeId' => $articleDocTypeId,
                'assetDocumentName' => $documentName,
                'isThumbnail' => $thumbnail,
            ]);

            Storage::disk(self::ARTICLE_DOCUMENTS_STORAGE_NAME)->put($documentName, $responseDocument->body());
        }

        $this->line(true);
        return true;
    }

    /**
     * @param string $mimeType
     * @return string
     */
    private function getExtension($mimeType)
    {
        $extensions = [
            'image/gif' => 'gif',
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'audio/wav' => 'wav',
            'audio/mp3' => 'mp3',
            'audio/mp4' => 'mp4',
            'audio/mpeg' => 'mpeg',
            'application/pdf' => 'pdf',
            'application/msword' => 'doc',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx',
            'application/vnd.ms-excel' => 'xls',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx',
        ];

        return array_key_exists($mimeType, $extensions) ? $extensions[$mimeType] : 'tmp';

    }

    /**
     * @param string $header
     * @param integer $vehicleId
     * @param string $name
     * @return string
     */
    private function generateDirectArticleDocumentName($header, $vehicleId, $name)
    {
        return $vehicleId . '/' . md5($name) . '.' . $this->getExtension($header);
    }
}
