@extends('master.layout')
@section('content')

    <div class="container" style="margin-top: 2%;">
  <form>
   <div class="flex-row flex-wrap" id="calender">
      <span>از تاریخ</span>
      <select class="form-control" name="year1">
         <option value="bergers">1397</option>
         <option value="sandewitch">1396</option>
      </select>
      <select class="form-control" name="month1">
         <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
         <option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option>
         <option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
      </select>
      <select class="form-control" name="day1">
         <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
         <option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option>
         <option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
         <option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option>
         <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
         <option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option>
         <option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option>
         <option value="29">29</option><option value="30">30</option><option value="31">31</option>
      </select>
      <span>تا تاریخ</span>
      <select class="form-control" name="year2">
         <option value="bergers">1397</option>
         <option value="sandewitch">1396</option>
      </select>
      <select class="form-control" name="month2">
         <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
         <option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option>
         <option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
      </select>
      <select class="form-control" name="day2">
         <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
         <option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option>
         <option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
         <option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option>
         <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
         <option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option>
         <option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option>
         <option value="29">29</option><option value="30">30</option><option value="31">31</option>
      </select>
   </div>
   <button class="btn btn-primary" style="margin: auto;display: block;">گزارش</button>
  </form>
   <table class="table table-striped" style="margin-top: 2%;">
    <thead>
      <tr>
        <th>نام غذا</th>
        <th>تعداد</th>
        <th>هزینه واحد (تومان)</th>
        <th>فروش کل (تومان)</th>
      </tr>
    </thead>
    <tbody>
    @foreach($arr as $key=>$value)
      <tr>
        <td>{{$key}}</td>
        <td>{{$value}}</td>
        <td>{{\App\Food::where('name',$key)->first()->price}}</td>
        <td>150000</td>
      </tr>
      <tr>
    @endforeach
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><b>مجموع فروش : 2000000</b></td>
      </tr>
    </tbody>
  </table>
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
#calender span {
   width: 5%;margin-left: 1%;margin-right: 1%;
}
#calender select {
   width: 10%;margin-left: 1%;margin-right: 1%;margin-bottom: 2%;
}

@media screen and (max-width: 840px) {
  #calender span {
   width: 8%;margin-left: 1%;margin-right: 1%;
  }
  #calender select {
   width: 11%;margin-left: 1%;margin-right: 1%;
  }
}

@media screen and (max-width: 600px) {
  #calender span {
   width: 15%;margin-left: 1%;margin-right: 1%;
  }
  #calender select {
   width: 25%;margin-left: 1%;margin-right: 1%;
  }
}
</style>
<script>
</script>

@endsection