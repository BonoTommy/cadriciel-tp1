<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class EtudiantStoreRequest extends FormRequest
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
            'nom'                   => ['required', 'max:80', 'min:3', 'regex:/^(\w+\s{1}){1,}\w+$/u'],
            'date_de_naissance'     => ['required', 'date', 'date_format:d-m-Y', 'before_or_equal:01-01-2005', 'after_or_equal:01-01-1958'],
            'email'                 => ['required', 'email'],
            'phone'                 => ['required', 'regex:/^^\(\d{3}\)\s?\d{3}-\d{4}$/', 'min:10'],
            'adresse'               => ['required', 'string', 'max:255', 'regex:/^[0-9]+\s[A-z]+\s[A-z]+/'],
            'ville_id'              => ['required', 'exists:villes,id'], 
            'password'              => ['required', 'max: 20', $password, 'confirmed'],
            'password_confirmation' => ['required', 'max:20', $password],
        ];
    }
}
