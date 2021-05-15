@extends('layouts.dashboard.app')

@section('content')

<div class="c-subheader justify-content-between px-3">

    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">@lang('dashboard.dashboard')</li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.carts_store.index') }}">@lang('dashboard.carts_store')</a></li>
        <li class="breadcrumb-item active">@lang('dashboard.edit')</li>
    </ol>

</header>

<div class="c-body">
    <main class="c-main">

<div class="col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <strong>@lang('dashboard.edit')</strong>
        </div>
        <div class="card-body">
        
            <div class="row">

                <div class="col-sm-12">


                    <form action="{{ route('dashboard.carts_store.update', $cartStore->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}


                         <div class="form-group">
                            <label>@lang('dashboard.cart_name')</label>
                            <input type="text" name="cart_name" class="form-control{{ $errors->has('cart_name') ? ' is-invalid' : '' }}" value="{{ $cartStore->getTranslation('cart_name', 'ar') }}">
                            @if ($errors->has('cart_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cart_name') }}</strong>
                                </span>
                            @endif
                        </div>

                      
                        <div class="form-group">
                            <label>@lang('dashboard.cart_name_en')</label>
                            <input type="text" name="cart_name_en" class="form-control{{ $errors->has('cart_name_en') ? ' is-invalid' : '' }}" value="{{ $cartStore->getTranslation('cart_name', 'en') }}">
                            @if ($errors->has('cart_name_en'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cart_name_en') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.cart_code')</label>
                            <input type="text" name="cart_code" class="form-control{{ $errors->has('cart_code') ? ' is-invalid' : '' }}" value="{{ $cartStore->cart_code }}">
                            @if ($errors->has('cart_code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cart_code') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label>@lang('dashboard.sub_categories')</label>
                            <select name="sub_category_id" class="form-control{{ $errors->has('sub_category_id') ? ' is-invalid' : '' }}">
                                @foreach ($sub_categorys as $sub_category)
                                <option value="{{ $sub_category->id }}"  {{ $sub_category->id == $cartStore->sub_category_id ? 'selected' : '' }}> {{ $sub_category->name }}</option>
                                @endforeach
                            @if ($errors->has('sub_category_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sub_category_id') }}</strong>
                                </span>
                            @endif
                           </select>
                       </div>


                        <div class="form-group">
                            <label>@lang('dashboard.carts')</label>
                            <select name="products_id" class="form-control">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ $product->id == $cartStore->products_id ? 'selected' : '' }}> {{ $product->cart_details->cart_name }} - {{ $product->amrecan_price }}</option>
                            @endforeach
                            </select>
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
