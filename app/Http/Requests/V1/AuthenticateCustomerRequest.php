<?php

namespace App\Http\Requests\V1;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class AuthenticateCustomerRequest extends FormRequest
{


    public function authorize(): bool
    {
        $user = $this->user();
        return $user != null && $user->tokenCan('create');
    }

    public function rules(): array
    {
        return [
            'email' => ['required','email'],
            'password' => ['required'],
        ];
    }
}
