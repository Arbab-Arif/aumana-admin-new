<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
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
            'title'             => 'required|unique:blogs,title|max:200',
            'author_name'       => 'required|max:255',
            'short_description' => 'required|max:1800',
            'description'       => 'required|max:8000',
            'featured_img'      => 'required|mimes:jpeg,jpg,png',
            'image'             => 'required|mimes:jpeg,jpg,png'
        ];
    }
}
