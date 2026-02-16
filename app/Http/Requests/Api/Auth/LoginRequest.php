<?php

namespace App\Http\Requests\Api\Auth;

use App\Rules\PasswordFormat;
use App\Rules\PhoneOrEmail;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<mixed>|string|ValidationRule>
     */
    public function rules(): array
    {
        return [
            'phone_email' => ['required', 'string', 'min:8', new PhoneOrEmail()],
            'password'    => ['required', 'string', 'min:8', 'max:34', new PasswordFormat()],
        ];
    }
}
