@extends('layouts.dashboard.app')

@section('content')

</header>

<div class="c-body">
    <main class="c-main">

<div class="container-fluid">
  <div class="fade-in">
    <div class="row">


<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-primary p-3 mfe-3">
  <i class="cil-user"></i>
</div>
<div>
<div class="text-value text-primary">{{ $users_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('dashboard.users')</div>
</div>
</div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('dashboard.users.index') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-info p-3 mfe-3">
  <i class="cil-address-book"></i>
</div>
<div>
<div class="text-value text-info">{{ $parent_category_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('menu.parent_category')</div>
</div>
</div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('dashboard.parent_category.index') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-warning p-3 mfe-3">
    <i class="cil-wrap-text"></i>
</div>
<div>
<div class="text-value text-warning">{{ $sub_categoryegory_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('menu.sup_category')</div>
</div>
 </div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('dashboard.sub_categories.index') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-danger p-3 mfe-3">
  <i class="cil-bookmark"></i>
</div>
<div>
<div class="text-value text-danger">{{ $Market_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('dashboard.markets')</div>
</div>
</div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('dashboard.markets.index') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>





<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-primary p-3 mfe-3">
  <i class="cil-description"></i>
</div>
<div>
<div class="text-value text-primary">{{ $Product_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('dashboard.carts')</div>
</div>
</div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('dashboard.carts.index') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-info p-3 mfe-3">
  <i class="cil-featured-playlist"></i>
</div>
<div>
<div class="text-value text-info">{{ $CartStore_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('dashboard.carts_store')</div>
</div>
</div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('dashboard.carts_store.index') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-warning p-3 mfe-3">
    <i class="cil-basket"></i>
</div>
<div>
<div class="text-value text-warning"></div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('dashboard.cart_sales')</div>
</div>
 </div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('payment-show') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-danger p-3 mfe-3">
  <i class="cil-library-add"></i>
</div>
<div>
<div class="text-value text-danger">{{ $GenerateCart_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('dashboard.generate_carts')</div>
</div>
</div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('dashboard.generate_carts.index') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>











<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-primary p-3 mfe-3">
  <i class="cil-gift"></i>
</div>
<div>
<div class="text-value text-primary">{{ $cupon_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('dashboard.cupons')</div>
</div>
</div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('dashboard.cupons.index') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-info p-3 mfe-3">
  <i class="cil-lightbulb"></i>
</div>
<div>
<div class="text-value text-info">{{ $HowUse_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('dashboard.how_to_use')</div>
</div>
</div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('dashboard.how_to_use.index') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-warning p-3 mfe-3">
    <i class="cil-chat-bubble"></i>
</div>
<div>
<div class="text-value text-warning"></div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('dashboard.ticit')</div>
</div>
 </div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('ticit-admin') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-danger p-3 mfe-3">
  <i class="cil-envelope-letter"></i>
</div>
<div>
<div class="text-value text-danger">{{ $MonthlyMessage_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('dashboard.monthly_message')</div>
</div>
</div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('MonthlyMessage.index') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>











<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-primary p-3 mfe-3">
  <i class="cil-envelope-letter"></i>
</div>
<div>
<div class="text-value text-primary">{{ $HolidayMessage_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('dashboard.holiday_message')</div>
</div>
</div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('HolidayMessage.index') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-info p-3 mfe-3">
  <i class="cil-envelope-letter"></i>
</div>
<div>
<div class="text-value text-info">{{ $SmartEmail_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('dashboard.smart_email')</div>
</div>
</div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('SmartEmail.index') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-warning p-3 mfe-3">
    <i class="cil-settings"></i>
</div>
<div>
<div class="text-value text-warning">{{ $ContactUs_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('home.connect_us')</div>
</div>
 </div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('dashboard.connect_us.index') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-danger p-3 mfe-3">
  <i class="fa fa-users"></i>
</div>
<div>
<div class="text-value text-danger">{{ $Cliant_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('dashboard.cliants')</div>
</div>
</div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="#"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>











<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-primary p-3 mfe-3">
  <i class="cil-settings"></i>
</div>
<div>
<div class="text-value text-primary">{{ $PrivacyPolicy_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('home.privacy_policy')</div>
</div>
</div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('dashboard.privacy_policy.index') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-info p-3 mfe-3">
  <i class="cil-settings"></i>
</div>
<div>
<div class="text-value text-info">{{ $ReturnPolicy_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('home.return_policy')</div>
</div>
</div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('dashboard.return_policy.index') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-warning p-3 mfe-3">
    <i class="cil-settings"></i>
</div>
<div>
<div class="text-value text-warning">{{ $AbouUs_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('dashboard.about_us')</div>
</div>
 </div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('dashboard.about_us.index') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>

<div class="col-6 col-lg-3">
<div class="card">
<div class="card-body p-3 d-flex align-items-center">
<div class="bg-gradient-danger p-3 mfe-3">
  <i class="cil-settings"></i>
</div>
<div>
<div class="text-value text-danger">{{ $ComQuest_count }}</div>
<div class="text-muted text-uppercase font-weight-bold small">@lang('dashboard.common_questions')</div>
</div>
</div>
<div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('dashboard.common_questions.index') }}"><span class="small font-weight-bold">@lang('dashboard.view_more')</span>
<svg class="c-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
</svg></a></div>
</div>
</div>















</div>

    <!-- /.row-->
  </div>
</div>

@endsection
