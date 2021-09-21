<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
                'name' => "required|unique:posts,name",
                'category_id' => "required",
                'sub_cat_id' => "required",
                'short_des' => "required",
                'long_des' => "required",
                'image' => "required",
                'status' => "required"
            ];
        } else {
             return [
                'name' => "required|unique:categories,name,{$this->post->id}",
            ];
        }
    }
}
