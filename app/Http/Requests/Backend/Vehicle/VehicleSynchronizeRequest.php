<?php


namespace App\Http\Requests\Backend\Vehicle;


use Illuminate\Foundation\Http\FormRequest;

class VehicleSynchronizeRequest extends FormRequest
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
            'country' => 'required_without:countryGroup|nullable|string|exists:td_countries,countryCode',
            'countryGroup' => 'required_without:country|nullable|string|exists:td_country_groups,tecdocCode',
        ];
    }
}
