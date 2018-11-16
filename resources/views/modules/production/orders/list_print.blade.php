<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Üretim listesi - {{date_tr()}}</title>
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
<body><p> <span style="float:right">{{\Carbon\Carbon::now()->format("d.m.Y H:i")}}</span></p>
<b>Üretim Listesi</b>
{{--<span style="float:right "><b>@if($actions != "[]"){{$actions->where("ActionShow",0)->first()->ActionDate->format("d.m.Y")}} - {{$actions->where("ActionShow",0)->last()->ActionDate->format("d.m.Y")}} @endif</b></span>--}}
<hr>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="12">
                <table>
                    <tr>
                        <td class="title">
                    <tr class="information">
                        <td colspan="8">
                            <table>
                                <tr>
                                    <td>

                                    </td>

                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="heading" style="font-size:11px;">
            <td width="300px" style="text-align: left;">
                MÜŞTERİ
                / SİPARİŞ
            </td>
            <td width="200px">
              BAŞLANGIÇ TARİHİ
            </td>
            <td width="200px">
                DURUM
            </td>

        </tr>


        @forelse($orders as $statement)

            <tr class="item" style="text-align:left;">
                <td>
                        {{$statement["title"]}}  {{$statement["desc"] == null ? "":"<br>".$statement["desc"]}}
                </td>
                <td>
                    {{$statement["start"]}}
                </td>
                <td >
                    {{$statement["status"]}}
                </td>

            </tr>


        @empty
            <tr class="item">
                <td colspan="5">
                    Belirtilen kriterlerde üretim listesi oluşturulamadı.
                </td>
            </tr>
        @endforelse


    </table>
</div>
</body>
</html>
