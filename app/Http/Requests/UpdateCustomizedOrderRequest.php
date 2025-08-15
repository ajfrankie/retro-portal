<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomizedOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Adjust if you have user authorization rules
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'customer_name'   => 'sometimes|required|string|max:255',
            'address'         => 'sometimes|required|string|max:500',
            'district'        => 'nullable|string|max:255',
            'description'     => 'nullable|string|max:1000',
            'phone_number'    => 'sometimes|required|string|max:20',
            'size'            => 'nullable|string|max:50',
            'reference_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'          => 'nullable|string|in:pending,processing,completed,cancelled',
            'no_of_cakes'     => 'sometimes|required|integer|min:1',
            'delivery_time'   => 'nullable|date_format:H:i',
            'delivery_date'   => 'nullable|date|after_or_equal:today',
            'wish'            => 'nullable|string|max:255',
            'note'            => 'nullable|string|max:1000',
            'veg_nonveg'      => 'required',
            'category_id'     => 'sometimes|required|exists:categories,id',
            'cake_id'         => 'sometimes|required|exists:cakes,id',
            'note'         => 'sometimes|required',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'customer_name.required'       => 'Customer name is required.',
            'customer_name.max'            => 'Customer name cannot exceed 255 characters.',
            'address.required'             => 'Address is required.',
            'address.max'                  => 'Address cannot exceed 500 characters.',
            'phone_number.required'        => 'Phone number is required.',
            'no_of_cakes.required'         => 'Number of cakes is required.',
            'no_of_cakes.integer'          => 'Number of cakes must be a valid number.',
            'no_of_cakes.min'              => 'There must be at least 1 cake.',
            'delivery_time.date_format'    => 'Delivery time must be in the format HH:MM.',
            'delivery_date.date'           => 'Delivery date must be a valid date.',
            'delivery_date.after_or_equal' => 'Delivery date cannot be in the past.',
            'category_id.required'         => 'Please select a category.',
            'category_id.exists'           => 'Selected category does not exist.',
            'cake_id.required'             => 'Please select a cake.',
            'cake_id.exists'               => 'Selected cake does not exist.',
            'reference_image.image'        => 'Reference image must be a valid image file.',
            'reference_image.mimes'        => 'Reference image must be a file of type: jpeg, png, jpg, gif.',
            'reference_image.max'          => 'Reference image cannot exceed 2MB.',
            'veg_nonveg.required'       => 'Please specify if the cake is veg or nonveg.',
            'veg_nonveg.in'             => 'Invalid value for veg/nonveg. Allowed: veg, nonveg.',
        ];
    }
}
