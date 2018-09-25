<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){

        return view('login');
    }

    public function post_login(Request $request){

        if(Auth::guard('cashier')->attempt(['email'=>$request->email,'password'=>$request->password])){

            return redirect()->route('menu');
        }else{

            return redirect()->back()->with(['message'=>'0']);

        }
    }
}
