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
<body><p>{{$company->company_name}} <span style="float:right">CARİ HESAP EXTRESİ</span></p>
<b>İşlem Hareketleri</b>
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
            <td width="75px" style="text-align: left;">
                TARİH
            </td>
            <td width="90px">
                İŞLEM
            </td>
            <td style="text-align:left" width="200px">
                AÇIKLAMA
            </td>
            <td width="110px">
                BORÇ
            </td>
            <td width="110px">
                ALACAK
            </td>
            <td style="text-align:right" width="130px">
                BAKİYE
            </td>
        </tr>
        @php $borc = 0; $alacak=0; @endphp
        @forelse($items as $statement)
            @php
                if($statement["action_type"] == "-"){
                 $alacak += money_db_format($statement["amount"]);
                }elseif($statement["action_type"] == "+"){
                 $borc += money_db_format($statement["amount"]);
                }
            @endphp
            <tr class="item" style="text-align:left;">
                <td>
                    {{$statement["date"]}}
                </td>
                <td>
                    {{$statement["type"]}}
                </td>
                <td style="text-align:left">
                    {{$statement["description"]}}
                </td>
                <td style="text-align:right">

                    @if($statement["action_type"] == "+")
                        {{$statement["amount"]}}
                    @endif
                </td>
                <td style="text-align:right">

                    @if($statement["action_type"] == "-")
                        {{$statement["amount"]}}
                    @endif
                </td>
                <td style="text-align:right">
                    {{$statement["last_balance"]}} TL
                </td>
            </tr>


        @empty
            <tr class="item">
                <td colspan="5">
                    Hesap hareketi bulunmamaktadır.
                </td>
            </tr>
        @endforelse
        @if($items != "[]")
            <tr>
                <td colspan="6">&nbsp;</td>
            </tr>
            <tr class="total">
                <td colspan="4"></td>
                <td colspan="1" style="text-align: right">
                    ALACAK:
                </td>
                <td colspan="1" style="text-align: right">
                  {{get_money($alacak)}}  TL
                </td>
            </tr>
            <tr class="total">
                <td colspan="4"></td>
                <td colspan="1" style="text-align: right">
                    BORÇ:
                </td>
                <td colspan="1" style="text-align: right">
                   {{get_money($borc)}} TL
                </td>
            </tr>
            <tr class="total" style="float:right">
                <td colspan="4"></td>
                <td colspan="1" style="text-align: right">
                    BAKİYE:
                </td>
                <td colspan="1" style="text-align: right">
                   {{$company->balance}} TL
                </td>
            </tr>
        @endif
    </table>
</div>
</body>
</html>
