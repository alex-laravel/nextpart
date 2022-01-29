<?php


namespace App\Http\Controllers\Frontend\Account;


use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Requests\Frontend\Account\PasswordUpdateRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PasswordController extends FrontendController
{
    /**
     * @return View
     */
    public function index()
    {
        return view('frontend.account.password');
    }

    /**
     * @param PasswordUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(PasswordUpdateRequest $request)
    {
        $password = $request->input('new_password');

        $user = auth()->user();

        $this->passwordRepository->update($user, $password);

        return redirect()->back()->withFlashSuccess('Password successfully updated!');
    }
}
