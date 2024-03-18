<?php

namespace Modules\ForTheBuilder\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class ShopsRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function store()
    {
        return [
            'name' => 'required|string|max:255',
            'object_id' => 'required|integer',
            'status' => 'nullable|integer',
        ];
    }

    public function update()
    {
        return [
            'name' => 'required|string|max:255',
            'object_id' => 'required|integer',
            'status' => 'nullable|integer',
        ];
    }
}
