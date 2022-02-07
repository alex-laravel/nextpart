<?php


namespace App\Http\Controllers\Backend\TecDoc\Manufacturer\Traits;


use App\Models\TecDoc\DirectArticleAnalog\DirectArticleAnalog;
use App\Models\TecDoc\DirectArticleDetails\DirectArticleDetails;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

trait ManufacturerDirectArticleAnalogsSynchronize
{
    /**
     * @return RedirectResponse
     */
    public function syncDirectArticleAnalogs()
    {
        ini_set('max_execution_time', 0);

//        DirectArticleAnalog::truncate();

        DirectArticleDetails::chunk(500, function ($directArticles) {
            foreach ($directArticles as $directArticle) {
                Artisan::call('tecdoc:direct-articles-analogs', [
                    'articleNumber' => $directArticle->articleNo,
                ]);

                $output = Artisan::output();
                $output = json_decode($output, true);

                if (!$this->hasSuccessResponse($output)) {
                    \Log::alert('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
                    \Log::alert('FAIL DIRECT ARTICLE ANALOGS RESPONSE FOR ID [' . $directArticle->id . '] AND articleNo [' . $directArticle->articleNo . ']!');
                    \Log::alert('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
                    \Log::alert($output);
                    continue;
                }

                $output = $this->getResponseDataAsArray($output);

                if (empty($output)) {
                    \Log::alert('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
                    \Log::alert('EMPTY DIRECT ARTICLE ANALOGS RESPONSE FOR ID [' . $directArticle->id . '] AND articleNo [' . $directArticle->articleNo . ']!');
                    \Log::alert('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
                    continue;
                }

                foreach ($output as &$directArticleAnalog) {
                    $directArticleAnalog['originalArticleId'] = $directArticle->articleId;
                    $directArticleAnalog['originalArticleNo'] = $directArticle->articleNo;
                }

                DirectArticleAnalog::insert($output);

                \Log::alert('DIRECT ARTICLE ANALOGS FOR ID [' . $directArticle->id . '] AND articleNo [' . $directArticle->articleNo . '] CREATED!');
            }
        });

        return redirect()->back();
    }
}
