@extends('layouts.home.app')
@section('content')

	<!--header-->
	<div class="breadcrumb-bar">
		<div class="container">
			<ol class="breadcrumb">
			   <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
			   <li class="breadcrumb-item">@lang('home.usage_policy')</li>
			</ol>
		</div>
	</div>

	<!--breadcrumb-bar-->

	<section class="section_st_page">
        <div class="container">
            <div class="content-st_page">
                <div class="content-phar">
                    <ol>
                        <li>
                        	@if ($privacy_policys->count() > 0)

                                @foreach ($privacy_policys as $privacy_policy)
                                    <div>
                                        {!! $privacy_policy->text !!}
                                    </div>
                                @endforeach
                            
                            @else
                                <h2>@lang('dashboard.no_data_found')</h2>   
                            @endif
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
<!--section_st_page-->
@endsection