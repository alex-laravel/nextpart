<?php


namespace App\Http\Controllers\Locale;


use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    /**
     * @param string $locale
     * @return RedirectResponse
     */
    public function swap($locale)
    {
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
