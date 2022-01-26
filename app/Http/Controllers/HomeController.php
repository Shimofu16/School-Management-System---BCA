<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Enrollee;
use App\Year_level;


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
    public function calendar()
    {
        return view('BCA.pages.calendar.index');
    }
    public function enroll()
    {
        $sections = Section::all();
        $yl = Year_level::all();
        return view('BCA.pages.enrollment form.index', compact('sections', 'yl'));
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
    public function store(Request $request)
    {
        $student = new Enrollee;
        $student->student_lrn = $request->input('student_lrn');
        $student->last_name = $request->input('last_name');
        $student->first_name = $request->input('first_name');
        $student->middle_name = $request->input('middle_name');
        $student->ext_name = $request->input('ext_name');
        $student->gender = $request->input('gender');
        $student->age = $request->input('age');
        $student->email = $request->input('email');
        $student->birthdate = $request->input('birthdate');
        $student->birthplace = $request->input('birthplace');
        $student->address = $request->input('address');
        $student->yearlevel_id = $request->input('yearlevel_id');
        if ($request->hasfile('payment')) {
            $file = $request->file('payment');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/payments/', $filename);
            $student->payment = $filename;
        } else {
            return $request;
            $student->payment = '';
        }
        $student->save();
        return redirect()->route('enroll.index')->with('success', 'Student Added successfully.');
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
