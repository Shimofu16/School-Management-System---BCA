<?php

namespace App\Http\Livewire;

use App\Grade_level;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Enrollee;
use App\Student;
use App\Enrollee_Requirement;
use App\Enrollee_Student_Family;
use App\Http\Requests\newStudentRequest;

class MultiPartForm extends Component
{
    use WithFileUploads;
    public $student_lrn;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $ext_name;
    public $gender;
    public $age;
    public $email;
    public $birthdate;
    public $birthplace;
    public $address;
    public $grade_level_id;


    public $totalSteps = 5;
    public $currentStep = 1;


    public function mount()
    {
        $this->currentStep = 1;
    }
    protected  $validationAttributes  = [
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

    public function increaseStep()
    {
        $this->resetErrorBag();
        /* $this->validateData(); */
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }
    public function validateData()
    {

        if ($this->currentStep == 1) {
            $this->validate([
                'student_lrn' => 'required|alpha_num|max:12|min:12|unique:enrolled_students,student_lrn|unique:enrollees,student_lrn',
                'first_name' => 'required|string',
                'middle_name' => 'required|string',
                'last_name' => 'required|string',
                'gender' => 'required',
                'age' => 'required|numeric',
                'email' => 'required|unique:enrolled_students,email|unique:enrollees,email|email',
                'birthdate' => 'required',
                'birthplace' => 'required|string',
                'address' => 'required|string',
                'grade_level_id' => 'required|numeric',
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'father_name' => 'required|string',
                'father_birthdate' => 'required',
                'father_contact_no' => 'required|numeric',
                'father_occupation' => 'required',
                /* mother */
                'mother_name' => 'required|string',
                'mother_birthdate' => 'required',
                'mother_contact_no' =>  'required|numeric',
                'mother_occupation' => 'required',
                /* guardian */
                'guardian_name' => 'required|string',
                'guardian_contact' =>  'required|numeric',
                'guardian_relationship' => 'required',
            ]);
        } elseif ($this->currentStep == 3) {
            $this->validate([
                /* guardian */
                'guardian_name' => 'required|string',
                'guardian_contact' =>  'required|numeric',
                'guardian_relationship' => 'required',
            ]);
        }
    }

    public function updated($propertyName)
    {
        if ($this->currentStep == 1) {
            $this->validateOnly($propertyName, [
                'student_lrn' => 'required|alpha_num|max:12|min:12|unique:enrolled_students,student_lrn|unique:enrollees,student_lrn',
                'first_name' => 'required|string',
                'middle_name' => 'required|string',
                'last_name' => 'required|string',
                'gender' => 'required',
                'age' => 'required|numeric',
                'email' => 'required|unique:enrolled_students,email|unique:enrollees,email|email',
                'birthdate' => 'required',
                'birthplace' => 'required|string',
                'address' => 'required|string',
                'grade_level_id' => 'required|numeric',
            ]);
        }
        if ($this->currentStep == 2) {
            $this->validateOnly($propertyName, [
                'father_name' => 'required|string',
                'father_birthdate' => 'required',
                'father_contact_no' => 'required|numeric',
                'father_occupation' => 'required',
                /* mother */
                'mother_name' => 'required|string',
                'mother_birthdate' => 'required',
                'mother_contact_no' =>  'required|numeric',
                'mother_occupation' => 'required',

            ]);
        }
        if ($this->currentStep == 3) {
            $this->validateOnly($propertyName, [
                /* guardian */
                'guardian_name' => 'required|string',
                'guardian_contact' =>  'required|numeric',
                'guardian_relationship' => 'required',
            ]);
        }
    }


    public function render()
    {
        $gradelevels = Grade_level::all();
        return view('livewire.multi-part-form', compact('gradelevels'));
    }
}
