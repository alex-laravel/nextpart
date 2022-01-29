<?php

namespace App\Console\Commands;

use App\Jobs\TecDoc\DirectArticleDocumentJob;
use App\Models\TecDoc\DirectArticleDetails\DirectArticleDetails;
use Illuminate\Console\Command;

class TecDocDirectArticlesDocumentQueueCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'tecdoc:direct-articles-document-queue';

    /**
     *
     * @var string
     */
    protected $description = 'Create TecDoc Direct Articles Document Queue';

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     * @return void
     */
    public function handle()
    {
        ini_set('max_execution_time', 0);

        $index = 3488500;

        DirectArticleDetails::where('id', '>', 3488500)->chunk(500, function ($directArticlesChunk) use (&$index) {
//        DirectArticleDetails::chunk(500, function ($directArticlesChunk) use (&$index) {
            foreach ($directArticlesChunk as $directArticle) {
                DirectArticleDocumentJob::dispatch($directArticle->articleId);

                ++$index;

                \Log::debug('PUSHED JOB FOR ID [' . $index . '] DIRECT ARTICLE DETAILS ID [' . $directArticle->articleId . '].');
            }
        });
    }
}
