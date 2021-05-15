@extends('layouts.home.app')
@section('content')

	<!--header-->
	<div class="breadcrumb-bar">
		<div class="container">
			<ol class="breadcrumb">
			   <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
			   <li class="breadcrumb-item">@lang('home.aboutus')</li>
			</ol>
		</div>
	</div>
	<!--breadcrumb-bar-->
	<section class="section_content_about">
        <div class="container">
            <div class="content_about">
                <div class="img_about">
                    <img src="{{ asset('images/about-page.png')}}" alt="">
                </div>
                <div class="sec_head">
                    <h2>@lang('home.aboutus')</h2>
                    @if ($about_us->count() > 0)

                        @foreach ($about_us as $about)
                            <div>
                                {!! $about->text !!}
                            </div>
                        @endforeach
                    
                    @else
                        <h2>@lang('dashboard.no_data_found')</h2>   
                    @endif
                </div>
            </div>
        </div>
	</section>
	<!--section_home-->
	<section class="section_about">
        <div class="flex-about">
            <div class="img-about">
                <img src="{{ asset('images/bg-about.svg')}}" alt="">
            </div>
            <div class="title-about">
                <div class="head-about">
                    <p>@lang('home.abouts')</p>
                </div>
                <div class="video-about">
                    <a data-fancybox="images" href="https://www.youtube.com/watch?v=rkpeMZQfvVk">
                        <div class="play-btn"><i class="fa fa-play"></i></div> 
                        <img class="img-fluid video-pic" src="{{ asset('images/about.png')}}" alt="">
                     </a>
                </div>
                <div class="shape-about"></div>
            </div>
        </div>
    </section>
    <!--section_about-->
    <section class="section_what_site">
        <div class="container">
            <div class="sec_head">
                <h3>@lang('home.what_store_website')</h3>
                <p>@lang('home.simple')</p>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="box-callouts">
                        <figure>
                            <img src="{{ asset('images/credit-card.png')}}" alt="">
                        </figure>
                        <div class="sec-title">
                            <h5>@lang('home.hoose_card')</h5>
                            <p>@lang('home.hoose_card_text')</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-callouts">
                        <figure>
                            <img src="{{ asset('images/shopping-cart.png')}}" alt="">
                        </figure>
                        <div class="sec-title">
                            <h5>@lang('home.choose_store')</h5>
                            <p>@lang('home.choose_store_text')</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-callouts">
                        <figure>
                            <img src="{{ asset('images/coin.png')}}" alt="">
                        </figure>
                        <div class="sec-title">
                            <h5>@lang('home.choose_price')</h5>
                            <p>@lang('home.choose_price_text')</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-callouts">
                        <figure>
                            <img src="{{ asset('images/qr-code.png')}}" alt="">
                        </figure>
                        <div class="sec-title">
                            <h5>@lang('home.receive_code')</h5>
                            <p>@lang('home.receive_code_text')<p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--section_what_site-->
    <section class="section_subscriber_ratings">
        <div class="container">
            <div class="sec_head">
                <h3>@lang('home.subscriber_ratings')</h3>
                <p>@lang('home.show_some')</p>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="owl-carousel owl-rtl owl-loaded owl-drag" id="slider-subscriber-ratings">
                        
                        
                    <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(745px, 0px, 0px); transition: all 0.25s ease 0s; width: 1987px;"><div class="owl-item cloned" style="width: 233.333px; margin-left: 15px;"><div class="item">
                            <div class="box-rate">
                                <figure>
                                    <img src="{{ asset('images/pro1.png')}}" alt="">
                                </figure>
                                <div class="sec-title">
                                    <h5>Salah Khattab</h5>
                                    <p>من أجمل المواقع لشراء البطاقات الاكترونية , وامان في الشراء</p>
                                </div>
                                <div class="rate-line">
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star"></span>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 233.333px; margin-left: 15px;"><div class="item">
                            <div class="box-rate">
                                <figure>
                                    <img src="{{ asset('images/pro.jpg')}}" alt="">
                                </figure>
                                <div class="sec-title">
                                    <h5>Hind Shaban</h5>
                                    <p>من أجمل المواقع لشراء البطاقات الاكترونية , وامان في الشراء</p>
                                </div>
                                <div class="rate-line">
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star"></span>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 233.333px; margin-left: 15px;"><div class="item">
                            <div class="box-rate">
                                <figure>
                                    <img src="{{ asset('images/pro.jpg')}}" alt="">
                                </figure>
                                <div class="sec-title">
                                    <h5>Salah Khattab</h5>
                                    <p>من أجمل المواقع لشراء البطاقات الاكترونية , وامان في الشراء</p>
                                </div>
                                <div class="rate-line">
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star"></span>
                                </div>
                            </div>
                        </div></div><div class="owl-item active" style="width: 233.333px; margin-left: 15px;"><div class="item">
                            <div class="box-rate">
                                <figure>
                                    <img src="{{ asset('images/pro.jpg')}}" alt="">
                                </figure>
                                <div class="sec-title">
                                    <h5>Hind Shaban</h5>
                                    <p>من أجمل المواقع لشراء البطاقات الاكترونية , وامان في الشراء</p>
                                </div>
                                <div class="rate-line">
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star"></span>
                                </div>
                            </div>
                        </div></div><div class="owl-item active" style="width: 233.333px; margin-left: 15px;"><div class="item">
                            <div class="box-rate">
                                <figure>
                                    <img src="{{ asset('images/pro1.png')}}" alt="">
                                </figure>
                                <div class="sec-title">
                                    <h5>Salah Khattab</h5>
                                    <p>من أجمل المواقع لشراء البطاقات الاكترونية , وامان في الشراء</p>
                                </div>
                                <div class="rate-line">
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star"></span>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned active" style="width: 233.333px; margin-left: 15px;"><div class="item">
                            <div class="box-rate">
                                <figure>
                                    <img src="{{ asset('images/pro.jpg')}}" alt="">
                                </figure>
                                <div class="sec-title">
                                    <h5>Hind Shaban</h5>
                                    <p>من أجمل المواقع لشراء البطاقات الاكترونية , وامان في الشراء</p>
                                </div>
                                <div class="rate-line">
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star"></span>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned active" style="width: 233.333px; margin-left: 15px;"><div class="item">
                            <div class="box-rate">
                                <figure>
                                    <img src="{{ asset('images/pro.jpg')}}" alt="">
                                </figure>
                                <div class="sec-title">
                                    <h5>Salah Khattab</h5>
                                    <p>من أجمل المواقع لشراء البطاقات الاكترونية , وامان في الشراء</p>
                                </div>
                                <div class="rate-line">
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star"></span>
                                </div>
                            </div>
                        </div></div><div class="owl-item cloned" style="width: 233.333px; margin-left: 15px;"><div class="item">
                            <div class="box-rate">
                                <figure>
                                    <img src="{{ asset('images/pro.jpg')}}" alt="">
                                </figure>
                                <div class="sec-title">
                                    <h5>Hind Shaban</h5>
                                    <p>من أجمل المواقع لشراء البطاقات الاكترونية , وامان في الشراء</p>
                                </div>
                                <div class="rate-line">
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star checked"></span>
                                    <span class="zmdi zmdi-star"></span>
                                </div>
                            </div>
                        </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i class="zmdi zmdi-chevron-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="zmdi zmdi-chevron-right"></i></button></div><div class="owl-dots disabled"></div></div>
                </div>
                <div class="col-md-4">
                    <div class="img-subscriber-ratings">
                        <img src="{{ asset('images/shape-rate.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--section_subscriber_ratings-->


@endsection