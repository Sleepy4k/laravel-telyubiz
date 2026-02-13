<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneOrEmail implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $isEmail = filter_var($value, FILTER_VALIDATE_EMAIL);
        $isPhone = preg_match('/^628[1-9][0-9]{6,10}$/', $value);

        if (!$isEmail && !$isPhone) {
            $fail('The :attribute must be a valid email address or phone number.');
        }
    }
}
