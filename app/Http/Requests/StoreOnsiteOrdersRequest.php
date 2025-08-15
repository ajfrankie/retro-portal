<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOnsiteOrdersRequest extends FormRequest
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
            'customer_name'    => 'required|string|max:255',
            'cake_id'          => 'required|exists:cakes,id',
            'category_id'      => 'required|exists:categories,id',
            'total_amount'     => 'required|numeric|min:0',
            'veg_nonveg'       => 'required',
            'phone_number'         => 'required|regex:/^[0-9]{10}$/',
            'status'           => 'required|in:pending,processing,completed,cancelled',
            'no_of_cakes'      => 'required|integer|min:1',
            'delivery_time'    => 'required|date_format:H:i',
            'delivery_date'    => 'required|date|after_or_equal:today',
            // 'description'      => 'nullable|string',
            'customized_text'  => 'nullable|string|max:255',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'customer_name.required'    => 'The customer name is required.',
            'customer_name.string'      => 'The customer name must be a string.',
            'customer_name.max'         => 'The customer name may not be greater than 255 characters.',

            'cake_id.required'          => 'The cake selection is required.',
            'cake_id.exists'            => 'The selected cake is invalid.',

            'category_id.required'      => 'The category selection is required.',
            'category_id.exists'        => 'The selected category is invalid.',

            'total_amount.required'     => 'The total amount is required.',
            'total_amount.numeric'      => 'The total amount must be a number.',
            'total_amount.min'          => 'The total amount must be at least 0.',

            'veg_nonveg.required'       => 'Please specify if the cake is veg or nonveg.',
            'veg_nonveg.in'             => 'Invalid value for veg/nonveg. Allowed: veg, nonveg.',

            'phone_number.required'         => 'The phone number is required.',
            'phone_number.regex'            => 'The phone number must be exactly 10 digits.',

            'status.required'           => 'The order status is required.',
            'status.in'                 => 'Invalid status. Allowed: pending, processing, completed, cancelled.',

            'no_of_cakes.required'      => 'The number of cakes is required.',
            'no_of_cakes.integer'       => 'The number of cakes must be an integer.',
            'no_of_cakes.min'           => 'At least 1 cake must be ordered.',

            'delivery_time.required'    => 'The delivery time is required.',
            'delivery_time.date_format' => 'The delivery time must be in HH:MM format.',

            'delivery_date.required'    => 'The delivery date is required.',
            'delivery_date.date'        => 'The delivery date must be a valid date.',
            'delivery_date.after_or_equal' => 'The delivery date cannot be in the past.',

            // 'description.string'        => 'The description must be a string.',

            'customized_text.string'    => 'The customized text must be a string.',
            'customized_text.max'       => 'The customized text may not exceed 255 characters.',
        ];
    }
}
