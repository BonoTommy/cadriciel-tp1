<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'nom'                 => ['required', 'max:80', 'min:3', 'regex:/^(\w+\s{1}){1,}\w+$/'],
            'date_de_naissance'   => ['required', 'date_format:d-m-Y', 'before_or_equal:01-01-2005', 'after_or_equal:01-01-1958'],
            'email'               => ['required', 'email'],
            'phone'               => ['required', 'regex:/^^\(\d{3}\)\s?\d{3}-\d{4}$/', 'min:10'],
            'adresse'             => ['required', 'string', 'max:255', 'regex:/^[0-9]+\s[A-z]+\s[A-z]+/'],
            'ville_id'            => ['required']

        ];
    }
}
