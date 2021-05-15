<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-md-down-none" style="background-color: #fff;">
        <img src="{{ asset('home_file/images/logo.svg') }}" width="146"
             class="c-sidebar-brand-full" alt="Brand Logo">
        
    </div>
    <ul class="c-sidebar-nav">
        @include('layouts.dashboard.include._menu')
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 692px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 369px;"></div>
        </div>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
            data-class="c-sidebar-minimized"></button>
</div>

