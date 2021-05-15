@extends('layouts.home.app')

@section('content')
		<!--header-->
		
    <div class="breadcrumb-bar">
			<div class="container">
				<ol class="breadcrumb">
				   <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
				   <li class="breadcrumb-item"><a href="{{ route('wallet.index') }}"> @lang('home.paymaent')</a></li>
				   <li class="breadcrumb-item"> @lang('home.paying_off')</li>
				</ol>
			</div>
		</div>
        <!--breadcrumb-bar-->
        
       <section class="section_payment">
            <div class="container">
                <div class="sec_head text-center">
                    <h2>@lang('home.paying_off')</h2>
                </div>
                <div class="">
                    <ul class="option-payment">
                        <li><p>@lang('home.tota')</p><h6>{{ Session::get('price_icon')}} {{Cart::subtotal()}}</h6></li>
                        <li><p>@lang('home.value_added_tax')</p><h6>{{ Session::get('price_icon')}} {{number_format($newTax,2,".",",")}}</h6></li>
                        <li><p>@lang('home.the_final_total')</p><h6 class="total-final">{{ Session::get('price_icon')}} {{number_format($newTotalwithTax,2,".",",")}}</h6></li>
                    </ul>
                </div>
                @if(Auth::guard('cliants')->check())
                <div class="content-payment">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="mada-tab" data-toggle="tab" href="#mada" role="tab" aria-controls="mada" aria-selected="true"><img src="{{ asset('home_file/images/mada.png')}}" /></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="visa-tab" data-toggle="tab" href="#visa" role="tab" aria-controls="visa" aria-selected="false"><img src="{{ asset('home_file/images/visa.png')}}" /></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="master_card-tab" data-toggle="tab" href="#master_card" role="tab" aria-controls="master_card" aria-selected="false"><img src="{{ asset('home_file/images/master_card.png')}}" /></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="paypal-tab" data-toggle="tab" href="#paypal" role="tab" aria-controls="paypal" aria-selected="false"><img src="{{ asset('home_file/images/paypal.png')}}" /><span> @lang('home.PayPal')</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="apple-pay-tab" data-toggle="tab" href="#apple-pay" role="tab" aria-controls="apple-pay" aria-selected="false"><img src="{{ asset('home_file/images/apple-pay.png')}}" /><span> @lang('home.Apple_Pay')</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="stc-tab" data-toggle="tab" href="#stc" role="tab" aria-controls="stc" aria-selected="false"><img src="{{ asset('home_file/images/stc.png')}}" /><span> @lang('home.STC_Pay')</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pay-bank-tab" data-toggle="tab" href="#pay-bank" role="tab" aria-controls="pay-bank" aria-selected="false"><img src="{{ asset('home_file/images/pay-bank.png')}}" /><span> @lang('home.Bank_transfer')</span></a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" id="usdt-tab" data-toggle="tab" href="#usdt" role="tab" aria-controls="usdt" aria-selected="false"><img src="{{ asset('home_file/images/usdt.jpeg') }}" width="30px"/><span> @lang('home.USDT')</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="Bitcoin-tab" data-toggle="tab" href="#Bitcoin" role="tab" aria-controls="Bitcoin" aria-selected="false"><img src="{{ asset('home_file/images/Bitcoin.jpeg') }}" width="30px"/><span> @lang('home.Bitcoin')</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="Dogecoin-tab" data-toggle="tab" href="#Dogecoin" role="tab" aria-controls="Dogecoin" aria-selected="false"><img src="{{ asset('home_file/images/Dogecoin.jpeg')}}" width="30px" /><span> @lang('home.Dogecoin')</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="Etherum-tab" data-toggle="tab" href="#Etherum" role="tab" aria-controls="Etherum" aria-selected="false"><img src="{{ asset('home_file/images/Etherum.jpeg') }}" width="30px"/><span >@lang('home.Etherum')</span></a>
                      </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <h4>@lang('home.card_data')</h4>
                      <div class="tab-pane fade" id="mada" role="tabpanel" aria-labelledby="mada-tab">
                          <form class="form-payment">
                              <div class="form-group">
                                  <label>@lang('home.name_card_data')</label>
                                  <input type="text" class="form-control" placeholder="@lang('home.name_card_data')" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.card_data')</label>
                                  <input type="text" class="form-control" placeholder="0000  - 0000  -  0000  -  0000" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.data_cart')</label>
                                  <input type="text" class="form-control" placeholder="MM/YY" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.vary_cart')</label>
                                  <input type="text" class="form-control" placeholder="CVV" />
                              </div>
                              
                          </form>
                      </div>
                      <div class="tab-pane fade" id="visa" role="tabpanel" aria-labelledby="visa-tab">
                          <form class="form-payment">
                              <div class="form-group">
                                  <label>@lang('home.name_card_data')</label>
                                  <input type="text" class="form-control" placeholder="@lang('home.name_card_data')" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.card_data')</label>
                                  <input type="text" class="form-control" placeholder="0000  - 0000  -  0000  -  0000" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.data_cart')</label>
                                  <input type="text" class="form-control" placeholder="MM/YY" />
                              </div>
                              <div class="form-group">
                                  <label></label>
                                  <input type="text" class="form-control" placeholder="CVV" />
                              </div>
                          </form>  
                      </div>
                      <div class="tab-pane fade" id="master_card" role="tabpanel" aria-labelledby="master_card-tab">
                          <form class="form-payment">
                              <div class="form-group">
                                  <label>@lang('home.name_card_data')</label>
                                  <input type="text" class="form-control" placeholder="@lang('home.name_card_data')" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.card_data')</label>
                                  <input type="text" class="form-control" placeholder="0000  - 0000  -  0000  -  0000" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.data_cart')</label>
                                  <input type="text" class="form-control" placeholder="MM/YY" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.vary_cart')</label>
                                  <input type="text" class="form-control" placeholder="CVV" />
                              </div>
                          </form>  
                      </div>
                      <div class="tab-pane fade show active" id="paypal" role="tabpanel" aria-labelledby="paypal-tab">
                          <form class="form-payment">
                              <div class="form-group">
                                  <label>@lang('home.name_card_data')</label>
                                  <input type="text" class="form-control" placeholder="@lang('home.name_card_data')" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.card_data')</label>
                                  <input type="text" class="form-control" placeholder="0000  - 0000  -  0000  -  0000" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.data_cart')</label>
                                  <input type="text" class="form-control" placeholder="MM/YY" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.vary_cart')</label>
                                  <input type="text" class="form-control" placeholder="CVV" />
                              </div>
                          </form>  
                      </div>
                      <div class="tab-pane fade" id="apple-pay" role="tabpanel" aria-labelledby="apple-pay-tab">
                          <form class="form-payment">
                              <div class="form-group">
                                  <label>@lang('home.name_card_data')</label>
                                  <input type="text" class="form-control" placeholder="@lang('home.name_card_data')" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.card_data')</label>
                                  <input type="text" class="form-control" placeholder="0000  - 0000  -  0000  -  0000" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.data_cart')</label>
                                  <input type="text" class="form-control" placeholder="MM/YY" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.vary_cart')</label>
                                  <input type="text" class="form-control" placeholder="CVV" />
                              </div>
                          </form>  
                      </div>
                      <div class="tab-pane fade" id="stc" role="tabpanel" aria-labelledby="stc-tab">
                          <form class="form-payment">
                              <div class="form-group">
                                  <label>@lang('home.name_card_data')</label>
                                  <input type="text" class="form-control" placeholder="@lang('home.name_card_data')" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.card_data')</label>
                                  <input type="text" class="form-control" placeholder="0000  - 0000  -  0000  -  0000" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.data_cart')</label>
                                  <input type="text" class="form-control" placeholder="MM/YY" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.vary_cart')</label>
                                  <input type="text" class="form-control" placeholder="CVV" />
                              </div>
                          </form>  
                      </div>
                      <div class="tab-pane fade" id="pay-bank" role="tabpanel" aria-labelledby="pay-bank-tab">
                          <form class="form-payment">
                              <div class="form-group">
                                  <label>@lang('home.name_card_data')</label>
                                  <input type="text" class="form-control" placeholder="@lang('home.name_card_data')" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.card_data')</label>
                                  <input type="text" class="form-control" placeholder="0000  - 0000  -  0000  -  0000" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.data_cart')</label>
                                  <input type="text" class="form-control" placeholder="MM/YY" />
                              </div>
                              <div class="form-group">
                                  <label>@lang('home.vary_cart')</label>
                                  <input type="text" class="form-control" placeholder="CVV" />
                              </div>
                          </form>  
                      </div>

                      @foreach ($pay_currencie as $pay)

                          <div class="tab-pane fade" id="{{ $pay->name }}" role="tabpanel" aria-labelledby="{{ $pay->name }}-tab">

                          </div>
                          
                      @endforeach

                       <form class="form-payment mt-5" action="{{ route('order.pay.store') }}" method="post" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          {{ method_field('post') }}


                            <div class="mb-3">
                                <label for="formFile" class="form-label">Selected image</label>
                                <input class="form-control" name="image" type="file" id="formFile">
                              </div>

                            
                            <div class="container-fluid">
                              <div class="row justify-content-center">
                               <p>{{ $pay->link }} <a class="copy-ad">نسخ الرابط</a></p>
                              </div>
                            </div>

                            <div class="container-fluid mt-5">
                              <div class="row justify-content-center">
                               <img src="{{ $pay->image_path }}" width="200px" />
                              </div>
                            </div>

                            <button type="" class="btn btn-info">add </button>

                          </form>  

                   
                </div>
                    <ul class="brn-payment">
                        <li><button class="btn-cancel">@lang('dashboard.no')</button></li>
                        @if(Auth::guard('cliants')->user()->isVerified == 1 && Auth::guard('cliants')->user()->emailVerified == 1)

                        <li><a href="{{route('payment-store')}}" class="btn-site btn-shop"><span>@lang('home.Confirm_payment')</span></a></li>
                        @else  
                        <li><button class="btn-site btn-shop"><span>@lang('home.please_activate')</span></button></li>

                        @endif
                    </ul>
                @else
                
                <section class="payment">
    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 payment-method margin-top-25">
                                <div class="intro-title">
                                    <h1>@lang('home.paying_off')</h1>
                                </div>
                            </div> 
                            <div class="row text-center">
                                <h3 class="orders_colosed_text">@lang('home.')</h3> 
                                <img src="{{ asset('images/not_auth.svg')}}" class="orders_colosed_img "> 
                                <div>
                                    <h3 onclick="showLoginModal()" class="orders_colosed_text" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal">@lang('home.login')</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </section>
                
                @endif
            </div>
        </section> 
        <!--section_ticit_supp-->  
@endsection         
         
		