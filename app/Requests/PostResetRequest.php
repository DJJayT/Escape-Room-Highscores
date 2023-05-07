<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRule;

class PostResetRequest extends FormRequest {

    public function rules(): array {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'confirmed',
                PasswordRule::min(8)
                    ->mixedCase()
                    ->numbers()
            ]
        ];
    }

}