@php
app()->setLocale($lang);
$settings_sales_offer =  \App\Model\Settings\SettingsSalesOffer::where('account_id',aid())->first();
$app_account = \App\Account::where('id',aid())->first();
$offerSettings = \App\Model\Settings\SettingsSalesOffer::where("account_id",aid())->first();
$host=$_SERVER["HTTP_HOST"];
 @endphp
        <!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Teklif({{time()}})</title>
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
    @if($offerSettings)
        @if($offerSettings->cover_page !=null)
        {!! $offerSettings->cover_page !!}
        <div class="page-break"></div>
            @endif
    @endif
    <table style= "width: 100%" cellpadding="0" cellspacing="0">
        <tr class="top" >
            <td colspan="5">
                <table>
                    <tr>
                        <td class="title">
                    <tr class="information">
                        <td colspan="4">
                            <table>
                                <tr>
                                    <td>
                                        @if($settings_sales_offer && !empty($app_account->logo))
                                         @if($settings_sales_offer->logo_show == 1)
                                            <img  src="{{ base_path() }}/public/images/account/{{aid()}}/logo/{{$app_account->logo}}">
                                        @endif
                                            @endif
                                    </td>
                                    <td style="margin-left:15px;text-align:right;width:50%">

                                        <b style="line-height: 12px;">{!! account()["name"]!!}</b><br>
                                        <span style="line-height:12px;font-size:10px;">
                                            {!! str_replace("\n","<br>",account()["address"]) !!} {!! account()["town"] !!}/{!! account()["city"] !!}
                                            <br>{{ trans('sentence.t_office_no') }} {{account()["tax_office"]}} / {!! account()["tax_id"] !!}
                                            <br>
                                            {{trans("word.phone")}} {!! account()["phone"] !!}<br>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
                {{--{!! $logo->startText !!}--}}

                <span style="text-align:center"><h2>{{trans("sentence.proforma_invoice")}} / {{trans("word.request")}} </h2></span>
                <span style="float:left"><b style="font-size:15px;">
                        {{$offer->company["company_name"]}}
                    </b> <span style="float:right" >{{trans("word.date")}}:
                        {{$offer->date}}
                    </span></span>
                @if($offer->description)  <br>
                <span style="text-align:left;"><h4>{{$offer->description}}</h4> </span>@else <h4>&nbsp;</h4> @endif

            </td>

        </tr>

        <tr class="heading" style="font-size:11px;">
            <td  style="text-align: left;width:340px" >
                {{trans("word.product")}}/{{trans("word.service")}}
            </td>
            <td  style="text-align: right;width:75px" >
                {{trans("word.quantity")}}
            </td>
            <td style="text-align: right;width:120px">
                {{ trans("sentence.unit_price") }}
            </td>
            {{--@if($offer->Items->sum("OfferItemDiscount") > 0)--}}
                {{--<td  style="text-align: right;width:20px" >--}}
                    {{--İNDİRİM--}}
                {{--</td>--}}
            {{--@else--}}
                {{--<td  style="text-align: right;width:40px" >--}}

                {{--</td>--}}
            {{--@endif--}}
            <td  style="text-align: right;width:40px" >
                {{trans("word.vat")}}
            </td>
            <td style="text-align:right;width:140px">
                {{trans("word.amount")}}({{trans("sentence.excluding_vat")}})
            </td>
        </tr>

        @forelse($offer->items as $off)
            <tr class="item" style="font-size:12px;font-weight: 600">
                <td  style="text-align: left;">
                   {{$off->product->lang($off->product["id"], $lang)}}
                </td>
                <td  style="text-align: right;">
                    {{$off->quantity}} {{$off->unit["name"]}}
                </td>
                <td  style="text-align: right;">
                    {{$off->price}}  <span style="text-transform: uppercase">{!! $offer->currency_icon!!}</span>
                </td>
                {{--@if($offer->Items->sum("OfferItemDiscount") > 0)--}}
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
                    {{$off->only_price}} <span style="text-transform: uppercase">{!! $offer->currency_icon !!}</span>
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
                    {{trans("sentence.there_is_no_offer_movement")}}
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
                {{trans("word.total")}}:
            </td>
            <td colspan="1" style="text-align: right">
                {{$offer->sub_total}} {!! $offer->currency_icon!!}
            </td>
        </tr>
        @if($offer->discount_value != "0,00")
            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="1" style="text-align: right">
                    {{trans("word.discount")}}:
                </td>
                <td colspan="1" style="text-align: right">
                    {{$offer->discount_value}}  {!! $offer->currency_icon!!}
                </td>
            </tr>
        @endif
        <tr class="total">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="1" style="text-align: right">
              {{--<div style=";font-size:10px;">  @if(KdvTotal($offer->items,1) > 0)%1 {{trans("word.vat")}}<br>@endif--}}
                {{--@if(KdvTotal($offer->items,8) > 0) %8 {{trans("word.vat")}}<br>@endif--}}
                {{--@if(KdvTotal($offer->items,18) > 0) %18 {{trans("word.vat")}}<br>@endif--}}
              {{--</div>--}}
                {{ trans("sentence.total_vat") }} :
            </td>
            <td colspan="1" style="text-align: right">
                {{--<div style=";font-size:10px;">   @if(KdvTotal($offer->items,1) > 0)  {{KdvTotal($offer->items,1)}} {!! $offer->currency_icon!!}<br>@endif--}}
                {{--@if(KdvTotal($offer->items,8) > 0) {{KdvTotal($offer->items,8)}} {!! $offer->currency_icon!!}<br>@endif--}}
                {{--@if(KdvTotal($offer->items,18) > 0){{KdvTotal($offer->items,18)}} {!! $offer->currency_icon!!}<br>@endif  </div>--}}
                {{$offer->vat_total}} {!! $offer->currency_icon!!}

            </td>
        </tr>
        <tr class="total" style="float:right">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="1" style="text-align: right;width:140px;">
                {{trans("sentence.general_amount")}} :
            </td>
            <td colspan="1" style="text-align: right;width:120px;">
                {{$offer->grand_total}} {!! $offer->currency_icon!!}
            </td>
        </tr>
    </table>
    <br>
        @php
            $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
   'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
);
$list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
$list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
   'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
   'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
);

        @endphp
    <span style="text-transform: uppercase">{{yazi_ile($offer->grand_total, 2,$offer->currency_name, $offer->currency_coin, "", $list1, $list2, $list3,"tr")}}
    </span>
    <br><br><br>
    <p style="white-space: pre;">{!! $offer->description_detail !!}</p>
</div>

<div id="altfooter">
</div>
</body>
</html>
