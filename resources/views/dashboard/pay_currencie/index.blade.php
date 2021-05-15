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
            @if ($pay_currencie->count() > 0)

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('dashboard.name')</th>
                        <th>@lang('dashboard.link')</th>
                        <th>@lang('dashboard.image')</th>
                        <th>@lang('dashboard.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pay_currencie as $index=>$pay)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $pay->name }}</td>
                        <td>{{ $pay->link }}</td>
                        <td><img src="{{ $pay->image_path }}" alt="" width="70px"></td>
                        <td>
                            @if (auth()->user()->hasPermission('pay_currencie_update'))
                                <a href="{{ route('dashboard.pay_currencie.edit', $pay->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>
                            @else
                                <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{$pay_currencie->appends(request()->query())->links()}}

            @else
            
            <h2>@lang('dashboard.no_data_found')</h2>
            
            @endif
        </div>
    </div>
</div>


@endsection

