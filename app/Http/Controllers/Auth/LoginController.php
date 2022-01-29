<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Log;
use App\User;
use Illuminate\Support\Facades\Hash;

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
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard.index ');
        } elseif (Auth::user()->role == 'registrar') {
            return redirect()->route('registrar.dashboard.index ');
        }elseif (Auth::user()->role == 'teacher') {
            return redirect()->route('teacher.dashboard.index ');
        } elseif (Auth::user()->role == 'student') {
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
                User::where('id', '=', Auth::user()->id)->update(['active' => 1]);
                $request->session()->regenerate();
                if (Auth::user()->role == 'admin') {
                    return redirect()->intended(route('admin.dashboard.index'));
                } elseif (Auth::user()->role == 'registrar') {
                    return redirect()->intended(route('registrar.dashboard.index'));
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
            User::where('id', '=', request()->id)->update(['active' => 0]);
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Auth::logout();
            return redirect()->route('home.index');
        }
    }
}
