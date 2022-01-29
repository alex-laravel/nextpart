<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Repositories\Frontend\TecDoc\AssemblyGroupRepository;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    /**
     * @param AssemblyGroupRepository $assemblyGroupRepository
     */
    public function __construct(AssemblyGroupRepository $assemblyGroupRepository)
    {
        View::share('sharedAssemblyGroups', $assemblyGroupRepository->getAssemblyGroupsAsTree());
    }
}
