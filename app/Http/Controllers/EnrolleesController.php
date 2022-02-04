<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Student;
use App\Enrollee;
use App\Grade_level;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $sections = Section::all();
        $gradeLevels = Grade_level::all();
        return view('admin.registrar-layouts.students.enrollees.index', compact('students', 'sections', 'gradeLevels'));
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
        $account = new User;
        if ($request->input('ext_name') !== null) {
            $account->name = $request->input('first_name') . ' ' . $request->input('middle_name') . ', ' . $request->input('last_name') . ' ' . $request->input('ext_name');
        } else {
            $account->name = $request->input('first_name') . ' ' . $request->input('middle_name') . ', ' . $request->input('last_name');
        }
        $account->email = $request->input('email');
        /* get the first letter of first, middle and last name and lower case it */
        /* concatinate first middle and last */
        $password = Str::lower(substr($request->input('first_name'), 0, 1)) . Str::lower(substr($request->input('middle_name'), 0, 1)) . Str::lower(substr($request->input('last_name'), 0, 1));
        $account->password = 'bcastudent' . $password;
        $account->role = 'Student';
        $account->gender = $request->input('gender');
        $account->save();
        $id = $request->input('id');
        $enrollee=Enrollee::findOrFail($id);
        $enrollee->delete();
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
        $student = Enrollee::findOrFail($id);
        $gradeLevels = Grade_level::all();
        return view('admin.registrar-layouts.students.enrollees.show', compact('student', 'gradeLevels'));
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
