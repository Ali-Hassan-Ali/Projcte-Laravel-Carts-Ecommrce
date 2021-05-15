@extends('layouts.home.app')
@section('content')

<!--header-->

	<div class="breadcrumb-bar">
		<div class="container">
           
			<ol class="breadcrumb">
			   <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
			   <li class="breadcrumb-item">@lang('home.connect_us')</li>
			</ol>
		</div>
	</div>

<!--breadcrumb-bar-->


	<section class="section_st_page">
            <div class="container">

                @if (session()->has('message'))
                <div class="alert alert-success">
                    <center>
                        <h4>
                            {{ session()->get('message') }}
                        </h4>
                    </center>
                </div>
                @endif
                
                <div class="sec_head text-center">
                    <h2>@lang('home.connect_us')</h2>
                </div>
                <div class="content-contact">
                    <div class="box-img-contact">
                        <figure>
                            <img src="{{ asset('images/contact.svg')}}" alt="">
                        </figure>
                        <div class="follow-us">
                            <p>@lang('home.follow_on')</p>
                            <ul>
                                <li><a href="{{ setting('facebook_link') }}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ setting('twitter_link') }}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ setting('instagram_link') }}"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <form class="form-contact" action="{{ route('storecontact') }}" method="post">
                    	
                    	{{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="head-contact">
                            <span>@lang('home.question')</span>
                            <p>@lang('home.connect_us')</p>
                        </div>
                        <div class="form-group">
                            <input type="text" id="NameContact" name="name" class="form-control" placeholder="@lang('home.name')">
                            <span class="text-danger" id="NameContactError"></span>
                        </div>
                        <div class="form-group">
                            <input type="email" id="EmailContact" name="email" class="form-control" placeholder="@lang('home.email')">
                            <span class="text-danger" id="EmailContactError"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" id="SubjectContact" name="subject" class="form-control" placeholder="@lang('home.subject')">
                            <span class="text-danger" id="SubjectContactError"></span>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="MessageContact" name="message" placeholder="@lang('home.text_message')"></textarea>
                            <span class="text-danger" id="MessageContactError"></span>
                        </div>
                        <div class="form-group">
                            <button class="btn-site"
                                    data-url="{{ route('storecontact') }}"
                                    data-method="post"
                            ><span>@lang('home.send')</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

<!--section_st_page-->


@endsection


@push('coutact')
    <script>

    $(document).ready(function() {


        $(".btn-site").click(function(e){
            e.preventDefault();

            var url       = $(this).data('url');
            var method    = $(this).data('method');

            var NameContact      = $('#NameContact').val();
            var EmailContact     = $('#EmailContact').val();
            var SubjectContact   = $('#SubjectContact').val();
            var MessageContact   = $('#MessageContact').val();


            $('#NameContactError').text('');
            $('#EmailContactError').text('');
            $('#SubjectContactError').text('');
            $('#MessageContactError').text('');

            $.ajax({
                url: url,
                method: method,
                data:{
                    name:NameContact,
                    email:EmailContact,
                    subject:SubjectContact,
                    message:MessageContact,
                },
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    
                    if (response.success == true) {

                        $('#NameContact').val('');
                        $('#EmailContact').val('');
                        $('#SubjectContact').val('');
                        $('#MessageContact').val('');
                        
                        swal({
                            title: '@lang("home.addessuccfluy")',
                            timer: 22000,
                        });

                    } //end of if

                },//end of success
                error:function (response) {
                  $('#NameContactError').text(response.responseJSON.errors.name);
                  $('#EmailContactError').text(response.responseJSON.errors.email);
                  $('#SubjectContactError').text(response.responseJSON.errors.subject);
                  $('#MessageContactError').text(response.responseJSON.errors.message);
                }//end of errors
            });//end of ajax  

        });//end of click

    });//end of document ready functiom

    </script>
@endpush