<?php

namespace App\Http\Requests\Api\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'phone' => ['required', 'string', 'min:8', 'regex:/^628[1-9][0-9]{6,10}$/', Rule::unique(User::class, 'phone')],
            'email' => ['required', 'string', 'email', Rule::unique(User::class, 'email')],
            'password' => ['required', 'string', 'min:8', 'max:34', 'confirmed'],
        ];
    }
}
