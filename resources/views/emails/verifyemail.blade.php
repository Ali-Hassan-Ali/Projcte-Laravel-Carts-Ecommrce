

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
            <h4 style=" text-align:center;font-size: 25px;margin: 10px 0 0;">مرحباً  <br>{{$cliant->name}}</h4>
            <p style=" text-align:center; color: #777;padding: 0 40px;line-height: 1.5;">إذا كنت قد استلمت هذه الرسالة ولم تقم بإنشاء حساب فقط تجاهلها. تواجه أي مشكلة في تأكيد الحساب؟ <a href="http://127.0.0.1:8000/en/Contact-Us" target="_blank"> تواصل معنا</a></p>
        </div>
        <div  style="background:#fff !important;padding:20px;border-radius:10px;">
        	<div class="content-ing" style="margin-bottom:40px;text-align: center;">
            	<h2 style="text-align:center;font-size:19px;">بريد تفعّيل الحساب على دليل ستور</h2>
            	<a href="http://127.0.0.1:8000/en/Email/{{$cliant->id}}/{{$cliant->code_email}}" target="_blank" style="text-decoration: none;background: linear-gradient(180deg, rgba(255,138,85,1) 0%, rgba(255,68,175,1) 100%);color: #fff !important;padding: 10px 20px;border: 1px solid rgba(255,138,85,1);border-radius: 20px;position: relative;overflow: hidden;font-weight: 500; margin-bottom:30px;font-family: Cairo !important">تفعيل الحساب</a><br><br>
            	<div class="list-ing" style=" border-bottom: 1px solid #ececec;margin-bottom: 10px; padding-bottom: 10px;">
            		<p style="text-align:center;margin:0;">كما يمكنك نسخ الرابط وإستخدامه ضمن المتصفح</p>
            		<a href="http://127.0.0.1:8000/en/Email/{{$cliant->id}}/{{$cliant->code_email}}" style="overflow-wrap: break-word" target="_blank">http://127.0.0.1:8000/en/Email/{{$cliant->id}}/{{$cliant->code_email}}</a>
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
