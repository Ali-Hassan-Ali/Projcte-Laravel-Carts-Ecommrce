
@extends('layouts.home.app')

@section('content')

@if (session()->has('error_message'))
    <div class="alert alert-danger">
        {{ session()->get('error_message') }}
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
        <!--header-->
        <div class="breadcrumb-bar">
            <div class="container">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
                   <li class="breadcrumb-item"> @lang('home.shop_cart')</li>
                </ol>
            </div>
        </div>
        <!--breadcrumb-bar-->
       <section class="section_ticit_supp">
            <div class="container">

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
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


                <div class="sec_head text-center">
                    <h2>@lang('home.shop_cart')</h2>
                </div>
                <div  class="content-ticit">
                      @if (Cart::count() > 0)

                    <table class="table-site tabel-cart">
                      <tr>    
                        <th>@lang('home.product')</th>
                        <th>@lang('dashboard.quantity')</th>
                        <th>@lang('home.price')</th>
                        <th>@lang('dashboard.delete')</th>
                      </tr>
                      @foreach (Cart::content() as $item)
                      <tr id="delete-cart-row{{ $item->id }}">
                        <td>
                            <div id="count_cart"  class="boc-pr">
                            <figure>
                                <div class="card-product">
                                    <div class="p-3" style="background: linear-gradient(180deg, {{ $item->model->sub_category->color_1 }} 0%, {{ $item->model->sub_category->color_2 }} 100%); border-radius: 10%">
                                        <div class="">
                                            <center><img src="{{ $item->model->cart_details->image_path }}" alt="" width="63px"></center>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                                <div  class="sec-title">
                                    <p>{{ $item->model->cart_details->cart_name }}</p>
                                    <span>{{ $item->model->cart_details->short_descript }}</span>

                                    {{-- @if(!$item->model->stars == null)
                                    <p>⭐ستربح{{ $item->model->stars }}في كل بطاقة تقوم بشرائها </p>
                                    @else 
                                    @endif --}}

                                    <div  class="data-mobail">
                                        <div class="quantity-item">
                                                <div class="quantity">
                                         
                                         <form action="{{ route('incdes', $item->rowId) }}"  method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('post') }}
                                                <input type="text" name="quantity" id="count-quat1" class="count-quat" value="{{$item->qty}}">
                                                <input type="hidden" name="DBquantit6y"   value="{{$item->model->quantity}}">
                                                    {{-- <input type="text" name="count-quat1" class="count-quat" value="1"> --}}
                                                    <div class="btn button-count inc jsQuantityIncrease"
                                                         data-url="{{ route('incdes', $item->rowId ) }}"
                                                         data-method="post"
                                                         data-price="{{ $item->price }}"
                                                         data-id="{{ $item->rowId }}"
                                                    ><i class="fa fa-plus" aria-hidden="true"></i></div>
                                                    <div class="btn button-count dec jsQuantityDecrease disabled" minimum="1"

                                                         data-url="{{ route('incdes', $item->rowId ) }}"
                                                         data-method="post"
                                                         data-price="{{ $item->price }}"
                                                         data-id="{{ $item->rowId }}"
                                                    ><i class="fa fa-minus" aria-hidden="true"></i></div>
                                            </form>
                                                </div>
                                                {{--  --}}
                                            </div>

                                        <div><div  class="total-price{{ $item->rowId }}">{{ Session::get('price_icon')}} {{( $item->price  *  $item->qty)}}</div></div>


                                        <form action="{{ route('wallet.destroy', $item->rowId) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}

                                            <button  class="remove-pr delete-cart"
                                                    data-url="{{ route('wallet.destroy', $item->rowId ) }}"
                                                     data-method="delete"
                                                     data-id="{{ $item->id }}"

                                            ><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>


                           {{--          <div class="data-mobail">
                                        <div class="quantity-item">
                                            <div class="quantity">
                                                <input type="text" name="count-quat1" class="count-quat" value="1">
                                                <div class="btn button-count inc jsQuantityIncrease"><i class="fa fa-plus" aria-hidden="true"></i></div>
                                                <div class="btn button-count dec jsQuantityDecrease disabled" minimum="1"><i class="fa fa-minus" aria-hidden="true"></i></div>
                                            </div>
                                        </div>
                                        <p>$ 100</p>
                                        <form action="{{ route('wallet.destroy', $item->rowId) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button  class="remove-pr"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div> --}}

                                </div>
                            </div>
                        </td>
                        <td>
                            <form action="{{ route('incdes', $item->rowId) }}"  method="post">
                                {{ csrf_field() }}
                                {{ method_field('post') }}
                                <div class="quantity-item">
                                    {{--  --}}
                                    <div class="quantity">
                                        
                                        <input type="text" name="quantity" id="count-quat1" class="count-quat" value="{{$item->qty}}">
                                        <input type="hidden" name="DBquantity"  value="{{$item->model->quantity}}">
                                        <div class="btn button-count inc jsQuantityIncrease"

                                             data-url="{{ route('incdes', $item->rowId ) }}"
                                             data-method="post"
                                             data-price="{{ $item->price }}"
                                             data-id="{{ $item->rowId }}"

                                        ><i class="fa fa-plus" aria-hidden="true"></i></div>
                                        <div class="btn button-count dec jsQuantityDecrease disabled" minimum="1"
                                             
                                             data-url="{{ route('incdes', $item->rowId ) }}"
                                             data-method="post"
                                             data-price="{{ $item->price }}"
                                             data-id="{{ $item->rowId }}"

                                        ><i class="fa fa-minus" aria-hidden="true"></i></div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </form>
                        </td>
                        
                        <td><div  class="total-price{{ $item->rowId }}">{{ Session::get('price_icon')}} {{( $item->price  *  $item->qty)}}</div></td>


                        <td><form action="{{ route('wallet.destroy', $item->id) }}"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}

                            <button  class="remove-pr delete-cart"
                                     data-url="{{ route('wallet.destroy', $item->rowId ) }}"
                                     data-method="delete"
                                     data-id="{{ $item->id }}"
                            ><i class="fa fa-trash"></i></button>
                        </form></td>
                      </tr>
                      @endforeach
                      <tr>
                        <td>
                            <ul class="option-table-cart">
                             {{-- <li id="subtota" class="total-cart"><p>الاجمالي:</p><strong>{{ Session::get('price_icon')}} {{Cart::subtotal()}} </strong></li> --}}
                             
                             <li id="subtotal" class="total-cart"><p>@lang('home.totle_price')</p><strong>{{ Session::get('price_icon')}} {{Cart::subtotal()}} </strong></li>
                             <li><a href="{{route('payment')}}" class="btn-site btn-shop"><span>  @lang('home.pay_cart')</span></a></li>


                            </ul>
                        </td>
                     </tr>

                     <tr>
                        <td>
                            <ul  class="option-table-cart">

                                <div class="alert alert-danger print-error-msg-login" style="display:none">
                                    <ul></ul>
                                </div>
                              
                                @if (! session()->has('coupon'))
                                 <div class="mr-auto">
                                    <form class="form-search-head mt-0" action="{{ route('coupon.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="text" name="coupon_code" class="form-control pl-5 my-0" placeholder="ادخل الكبون">
                                        <span class="text-danger" id="coupon_code"></span>
                                        <button type="submit" class="btn btn-submit-search coupon_code"
                                                data-url="{{ route('coupon.store') }}"
                                                data-method="post"
                                        ><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                                @endif

                                
                             
                             @if (session()->has('coupon'))
                             <li class="total-cart" style="width: 100px">
                                <p>
                                @lang('home.code') : | [{{ session()->get('coupon')['name'] }}]
                                 <form action="{{ route('coupon.destroy') }}" method="post" style="display:block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="text-danger delete-coupon"
                                        data-url="{{ route('coupon.destroy') }}"
                                        data-method="delete"
                                    ><i class="fa fa-trash"></i></button>
                                 </form>
                                </p>
                             </li>
                             @endif

                             @if (session()->has('coupon'))    
                             <li class="total-cart" style="width: 100px">
                                <p>
                                    <strong>@lang('home.discount'):  -{{ $discount }} {{ Session::get('price_icon')}}</strong>
                                </p><br>
                               
                             </li>
                             <br>
                             <li class="total-cart" style="width: 100px">
                             <p>
                                <strong>@lang('home.new_price'):  {{ $newTotal }} {{ Session::get('price_icon')}}</strong>
                            </p>
                             </li>
                             @endif

                            </ul>
                        </td>
                     </tr>




                    </table>

                  
            </div> <!-- end cart-totals -->

                    @else
                      <center>  <h3>@lang('home.no_cart')</h3></center>
                    @endif
                </div>
            </div>
        </section>
        <!--section_ticit_supp-->

@if(Auth::guard('cliants')->check())

@else


<section class="payment">
    
    <div class="not-mobail">
        <div class="sec-title">
            <img src="images/005-warning.svg" alt="" />
            <h2><a href="" data-target="#exampleModal" data-toggle="modal">@lang('home.no_login')</a></h2>
        </div>
        <figure><img src="{{ asset('home_file/images/not-mobail.png') }}" alt="" /></figure>
    </div>

</section>

@endif
@endsection

@push('scripts')
    <script>

        $(document).ready(function() {


        $(".delete-cart").click(function(e){
            e.preventDefault();
            // alert('delete cart');

            var url     = $(this).data('url');
            var method  = $(this).data('method');
            var id      = $(this).data('id');

            swal({
                title: "@lang('home.confirm_delete')",
                type: "error",
                icon: 'error',
                confirmButtonText: "Yes!",
                showCancelButton: true,
            })

            .then((willDelete) => {
            if (willDelete.value == true) {

                $.ajax({
                    url: url,
                    method: method,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(data) {
                        $('#delete-cart-row'+id).remove();
                        swal({
                            title: "@lang('home.deleted_successfully')",
                            type: "success",
                            icon: 'success',
                            showCancelButton: false,
                            timer: 1500
                        }),
                        // console.log(data);
                    },
                    error: function(data) {

                        swal({
                            title: 'Opps...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        })

                        // console.log(data);

                    },
                });//this ajax 
                }; //end of if
            });//then
        });//delete-cart



        $(".delete-coupon").click(function(e){
            e.preventDefault();
            // alert('delete coupon');

            var url     = $(this).data('url');
            var method  = $(this).data('method');


            swal({
                title: "@lang('home.confirm_delete')",
                type: "error",
                icon: 'error',
                confirmButtonText: "Yes!",
                showCancelButton: true,
            })

            .then((willDelete) => {
            if (willDelete.value == true) {

                $.ajax({
                    url: url,
                    method: method,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(data) {
                        swal({
                            title: "@lang('home.deleted_successfully')",
                            type: "success",
                            icon: 'success',
                            showCancelButton: false,
                            timer: 1500
                        }),
                        location.reload();
                        // console.log(data);
                    },
                    error: function(data) {

                        swal({
                            title: 'Opps...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        })

                        // console.log(data);

                    },
                });//this ajax 
                }; //end of if
            });//then

            
        });//delete-coupon



        $(".coupon_code").click(function(e){
            e.preventDefault();
            // alert('success coupon');

            var coupon_code = $("input[name=coupon_code]").val();
            var url         = $(this).data('url');
            var method      = $(this).data('method');

            // alert(coupon_code);
            $.ajax({
                url: url,
                method: method,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                  coupon_code:coupon_code,
                },
                success: function (response) {
                    if (response.success == true) {
                        
                        swal({
                            title: '@lang("home.addessuccfluy")',
                            timer: 12000,
                        });
                        
                        location.reload();

                    } else {
                    
                        swal({
                            title: '@lang("home.error")',
                            timer: 12000,
                        });
                    }//endof if

                },//end of success
            });//this ajax

        });//coupon-code

    });//end of document ready functiom
    </script>


<script>

    setInterval(function() {
        // $("#count_cart").load(window.location.href + " #count_cart");
        // $("#cart-details").load(window.location.href + " #cart-details");
        $("#subtotal").load(window.location.href + " #subtotal");
        $("#newsubtotal").load(window.location.href + " #newsubtotal");
        $("#coupon").load(window.location.href + " #coupon");
        $("#coupon_success").load(window.location.href + " #coupon_success");
        $("#cart_price").load(window.location.href + " #cart_price");
        $("#cart_price-m").load(window.location.href + " #cart_price-m");


        // $("#notcoupon").load(window.location.href + " #notcoupon");
        


    }, 1000);

</script>


@endpush