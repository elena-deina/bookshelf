<?php

namespace App\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdateRequest extends FormRequest
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
            'last_name' => [
                'required',
                'string',
                'max:255'
            ],
            'first_name' => [
                'nullable',
                'string',
                'max:255'
            ],
            'middle_name' => [
                'nullable',
                'string',
                'max:255'
            ],
        ];
    }
}
