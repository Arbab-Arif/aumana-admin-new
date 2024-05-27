<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Foundation\Http\FormRequest;

class ImageUpdateRequest extends FormRequest
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
            'category_id'     => 'required|in:' . implode(',', Category::pluck('id')->toArray()),
//            'sub_category_id' => 'required|in:' . implode(',', SubCategory::pluck('id')->toArray()),
//            'name'            => ['required', 'max:255', 'unique:images,name,' . request('imageId') . ',id,category_id,' . request('category_id') . ',sub_category_id,' . request('sub_category_id')],
//            'image'           => 'required|mimes:jpeg,jpg,png|max:10240'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required'     => 'The category field is required.',
            'category_id.in'           => 'The selected category is invalid.',
            'sub_category_id.required' => 'The sub-category field is required.',
            'sub_category_id.in'       => 'The selected sub-category is invalid.'
        ];
    }
}
