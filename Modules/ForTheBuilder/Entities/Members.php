<?php

namespace Modules\ForTheBuilder\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Members extends Model
{
    protected $connection = 'mysql';
    protected $table = 'members';

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'full_name',
        'phone',
        'img',
        'birth_date',
        'user_id'
    ];

    public function total(): HasMany
    {
        return $this->hasMany(MembersPurchases::class, 'members_id', 'id');
    }

    public function coupons(): HasMany
    {
        return $this->hasMany(MembersCoupons::class, 'members_id', 'id');
    }
}
