<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseRequest extends FormRequest
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
            'customerId'=> ['required','numeric','exists:customers,id'],
            'eventId'=> ['required','numeric','exists:events,id'],
            'quantity'=> ['required','numeric'],
            'purchaseDate'=> ['required','date'],

        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'customer_id' =>$this->customerId,
            'event_id' =>$this->eventId,
            'purchase_date' =>$this->purchaseDate
        ]);
    }
}
