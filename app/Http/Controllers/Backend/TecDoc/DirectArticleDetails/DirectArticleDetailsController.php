<?php

namespace App\Http\Controllers\Backend\TecDoc\DirectArticleDetails;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DirectArticleDetailsController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        return view('backend.tecdoc-direct-article-details.index');
    }
}
