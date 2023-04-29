<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostStoreRequest extends FormRequest
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
            'title'      => ['required', 'min:2'],
            'title_fr'   => ['nullable', 'min:2'],
            'body'       => ['required', 'min:2'],
            'body_fr'    => ['nullable', 'min:2'],
        ];
    }
}
