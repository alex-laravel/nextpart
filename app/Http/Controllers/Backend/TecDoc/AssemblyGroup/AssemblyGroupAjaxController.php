<?php

namespace App\Http\Controllers\Backend\TecDoc\AssemblyGroup;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\TecDoc\AssemblyGroupRepository;

class AssemblyGroupAjaxController extends Controller
{
    /**
     * @var AssemblyGroupRepository
     */
    protected $assemblyGroupRepository;

    /**
     * @param AssemblyGroupRepository $assemblyGroupRepository
     */
    public function __construct(AssemblyGroupRepository $assemblyGroupRepository)
    {
        $this->assemblyGroupRepository = $assemblyGroupRepository;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->assemblyGroupRepository->getData())
            ->editColumn('linkingTargetType', function ($assemblyGroup) {
                return $assemblyGroup->linkingTargetTypeLabel;
            })
            ->editColumn('hasChilds', function ($assemblyGroup) {
                return $assemblyGroup->hasChildsLabel;
            })
            ->editColumn('isVisible', function ($assemblyGroup) {
                return $assemblyGroup->isVisibleLabel;
            })
            ->rawColumns(['linkingTargetType', 'hasChilds', 'isVisible'])
            ->make(true);
    }
}
