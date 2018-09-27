<?php

namespace App\Http\Controllers;

use App\Category;
use App\Food;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

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
        $cats = Category::all();
        return view('menu',compact('pizzas','burgers','sandwiches','drinks','cats'));
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
        if(!Cache::has('order')){
            $orders = Order::where([['created_at','>',Carbon::today()],
                ['created_at','<',Carbon::today()->addHour(24)]])->pluck('order');
        }
        else{
            $orders = Cache::get('order');
        }


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

    public function post_report(Request $request){

        Cache::forget('order');
        $date1 = (new Jalalian($request->year1,$request->month1,$request->day1))->toCarbon()->toDateTimeString();
        $date2 = (new Jalalian($request->year2,$request->month2,$request->day2))->toCarbon()->toDateTimeString();
        $orders = Order::where([['created_at','>',$date1],
            ['created_at','<',$date2]])->pluck('order');
        Cache::put('order',$orders,1);
        return redirect()->route('report');

    }

    public function orders(){

            $orders = Order::where([['created_at','>',Carbon::today()],
                ['created_at','<',Carbon::today()->addHour(24)]])->get();
            return view('orders',compact('orders'));


    }

    public function delivered(Request $request){

        Order::where('id',$request->id)->first()->update(['delivered'=>1]);
        return 200;
    }

    public function paid(Request $request){

        Order::where('id',$request->id)->first()->update(['paid'=>1]);
        return 200;
    }

    public function addCategory(Request $request){

        $cat = new Category();
        $cat->type = $request->category;
        $cat->priority = $request->priority;
        $cat->save();
        return 200;


    }
    public function removeCategory(Request $request){

        Category::where('id',$request->id)->first()->delete();
        return 200;
    }

    public function getCats(){

        return Category::all()->pluck('type');

    }

    public function addFood(Request $request){

        $food = new Food();
        $food->name = $request->foodName;
        $food->price = $request->foodPrice;
        $food->description = $request->foodDes;
        $food->category = $request->foodCategory;
        $food->image = time().'-'.$request->file('foodImage')->getClientOriginalName();
        $request->file('foodImage')->move('storage/images',time().'-'.$request->file('foodImage')->getClientOriginalName());
        $food->save();
        return redirect()->back();
    }
}
