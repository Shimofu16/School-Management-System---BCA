<?php

namespace App\Http\Controllers;

use App\Enrolled_Requirement;
use App\Enrolled_Student_Family;
use Illuminate\Http\Request;
use App\Section;
use App\Student;
use App\Enrollee;
use App\Enrollee_Requirement;
use App\Enrollee_Student_Family;
use App\Grade_level;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class EnrolleesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $students = Enrollee::with('gradeLevel')->orderBy('id', 'asc')
            ->get();
        $families = Enrollee_Student_Family::all();
        $sections = Section::all();
        $requirements = Enrollee_Requirement::all();
        $gradeLevels = Grade_level::all();
        return view('admin.registrar-layouts.students.enrollees.index', compact('students', 'sections', 'gradeLevels', 'families', 'requirements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $student = new Student;
        $student->student_lrn = $request->input('student_lrn');
        $student->first_name = $request->input('first_name');
        $student->middle_name = $request->input('middle_name');
        $student->last_name = $request->input('last_name');
        $student->ext_name = $request->input('ext_name');
        $student->gender = $request->input('gender');
        $student->age = $request->input('age');
        $student->email = $request->input('email');
        $student->birthdate = $request->input('birthdate');
        $student->birthplace = $request->input('birthplace');
        $student->address = $request->input('address');
        $student->section_id = $request->input('section_id');
        $student->grade_level_id = $request->input('grade_level_id');
        $student->sy_id = 1;
        $student->save();
        $students = Student::all();
        $c = 0;
        foreach ($students as $student) {
            $c++;
            $id[$c] = $student->id;
        }
        $lastId = Arr::last($id);
        $families = [
            [
                'student_id' => $lastId,
                'name' => $request->input('father_name'),
                'birthdate' => $request->input('father_birthdate'),
                'email' => $request->input('father_email'),
                'landline' => $request->input('father_landline'),
                'contact_no' => $request->input('father_contact_no'),
                'occupation' => $request->input('father_occupation'),
                'office_address' => $request->input('father_office_address'),
                'office_contact_no' => $request->input('father_office_contact'),
                'relationship' => 'Father',
            ], [
                'student_id' => $lastId,
                'name' => $request->input('mother_name'),
                'birthdate' => $request->input('mother_birthdate'),
                'email' => $request->input('mother_email'),
                'landline' => $request->input('mother_landline'),
                'contact_no' => $request->input('mother_contact_no'),
                'occupation' => $request->input('mother_occupation'),
                'office_address' => $request->input('mother_office_address'),
                'office_contact_no' => $request->input('mother_office_contact'),
                'relationship' => 'Mother',
            ], [
                'student_id' => $lastId,
                'name' => $request->input('guardian_name'),
                'contact_no' => $request->input('guardian_contact'),
                'relationship' => 'Guardian',
            ]
        ];
        foreach ($families as $family) {
            Enrolled_Student_Family::create($family);
        }
        $enrolledStudents = Student::all();
        foreach ($enrolledStudents as $enrolledStudent) {
            if ($enrolledStudent->student_lrn == $request->input('student_lrn')) {
                $studentID =  $enrolledStudent->id;
            }
        }
        $requirements = [
            [
                'student_id' => $studentID,
                'filename' => request()->input('form137_filename'),
                'filepath' => request()->input('form137_filepath'),
                'isSubmitted' => request()->input('form137_isSubmitted'),
            ],
            [
                'student_id' => $studentID,
                'filename' => request()->input('psa_filename'),
                'filepath' => request()->input('psa_filepath'),
                'isSubmitted' => request()->input('psa_isSubmitted'),
            ],
        ];
        foreach ($requirements as $requirement) {
            Enrolled_Requirement::create($requirement);
        }
        $id = $request->input('id');
        $enrollee = Enrollee::findOrFail($id);
        $fam = Enrollee_Student_Family::findOrFail($id);
        $req = Enrollee_Requirement::findOrFail($id);
        $req->delete();
        $enrollee->delete();
        $fam->delete();
        return redirect()->route('enrolled.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $student = Enrollee::with('gradeLevel')->findOrFail($id);
        $requirements = Enrollee_Requirement::all();
        $families = Enrollee_Student_Family::all();
        $isEmpty = $requirements->isEmpty();
        return view('admin.registrar-layouts.students.enrollees.show', compact('student', 'families', 'requirements', 'isEmpty', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
    }
}
