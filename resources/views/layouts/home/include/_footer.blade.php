        <footer id="footer" style="padding-top: 100px">
            <div class="top-ft">
                <div class="container">
                    <ul class="menu-ft">
                        <li><a href="{{ route('ShowUsagePolicy') }}">@lang('home.usage_policy')</a></li>
                        <li><a href="{{ route('showPrivacyPolicy') }}">@lang('home.privacy_policy')</a></li>
                        <li><a href="{{ route('showRecovery') }}">@lang('home.return_policy')</a></li>
                        <li><a href="{{ route('common_questions') }}">@lang('home.commonq_uestions')</a></li>
                        <li><a href="{{ route('showabout') }}">@lang('home.who_are_we')</a></li>
                        <li><a href="{{ route('contact') }}">@lang('home.connect_us')</a></li>
                    </ul>
                </div>
            </div>
            <div class="middle-ft">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="log-soci">
                                <div class="logo-ft">
                                    <figure><img src="{{ asset('home_file/images/logo.svg')}}" alt="" /></figure>
                                    <p>@lang('home.about')</p>
                                </div>
                                <ul class="social-media">
                                    <li class="twitter"><a href="{{ setting('twitter_link') }}"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li class="facebook"><a href="{{ setting('facebook_link') }}"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li class="instagram"><a href="{{ setting('youtube_link') }}"><i class="fa fa-youtube-play"></i></a></li>
                                    <li class="youtube"><a href="{{ setting('rss_link') }}"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <ul class="list-contact">
                                <li><img src="{{ asset('home_file/images/phone-call.svg')}}" /><p>{{ setting('phone_link') }}</p></li>
                                <li><img src="{{ asset('home_file/images/email.svg')}}" /><p>{{ setting('email_link') }}</p></li>
                                <li><img src="{{ asset('home_file/images/pin.svg')}}" /><p>Location store</p></li>
                            </ul>
                        </div>
                        <div class="col-md-5">
                            <div class="payment">
                                <p>@lang('home.payment_method')</p>
                                <ul>
                                    <li><img src="{{ asset('home_file/images/master_card.png')}}" /></li>
                                    <li><img src="{{ asset('home_file/images/paypal.png')}}" /></li>
                                    <li><img src="{{ asset('home_file/images/visa.png')}}" /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-ft">
                <div class="container">
                    <div class="copyright">
                        <p>Copyright © <?php echo date("Y")?>, MJAL STORE</p>
                    </div>
                </div>
            </div>
        </footer>
        <!--footer-->
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="zmdi zmdi-close"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true"> @lang('home.login')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false"> @lang('home.register')</a>
                            </li>
                        </ul>
                        <div class="form-reg">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                        <div class="alert alert-danger print-error-msg-login" style="display:none">
                                            <ul></ul>
                                        </div>
                                    <form action="{{ route('LoginCline') }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('post') }}
                                        
                                        <div class="form-group">
                                            <label><i class="fa fa-envelope"></i>@lang('dashboard.email')</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="@lang('dashboard.email')" />
                                            <span class="text-danger" id="emailError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="fa fa-lock"></i>@lang('dashboard.password')</label>
                                            <input type="password" id="password" name="password" class="form-control" placeholder="@lang('dashboard.password')" />
                                                <span class="text-danger" id="passwordError"></span>
                                            {{-- <a class="forgot-pass"> @lang('forget_password')</a> --}}
                                        </div> 
                                        <div class="form-group text-center">
                                            <button class="btn-shop login-clinte"
                                                    data-url="{{ route('LoginCline') }}"
                                                    data-method="post"
                                            ><span>@lang('home.login')</span></button>
                                        </div>
                                        <div class="nt-account text-center">
                                            <p>@lang('home.don_account')<a>@lang('home.create_account')</a></p>
                                        </div>
                                        <b class="or-shape">@lang('home.or')</b>
                                        <ul class="list-social">
                                            <li><a href="login/google"><i class="fa fa-google"></i></a></li>
                                            <li><a href="login/facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="login/twitter"><i class="fa fa-twitter"></i></a></li>
                                        </ul>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="{{ route('registers') }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('post') }}
                                        <div class="form-group">
                                            <label><i class="fa fa-user"></i> @lang('home.name')</label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="@lang('home.name')" />
                                            <span class="text-danger" id="nameError"></span>
                                        </div>
                                        <div class="form-group">
                                            <label><i class="fa fa-envelope"></i> @lang('home.email')</label>
                                            <input type="email" id="emailclinte" name="email" class="form-control" placeholder="@lang('home.email')" />
                                            <span class="text-danger" id="RegisrerEmailError"></span>

                                        </div>
                                        <div class="form-group">
                                            <label><i class="fa fa-phone"></i> @lang('home.phone')</label>
                                            <input type="number" id="phone_number" name="phone_number" class="form-control" placeholder="@lang('home.phone')"
                                             />
                                            <span class="text-danger" id="mobileNumberError"></span>

                                        </div>
                                        <div class="form-group">
                                            <label><i class="fa fa-lock"></i> @lang('home.password')</label>
                                            <input type="password" id="passwordclinte" name="password" class="form-control" placeholder="@lang('home.password')" />
                                            <span class="text-danger" id="RegisterPasswordError"></span>
                                        </div> 
                                        <div class="form-group text-center">
                                            <button class="btn-shop register-clinte"
                                                    data-url="{{ route('registers') }}"
                                                    data-method="post"
                                            ><span>@lang('home.register')</span></button>
                                        </div>
                                        <div class="nt-account text-center">
                                            <p>@lang('home.already_account')<a> @lang('home.login')</a></p>
                                        </div>
                                        <b class="or-shape">@lang('or')</b>
                                        <ul class="list-social">
                                            <li><a href="login/google"><i class="fa fa-google"></i></a></li>
                                            <li><a href="login/facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="login/twitter"><i class="fa fa-twitter"></i></a></li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@push('loginReagiter')
    <script>

    $(document).ready(function() {

        $(".login-clinte").click(function(e){
            e.preventDefault();

            var url       = $(this).data('url');
            var method    = $(this).data('method');

            var email     = $('#email').val();
            var password  = $('#password').val();

            var redircte  = "{{ route('/') }}";
            // alert(redircte);

            $.ajax({
                url: url,
                method: method,
                data:{
                    email:email,
                    password:password,
                },
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    if ($.isEmptyObject(response.error)) {
                        swal({
                            title: '@lang("home.addessuccfluy")',
                            timer: 7000,
                        });
                        $(".login-clinte").prop("disabled",true);
                        // alert(response.success);
                    } else {
                        printErrorMsg(response.error);
                    }

                   if(response.success) {
                        location.reload();
                        window.location.href = redircte;
                   }
                },//end of success
            });//end of ajax  

                function printErrorMsg(msg) {
                    $(".print-error-msg-login").find("ul").html('');
                    $(".print-error-msg-login").css('display', 'block');
                    $.each(msg, function(key, value) {
                        $(".print-error-msg-login").find("ul").empty();
                        $(".print-error-msg-login").find("ul").append('<li>' + value + '</li>');
                    });
                }//end of function printErrorMsg

        });//end of click



        $(".register-clinte").click(function(e){
            e.preventDefault();

            var url       = $(this).data('url');
            var method    = $(this).data('method');

            var name      = $('#name').val();
            var email     = $('#emailclinte').val();
            var phone     = $('#phone_number').val();
            var password  = $('#passwordclinte').val();
            var redircte  = "{{ route('/') }}";

            $('#nameError').text('');
            $('#RegisrerEmailError').text('');
            $('#mobileNumberError').text('');
            $('#RegisterPasswordError').text('');

            $.ajax({
                url: url,
                method: method,
                data:{
                    email:email,
                    name:name,
                    phone_number:phone,
                    password:password,
                },
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    
                    if (response.success == true) {

                        $(".register-clinte").prop("disabled",true);
                        
                        swal({
                            title: '@lang("home.addessuccfluy")',
                            timer: 12000,
                        });
                        
                        location.reload();
                        window.location.href = redircte;

                    } //end of if

                },//end of success
                error:function (response) {
                  $('#nameError').text(response.responseJSON.errors.name);
                  $('#RegisrerEmailError').text(response.responseJSON.errors.email);
                  $('#mobileNumberError').text(response.responseJSON.errors.phone_number);
                  $('#RegisterPasswordError').text(response.responseJSON.errors.password);
                }//end of errors
            });//end of ajax  

        });//end of click

    });//end of document ready functiom

    </script>
@endpush