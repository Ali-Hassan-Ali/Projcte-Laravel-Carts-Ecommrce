@extends('layouts.home.app')

@section('content')

	<!--header-->

	<div class="breadcrumb-bar">
		<div class="container">
			<ol class="breadcrumb">
			   <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
			   <li class="breadcrumb-item">@lang('home.quick_urchase')</li>
			</ol>
		</div>
	</div>

	<!--breadcrumb-bar-->

	<section class="section_ticit_supp">
            <div class="container">
                <div class="content-purchase">
                <ul class="line-puch">
                    <li class="prouduct-categoryed-active"><p>@lang('dashboard.parent_categorys')</p></li>
                    <li class="prouduct-sub_categoryed-active"><p>@lang('dashboard.sub_categories')</p></li>
                    <li class="prouduct-market-active"><p>@lang('home.market')</p></li>
                    <li class="prouduct-price-active"><p>@lang('home.cart')</p></li>
                </ul>
                <div class="flex-puch">
                    
                    <div class="boxCard">
                        <div class="box-card prouduct-sub_categoryed">
                            <div class="title-card">
                                <center class="prouduct-image"></center>
                                <h2 class="prouduct-name"></h2>
                                <p class="prouduct-description"></p>
                                <span class="prouduct-market"></span>
                                <strong class="prouduct-price"></strong>
                            </div>
                        </div>
                    </div>

                    <div class="dataPuch">
                        <form class="form-puch" action="{{ route('Purchase.store') }}" method="post">
                            
                            {{ csrf_field() }}
                            {{ method_field('post') }}

                            <div class="form-group">
                                    
                                <label>@lang('dashboard.parent_categorys')</label>
                                <select class="form-control" id="categorys">
                                    <option >@lang('home.select')</option>
                                    @foreach($parent_categories as $parent_category)
                                    <option data-method="get"
                                            data-url="{{ route('purchase.categorys', $parent_category->id ) }}"
                                      >{{ $parent_category->name }}</option>
                                    @endforeach
                                </select>
                                    
                            </div>
                            <div class="form-group sub_categories-d-none d-none">
                                <label>@lang('dashboard.sub_categories')</label>
                                <select class="form-control" id="sub_categoryed">
                                    <option>@lang('home.select')</option>
                                    @foreach($sub_categorys as $sub_category)
                                    <option 
                                            data-method="get"
                                            data-url="{{ route('purchase.sub_categoryed', $sub_category->id ) }}"
                                            data-color1="{{ $sub_category->color_1 }}"
                                            data-color2="{{ $sub_category->color_2 }}"
                                    >{{ $sub_category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group makted-d-none d-none">
                                <label>@lang('home.market')</label>
                                <select class="form-control" id="makted">
                                	<option>@lang('home.select')</option>
                                	@foreach($markets as $market)
                                    <option 
                                            data-method="get"
                                            data-url="{{ route('purchase.makted', $market->id ) }}"
                                    		data-name="{{ $market->name }}"
                                    >{{ $market->name }}</option>
                                	@endforeach
                                </select>
                            </div>
                            <div class="form-group proudcted-d-none d-none">
                                <label>@lang('home.cart')</label>
                                <select class="form-control" id="proudcted">
                                    <option non>@lang('home.select')</option>
                                	@foreach($products as $product)
                                    <option
											data-name="{{ $product->cart_details->cart_name }}"
											data-description="{{ $product->cart_details->short_descript }}"
											data-price="{{ $product->amrecan_price }}"
                                    >{{ $product->amrecan_price }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="sub-categiry-form"></div>
                            <div class="proudcted-form"></div>

                            <div class="form-group button-d-none d-none">
                                <button class="btn-shop">@lang('home.next')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<!--section_ticit_supp-->
@endsection

@push('scripts')
    <script>

    $(document).ready(function() {

         $('#categorys').on('change', function() {
            var $option      = $(this).find(":selected");
            var url          = $option.data('url');
            var method       = $option.data('method');
            var id           = $option.data('id');
            var loca         = "{{ LaravelLocalization::getCurrentLocaleDirection() }}";

            // alert(url);

            // $("#sub_categoryed").empty();
            $("#makted").empty();
            $("#proudcted").empty();
            $('.button-d-none').addClass('d-none');

            $('.prouduct-description').empty();
            $('.prouduct-price').empty();
            $('.prouduct-image').empty();

            $('.proudcted-form').empty();

            $('.prouduct-price-active').removeClass('puchDone');
            $('.prouduct-market-active').removeClass('puchDone');
            $('.prouduct-sub_categoryed-active').removeClass('puchDone');


             $.ajax({
                url: url,
                method: method,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(data) {
                    
                    $("#sub_categoryed").empty();
                    $('.prouduct-categoryed-active').addClass('puchDone');
                    $('.sub_categories-d-none').removeClass('d-none');
                    $("#sub_categoryed").append('<option>@lang('home.select_sub_category')</option>');
                    $.each(data,function(key,value){

                        if (loca == 'rtl') {
                            console.log(loca);
                            var lang = value.name.ar;
                        } else {
                            console.log(loca);
                            var lang = value.name.en;
                        }
                        $("#sub_categoryed").append('<option name="sub_category_id" value="'+value.id+'" data-name="'+lang+'" data-id="'+value.id+'" data-color1="'+value.color_1+'" data-color2="'+value.color_2+'" data-method="get" data-url="{{ route('purchase.sub_categoryed',1) }}">'+lang+'</option>');
                    });//en each
                    
                  
                    // console.log(data);
                },
                error: function(data) {

                    // console.log(data);

                },//end ajax error
            });//this ajax  

         });//end ajac category


         $('#sub_categoryed').on('change', function() {
            var $option      = $(this).find(":selected");
            var url          = $option.data('url');
            var method       = $option.data('method');
            var id           = $option.data('id');``
            var name         = $option.data('name');;
            var loca         = "{{ LaravelLocalization::getCurrentLocaleDirection() }}";
            // alert(loca);
            
            var color1       = $option.data('color1');
            var color2       = $option.data('color2');

            // $("#makted").empty();
            $('.proudcted-form').empty();
            $('.sub-categiry-form').empty();
            $("#proudcted").empty();
            $('.prouduct-market').empty();
            $('.makted-d-none').addClass('d-none');
            $('.proudcted-d-none').addClass('d-none');

            $('.button-d-none').addClass('d-none');

            $('.prouduct-description').empty();
            $('.prouduct-price').empty();
            $('.prouduct-image').empty();

            $('.proudcted-form').empty();

                
            $.ajax({
                url: 'Fast-Purchase-sub_categoryed/'+id,
                method: method,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(data) {

                    $('.prouduct-name').empty();
                    $('.prouduct-name').append(name);

                    $('.prouduct-sub_categoryed').css('background',color1);

                    $('.prouduct-sub_categoryed-active').addClass('puchDone');
                    $('.makted-d-none').removeClass('d-none');
                    $('.sub-categiry-form').empty();
                    $('.sub-categiry-form').append('<input type="hidden" name="sub_category_id" value="'+id+'" />');

                    console.log(data);
                    $("#makted").empty();
                    $("#makted").append('<option>@lang('home.select_market')</option>');
                    $.each(data,function(key,value){
                        if (loca == 'rtl') {
                            var lang = value.name.ar;
                            console.log(lang);
                        } else {
                            console.log(loca);
                            var lang = value.name.en;
                        }
                
                        $("#makted").append('<option name="market_id" value="'+value.id+'" data-id="'+value.id+'" data-name="'+lang+'" data-method="get" data-url="{{ route('purchase.makted',1 ) }}">'+lang+'</option>');
                    });//en each
                  
                        // console.log(data);
                },
                error: function(data) {

                    // console.log(data);

                },//end ajax error
            });//this ajax  

         });//end of sub categoryed


    	 $('#makted').on('change', function() {
		    var $option 	 = $(this).find(":selected");
        	var name 	 	 = $option.data('name');
            var url          = $option.data('url');
            var method       = $option.data('method');
            var id           = $option.data('id');
            var loca         = "{{ LaravelLocalization::getCurrentLocaleDirection() }}";

		    // alert(name);
            // $("#proudcted").empty();
            $('.button-d-none').addClass('d-none');

            $('.prouduct-description').empty();
            $('.prouduct-price').empty();
            $('.prouduct-image').empty();
            $('.proudcted-form').empty();

            $("#proudcted").empty();
            $("#proudcted").append('<option>@lang('home.select_cart')</option>');

            $.ajax({
                url: 'Fast-Purchase-makted/'+id,
                // url: url,
                method: method,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(data) {
                    $('.proudcted-d-none').removeClass('d-none');

        		    $('.prouduct-market').empty();
        		    $('.prouduct-market').append(name);

                    $('.proudcted-form').empty();
                    $('.proudcted-form').append('<input type="hidden" name="market_id" value="'+id+'" />');
        		    $('.prouduct-market-active').addClass('puchDone');

                    $.each(data,function(key,value){
                    console.log(value);
                        if (value == null) {
                            $('.button-d-none').removeClass('d-none');
                        } else {
                            $('.button-d-none').addClass('d-none');
                        }
                        if (loca == 'rtl') {
                            // console.log(loca);
                            var lang = value.cart_details.cart_name.ar;
                            var langdes = value.cart_details.short_descript.ar;
                            var cart_text = value.cart_details.cart_text.ar;
                        } else {
                            // console.log(loca);
                            var lang = value.cart_name.en;
                            var langdes = value.short_descript.en;
                            var cart_text = value.cart_text.en;
                        };

                        // $('#proudcted').empty();
                        $("#proudcted").append('<option data-id="'+value.id+'" data-image="'+value.cart_details.image+'" data-price="'+value.amrecan_price+'" data-text="'+cart_text+'" data-name="'+lang+'" data-description="'+langdes+'">'+value.amrecan_price+'</option>');

                    });//en each
                  
                },
                error: function(data) {

                    // console.log(data);

                },//end ajax error
            });//this ajax  

		 });


    	 $('#proudcted').on('change', function() {
		    var $option 	 = $(this).find(":selected");
        	var id     	 	 = $option.data('id');
            var name         = $option.data('name');
            var text         = $option.data('text');
        	var description  = $option.data('description');
        	var price 		 = $option.data('price');
            var image        = $option.data('image');

		    // alert(image);

            $('.proudcted-form').append('<input type="hidden" name="cart_id" value="'+id+'" />');
            $('.proudcted-form').append('<input type="hidden" name="cart_name" value="'+name+'" />');
            $('.proudcted-form').append('<input type="hidden" name="short_descript" value="'+description+'" />');
            $('.proudcted-form').append('<input type="hidden" name="cart_text" value="'+text+'" />');
            $('.proudcted-form').append('<input type="hidden" name="image" value="'+image+'" />');
            $('.proudcted-form').append('<input type="hidden" name="amrecan_price" value="'+price+'" />');

            $('.prouduct-description').empty();
		    $('.prouduct-description').append(description);
		    
            $('.prouduct-price').empty();
            $('.prouduct-price').append(price);

            $('.prouduct-image').empty();
            $('.prouduct-image').append('<img src="{{ asset('uploads/cart_images/') }}/'+ image +'">');
		    // $(select).append('disabled');
		    $('.prouduct-price-active').addClass('puchDone');

            $('.button-d-none').removeClass('d-none');

		 });


  

    });//end of document ready functiom

    </script>
@endpush