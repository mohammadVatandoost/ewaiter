<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Food;
class PageController extends Controller
{
    public function index(){

        $types = Category::orderBy('priority','asc')->get()->pluck('type');
        $foods = [];
        for($i=0;$i<count($types);$i++){

            $foods[$i] = Food::where('category',$types[$i])->where('valid',1)->get();
        }


//        $pizzas = Food::where('category','پیتزا')->get();
//        $burgers = Food::where('category','برگر')->get();
//        $sandwiches = Food::where('category','ساندویچ')->get();
//        $drinks = Food::where('category','نوشیدنی')->get();

//        return view('index',compact('pizzas','burgers','sandwiches','drinks'));
        return view('index',compact('foods','types'));

    }


    public function contact(){

        return 'contact';
    }
}
