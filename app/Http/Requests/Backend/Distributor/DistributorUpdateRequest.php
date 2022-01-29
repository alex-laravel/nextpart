<?php

namespace App\Http\Requests\Backend\Distributor;

use Illuminate\Foundation\Http\FormRequest;

class DistributorUpdateRequest extends FormRequest
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
        $distributor = $this->route('distributor');

        return [
            'title' => 'required|string|min:3|max:255|unique:sh_distributors,title,' . $distributor->id,
            'description' => 'nullable|string|min:3|max:455',
        ];
    }
}
