<?php

namespace App\Jobs\TecDoc;

use App\Models\TecDoc\DirectArticleDetails\DirectArticleDetails;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class DirectArticleDocumentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var integer
     */
    public $timeout = 259200;

    /**
     * @var integer
     */
    private $articleId;

    /**
     * @param integer $articleId
     * @return void
     */
    public function __construct($articleId)
    {
        $this->articleId = $articleId;
    }

    /**
     * @return void
     */
    public function handle()
    {
        ini_set('max_execution_time', 0);

        \Log::debug('===========================================================================');
        \Log::debug('STARTED QUEUE FOR DOCUMENT IN DIRECT ARTICLE ID [' . $this->articleId . ']');
        \Log::debug('===========================================================================');

        $directArticleDetails = DirectArticleDetails::where('articleId', $this->articleId)->first();

        if ($directArticleDetails) {
            try {
                $this->parseDirectArticleDocuments($directArticleDetails->articleId, $directArticleDetails->articleThumbnails, true);
                $this->parseDirectArticleDocuments($directArticleDetails->articleId, $directArticleDetails->articleDocuments);

                \Log::info('SUCCESS CREATION ASSETS for DIRECT ARTICLE ID [' . $directArticleDetails->id . ' / ' . $directArticleDetails->articleId . ']!');
            } catch (\Exception $exception) {
                \Log::debug('==================================================================================================================================================================================================================================');
                \Log::debug('!!!!!!!!!!!!!!!!!!!!CATCH EXCEPTION DIRECT ARTICLES DOCUMENT RESPONSE FOR articleId [' . $this->articleId . ']!');
                \Log::debug('==================================================================================================================================================================================================================================');

                throw $exception;
            }
        }

        unset($directArticleDetails);

        \Log::debug('===========================================================================');
        \Log::debug('FINISHED QUEUE FOR DOCUMENT IN DIRECT ARTICLE ID [' . $this->articleId . ']');
        \Log::debug('===========================================================================');
    }

    /**
     * @param integer $articleId
     * @param array $documents
     * @param bool $isThumbnail
     * @return bool
     */
    private function parseDirectArticleDocuments($articleId, $documents, $isThumbnail = false)
    {
        if (!is_array($documents)) {
            \Log::debug('EMPTY ASSETS for DIRECT ARTICLE ID [' . $articleId . ']!');
            return false;
        }

        if (empty($documents)) {
            \Log::debug('EMPTY ASSETS for DIRECT ARTICLE ID [' . $articleId . ']!');
            return false;
        }

        foreach ($documents as $document) {
            foreach ($document as $documentItem) {
                \Log::debug('GENERATION ASSETS for DIRECT ARTICLE ID [' . $articleId . ' / ' . ($isThumbnail ? $documentItem['thumbDocId'] : $documentItem['docId']) . ']!');

                Artisan::call('tecdoc:direct-articles-documents', [
                    'articleId' => $articleId,
                    'articleDocId' => $isThumbnail ? $documentItem['thumbDocId'] : $documentItem['docId'],
                    'articleDocTypeId' => $isThumbnail ? $documentItem['thumbTypeId'] : $documentItem['docTypeId'],
                    '--thumbnail' => $isThumbnail,
                ]);
            }
        }

        return true;
    }
}
