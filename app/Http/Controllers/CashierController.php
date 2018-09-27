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

//        $pizzas = Food::where('category','pizza')->get();
//        $burgers = Food::where('category','burger')->get();
//        $sandwiches = Food::where('category','sandwich')->get();
//        $drinks = Food::where('category','drink')->get();
        $types = Category::orderBy('priority','asc')->get()->pluck('type');
        $foods = [];
        for($i=0;$i<count($types);$i++){

            $foods[$i] = Food::where('category',$types[$i])->get();
        }
        $cats = Category::orderBy('priority','asc')->get();
        return view('menu',compact('foods','types','cats'));
    }

    public function editFood($id,Request $request){

        $type = DB::table('foods')->where('id',$id)->first();
        return view('editFood',compact('type'));
    }

    public function post_editFood($id,Request $request){

        $food = Food::where('id',$id)->first();

        if(!is_null($request->foodName)){
            $food->update(['name'=>$request->foodName]);
        }
        if(!is_null($request->foodDes)){
            $food->update(['description'=>$request->foodDes]);
        }
        if(!is_null($request->foodPrice)){
            $food->update(['price'=>$request->foodPrice]);
        }
        if(!is_null($request->foodCategory)){
            $food->update(['category'=>$request->foodCategory]);
        }
        if(!is_null($request->foodImage)){
            unlink(public_path('storage/images/'.$food->image));
            $food->image = time().'-'.$request->file('foodImage')->getClientOriginalName();
            $request->file('foodImage')->move('storage/images',time().'-'.$request->file('foodImage')->getClientOriginalName());
            $food->update(['image'=>time().'-'.$request->file('foodImage')->getClientOriginalName()]);
        }
        return redirect()->back()->with(['message'=>'تغییرات ذخیره شد.']);


    }

    public function report(){

        // TODO Add Date filtering


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
        return Order::where('id',$request->id)->first();
    }

    public function addCategory(Request $request){

        $cat = new Category();
        $cat->type = $request->category;
        $cat->priority = $request->priority;
        $cat->save();
        return redirect()->back();


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

    public function validFood(Request $request){
        $stat = Food::where('id',$request->id)->first()->valid;
        Food::where('id',$request->id)->first()->update(['valid'=>!$stat]);
        return 200;
    }
    public function removeFood(Request $request){
        Food::where('id',$request->id)->first()->delete();
        return redirect()->back();
    }

    public function catPriority(Request $request){

        $cats = Category::all()->pluck('type');
        for($i=0;$i<count($cats);$i++){

            $priority = $request[$cats[$i]];

            if(!is_null($priority)){
                Category::where('type',$cats[$i])->first()->update(['priority'=>$priority]);
            }
        }
// TODO Remove related items when deleting a category
        if(!is_null($request->removeList)){
            $removeList = explode(',',$request->removeList);
            for($t=0;$t<count($removeList);$t++){
                Category::where('id',$removeList[$t])->first()->delete();
            }
        }
                    return redirect()->back();
    }

    public function getStat(){
        $orders = Order::where([['created_at','>',Carbon::today()],
            ['created_at','<',Carbon::today()->addHour(24)]])->get();
        return $orders;
    }
}
