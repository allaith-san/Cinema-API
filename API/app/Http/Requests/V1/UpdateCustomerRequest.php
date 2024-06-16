<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = $this->user();
        return $user != null && $user->tokenCan('update');
    }


    public function rules(): array
    {
        $method = $this->method();
        
        if($method == 'PUT') {    
            return [
                'name' => ['required'],
                'email' => ['required','email'],
                'password' => ['required'],
                'address' => ['required'],
                'city' => ['required'],
                'zipcode' => ['required'],
            ];
        } 
        else
        {
            return [
                'name' => ['sometimes','required'],
                'email' => ['sometimes','required','email'],
                'password' => ['sometimes','required'],
                'address' => ['sometimes','required'],
                'city' => ['sometimes','required'],
                'zipcode' => ['sometimes','required'],
            ]; 
        }
    }


    // protected function prepareForValidation(): void
    // {
    //     if($this->zipcode){
    //         $this->merge([
    //             'zip_code' => $this->zipcode,
    //         ]);
    //     }
    // }
}
