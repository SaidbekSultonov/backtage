<?php

namespace Modules\ForTheBuilder\Entities;

use Illuminate\Database\Eloquent\Model;

class Objects extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];
}
