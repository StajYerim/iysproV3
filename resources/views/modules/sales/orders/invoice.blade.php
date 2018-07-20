<!DOCTYPE html>
<html lang="tr">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>{{$invoice->order->company["company_name"]}} </title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;

        }
    </style>
</head>
<body>
<header style="margin-top:150px;font-size:13px;width:50%;height:190px" class="clearfix">
    <table width="100%">
        <tr>
            <td width="515px">
                <div id="CompanyDetails" style="margin-top:80px;width:450px">
                    <div style="margin-top:0px;width:370px">{{$invoice->order->company["company_name"]}}</div>
                    <div style="margin-top:0px;width:370px">{{$invoice->order->company->addresss }}</div>
                    <div style="margin-top:0px;width:370px">{{$invoice->order->company->town}}
                        / {{$invoice->order->company->city}}</div>

                </div>

            </td>
            <td>
                <div id="InvoiceDetails" style="font-size:10px; margin-top:0px">
                    {{--<div>@if(!$invoice->InvoiceMulti) {{!empty($invoice->Invoice->SalesInvoiceDate) ? $invoice->Invoice->SalesInvoiceDate->format("d.m.Y") :"" }}@else {{!empty($invoice->InvoiceMulti->SalesInvoiceDate) ? $invoice->InvoiceMulti->SalesInvoiceDate->format("d.m.Y") : ""}} @endif</div>--}}
                    {{--<div style="height:30px">&nbsp;</div>--}}
                    {{--<div style="height:30px;width:250px">--}}
                        {{--@if($invoice->InvoiceMulti)--}}
                            {{--@foreach($invoice->InvoiceMulti->OrderMultiple as $data)--}}

                                {{--@foreach($data->Waybills as $bill)--}}
                                    {{--{{$bill->WaybillNumber."-"}}--}}

                                {{--@endforeach--}}

                            {{--@endforeach--}}
                            {{--<div>--}}
                                {{--@foreach($invoice->InvoiceMulti->OrderMultiple as $data)--}}

                                    {{--@foreach($data->Waybills as $bill)--}}
                                        {{--{{$bill->WaybillDate->format("d.m.Y")."-"}}--}}

                                    {{--@endforeach--}}

                                {{--@endforeach--}}

                                {{--@else--}}



                                    {{--@foreach($invoice->Waybills as $bill)--}}
                                        {{--{{$bill->WaybillNumber."-"}}--}}

                                    {{--@endforeach--}}

                                    {{--<div>--}}


                                        {{--@foreach($invoice->Waybills as $bill)--}}
                                            {{--{{$bill->WaybillDate->format("d.m.Y")."-"}}--}}

                                        {{--@endforeach--}}



                                        {{--@endif--}}
                                    {{--</div>--}}
                            </div>

            </td>
        </tr>
    </table>
</header>
<div style="margin-top:0cm;font-size:13px;" class="clearfix">
    <table>
        <td style="width:70px"> &nbsp;</td>
        <td style="width:100px" align="left">{{$invoice->order->company["tax_office"]}}</td>
        <td style="width:50px"> &nbsp;</td>
        <td style="width:180px" align="left">{{$invoice->order->company["tax_id"]}}</td>
    </table>
</div>
<main style="margin-top:50px;font-size:12px;width:50%;height:450px">
    <table>
        <thead>
        </thead>
        <tbody>

            @foreach($invoice->order->items as $item)
                <tr>
                    <td width="70px">{{$item->unit["short_name"]}}</td>
                    <td width="350px" class="service">{{$item->product->named["name"]}}</td>
                    <td width="50px" align="right">{{$item->quantity}}</td>
                    <td width="95px" class="unit" align="right">{{$item->price}}</td>
                    <td width="95px" align="right">{{$item->only_price}}</td>
                    {{--<td class="qty">{{$item->SalesItemVat}}%</td>--}}
                    {{--<td class="total">{{tl($item->SalesItemTotalAmount)}}</td>--}}
                </tr>
            @endforeach



        </tbody>
    </table>
    <br><br>{{$invoice["description"]}}<br>


</main>
<footer style="margin-top:20px;font-size:12px;width:50%;height:100px">

        <table>
            <tbody>
            <tr>
                <td width="540px">
                    <div class="grand total">{{yazi_ile($invoice->order["grand_total"], 2, "TL", "KRŞ", "", null, null, null)}} </div>
                </td>
                <td width="150px">
                    <div class="total" style="height:30px" align="right">{{$invoice->order["sub_total"]}} TL</div>
                    <div class="total" style="height:30px" align="right">{{$invoice->order["vat_total"]}} TL</div>
                    <div class="grand total" style="height:30px" align="right"><b>{{$invoice->order["grand_total"]}}
                            TL</b></div>
                </td>
            </tr>
            </tbody>
        </table>

</footer>
</body>
</html>
