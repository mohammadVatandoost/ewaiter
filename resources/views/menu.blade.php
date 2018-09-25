@extends('master.layout')
@section('content')
<div class="container" style="margin-top: 2%;">
<!-- Tab links -->
<div class="tab" style="direction: rtl;">
  <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'menu')">منو</button>
  <button class="tablinks" onclick="openCity(event, 'menuCategory')">دسته بندی منو</button>
  <button class="tablinks" onclick="openCity(event, 'menuFood')">اضافه کردن غذا</button>
</div>
<!--   <div class="flex-row space-around">
    <a href="menuCategory.html" class="btn btn-primary">اضافه کردن دسته</a>
    <a href="" class="btn btn-primary">اضافه کردن غذا</a>
  </div>
  <hr/> -->
  <!-- Menu -->
 <div id="menu" class="tabcontent">
  <h3 class="text-center">برگرها</h3>
  <div class="row">
    <div class="col-sm-12 col-md-4 col-lg-4 food-card">
      <div class="card">
             <img class="card-img-top" src="{{asset('storage/images/burger1.jpg')}}" alt="Card image cap">
             <div class="card-body" id="cardId1">
              <div class="row flex-row space-between">
                 <h5 class="card-title">پیتزا فلان</h5><span class="text-left">30000 تومان</span>
              </div>
              <p class="card-text">گوشت ، فلفل، قارچ و پنیر پیتزار</p>
              <div class="flex-row space-around" id="food1">
                <a href="editFood.html" class="btn btn-primary">تغییر</a>
                <a href="" class="btn btn-primary">حذف</a>
                <a href="" class="btn btn-primary">موجود</a>
              </div>
             </div>
          </div>
      </div>
    </div>
 </div>
    <div id="menu" class="tabcontent">
        <h3 class="text-center">برگرها</h3>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 food-card">
                <div class="card">
                    <img class="card-img-top" src="{{asset('storage/images/burger1.jpg')}}" alt="Card image cap">
                    <div class="card-body" id="cardId1">
                        <div class="row flex-row space-between">
                            <h5 class="card-title">پیتزا فلان</h5><span class="text-left">30000 تومان</span>
                        </div>
                        <p class="card-text">گوشت ، فلفل، قارچ و پنیر پیتزار</p>
                        <div class="flex-row space-around" id="food1">
                            <a href="editFood.html" class="btn btn-primary">تغییر</a>
                            <a href="" class="btn btn-primary">حذف</a>
                            <a href="" class="btn btn-primary">موجود</a>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>


 <!-- Menu category -->
 <div id="menuCategory" class="tabcontent"> 
    <h4>اضافه کردن دسته جدید</h4>
    <form class="flex-row flex-start" action="/action_page.php" style="margin-bottom: 2%;">
      <input class="form-control col-md-3 col-sm-8" type="text" name="category" placeholder="نام دسته">
      <input class="form-control col-md-3 col-sm-2" type="number" name="priority" placeholder="ترتیب نمایش">
      <button class="btn btn-primary col-md-1 col-sm-1">ثبت</button>
    </form>
    <hr/>
    <h4>دسته های اضافه شده</h4>
    <ul>
      <li>
        <div class="flex-row flex-start flex-center-align" style=" text-align: center;">
          <a href="" class="btn btn-danger">حذف</a> <h5> برگرها </h5><input class="form-control" type="number" name="bergers" value="3" style="width: 100px;" />
        </div>
      </li>
      <li>
        <div class="flex-row flex-start flex-center-align" style=" text-align: center;">
          <a href="editFood.html" class="btn btn-danger">حذف</a> <h5> برگرها </h5><input class="form-control" type="number" name="bergers" value="3" style="width: 100px;" />
        </div>
      </li>
    </ul>
    <a href="" class="btn btn-success" style="display: block;margin: auto;">ذخیره</a>
 </div>
 <!-- Menu category -->
 <div id="menuFood" class="tabcontent"> 
    <h4>اضافه کردن غذا</h4>
    <form action="/action_page.php" style="margin-bottom: 2%;">
      <div class="form-group">
       <label>نام غذا</label>
       <input type="text" name="foodName" class="form-control">
      </div>
      <div class="form-group">
       <label>توضیح غذا</label>
       <input type="text" name="foodِDes" class="form-control">
      </div>
      <div class="form-group">
       <label>قیمت غذا</label>
       <input type="text" name="foodِPrice" class="form-control">
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
      <button class="btn btn-primary col-md-1 col-sm-1">ثبت</button>
    </form>
 </div>
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

    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
        background-color: inherit;
        float: right;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
    .tabcontent {
        animation: fadeEffect 1s; /* Fading effect takes 1 second */
    }

    /* Go from zero to full opacity */
    @keyframes fadeEffect {
        from {opacity: 0;}
        to {opacity: 1;}
    }

    #menuCategory li {
        list-style: none;
        margin: 1%;
    }
    #menuCategory li h5{
        margin-right: 2%;margin-left: 2%;
        display: inline-block;
        vertical-align: middle;
    }
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


    function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>

@endsection

