<?php

namespace App\Http\Controllers\Backend\TecDoc\DirectArticleAnalogs;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\TecDoc\DirectArticleAnalogRepository;
use Illuminate\Http\Request;

class DirectArticleAnalogsAjaxController extends Controller
{
    /**
     * @var DirectArticleAnalogRepository
     */
    protected $directArticleAnalogRepository;

    /**
     * @param DirectArticleAnalogRepository $directArticleAnalogRepository
     */
    public function __construct(DirectArticleAnalogRepository $directArticleAnalogRepository)
    {
        $this->directArticleAnalogRepository = $directArticleAnalogRepository;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->directArticleAnalogRepository->getData())->make(true);
    }
}
