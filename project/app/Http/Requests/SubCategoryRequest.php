<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
        if($this->method() === 'POST') {
            return [
                'name' => ['required', 'string', 'unique:sub_categories,name']
            ];
        }else{
            return [
                'name' => "required|unique:sub_categories,name,{$this->sub_category->id}"
            ];
        }
    }
}
