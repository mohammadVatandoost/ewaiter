<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashierController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:cashier');
    }

    public function menu(){

        $pizza = Food::where('category','pizza')->get();
        $burger = Food::where('category','burger')->get();
        $sandwich = Food::where('category','sandwich')->get();
        $drink = Food::where('category','drink')->get();

        return view('menu',compact('pizza','burger','sandwich','drink'));
    }

    public function editFood(){

        return view('editFood');
    }

    public function report(){

        return view('report');
    }

    public function orders(){

        return view('orders');
    }
}
