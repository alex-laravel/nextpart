<?php


namespace App\Console\Commands;


use Illuminate\Support\Facades\Http;

class TecDocDirectArticlesDetailsCommand extends TecDocCommand
{
    /**
     * @var string
     */
    protected $signature = 'tecdoc:direct-articles-details {articleIds*}';

    /**
     * @var string
     */
    protected $description = 'Generate TecDoc Direct Articles Details';

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
        $articleIds = $this->argument('articleIds');

        \Log::debug('CALL COMMAND [tecdoc:direct-articles-details]');

        $response = Http::withHeaders(['X-Api-Key' => config('tecdoc.api.key')])->post(config('tecdoc.api.url'), [
            'getDirectArticlesByIds6' => [
                'provider' => config('tecdoc.api.provider'),
                'lang' => config('tecdoc.api.language'),
                'articleCountry' => config('tecdoc.api.country'),
                'attributs' => true,
                'basicData' => true,
                'documents' => true,
                'eanNumbers' => true,
                'immediateAttributs' => true,
                'immediateInfo' => true,
                'info' => true,
                'mainArticles' => true,
                'normalAustauschPrice' => false,
                'oeNumbers' => true,
                'prices' => true,
                'replacedByNumbers' => true,
                'replacedNumbers' => true,
                'thumbnails' => true,
                'usageNumbers' => true,
                'articleId' => [
                    'array' => $articleIds
                ]
            ]
        ]);

        $this->line($response->body());

        unset($articleIds);
        unset($response);
    }
}
