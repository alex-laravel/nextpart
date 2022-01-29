<?php

namespace App\Http\Controllers\Backend\TecDoc\GenericArticle;

use App\Http\Controllers\Backend\TecDoc\TecDocController;
use App\Repositories\Backend\TecDoc\GenericArticleRepository;

class GenericArticleAjaxController extends TecDocController
{
    /**
     * @var GenericArticleRepository
     */
    protected $genericArticleRepository;

    /**
     * @param GenericArticleRepository $genericArticleRepository
     */
    public function __construct(GenericArticleRepository $genericArticleRepository)
    {
        $this->genericArticleRepository = $genericArticleRepository;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->genericArticleRepository->getData())->make(true);
    }
}
