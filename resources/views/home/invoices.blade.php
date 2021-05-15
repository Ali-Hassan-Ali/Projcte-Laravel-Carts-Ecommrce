<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>مجال ستور </title>

    <!-- Stylesheets -->
    <link href="{{ asset('home_file/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('home_file/css/material-design-iconic-font.css')}}" rel="stylesheet">
    <link href="{{ asset('home_file/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('home_file/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('home_file/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
    <link href="{{ asset('home_file/css/animate.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('home_file/css/style.css')}}" rel="stylesheet">
    <!-- Responsive -->
    <link href="{{ asset('home_file/css/responsive.css')}}" rel="stylesheet">


    <script src="{{ asset('home_file/js/jquery-3.2.1.min.js')}}"></script>
</head>

<body cz-shortcut-listen="true">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <div class="invoice"> <br> <img src="{{ asset('home_file/images/logo.svg')}}" width="140">
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <address>
                                <p><strong>المملكة العربية السعودية</strong></p>
                                <p>المملكة العربية السعودية - الرياض </p>
                                <p>البريد الإلكتروني : contact@daleelstore.com</p>
                                <p>رقم الجوال : </p>
                                <p>الرقم الضريبي : 3101557541</p>
                            </address>
                        </div>
                        <div class="col-lg-4 text-left"> <br>
                            <address>
                                <p><strong class="inline">رقم الطلب:</strong> {{$purchases_first->number}}</p>
                                <p><strong class="inline">رقم الفاتورة:</strong> {{$purchases_first->id}}</p>
                                <p><strong class="inline">تاريخ الفاتورة:</strong> {{$purchases_first->date}}</p>
                                @if($purchases_first->purchases_status == 1)
                                <p><strong class="inline">حالة الطلب:</strong> مكتمل</p>
                                @elseif($purchases_first->purchases_status == 2)
                                <p><strong class="inline">حالة الطلب:</strong> الانتظار</p>
                                @else 
                                <p><strong class="inline">حالة الطلب:</strong> متوقفة</p>
                                @endif
                            </address>
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <p><strong>معلومات الحساب</strong></p>
                        <div class="panel panel-default panel-table mb-4">
                            <div class="row">
                                <div class="col-sm-4" style="display: inline-table;"> <strong>الاسم</strong> <br>{{Auth::guard('cliants')->user()->name}} </div>
                                <div class="col-sm-4" style="display: inline-table;"> <strong>رقم الجوال</strong> <br> {{Auth::guard('cliants')->user()->phone_number}} </div>
                                <div class="col-sm-4" style="display: inline-table;"> <strong>البريد الإلكتروني</strong> <br> {{Auth::guard('cliants')->user()->email}} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <p><strong>تفاصيل المنتجات ضمن عملية الشراء</strong></p>
        <table class="table table-striped table-bordered table-list">
            <thead>
                <tr>
                    <th width="20%">المنتج</th>
                    <th>العدد</th>
                    <th>سعر البطاقة</th>
                    <th>المبلغ الكلي</th>
                    <th>VAT {{$purchases_first->rate}} </th>
                    <th>المبلغ الإجمالي</th>
                </tr>
            </thead>
            @foreach($purchases as $purchase)
            <tbody>
                <tr>
                    <td width="30%"><p>{{$purchase->cart_name}}</p></td>
                    <td><p>{{$purchase->quantity}}</p></td>
                    <td><p> {{$purchase->price}} {{$purchase->rate}}</p></td>
                    <td><p> {{$purchase->price * $purchase->quantity}} {{$purchase->rate}}</p></td>
                    <td><p> {{$purchase->totaltax}} {{$purchase->rate}}</p></td>
                    <td><p> {{$purchase->newTotalwithTax}} {{$purchase->rate}}</p></td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    <div class="container">
        <div class="">
            <p>&nbsp;</p>
            <div class="row">
                <div class="col-md-4">
                    <table class="table table-striped table-bordered table-list">
                        <tbody>
                            <tr>
                                <td>ضريبة القيمة المضافة</td>
                            </tr>
                            <tr>
                                <td>{{$purchases_first->totaltax}} {{$purchases_first->rate}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-8 text-left">
                    <div class="text-left" style="display: inline-table;">
                        <p><strong>إجمالي الطلب: </strong></p>
                        <p><strong>ضريبة القيمة المضافة: </strong></p>
                    </div>
                    <div class="" style="display: inline-table;">
                        <p>{{$purchases_first->totalprice}} {{$purchases_first->rate}}</p>
                        <p>{{$purchases_first->totaltax}} {{$purchases_first->rate}}</p>
                    </div>
                    <hr style="background-color: #f2f2f2;width: 100%;">
                    <div class="text-success text-left" style="display: inline-table;">
                        <strong>الإجمالي النهائي: </strong><br>
                    </div>
                    <div class="text-success" style="display: inline-table;">
                        <strong>{{$purchases_first->newTotalwithTax}} {{$purchases_first->rate}}</strong>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>

</body>

</html>