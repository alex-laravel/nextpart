<?php


namespace App\Models\User;

use App\Models\Shop\Order\Order;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait UserRelationship
{
    /**
     * @return BelongsTo
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
