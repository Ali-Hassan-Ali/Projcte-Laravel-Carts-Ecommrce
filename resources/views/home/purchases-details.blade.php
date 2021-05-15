@extends('layouts.home.app')

@section('content')
		
    
@if ($purchases_first->count() > 0)
        <div class="breadcrumb-bar">
			<div class="container">
				<ol class="breadcrumb">
				   <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
				   <li class="breadcrumb-item"> مشترياتي</li>
				   <li class="breadcrumb-item"> #{{$purchases_first->number}}</li>
				</ol>
			</div>
		</div>
        <!--breadcrumb-bar-->
        
       <section class="section_ticit_supp">
            <div class="container">
                <div class="sec_head text-center">
                    <h2>تفاصيل الطلب</h2>
                </div>
                <div class="content-ticit">
                    <table class="table-site tabel-cart">
                      <tr>
                        <th>المنتج</th>
                        <th>الكود</th>
                        <th>الكمية</th>
                        <th>السعر</th>
                        
                      </tr>
                      @foreach($purchases as $purchase)
                      <tr>
                        <td>
                            <div class="boc-pr">
                                <figure><img src="{{$purchase->sub_category->image_path}}" alt="" /></figure>
                                <div class="sec-title">
                                    <p>{{$purchase->cart_name}} </p>
                                    <span>{{$purchase->cart_text}}</span>
                                </div>
                            </div>  
                        </td>
                        <td>
                            
                        {!!$purchase->code!!}
                        </td>
                        <td>{{$purchase->quantity}}</td>
                        <td>{{$purchase->rate}} {{$purchase->price}}</td>
                      </tr>
                      @endforeach
                      <tr>
                         <td>
                             <div class="option-table-cart">
                                  <ul class="dt-pro">
                                      <li><p>إجمالي الطلب: </p><strong>{{$purchases_first->totalprice}} {{$purchases_first->rate}}</strong></li>
                                      <li><p>ضريبة القيمة المضافة: </p><strong>{{$purchases_first->totaltax}} {{$purchases_first->rate}}</strong></li>
                                      <li><p>الإجمالي النهائي: </p><strong>{{$purchases_first->newTotalwithTax}} {{$purchases_first->rate}}</strong></li>
                                  </ul>
                             </div>
                         </td>
                      </tr>
                    </table>
                </div>
            </div>
        </section> 

        @else
            
            <h2>@lang('dashboard.no_data_found')</h2>
            
            @endif
        <!--section_ticit_supp-->   
@endsection           
		