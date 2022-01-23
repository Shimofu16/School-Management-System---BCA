<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Student;
use App\Enrollee;
use App\Year_level;

class EnrolleesController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {

        $students = Enrollee::with( 'yearlevel' )->orderBy( 'id', 'asc' )
        ->get();
        $sections = Section::all();
        $yl = Year_level::all();
        return view( 'admin.registrar-layouts.students.enrollees.index', compact( 'students', 'sections', 'yl' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        $student = Student::findOrFail( $id );
        dd( $student );
        return view( 'admin.registrar-layouts.students.enrollees.show', compact( 'student' ) );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        //
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
