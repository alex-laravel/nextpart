<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Facades\Garage;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Contracts\View\View;

class AccountController extends FrontendController
{
    const ORDERS_HISTORY_ITEMS_PER_PAGE = 5;
    const ORDERS_HISTORY_ITEMS_LIMIT = 3;

    /**
     * @return View
     */
    public function dashboard()
    {
        return view('frontend.account.dashboard', [
            'orders' => auth()->user()->orders()->latest()->skip(0)->take(self::ORDERS_HISTORY_ITEMS_LIMIT)->get()
        ]);
    }

    /**
     * @return View
     */
    public function garage()
    {
        return view('frontend.account.garage', [
            'garageVehicles' => Garage::getVehicles()
        ]);
    }

    /**
     * @return View
     */
    public function orders()
    {
        return view('frontend.account.orders', [
            'orders' => auth()->check() ? auth()->user()->orders()->latest()->paginate(self::ORDERS_HISTORY_ITEMS_PER_PAGE) : []
        ]);
    }
}
