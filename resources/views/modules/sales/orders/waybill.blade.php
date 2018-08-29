<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{$waybill->company["company_name"]}} </title>
    <style>
        body
        {
            font-family: DejaVu Sans, sans-serif;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
        }

    </style>
</head>
<body>
<header style="margin-top:157px;font-size:13px;width:50%;height:190px" class="clearfix">
    <br><br><br>
    <table width="100%">
        <tr>
            <td width="300px">
                <div id="CompanyDetails">
                    <div>{{$waybill->company["company_name"]}}</div>
                    <div>{{$waybill->company->addresss }}</div>
                    <div>{{$waybill->company->town}} / {{$waybill->company->city}}</div>
                </div>

            </td>
        </tr>
    </table>
</header>

<header style="margin-top:10px;font-size:13px;" class="clearfix">
    <table width="100%">
        <tr>
            <td width="330px">
                <div id="CompanyTaxDetails">
                    {{$waybill->company["tax_id"]}} |
                    {{$waybill->company["tax_office"]}}
                </div>

            </td>
            <td>
                <div>
                    <div style="height:40px">{{$waybill->date}}</div>
                    <div style="height:30px"></div>
                </div>

            </td>
            <td>
                <div>
                    <div style="height:40px">@if($waybill->dispatch_date){{$waybill->dispatch_date}}@endif</div>
                    <div style="height:30px"></div>
                </div>

            </td>
        </tr>
    </table>
</header>
<main style="margin-top:40px;font-size:12px;width:50%;height:500px">
    <table>
        <thead>
        </thead>
        <tbody>
        @foreach($waybill->items as $item)
            <tr>
                <td width="450px" class="service">{{$item->product->named["name"]}}</td>
                <td width="180px"  align="right"><span style="margin-right:-5px;">{{$item->quantity}}</span></td>
                <td width="90px"> <span >&nbsp;&nbsp; {{$item->product->unit["short_name"]}}</span></td>
            </tr>
        @endforeach


        </tbody>
    </table>
    <br><br>
    {{$waybill->description}}
</main>
</body>
</html>