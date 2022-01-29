<?php

namespace App\Http\Requests\Backend\PriceScheme;

use Illuminate\Foundation\Http\FormRequest;

class PriceSchemeStoreRequest extends FormRequest
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
            'price_from' => 'required|integer|min:1|max:1000000',
            'price_to' => 'required|integer|gt:price_from|max:1000000',
            'percentage' => 'required|integer|min:-100|max:1000',
        ];
    }
}
