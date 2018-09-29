@extends('master.layout')
@section('content')
<div class="container" style="margin-top: 2%;">
	<h1 class="text-center">پروفایل رستوران</h1>
    <form action="{{route('addFood')}}" method="post" enctype="multipart/form-data" style="margin-bottom: 2%;">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-group">
       <label>نام رستوران</label>
       <input type="text" name="foodName" class="form-control">
      </div>
      <div class="form-group">
       <label>عکس بنر منو</label>
       <input type="file" name="foodImage" class="form-control">
      </div>
      <!-- <div class="form-check"> -->
        <label class="container-checkBox">پرداخت بعد از ثبت سفارش : 
         <input type="checkbox" checked="checked">
         <span class="checkmark"></span>
        </label>
       <!-- <label class="form-check-label">
         <input type="checkbox" class="form-check-input" value=""> پرداخت قبل از ثبت سفارش 
        </label> -->
      <!-- </div> -->
      <button type="submit" class="btn btn-primary col-md-1 col-sm-1">ثبت</button>
    </form>
</div>

<style>
/* The container */
.container-checkBox {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    width: 300px;
}

/* Hide the browser's default checkbox */
.container-checkBox input {
    position: absolute;
    opacity: 0;
    cursor: pointer; 
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 7px;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container-checkBox:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container-checkBox input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container-checkBox input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container-checkBox .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>
@endsection