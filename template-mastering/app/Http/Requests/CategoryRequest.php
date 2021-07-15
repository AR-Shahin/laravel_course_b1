<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        if ($this->method() === 'POST') {
            return [
                'name' => ['required', 'unique:categories,name'],
                'image' => ['required', 'mimes:jpg,png'],
            ];
        } else {
            return [
                'name' => "required|unique:categories,name,{$this->category->id}",
                'image' => "image|max:3072|mimes:jpeg,png,jpg",
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Filed must not be empty!',
            'name.unique' => 'Filed must be unique!',
            'image.required' => 'Filed must not be empty!'
        ];
    }
}
