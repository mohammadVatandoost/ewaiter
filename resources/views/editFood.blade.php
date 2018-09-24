@extends('master.layout')
@section('content')

<div class="container" style="margin-top: 2%;">
  <h4>تغییر اطلاعات غذا</h4>
    <form action="/action_page.php" style="margin-bottom: 2%;">
      <div class="form-group">
       <label>نام غذا</label>
       <input type="text" name="foodName" class="form-control" value="برگر">
      </div>
      <div class="form-group">
       <label>توضیح غذا</label>
       <input type="text" name="foodِDes" class="form-control" value="فوق العاده است">
      </div>
      <div class="form-group">
       <label>قیمت غذا</label>
       <input type="number" name="foodِPrice" class="form-control" value="100000">
      </div>
      <div class="form-group">
        <label for="sel1">انتخاب دسته غذا</label>
        <select class="form-control" id="sel1" name="foodCategory">
         <option value="bergers">برگرها</option>
         <option value="sandewitch">ساندویچ ها</option>
        </select>
      </div>
      <div class="form-group">
       <label>عکس غذا</label>
       <input type="file" name="foodِImage" class="form-control">
      </div>
      <button class="btn btn-primary col-md-1 col-sm-1">ذخیره</button>
    </form>

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
</style>
<script>
</script>
@endsection