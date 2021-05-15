@extends('layouts.dashboard.app')

@section('content')

</header>

<div class="c-body">
    <main class="c-main">

<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.orders') <small>{{ $purchases->count() }}</small></h3>

                    <form action="{{ route('purchases_search') }}" method="get">
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
            @if ($purchases->count() > 0)

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('dashboard.order_number')</th>
                        <th>@lang('dashboard.product')</th>
                        <th>@lang('dashboard.number')</th>
                        <th>@lang('dashboard.price_cart')</th>
                        <th>@lang('dashboard.the_total_amount')</th>
                        <th>@lang('dashboard.value_added_tax')</th>
                        <th>@lang('dashboard.total_amount')</th>
                        <th>@lang('dashboard.client')</th>
                        <th>@lang('dashboard.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $index=>$purchase)

                   
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><p>{{ $purchase->number }}</p></td>
                        <td><p>{{ $purchase->cart_name }}</p></td>
                        <td><p>{{ $purchase->quantity }}</p></td>
                        <td><p>{{ $purchase->price }} {{ $purchase->rate }}</p></td>
                        <td><p>{{ $purchase->price * $purchase->quantity }} {{ $purchase->rate }}</p></td>
                        <td><p>{{ $purchase->totaltax }} {{ $purchase->rate }}</p></td>
                        <td><p>{{ $purchase->newTotalwithTax }} {{ $purchase->rate }}</p></td>
                        <td><p>{{ $purchase->user->name }}</p><p>{{ $purchase->user->email }}</p></td>
                        <td>
                          
                            {{-- @if (auth()->user()->hasPermission('carts_store_delete')) --}}
                                <form action="{{ route('purchase_delete', $purchase->id) }}" method="post" style="display: inline-block">
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

            {{-- {{$purchases->appends(request()->query())->links()}} --}}

            @else
            
            <h2>@lang('dashboard.no_data_found')</h2>
            
            @endif
        </div>
    </div>
</div>


@endsection

