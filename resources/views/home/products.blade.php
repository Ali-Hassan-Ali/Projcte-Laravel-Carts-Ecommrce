@extends('layouts.home.app')

@section('content')

  
                   
        <!--header-->
    @foreach($sub_categories as $category)
        <div class="head_page">
            <svg class="svg-top" xmlns="http://www.w3.org/2000/svg" width="1366" height="84" viewBox="0 0 1366 84">
              <path id="Path_71110" data-name="Path 71110" d="M0,0H1366V84S1047.2,33.783,689.219,33.783,0,84,0,84Z" fill="#f9f9f9"></path>
            </svg>
            <div class="img-head-page">
                <img src="{{$category->image_path}}" alt="">
            </div>
            <svg class="svg-bottom" xmlns="http://www.w3.org/2000/svg" width="1366" height="84" viewBox="0 0 1366 84">
              <path id="Path_71110" data-name="Path 71110" d="M0,0H1366V84S1047.2,33.783,689.219,33.783,0,84,0,84Z" fill="#f9f9f9"></path>
            </svg>
        </div>


        <div class="breadcrumb-bar">
            <div class="container">
          
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
                   {{-- <li class="breadcrumb-item"><a href="/">{{ $category->id }}</a></li> --}}
                   <li class="breadcrumb-item">{{ $category->name }}</li>
                </ol>
            </div>
        </div>

        <section class="section_all_products">
            <div class="container">
                  @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
                <div class="sec_head text-center">
                    <h3>{{$category->name}}</h3>
                    <p>@lang('home.bestcart')</p>
                </div>
                
            @if( $markets->count() >= 1)
                <div class="row">
                @foreach($markets as $market)

                    <div class="col-md-3">
                        
                        <div class="box-card" 
                        style="background: linear-gradient(180deg, {{ $category->color_1 }} 0%, {{ $category->color_2 }} 100%);" 
                        data-color1="#ff0000" data-color2="" onchange="pickRedInt()">
                        <a href="{{ route('show_carts',[$category->id,$market->id]) }}" class="non">
                            <div class="title-card">
                                <img src="{{ asset('uploads/cart_images/' .$SubImage->cart_details->image)}}" class="pb-3" alt="" width="100px">
                                <h6 class="pt-4">@lang('home.cart_market') {{ $category->name }}</h6>
                                <h4 style="color: #ddd" class="pt-4">@lang('home.market')</h4>
                                <h2>{{ $market->name }}</h2>
                                <span><img class="py-3" src="{{ $market->image_path }}" width="90px" style="border-radius: 34px;"></span>
                            </div>
                        </a>
                        </div>
                    </div>

                @endforeach

                </div>
            @else
                <div class="row">
                @foreach($carts as $cart)

                    <div class="col-md-3">
                        <div class="box-card" style="background: linear-gradient(180deg, {{ $cart->sub_category->color_1 }} 0%, {{ $cart->sub_category->color_2 }} 100%);">
                        <a href="{{ route('product_show_details',[$category->id,$cart->id]) }}" class="non">
                            <div class="title-card">
                                <center><img src="{{ asset('uploads/cart_images/' . $cart->cart_details->image)}}" width="100px"></center>
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
                                <li><span style="color: rgb(66, 55, 55)">@lang('home.not_available')</span></li> 
                                @if(Auth::guard('cliants')->check())
                                <li>
                                
                                    <form action="{{ route('notify') }}" method="post">                                        
                                        {{ csrf_field() }}
                                        {{ method_field('get') }}

                                        <input type="hidden" name="cliant_id" value="{{Auth::guard('cliants')->user()->id}}">
                                        <input type="hidden" name="cart_id" value="{{$cart->id}}">
                                        <button type="submit" class="button button-plain"
                                                
                                        >@lang('home.remind_available')</button>
                                    </form>
                                
                                </li> 

                                @else

                                <li>
                                    <span  style="color: rgb(66, 55, 55)">@lang('home.sign_notify')</span>
                                </li>
                                @endif
                            </ul>
                                @endif  
                        </a>
                        </div>
                    </div>

                @endforeach
                </div>
            @endif
            </div>
        </section>
    @endforeach

            
                            
                
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