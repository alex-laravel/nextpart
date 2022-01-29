<?php

namespace App\Http\Controllers\Backend\TecDoc\Version;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\TecDoc\VersionRepository;

class VersionAjaxController extends Controller
{
    /**
     * @var VersionRepository
     */
    protected $versionRepository;

    /**
     * @param VersionRepository $versionRepository
     */
    public function __construct(VersionRepository $versionRepository)
    {
        $this->versionRepository = $versionRepository;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->versionRepository->getData())
            ->make(true);
    }
}
