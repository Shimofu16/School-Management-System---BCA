<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Student;
use App\Enrollee;
use App\Year_level;
use App\Account_student;
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
        return view('admin.registrar-layouts.students.create', compact('sections', 'yl'));
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
        return view('admin.registrar-layouts.students.enrolled.show', compact('student','families'));
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
        $student->update(
            $request->all()
        );
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
