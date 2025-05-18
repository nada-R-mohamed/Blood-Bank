<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CreateDonationRequest extends FormRequest
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
            'patient_name' => 'required|string|max:255',
            'patient_age' => 'required|numeric|min:2',
            'patient_phone' =>'required|string|max:255',
            'hospital_name' => 'required|string|max:255',
            'hospital_address' => 'required|string|max:400',
            'city_id' => 'required|integer|exists:cities,id',
            'blood_type_id' => 'required|integer|exists:blood_types,id',
            'bags_num' => 'required|int|',
            'details' => 'required|string',
            'latitude' => 'required',
            'longitude' => 'required',
        ];
    }
}
