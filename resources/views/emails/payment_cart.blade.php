

<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
	<meta content="telephone=no" name="format-detection" />
	<meta content="width=mobile-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;" name="viewport" />


	<meta content="IE=9; IE=8; IE=7; IE=EDGE;" http-equiv="X-UA-Compatible" />
	<title>Ingredients</title>

	<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

	
	<style>
	 
		@media only screen and (max-width: 991px) {
		  .latter, .box-latter {
			width: 100% !important;
			padding: 20px 0 !important;
		   }
		}
		
	</style>
</head>

<body style="background:#F0F2F7;font-family: Cairo !important">
    <div class="box-latter" style=" width:30%;margin: auto;background: #F0F2F7;padding: 20px;">
        <div style="text-align: center;">
            <style scoped>
                @media only screen and (max-width: 991px) {
        		  .latter, .box-latter {
        			width: 100% !important;
        			padding: 20px 0 !important;
        		   }
        		}
                }
            </style>
            <div class="logo-site">
                <a href=""><img src="{{ asset('home_file/images/logo.svg')}}" alt="" class="img-responsive"></a>
            </div>
            <h4 style=" text-align:center;font-size: 25px;margin: 10px 0 0;">مرحباً  <br>{{\Auth::guard('cliants')->user()->name}}</h4><br><br>
			<h4 style=" text-align:center;font-size: 25px;margin: 10px 0 0;"> عمليه شراء ناجحة بمبلغ $ {{Cart::subtotal()}} تفصيل الطلب</h4><br>

        </div>
        <div  style="background:#fff !important;padding:20px;border-radius:10px;">
        	<div class="content-ing" style="margin-bottom:40px;text-align: center;">
				<h2 style="text-align: center;font-size:19px;">عمليه شراء ناجحة بمبلغ اجمالي {{ Session::get('price_icon')}} {{Cart::subtotal()}} </h2>

					@foreach($carts as $index=>$cart)
					@foreach(\Cart::content() as $sess)
					<p style="text-align: center"><strong>  المنتج: </strong> {{$sess->model->cart_name}}</p>
					<p  style="text-align: center"><strong>الكمية:</strong>{{$sess->qty}}</p>
					<div class="list-ing" style=" border-bottom: 1px solid #ececec;margin-bottom: 10px; padding-bottom: 10px;">
						<p style="text-align: center;margin:0;">كود البطاقة</p>
                    @foreach($cart as $val)
                    <a href="" style="overflow-wrap: break-word">{!!$val->cart_code!!}</a><br>
					</div>
                    @endforeach
					@endforeach
				    @endforeach

            	<div class="list-ing" style=" border-bottom: 1px solid #ececec;margin-bottom: 10px; padding-bottom: 10px;">
            	</div>
            	<div>
            	    <p style="text-align:center;margin-bottom: 0; font-weight: 600">تحياتنا</p>
            	    <p style="text-align:center;margin-top: 0; font-weight: 600">فريق مجال ستور</p>
            	</div>
        	</div>
        </div>
    </div>


</body>

</html>
