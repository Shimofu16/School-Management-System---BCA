<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Student;
use App\Enrollee;
use App\Year_level;
use App\Account_student;
use App\Enrolled_Requirement;
use App\Enrolled_Student_Family;
use App\Family;
use App\Grade_level;
use App\Guardian;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EnrolledStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $students = Student::with('section', 'gradeLevel')->orderBy('id', 'asc')
            ->get();
        $gradeLevels = Grade_level::all();
        $sections = Section::all();
        return view('admin.registrar-layouts.students.Enrolled.index', compact('students', 'gradeLevels', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $sections = Section::all();
        $gradelevels = Grade_level::all();
        return view('admin.registrar-layouts.students.create', compact('sections', 'gradelevels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        Student::create(
            $request->all()
        );
        return redirect()->route('enrolled.index')->with('success', 'Student Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $student = Student::with('gradeLevel','section','sy')->findOrFail($id);
        $families = Enrolled_Student_Family::all();
        $requirements = Enrolled_Requirement::all();
        $hasFilePsa = false;
        $hasFileForm137 = false;
        foreach ($requirements as $requirement) {
            if ($requirement->student_id == $id) {
                if ($requirement->filename == 'psa' && $requirement->isSubmitted == 1) {
                    $hasFilePsa = true;
                    break;
                }
            }
        }
        foreach ($requirements as $requirement) {
            if ($requirement->student_id == $id) {
                if ($requirement->filename == 'form 137' && $requirement->isSubmitted == 1) {
                    $hasFileForm137 = true;
                    break;
                }
            }
        }
        $sections = Section::all();
        $gradeLevels = Grade_level::all();
        return view('admin.registrar-layouts.students.enrolled.show', compact('student','families','requirements','id','sections','gradeLevels','hasFilePsa','hasFileForm137'));
    }
    public function showRequirements($id){

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
        $student = Student::findOrFail($id);
        $student->student_lrn = request()->input('student_lrn');
        $student->first_name = request()->input('first_name');
        $student->middle_name = request()->input('middle_name');
        $student->last_name = request()->input('last_name');
        $student->gender = request()->input('gender');
        $student->age = request()->input('age');
        $student->email = request()->input('email');
        $student->birthdate = request()->input('birthdate');
        $student->birthplace = request()->input('birthplace');
        $student->address = request()->input('address');
        $student->section_id = request()->input('section_id');
        $student->grade_level_id = request()->input('grade_level_id');
        $student->update();
        if ($student->wasChanged()) {
            return redirect()->route('enrolled.index')->with('success','Update Successfully');
        }
        return redirect()->route('enrolled.index');
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
