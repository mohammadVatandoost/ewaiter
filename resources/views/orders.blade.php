@extends('master.layout')
@section('content')

<div class="container" style="margin-top: 2%;">
      <div class="flex-row flex-start">
        <a href="" class="btn">دیروز</a>
        <a href="" class="btn btn-success">امروز</a>
      </div>
    @foreach($orders as $order)
        <input type="text" hidden value="{{$i=0}}">
        <div class="row" style="margin-top: 2%;margin-bottom: 2%;">
            <div class="col-sm-12 col-md-4 col-lg-4">
             <div class="card" style="padding: 1%;">
              <div class="flex-row space-around">
                <span>سفارش 5</span>
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
            <span>مجموع کل : {{$order->price}}</span>
            <p>توضیحات: {{$order->info}}.</p>
              <div class="row space-around">
                <button class="btn btn-primary">تمام شد</button>
                <button class="btn btn-success">پرداخت شد</button>
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
</script>
@endsection
