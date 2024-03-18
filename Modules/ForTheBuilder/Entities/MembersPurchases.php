<?php

namespace Modules\ForTheBuilder\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MembersPurchases extends Model
{
    protected $fillable = [
        'user_id',
        'members_id',
        'shop_id',
        'object_id',
        'sum',
        'img',
        'coupon',
        'add_time',
        'order_id',
    ];

    public function shops(): HasOne
    {
        return $this->hasOne(Shops::class, 'id', 'shop_id');
    }

    public function objects(): HasOne
    {
        return $this->hasOne(Objects::class, 'id', 'object_id');
    }

    public function coupons(): HasMany
    {
        return $this->hasMany(MembersCoupons::class, 'members_purchases_id', 'id');
    }
}
