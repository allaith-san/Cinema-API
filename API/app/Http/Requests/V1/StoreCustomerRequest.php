<?php

namespace App\Http\Requests\V1;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{

    public function authorize(): bool
    {
        $user = $this->user();
        return $user != null && $user->tokenCan('create');
    }


    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required','email'],
            'password' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'zipcode' => ['required'],
        ];
    }


    // protected function prepareForValidation(): void
    // {
    //     $this->merge([
    //         'slug' => Str::slug($this->slug),
    //     ]);
    // }
}
