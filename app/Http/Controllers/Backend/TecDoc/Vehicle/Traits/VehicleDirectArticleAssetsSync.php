<?php

namespace App\Http\Controllers\Backend\TecDoc\Vehicle\Traits;

use App\Models\TecDoc\DirectArticleDetails\DirectArticleDetails;
use App\Models\TecDoc\DirectArticleRegistry\DirectArticleRegistry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

trait VehicleDirectArticleAssetsSync
{
    /**
     * @param integer $vehicleId
     * @return RedirectResponse
     */
    public function syncDirectArticleAssets($vehicleId)
    {
        ini_set('max_execution_time', 0);

        DirectArticleRegistry::chunk(250, function ($directArticles) use ($vehicleId) {
            $directArticleIds = $directArticles->whereNull('article_documents_last_sync_at')->pluck('articleId')->toArray();

            $directArticlesDetails = DirectArticleDetails::whereIn('articleId', $directArticleIds)->get();

            foreach ($directArticlesDetails as $directArticleDetails) {
                $this->parseDirectArticleDocuments($vehicleId, $directArticleDetails->articleId, $directArticleDetails->articleThumbnails, true);
                $this->parseDirectArticleDocuments($vehicleId, $directArticleDetails->articleId, $directArticleDetails->articleDocuments);

                \Log::info('DIRECT ARTICLE DOCUMENTS for DIRECT ARTICLE ID [' . $directArticleDetails->id . ' / ' . $directArticleDetails->articleId . '] CREATED!');
            }

            DirectArticleRegistry::whereIn('articleId', $directArticleIds)->update(['article_documents_last_sync_at' => now()]);
        });

        return redirect()->back();
    }

    /**
     * @param integer $vehicleId
     * @param integer $articleId
     * @param array $documents
     * @param bool $isThumbnail
     * @return bool
     */
    private function parseDirectArticleDocuments($vehicleId, $articleId, $documents, $isThumbnail = false)
    {
        if (!is_array($documents)) {
            return false;
        }

        if (empty($documents)) {
            return false;
        }

        foreach ($documents as $document) {
            foreach ($document as $documentItem) {
                Artisan::call('tecdoc:direct-articles-documents', [
                    'vehicleId' => $vehicleId,
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
