<?php

namespace App\Http\Controllers\Backend\TecDoc\DirectArticleAnalogs;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DirectArticleAnalogsController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        return view('backend.tecdoc-direct-article-analogs.index');
    }
}
