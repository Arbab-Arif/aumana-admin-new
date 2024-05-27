<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Foundation\Http\FormRequest;

class ImageStoreRequest extends FormRequest
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
            'image.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
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
