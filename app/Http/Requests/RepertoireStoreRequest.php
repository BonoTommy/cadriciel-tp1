<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepertoireStoreRequest extends FormRequest
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
            'title'        => ['required', 'min:2'],
            'title_fr'     => ['nullable', 'min:2'],
            'file'         => ['required', 'file', 'mimes:zip,docx,pdf,doc']
        ];
    }
}
