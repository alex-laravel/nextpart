<?php


namespace App\Repositories\Frontend\Account;


use App\Models\User\User;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class PasswordRepository extends BaseRepository
{
    const MODEL = User::class;

    /**
     * @param Authenticatable|User $user
     * @param string $password
     * @return Authenticatable|User
     */
    public function update($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();

        return $user;
    }
}
