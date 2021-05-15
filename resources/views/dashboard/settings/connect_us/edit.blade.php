@extends('layouts.dashboard.app')

@section('content')

<div class="c-subheader justify-content-between px-3">

    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">@lang('dashboard.dashboard')</li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.connect_us.index') }}">@lang('home.connect_us')</a></li>
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


                    <form action="{{ route('dashboard.connect_us.update', $contactUs->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}


                        <div class="form-group">
                            <input type="hidden" name="name" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $contactUs->name }}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        


                        <div class="form-group">
                            <input type="hidden" name="cliant_email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $contactUs->email }}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Email Content</label>
                            <textarea name="text" class="ckeditor form-control" rows="7" placeholder="Email"></textarea>
                        </div>
            


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
