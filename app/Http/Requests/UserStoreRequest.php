<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:101',
            ],
            'email' => [
                'required',
                'string',
                'max:191',
                'email',
                'unique:users',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:255',
                'same:password_confirmation',
            ],
            'password_confirmation' => [
                'required',
                'string',
                'min:8',
                'max:255',
            ],
            'is_developer' => [
                'required',
                'string',
                'min:1',
                'max:1',
            ],
        ];
    }
}
