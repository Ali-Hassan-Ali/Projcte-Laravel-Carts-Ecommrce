@extends('layouts.home.app')
@section('content')

	<!--header-->
	<div class="breadcrumb-bar">
		<div class="container">
			<ol class="breadcrumb">
			   <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
			   <li class="breadcrumb-item">@lang('dashboard.common_questions')</li>
			</ol>
		</div>
	</div>
	<!--breadcrumb-bar-->
	<section class="section_page_site">
    <div class="container">
        <div class="sec_head text-center">
            <h2>@lang('dashboard.common_questions')</h2>
        </div>
        <div class="content-page">
        	@if ($common_questions->count() > 0)
        		{{-- expr --}}
            <ul class="list-faq">
            	@foreach ($common_questions as $index=>$common_question)
            		{{-- expr --}}
				<li>
                    <div class="accordion">
                        <p class="faqText">{{ $common_question->questions }}</p>
                        <i class="fa fa-{{ $index + 1 == 1 ? 'minus' :  "plus" }}"></i>
                    </div>					   
                    <div {{ $index + 1 == 1 ? 'style=display:block' :  '' }} class="panel default">
                        <p>{{ $common_question->common }}</p>
                    </div>
                </li>
            	@endforeach
            </ul>

            @else
                <h2>@lang('dashboard.no_data_found')</h2>
            @endif
        </div>
    </div>
</section>
<!--section_ticit_supp-->

@endsection