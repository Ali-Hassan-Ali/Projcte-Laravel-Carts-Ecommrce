@extends('layouts.dashboard.app')

@section('content')

</header>

<div class="c-body">
    <main class="c-main">


<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header table-responsive">
            <i class="fa fa-align-justify"></i>
        </div>
        <div class="card-body table-responsive">
            @if ($endeds->count() > 0)

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
                        <th>@lang('dashboard.ar_price')</th>
                        <th>@lang('dashboard.amrecan_price')</th>
                        <th>@lang('dashboard.kowit_price')</th>
                        <th>@lang('dashboard.amarat_price')</th>
                        <th>@lang('dashboard.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($endeds as $index=>$ended)


                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $ended->cart_name }}</td>
                        <td>{{ $ended->cart_code }}</td>
                        <td>{{ $ended->cart_text }}</td>
                        <td>{{ $ended->Market->name }}</td>
                        <td>{{ $ended->user->name }}</td>
                        <td>{{ $ended->sub_category->name}}</td>
                        <td>{{ $ended->count_of_buy }}</td>
                        <td>{{ $ended->ar_price }}</td>
                        <td>{{ $ended->amrecan_price }}</td>
                        <td>{{ $ended->kowit_price }}</td>
                        <td>{{ $ended->amarat_price }}</td>
                        <td>
                            

                            @if (auth()->user()->hasPermission('generate_carts_delete'))
                                 <form action="{{ route('dashboard.generate_carts.destroy', $ended->id) }}" method="post" style="display: inline-block">
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
                   
                    @endforeach
                </tbody>
            </table>


            @else
            
            <h2>@lang('dashboard.no_data_found')</h2>
            
            @endif
        </div>
    </div>
</div>


@endsection

