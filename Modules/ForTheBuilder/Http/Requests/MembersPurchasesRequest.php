<?php

namespace Modules\ForTheBuilder\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class MembersPurchasesRequest extends BaseFormRequest
{
    public function authorize()
    {
        return true;
    }

    public function store()
    {
        return [
            'user_id' => 'nullable|integer',
            'members_id' => 'nullable|integer',
            'shop_id' => 'required|integer',
            'object_id' => 'required|integer',
            'sum' => 'required|numeric',
            'img' => 'nullable|string',
            'coupon' => 'nullable|integer',
            'add_time' => 'required|string',
        ];
    }

    public function update()
    {
        return [
            'user_id' => 'nullable|integer',
            'members_id' => 'nullable|integer',
            'shop_id' => 'required|integer',
            'object_id' => 'required|integer',
            'sum' => 'required|numeric',
            'img' => 'nullable|string',
            'coupon' => 'nullable|integer',
            'add_time' => 'required|string',
            
        ];
    }
}
