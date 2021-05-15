@if (auth()->user()->hasPermission('dashboard_read'))
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.welcome') }}">
        <i class="c-sidebar-nav-icon cil-home"></i> @lang('menu.dashboard')
    </a>
</li>
@endif
@if (auth()->user()->hasPermission('users_read'))
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.users.index') }}">
        <i class="c-sidebar-nav-icon cil-user"></i> @lang('menu.users')
    </a>
</li>
@endif

@if (auth()->user()->hasPermission('parent_categorys_read'))
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.parent_category.index') }}">
        <i class="c-sidebar-nav-icon cil-address-book"></i> @lang('menu.parent_category')
    </a>
</li>
@endif
@if (auth()->user()->hasPermission('sub_categories_read'))
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.sub_categories.index') }}">
        <i class="c-sidebar-nav-icon cil-wrap-text"></i> @lang('menu.sup_category')
    </a>
</li>
@endif
@if (auth()->user()->hasPermission('markets_read'))
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.markets.index') }}">
        <i class="c-sidebar-nav-icon cil-bookmark"></i> @lang('dashboard.markets')
    </a>
</li>
@endif
@if (auth()->user()->hasPermission('carts_read'))
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.carts_detail.index') }}">
        <i class="c-sidebar-nav-icon cil-description"></i> @lang('dashboard.carts_detail')
    </a>
</li>
@endif
@if (auth()->user()->hasPermission('carts_read'))
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.carts.index') }}">
        <i class="c-sidebar-nav-icon cil-description"></i> @lang('dashboard.carts')
    </a>
</li>
@endif
@if (auth()->user()->hasPermission('carts_store_read'))
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.carts_store.index') }}">
        <i class="c-sidebar-nav-icon cil-featured-playlist"></i> @lang('dashboard.carts_store')
    </a>
</li>
@endif
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('payment-show') }}">
        <i class="c-sidebar-nav-icon cil-basket"></i> @lang('dashboard.cart_sales')
    </a>
</li>

<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('purchase_admin') }}">
        <i class="c-sidebar-nav-icon cil-basket"></i> @lang('dashboard.orders')
    </a>
</li>

@if (auth()->user()->hasPermission('generate_carts_read'))
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.generate_carts.index') }}">
        <i class="c-sidebar-nav-icon cil-library-add"></i> @lang('dashboard.generate_carts')
    </a>
</li>
@endif
@if (auth()->user()->hasPermission('cupons_read'))
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.cupons.index') }}">
        <i class="c-sidebar-nav-icon cil-gift"></i> @lang('dashboard.cupons')
    </a>
</li>
@endif



<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.how_to_use.index') }}">
        <i class="c-sidebar-nav-icon cil-lightbulb"></i> @lang('dashboard.how_to_use')
    </a>
</li>


<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('ticit-admin') }}">
        <i class="c-sidebar-nav-icon cil-chat-bubble"></i> @lang('dashboard.ticit')
    </a>
</li>

<hr>


<li class="c-sidebar-nav-title">
    <h4 style="margin-left: 25px">@lang('dashboard.sales_system')</h4>
</li>

<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.pay_currencie.index') }}">
        <i class="c-sidebar-nav-icon cil-envelope-letter"></i>@lang('dashboard.sales_system')
    </a>
</li>

<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.pending_requests') }}">
        <i class="c-sidebar-nav-icon cil-envelope-letter"></i>@lang('dashboard.pending_requests')
    </a>
</li>



<li class="c-sidebar-nav-title">
    <h4 style="margin-left: 25px">@lang('dashboard.email_system')</h4>
</li>

<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('MonthlyMessage.index') }}">
        <i class="c-sidebar-nav-icon cil-envelope-letter"></i>@lang('dashboard.monthly_message')
    </a>
</li>
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('HolidayMessage.index') }}">
        <i class="c-sidebar-nav-icon cil-envelope-letter"></i>@lang('dashboard.holiday_message')
    </a>
</li>
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('SmartEmail.index') }}">
        <i class="c-sidebar-nav-icon cil-envelope-letter"></i> @lang('dashboard.smart_email')
    </a>
</li>


@if (auth()->user()->hasPermission('settings_read'))

<li class="c-sidebar-nav-title">
    <h4 style="margin-left: 25px">@lang('dashboard.settings')</h4>
</li>

<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.connect_us.index') }}">
        <i class="c-sidebar-nav-icon cil-settings"></i> @lang('home.connect_us')
    </a>
</li>
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.usage_policy.index') }}">
        <i class="c-sidebar-nav-icon cil-settings"></i> @lang('dashboard.usage_policy')
    </a>
</li>
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.privacy_policy.index') }}">
        <i class="c-sidebar-nav-icon cil-settings"></i> @lang('home.privacy_policy')
    </a>
</li>
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.return_policy.index') }}">
        <i class="c-sidebar-nav-icon cil-settings"></i> @lang('home.return_policy')
    </a>
</li>
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.about_us.index') }}">
        <i class="c-sidebar-nav-icon cil-settings"></i> @lang('dashboard.about_us')
    </a>
</li>
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.common_questions.index') }}">
        <i class="c-sidebar-nav-icon cil-settings"></i> @lang('dashboard.common_questions')
    </a>
</li>
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.social_links.index') }}">
        <i class="c-sidebar-nav-icon cil-settings"></i> @lang('dashboard.social_links')
    </a>
</li>
<li class="c-sidebar-nav-item mt-1">
    <a class="c-sidebar-nav-link c-active" href="{{ route('dashboard.social_login.index') }}">
        <i class="c-sidebar-nav-icon cil-settings"></i> @lang('dashboard.social_login')
    </a>
</li>



@endif
