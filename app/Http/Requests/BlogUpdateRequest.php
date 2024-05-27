<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogUpdateRequest extends FormRequest
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
            'title'             => 'required|unique:blogs,title,'.request('blogId').'|max:200',
            'author_name'       => 'required|max:255',
            'short_description' => 'required|max:1800',
            'description'       => 'required|max:8000',
            'featured_img'      => 'sometimes|nullable|mimes:jpeg,jpg,png',
            'image'             => 'sometimes|nullable|mimes:jpeg,jpg,png'
        ];
    }
}
