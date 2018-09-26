<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
class PageController extends Controller
{
    public function index(){

        $pizzas = Food::where('category','pizza')->get();
        $burgers = Food::where('category','burger')->get();
        $sandwiches = Food::where('category','sandwich')->get();
        $drinks = Food::where('category','drink')->get();

        return view('index',compact('pizzas','burgers','sandwiches','drinks'));

    }


    public function contact(){

        return 'contact';
    }
}
