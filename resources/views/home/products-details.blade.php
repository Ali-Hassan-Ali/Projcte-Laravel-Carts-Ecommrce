@extends('layouts.home.app')
@section('content')

@foreach($sub_categories as $category)

	<div class="main-wrapper">		
        <div class="breadcrumb-bar">
			<div class="container">
				<ol class="breadcrumb">
				   <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
			       {{-- <li class="breadcrumb-item"><a href="{{ route('show_carts',[$category->id , $market->id]) }}">{{$category->name}}</a></li> --}}
				   <li class="breadcrumb-item">{{$carts->cart_details->cart_name}}</li>
				</ol>
			</div>
		</div>
        <!--breadcrumb-bar-->
        
        <section class="section_details_product">
            <div class="container">
                <div class="content-details">
                    <div class="card-product">
                        <div class="box-card" style="background: linear-gradient(180deg, {{ $carts->sub_category->color_1 }} 0%, {{ $carts->sub_category->color_2 }} 100%);">
                            <div class="title-card">
                                <h2>{{ $carts->cart_details->cart_name }}</h2>
                                
                                <p>{{ $carts->cart_details->short_descript }}</p>
                                
                                <strong>@lang('home.balance')<br> {{$carts->balance}}</strong><br>
                                <strong>@lang('home.price') {{ $carts->amrecan_price }}{{ Session::get('price_icon')}}</strong>
                            
                            </div>
                        </div>
                    </div>
                    <div class="title-product">
                        <h2>{{$carts->cart_details->cart_name}}</h2>
                        <p>{{$carts->cart_details->cart_text}}</p>

                        <p>@lang('home.to_know') <a href="{{ route('How-Useage',$carts->sub_category_id ) }}">@lang('home.click_here')</a></p>

                        <div class="rate-line">
                            @for ($i = 0; $i < 6; $i++) 
                                {{-- expr --}}
                                <span class="zmdi zmdi-star {{ $carts->rating >= $i ? 'checked' : '' }}"></span>

                            @endfor
                        </div>

                    </div>
                    <div class="img-product border border-dark">

                        <ul class="option-card d-block" style="padding-bottom: 120px">
                        <div class="btn btn-outline-warning font-weight-bold border-0 borderd col-12 mt-5" style="border-radius: 20px">
                            @lang('home.price') {{$carts->amrecan_price}}
                        </div>
                            <li><a class="btn-site btn-shop"><img src="{{ asset('home_file/images/surface.svg')}}" /><span>
                                @if ($carts->amrecan_price > 0)
                                <form action="{{ route('storeToPayment', $carts) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('post') }}
                                    <button type="submit" class="button button-plain butt-sm col-12 my-0"
                                            
                                    >{{ $carts->amrecan_price }}{{ Session::get('price_icon')}}  @lang('home.pay_cart')</button>
                                </form>
                                @endif      
                            </span></a></li>
                            <li><a class="btn-site add-cart"
                                    data-url="{{ route('wallet.store', $carts) }}"
                                    data-method="post"
                                    data-name="{{ $carts->cart_details->cart_name }}"
                                    data-desc="{{ $carts->cart_details->short_descript }}"
                                    data-id="{{ $carts->id }}"
                                    data-price="{{ $carts->amrecan_price }}"
                                ><img src="{{ asset('images/shopping-blue.png')}}"><span>@lang('home.add_cart')   
                            </span></a></li>
                        <div class="btn btn-info borderd col-12 my-3" style="border-radius: 20px">
                            @lang('dashboard.stars') {{$carts->stars}} ⭐
                        </div>
                        </ul>


                    </div>
                  
                </div>
            </div>
        </section> 
        
        <!--breadcrumb-bar-->   
        <section class="section_all_products">
            <div class="container">
                <div class="sec_head text-center">
                    <h3>@lang('home.suggest')</h3>
                    <p>@lang('home.bestcart')</p>
                </div>
                <div class="row">
                    @foreach($random_carts as $r_cart)
                    <div class="col-md-3">
                        <div class="box-card" style="background: linear-gradient(180deg, {{ $r_cart->sub_category->color_1 }} 0%, {{ $r_cart->sub_category->color_2 }} 100%);">
                            <a href="{{ route('product_show_details',[$r_cart->sub_category->id,$r_cart->id]) }}" class="non">

                            <div class="title-card">
                                <center><img src="{{ $r_cart->cart_details->image_path }}" width="100px"></center>
                                <h2>{{ $r_cart->cart_details->cart_name }}</h2>
                                <p>{{ $r_cart->cart_details->short_descript }}</p>
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
                                <li><a><img src="{{ asset('images/shopping-blue.png')}}"><span>
                                    @if ($r_cart->amrecan_price > 0)
                                    <form action="{{ route('wallet.store', $r_cart) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="button button-plain add-cart"
                                                data-url="{{ route('wallet.store', $r_cart) }}"
                                                data-method="post"
                                                data-name="{{ $r_cart->cart_details->cart_name }}"
                                                data-desc="{{ $r_cart->cart_details->short_descript }}"
                                                data-id="{{ $r_cart->id }}"
                                                data-price="{{ $r_cart->amrecan_price }}"
                                        >@lang('home.add_cart')</button>
                                    </form>
                                    @endif   
                                </span></a></li>
                                <li><a><img src="{{ asset('home_file/images/surface.svg')}}" /><span>
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
                                
                                @if(Auth::guard('cliants')->check())
                                <li>
                                
                                    <form action="{{ route('notify') }}" method="post">                                        
                                        {{ csrf_field() }}
                                        {{ method_field('post') }}

                                        <input type="hidden" name="cliant_id" id="cliant_id_available" value="{{Auth::guard('cliants')->user()->id}}">
                                        <input type="hidden" name="cart_id" id="cart_id_available" value="{{$r_cart->id}}">
                                        <button type="submit" class="button button-plain remind-available"
                                                data-url="{{ route('notify') }}"
                                                data-method="get"
                                        >@lang('home.not_available') @lang('home.remind_available')</button>
                                    </form>
                                
                                </li> 

                                @else

                                    @if (Auth::guard('cliants')->check())
                                    
                                    @else

                                        <li>
                                            <span  style="color: rgb(66, 55, 55)"> 
                                                <a data-target="#exampleModal" data-toggle="modal">@lang('home.sign_notify') </a>
                                            </span>
                                        </li>

                                    @endif

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
        @endforeach
        <!--section_best_sellers-->
@endsection

@push('RemindAvailable')
    <script>

    $(document).ready(function() {

        $(".remind-available").click(function(e){
            e.preventDefault();

            var url       = $(this).data('url');
            var method    = $(this).data('method');

            var cliant_id   = $('#cliant_id_available').val();
            var cart_id     = $('#cart_id_available').val();

            $.ajax({
                url: url,
                method: method,
                data:{
                    cliant_id:cliant_id,
                    cart_id:cart_id,
                },
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    if (response.success == true) {
                        
                        swal({
                            title: '@lang("home.addessuccfluy")',
                            timer: 12000,
                        });

                    }//end of if

                },//end of success

            });//end of ajax  

        });//end of click


    });//end of document ready functiom

    </script>
@endpush
        