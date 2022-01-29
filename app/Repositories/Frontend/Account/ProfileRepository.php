<?php


namespace App\Repositories\Frontend\Account;

use App\Models\User\User;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Auth\Authenticatable;

class ProfileRepository extends BaseRepository
{
    const MODEL = User::class;

    /**
     * @param Authenticatable|User $user
     * @param array $data
     * @return boolean
     */
    public function update($user, $data)
    {
        $hasChanges = false;

        if (!empty($data['first_name']) && $data['first_name'] !== $user->first_name) {
            $user->first_name = $data['first_name'];
            $hasChanges = true;
        }

        if (!empty($data['last_name']) && $data['last_name'] !== $user->last_name) {
            $user->last_name = $data['last_name'];
            $hasChanges = true;
        }

        if (!empty($data['phone']) && $data['phone'] !== $user->phone) {
            $user->phone = $data['phone'];
            $hasChanges = true;
        }

        if ($hasChanges) {
            $user->save();
        }

        return $hasChanges;
    }
}
