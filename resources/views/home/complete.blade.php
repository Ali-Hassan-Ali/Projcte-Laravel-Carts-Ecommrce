@extends('layouts.home.app')

@section('content')
		<!--header-->
		
        <div class="breadcrumb-bar">
			<div class="container">
				<ol class="breadcrumb">
				   <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
				   <li class="breadcrumb-item"><a href="index.html">مشترياتي</a></li>
				</ol>
			</div>
		</div>
        <!--breadcrumb-bar-->
        
       <section class="section_ticit_supp">
            <div class="container">
                <div class="complete-req">
                    <figure><img src="images/Online_messaging.svg" alt="" /></figure>
                    <div class="sec-title">
                        <h2>شكراً لك . تم إكمال طلبك بنجاح</h2>
                        <p>سوف تصلك رسالة على هاتفك المحمول وبريدك الإلكتروني تحتوي على كود البطاقة التي قمت بشرائها</p>
                        <p>بمكنك الضغط على قائمة <a href="{{route('my_purchase')}}">مشترياتي</a> من القائمة لمعاينة تفاصيل طلبك</p>
                        {{-- <h5>تهانينا</h5> --}}
                        {{-- <p>لقد حصلت على 5 نقاط</p> --}}
                    </div>
                </div>
                <div class="sec-proposed">
                    <div class="sec_head">
                        <h3>بطاقات نقترحها لك</h3>
                    </div>
                    <div class="row">
                        @foreach($random_carts as $r_cart)
                        <div class="col-md-3">
                            <div class="box-card" style="background: linear-gradient(180deg, {{ $r_cart->sub_category->color_1 }} 0%, {{ $r_cart->sub_category->color_2 }} 100%);">
                                <a href="{{ route('product_show_details',[$r_cart->sub_category->id,$r_cart->id]) }}" class="non">
    
                                <div class="title-card">
                                    <h2>{{ $r_cart->cart_name }}</h2>
                                    <p>{{ $r_cart->short_descript }}</p>
                                    <span>
                                    @if($r_cart->market_id == null)
                                        Null    
                                    @else
                                    {{ $r_cart->Market->name }}
                                    @endif
                                    </span>
                                    <strong>@lang('home.balance')<br> {{$r_cart->balance}}</strong>
                                </div>
                                @if(!$r_cart->quantity == 0)
    
                                <ul class="option-card">
                                    <li><a><img src="{{ asset('images/shopping-cart.svg')}}"><span>
                                        @if ($r_cart->amrecan_price > 0)
                                        <form action="{{ route('wallet.store', $r_cart) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="button button-plain add-cart"
                                                    data-url="{{ route('wallet.store', $r_cart) }}"
                                                    data-method="post"
                                                    data-name="{{ $r_cart->cart_name }}"
                                                    data-desc="{{ $r_cart->short_descript }}"
                                                    data-id="{{ $r_cart->id }}"
                                                    data-price="{{ $r_cart->amrecan_price }}"
                                            >@lang('home.add_cart')</button>
                                        </form>
                                        @endif   
                                    </span></a></li>
                                    <li><a><img src="{{ asset('home_file/images/shopping-cart.svg')}}" /><span>
                                        @if ($r_cart->amrecan_price > 0)
                                        <form action="{{ route('storeToPayment', $r_cart) }}" method="post">                                        
                                            {{ csrf_field() }}
                                            {{ method_field('post') }}
                                            <button type="submit" class="button button-plain"
                                                    
                                            >{{ $r_cart->amrecan_price }}{{ Session::get('price_icon')}}  @lang('home.pay_cart')</button>
                                        </form>
                                        @endif      
                                    </span></a></li>
                                </ul>
                                @else
                                <ul class="option-card">
                                    <li><span style="color: rgb(66, 55, 55)">هذا العنصر غير متوفر الان</span></li> 
                                    @if(Auth::guard('cliants')->check())
                                    <li>
                                    
                                        <form action="{{ route('notify') }}" method="post">                                        
                                            {{ csrf_field() }}
                                            {{ method_field('get') }}
    
                                            <input type="hidden" name="cliant_id" value="{{Auth::guard('cliants')->user()->id}}">
                                            <input type="hidden" name="cart_id" value="{{$r_cart->id}}">
                                            <button type="submit" class="button button-plain"
                                                    
                                            >ذكرني عند التوفر</button>
                                        </form>
                                    
                                    </li> 
    
                                    @else
    
                                    <li>
                                        <span  style="color: rgb(66, 55, 55)">sign up to use notify</span>
                                    </li>
                                    @endif
                                </ul>
                                    @endif   
                                </a>
                    
                            </div>
                        </div>
                        
                       @endforeach           
                </div>
            </div>
        </section> 
        <!--section_ticit_supp-->   
@endsection            
	