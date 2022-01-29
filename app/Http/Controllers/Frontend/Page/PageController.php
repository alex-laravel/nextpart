<?php


namespace App\Http\Controllers\Frontend\Page;


use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Contracts\View\View;

class PageController extends FrontendController
{
    /**
     * @return View
     */
    public function about()
    {
        return view('frontend.pages.about');
    }

    /**
     * @return View
     */
    public function contacts()
    {
        return view('frontend.pages.contacts');
    }

    /**
     * @return View
     */
    public function payment()
    {
        return view('frontend.pages.payment');
    }

    /**
     * @return View
     */
    public function delivery()
    {
        return view('frontend.pages.delivery');
    }

    /**
     * @return View
     */
    public function privacy()
    {
        return view('frontend.pages.privacy');
    }

    /**
     * @return View
     */
    public function terms()
    {
        return view('frontend.pages.terms');
    }

    /**
     * @return View
     */
    public function faq()
    {
        return view('frontend.pages.faq');
    }
}
