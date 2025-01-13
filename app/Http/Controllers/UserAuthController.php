<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class UserAuthController extends Controller
{
    public function index(){
        return view('Auth.userlogin');
    }

    public function auth(Request $request){
        $request->validate([
           'email' => 'required',
           'password' => 'required',
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)) {
           return redirect()->intended('/')->with('success','Berhasil Login');
        } else {
           return redirect('/login')->with('error','Email Atau Password Salah');
        }
   }


   public function registerindex(){

     return view('Auth.userregister');

   }

   public function register(Request $request){
     $users = User::create([
          "name" => $request->username,
          "slug" => Str::slug($request->username),
          "user_roles_id" => 2,
          "email" => $request->email,
          "password" => bcrypt($request->password),

     ]);

     auth()->login($users);

    return redirect('/');
   }
}
