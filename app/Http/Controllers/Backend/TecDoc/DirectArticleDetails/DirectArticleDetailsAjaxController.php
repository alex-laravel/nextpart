<?php

namespace App\Http\Controllers\Backend\TecDoc\DirectArticleDetails;

use App\Http\Controllers\Backend\TecDoc\TecDocController;
use App\Repositories\Backend\TecDoc\DirectArticleDetailsRepository;

class DirectArticleDetailsAjaxController extends TecDocController
{
    /**
     * @var DirectArticleDetailsRepository
     */
    protected $directArticleDetailsRepository;

    /**
     * @param DirectArticleDetailsRepository $directArticleDetailsRepository
     */
    public function __construct(DirectArticleDetailsRepository $directArticleDetailsRepository)
    {
        $this->directArticleDetailsRepository = $directArticleDetailsRepository;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->directArticleDetailsRepository->getData())->make(true);
    }
}
