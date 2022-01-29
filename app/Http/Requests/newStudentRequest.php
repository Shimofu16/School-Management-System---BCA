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
            'student_lrn' => ['required','max:11'],
            'first_name' => ['required'],
            'middle_name' => ['required'],
            'last_name' => ['required'],
            'gender' => ['required'],
            'age' => ['required'],
            'email' => ['required', 'email'],
            'birthdate' => ['required'],
            'birthplace' => ['required'],
            'address' => ['required'],
            'grade_level_id' => ['required'],
        ];
    }
    public function attributes()
    {
        return [
            'student_lrn' => 'Learner Reference Number (LRN)',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'gender' => 'Gender',
            'age' => 'Age',
            'email' => 'Email Address',
            'birthdate' => 'Birthdate',
            'address' => 'Address',
            'grade_level_id ' => 'Grade Level',
        ];
    }
}
