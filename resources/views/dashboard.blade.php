@extends('layouts.master')

@section('content')

    <section id="widget-grid" class="">
        <div class="row">

            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="jarviswidget" id="wid-id-0">

                    <header>
                        <span>
                            <i class="fa fa-table"></i>
                            Kasa ve Hesaplar
                        </span>
                    </header>

                    <div>
                        <div class="jarviswidget-editbox">
                            <input class="form-control" type="text">
                        </div>

                        <div class="widget-body">
                            <ul>
                            @foreach($bank_accounts as $bank_account)
                                <li>
                                    {{ $bank_account->name }}
                                     <i class="fa fa-{{ $bank_account->currency }}"></i>{{ $bank_account->balance }}</li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </article>

            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="jarviswidget" id="wid-id-0">

                    <header>
                        <span>
                            <i class="fa fa-table"></i>
                            Vadesi Gelen Tahsilatlar
                        </span>
                    </header>

                    <div>
                        <div class="jarviswidget-editbox">
                            <input class="form-control" type="text">
                        </div>

                        <div class="widget-body">
                            <ul>
                                @foreach($sales_orders as $sales_order)

                                    @if(money_db_format($sales_order->remaining) > 0)
                                        <li>
                                            {{ $sales_order->company->company_name }} -
                                            {{ $sales_order->due_date }} -
                                            {{ $sales_order->remaining }}
                                            <i class="fa fa-{{ $sales_order->currency }}"></i>

                                        </li>
                                    {{--@else--}}
                                            {{--Herhangi bir yaklaşan tahsilat yok--}}
                                    @endif

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </article>

            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="jarviswidget" id="wid-id-0">

                    <header>
                        <span>
                            <i class="fa fa-table"></i>
                            Vadesi Gelen Ödemeler
                        </span>
                    </header>

                    <div>
                        <div class="jarviswidget-editbox">
                            <input class="form-control" type="text">
                        </div>

                        <div class="widget-body">
                            <ul>
                                @foreach($purchase_orders as $purchase_order)

                                    @if(money_db_format($purchase_order->remaining) > 0)
                                        <li>
                                            {{ $purchase_order->company->company_name }} -
                                            {{ $purchase_order->due_date }} -
                                            {{ $purchase_order->remaining }}
                                            <i class="fa fa-{{ $purchase_order->currency }}"></i>

                                        </li>
                                    @else
                                        Herhangi bir yaklaşan ödeme yok
                                    @endif


                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </article>

            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="jarviswidget" id="wid-id-0">

                    <header>
                        <span>
                            <i class="fa fa-table"></i> Ödeme Geçmişi
                        </span>
                    </header>

                    <div>
                        <div class="jarviswidget-editbox">
                            <input class="form-control" type="text">
                        </div>

                        <div class="widget-body">
                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th width="1px">#</th>
                                    <th>Firma</th>
                                    <th>Tarih</th>
                                    <th>Bakiye</th>
                                    <th>Durum</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bank_account_items as $bank_account_item)
                                    <tr>
                                        <td>...</td>
                                        <td>{{ $bank_account_item->company->company_name }}</td>
                                        <td>{{ $bank_account_item->date }}</td>
                                        <td>
                                            {{ $bank_account_item->amount }}
                                            <i class="fa fa-{{ $bank_account_item->currency }}"></i>
                                        </td>
                                        <td>
                                            @if($bank_account_item->action_type == 1)
                                                <span style="color:green">
                                                    GİRİŞ
                                                </span>
                                                @else
                                                <span style="color:red">
                                                    ÇIKIŞ
                                                </span>
                                                @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            <ul>




                            </ul>
                        </div>

                    </div>
                </div>
            </article>



        </div>
    </section>
@endsection
