<?php

namespace App\Http\Controllers\Backend\TecDoc\Vehicle\Traits;

use App\Models\TecDoc\DirectArticleAnalog\DirectArticleAnalog;
use App\Models\TecDoc\DirectArticleDetails\DirectArticleDetails;
use App\Models\TecDoc\DirectArticleRegistry\DirectArticleRegistry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

trait VehicleDirectArticleAnalogsSync
{
    /**
     * @param integer $vehicleId
     * @return RedirectResponse
     */
    public function syncDirectArticleAnalogs($vehicleId)
    {
        ini_set('max_execution_time', 0);

        DirectArticleRegistry::chunk(250, function ($directArticles) use ($vehicleId) {
            $directArticleIds = $directArticles->whereNull('article_analogs_last_sync_at')->pluck('articleId')->toArray();

            $directArticlesDetails = DirectArticleDetails::whereIn('articleId', $directArticleIds)->get();

            foreach ($directArticlesDetails as $directArticleDetails) {
                Artisan::call('tecdoc:direct-articles-analogs', [
                    'articleNumber' => $directArticleDetails->articleNo,
                ]);

                $output = Artisan::output();
                $output = json_decode($output, true);

                if (!$this->hasSuccessResponse($output)) {
                    \Log::alert('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
                    \Log::alert('FAIL DIRECT ARTICLE ANALOGS RESPONSE FOR ID [' . $directArticleDetails->id . '] AND articleNo [' . $directArticleDetails->articleNo . ']!');
                    \Log::alert('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
                    \Log::alert($output);
                    continue;
                }

                $output = $this->getResponseDataAsArray($output);

                if (empty($output)) {
                    \Log::alert('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
                    \Log::alert('EMPTY DIRECT ARTICLE ANALOGS RESPONSE FOR ID [' . $directArticleDetails->id . '] AND articleNo [' . $directArticleDetails->articleNo . ']!');
                    \Log::alert('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
                    continue;
                }

                foreach ($output as &$directArticleAnalog) {
                    $directArticleAnalog['originalArticleId'] = $directArticleDetails->articleId;
                    $directArticleAnalog['originalArticleNo'] = $directArticleDetails->articleNo;
                }

                DirectArticleAnalog::insert($output);

                \Log::alert('DIRECT ARTICLE ANALOGS FOR ID [' . $directArticleDetails->id . '] AND articleNo [' . $directArticleDetails->articleNo . '] CREATED!');
            }

            DirectArticleRegistry::whereIn('articleId', $directArticleIds)->update(['article_analogs_last_sync_at' => now()]);
        });

        return redirect()->back();
    }
}
