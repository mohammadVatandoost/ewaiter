<!DOCTYPE html>
<html>
<head>
	<title>Hot</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<script type="text/javascript" src="js/jquery.js"></script>
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	    <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.js"></script>
	            <script src="https://cdn.jsdelivr.net/vue.resource/1.2.1/vue-resource.min.js"></script>
	           <script src="https://cdn.jsdelivr.net/lodash/4.17.4/lodash.js"></script>
	            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
<header>
      <img src="{{asset('storage/images/burger1.jpg')}}" />
   	  <h1 class="text-center">Restuarnt Name</h1>
</header>
<div class="header">
  <h1>HOT</h1>
</div>

<nav id="nav">
  <ul>
    <li><a href="#section1">برگر</a></li>
    <li><a href="#section2">پیتزا</a></li>
    <li><a href="#section3">ساندویچ</a></li>
    <li><a href="#section4">نوشیدنی</a></li>
  </ul>
</nav>

<section id="section1" class="container">
	<h3>برگرها</h3>
	<div class="row">

		@foreach($burgers as $burger)
			<div class="col-sm-12 col-md-4 col-lg-4 food-card">
				<div class="card">
					<img class="card-img-top" src="{{asset('storage/images/'.$burger->image)}}" alt="Card image cap">
					<div class="card-body" id="cardId{{$burger->id}}">
						<div class="row flex-row space-between">
							<h5 class="card-title"> {{$burger->name}}</h5><span class="text-left">{{$burger->price}} تومان</span>
						</div>
						<p class="card-text">{{$burger->description}}</p>
						<div class="flex-row flex-start" id="{{$burger->id}}" style="direction: ltr;align-items: center;">
							<button class="btnNumber btnMines">-</button><span class="foodNumber">0</span><button class="btnNumber btnPlus">+</button>
							<input hidden value="{{$burger->price}}" />
						</div>
					</div>
				</div>
			</div>
		@endforeach

 </div>
</section>
<section id="section2" class="container">
	<h3>ساندویچ</h3>
	<div class="row">
		@foreach($sandwiches as $sandwich)
			<div class="col-sm-12 col-md-4 col-lg-4 food-card">
				<div class="card">
					<img class="card-img-top" src="{{asset('storage/images/'.$sandwich->image)}}" alt="Card image cap">
					<div class="card-body" id="cardId{{$sandwich->id}}">
						<div class="row flex-row space-between">
							<h5 class="card-title"> {{$sandwich->name}}</h5><span class="text-left">{{$sandwich->price}} تومان</span>
						</div>
						<p class="card-text">{{$sandwich->description}}</p>
						<div class="flex-row flex-start" id="{{$sandwich->id}}" style="direction: ltr;align-items: center;">
							<button class="btnNumber btnMines">-</button><span class="foodNumber">0</span><button class="btnNumber btnPlus">+</button>
							<input hidden value="{{$sandwich->price}}" />
						</div>
					</div>
				</div>
			</div>
		@endforeach

 	</div>
</section>
<section id="section3" class="container">
	<h3>پیتزا</h3>
	<div class="row">
		@foreach($pizzas as $pizza)
			<div class="col-sm-12 col-md-4 col-lg-4 food-card">
				<div class="card">
					<img class="card-img-top" src="{{asset('storage/images/'.$pizza->image)}}" alt="Card image cap">
					<div class="card-body" id="cardId{{$pizza->id}}">
						<div class="row flex-row space-between">
							<h5 class="card-title"> {{$pizza->name}}</h5><span class="text-left">{{$pizza->price}} تومان</span>
						</div>
						<p class="card-text">{{$pizza->description}}</p>
						<div class="flex-row flex-start" id="{{$pizza->id}}" style="direction: ltr;align-items: center;">
							<button class="btnNumber btnMines">-</button><span class="foodNumber">0</span><button class="btnNumber btnPlus">+</button>
							<input hidden value="{{$pizza->price}}" />
						</div>
					</div>
				</div>
			</div>
		@endforeach
 	</div>
</section>
<section id="section4" class="container">
	<h3>نوشیدنی</h3>
	<div class="row">
		@foreach($drinks as $drink)
			<div class="col-sm-12 col-md-4 col-lg-4 food-card">
				<div class="card">
					<img class="card-img-top" src="{{asset('storage/images/'.$drink->image)}}" alt="Card image cap">
					<div class="card-body" id="cardId{{$drink->id}}">
						<div class="row flex-row space-between">
							<h5 class="card-title"> {{$drink->name}}</h5><span class="text-left">{{$drink->price}} تومان</span>
						</div>
						<p class="card-text">{{$drink->description}}</p>
						<div class="flex-row flex-start" id="{{$drink->id}}" style="direction: ltr;align-items: center;">
							<button class="btnNumber btnMines">-</button><span class="foodNumber">0</span><button class="btnNumber btnPlus">+</button>
							<input hidden value="{{$drink->price}}" />
						</div>
					</div>
				</div>
			</div>
		@endforeach

	</div>
</section>

<a href="#" class="float" id="myBtn"><i class="fa fa-shopping-basket fa-6" aria-hidden="true"></i> <span id="cart">0</span></a>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="container" id="orderList">         
   </div>
  </div>

</div>

<script type="text/javascript">
	// Page Scroll
jQuery(document).ready(function ($) {
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
			|| location.hostname == this.hostname) {

			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top - 32
				}, 1000);
				return false;
			}
		}
	});
});

// Fixed Nav
jQuery(document).ready(function ($) {
	$(window).scroll(function(){
		var scrollTop = 142;
		if($(window).scrollTop() >= scrollTop){
			$('nav').css({
				position : 'fixed',
				top : '0'
			});
		}
		if($(window).scrollTop() < scrollTop){
			$('nav').removeAttr('style');
		}
	})

  // Active Nav Link
  $('nav ul li a').click(function(){
         $('nav ul li a').removeClass('active');
         $(this).addClass('active');
    });

		  $(document).on("scroll", onScroll);
})

function onScroll(event){
		var scrollPos = $(document).scrollTop();
		$('#nav a').each(function () {
				var currLink = $(this);
			 var refElement = $(currLink.attr("href"));
				if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
						$('nav ul li a').removeClass("active");
						currLink.addClass("active");
				}
				else{
						currLink.removeClass("active");
				}
		});
}

var order = [];
$('.btnMines').hide();
	var allPrice = 0;
$(document).on('click', '.btnMines', function () {
// $('.btnMines').click(function(){
   console.log('btnMines');console.log($(this).parent().attr('id'));
	 var foodId = $(this).parent().attr('id') ;
	 var foodNumber = $('#'+foodId+' span').text();console.log('foodNumber : '+foodNumber);
	 var cardId = $(this).parent().parent().attr('id') ;
	 var foodName = $('#'+cardId+' h5').text();console.log('foodName : '+foodName);
	 var price = $('#'+foodId+' input').val();
	 foodNumber = foodNumber - 1 ;
	 if(!(foodNumber < 0)) {
		 $('#'+foodId+' span').text(foodNumber);console.log('foodNumber : '+foodNumber);
		 setOrder(foodId, foodNumber, price, foodName);
	 }
	 if(foodNumber == 0) {
	 	$('#'+foodId+' .btnMines').hide();
	 }
});
$(document).on('click', '.btnPlus', function () {
// $('.btnPlus').click(function(){
			 console.log('btnPlus');console.log($(this).parent().attr('id'));
			 var foodId = $(this).parent().attr('id') ;
			 var foodNumber = $('#'+foodId+' span').text();console.log('foodNumber : '+foodNumber);
			 var cardId = $('#'+foodId).parent().attr('id') ;console.log('cardId : '+cardId);
	         var foodName = $('#'+cardId+' h5').text();console.log('foodName : '+foodName);
			 var price = $('#'+foodId+' input').val();
			 foodNumber = parseInt(foodNumber) + 1 ;
			 $('#'+foodId+' span').text(foodNumber);console.log('foodNumber : '+foodNumber);
			 setOrder(foodId, foodNumber, price, foodName);
			 $('#'+foodId+' .btnMines').show();
});

function setOrder(foodId, foodNumber, price, foodName) {
	if(order.length > 0) {
   for (var i = 0; i<order.length; i++) {
    if(order[i].foodId == foodId) {
			order[i].foodNumber = foodNumber;
		} else if( (i+1) == order.length) {
      order.push({foodId: foodId, foodNumber: foodNumber, price: price, foodName: foodName});
		}
	 }
 } else {
   order.push({foodId: foodId, foodNumber: foodNumber, price: price, foodName: foodName});
 }
 $('#cart').text(order.length);
	console.log('order : ');console.log(order);
}
// food1
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
	$("#orderList").empty();
    modal.style.display = "block";
    if(order.length > 0) {
       var htmlString = '<h2 class="text-center">سفارش شما</h2><ul class="orderList">';
//       var allPrice = 0 ;
       for(var i =0 ; i< order.length; i++) {
       	 allPrice = allPrice + (order[i].price*order[i].foodNumber) ;
       	 htmlString = htmlString+
       	                 `<li>
       	                    <div class="row flex-row space-between">
								 <h5 class="card-title">`+order[i].foodName+`</h5><span class="text-left">`+order[i].price*order[i].foodNumber+` تومان</span>
							</div>
							<div class="flex-row flex-start" id="food10" style="direction: ltr;align-items: center;">
								<button class="btnNumber btnMines">-</button><span class="foodNumber">`+order[i].foodNumber+`</span><button class="btnNumber btnPlus">+</button>
								<input hidden value="`+order[i].price+`" />
							 </div>
							</li>`
       }
       htmlString = htmlString +'</ul>';
       htmlString = htmlString +`
             <div class="flex-row space-between flex-center-align">
                <span class="roomNumber">شماره میز : </span>
                <input type="text" id="table_id" class="form-control" name="roomNumber">
             </div>
             <p>مجموع سفارش شما : <span>`+allPrice+`</span></p>
             <button onclick="sendOrder()" class="btn btn-success" style="display: block;margin: auto;">ثبت سفارش</button>
       `;
       $('#orderList').append(htmlString);
    } else {
       $('#orderList').append('<h2>لیست سفارش شما خالی است.</h2>');	
    }
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

function sendOrder() {

	var table_id = document.getElementById('table_id').value;

	axios.post('send-order',{'order':order,'table_id':table_id,'total_price':allPrice}).then(function (response) {

		console.log(response.data)

	})

}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<style type="text/css">
.roomNumber {
	width: 40%;
}
.orderList li { list-style: none;  }
.float{
	position:fixed;
	width:80px;
	height:40px;
	bottom:10px;
	right:10px;
	background-color:#0C9;
	color:#FFF;
	border-radius:10px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;font-size: 25px;
}

	@import url(https://reset5.googlecode.com/hg/reset.min.css);
@import url(https://fonts.googleapis.com/css?family=Nixie+One|Open+Sans:700italic,400,700|Open+Sans+Condensed:300,300italic,700|Slabo+13px);

.header {
  padding: 20px 0;
  background: #fff;
  font: normal 2em / normal 'Nixie One', serif;
  color: #ff6e6f;
  text-align: center;
}
nav {
  margin: 0;
  padding: 0;
  background: #ff6e6f;
  /* overflow: hidden; */
	z-index: 100;
}
nav ul {
  list-style: none;text-align: center;margin: 0;
  /* background: #226e6f; */
  /* overflow: hidden; */
}
nav ul li {
  display: inline-block; */
  /* margin: 0 -4px; */
  padding: 5px 0;
}
nav ul li a {
  padding: 10px 10px;
  font: normal 1em / normal 'Open Sans Condensed', sans-serif;
  color: #fff;
	text-decoration: none; display: block;
  /* text-transform: uppercase;width: inherit;height: inherit; */
}
nav ul li a:hover,
nav ul li a.active {
  background: #343434;list-style: none;text-decoration: none;
}
section {
  /* padding: 20px; */
  /* height: 500px; */
  /* font: normal 2em / normal 'Open Sans Condensed', sans-serif; */
}
section#section1,
section#section3 {
  /* background: #343434; */
  /* color: #eee; */
}
section#section2,
section#section4 {
  /* background: #666; */
  /* color: #eee; */
}
h1 {
  font-size: 2em;
}
footer {
  padding: 20px;
  background: #ff6e6f;
  font: normal 1em 'Open Sans Condensed', sans-serif;
  color: #fff;
  text-align: center;
}
.food-card {
   margin-bottom: 10px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    /*margin: 15% auto; */
    padding: 20px;
    border: 1px solid #888;
    width: 100%; /* Could be more or less, depending on screen size */
    height: 100%;
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>
</body>
</html>
