<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class StudentLoginController extends Controller {
    /**
    * Handle an authentication attempt.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function authenticate( Request $request ) {
        $credentials = $request->validate( [
            'email' => [ 'required', 'email' ],
            'password' => [ 'required' ],
        ] );

        if ( Auth::attempt( $credentials ) ) {
            if ( Auth::attempt( [ 'email' => request()->email, 'password' => request()->password, 'roles' => 'Student' ] ) ) {
                $user = User::where( 'id', '=', Auth::user()->id )->update( [ 'active'=>1 ] );
                $request->session()->regenerate();
                return redirect()->route( 'student.dashboard.index' );
            }
        }

        return back()->withErrors( [
            'email' => 'The provided credentials do not match our records.',
        ] );
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        return view( 'admin.student-layouts.login.index' );
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
        //
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
