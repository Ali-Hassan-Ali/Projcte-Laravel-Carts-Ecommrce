@extends('layouts.home.app')

@section('content')
<div class="container">
    @if (session()->has('success_message'))
    <div class="alert alert-success">
        <center>
            <h4>
                {{ session()->get('success_message') }}
            </h4>
        </center>
    </div>
    @endif

@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            <center>
                <li>
                    {{ $errors }}
                </li>
            </center>
        </ul>
    </div>
    @endif

                         @foreach ($errors->all() as $error)
    <p class="text-danger">
        {{ $error }}
    </p>
    @endforeach
</div>
    
    <div class="main-wrapper">
    
    
       <section class="section_profile">
            <div class="container">
             
                <div class="sec_head text-center"><?php date("Y/m/d") ?>
                    <h2>@lang('home.account_information')</h2>
                </div>
                <div class="modal fade" id="modal-purchase-voucher" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <p>
                                شحن قسيمة شرائية
                            </p>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span class="zmdi zmdi-close">
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('recharge',$cliants->id)}}" class="form-site" method="post">
                                {{ csrf_field() }}
                            {{ method_field('post') }}
                                <div class="form-group">
                                    <label>
                                        كود البطاقة
                                    </label>
                                    <input class="form-control" name="code" placeholder="أدخل كود البطاقة هنا" type="text"/>
                                </div>
                                <div class="form-group">
                                    <button class="btn-shop">
                                        تحقق
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-profile">
                <form action="{{ route('profiles.update', $cliants->id ) }}" class="form-profile" enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                        {{ method_field('put') }}
                    <div class="main-data">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input accept=".png, .jpg, .jpeg" id="imageUpload" name="image" type="file" value="{{ Auth::guard('cliants')->user()->image_path }}"/>
                                <label for="imageUpload">
                                </label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url('{{ Auth::guard('cliants')->user()->image_path }} ');">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>
                                <i class="fa fa-lock">
                                </i>
                                @lang('dashboard.name')
                            </label>
                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} bg-daek" name="name" placeholder="" type="test" value="{{ Auth::guard('cliants')->user()->name }}" readonly/>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $errors->first('name') }}
                                </strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>
                                <i class="fa fa-lock">
                                </i>
                                @lang('dashboard.email')
                            </label>
                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="" type="email" value="{{ Auth::guard('cliants')->user()->email }}" readonly />
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $errors->first('email') }}
                                </strong>
                            </span>
                            @endif
                        </div>
                        `
                        {{-- <p>
                            @lang('home.change_name')
                            <strong>
                                @lang('home.technical_support')
                            </strong>
                        </p> --}}
                        <div class="form-group">
                            <label>
                                <i class="fa fa-phone">
                                </i>
                                @lang('dashboard.phone')
                            </label>
                            <input class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" id="yourphone" name="phone_number" placeholder="" type="phone" value="{{ Auth::guard('cliants')->user()->phone_number }}"/>
                            <div class="input-phone">
                            </div>
                            @if ($errors->has('phone_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $errors->first('phone_number') }}
                                </strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>
                                <a data-target="#ChangPasswordModal" data-toggle="modal" href="">
                                    @lang('dashboard.changpassword')
                                </a>
                            </strong>
                        </div>
                        <div class="form-group Mb-0 pb-0">
                        </div>
                    </div>
                    <div class="setting-data">
                        <strong>
                        </strong>
                        <div class="fl-setting pt-0">
                            <div class="switch-settings">

                                <div class="toggle-wrapper">
                                    <div class="toggle normal">
                                        <input  class="normal-switch" id="codeMobail" name="code_cart_phone" type="checkbox" value="1"
                                            data-email="{{auth::guard('cliants')->user()->code_cart_email}}"
                                            {{ auth::guard('cliants')->user()->code_cart_phone == 1 ? 'checked' : '' }}
                                            />
                                            <label class="toggle-item" for="codeMobail">
                                            </label>
                                            <span>
                                                @lang('home.Send_mobile_number')
                                            </span>
                                        </input>
                                    </div>
                                </div>
                                <div class="toggle-wrapper">
                                    <div class="toggle normal">
                                        <input  class="normal-switch" id="codeEmail" name="code_cart_email" type="checkbox" value="1" 
                                                data-phone="{{auth::guard('cliants')->user()->code_cart_phone}}"
                                                {{ auth::guard('cliants')->user()->code_cart_email == 1 ? 'checked' : '' }} 
                                                />
                                            <label class="toggle-item" for="codeEmail">
                                            </label>
                                            <span>
                                                @lang('home.Send_email_number')
                                            </span>
                                        </input>
                                    </div>
                                </div>
                                <div class="toggle-wrapper">
                                    <div class="toggle normal">
                                        <input - class="normal-switch" id="holiday_message" name="holiday_message" type="checkbox" value="1"
                                            {{ auth::guard('cliants')->user()->holiday_message == 1 ? 'checked' : '' }}/>
                                            <label class="toggle-item" for="holiday_message">
                                            </label>
                                            <span>
                                                @lang('home.Events_holidays')
                                            </span>
                                        </input>
                                    </div>
                                </div>
                                <div class="toggle-wrapper">
                                    <div class="toggle normal">
                                        <input  class="normal-switch" id="monthly_message" name="monthly_message" type="checkbox" value="1"
                                            {{ auth::guard('cliants')->user()->monthly_message == 1 ? 'checked' : '' }}/>
                                            <label class="toggle-item" for="monthly_message">
                                            </label>
                                            <span>
                                                @lang('home.new_updates')
                                            </span>
                                        </input>
                                    </div>
                                </div>
                                <div class="toggle-wrapper">
                                    <div class="toggle normal">
                                        <input class="normal-switch" id="smart_email" name="smart_email" type="checkbox" value="1"
                                            {{ auth::guard('cliants')->user()->smart_email == 1 ? 'checked' : '' }}/>
                                            <label class="toggle-item" for="smart_email">
                                            </label>
                                            <span>
                                                ا@lang('home.Smart_email')
                                            </span>
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="total-balance">
                                <p>
                                    @lang('home.Your_balance_site')
                                    <strong>
                                        $  {{$cliants->account_balance}}
                                    </strong>
                                </p>
                                <p>
                                    @lang('home.Copy_link')
                                    <a>
                                        http://127.0.0.1:8000/ar/referral/{{$cliants->assignmen_link}}
                                    </a>
                                </p>
                                <p class="purchaseVoucher ">
                                    شحن قسيمة شرائية
                                    <a data-target="#modal-purchase-voucher" data-toggle="modal">
                                        شحن
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="main-data">
                            <button class="btn-shop">
                                <span>
                                    @lang('home.update')
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--section_profile-->
</div>
<!--main-wrapper-->
<div aria-hidden="true" aria-labelledby="ChangPasswordModalModalLabel" class="modal fade" id="ChangPasswordModal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header p-0">
                <button aria-label="Close" class="close p-0" data-dismiss="modal" type="button">
                    <span class="zmdi zmdi-close">
                    </span>
                </button>
            </div>
            <div class="modal-body pt-0">
                <div class="form-reg pt-2">
                    <div class="tab-content" id="myTabContent">
                        <div aria-labelledby="login-tab" class="tab-pane fade show active" id="login" role="tabpanel">
                            <form action="{{ route('changePassword',Auth::guard('cliants')->user()->id) }}" method="post">
                                {{ csrf_field() }}
                                        {{ method_field('post') }}
                                <div class="form-group">
                                    <label>
                                        <i class="fa fa-lock">
                                        </i>
                                        @lang('dashboard.password_old')
                                    </label>
                                    <input class="form-control" id="current_password" name="current_password" placeholder="@lang('dashboard.password')" type="password"/>
                                    <span class="text-danger" id="errorCurrentPassword"></span>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <i class="fa fa-lock">
                                        </i>
                                        @lang('dashboard.password')
                                    </label>
                                    <input class="form-control" id="new_password" name="new_password" placeholder="@lang('dashboard.password')" type="password"/>
                                    <span class="text-danger" id="errorNewPassword"></span>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <i class="fa fa-lock">
                                        </i>
                                        @lang('dashboard.password_confirmation')
                                    </label>
                                    <input class="form-control" id="new_confirm_password" name="new_confirm_password" placeholder="@lang('dashboard.password')" type="password"/>
                                    <span class="text-danger" id="errorNewConfirmPassword"></span>
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn-shop current-password"
                                            data-url="{{ route('changePassword',Auth::guard('cliants')->user()->id) }}"
                                            data-method="post"
                                        >
                                        <span>
                                            @lang('dashboard.changpassword')
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('loginReagiter')
    <script>

    $(document).ready(function() {

        $(".current-password").click(function(e){
            e.preventDefault();

            var url       = $(this).data('url');
            var method    = $(this).data('method');

            var current_password       = $('#current_password').val();
            var new_password           = $('#new_password').val();
            var new_confirm_password   = $('#new_confirm_password').val();

            $('#errorCurrentPassword').text('');
            $('#errorNewPassword').text('');
            $('#errorNewConfirmPassword').text('');

            $.ajax({
                url: url,
                method: method,
                data:{
                    current_password:current_password,
                    new_password:new_password,
                    new_confirm_password:new_confirm_password,
                },
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    alert(response);
                    if (response.success == true) {

                        $('#current_password').val('');
                        $('#new_password').val('');
                        $('#new_confirm_password').val('');
                        
                        swal({
                            title: '@lang("home.addessuccfluy")',
                            timer: 12000,
                        });

                        $("#ChangPasswordModal").modal("hide");

                    }//end of if
                },//end of success
                error:function (response) {
                  $('#errorCurrentPassword').text(response.responseJSON.errors.current_password);
                  $('#errorNewPassword').text(response.responseJSON.errors.new_password);
                  $('#errorNewConfirmPassword').text(response.responseJSON.errors.new_confirm_password);
                }//end of errors
            });//end of ajax  

        });//end of click


        $("#codeEmail").on('change', function () {

            if ($("#codeMobail").is(":checked") == true) {

                $("#codeMobail").prop("checked",false);  
                
            } else {

                $("#codeMobail").prop("checked",true);

            }//endof if

        });//change codeEmail

        $("#codeMobail").on('change', function () {

            if ($("#codeEmail").is(":checked") == true) {

                $("#codeEmail").prop("checked",false);

            } else {

                $("#codeEmail").prop("checked",true);

            }// end of if

        });//change codeMobail


    });//end of document ready functiom

    </script>
@endpush