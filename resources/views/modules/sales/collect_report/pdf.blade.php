@php
    app()->setLocale($lang);
@endphp
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$company->company_name}}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        .invoice-box {
            font-size: 12px;
            line-height: 18px;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            text-align: center;
        }

        .invoice-box table td {
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: left;
        }

        .invoice-box table tr td:nth-child(4) {
            text-align: right;
        }

        .invoice-box table tr td:nth-child(5) {
            text-align: right;
        }

        .invoice-box table tr td:nth-child(3) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 5px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 12px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 0px;
            text-align: left;
        }

        .invoice-box table tr.heading td {

            background: #eee;
            height: 1px;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 1px;
        }

        .invoice-box table tr.item td {
            border-bottom: 2px solid #eee;
            font-size: 10px;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            border-bottom: 2px solid #eee;
            font-weight: bold;
        }

        .invoice-box table tr.total td:nth-child(3) {
            border-top: 2px solid #eee;
            border-bottom: 2px solid #eee;
            font-weight: bold;
        }
    </style>
</head>
<body><p>{{$company->company_name}} <span style="float:right">{{ trans('sentence.collect_reports') }}</span></p>
<b>{{ trans('sentence.transaction_movements') }}</b>
{{--<span style="float:right "><b>@if($actions != "[]"){{$actions->where("ActionShow",0)->first()->ActionDate->format("d.m.Y")}} - {{$actions->where("ActionShow",0)->last()->ActionDate->format("d.m.Y")}} @endif</b></span>--}}
<hr>
<div class="invoice-box">
    <table id="datatable_col_reorder" class="table table-striped table-bordered table-hover" width="100%">
        <thead>
            <tr>
                <th style="text-align:left;">{{ trans('sentence.collection_date') }}</th>
                <th style="text-align:left;">{{ trans('sentence.invoice_and_cheque_date') }}</th>
                <th style="text-align:left;">{{ trans('sentence.customer_and_supplier') }}</th>
                <th style="text-align:left;">{{ trans('sentence.invoice_and_cheque') }}</th>
                <th style="text-align:right;">{{ trans('word.entry') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($export_collect["sales_orders"] as $order)
            @if($order->remaining != "0,00")
                <tr style="cursor:pointer" onclick="window.location.href='{{route("sales.orders.show",[aid(),$order->id])}}'">
                    <td style="text-align:left;width:18%">{{$order->due_date}}</td>
                    <td style="text-align:left;width:23%">{{$order->date}}</td>
                    <td style="text-align:left;width:30%">{{$order->company["company_name"]}}</td>
                    <td style="text-align:left;width:18%">{{ trans('word.invoice') }}</td>
                    <td style="text-align:right;width:10%">{{$order->remaining}}  <i class="fa fa-try"></i></td>
                </tr>
            @endif
        @endforeach
        @foreach($export_collect["cheques"] as $cheque)
            @if($cheque->collect_statu == 0)
                <tr style="cursor:pointer" onclick="window.location.href='{{route("finance.cheques.show",[aid(),$cheque->id])}}'">
                    <td>{{$cheque->payment_date}}</td>
                    <td>{{$cheque->date}}</td>
                    <td>{{$cheque->company_id != null ? $cheque->company["company_name"]:"-"}}</td>
                    <td>{{ trans('word.cheque') }}</td>
                    <td>{{$cheque->amount}} <i class="fa fa-try"></i></td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
