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
            <div class="sec_head text-center">
                <h2>@lang('home.usage_policy')</h2>
            </div>
            <div class="content-st_page">
                <span>@lang('home.usage_policy_body')</span>
                <div class="content-phar">
                    <ol>
                        <li>
                        	@if ($usage_policys->count() > 0)

                                @foreach ($usage_policys as $usage_policy)
                                    <div>
                                        {!! $usage_policy->text !!}
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