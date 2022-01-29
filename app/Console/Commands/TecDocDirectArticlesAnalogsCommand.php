<?php


namespace App\Console\Commands;


use Illuminate\Support\Facades\Http;

class TecDocDirectArticlesAnalogsCommand extends TecDocCommand
{
    /**
     * @var string
     */
    protected $signature = 'tecdoc:direct-articles-analogs {articleNumber}';

    /**
     * @var string
     */
    protected $description = 'Generate TecDoc Direct Articles Analogs';

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return void
     */
    public function handle()
    {
        $articleNumber = $this->argument('articleNumber');

        \Log::debug('CALL COMMAND [tecdoc:direct-articles-state]');

        $response = Http::withHeaders(['X-Api-Key' => config('tecdoc.api.key')])->post(config('tecdoc.api.url'), [
            'getArticleDirectSearchAllNumbersWithState' => [
                'provider' => config('tecdoc.api.provider'),
                'lang' => config('tecdoc.api.language'),
                'articleCountry' => config('tecdoc.api.country'),
                'articleNumber' => $articleNumber,
                'numberType' => 3,
                'searchExact' => true,
            ]
        ]);

        $this->line($response->body());
    }
}
