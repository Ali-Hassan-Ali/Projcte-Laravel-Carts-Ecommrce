@extends('layouts.home.app')

@section('content')
		
        <div class="breadcrumb-bar">
			<div class="container">
				<ol class="breadcrumb">
				   <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
				   <li class="breadcrumb-item"> مشترياتي</li>
				</ol>
			</div>
		</div>
        <!--breadcrumb-bar-->
        @if ($purchases->count() > 0)

       <section class="section_site_page">
            <div class="container">
                <div class="sec_head text-center">
                    <h2>مشترياتي</h2>
                </div>
                <div class="content-purch">
                    @foreach($purchases as $purchase)
                    <div class="order-list">
                        <p>رقم الطلب: <strong>#{{$purchase->number}}</strong></p>
                        <p>تاريخ الطلب: <strong>{{$purchase->date}}</strong></p>
                        
                        @if($purchase->purchases_status == 1)
                        <p><span class="complet">مكتمل</span></p>
                        @elseif($purchase->purchases_status == 2)

                        <p><span class="opend">مفتوح</span></p>
                        
                        @else

                        <p><span class="failed">متوقفة</span></p>

                        @endif
                        <p>التكلفة الاجمالية: <strong>{{$purchase->rate}} {{$purchase->newTotalwithTax}}</strong></p>
                        <a href="{{route('purchase_details',$purchase->number)}}" class="btn-employee" title="عرض تفاصيل الطلب"><img src="{{ asset('home_file/images/employee.svg')}}" /></a>
                        <a href="{{route('purchase_invoices',$purchase->number)}}" class="btn-invoices" title="فاتورة الطلب"><img src="{{ asset('home_file/images/invoices.svg')}}" /></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section> 

        @else
            
        <h2>@lang('dashboard.no_data_found')</h2>
        
        @endif
        <!--section_ticit_supp-->   
@endsection