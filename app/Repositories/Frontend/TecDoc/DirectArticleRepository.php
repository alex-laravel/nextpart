<?php


namespace App\Repositories\Frontend\TecDoc;


use App\Models\TecDoc\DirectArticleDetails\DirectArticleDetails;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DirectArticleRepository extends BaseRepository
{
    /**
     * @param integer $directArticleId
     * @return Model
     */
    public function getDirectArticleByArticleIdWithDocumentsWithProducts($directArticleId)
    {
        return DirectArticleDetails::where('articleId', (int)$directArticleId)->first();
    }

    /**
     * @param integer $packageLimit
     * @param string $directArticleNo
     * @return LengthAwarePaginator
     */
    public function getDirectArticleByArticleNoWithDocumentsWithProducts($directArticleNo, $packageLimit = 10)
    {
        return DirectArticleDetails::with('documents')
            ->with('products')
            ->where('articleNo', $directArticleNo)
            ->paginate($packageLimit);
    }

    /**
     * @param integer $carId
     * @param boolean $filterApplied
     * @param array $filterBrands
     * @param integer $filterPriceMin
     * @param integer $filterPriceMax
     * @param integer $packageLimit
     * @return LengthAwarePaginator
     */
    public function getDirectArticlesByVehicleIdPaginated($carId, $filterApplied, $filterBrands, $filterPriceMin, $filterPriceMax, $packageLimit = 10)
    {
        return DB::table('td_cross_direct_article_vehicle')
            ->join('td_direct_article_details', 'td_cross_direct_article_vehicle.articleId', '=', 'td_direct_article_details.articleId')
            ->leftJoin('td_direct_article_documents', function ($query) {
                $query->on('td_cross_direct_article_vehicle.articleId', '=', 'td_direct_article_documents.articleId')
                    ->where('td_direct_article_documents.isThumbnail', true)
                    ->where('td_direct_article_documents.id', '=', DB::raw("(select MIN(id) from td_direct_article_documents where articleId = td_cross_direct_article_vehicle.articleId)"));
            })
            ->leftJoin('sh_distributor_products', function ($query) {
                $query->on('td_cross_direct_article_vehicle.articleId', '=', 'sh_distributor_products.tecdoc_article_id')
                    ->where('sh_distributor_products.id', '=', DB::raw("(select id from sh_distributor_products where tecdoc_article_id = td_cross_direct_article_vehicle.articleId ORDER BY price ASC, quantity DESC LIMIT 1)"))
                    ->where('quantity', '>', 0);
            })
            ->select([
                'td_direct_article_details.id',
                'td_direct_article_details.articleId',
                'td_direct_article_details.articleName',
                'td_direct_article_details.articleNo',
                'td_direct_article_details.brandNo',
                'td_direct_article_details.articleAttributes',
                'td_direct_article_documents.assetDocumentName',
                'sh_distributor_products.id as productId',
                'sh_distributor_products.price',
            ])
            ->where('td_cross_direct_article_vehicle.carId', (int)$carId)
            ->when($filterApplied && !empty($filterBrands), function ($query) use ($filterBrands) {
                return $query
                    ->whereIn('td_direct_article_details.brandNo', $filterBrands);
            })
            ->when($filterApplied, function ($query) use ($filterPriceMin, $filterPriceMax) {
                return $query
                    ->where('sh_distributor_products.price', '>=', $filterPriceMin)
                    ->where('sh_distributor_products.price', '<=', $filterPriceMax);
            })
            ->paginate($packageLimit);
    }

    /**
     * @param array $assemblyGroupNodeIds
     * @param array $activeVehicle
     * @param boolean $filterApplied
     * @param array $filterBrands
     * @param integer $filterPriceMin
     * @param integer $filterPriceMax
     * @param integer $packageLimit
     * @return LengthAwarePaginator
     */
    public function getDirectArticlesByAssemblyIdsPaginated($assemblyGroupNodeIds, $activeVehicle, $filterApplied = false, $filterBrands = [], $filterPriceMin = null, $filterPriceMax = null, $packageLimit = 10)
    {
        return $activeVehicle ? DB::table('td_cross_direct_article_assembly_group')
            ->join('td_direct_article_details', 'td_cross_direct_article_assembly_group.articleId', '=', 'td_direct_article_details.articleId')
            ->join('td_cross_direct_article_vehicle', function ($query) use ($activeVehicle) {
                $query->on('td_direct_article_details.articleId', '=', 'td_cross_direct_article_vehicle.articleId')
                    ->where('td_cross_direct_article_vehicle.carId', $activeVehicle['vehicleId']);
            })
            ->leftJoin('td_direct_article_documents', function ($query) {
                $query->on('td_cross_direct_article_assembly_group.articleId', '=', 'td_direct_article_documents.articleId')
                    ->where('td_direct_article_documents.isThumbnail', true)
                    ->where('td_direct_article_documents.id', '=', DB::raw("(select MIN(id) from td_direct_article_documents where articleId = td_cross_direct_article_assembly_group.articleId)"));
            })
            ->leftJoin('sh_distributor_products', function ($query) {
                $query->on('td_cross_direct_article_assembly_group.articleId', '=', 'sh_distributor_products.tecdoc_article_id')
                    ->where('sh_distributor_products.id', '=', DB::raw("(select id from sh_distributor_products where tecdoc_article_id = td_cross_direct_article_assembly_group.articleId ORDER BY price ASC, quantity DESC LIMIT 1)"))
                    ->where('quantity', '>', 0);
            })
            ->select([
                'td_direct_article_details.id',
                'td_direct_article_details.articleId',
                'td_direct_article_details.articleName',
                'td_direct_article_details.articleNo',
                'td_direct_article_details.brandNo',
                'td_direct_article_details.articleAttributes',
                'td_direct_article_documents.assetDocumentName',
                'sh_distributor_products.id as productId',
                'sh_distributor_products.price',
            ])
            ->whereIn('td_cross_direct_article_assembly_group.assemblyGroupNodeId', $assemblyGroupNodeIds)
            ->when($filterApplied, function ($query) use ($filterPriceMin, $filterPriceMax) {
                return $query
                    ->where('sh_distributor_products.price', '>=', $filterPriceMin)
                    ->where('sh_distributor_products.price', '<=', $filterPriceMax);
            })
            ->when($filterApplied && !empty($filterBrands), function ($query) use ($filterBrands) {
                return $query
                    ->whereIn('td_direct_article_details.brandNo', $filterBrands);
            })
            ->paginate($packageLimit)

            : DB::table('td_cross_direct_article_assembly_group')
                ->join('td_direct_article_details', 'td_cross_direct_article_assembly_group.articleId', '=', 'td_direct_article_details.articleId')
                ->leftJoin('td_direct_article_documents', function ($query) {
                    $query->on('td_cross_direct_article_assembly_group.articleId', '=', 'td_direct_article_documents.articleId')
                        ->where('td_direct_article_documents.isThumbnail', true)
                        ->where('td_direct_article_documents.id', '=', DB::raw("(select MIN(id) from td_direct_article_documents where articleId = td_cross_direct_article_assembly_group.articleId)"));
                })
                ->leftJoin('sh_distributor_products', function ($query) {
                    $query->on('td_cross_direct_article_assembly_group.articleId', '=', 'sh_distributor_products.tecdoc_article_id')
                        ->where('sh_distributor_products.id', '=', DB::raw("(select id from sh_distributor_products where tecdoc_article_id = td_cross_direct_article_assembly_group.articleId ORDER BY price ASC, quantity DESC LIMIT 1)"))
                        ->where('quantity', '>', 0);
                })
                ->select([
                    'td_direct_article_details.id',
                    'td_direct_article_details.articleId',
                    'td_direct_article_details.articleName',
                    'td_direct_article_details.articleNo',
                    'td_direct_article_details.brandNo',
                    'td_direct_article_details.articleAttributes',
                    'td_direct_article_documents.assetDocumentName',
                    'sh_distributor_products.id as productId',
                    'sh_distributor_products.price',
                ])
                ->whereIn('td_cross_direct_article_assembly_group.assemblyGroupNodeId', $assemblyGroupNodeIds)
                ->when($filterApplied, function ($query) use ($filterPriceMin, $filterPriceMax) {
                    return $query
                        ->where('sh_distributor_products.price', '>=', $filterPriceMin)
                        ->where('sh_distributor_products.price', '<=', $filterPriceMax);
                })
                ->when($filterApplied && !empty($filterBrands), function ($query) use ($filterBrands) {
                    return $query
                        ->whereIn('td_direct_article_details.brandNo', $filterBrands);
                })
                ->paginate($packageLimit);
    }

    /**
     * @param integer $brandId
     * @param array $activeVehicle
     * @param boolean $filterApplied
     * @param integer $filterPriceMin
     * @param integer $filterPriceMax
     * @param integer $packageLimit
     * @return LengthAwarePaginator
     */
    public function getDirectArticlesByBrandIdPaginated($brandId, $activeVehicle = null, $filterApplied = false, $filterPriceMin = null, $filterPriceMax = null, $packageLimit = 10)
    {
        return $activeVehicle ? DB::table('td_cross_direct_article_brand')
            ->join('td_direct_article_details', 'td_cross_direct_article_brand.articleId', '=', 'td_direct_article_details.articleId')
            ->join('td_cross_direct_article_vehicle', function ($query) use ($activeVehicle) {
                $query->on('td_direct_article_details.articleId', '=', 'td_cross_direct_article_vehicle.articleId');
            })
            ->leftJoin('td_direct_article_documents', function ($query) {
                $query->on('td_cross_direct_article_brand.articleId', '=', 'td_direct_article_documents.articleId')
                    ->where('td_direct_article_documents.isThumbnail', true)
                    ->where('td_direct_article_documents.id', '=', DB::raw("(select MIN(id) from td_direct_article_documents where articleId = td_cross_direct_article_brand.articleId)"));
            })
            ->leftJoin('sh_distributor_products', function ($query) {
                $query->on('td_cross_direct_article_brand.articleId', '=', 'sh_distributor_products.tecdoc_article_id')
                    ->where('sh_distributor_products.id', '=', DB::raw("(select id from sh_distributor_products where tecdoc_article_id = td_cross_direct_article_brand.articleId ORDER BY price ASC, quantity DESC LIMIT 1)"))
                    ->where('quantity', '>', 0);
            })
            ->select([
                'td_direct_article_details.id',
                'td_direct_article_details.articleId',
                'td_direct_article_details.articleName',
                'td_direct_article_details.articleNo',
                'td_direct_article_details.brandNo',
                'td_direct_article_details.articleAttributes',
                'td_direct_article_documents.assetDocumentName',
                'sh_distributor_products.id as productId',
                'sh_distributor_products.price',
            ])
            ->where('td_cross_direct_article_brand.brandNo', (int)$brandId)
            ->where('td_cross_direct_article_vehicle.carId', $activeVehicle['vehicleId'])
            ->when($filterApplied, function ($query) use ($filterPriceMin, $filterPriceMax) {
                return $query
                    ->where('sh_distributor_products.price', '>=', $filterPriceMin)
                    ->where('sh_distributor_products.price', '<=', $filterPriceMax);
            })
            ->paginate($packageLimit)

        : DB::table('td_cross_direct_article_brand')
            ->join('td_direct_article_details', 'td_cross_direct_article_brand.articleId', '=', 'td_direct_article_details.articleId')
            ->leftJoin('td_direct_article_documents', function ($query) {
                $query->on('td_cross_direct_article_brand.articleId', '=', 'td_direct_article_documents.articleId')
                    ->where('td_direct_article_documents.isThumbnail', true)
                    ->where('td_direct_article_documents.id', '=', DB::raw("(select MIN(id) from td_direct_article_documents where articleId = td_cross_direct_article_brand.articleId)"));
            })
            ->leftJoin('sh_distributor_products', function ($query) {
                $query->on('td_cross_direct_article_brand.articleId', '=', 'sh_distributor_products.tecdoc_article_id')
                    ->where('sh_distributor_products.id', '=', DB::raw("(select id from sh_distributor_products where tecdoc_article_id = td_cross_direct_article_brand.articleId ORDER BY price ASC, quantity DESC LIMIT 1)"))
                    ->where('quantity', '>', 0);
            })
            ->select([
                'td_direct_article_details.id',
                'td_direct_article_details.articleId',
                'td_direct_article_details.articleName',
                'td_direct_article_details.articleNo',
                'td_direct_article_details.brandNo',
                'td_direct_article_details.articleAttributes',
                'td_direct_article_documents.assetDocumentName',
                'sh_distributor_products.id as productId',
                'sh_distributor_products.price',
            ])
            ->where('td_cross_direct_article_brand.brandNo', (int)$brandId)
            ->when($filterApplied, function ($query) use ($filterPriceMin, $filterPriceMax) {
                return $query
                    ->where('sh_distributor_products.price', '>=', $filterPriceMin)
                    ->where('sh_distributor_products.price', '<=', $filterPriceMax);
            })
            ->paginate($packageLimit);
    }
}
