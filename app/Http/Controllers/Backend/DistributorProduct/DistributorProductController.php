<?php

namespace App\Http\Controllers\Backend\DistributorProduct;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\DistributorProduct\DistributorProductImportRequest;
use App\Http\Requests\Backend\DistributorProduct\DistributorProductSyncRequest;
use App\Imports\DistributorProductImport;
use App\Models\Distributor\Distributor;
use App\Models\DistributorProduct\DistributorProduct;
use App\Models\TecDoc\DirectArticleDetails\DirectArticleDetails;
use App\Repositories\Backend\DistributorProducts\DistributorProductsRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class DistributorProductController extends Controller
{
    /**
     * @var DistributorProductsRepository
     */
    protected $distributorProductsRepository;

    /**
     * @param DistributorProductsRepository $distributorProductsRepository
     */
    public function __construct(DistributorProductsRepository $distributorProductsRepository)
    {
        $this->distributorProductsRepository = $distributorProductsRepository;
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('backend.distributor-products.index', [
            'distributorsList' => $this->prepareDistributorsList(),
        ]);
    }

    /**
     * @param DistributorProductImportRequest $request
     * @return View
     * @throws ValidationException
     */
    public function import(DistributorProductImportRequest $request)
    {
        ini_set('max_execution_time', 0);

        $distributorId = (int)$request->input('distributor_id');
        $distributorFile = $request->file('distributor_file');

        $distributor = Distributor::find($distributorId);
        $distributorStorageIds = $distributor->storages()->orderBy('import_sequence_number')->get()->pluck('id')->toArray();

        return DistributorProductImport::handle($distributor, $distributorStorageIds, $distributorFile)
            ? back()->withFlashSuccess(trans('alerts.backend.distributor_products.imported'))
            : back()->withFlashDanger(trans('exceptions.backend.distributor_products.import_error'));
    }

    /**
     * @param DistributorProductSyncRequest $request
     * @return RedirectResponse
     */
    public function sync(DistributorProductSyncRequest $request)
    {
        ini_set('max_execution_time', 0);

        $distributor = Distributor::find((int)$request->input('distributor_id'));
        $distributorStorageIds = $distributor->storages()->get()->pluck('id')->toArray();

        DistributorProduct::whereIn('distributor_storage_id', $distributorStorageIds)->chunk(500, function ($distributorProducts) {
            foreach ($distributorProducts as $distributorProduct) {
                $articleDetails = DirectArticleDetails::where('articleNo', $distributorProduct->product_original_no)->first();

                $distributorProduct->has_tecdoc_article = !is_null($articleDetails);
                $distributorProduct->tecdoc_article_id = $articleDetails ? $articleDetails->articleId : null;
                $distributorProduct->save();

                \Log::debug('SYNC PRODUCT WITH ID [' . $distributorProduct->id . '] COMPLETED');
            }
        });

        return redirect()->back();
    }

    /**
     * @return array
     */
    private function prepareDistributorsList()
    {
        $distributorsList[0] = ' - Select One - ';

        $distributors = Distributor::orderBy('title')->get();

        foreach ($distributors as $distributor) {
            $distributorStorageIds = $distributor->storages()->pluck('id')->toArray();

            if (empty($distributorStorageIds)) {
                continue;
            }

            $distributorProductsCount = DistributorProduct::whereIn('distributor_storage_id', $distributorStorageIds)->count();
            $distributorProductsHasTecDocArticleCount = DistributorProduct::whereIn('distributor_storage_id', $distributorStorageIds)->onlyHasTecDocArticle()->count();

            $distributorsList[$distributor->id] = $distributor->title . ' (' . $distributorProductsCount . '/' . $distributorProductsHasTecDocArticleCount . ' ' . trans('strings.backend.distributor_products.products') . ')';
        }

        return $distributorsList;
    }
}
