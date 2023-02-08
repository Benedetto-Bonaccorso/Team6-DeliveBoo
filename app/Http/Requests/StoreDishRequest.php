<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
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
        // TODO: aggiungere i vari parametri
        return [
            'name' => 'required|unique:dishes,name|max:50',
            'description' => 'nullable',
            'price' => 'required|between:0,999.99',
            'visible' => 'boolean',
            'cover_image' => 'nullable|image|max:250'
        ];
    }
}
