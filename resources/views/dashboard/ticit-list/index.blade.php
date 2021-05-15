@extends('layouts.dashboard.app')

@section('content')
</header>

<div class="c-body">
    <main class="c-main">

<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header">

              <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.ticit') <small>{{ $ticits->count() }}</small></h3>

                    <form action="{{ route('ticit-admin') }}" method="get">

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
            @if ($ticits->count() > 0)

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('dashboard.ticket_addres')</th>
                        <th>@lang('dashboard.ticket_status')</th>
                        <th>@lang('dashboard.ticket_type')</th>
                        <th>@lang('dashboard.ticket_text')</th>
                        <th>@lang('dashboard.date_added')</th>
                        <th>@lang('dashboard.latest_update')</th>
                        <th>@lang('dashboard.image')</th>
                        <th>@lang('dashboard.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ticits as $ticit)
                    <tr>
                      <td>{{$ticit->number_ticit}}</td>
                      <td>{{$ticit->ticit_address}}</td>
                      @if($ticit->ticit_answer== 0)
                      <td><h4 style="color: red">not answer</h4></td>
                      @else
                      <td><h4 style="color: green">answered</h4></td>
                      @endif
                      <td>{{$ticit->ticit_type}}</td>
                      <td>{{$ticit->details_ticit}}</td>
                      <td>{{$ticit->created_at}}</td>
                      <td>{{$ticit->updated_at}}</td>
                      <td>
                        @foreach (json_decode($ticit->images) as $images)

                          <img data-enlargeable width="100" style="cursor: zoom-in" src="{{ asset($images) }}" alt="" width="50px">
                          
                        @endforeach
                      </td>
                      <td>
                        <a href="{{ route('ticit.edit', $ticit->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Reply</a>
                        <a href="{{ route('ticit.edit', $ticit->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Mor</a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{$ticits->appends(request()->query())->links()}}

            @else
            
            <h2>@lang('dashboard.no_data_found')</h2>
            
            @endif
        </div>
    </div>
</div>


@endsection

