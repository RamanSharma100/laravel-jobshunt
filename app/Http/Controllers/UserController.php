<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\SeekerRegistrationRequest;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    const JOB_SEEKER = "job_seeker";

    public function index()
    {
        return view("user.register.index");
    }

    public function createSeeker()
    {
        return view("user.register.seeker");
    }

    public function storeSeeker(SeekerRegistrationRequest $request)
    {
        $request->validated();

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            'role' => self::JOB_SEEKER
        ]);

        return redirect()->route('/login')->with('success', 'Registered Successfully!!');
    }

    public function login()
    {
        return view('user.login.index');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return "Wrong email or password";
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
