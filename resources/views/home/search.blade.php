@extends('layouts.home.app')

@section('content')

	<!--head_page-->
	<div class="breadcrumb-bar">
		<div class="container">
			<ol class="breadcrumb">
			   <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
			   <li class="breadcrumb-item">@lang('home.search_cart')</li>
			</ol>
		</div>
	</div>
	<!--breadcrumb-bar-->
	<section class="section_all_products">
        <div class="container">
            
            @if($carts->count() > 0)
            <div class="row">
				@foreach($carts as $cart)
                <div class="col-md-3">
                    <div class="box-card" style="background: linear-gradient(180deg, {{ $cart->sub_category->color_1 }} 0%, {{ $cart->sub_category->color_2 }} 100%);">
                    <a href="{{ route('product_show_details',[$cart->sub_category->id,$cart->id]) }}" class="non">
                        <div class="title-card">
                            <center><img src="{{ $cart->cart_details->image_path }}"></center>
                            <h2>{{ $cart->cart_details->cart_name }}</h2>
                            <p>{{ $cart->cart_details->short_descript }}</p>
                            <span>
                            @if($cart->market_id == null)
                                -
                            @else
                            {{ $cart->Market->name }}
                            @endif
                            </span>
                            <strong>@lang('home.balance')<br> {{$cart->balance}}</strong>
                        </div>
                        @if(!$cart->quantity == 0)

                        <ul class="option-card">
                            
                            <li><a><img src="{{ asset('images/shopping-cart.svg')}}">
                                <span>
                                @if ($cart->amrecan_price > 0)
                                <form action="{{ route('wallet.store', $cart->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('post') }}
                                    <button type="submit" class="button button-plain add-cart"
                                            data-url="{{ route('wallet.store', $cart->id) }}"
                                            data-method="post"
                                    >@lang('home.add_cart')</button>
                                </form>
                                @endif   
                            </span></a></li>
                            <li><a><img src="{{ asset('home_file/images/shopping-cart.svg')}}" /><span>
                                @if ($cart->amrecan_price > 0)
                                <form action="{{ route('storeToPayment', $cart) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('post') }}
                                    <button type="submit" class="button button-plain"
                                            
                                    >{{ $cart->amrecan_price }}{{ Session::get('price_icon')}}  @lang('home.pay_cart')</button>
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
                                    {{ method_field('get') }}

                                    <input type="hidden" name="cliant_id" id="cliant_id_available" value="{{Auth::guard('cliants')->user()->id}}">
                                    <input type="hidden" name="cart_id" id="cart_id_available" value="{{$cart->id}}">
                                    <button type="submit" class="button button-plain remind-available"
                                            data-url="{{ route('notify') }}"
                                            data-method="get"
                                    >@lang('home.not_available') @lang('home.remind_available')</button>
                                </form>
                            
                            </li> 

                            @else

                            <li>
                                <span  style="color: rgb(66, 55, 55)">
                                    <a data-target="#exampleModal" data-toggle="modal">@lang('home.sign_notify') </a>
                                </span>
                            </li>
                            @endif
                        </ul>
                            @endif  
                    </a>
                    </div>
                </div>

            @endforeach
            </div>
            @else 

            <div class="sec_head text-center">
                <h3> sorry</h3>
                <p>not found</p>
            </div>
            @endif
        </div>
    </section>

   
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