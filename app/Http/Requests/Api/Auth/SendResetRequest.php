<?php

namespace App\Http\Requests\Api\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SendResetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !auth('api')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<mixed>|string|ValidationRule>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', Rule::exists(User::class, 'email')],
        ];
    }
}
