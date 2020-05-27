<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
//      return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'alias' => 'max:250',
            'title' => 'required|min:3|max:250',
            'excerpt' => 'max:700',
            'content_raw' => 'required|string|min:5|max:10000',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }
}
