<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CustomeAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;


class CustomeAuthController extends Controller
{
    public function register()
    {
        return view("register");
    }

    public function login()
    {
        return view("login");
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . CustomeAuth::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new CustomeAuth();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();

        if ($res) {
            return back()->with('success', 'You have registered successfully');
        } else {
            return back()->with('fail', 'Something wrong');
        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);


        $user = CustomeAuth::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('home');
            } else {
                return back()->with('fail', 'Password does not match.');
            }
        } else {
            return back()->with('fail', 'This email is not registered.');
        }
    }

    public function home(Request $request)
    {
        $data = null;
        if ($request->session()->has('loginId')) {
            $userId = $request->session()->get('loginId');
            $data = CustomeAuth::find($userId);
        }
        return view('home', compact('data'));
    }
}
