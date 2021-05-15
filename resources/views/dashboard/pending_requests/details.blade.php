@extends('layouts.dashboard.app')

@section('content')

</header>

<div class="c-body">
    <main class="c-main">


<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i>
        </div>
        <div class="card-body table-responsive">
            @if ($purchases->count() > 0)

            <p><strong>تفاصيل المنتجات ضمن عملية الشراء</strong></p>
            <table class="table table-striped table-bordered table-list">
                <thead>
                    <tr>
                        <th width="20%">المنتج</th>
                        <th>العدد</th>
                        <th>سعر البطاقة</th>
                        <th>المبلغ الكلي</th>
                        <th>VAT $ </th>
                        <th>المبلغ الإجمالي</th>
                    </tr>
                </thead>
                @foreach($purchases as $purchase)
                <tbody>
                    <tr>
                        <td width="30%"><p>{{$purchase->cart_name}}</p></td>
                        <td><p>{{$purchase->quantity}}</p></td>
                        <td><p> {{$purchase->price}} {{$purchase->rate}}</p></td>
                        <td><p> {{$purchase->price * $purchase->quantity}} {{$purchase->rate}}</p></td>
                        <td><p> {{$purchase->totaltax}} {{$purchase->rate}}</p></td>
                        <td><p> {{$purchase->newTotalwithTax}} {{$purchase->rate}}</p></td>
                    </tr>
                </tbody>
                @endforeach
            </table>


            @else
            
            <h2>@lang('dashboard.no_data_found')</h2>
            
            @endif
        </div>
    </div>
</div>


@endsection

