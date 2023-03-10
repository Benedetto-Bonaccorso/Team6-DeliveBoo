<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            'piva' => 'required|min:11|max:11|unique:restaurants',
            'address' => 'nullable|max:150',
            'cover_image' => 'nullable|image|max:250',
        ];
    }
}
