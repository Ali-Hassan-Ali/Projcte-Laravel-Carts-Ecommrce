

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
                <a href="#"><img src="{{ asset('home_file/images/logo.svg')}}" alt="" class="img-responsive"></a>
            </div>
            <h4 style=" text-align:center;font-size: 25px;margin: 10px 0 0;">مرحباً  <br>{{$cliants->name}}</h4>
            <p style=" text-align:center; color: #777;padding: 0 40px;line-height: 1.5;">لقد اخترت تذكيرك عند توفر هذه البطاقة <a href="http://127.0.0.1:8000/en/Contact-Us" target="_blank"> تواصل معنا</a></p>
        </div>
        <div  style="background:#fff !important;padding:20px;border-radius:10px;">
        	<div class="content-ing" style="margin-bottom:40px;text-align: center;">
            	<h2 style="text-align:center;font-size:19px;">{!!$product->cart_name!!}<br>المتجر:{{$product->Market->name}}<br>{{$product->short_descript}}</h2>
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
