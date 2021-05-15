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
            <h4 style=" text-align:center;font-size: 25px;margin: 10px 0 0;">مرحبا  <br>{{$ticit[2]}}</h4><br><br>

        </div>
        <div  style="background:#fff !important;padding:20px;border-radius:10px;">
        	<div class="content-ing" style="margin-bottom:40px;text-align: center;">
            	
	<h2 style=" text-align:center;font-size: 10px;margin: 10px 0 0;">{!! $ticit[1] !!}</h2>
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
