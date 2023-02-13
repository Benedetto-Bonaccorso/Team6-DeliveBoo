<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'exists:user,id',
            'name' => 'required|max:100',
            'phone_number' => 'nullable|max:15',
            'piva' => 'required|numeric|max:11',
            'address' => 'nullable|max:150',
            'cover_image' => 'nullable|image|max:250'
        ];
    }
}
