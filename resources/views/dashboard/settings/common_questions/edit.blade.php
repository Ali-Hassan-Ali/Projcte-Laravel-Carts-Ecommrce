@extends('layouts.dashboard.app')

@section('content')


<div class="c-subheader justify-content-between px-3">

    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">@lang('dashboard.dashboard')</li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.common_questions.index') }}">@lang('dashboard.common_questions')</a></li>
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


                    <form action="{{ route('dashboard.common_questions.update', $commonQuestions->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="card-body">
                            <div class="form-group">
                                <label><strong>@lang('dashboard.questions')</strong></label>
                                <textarea class="form-control" name="questions">{{ $commonQuestions->getTranslation('questions', 'ar') }}</textarea>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label><strong>@lang('dashboard.questions_en')</strong></label>
                                <textarea class="form-control" name="questions_en">{{ $commonQuestions->getTranslation('questions', 'en') }}</textarea>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label><strong>@lang('dashboard.common')</strong></label>
                                <textarea class="form-control" name="common">{{ $commonQuestions->getTranslation('common', 'ar') }}</textarea>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label><strong>@lang('dashboard.common_en')</strong></label>
                                <textarea class="form-control" name="common_en">{{ $commonQuestions->getTranslation('common', 'en') }}</textarea>
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
