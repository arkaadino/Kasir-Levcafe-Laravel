<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin(){
        if (Auth::check()){
            return redirect('/');
    } else{
        return view("/login");
    }
}

    public function actionLogin(Request $request){
        $data = [
            'email' => $request->email,
            'password'=> $request->password,
        ];

    if (Auth::attempt($data)){
        return redirect('/')->with('success','Login berhasil');
    } else{
        return redirect('/login')->with('error','Email atau Password salah !!!');
    }
}

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success','Sampai jumpa kembali!');
    }

}
