<?php

namespace App\Http\Controllers;

use App\Enrolled_Requirement;
use Illuminate\Http\Request;
use App\Section;
use App\Enrollee;
use App\Enrollee_Student_Family;
use App\Family;
use App\Grade_level;
use App\Http\Requests\newStudentRequest;
use App\Student;
use EnrolledStudents;
use Illuminate\Support\Arr;


class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('BCA.pages.Home.index');
    }
    public function about()
    {
        return view('BCA.pages.about us.index');
    }
    public function academics()
    {
        return view('BCA.pages.academics.index');
    }
    public function primary()
    {
        return view('BCA.pages.academics.primary.index');
    }
    public function nursery()
    {
        return view('BCA.pages.academics.primary.nursery.index');
    }
    public function elementary()
    {
        return view('BCA.pages.academics.elementary.index');
    }
    public function juniorhighschool()
    {
        return view('BCA.pages.academics.junior highschool.index');
    }
    public function calendar()
    {
        return view('BCA.pages.calendar.index');
    }
    public function back(){
        return redirect()->back();
    }
    public function enroll()
    {
        $sections = Section::all();
        $gradelevels = Grade_level::all();
        return view('BCA.pages.enrollment form.index', compact('sections', 'gradelevels'));
    }
    public function portal()
    {
        return view('BCA.pages.portal.index');
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
    public function store(newStudentRequest $request)
    {

        /* dd(request()->all()); */
        $validate  = $request->validate([
            'student_lrn' => ['required', 'max:11'],
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
        ]);

        if ($validate) {

            $student = new Enrollee;
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
            $student->grade_level_id  = $request->input('grade_level_id');
            $student->save();
            $students = Enrollee::all();
            $c = 0;
            foreach ($students as $student) {
                $c++;
                $id[$c] = $student->id;
            }
            $lastId = Arr::last($id);
            if ($request->filled('father_name')) {
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
                    Enrollee_Student_Family::create($family);
                }
            }


        } else {
            return redirect()->route('enroll.index')->withInput();
        }


        /* if ($request->hasfile('payment')) {
            $file = $request->file('payment');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/payments/', $filename);
            $student->payment = $filename;
        } else {
            return $request;
            $student->payment = '';
        } */
        return redirect()->route('enroll.index')->with('success', 'Successfully Enrolled');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
