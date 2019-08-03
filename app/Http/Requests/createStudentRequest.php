<?php

namespace College\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createStudentRequest extends FormRequest
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

            'std_name' => 'required',
            'std_add'=> 'required',
            'std_gend'=> 'required',
            'std_email'=> 'required|email|unique:students,email',
            'std_num'=> 'required',
            'std_image'=> 'required',
            'std_fath'=> 'required'

        ];
    }
}
