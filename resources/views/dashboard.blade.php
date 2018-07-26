@extends('layouts.master')

@section('content')

    <section id="widget-grid" class="">
        <div class="row">

            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="jarviswidget" id="wid-id-0">

                    <header>
                        <div align="center">
                            <b>KASA VE HESAPLAR</b>
                        </div>
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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bank_accounts as $bank_account)
                                    @if($bank_account->account_id != null)
                                        <tr>
                                            <td>...</td>
                                            <td>{{ $bank_account->name }}</td>
                                            <td>{{ $bank_account->currency }}</td>
                                            <td>
                                                {{ $bank_account->balance }}
                                                <i class="fa fa-{{ $bank_account->currency }}"></i>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>
            </article>

            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="jarviswidget" id="wid-id-0">

                    <header>
                        <div align="center">
                            <b>VADESİ GELEN TAHSİLATLAR</b>
                        </div>
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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sales_orders as $sales_order)
                                    @if(money_db_format($sales_order->remaining) > 0)
                                        <tr>
                                            <td>...</td>
                                            <td>
                                                {{ $sales_order->company->company_name }}
                                            </td>
                                            <td>
                                                {{ $sales_order->due_date }}
                                            </td>
                                            <td>
                                                {{ $sales_order->remaining }}
                                                <i class="fa fa-{{ $bank_account->currency }}"></i>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </article>

            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="jarviswidget" id="wid-id-0">

                    <header>
                        <div align="center">
                            <b>VADESİ GELEN ÖDEMELER</b>
                        </div>
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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($purchase_orders as $purchase_order)
                                    @if(money_db_format($purchase_order->remaining) > 0)
                                        <tr>
                                            <td>...</td>
                                            <td>
                                                {{ $purchase_order->company->company_name }}
                                            </td>
                                            <td>
                                                {{ $purchase_order->due_date }}
                                            </td>
                                            <td>
                                                {{ $purchase_order->remaining }}
                                                <i class="fa fa-{{ $purchase_order->currency }}"></i>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </article>

            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="jarviswidget" id="wid-id-0">

                    <header>
                        <div align="center">
                            <b>ÖDEME GEÇMİŞİ</b>
                        </div>
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
                                    @if($bank_account_item->company_id != null)
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
                                    @endif
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
