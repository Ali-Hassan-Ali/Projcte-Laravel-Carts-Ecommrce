@extends('layouts.dashboard.app')

@section('content')

</header>

<div class="c-body">
    <main class="c-main">


<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i>
        </div>
        <div class="card-body table-responsive">
            @if ($pending_requests->count() > 0)

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>number of order</th>
                        <th>@lang('dashboard.totalprice')</th>
                        <th>date</th>
                        <th>@lang('dashboard.image')</th>
                        <th>@lang('dashboard.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pending_requests as $index=>$pay)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $pay->number }}</td>
                        <td>$ {{ $pay->newTotalwithTax }}</td>
                        <td>{{ $pay->date }}</td>
                        <td><img data-enlargeable width="100" style="cursor: zoom-in" src="{{ $pay->image_path }}" alt="" width="70px"></td>
                        <td>
                            @if (auth()->user()->hasPermission('pay_currencie_update'))
                            <form action="{{ route('dashboard.pay_currencie.edit', $pay->number) }}" method="post">
                                @csrf
                                
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-edit"></i> 
                                    @lang('dashboard.except')
                                </button>
                                
                            </form><br>
                            @else
                                <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>
                            @endif

                            <form action="{{ route('dashboard.not_exept', $pay->number) }}" method="post">
                                @csrf
                                
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-delete"></i> 
                                    not exept
                                </button>
                                
                            </form><br>

                            <form action="{{ route('dashboard.pay_currencie_details', $pay->number) }}" method="post">
                                @csrf
                                
                                <button class="btn btn-success btn-sm">
                                    <i class="fa fa-delete"></i> 
                                    details
                                </button>
                                
                            </form>

                            {{-- <form action="{{ route('dashboard.pay_currencie.edit', $pay->number) }}" method="post">
                                @csrf
                                
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-edit"></i> 
                                    @lang('dashboard.except')
                                </button>
                                
                            </form> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $emails->appends(request()->query())->links() }}

            @else
            
            <h2>@lang('dashboard.no_data_found')</h2>
            
            @endif
        </div>


    </div>
</div>


@endsection

