<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Section;
use App\Subject;
use App\subject_teacher;
use Illuminate\Http\Request;

class RTeachersController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        /* $teachers = Teacher::with( 'subjects', 'sections' )->get();
        */
        /* $teachers = Teacher::all()->orderBy( 'id', 'asc' )->get(); */
        $teachers = Teacher::all();
        $sections = Section::all();
        $subjects = Subject::all();
        return view( 'admin.registrar-layouts.teacher.index', compact( 'teachers', 'subjects', 'sections' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        return view( 'admin.registrar-layouts.teacher.create' );
    }

    public function createSubject() {

    }
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $recent = url()->previous();
        if ( $recent == 'http://127.0.0.1:8000/teachers' ) {
            $teacher = new subject_teacher;
            $teacher->section_id = $request->input( 'section_id' );
            $teacher->subject_id = $request->input( 'subject_id' );
            $teacher->teacher_id = $request->input( 'teacher_id' );
            $teacher->save();
        } else {
            Teacher::create(
                $request->all()
            );
        }
        return redirect()->route( 'teachers.index' )->with( 'success', 'Teacher added successfully.' );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        $teacher = Teacher::findOrFail( $id );
        return view( 'admin.registrar-layouts.teacher.edit', compact( 'teacher' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        $teacher = Teacher::findOrFail( $id );
        $teacher->update(
            $request->all()
        );
        return redirect()->route( 'teachers.index' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
    }
}
