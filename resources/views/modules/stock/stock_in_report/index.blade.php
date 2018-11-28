@extends('layouts.master')

@section('content')

    {{--<section id="widget-grid">--}}
        {{--<div class="row">--}}
            {{--<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}
                {{--<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">--}}
                    {{--<div class="well">--}}
                        {{--<b>{{ trans('sentence.stock_value') }}</b>--}}
                        {{--<div style="margin:20px!important;" class="col-xs-12">--}}
                            {{--<div class="col-xs-4 text-center" style="border:1px solid #ddd; padding:10px;">--}}
                                {{--<span class="text-info" style="font-size: 25px;">{{ get_money($sales_price) }} ₺</span> <br>--}}
                                {{--<b>{{ trans('sentence.estimated_sales_price') }}</b>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-4 text-center" style="border:1px solid #ddd; padding:10px;">--}}
                                {{--<span class="text-danger" style="font-size: 25px;">{{ get_money($purchase_price) }} ₺</span> <br>--}}
                                {{--<b>{{ trans('sentence.estimated_purchase_price') }}</b>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-4 text-center" style="border:1px solid #ddd; padding:10px;">--}}
                                {{--<span class="text-success" style="font-size: 25px;">{{ get_money($potantial_price) }} ₺</span> <br>--}}
                                {{--<b>{{ trans('sentence.potential_gain') }}</b>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div>--}}
                            {{--<div class="text-center" style="margin-bottom:25px; font-size:12px;">--}}
                            {{--<i class="fa fa-info-circle"></i>--}}
                            {{--<b>{{ trans('sentence.sales_purchase_potential_gain') }}</b>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</article>--}}
        {{--</div>--}}
    {{--</section>--}}

    <section id="widget-grid" class="">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget" id="wid-id-0">

                    <header>
                        <div style="padding-left: 12px;">
                            <b>{{ trans('sentence.product_list_in_stock') }}</b>
                        </div>
                    </header>

                    <div>

                        <div class="widget-body no-padding">
                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>{{ trans('sentence.product_code') }}</th>
                                        <th>{{ trans('sentence.product_name')  }}</th>
                                        <th>{{ trans('sentence.stock_quantity') }}</th>
                                        <th>{{ trans('sentence.purchase_price') }}</th>
                                        <th>{{ trans('sentence.sales_price') }}</th>
                                        <th>{{ trans('sentence.stock_cost') }}</th>
                                        <th>{{ trans('sentence.sales_value') }}</th>
                                        <th>{{ trans('sentence.sales_profit') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($products as $product)
                                    @if($product->stock_count != 0 && $product->stock_count > 0)
                                        <tr>
                                            <td >{{ $product->code }}</td>
                                            <td>
                                                <a href="{{ route('stock.product.show',[aid(),$product->id]) }}">
                                                    <b> {{ $product->named->name }} </b>
                                                </a>
                                                @if($product->category != [])
                                                <span class='badge' style='background-color:{{ $product->category->color }}'>{{ $product->category->name }}</span>
                                                @endif
                                                <span class="badge bg-color-green">{{ $product->type_name }}</span>
                                            </td>
                                            <td>
                                                <b>{{ $product->stock_count }} / {{ $product->unit->short_name }}</b>
                                            </td>
                                            <td><b>{{ $product->buying_price }} {{ $product->purchase_currency->icon }}</b> </td>
                                            <td>
                                                <b>{{ $product->list_price }} {{ $product->sales_currency->icon }}
                                            </td>
                                            <td>
                                                <b>
                                                    {{ get_money(money_db_format(get_money($product->stock_count)) * money_db_format($product->buying_price)) }} {{ $product->purchase_currency->icon }}
                                                </b>
                                            </td>
                                            <td>
                                                <b>
                                                    {{ get_money(money_db_format(get_money($product->stock_count)) * money_db_format($product->list_price))  }} {{ $product->sales_currency->icon }}
                                                </b>
                                            </td>
                                            <td>
                                              <b>
                                                  {{
                                            get_money(($product->stock_count * money_db_format($product->list_price))-($product->stock_count * money_db_format($product->buying_price)))
                                                  }} {{ $product->sales_currency->icon }}
                                              </b>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="8" align="center">{{ trans('sentence.no_products_in_stock') }}</td>
                                    </tr>
                                @endforelse
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </article>
        </div>


    </section>

@endsection
