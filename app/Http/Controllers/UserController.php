<?php

namespace App\Http\Controllers;

use App\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function sendOrder(Request $request){

        $order = new Order();
        $orderArr = $request->order;
        $order->order = serialize($orderArr);
        $order->price = $request->total_price;
        $order->table_id = $request->table_id;

        if(!Cache::has('order_number')){
            Cache::put('order_number',1,1440);
        }else{
            Cache::put('order_number',Cache::get('order_number')+1,1440);
        }
        $order->order_number = Cache::get('order_number');
        $order->save();
        for($i=0;$i<count($orderArr);$i++){
            $sold = DB::table('foods')->where('id',$orderArr[$i]['foodId'])->first()->sold;
            DB::table('foods')->where('id',$orderArr[$i]['foodId'])
                ->update(['sold'=> $sold + $orderArr[$i]['foodNumber']]);
        }


        return 200 ;
    }

    public function reset(Request $request){

        Cache::forget('order_number');
        return 200;
    }
}
