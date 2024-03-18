<?php

namespace Modules\ForTheBuilder\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class MembersRequest extends BaseFormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'full_name' => 'nullable|string|max:255',
            'phone' => 'required|string|max:50',
            'img' => 'nullable',
            'birth_date' => 'nullable|string|max:255',
            'user_id' => 'nullable|integer'
        ];
    }

    public function update()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'full_name' => 'nullable|string|max:255',
            'phone' => 'required|string|max:50',
            'img' => 'nullable',
            'birth_date' => 'nullable|string|max:255',
            'user_id' => 'nullable|integer'
            
        ];
    }
}
