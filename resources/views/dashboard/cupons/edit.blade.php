@extends('layouts.dashboard.app')

@section('content')

<div class="c-subheader justify-content-between px-3">

    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">@lang('dashboard.dashboard')</li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.cupons.index') }}">@lang('dashboard.cupons')</a></li>
        <li class="breadcrumb-item active">@lang('dashboard.edit')</li>
    </ol>

</header>

<div class="c-body">
    <main class="c-main">


<div class="col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <strong>@lang('dashboard.edit')</strong>
        </div>
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                    
            <div class="row">

                <div class="col-sm-12">


                    <form action="{{ route('dashboard.cupons.update', $cupon->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}


                        <div class="form-group">
                            <label>@lang('dashboard.name')</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $cupon->name }}">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label>@lang('dashboard.value')</label>
                            <input type="number" name="value" class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}" value="{{ $cupon->value }}">
                            @if ($errors->has('value'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('value') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.expiry')</label>
                            <input type="date" name="end" class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}" value="{{ $cupon->end }}">
                            @if ($errors->has('value'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('value') }}</strong>
                                </span>
                            @endif
                        </div>

                        <input type="text" name="user_id" name="number" value="{{ auth()->user()->id }}" hidden>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div>

            </div>
            <!--/.row-->
        </div>

    </div>

</div>

@endsection
