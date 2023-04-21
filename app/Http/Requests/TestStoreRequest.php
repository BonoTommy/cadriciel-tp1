<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class TestStoreRequest extends FormRequest
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
        $password = Password::min(2)
            ->mixedCase()
            ->numbers()
            ->letters();

        return [
            'name' => ['required', 'max:50', 'min:2'],
            'email' => ['required', 'email'],
            'date' => ['required', 'date', 'date_format:d-m-Y'],
            'unite' => ['required', 'integer', 'gte:1'],
            'unite_kg' => ['required', 'numeric', 'gte:0.01', 'regex:/^\d+\.\d{2,}$/'],
            'password' => ['required', 'max: 20', $password, 'confirmed'],
            'password_confirmation' => ['required', 'max:20', $password],
            'ville_id' => ['required', 'exists:villes,id']

        ];
    }
}
