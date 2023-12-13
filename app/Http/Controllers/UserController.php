<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationFormRequest;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    const JOB_SEEKER = "job_seeker";
    const JOB_POSTER = "employer";

    public function index()
    {
        return view("user.register.index");
    }

    public function createSeeker()
    {
        return view("user.register.seeker");
    }

    public function createEmployer()
    {
        return view("company.register.index");
    }

    public function storeSeeker(RegistrationFormRequest $request)
    {
        $request->validated();

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            'role' => self::JOB_SEEKER
        ]);

        return redirect()->route('login')->with('success', 'Registered Successfully!!');
    }

    public function storeEmployer(RegistrationFormRequest $request)
    {
        $request->validated();

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            'role' => self::JOB_POSTER,
            "user_trial" => now()->addWeek()
        ]);

        return redirect()->route('login')->with('success', 'Registered Successfully!!');
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
            return redirect()->intended('dashboard')->with('success', "Successfully LoggedIn!");
        }

        return "Wrong email or password";
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
