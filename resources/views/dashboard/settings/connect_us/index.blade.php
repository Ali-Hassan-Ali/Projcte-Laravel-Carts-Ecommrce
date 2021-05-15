@extends('layouts.dashboard.app')

@section('content')

</header>

<div class="c-body">
    <main class="c-main">

<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header">

                <div class="box-header with-border">

                    {{-- <h3 class="box-title" style="margin-bottom: 15px">@lang('home.connect_us') <small>{{ $connectUs->count() }}</small></h3> --}}

                    <form action="{{ route('dashboard.connect_us.index') }}" method="get">

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
        <div class="card-header">
            <i class="fa fa-align-justify"></i>
        </div>
        <div class="card-body table-responsive">
            @if ($connectUs->count() > 0)

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('dashboard.name')</th>
                        <th>@lang('dashboard.email')</th>
                        <th>@lang('home.subject')</th>
                        <th>@lang('dashboard.status')</th>
                        <th>@lang('dashboard.message')</th>
                        <th>@lang('dashboard.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($connectUs as $index=>$connect)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $connect->name }}</td>
                        <td>{{ $connect->email }}</td>
                        <td>{{ $connect->subject }}</td>
                        @if($connect->answer == 0)
                      <td><h4 style="color: red">Not answer</h4></td>
                      @else
                      <td><h4 style="color: green">Answered</h4</td>
                      @endif
                        <td>{{ $connect->message }}</td>
                        <td>
                            @if (auth()->user()->hasPermission('settings_update'))
                                <a href="{{ route('dashboard.connect_us.edit', $connect->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('dashboard.replay')</a>
                            @else
                                <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>
                            @endif
                            @if (auth()->user()->hasPermission('settings_delete'))
                                <form action="{{ route('dashboard.connect_us.destroy', $connect->id) }}" method="post" style="display: inline-block">
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

            {{$connectUs->appends(request()->query())->links()}}

            @else
            
            <h2>@lang('dashboard.no_data_found')</h2>
            
            @endif
        </div>
    </div>
</div>


@endsection

