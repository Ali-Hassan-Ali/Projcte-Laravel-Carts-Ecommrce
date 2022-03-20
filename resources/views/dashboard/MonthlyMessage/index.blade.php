@extends('layouts.dashboard.app')

@section('content')
</header>

<div class="c-body">
    <main class="c-main">

<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.monthly_message') <small>{{ $emails->count() }}</small></h3>

                    <form action="{{ route('HolidayMessage.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                                @if (auth()->user()->hasPermission('markets_create'))
                                    <a href="{{route('MonthlyMessage.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
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
        <div class="card-header">
            <i class="fa fa-align-justify"></i>
        </div>
        <div class="card-body table-responsive">
            @if ($emails->count() > 0)

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('dashboard.text')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($emails as $index=>$email)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{!!$email->text!!}</td>
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

