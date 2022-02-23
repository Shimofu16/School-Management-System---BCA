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
            'student_lrn' => 'required|alpha_num|max:12|min:12|unique:enrolled_students,student_lrn|unique:enrollees,student_lrn',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'email' => 'required|unique:enrolled_students,email|unique:enrollees,email',
            'birthdate' => 'required',
            'birthplace' => 'required',
            'address' => 'required',
            'grade_level_id' => 'required',

            'father_name' => 'required',
            'father_birthdate' => 'required',
            'father_contact_no' => 'required|numeric',
            'father_occupation' => 'required',
            /* mother */
            'mother_name' => 'required',
            'mother_birthdate' => 'required',
            'mother_contact_no' => 'required',
            'mother_occupation' => 'required',
            /* guardian */
            'guardian_name' => 'required',
            'guardian_contact' => 'required',
            'guardian_relationship' => 'required',
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

            'father_name' => 'Father Full Name',
            'father_birthdate' => 'Father Birthdate',
            'father_contact_no' => 'Father Contact Number',
            'father_occupation' => 'Father Occupation',
            /* mother */
            'mother_name' => 'Mother Full Name',
            'mother_birthdate' => 'Mother Birthdate',
            'mother_contact_no' => 'Mother Contact Number',
            'mother_occupation' => 'Mother Occupation',
            /* guardian */
            'guardian_name' => 'Guardian Name',
            'guardian_contact' => 'Guardian Contact',
            'guardian_relationship' => 'Guardian Relationship',
        ];
    }
}
