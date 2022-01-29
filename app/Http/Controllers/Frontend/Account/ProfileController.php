<?php


namespace App\Http\Controllers\Frontend\Account;


use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Requests\Frontend\Account\ProfileUpdateRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends FrontendController
{
    /**
     * @return View
     */
    public function index()
    {
        return view('frontend.account.profile', [
            'user' => auth()->user()
        ]);
    }

    /**
     * @param ProfileUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();

        $this->profileRepository->update($user, $request->only([
            'first_name',
            'last_name',
            'phone'
        ]));

        return redirect()->back()->withFlashSuccess('Profile successfully updated!');
    }
}
