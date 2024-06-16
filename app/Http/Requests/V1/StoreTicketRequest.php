<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = $this->user();
        return $user != null && $user->tokenCan('create');
    }


    public function rules(): array
    {
        return [
            'customerId' => ['required'],
            'screeningId' => ['required'],
            'cost' => ['required'],
            'status' => ['required'],
            'billedDate' => ['required'],
            'paidDate' => ['sometimes','required'],
        ];
    }

    protected function prepareForValidation(): void
    {
        if($this->billedDate){
            $this->merge([
                'billed_date' => $this->billedDate,
            ]);
        }

        if($this->paidDate){
            $this->merge([
                'paid_date' => $this->paidDate,
            ]);
        }

        if($this->customerId){
            $this->merge([
                'customer_id' => $this->customerId,
            ]);
        }

        if($this->screeningId){
            $this->merge([
                'screening_id' => $this->screeningId,
            ]);
        }
    }
}
