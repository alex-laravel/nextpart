<?php

namespace App\Http\Controllers\Backend\TecDoc\Language;

use App\Http\Controllers\Controller;
use App\Models\TecDoc\Language;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class LanguageController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        return view('backend.tecdoc-languages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TecDoc\Language $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TecDoc\Language $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TecDoc\Language $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TecDoc\Language $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        //
    }

    /**
     * @return RedirectResponse
     */
    public function sync()
    {
        Artisan::call('tecdoc:languages');

        $output = Artisan::output();
        $output = json_decode($output, true);

        if (!$this->hasSuccessResponse($output)) {
            return redirect()->back();
        }

        $output = $this->getResponseDataAsArray($output);

        if (empty($output)) {
            return redirect()->back();
        }

        Language::truncate();
        Language::insert($output);

        return redirect()->back();
    }
}
