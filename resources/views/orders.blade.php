@extends('master.layout')
@section('content')

<div class="container" style="margin-top: 2%;" id="order">
      <div class="flex-row flex-start">
        <a href="" class="btn btn-warning">دیروز</a>
        <a href="" class="btn btn-success">امروز</a>
        <button @click="reset" href="{{route('reset')}}" class="btn btn-danger">بازشماری سفارش</button>
      </div>
    @foreach($orders as $order)
        <input type="text" hidden value="{{$i=0}}">
        <div class="row" style="margin-top: 2%;margin-bottom: 2%;">
            <div class="col-sm-12 col-md-4 col-lg-4">
             <div class="card" style="padding: 1%;">
              <div class="flex-row space-around">

                <span>سفارش {{$order->order_number}}</span>
                <span>میز {{$order->table_id}}</span>
              </div>
            <table class="table table-striped">
             <tbody>
                @for($i=0;$i<count(unserialize($order->order));$i++)
                  <tr>
                    <td> {{unserialize($order->order)[$i]['foodName']}}</td>
                    <td> {{unserialize($order->order)[$i]['foodNumber']}} </td>
                    <td>{{unserialize($order->order)[$i]['price']}}</td>
                  </tr>
              @endfor
             </tbody>
            </table>
                 @if(\Carbon\Carbon::now()->diffInMinutes($order->created_at)>60)
                 <p>زمان: {{\Carbon\Carbon::now()->diffInHours($order->created_at)}} ساعت قبل</p>
                 @else
                     <p>زمان: {{\Carbon\Carbon::now()->diffInMinutes($order->created_at)}} دقیقه قبل</p>
                 @endif
            <span>مجموع کل : {{$order->price}}</span>
            <p>توضیحات: {{$order->info}}.</p>
              <div class="row space-around">
                  @if($order->delivered == 1)
                    <button  class="btn btn-primary">آماده ارسال </button>
                    @else
                      <button id="proc{{$order->id}}" onclick="delivered({{$order->id}})" class="btn btn-warning">درحال پردازش</button>
                @endif
                @if($order->paid == 1)
                    <button class="btn btn-success">پرداخت شد </button>
              @else
                      <button id="payment{{$order->id}}" onclick="paid({{$order->id}})" class="btn btn-info">در انتظار پرداخت</button>
              @endif

              </div>
            </div>
          </div>
        </div>
        <input type="hidden" value="{{$i=$i+1}}">
    @endforeach
</div>
<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
        overflow: hidden;
        background-color: #333;
    }

    .topnav a {
        /*float: right;*/
        /*display: inline-block;*/
        /*display: block;*/
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    .activeNav {
        background-color: #4CAF50;
        color: white;
    }

    .topnav .icon {
        display: none;
    }

    /*@media screen and (max-width: 600px) {
      .topnav a:not(:first-child) {display: none;}
      .topnav a.icon {
        float: right;
        display: block;
      }
    }

    @media screen and (max-width: 600px) {
      .topnav.responsive {position: relative;}
      .topnav.responsive .icon {
        position: absolute;
        right: 0;
        top: 0;
      }
      .topnav.responsive a {
        float: none;
        display: block;
        text-align: left;
      }
    }*/
</style>
<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
    function delivered(id) {

        axios.post('{{route('delivered')}}',{'id':id}).then(function (response) {

            console.log(response.data);
            document.getElementById('proc'+id).innerHTML='آماده ارسال';
            document.getElementById('proc'+id).className='btn btn-primary'


        })
    }
    function paid(id) {
        axios.post('{{route('paid')}}',{'id':id}).then(function (response) {
            document.getElementById('payment'+id).innerHTML='پرداخت شد';
            document.getElementById('payment'+id).className='btn btn-success';
        })
    }
    new Vue({
        el:'#order',
        data:{
            orders:[],
        },
        created:function () {

        },
        methods:{
            reset:function () {
                axios.get('{{route('reset')}}').then(function (response) {

                    alert(response.data)
                })
            }
        }
    })
</script>
@endsection
