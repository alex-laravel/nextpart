<?php

namespace App\Http\Controllers\Auth;

use App\Providers\RouteServiceProvider;
use App\Repositories\Frontend\TecDoc\AssemblyGroupRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends AuthController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @param AssemblyGroupRepository $assemblyGroupRepository
     * @return void
     */
    public function __construct(AssemblyGroupRepository $assemblyGroupRepository)
    {
        parent::__construct($assemblyGroupRepository);

        $this->middleware('guest')->except('logout');
    }
}
