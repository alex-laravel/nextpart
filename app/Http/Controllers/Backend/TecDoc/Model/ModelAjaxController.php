<?php


namespace App\Http\Controllers\Backend\TecDoc\Model;


use App\Http\Controllers\Controller;
use App\Repositories\Backend\TecDoc\ModelRepository;

class ModelAjaxController extends Controller
{
    /**
     * @var ModelRepository
     */
    protected $modelRepository;

    /**
     * @param ModelRepository $modelRepository
     */
    public function __construct(ModelRepository $modelRepository)
    {
        $this->modelRepository = $modelRepository;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->modelRepository->getData())
            ->editColumn('linkingTargetType', function ($model) {
                return $model->linkingTargetTypeLabel;
            })
            ->editColumn('favorFlag', function ($model) {
                return $model->isfavoriteLabel;
            })
            ->editColumn('isPopular', function ($model) {
                return $model->isPopularLabel;
            })
            ->editColumn('isVisible', function ($model) {
                return $model->isVisibleLabel;
            })
            ->addColumn('actions', function ($model) {
                return $model->actionButtons;
            })
            ->rawColumns(['linkingTargetType', 'favorFlag', 'isPopular', 'isVisible', 'actions'])
            ->make(true);
    }
}
