<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function create()
    {
        return view('admin.users.register');

    }

    public function store (Request $request)
    {
       $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'password'=>'required|confirmed',
       ]);

       $user = User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
       ]);
       session()->flash('success', ' Регистрация пройдена');
       Auth::login($user);
       return redirect()->route('home');
    }

    public function loginForm()
    {
        return view('admin.users.login');

    }
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
           ]);

        if(Auth::attempt([
            'email'=>$request->email,
            'password' => $request->password,
        ])){
            session()->flash('success', 'You are logged');
            if(Auth::user()->is_admin){
                return redirect()->route('admin.index');
            }else{
                return to_route('home');
            }
        }
        return redirect()->back()->with('error', 'Ошибка');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.create');

    }
}
