<?php

namespace App\Http\Controllers\Backend\TecDoc\DirectArticle;

use App\Http\Controllers\Backend\TecDoc\TecDocController;
use Illuminate\Contracts\View\View;

class DirectArticleController extends TecDocController
{
    /**
     * @return View
     */
    public function index()
    {
        return view('backend.tecdoc-direct-articles.index');
    }
}
