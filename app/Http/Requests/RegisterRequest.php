<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => ['required', 'string', 'max:40', 'alpha_dash', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'string', 'same:password']
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'The username field is required',
            'username.max' => 'The username field is only allowed up to 40 characters',
            'username.alpha_dash' => 'The username must only contain letters, numbers, dashes and underscores.',
            'username.unique' => 'The username has already been taken',
            'email.required' => 'The email field is required',
            'email.email' => 'Invalid email',
            'email.max' => 'The email field is only allowed up to 40 characters',
            'email.unique' => 'The email has already been taken',
            'password.required' => 'The password field is required',
            'password.min' => 'The password must be less than 8 characters',
            'password_confirmation.required' => 'The repeat password field is required',
            'password_confirmation.same:password' => 'The password confirmation does not match.'
        ];
    }
}
