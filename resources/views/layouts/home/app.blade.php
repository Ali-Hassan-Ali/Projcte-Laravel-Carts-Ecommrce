<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>مجال ستور </title>

    <!-- Stylesheets -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('home_file/images/logo.svg') }}" rel="icon">

    <link href="{{ asset('home_file/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('home_file/css/material-design-iconic-font.css')}}" rel="stylesheet">
    <link href="{{ asset('home_file/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('home_file/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('home_file/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
    <link href="{{ asset('home_file/css/animate.css')}}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{ asset('home_file/jQuery-Input-Plugin/css/intlInputPhone.css')}}" rel="stylesheet"> -->
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('home_file/css/responsive.css')}}" rel="stylesheet">


    <script src="{{ asset('home_file/js/jquery-3.2.1.min.js')}}"></script>

    @if (app()->getLocale() == 'ar')
        

        <link href="{{ asset('home_file/css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('home_file/css/responsive.css')}}" rel="stylesheet">

    @else

        <link href="{{ asset('home_file/css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('home_file/css/ltr-style.css')}}" rel="stylesheet">
        <link href="{{ asset('home_file/css/responsive.css')}}" rel="stylesheet">
        
    @endif
    <!-- Responsive -->

    <style type="text/css">
        .non,
        .non:hover {
            color: #fff; text-decoration: none;
        }
        .top-markt {
            padding-bottom:80px;
        }

        .button-markt {
            margin-top:75px;
        }
        select {
          /* for Firefox */
          -moz-appearance: none;
          /* for Chrome */
          -webkit-appearance: none;
            position: relative;

        }

        select option:hover {
            color: red;
        }

        select::-ms-expand {
          display: none;
        }
        

    </style>
    <link rel="stylesheet" href="{{ asset('home_file/sweetalert/sweetalert2.min.css')}}">
    <script src="{{ asset('home_file/sweetalert/sweetalert2.all.min.js')}}"></script>

    {{--ckeditor standard--}}
    <script src="{{ asset('home_file/plugins/ckeditor/ckeditor.js') }}"></script>

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">

    {{--esay complted search--}}
    <link rel="stylesheet" href="{{ asset('home_file/plugins/auto-compolted-search/easy-autocomplete.min.css') }}">
    <script src="{{ asset('home_file/plugins/auto-compolted-search/jquery.easy-autocomplete.min.js') }}"></script>
</head>
<body>

        <div class="mobile-menu">
            <div class="menu-mobile">
                <div class="brand-area">
                    <a href="#">
                        <img src="{{ asset('home_file/images/logo.svg')}}">
                        </img>
                    </a>
                </div>
                <div class="mmenu">
                    <ul>
                        @foreach($parent_categories as $parent_category)
                        <li class="dropdown">
                            <a data-toggle="dropdown" href="product-page.html">
                                <img src="{{ $parent_category->image_path }}" width="20px"/>
                                <span>
                                    {{$parent_category->name}}
                                </span>
                            </a>
                            <ul aria-labelledby="dropdownMenu" class="dropdown-menu multi-level" role="menu">
                                @foreach($parent_category->sub_category as $parent_category)
                                <li>
                                    <a href="#">
                                        {{$parent_category->name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="m-overlay">
            </div>
        </div>
        <!--mobile-menu-->
        <div class="main-wrapper">
            @include('layouts.home.include._header')
                    
            <!--header-->
            @yield('content')
            <!--section_download_app-->
            <div class="" style="margin-top: 100px; margin-bottom: 100px">
            </div>
            @include('layouts.home.include._footer')
        </div>
    <!--main-wrapper--> 

    <script src="{{ asset('home_file/js/popper.min.js')}}"></script>
    <script src="{{ asset('home_file/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('home_file/js/owl.carousel.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
    <script src="{{ asset('home_file/js/wow.js')}}"></script>
    <script src="{{ asset('home_file/js/script.js')}}"></script>
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/plugins/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
           $('.ckeditor').ckeditor();
        });
    </script>
    <!-- <script src="{{ asset('home_file/jQuery-Input-Plugin/js/intlInputPhone.js')}}"></script> -->

    

    <script>

        // $.ajaxSttep({

        //     headers: {

        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        //     },

        // });

        // var options = {
        //     url: function (search) {
                
        //         return "/SearchCarts?search" + search;

        //     },
        //         getValue : "cart_name",

        //     template : {
        //         type : 'iconLeft',
        //         fields : {
        //             iconSrc: "image_path"
        //         }
        //     }
            
        // };

        // $(".form-control[type='search']").easyAutocomplete(options);

        new WOW().init();
    
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    //
    </script>
        <script type="text/javascript">
            var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-36251023-1']);
      _gaq.push(['_setDomainName', 'jqueryscript.net']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
        </script>
        <script type="text/javascript">
            $(document).ready(function() {

                $(".add-cart").click(function(e){
                    e.preventDefault();
                    // alert('I hate tomatoes');

                    var url     = $(this).data('url');
                    var method  = $(this).data('method');

                    swal({
                        title: "@lang('home.added_successfully')",
                        type: "success",
                        icon: 'success',
                        showCancelButton: false,
                        timer: 1500
                    },

                    $.ajax({
                        url: url,
                        method: method,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function(data) {
                            console.log(data);

                            // alert('باســــــــــــــــــــل');
                        }, error: function(data) {

                            // alert('باســــــــــــــــــــل');
                            console.log(data);
                        },
                    })); //end of ajax  swal

                });//end of click

            });//end of document
        </script>
        @stack('scripts')
        @stack('purchase')
        @stack('loginReagiter')
        @stack('profile')
        @stack('TicitListSupports')
        @stack('coutact')
        @stack('RemindAvailable')

    </body>
</html>
