<?php


namespace App\Http\Requests\Frontend\Account;


use App\Rules\MatchCurrentPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
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
            'current_password' => ['required', 'string', 'min:8', new MatchCurrentPasswordRule()],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
