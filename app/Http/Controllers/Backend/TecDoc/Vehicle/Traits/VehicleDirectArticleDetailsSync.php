<?php


namespace App\Http\Controllers\Backend\TecDoc\Vehicle\Traits;

use App\Models\TecDoc\DirectArticleDetails\DirectArticleDetails;
use App\Models\TecDoc\DirectArticleRegistry\DirectArticleRegistry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

trait VehicleDirectArticleDetailsSync
{
    /**
     * @param integer $vehicleId
     * @return RedirectResponse
     */
    public function syncDirectArticleDetails($vehicleId)
    {
        ini_set('max_execution_time', 0);

        DirectArticleRegistry::chunk(250, function ($directArticles) {
            $directArticleIds = $directArticles->whereNull('article_details_last_sync_at')->pluck('articleId')->toArray();

            foreach (array_chunk($directArticleIds, 15) as $directArticleIdsChunk) {
                Artisan::call('tecdoc:direct-articles-details', [
                    'articleIds' => $directArticleIdsChunk,
                ]);

                $output = Artisan::output();
                $output = json_decode($output, true);

                if (!$this->hasSuccessResponse($output)) {
                    \Log::alert('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
                    \Log::alert('FAIL DIRECT ARTICLE DETAILS RESPONSE FOR IDS [' . implode(", ", $directArticleIdsChunk) . ']!');
                    \Log::alert('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
                    \Log::alert($output);
                    continue;
                }

                $output = $this->getResponseDataAsArray($output);

                if (empty($output)) {
                    \Log::alert('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
                    \Log::alert('EMPTY DIRECT ARTICLE DETAILS RESPONSE FOR IDS [' . implode(", ", $directArticleIdsChunk) . ']!');
                    \Log::alert('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
                    continue;
                }

                $details = [];
                $articleIdsSynced = [];

                foreach ($output as $articleDetails) {
                    $detailsItem['articleId'] = $articleDetails['directArticle']['articleId'];
                    $detailsItem['articleName'] = $articleDetails['directArticle']['articleName'];
                    $detailsItem['articleNo'] = $articleDetails['directArticle']['articleNo'];
                    $detailsItem['articleState'] = $articleDetails['directArticle']['articleState'];
                    $detailsItem['articleStateName'] = $articleDetails['directArticle']['articleStateName'];
                    $detailsItem['brandName'] = $articleDetails['directArticle']['brandName'];
                    $detailsItem['brandNo'] = $articleDetails['directArticle']['brandNo'];
                    $detailsItem['genericArticleId'] = $articleDetails['directArticle']['genericArticleId'];
                    $detailsItem['flagAccessories'] = $articleDetails['directArticle']['flagAccessories'];
                    $detailsItem['flagCertificationCompulsory'] = $articleDetails['directArticle']['flagCertificationCompulsory'];
                    $detailsItem['flagRemanufacturedPart'] = $articleDetails['directArticle']['flagRemanufacturedPart'];
                    $detailsItem['flagSuitedforSelfService'] = $articleDetails['directArticle']['flagSuitedforSelfService'];
                    $detailsItem['hasAppendage'] = $articleDetails['directArticle']['hasAppendage'];
                    $detailsItem['hasAxleLink'] = $articleDetails['directArticle']['hasAxleLink'];
                    $detailsItem['hasCsGraphics'] = $articleDetails['directArticle']['hasCsGraphics'];
                    $detailsItem['hasDocuments'] = $articleDetails['directArticle']['hasDocuments'];
                    $detailsItem['hasLessDiscount'] = $articleDetails['directArticle']['hasLessDiscount'];
                    $detailsItem['hasMarkLink'] = $articleDetails['directArticle']['hasMarkLink'];
                    $detailsItem['hasMotorLink'] = $articleDetails['directArticle']['hasMotorLink'];
                    $detailsItem['hasOEN'] = $articleDetails['directArticle']['hasOEN'];
                    $detailsItem['hasPartList'] = $articleDetails['directArticle']['hasPartList'];
                    $detailsItem['hasPrices'] = $articleDetails['directArticle']['hasPrices'];
                    $detailsItem['hasSecurityInfo'] = $articleDetails['directArticle']['hasSecurityInfo'];
                    $detailsItem['hasUsage'] = $articleDetails['directArticle']['hasUsage'];
                    $detailsItem['hasVehicleLink'] = $articleDetails['directArticle']['hasVehicleLink'];
                    $detailsItem['articleAttributes'] = json_encode($articleDetails['articleAttributes']);
                    $detailsItem['articleThumbnails'] = json_encode($articleDetails['articleThumbnails']);
                    $detailsItem['articleDocuments'] = json_encode($articleDetails['articleDocuments']);
                    $detailsItem['articleInfo'] = json_encode($articleDetails['articleInfo']);
                    $detailsItem['articlePrices'] = json_encode($articleDetails['articlePrices']);
                    $detailsItem['eanNumber'] = json_encode($articleDetails['eanNumber']);
                    $detailsItem['immediateAttributs'] = json_encode($articleDetails['immediateAttributs']);
                    $detailsItem['immediateInfo'] = json_encode($articleDetails['immediateInfo']);
                    $detailsItem['mainArticle'] = json_encode($articleDetails['mainArticle']);
                    $detailsItem['oenNumbers'] = json_encode($articleDetails['oenNumbers']);
                    $detailsItem['usageNumbers2'] = json_encode($articleDetails['usageNumbers2']);
                    $detailsItem['replacedByNumber'] = json_encode($articleDetails['replacedByNumber']);
                    $detailsItem['replacedNumber'] = json_encode($articleDetails['replacedNumber']);

                    $details[] = $detailsItem;
                    $articleIdsSynced[] = $detailsItem['articleId'];
                }

                DirectArticleDetails::insert($details);
                DirectArticleRegistry::whereIn('articleId', $articleIdsSynced)->update(['article_details_last_sync_at' => now()]);

                \Log::alert('DIRECT ARTICLE DETAILS FOR IDS [' . implode(", ", $directArticleIdsChunk) . '] CREATED!');
            }
        });

        return redirect()->back();
    }
}
