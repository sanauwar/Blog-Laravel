<?php

namespace App\Http\Controllers;

use App\Http\Controllers\session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;

class CustomAuthController extends Controller
{
    public function view()
    {
        return view('custom_auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            if (!User::where('email', $request->email)->first()) {
                return back()->with('email_error', 'Email is incorrect');
            } elseif (!User::where('email', $request->email)->where('password', $request->password)->first()) {
                return back()->with('password_error', 'Password is incorrect');
            }
        }

        return redirect('/home')->with('success', 'LoginSuccessfully');
    }

    public function register()
    {
        return view('custom_auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:12',
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return back()->with('message', 'Registration Successfully!');
    }

    public function home()
    {
        $userId = Auth::id();
        // dd($userId);
        $user = User::select('users.id',  'blogs.userId', 'blogs.title', 'blogs.description')
            ->join('blogs', 'users.id', '=', 'blogs.userId',)
            ->where('blogs.userId', $userId)
            ->get();
        return view('custom_auth.home', ['users' => $user]);
    }

    public function logout(Request $request)
    {
        session()->flush('success', 'You have been logged out successfully.');
        return redirect('/user/login');
    }
}
