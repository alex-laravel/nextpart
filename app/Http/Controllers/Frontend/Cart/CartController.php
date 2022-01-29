<?php


namespace App\Http\Controllers\Frontend\Cart;


use App\Facades\Cart;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CartController extends FrontendController
{
    /**
     * @return View
     */
    public function cart()
    {
        return view('frontend.cart.index');
    }

    /**
     * @param integer $productId
     * @return RedirectResponse
     */
    public function add($productId)
    {
        Cart::addProduct($productId);

        return redirect()->back();
    }

    /**
     * @param integer $productId
     * @return RedirectResponse
     */
    public function remove($productId)
    {
        Cart::removeProduct($productId);

        return redirect()->back();
    }
}
