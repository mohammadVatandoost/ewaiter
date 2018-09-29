<!DOCTYPE html>
<html>
<head>
    <title>Hot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script type="text/javascript" src="{{URL::asset('js/jquery.js')}}"></script>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/main.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.js"></script>
                <script src="https://cdn.jsdelivr.net/vue.resource/1.2.1/vue-resource.min.js"></script>
               <script src="https://cdn.jsdelivr.net/lodash/4.17.4/lodash.js"></script>
                <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
<nav class="topnav flex-row space-around" id="myTopnav">
    @if(request()->route()->getName() == 'orders')
        <a class="activeNav" href="{{route('orders')}}">سفارش ها</a>
        <a  href="{{route('report')}}">گزارش فروش</a>
        <a  href="{{route('settings')}}">تنظیمات</a>
        <a  href="{{route('menu')}}" >منو</a>
        @elseif(request()->route()->getName() == 'report')
        <a  href="{{route('orders')}}">سفارش ها</a>
        <a class="activeNav" href="{{route('report')}}">گزارش فروش</a>
        <a  href="{{route('settings')}}">تنظیمات</a>
        <a  href="{{route('menu')}}" >منو</a>

        @elseif(request()->route()->getName() == 'settings')
        <a  href="{{route('orders')}}">سفارش ها</a>
        <a  href="{{route('report')}}">گزارش فروش</a>
        <a class="activeNav" href="{{route('settings')}}">تنظیمات</a>
        <a  href="{{route('menu')}}" >منو</a>

    @elseif(request()->route()->getName() == 'menu')
        <a  href="{{route('orders')}}">سفارش ها</a>
        <a  href="{{route('report')}}">گزارش فروش</a>
        <a  href="{{route('settings')}}">تنظیمات</a>
        <a class="activeNav" href="{{route('menu')}}" >منو</a>

        @elseif(request()->route()->getName() == 'editFood')

        <a  href="{{route('orders')}}">سفارش ها</a>
        <a  href="{{route('report')}}">گزارش فروش</a>
        <a  href="{{route('settings')}}">تنظیمات</a>
        <a class="activeNav" href="{{route('menu')}}" >منو</a>

    @endif



    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
</nav>

@yield('content')

</body>
</html>