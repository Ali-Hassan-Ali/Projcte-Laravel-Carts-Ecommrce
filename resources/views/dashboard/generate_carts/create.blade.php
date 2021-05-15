@extends('layouts.dashboard.app')

@section('content')

<div class="c-subheader justify-content-between px-3">

    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">@lang('dashboard.dashboard')</li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.generate_carts.index') }}">@lang('dashboard.generate_carts')</a></li>
        <li class="breadcrumb-item active">@lang('dashboard.add')</li>
    </ol>

</header>

<div class="c-body">
    <main class="c-main">

<div class="col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <strong>@lang('dashboard.add')</strong>
        </div>
        <div class="card-body">
            
            <div class="row">

                <div class="col-sm-12">


                    <form action="{{ route('dashboard.generate_carts.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}


                        <div class="form-group">
                            <label>@lang('dashboard.cart_name')</label>
                            <input type="text" name="cart_name" class="form-control{{ $errors->has('cart_name') ? ' is-invalid' : '' }}" value="{{ old('cart_name') }}">
                            @if ($errors->has('cart_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cart_name') }}</strong>
                                </span>
                            @endif
                        </div>

                      

                        <div class="form-group">
                            <label>@lang('dashboard.cart_name_en')</label>
                            <input type="text" name="cart_name_en" class="form-control{{ $errors->has('cart_name_en') ? ' is-invalid' : '' }}" value="{{ old('cart_name_en') }}">
                            @if ($errors->has('cart_name_en'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cart_name_en') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.quentity')</label>
                            <select name="quentity" class="form-control">
                            
                                <option value="100">100</option>
                                <option value="250">250</option>
                                <option value="500">500</option>
                                <option value="1000">1000</option>
                           
                            </select>
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.sub_categories')</label>
                            <select name="sub_category_id" class="form-control">
                            @foreach ($sub_categorys as $sub_category)
                                <option value="{{ $sub_category->id }}"> {{ $sub_category->name }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.cart_text')</label>
                            <input type="text" name="cart_text" class="form-control{{ $errors->has('cart_text') ? ' is-invalid' : '' }}" value="{{ old('cart_text') }}">
                            @if ($errors->has('cart_text'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cart_text') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.cart_text_en')</label>
                            <input type="text" name="cart_text_en" class="form-control{{ $errors->has('cart_text_en') ? ' is-invalid' : '' }}" value="{{ old('cart_text_en') }}">
                            @if ($errors->has('cart_text_en'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cart_text_en') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.markets')</label>
                            <select name="market_id" class="form-control">
                            <option value="0" > </option>
                            @foreach ($markets as $market)
                                <option value="{{ $market->id }}" > {{ $market->name }}</option>
                            @endforeach
                            </select>
                        </div>


                    
                      
                        <div class="form-group">
                            <label>@lang('dashboard.amrecan_price')</label>
                            <input type="number" name="amrecan_price" class="form-control{{ $errors->has('amrecan_price') ? ' is-invalid' : '' }}" value="{{ old('amrecan_price') }}">
                            @if ($errors->has('amrecan_price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('amrecan_price') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div>

            </div>
            <!--/.row-->
        </div>

    </div>

</div>

@endsection
