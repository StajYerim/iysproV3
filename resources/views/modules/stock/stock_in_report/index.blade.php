@extends('layouts.master')

@section('content')

    <section id="widget-grid">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <div class="well">
                        <b>STOK DEĞERİ</b>
                        <div style="margin:20px!important;" class="col-xs-12">
                            <div class="col-xs-4 text-center" style="border:1px solid #ddd; padding:10px;">
                                <span class="text-info" style="font-size: 25px;">{{ get_money($sales_price) }} ₺</span> <br>
                                <b>TAHMİNİ SATIŞ DEĞERİ</b>
                            </div>
                            <div class="col-xs-4 text-center" style="border:1px solid #ddd; padding:10px;">
                                <span class="text-danger" style="font-size: 25px;">{{ get_money($purchase_price) }} ₺</span> <br>
                                <b>TAHMİNİ ALIŞ DEĞERİ</b>
                            </div>
                            <div class="col-xs-4 text-center" style="border:1px solid #ddd; padding:10px;">
                                <span class="text-success" style="font-size: 25px;">{{ get_money($potantial_price) }} ₺</span> <br>
                                <b>POTANSİYEL KAZANÇ</b>
                            </div>
                        </div>
                        <div>
                            <div class="text-center" style="margin-bottom:25px; font-size:12px;">
                            <i class="fa fa-info-circle"></i>
                            <b>
                                Tahmini Satış Değeri, Tahmini Alış Değeri ve Potansiyel Kazanç hesaplamalarına stokta olmayan ürünler dahil edilmez.
                        Hesaplamalar ürün sayfalarında belirtilen Alış Fiyatı ve Satış Fiyatı üzerinden yapılır.
                            </b>
                        </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <section id="widget-grid" class="">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget" id="wid-id-0">

                    <header>
                        <div style="padding-left: 12px;">
                            <b>STOKTAKİ ÜRÜNLER LİSTESİ</b>
                        </div>
                    </header>

                    <div>

                        <div class="widget-body no-padding">
                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>ÜRÜN KODU</th>
                                        <th>ÜRÜN ADI</th>
                                        <th>STOK MİKTARI</th>
                                        <th>ALIŞ FİYATI</th>
                                        <th>SATIŞ FİYATI</th>
                                        <th>STOK MALİYETİ</th>
                                        <th>SATIŞ DEĞERİ</th>
                                        <th>SATIŞ KARI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    @if($product->stock_count != 0)
                                        <tr>
                                            <td >{{ $product->code }}</td>
                                            <td>
                                                <a href="{{ route('stock.product.show',[aid(),$product->id]) }}">
                                                    <b>{{ $product->named->name }}</b>
                                                </a>
                                                @if($product->category != [])
                                                <span class='badge' style='background-color:{{ $product->category->color }}'>{{ $product->category->name }}</span>
                                                @endif
                                                <span class="badge bg-color-green">{{ $product->type_name }}</span>
                                            </td>
                                            <td><b>{{ $product->stock_count }} / {{ $product->unit->short_name }}</b></td>
                                            <td><b>{{ $product->buying_price }} <i class="fa fa-{{ $product->purchase_currency->code }}"></i></b> </td>
                                            <td>
                                                <b>{{ $product->list_price }} <i class="fa fa-{{ $product->sales_currency->code }}"></i></b>
                                            </td>
                                            <td>
                                                <b>
                                                    {{ get_money(money_db_format(get_money($product->stock_count)) * money_db_format($product->buying_price)) }} <i class="fa fa-{{ $product->purchase_currency->code }}"></i>
                                                </b>
                                            </td>
                                            <td>
                                                <b>
                                                    {{ get_money(money_db_format(get_money($product->stock_count)) * money_db_format($product->list_price))  }} <i class="fa fa-{{ $product->sales_currency->code }}"></i>
                                                </b>
                                            </td>
                                            <td>
                                              <b>
                                                  {{
                                            get_money(($product->stock_count * money_db_format($product->list_price))-($product->stock_count * money_db_format($product->buying_price)))
                                                  }} <i class="fa fa-try"></i>
                                              </b>
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
        </div>


    </section>

@endsection
