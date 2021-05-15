@extends('layouts.dashboard.app')

@section('content')


<div class="c-subheader justify-content-between px-3">

    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">@lang('dashboard.dashboard')</li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.how_to_use.index') }}">@lang('home.how_to_use')</a></li>
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

            <div class="row">

                <div class="col-sm-12">


                    <form action="{{ route('dashboard.return_policy.update', $returnPolicy->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="card-body">
                            <div class="form-group">
                                <label><strong>@lang('dashboard.text')</strong></label>
                                <textarea class="ckeditor form-control" name="text">{!! $returnPolicy->getTranslation('text', 'ar') !!}</textarea>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label><strong>@lang('dashboard.text_en')</strong></label>
                                <textarea class="ckeditor form-control" name="text_en">{!! $returnPolicy->getTranslation('text', 'en') !!}</textarea>
                            </div>
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
