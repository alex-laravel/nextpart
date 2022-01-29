<?php


namespace App\Http\Requests\Backend\DistributorProduct;


use Illuminate\Foundation\Http\FormRequest;

class DistributorProductSyncRequest extends FormRequest
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
            'distributor_id' => 'required|integer|exists:sh_distributors,id',
        ];
    }
}
