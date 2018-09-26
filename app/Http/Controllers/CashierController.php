<?php

namespace App\Http\Controllers;

use App\Food;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CashierController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:cashier');
    }

    public function menu(){

        $pizzas = Food::where('category','pizza')->get();
        $burgers = Food::where('category','burger')->get();
        $sandwiches = Food::where('category','sandwich')->get();
        $drinks = Food::where('category','drink')->get();

        return view('menu',compact('pizzas','burgers','sandwiches','drinks'));
    }

    public function editFood($id,Request $request){

        $type = DB::table('foods')->where('id',$id)->first();
        return view('editFood',compact('type'));
    }

    public function post_editFood($id,Request $request){


        return 1;
    }

    public function report(){

        // TODO Add Date filtering
        // TODO Total Income + Total food selling

        $arr = [];
        $orders = Order::where([['created_at','>',Carbon::today()],
            ['created_at','<',Carbon::today()->addHour(24)]])->pluck('order');


        for($i=0;$i<count($orders);$i++){

            $contents[$i] = unserialize($orders[$i]);

            for($t=0;$t<count($contents[$i]);$t++){
                $names[$i][$t] = $contents[$i][$t]['foodName'];
                $numbers[$i][$t] = $contents[$i][$t]['foodNumber'];
            }
            $foods[$i] = array_combine($names[$i],$numbers[$i]);

            foreach ($foods[$i] as $key=>$value){


                if (isset($arr[$key]))
                {
                    $arr[$key] += $value;
                }
                else
                {
                    $arr[$key] = $value;
                }
            }
        }

        return view('report',compact('arr'));
    }

    public function orders(){

        $orders = Order::where([['created_at','>',Carbon::today()],
            ['created_at','<',Carbon::today()->addHour(24)]])->get();

        return view('orders',compact('orders'));
    }
}
