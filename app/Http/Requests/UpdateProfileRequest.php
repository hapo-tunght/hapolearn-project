<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'profile_name' => ['nullable', 'string', 'max:255'],
            'profile_email' => ['nullable', 'string', 'email', 'max:255'],
            'profile_birthday' => ['nullable'],
            'profile_phone' => ['nullable', 'regex:/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/'],
            'profile_address' => ['nullable', 'string'],
            'profile_desc' => ['nullable', 'string'],
            'profile_avatar' => ['nullable', 'image']
        ];
    }
}
