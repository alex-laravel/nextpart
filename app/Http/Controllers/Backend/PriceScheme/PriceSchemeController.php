<?php

namespace App\Http\Controllers\Backend\PriceScheme;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PriceScheme\PriceSchemeStoreRequest;
use App\Http\Requests\Backend\PriceScheme\PriceSchemeUpdateRequest;
use App\Models\PriceScheme\PriceScheme;
use App\Repositories\Backend\PriceSchemes\PriceSchemesRepository;
use Illuminate\Contracts\View\View;

class PriceSchemeController extends Controller
{
    /**
     * @var PriceSchemesRepository
     */
    protected $priceSchemesRepository;

    /**
     * @param PriceSchemesRepository $priceSchemesRepository
     */
    public function __construct(PriceSchemesRepository $priceSchemesRepository)
    {
        $this->priceSchemesRepository = $priceSchemesRepository;
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('backend.price-schemes.index');
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('backend.price-schemes.create');
    }

    /**
     * @param PriceSchemeStoreRequest  $request
     * @return View
     */
    public function store(PriceSchemeStoreRequest $request)
    {
        $this->priceSchemesRepository->create($request->only([
            'price_from',
            'price_to',
            'percentage'
        ]));

        return view('backend.price-schemes.index')->withFlashSuccess(trans('alerts.backend.price_schemes.created'));
    }

    /**
     * @param PriceScheme $priceScheme
     * @return View
     */
    public function show(PriceScheme $priceScheme)
    {
        return view('backend.price-schemes.show', [
            'priceScheme' => $priceScheme
        ]);
    }

    /**
     * @param PriceScheme $priceScheme
     * @return View
     */
    public function edit(PriceScheme $priceScheme)
    {
        return view('backend.price-schemes.edit', [
            'priceScheme' => $priceScheme
        ]);
    }

    /**
     * @param PriceSchemeUpdateRequest $request
     * @param PriceScheme $priceScheme
     * @return View
     */
    public function update(PriceSchemeUpdateRequest $request, PriceScheme $priceScheme)
    {
        $this->priceSchemesRepository->update($priceScheme, $request->only([
            'price_from',
            'price_to',
            'percentage'
        ]));

        return view('backend.price-schemes.index')->withFlashSuccess(trans('alerts.backend.price_schemes.updated'));
    }

    /**
     * @param PriceScheme $priceScheme
     * @return View
     */
    public function destroy(PriceScheme $priceScheme)
    {
        $this->priceSchemesRepository->delete($priceScheme);

        return back()->withFlashSuccess(trans('alerts.backend.price_schemes.deleted'));
    }
}
