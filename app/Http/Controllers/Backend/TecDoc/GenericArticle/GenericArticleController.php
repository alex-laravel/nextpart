<?php

namespace App\Http\Controllers\Backend\TecDoc\GenericArticle;

use App\Http\Controllers\Backend\TecDoc\TecDocController;
use App\Models\TecDoc\GenericArticle\GenericArticle;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class GenericArticleController extends TecDocController
{
    /**
     * @return View
     */
    public function index()
    {
        return view('backend.tecdoc-generic-articles.index');
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
     * @param \App\Models\TecDoc\GenericArticle\GenericArticle $genericArticle
     * @return \Illuminate\Http\Response
     */
    public function show(GenericArticle $genericArticle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TecDoc\GenericArticle\GenericArticle $genericArticle
     * @return \Illuminate\Http\Response
     */
    public function edit(GenericArticle $genericArticle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TecDoc\GenericArticle\GenericArticle $genericArticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GenericArticle $genericArticle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TecDoc\GenericArticle\GenericArticle $genericArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy(GenericArticle $genericArticle)
    {
        //
    }

    /**
     * @return RedirectResponse
     */
    public function sync()
    {
        ini_set('max_execution_time', 0);

        Artisan::call('tecdoc:generic-articles');

        $output = Artisan::output();
        $output = json_decode($output, true);

        if (!$this->hasSuccessResponse($output)) {
            \Log::alert('FAIL GENERIC ARTICLES RESPONSE!');
            return redirect()->back();
        }

        $output = $this->getResponseDataAsArray($output);

        if (empty($output)) {
            \Log::alert('EMPTY GENERIC ARTICLES RESPONSE!');
            return redirect()->back();
        }

        GenericArticle::truncate();

        foreach ($output as &$genericArticle) {
            if (!array_key_exists('genericArticleId', $genericArticle)) {
                $genericArticle['genericArticleId'] = null;
            }

            if (!array_key_exists('assemblyGroup', $genericArticle)) {
                $genericArticle['assemblyGroup'] = null;
            }

            if (!array_key_exists('designation', $genericArticle)) {
                $genericArticle['designation'] = null;
            }

            if (!array_key_exists('masterDesignation', $genericArticle)) {
                $genericArticle['masterDesignation'] = null;
            }

            if (!array_key_exists('usageDesignation', $genericArticle)) {
                $genericArticle['usageDesignation'] = null;
            }

            GenericArticle::create([
                'genericArticleId' => $genericArticle['genericArticleId'],
                'assemblyGroup' => $genericArticle['assemblyGroup'],
                'designation' => $genericArticle['designation'],
                'masterDesignation' => $genericArticle['masterDesignation'],
                'usageDesignation' => $genericArticle['usageDesignation']
            ]);

            \Log::info('GENERIC ARTICLES FOR GENERIC ARTICLE ID [' . $genericArticle['genericArticleId'] . '] CREATED!');
        }

//        GenericArticle::insert($output);

        return redirect()->back();
    }
}
