@extends('layouts.dashboard.app')

@section('content')

</header>

<div class="c-body">
    <main class="c-main">

<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.cart_sales') <small>{{ $carts->count() }}</small></h3>
                    
                    <form action="{{ route('payment-search') }}" method="get">
                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                               
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
                        <th>@lang('dashboard.name')</th>
                        <th>@lang('dashboard.cart_code')</th>
                        <th>@lang('dashboard.short_descript')</th>
                        <th>@lang('dashboard.admin')</th>
                        <th>@lang('dashboard.carts')</th>
                        <th>@lang('dashboard.name.user')</th>
                        <th>@lang('dashboard.email')</th>
                        <th>@lang('dashboard.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $index=>$cart)

                   
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $cart->cart_name }}</td>
                        <td>{{ $cart->cart_code }}</td>
                        <td>{{ $cart->short_descript }}</td>
                        <td>{{ $cart->user->name}}</td>
                        <td>{{ $cart->cart->cart_name}}</td>
                        <td>{{ $cart->user_name}}</td>
                        <td>{{ $cart->user->email}}</td>
                        <td>
                          
                            {{-- @if (auth()->user()->hasPermission('carts_store_delete')) --}}
                                <form action="{{ route('payment-delete', $cart->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                                </form><!-- end of form -->
                            {{-- @else
                                <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                            @endif --}}
                        </td>
                    </tr>
                    

                    @endforeach
                </tbody>
            </table>
            {{$carts->appends(request()->query())->links()}}


            @else
            
            <h2>@lang('dashboard.no_data_found')</h2>
            
            @endif
        </div>
    </div>
</div>


@endsection

