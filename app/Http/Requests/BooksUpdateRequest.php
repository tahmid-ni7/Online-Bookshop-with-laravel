<?php

namespace App\Http\Requests;

use App\Book;
use Illuminate\Foundation\Http\FormRequest;

class BooksUpdateRequest extends FormRequest
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
            'title'         => 'required',
            'slug'          => 'required|unique:books,slug,'.$this->book,
            'description'   => 'required',
            'author_id'     => 'required',
            'category_id'   => 'required',
            'image_id'      => 'image|max:1000',
            'init_price'    => 'required|numeric',
            'discount_rate' => 'required|numeric|max:100',
            'quantity'      => 'required|numeric'
        ];

    }
    public function messages()
    {
        return [
            'author_id.required'    => 'Author field required',
            'category_id.required'  => 'Category field required',
            'image_id.image'        => 'Image type must be png, jpg, jpeg type'
        ];
    }
}
