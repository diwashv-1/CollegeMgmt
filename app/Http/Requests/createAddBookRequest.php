<?php

namespace College\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createAddBookRequest extends FormRequest
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

            'bookName' => 'required',
            'authorName' => 'required',
            'selectFac' => 'required',
            'publisher' => 'required',
            'price' => 'required',
            'entryDate' => 'required',
            'bookCode' => 'required',
            'bookType' => 'required|integer',
            'isbnCode' => 'required',
            'quantity' => 'required'

        ];
    }
}
