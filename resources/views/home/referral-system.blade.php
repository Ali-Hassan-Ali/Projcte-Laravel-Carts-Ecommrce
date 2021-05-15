@extends('layouts.home.app')

@section('content')

		
        <div class="breadcrumb-bar">
			<div class="container">
				<ol class="breadcrumb">
				   <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
				   <li class="breadcrumb-item">@lang('home.referral_system')</li>
				</ol>
			</div>
		</div>
        <!--breadcrumb-bar-->
        
       <section class="section_ticit_supp">
            <div class="container">
                <div class="sec_head text-center">
                    <h2>@lang('home.referral_system')</h2>
                </div>
                <div class="headReferral">
                    <p>@lang('home.referral_text')</p>
                    @if(Auth::guard('cliants')->check())
                    <p  style="display: none" id="mytext">http://127.0.0.1:8000/ar/referral/{{$cliant->assignmen_link}}</p>
                    <a id="TextToCopy"  class="copyReferral">
                       
                        <i class="fa fa-files-o"></i> @lang('home.referral_copy')</a>
                    @else
                    
                    <a data-toggle="modal" data-target="#exampleModal" class="copyReferral">
                       
                        <i class="fa fa-files-o"></i>@lang('home.referral_copy')</a>
                    @endif
                </div>
                @if(Auth::guard('cliants')->check())
                <div class="row">
                    <div class="col-md-3">
                        <div class="box-Referral">
                            <figure><img src="{{ asset('home_file/images/money-bag.png')}}" alt="" /></figure>
                            <div class="sec-title">
                                <p>${{$cliant->account_balance}}</p>
                                <span>@lang('home.totul_news')</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-Referral">
                            <figure><img src="{{ asset('home_file/images/004-coin.png')}}" alt="" /></figure>
                            <div class="sec-title">
                                <p>${{$cliant->assignmen_balance}}</p>
                                <span>@lang('home.nuber_new')</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-Referral">
                            <figure><img src="{{ asset('home_file/images/account.png')}}" alt="" /></figure>
                            <div class="sec-title">
                                <p>{{$cliant->assignmen_users}}</p>
                                <span>@lang('home.number_users')</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-Referral">
                            <figure><img src="{{ asset('home_file/images/003-order.png')}}" alt="" /></figure>
                            <div class="sec-title">
                                <p>{{$cliant->count_oreder}}</p>
                                <span>@lang('home.number_student')</span>
                            </div>
                        </div>
                    </div>
                   
                </div>
                @else

                <div class="row">
                    <div class="col-md-3">
                        <div class="box-Referral">
                            <figure><img src="{{ asset('home_file/images/money-bag.png')}}" alt="" /></figure>
                            <div class="sec-title">
                                <p>$ 0</p>
                                <span>@lang('home.totul_news')</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-Referral">
                            <figure><img src="{{ asset('home_file/images/004-coin.png')}}" alt="" /></figure>
                            <div class="sec-title">
                                <p>$ 0</p>
                                <span>@lang('home.nuber_new')</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-Referral">
                            <figure><img src="{{ asset('home_file/images/account.png')}}" alt="" /></figure>
                            <div class="sec-title">
                                <p> 0</p>
                                <span>@lang('home.number_users')</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-Referral">
                            <figure><img src="{{ asset('home_file/images/003-order.png')}}" alt="" /></figure>
                            <div class="sec-title">
                                <p> 0</p>
                                <span>@lang('home.number_student')</span>
                            </div>
                        </div>
                    </div>
            </div>
            @endif
        </section> 
        <!--section_ticit_supp-->   

        <script>

$('#TextToCopy').click(function(){
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($('#mytext').text()).select();
  document.execCommand("copy");
  $temp.remove();
  // alert("Copied the text: " +document.execCommand("copy"));
});
            </script>
         
@endsection