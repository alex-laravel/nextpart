<?php


namespace App\Models\Shop\Order;

use App\Models\User\User;

trait OrderRelationship
{
    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
