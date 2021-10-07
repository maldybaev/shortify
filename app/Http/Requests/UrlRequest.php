<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlRequest extends FormRequest
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
            'originalurl' => 'required|url'
        ];
    }

    public function messages()
    {
      return [
        'originalurl.required' => 'You cannot shortify empty field',
        'originalurl.url' => 'Please enter a valid URL',
      ];
    }
}
