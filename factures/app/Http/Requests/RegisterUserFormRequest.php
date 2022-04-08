<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterUserFormRequest extends FormRequest
{
    /**
     * Determine if the users is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'github_id' => ['required', 'integer', 'unique:users'],
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'max:191'],
            'contact_email' => ['required', 'email', 'max:191'],
            'phone' => ['required', 'string', 'max:191'],
            'company_address' => ['required', 'string', 'max:191'],
            'company_siret' => ['required', 'string', 'max:191', 'unique:users'],
            'company_ape' => ['required', 'string', 'max:191'],
            'bank_incumbent' => ['required', 'string', 'max:191'],
            'bank_domiciliation' => ['required', 'string', 'max:191'],
            'bank_rib' => ['required', 'string', 'max:191'],
            'bank_iban' => ['required', 'string', 'max:191'],
            'bank_bic' => ['required', 'string', 'max:191'],
        ];
    }
}
