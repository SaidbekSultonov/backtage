<?php

namespace Modules\ForTheBuilder\Entities;

use Illuminate\Database\Eloquent\Model;

class MembersSums extends Model
{
    protected $connection = 'mysql';
    protected $table = 'members_sums';

    protected $fillable = [
        'members_id',
        'ecobozor',
        'chimgan',
        'chimgan_hills',
        'pay_date',
        'members_purchases_id',
        'object_id'
    ];
}
