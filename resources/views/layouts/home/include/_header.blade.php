<header id="header">
    <div class="header-top">
        <div class="container">
            <ul class="social-media topHmenu-right clearfix">
                <li>
                    <a href="{{ setting('facebook_link') }}">
                        <i class="fa fa-facebook">
                        </i>
                    </a>
                </li>
                <li>
                    <a href="{{ setting('twitter_link') }}">
                        <i class="fa fa-twitter">
                        </i>
                    </a>
                </li>
                <li>
                    <a href="{{ setting('instagram_link') }}">
                        <i class="fa fa-instagram">
                        </i>
                    </a>
                </li>
                <li>
                    <a href="{{ setting('rss_link') }}">
                        <i class="fa fa-rss">
                        </i>
                    </a>
                </li>
            </ul>
            <ul class="topHmenu-left clearfix">
                <li class="dropdown">
                    <a href="product-page.html" data-toggle="dropdown" aria-expanded="true">@lang('home.language')</a>
                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(15px, 20px, 0px);">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" hreflang="{{ $localeCode }}" rel="alternate">{{ $properties['native'] }} </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                @auth

                @else
                <li class="dropdown">
                    <a href="product-page.html" data-toggle="dropdown">@lang('home.Currency')</a>
                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                        <li><a href="#">
                                <form action="{{ route('exchabges-rates') }}" method="get">
                                    <input type="text" hidden value="UST" name="rate">
                                    <button type="">USD</button>
                                </form>
                            </a>
                        </li>
                        <li><a href="#">
                                <form action="{{ route('exchabges-rates') }}" method="get">
                                    <input type="text" hidden value="AED" name="rate">
                                    <button type="">@lang('home.AED')</button>
                                </form>
                            </a>
                        </li>
                        <li><a href="#">
                                <form action="{{ route('exchabges-rates') }}" method="get">
                                    <input type="text" hidden value="EGP" name="rate">
                                    <button>@lang('home.EGP')</button>
                                </form>
                            </a>
                        </li>
                        <li><a href="#">
                                <form action="{{ route('exchabges-rates') }}" method="get">
                                    <input type="text" hidden value="KWD" name="rate">
                                    <button>@lang('home.KWD')</button>
                                </form>
                            </a>
                        </li>
                        <li><a href="#">
                                <form action="{{ route('exchabges-rates') }}" method="get">
                                    <input type="text" hidden value="MAD" name="rate">
                                    <button>@lang('home.MAD')</button>
                                </form>
                            </a>
                        </li>
                        <li><a href="#">
                                <form action="{{ route('exchabges-rates') }}" method="get">
                                    <input type="text" hidden value="TRY" name="rate">
                                    <button>@lang('home.TRY')</button>
                                </form>
                            </a>
                        </li>
                        <li><a href="#">
                                <form action="{{ route('exchabges-rates') }}" method="get">
                                    <input type="text" hidden value="LYD" name="rate">
                                    <button>@lang('home.LYD')</button>
                                </form>
                            </a>
                        </li>
                        <li><a href="#">
                                <form action="{{ route('exchabges-rates') }}" method="get">
                                    <input type="text" hidden value="NIS" name="rate">
                                    <button>@lang('home.NIS')</button>
                                </form>
                            </a>
                        </li>
                    </ul>
                </li>
                @endauth

            </ul>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <a class="logo-site" href="/">
                        <img alt="" class="img-responsive" src="{{ asset('home_file/images/logo.svg')}}">
                        </img>
                    </a>
                </div>
                <div class="col-md-5 col-sm-5">
                    <form action="{{ route('SearchCarts') }}" class="form-search-head" method="get">
                        <input class="form-control" name="search" placeholder="@lang('home.search_cart')" type="search" value="{{ request()->search }}">
                            <button class="btn btn-submit-search" type="submit">
                                <i aria-hidden="true" class="zmdi zmdi-search">
                                </i>
                            </button>
                        </input>
                    </form>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="clearfix">
                        <ul class="menu-purches clearfix">
                            <li class="iconfinder">
                                <a href="{{route('AssignmenController')}}">
                                    <img alt="" src="{{ asset('home_file/images/iconfinder_Referrals.svg')}}"/>
                                </a>
                            </li>
                            <li class="cart-purches-btn dropdown dropdown-cart-shooping">
                                <a data-toggle="dropdown">
                                    <div class="title-basket">
                                        <p>
                                            @lang('home.cart')
                                        </p>
                                        <small id="products_count">
                                            {{Cart::subtotal()}}{{ Session::get('price_icon')}}
                                        </small>
                                    </div>
                                    <figure>
                                        <img src="{{ asset('home_file/images/icon-shopping.svg')}}"/>
                                        <span id="totalprice">
                                            {{ Cart::count() }}
                                        </span>
                                    </figure>
                                </a>
                                <ul class="dropdown-menu">
                                    <div id="walletmodel">
                                        @foreach (Cart::content() as $item)

                                        {{-- {{dd($item->model->sub_category->color_1)}} --}}
                                        <a class="remove-drop">
                                            <i class="zmdi zmdi-close">
                                            </i>
                                        </a>
                                        <li>
                                            <div class="image-product">
                                                <div class="card-product">
                                                    <div class="" style="background: linear-gradient(180deg, {{ $item->model->sub_category->color_1 }} 0%, {{ $item->model->sub_category->color_2 }} 100%); border-radius: 10%">
                                                        <div class="">
                                                            <center>
                                                                <img alt="" src="{{ $item->model->cart_details->image_path }}" width="100"/>
                                                            </center>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="title-cart">
                                                <p>
                                                    {{ $item->model->cart_details->cart_name }}
                                                </p>
                                                <p>
                                                    <a href="#">
                                                        {{ $item->model->cart_details->short_descript }}
                                                    </a>
                                                </p>
                                                <div class="price-counter" style="text-align: center">
                                                    <strong style="text-align: center">
                                                        {{( $item->price  *  $item->qty)}} {{ Session::get('price_icon')}}
                                                    </strong>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </div>
                                    <div id="total-price">
                                        <p>
                                            الاجمالي:
                                        </p>
                                        <strong id="subtotal2">
                                            {{Cart::subtotal()}}  {{ Session::get('price_icon')}}
                                        </strong>
                                    </div>
                                    <div class="option-cart" style="text-align: center">
                                        <a class="btn-site-bg" href="{{route('wallet.index')}}" style="text-align: center">
                                            <small>
                                                تفاصيل السلة
                                            </small>
                                        </a>
                                    </div>
                                </ul>
                            </li>
                            @if(Auth::guard('cliants')->check())
                            <li class="login-btn pro-btn dropdown">
                                <img alt="" src="{{ Auth::guard('cliants')->user()->image_path }}">
                                    <a aria-expanded="false" data-toggle="dropdown">
                                        {{ Auth::guard('cliants')->user()->name }}
                                    </a>
                                    <ul aria-labelledby="dropdownMenu" class="dropdown-menu drop-profile multi-level" role="menu" style="">
                                        <li>
                                            <a href="{{ route('profiles.show', Auth::guard('cliants')->user()->id) }}">
                                                @lang('home.acount')
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('my_purchase')}}">
                                                @lang('home.my_purchases')
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{route('stars')}}">
                                               mjal @lang('dashboard.stars')⭐
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{route('ticit.index')}}">
                                                @lang('home.technical_support')
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                @lang('home.logout')
                                            </a>
                                        </li>
                                        <form action="{{ route('logouts') }}" class="d-none" id="logout-form" method="POST">
                                            @csrf
                                        </form>
                                    </ul>
                                </img>
                            </li>
                            @else
                            <li class="login-btn">
                                <img alt="" src="{{ asset('home_file/images/icon-user.svg')}}"/>
                                <a data-target="#exampleModal" data-toggle="modal">
                                    @lang('home.login')
                                </a>
                                <a data-target="#exampleModal" data-toggle="modal">
                                    @lang('home.register')
                                </a>
                            </li>
                            @endauth

                                   @if(Auth::guard('web')->check())
                            <li class="login-btn pro-btn dropdown">
                                <img alt="" src="{{ Auth()->user()->image_path }}">
                                    <a aria-expanded="false" data-toggle="dropdown">
                                        {{ Auth()->user()->name }}
                                    </a>
                                    <ul aria-labelledby="dropdownMenu" class="dropdown-menu drop-profile multi-level" role="menu" style="">
                                        @if (auth()->user()->hasPermission('dashboard_read'))
                                        <li>
                                            <a href="{{ route('dashboard.welcome') }}">
                                                @lang('home.dashboard')
                                            </a>
                                        </li>
                                        @endif
                                        <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            @lang('home.logout')
                                        </a>
                                        <form action="{{ route('logout') }}" class="d-none" id="logout-form" method="POST">
                                            @csrf
                                        </form>
                                    </ul>
                                </img>
                            </li>
                            @else
                            <!-- <li class="login-btn">
                                            <a href="{{ route('login') }}">@lang('home.login')</a>
                                        </li> -->
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="hb-right clearfix">
                <a class="hamburger is-closed" href="#menu">
                    <span class="hamb-top">
                    </span>
                    <span class="hamb-middle">
                    </span>
                    <span class="hamb-bottom">
                    </span>
                </a>
            </div>
            <div class="clearfix">
                <ul class="menu-st main-menu clearfix">
                    @foreach($parent_categories as $parent_category)
                    <li class="dropdown">
                        <a data-toggle="dropdown" href="product-page.html">
                            <img src="{{ $parent_category->image_path }}" width="20px"/>
                            <span>
                                {{$parent_category->name}}
                            </span>
                        </a>
                        @if($parent_category->id > 0)
                        <ul aria-labelledby="dropdownMenu" class="dropdown-menu multi-level" role="menu">
                            @foreach($parent_category->sub_category as $parent_category)
                            <li>
                                <a href="{{ route('product', $parent_category->id) }}">
                                    {{$parent_category->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @else

                                @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</header>
<!--header-->
@push('scripts')
<script>
    setInterval(function() {
                $("#products_count").load(window.location.href + " #products_count");
                $("#totalprice").load(window.location.href + " #totalprice");
                $("#subtotal2").load(window.location.href + " #subtotal2");
                $("#walletmodel").load(window.location.href + " #walletmodel");
        
            }, 2000);
</script>
@endpush
