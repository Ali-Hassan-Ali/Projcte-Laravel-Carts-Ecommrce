@extends('layouts.dashboard.app')

@section('content')

</header>

<div class="c-body">
    <main class="c-main">

<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header">
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.carts') <small>{{ $carts->count() }}</small></h3>

                    
                    <form action="{{ route('dashboard.carts.index') }}" method="get">
                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                                @if (auth()->user()->hasPermission('carts_create'))
                                    <a href="{{ route('dashboard.carts.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->
        </div>

    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header table-responsive">
            <i class="fa fa-align-justify"></i>
        </div>
        <div class="card-body table-responsive">
            @if ($carts->count() > 0)

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('dashboard.cart_name')</th>
                        <th>@lang('dashboard.short_descript')</th>
                        <th>@lang('dashboard.users')</th>
                        <th>@lang('dashboard.markets')</th>
                        <th>@lang('dashboard.sub_categories')</th>
                        <th>@lang('dashboard.count_of_buy')</th>                     
                        <th>@lang('dashboard.amrecan_price')</th>
                        <th>@lang('dashboard.stars')</th>
                        <th>@lang('dashboard.quantity')</th>
                        <th>@lang('dashboard.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $index=>$cart)

                   
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $cart->cart_details->cart_name }}</td>
                        <td>{{ $cart->cart_details->short_descript }}</td>
                        <td>{{ $cart->user->name}}</td>
                        <td>
                            @if($cart->market_id == null)
                                Null    
                            @else
                            {{ $cart->Market->name }}
                            @endif
                        </td>
                        <td>{{ $cart->sub_category->name}}</td>
                        <td>{{ $cart->count_of_buy }}</td>
                        <td>{{ $cart->amrecan_price }}</td>
                        <td>{{ $cart->stars}}</td>
                        <td>{{ $cart->quantity }}</td>

                        <td>
                            @if (auth()->user()->hasPermission('carts_update'))
                                <a href="{{ route('dashboard.carts.edit', $cart->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a><br>
                            @else
                                <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>
                            @endif
                            @if (auth()->user()->hasPermission('carts_delete'))
                                <form action="{{ route('dashboard.carts.destroy', $cart->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                                </form><!-- end of form -->
                            @else
                                <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                            @endif
                        </td>
                    </tr>
                    

                    @endforeach
                </tbody>
            </table>

            {{-- {{$carts->appends(request()->query())->links()}} --}}

            @else
            
            <h2>@lang('dashboard.no_data_found')</h2>
            
            @endif
        </div>
    </div>
</div>


@endsection

