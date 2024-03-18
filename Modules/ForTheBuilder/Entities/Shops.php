<?php

namespace Modules\ForTheBuilder\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Shops extends Model
{
    protected $fillable = [
        'name',
        'status',
        'object_id',
        'brend',
        'torg',
    ];

    public function objects(): HasOne
    {
        return $this->hasOne(Objects::class, 'id', 'object_id');
    }
}
