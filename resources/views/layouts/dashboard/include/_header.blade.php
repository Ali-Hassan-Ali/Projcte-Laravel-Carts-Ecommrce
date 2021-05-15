<button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
        data-class="c-sidebar-show">
    <i class="c-icon c-icon-lg cil-menu"></i>
</button>
<a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="#">
    <img src="{{ asset('home_file/images/logo.svg') }}" width="118" alt="Brand Logo">
</a>
<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
        data-class="c-sidebar-lg-show" responsive="true">
    <i class="c-icon c-icon-lg cil-menu"></i>
</button>
<ul class="c-header-nav mfs-auto">
</ul>
<ul class="c-header-nav mx-3">
    <li class="c-header-nav-item dropdown">
        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button"
           aria-haspopup="true" aria-expanded="false">
           <p class="mt-3">
            <i class="fa fa-language fa-2x"></i>  

           </p>
             
        </a>
        <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
            
            <ul class="p-0 mb-0">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                    <a rel="alternate" class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <i class="c-icon mfe-2 cil-account-logout"></i>{{ $properties['native'] }}
                    </a>

                @endforeach
            </ul>
        </div>
    </li>
    
    <li class="c-header-nav-item dropdown">
        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button"
           aria-haspopup="true" aria-expanded="false">
            <div class="c-avatar">
                <img class="c-avatar-img" src="{{ auth()->user()->image_path }}" alt="">
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
            <div class="dropdown-header bg-light py-2"><strong>{{ auth()->user()->name }}</strong></div>
            <a class="dropdown-item" href="/">
                <i class="c-icon mfe-2 cil-user"></i>@lang('dashboard.home')
            </a>
            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="c-icon mfe-2 cil-account-logout"></i>@lang('menu.logout')
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>

</ul>

