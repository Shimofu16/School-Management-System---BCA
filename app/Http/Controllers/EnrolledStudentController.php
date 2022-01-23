<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Student;
use App\Enrollee;
use App\Year_level;
use App\Account_student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EnrolledStudentController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $students = Student::with( 'section', 'yearlevel' )->orderBy( 'id', 'asc' )
        ->get();
        $yl = Year_level::all();
        $sections = Section::all();
        return view( 'admin.registrar-layouts.students.Enrolled.index', compact( 'students', 'yl', 'sections' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        $sections = Section::all();
        return view( 'admin.registrar-layouts.students.create', compact( 'sections', 'yl' ) );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {

        if ( $request->url() == 'http://127.0.0.1:8000/students' ) {
            Student::create(
                $request->all()
            );
            $account = new Account_student;
            $account->student_lrn = $request->input( 'student_lrn' );
            $account->name = $request->input( 'first_name' ).' '.$request->input( 'middle_name' ).', '.$request->input( 'last_name' );
            $account->email = $request->input( 'email' );
            /* get the first letter of first, middle and last name and lower case it */
            /* concatinate first middle and last */
            $concat = $first = Str::lower( $request->input( 'first_name' ) ).$middle = Str::lower( $request->input( 'middle_name' ) ). $last = Str::lower( $request->input( 'last_name' ) );
            /* get first 10 first 10 shuffled string of concatinated first, middle and last name */
            $password = substr( str_replace( ' ', '', str_shuffle( $concat ) ), 0, 10 );
            $account->password = 'bcaStudent'.$password;
            $account->role = 'Student';
            $account->gender = $request->input( 'gender' );

            $account->save();

            $id = $request->input( 'id' );
            $enrollee = Enrollee::findOrFail( $id );
            $enrollee->delete();
        } else {
            Student::create(
                $request->all()
            );
        }
        return redirect()->route( 'enrolled.index' )->with( 'success', 'Student Added successfully.' );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        $student = Student::findOrFail( $id );
        return view( 'admin.registrar-layouts.students.enrolled.show', compact( 'student' ) );
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
        $student = Student::findOrFail( $id );
        $student->update(
            $request->all()
        );
        return redirect()->route( 'enrolled.index' );
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
