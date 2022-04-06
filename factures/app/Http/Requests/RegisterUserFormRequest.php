<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterUserFormRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'github_id' => ['required', 'integer', Rule::unique('users')],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'contact_email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
            'company_address' => ['required', 'string', 'max:255'],
            'company_siret' => ['required', 'string', 'max:255', Rule::unique('users')],
            'APE' => ['required', 'integer', 'max:255'],
            'bank_incumbent' => ['required', 'string', 'max:255'],
            'bank_domiciliation' => ['required', 'string', 'max:255'],
            'bank_details' => ['required', 'string', 'max:255'],
            'IBAN' => ['required', 'string', 'max:255'],
            'BIC' => ['required', 'string', 'max:255'],
        ];
    }
}
