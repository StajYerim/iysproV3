@php
    app()->setLocale($lang);
@endphp
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Siparis({{time()}})</title>
    <style>

        body {
            font-family: DejaVu Sans, sans-serif,Tahoma;

        }
        .page-break {
            page-break-after: always;
        }

        .invoice-box {
            font-size: 12px;
            color: #555;
            margin-top:-50px;
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
        } .invoice-box table tr td:nth-child(5) {
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
            height:1px;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.details td {
            padding-bottom: 1px;
        }
        .invoice-box table tr.item td{
            border-top: 2px solid #eee;
            font-size:10px;

        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table tr.total td:nth-child(5) {
            border-top: 2px solid #eee;
            border-bottom: 2px solid #eee;
            font-weight: bold;
        }
        .invoice-box table tr.total td:nth-child(6) {
            border-top: 2px solid #eee;
            border-bottom: 2px solid #eee;
            font-weight: bold;
        }
        #altfooter {
            position:absolute;
            bottom:-20px;
            width:100%;
            text-align:left;
        }
    </style>
</head>
<body>

<div class="invoice-box">

    <table style= "width: 100%" cellpadding="0" cellspacing="0">
        <tr class="top" >
            <td colspan="6">
                <table>
                    <tr>
                        <td class="title">
                    <tr class="information">
                        <td colspan="6" >
                            <table>
                                <tr>
                                    <td>

                                    </td>
                                    <td style="margin-left:15px;text-align:right;width:35%">

                                        <b style="line-height: 12px;">{!! account()["name"]!!}</b><br>
                                        <span style="line-height:12px;font-size:10px;">
                                            {!! str_replace("\n","<br>",account()["address"]) !!} {!! account()["town"] !!}/{!! account()["city"] !!}

                                            <br>V.D ve No {{account()["tax_office"]}} / {!! account()["tax_id"] !!}<br>Telefon {!! account()["phone"] !!}<br>

                                    </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
                {{--{!! $logo->startText !!}--}}

                <span style="text-align:center"><h2>SATIŞ SİPARİŞİ</h2></span>
                <span style="float:left"><b style="font-size:15px;">
                        {{$order->company["company_name"]}}
                    </b> <span style="float:right" >Tarih:
                        {{$order->date}}
                    </span></span>
                @if($order->description)  <br>
                <span style="text-align:left;"><h4>{{$order->description}}</h4> </span>@else <h4>&nbsp;</h4> @endif

            </td>

        </tr>

        <tr class="heading" style="font-size:11px;">
            <td  style="text-align: left;width:340px" >
                ÜRÜN/HİZMET
            </td>
            <td  style="text-align: right;width:60px" >
                {{trans("general.quantity")}}
            </td>
            <td style="text-align: right;width:120px">
                BİRİM FİYAT
            </td>
            {{--@if($order->Items->sum("OfferItemDiscount") > 0)--}}
                {{--<td  style="text-align: right;width:20px" >--}}
                    {{--İNDİRİM--}}
                {{--</td>--}}
            {{--@else--}}
                {{--<td  style="text-align: right;width:40px" >--}}

                {{--</td>--}}
            {{--@endif--}}
            <td  style="text-align: right;width:40px" >
                KDV
            </td>
            <td style="text-align:right;width:140px">
                TUTAR(KDV Hariç)
            </td>
        </tr>

        @forelse($order->items as $off)
            <tr class="item" style="font-size:12px;font-weight: 600">
                <td  style="text-align: left;">
                    {{$off->product->lang($off->product["id"], $lang)}}
                </td>
                <td  style="text-align: right;">
                    {{$off->quantity}} {{$off->unit["name"]}}
                </td>
                <td  style="text-align: right;">
                    {{$off->price}}  <span style="text-transform: uppercase">{!! $order->currency_icon!!}</span>
                </td>
                {{--@if($order->Items->sum("OfferItemDiscount") > 0)--}}
                    {{--<td  style="text-align: right;">--}}
                        {{--{{$off->OfferItemDiscountType == 0 ? "%".$off->OfferItemDiscount:$off->OfferItemDiscount." TL"}}--}}
                    {{--</td>--}}
                {{--@else--}}
                    {{--<td  style="text-align: right;">--}}
                    {{--</td>--}}
                {{--@endif--}}
                <td  style="text-align: right;">
                    %{{$off->vat}}
                </td>
                <td  style="text-align: right;">
                    {{$off->only_price}} <span style="text-transform: uppercase">{!! $order->currency_icon!!}</span>
                </td>
            </tr>
            @if($off->note)

                <tr style="text-align:left;font-size:10px;">
                    <td style="height:22px" colspan="6">{!! str_replace("\n","<br>",$off->note) !!}</td>
                </tr>
            @endif
        @empty
            <tr class="item">
                <td colspan="6">
                    Teklif hareketi bulunmamaktadır.
                </td>
            </tr>
        @endforelse

    </table>
    <br>
    <table style="text-transform: uppercase">

        <tr class="total">
            <td></td>
            <td></td>
            <td></td>

            <td></td>

            <td colspan="1" style="text-align: right">
                TOPLAM:
            </td>
            <td colspan="1" style="text-align: right">
                {{$order->sub_total}} {!! $order->currency_icon!!}
            </td>
        </tr>
        {{--@if($order->Items->sum("OfferItemDiscount") > 0)--}}
            {{--<tr class="total">--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td></td>--}}
                {{--<td colspan="1" style="text-align: right">--}}
                    {{--İNDİRİM:--}}
                {{--</td>--}}
                {{--<td colspan="1" style="text-align: right">--}}
                    {{--{{tl($order->OfferDiscount)}} TL--}}
                {{--</td>--}}
            {{--</tr>--}}
        {{--@endif--}}
        <tr class="total">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="1" style="text-align: right">
              <div style=";font-size:10px;">  @if(KdvTotal($order->items,1) > 0)%1 KDV<br>@endif
                @if(KdvTotal($order->items,8) > 0) %8 KDV<br>@endif
                @if(KdvTotal($order->items,18) > 0) %18 KDV<br>@endif
              </div>
                TOPLAM KDV:

            </td>
            <td colspan="1" style="text-align: right">
                <div style=";font-size:10px;">   @if(KdvTotal($order->items,1) > 0)  {{KdvTotal($order->items,1)}} {!! $order->currency_icon!!}<br>@endif
                @if(KdvTotal($order->items,8) > 0) {{KdvTotal($order->items,8)}} {!! $order->currency_icon!!}<br>@endif
                @if(KdvTotal($order->items,18) > 0){{KdvTotal($order->items,18)}} {!! $order->currency_icon!!}<br>@endif  </div>
                {{$order->vat_total}} {!! $order->currency_icon!!}

            </td>
        </tr>
        <tr class="total" style="float:right">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="1" style="text-align: right;width:140px;">
                GENEL TOPLAM:
            </td>
            <td colspan="1" style="text-align: right;width:120px;">
                {{$order->grand_total}} {!! $order->currency_icon!!}
            </td>
        </tr>
    </table>
    <br>
    <span style="text-transform: uppercase">{{yazi_ile($order->grand_total, 2, $order->currency_name, "KRŞ", "", null, null, null)}}
    </span>
    <br><br><br>
    {{--{!! $logo->endText !!}--}}
</div>

<div id="altfooter">
</div>
</body>
</html>
