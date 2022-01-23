<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Log;
use App\User;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        if (Auth::user()->roles == 'Admin') {
            return redirect()->route('admin.dashboard.index');
        } elseif (Auth::user()->roles == 'Registrar') {
            return redirect()->route('registrar.dashboard.index');
        } elseif (Auth::user()->roles == 'Teacher') {
            return redirect()->route('teacher.dashboard.index ');
        } elseif (Auth::user()->roles == 'Student') {
            return redirect()->route('student.dashboard.index ');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            if (Auth::attempt(['email' => request()->email, 'password' => request()->password])) {
                $user = User::where('id', '=', Auth::user()->id)->update(['active' => 1]);
                $request->session()->regenerate();
                if (Auth::user()->roles == 'Admin') {
                    return redirect()->route('admin.dashboard.index');
                } elseif (Auth::user()->roles == 'Registrar') {
                    return redirect()->route('registrar.dashboard.index ');
                } elseif (Auth::user()->roles == 'Teacher') {
                    return redirect()->route('teacher.dashboard.index ');
                } elseif (Auth::user()->roles == 'Student') {
                    return redirect()->route('student.dashboard.index ');
                }
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(Request $request)
    {

        $id = request()->validate([
            'id' => 'required|exists:users,id'
        ]);
        if ($id) {
            $user = User::where('id', '=', request()->id)->update(['active' => 0]);
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('home.index');
        }
    }
}
