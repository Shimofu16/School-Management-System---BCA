<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class LogoutController extends Controller {
    public function logoutUser( Request $request ) {

        request()->validate( [
            'id'=>'required|exists:users,id'
        ] );
        $user = User::where( 'id', '=', request()->id )->update( [ 'active'=>0 ] );
        return redirect()->route( 'home.index' );
    }
}
