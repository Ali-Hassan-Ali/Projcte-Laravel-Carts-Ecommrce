@extends('layouts.dashboard.app')

@section('content')
</header>

<div class="c-body">
    <main class="c-main">

<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header">

                <div class="box-header with-border">

                    <a href="{{ route('dashboard.ended_carts_page') }}" class="modal-effect btn btn-danger">@lang('dashboard.ended_carts')</a><br><br>


                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.generate_carts') <small>{{ $carts->count() }}</small></h3>

                    <form action="{{ route('dashboard.generate_carts.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                                @if (auth()->user()->hasPermission('generate_carts_create'))
                                    <a href="{{ route('dashboard.generate_carts.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                                @endif
                                <a href="{{ url('dashboard/export_carts') }}" class="modal-effect btn btn-primary"><i class="fa fa-file-excel-o"></i> &nbsp;@lang('dashboard.file-excel')</a>
                               
                            </div>

                        </div>
                    </form><!-- end of form -->
                   

                </div><!-- end of box header -->
        </div>

    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header">
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
                        <th>@lang('dashboard.cart_text')</th>
                        <th>@lang('dashboard.markets')</th>
                        <th>@lang('dashboard.users')</th>
                        <th>@lang('dashboard.sub_categories')</th>
                        <th>@lang('dashboard.count_of_buy')</th>
                        <th>status</th>

                      
                        <th>@lang('dashboard.amrecan_price')</th>
                     
                        <!-- <th>@lang('dashboard.action')</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $index=>$cart)

                    @if($cart->status == 1 )
                  

                    @else
                   
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $cart->cart_name }}</td>
                        <td>{{ $cart->cart_code }}</td>
                        <td>{{ $cart->cart_text }}</td>
                        <td>{{ $cart->Market->name }}</td>
                        <td>{{ $cart->user->name }}</td>
                        <td>{{ $cart->sub_category->name}}</td>
                        <td>{{ $cart->count_of_buy }}</td>
                        @if(!$cart->used == null)
                        <td><p style="color: green">used</p></td>
                        @else 
                        <td><p style="color: red">not used</p></td>
                        @endif
                        <td>{{ $cart->amrecan_price }}</td>
                       
                        <td>
                            @if (auth()->user()->hasPermission('generate_carts_update'))
                                <a href="{{ route('dashboard.generate_carts.edit', $cart->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a><br><br>
                            @else
                                <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i></a>
                            @endif 
                            @if (auth()->user()->hasPermission('generate_carts_delete'))
                                 <form action="{{ route('dashboard.generate_carts.destroy', $cart->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i></button><br><br>
                                  </form> 
                                <!-- end of form -->
                            @else
                             <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i></button> 
                            @endif
                        </td>
                    </tr>

                    @endif
                   
                    @endforeach
                </tbody>
            </table>

            {{ $carts->appends(request()->query())->links() }}
            
            @else
            
            <h2>@lang('dashboard.no_data_found')</h2>
            
            @endif
        </div>
    </div>
</div>


@endsection

