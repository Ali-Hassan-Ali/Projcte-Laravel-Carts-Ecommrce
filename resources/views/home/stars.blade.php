@extends('layouts.home.app')

@section('content')
        
<div class="breadcrumb-bar">
    <div class="container">
        <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
           <li class="breadcrumb-item">@lang('home.mjal_stars')</li>
        </ol>
    </div>
</div>
       <section class="section_ticit_supp">
            <div class="container">

                @if (session()->has('success'))
                <div class="alert alert-success" style="text-align: center">
                    {{ session()->get('success') }}
                </div>
            @endif
                @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                <div class="complete-req">
                    <figure><img src="{{asset('home_file/images/stars.svg')}}" alt="" /></figure>
                    <div class="sec-title">
                        <h2>@lang('home.mjal_stars')</h2>
                        <p>@lang('home.mjal_stars_text')</p>
                        <h5>@lang('home.mjal_stars_pointer')</h5>
                        <p>@lang('home.mjal_stars_body')</p>
                        <br>
                        <a class="btn btn-dark" @if(\Auth::guard('cliants')->user()->stars < 100) title="you dont have enough stars" href="#" @endif  }} href="{{ route('stars') }}"><span>@lang('home.convert')</span></a>

                    </div>
                </div>
                <div class="sec-proposed">
                    <div class="sec_head">
                        <h3>@lang('home.get_gifts')</h3>
                    </div>
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
                                    
                             
                                    <li><a><img src="{{ asset('home_file/images/shopping-cart.svg')}}" /><span>
                                        @if ($cart->amrecan_price > 0)
                                        <form action="{{ route('order_by_satrs', $cart) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('get') }}

                                            <input type="hidden" name="stars" value="{{ $cart->amrecan_price * 100}}">
                                            <button type="submit" class="button button-plain remind-available"
                                                    data-url="{{ route('notify') }}"
                                                    data-method="get"
                                            ><h6 style="color: yellow">{{ $cart->amrecan_price * 100}} ⭐</h6>@lang('home.pay_cart')</button>
                                        </form>
                                        @endif      
                                    </span></a></li>
                                    
                                    
                                </ul>
                                @else
                                <ul class="option-card">
                                    <li><span style="color: rgb(66, 55, 55)">
                                        <a data-target="#exampleModal" data-toggle="modal">@lang('home.sign_notify') </a>
                                    </span></li> 
                                </ul>
                                    @endif  
                            </a>
                            </div>
                        </div>
    
                    @endforeach
                    </div>
                </div>
            </div>
        </section> 
        <!--section_ticit_supp-->   
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