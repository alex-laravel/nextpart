<?php

namespace App\Http\Requests\Backend\Distributor;

use Illuminate\Foundation\Http\FormRequest;

class DistributorStoreRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:255|unique:sh_distributors,title',
            'description' => 'nullable|string|min:3|max:455',
        ];
    }
}
