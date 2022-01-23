<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class newStudentRequest extends FormRequest
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
            'student_lrn' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'ext_name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'birthdate'=> 'required',
            'birthplace' => 'required',
            'address' => 'required',
            'section_id' => 'required'
        ];
    }
  /*   public function attributes()
    {
        return [
            'last_name' = 'Last Name',
            'last_name' = 'Last Name',
            'last_name' = 'Last Name',
            'last_name' = 'Last Name'
        ];
    } */
}
