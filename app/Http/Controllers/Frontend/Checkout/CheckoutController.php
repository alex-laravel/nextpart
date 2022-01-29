<?php


namespace App\Http\Controllers\Frontend\Checkout;


use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Contracts\View\View;

class CheckoutController extends FrontendController
{
    /**
     * @return View
     */
    public function checkout()
    {
        return view('frontend.checkout.index');
    }
}
