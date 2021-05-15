@extends('layouts.home.app')

@section('content')

    
    <div class="main-wrapper">
    
       <section class="section_profile">
            <div class="container">
                <div class="sec_head text-center">
                    <h2>@lang('home.account_information')</h2>
                </div>
                <div class="content-profile">
                    <form class="form-profile" action="{{ route('profiles.update', $users->id ) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="main-data">
                            
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' name="image" value="{{ auth()->user()->image_path }}" id="imageUpload"  accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview"  style="background-image: url('{{ auth()->user()->image_path }} ');">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><i class="fa fa-user"></i> @lang('dashboard.name')</label>
                                <input type="text" disabled name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $users->name }}"/>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                    </form>
                </div>
            </div>
        </section> 
        <!--section_profile-->   
         
        
    </div>
    <!--main-wrapper--> 

@endsection
