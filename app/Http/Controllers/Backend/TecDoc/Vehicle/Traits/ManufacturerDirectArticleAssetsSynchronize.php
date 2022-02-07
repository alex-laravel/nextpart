<?php


namespace App\Http\Controllers\Backend\TecDoc\Manufacturer\Traits;


use App\Models\TecDoc\DirectArticleDetails\DirectArticleDetails;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

trait ManufacturerDirectArticleAssetsSynchronize
{
    /**
     * @return RedirectResponse
     */
    public function syncDirectArticleAssets()
    {
        ini_set('max_execution_time', 0);

//        DirectArticleDocument::truncate();

        DirectArticleDetails::chunk(500, function ($directArticlesDetails) {
            foreach ($directArticlesDetails as $directArticleDetails) {
                $this->parseDirectArticleDocuments($directArticleDetails->articleId, $directArticleDetails->articleThumbnails, true);
                $this->parseDirectArticleDocuments($directArticleDetails->articleId, $directArticleDetails->articleDocuments);

                \Log::info('ASSETS CREATED for DIRECT ARTICLE ID [' . $directArticleDetails->id . ' / ' . $directArticleDetails->articleId . ']!');
            }
        });

        return redirect()->back();
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
            return false;
        }

        if (empty($documents)) {
            return false;
        }

        foreach ($documents as $document) {
            foreach ($document as $documentItem) {
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
