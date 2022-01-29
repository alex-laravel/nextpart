<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;

class TecDocDirectArticlesCommand extends TecDocCommand
{
    /**
     * @var string
     */
    protected $signature = 'tecdoc:direct-articles {linkingTargetType} {linkingTargetId} {assemblyGroupId}';

    /**
     * @var string
     */
    protected $description = 'Generate TecDoc Direct Articles';

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
        $linkingTargetType = $this->argument('linkingTargetType');
        $linkingTargetId = (int)$this->argument('linkingTargetId');
        $assemblyGroupId = (int)$this->argument('assemblyGroupId');

        \Log::debug('CALL COMMAND [tecdoc:direct-articles]');

        $response = Http::withHeaders([
            'X-Api-Key' => config('tecdoc.api.key'),
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0'
        ])->retry(5, 3)->post(config('tecdoc.api.url'), [
            'getArticleIdsWithState' => [
                'provider' => config('tecdoc.api.provider'),
                'lang' => config('tecdoc.api.language'),
                'articleCountry' => config('tecdoc.api.country'),
                'linkingTargetType' => $linkingTargetType,
                'linkingTargetId' => $linkingTargetId,
                'assemblyGroupNodeId' => $assemblyGroupId,
                'sort' => 2,
            ]
        ]);

        $this->line($response->body());

        unset($linkingTargetType);
        unset($linkingTargetId);
        unset($assemblyGroupId);
        unset($response);
    }
}
