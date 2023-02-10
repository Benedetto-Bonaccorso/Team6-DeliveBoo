<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateDishRequest extends FormRequest
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
            // 'name' => 'required|unique:dishes,name|max:50', //Rule::unique('posts')->ignore($this->post->id)]
            'name' => ['required', 'max:50', Rule::unique('dishes')->ignore($this->dish->id)],
            'description' => 'required',
            'price' => 'required|numeric|min:1',
            'visible' => 'boolean',
            'cover_image' => 'nullable|image|max:250'
        ];
    }
}
