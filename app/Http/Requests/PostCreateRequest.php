<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
        return [
            'title' => 'required|min:5|max:200|unique:posts',
            'alias' => 'max:200',
            'content_raw' => 'required|string|min:3|max:10000',
            'category_id' => 'required|integer|exists:categories,id',// в таблице blog_categories в id должно существовать
        ];
    }
}
