@extends('layouts.master')
@section('content')
    <!-- widget grid -->
    <section id="show" v-cloak>
        <div class="col-lg-12 new-title">
            <div class="col-lg-8 col-sm-8">
                <h1><i class="fa fa-file-text-o"></i> <span class="semi-bold">{{$order->descriptions}}</span></h1>

            </div>
            <div class="col-lg-4 col-sm-4">

                <div class="btn-group btn-group-justified pull-right option-menu">
                    <div class="btn-group ">
                        <a class="btn btn-default  dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span
                                    class="fa fa-reorder"></span> &nbsp;<span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route("sales.orders.form",[aid(),$order->id,"update"])}}"><i
                                            class="fa fa-edit" aria-hidden="true"></i>
                                    {{trans("general.edit")}}</a>
                            </li>
                            <li>
                                <a href="#!" v-if="remaining !='0,00'"  data-toggle="modal" data-target="#transaction"><i
                                            class="fa fa-edit" aria-hidden="true"></i>
                                    {{trans("general.collection")}} {{trans("general.add")}}</a>
                            </li>
                            <li>
                                <a href="{{route("sales.orders.form",[aid(),$order->id,"copy"])}}"><i class="fa fa-copy"
                                                                                                      aria-hidden="true"></i>
                                    {{trans("general.copy")}} {{trans("general.create")}}</a>
                            </li>
                            <li>
                                <a onclick="$(this).orderReturn()" data-id="0" id="orderReturn" href="#"><i
                                            class="fa fa-reply " aria-hidden="true"></i>
                                    {{trans("general.order")}} {{trans("general.convert")}}</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"
                                                                                              aria-hidden="true"></i>
                                    {{trans("general.delete")}}</a>
                            </li>

                        </ul>

                    </div>
                    <div class="btn-group">
                        <a class="btn btn-default  dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span
                                    class="fa fa-print"></span> {{trans("general.print")}} <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="test" tabindex="-1" href="#">  <i class="fa fa-print" aria-hidden="true"></i> SİPARİŞİ YAZDIR</a>
                                <ul class="dropdown-menu"  style="   right: 158px;top: 5px;">
                                    @foreach($langs as $lang)
                                        <li><a tabindex="-1" target="_blank" href="{{route("sales.orders.pdf",[aid(),$order->id,"url",$lang->lang_code])}}"> <img src="https://dev.iyspro.com/img/blank.gif" class="flag flag-{{$lang->lang_code == "en" ? "us":$lang->lang_code}}"> {{$lang->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="test" tabindex="-1" href="#">   <i class="fa fa-print" aria-hidden="true"></i> SİPARİŞİ İNDİR </a>
                                <ul class="dropdown-menu"  style="   right: 158px;top: 5px;">
                                    @foreach($langs as $lang)
                                        <li><a tabindex="-1" target="_blank" href="{{route("sales.orders.pdf",[aid(),$order->id,"url",$lang->lang_code])}}" > <img src="https://dev.iyspro.com/img/blank.gif" class="flag flag-{{$lang->lang_code == "en" ? "us":$lang->lang_code}}"> {{$lang->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="">
                                <a class="test" tabindex="-1"  data-toggle="modal" data-target="#waybillModal" href="#">   <i class="fa fa-print" aria-hidden="true"></i> İRSALİYE YAZDIR </a>
                            </li>
                        </ul>

                    </div>

                    <a href="#" data-toggle="modal" data-target="#shareModal" class="btn btn-default"><i
                                class="fa fa-envelope"></i> {{trans("general.share")}}</a>

                </div>


            </div>
        </div>
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="row">
                    <div class="col-sm-8">

                        <div class="well">

                            <div class="row">
                                <div class="col-sm-5" style="font-weight: 400;font-size:15px;"><i
                                            class="fa fa-building-o"></i> <a
                                            href="{{route("sales.companies.show",[aid(),$order->company["id"]])}}">{{$order->company["company_name"] == null ? "Belirtilmedi":$order->company["company_name"]}}</a>
                                </div>
                                <div class="col-sm-3" style="font-weight: 400;font-size:15px;"><i
                                            class="fa fa-calendar"></i> {{$order->date}}</div>
                                <div class="col-sm-3" style="font-weight: 400;font-size:15px;"><i
                                            class="fa fa-calendar"></i> {{$order->due_date}}</div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive ">

                                        <table class="table table-hover table-condensed table-no-padding">

                                            <tbody>
                                            <tr>
                                                <th width="33%">{{trans("general.service")}} / {{trans("general.product")}}</th>
                                                <th width="14%">{{trans("general.quantity")}}</th>
                                                <th width="10%" style="text-align:right">{{trans("general.unit")}} F.</th>
                                                <th width="10%" style="text-align:right">KDV</th>
                                                <th width="10%" style="text-align:right">{{trans("general.total")}}</th>
                                            </tr>

                                            </tbody>
                                            <tbody>

                                            <tr v-for="item in items" v-bind:class="item.waybill">
                                                <td>
                                                    @{{ item.product }}
                                                </td>

                                                <td>@{{ item.quantity }} @{{ item.unit }}</td>
                                                <td style="text-align:right">@{{ item.price }} <i
                                                            class='fa fa-{{$order->currency}}'></i></td>
                                                <td align="right">%@{{item.vat}}</td>
                                                <td style="text-align:right"> @{{ item.total }} <i
                                                            class="fa fa-{{$order->currency}}"></i></td>
                                            </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-6">

                                            <table class="table table-condensed table-striped" width="100%" border="0">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="bottom-info">{{trans("general.subtotal")}}</div>
                                                    </td>
                                                    <td style="text-align:right">
                                                        <div class="bottom-info">{{$order->sub_total}} <i
                                                                    class="fa fa-{{$order->currency}}"></i></div>
                                                    </td>
                                                </tr>


                                                <tr v-for="vato in vat_only" class="trow"
                                                    v-if="vato.total!=0">

                                                    <td style="border-top: 0px;">
                                                        <div class="bottom-info" style="font-size: 11px" >{{trans("general.total")}} KDV @{{
                                                            vato.name }}
                                                        </div>
                                                    </td>
                                                    <td style="text-align:right">
                                                        <div class="bottom-info" style="font-size: 11px"><span
                                                                    id="total-vat-1">@{{ vato.total }}</span> <i
                                                                    class="fa fa-{{$order->currency}}"></i></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="bottom-info">{{trans("general.total")}} KDV</div>
                                                    </td>
                                                    <td style="text-align:right">
                                                        <div class="bottom-info">{{$order->vat_total}} <i
                                                                    class="fa fa-{{$order->currency}}"></i></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="bottom-info">{{trans("general.general")}} {{trans("general.total")}}</div>
                                                    </td>
                                                    <td style="text-align:right">
                                                        <div class="bottom-info"
                                                             style="color:#2AC!important">{{$order->grand_total}}
                                                            <i class="fa fa-{{$order->currency}}"></i></div>
                                                    </td>
                                                </tr>
                                                @if($order->currency != "try")
                                                    <tr>
                                                        <td>
                                                            <div class="bottom-info">TL {{trans("general.provision")}}</div>
                                                        </td>
                                                        <td style="text-align:right">
                                                            <div class="bottom-info"
                                                                 style="color:#2AC!important">{{$order->tl_convert}}
                                                                <i class="fa fa-try"></i></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                        </td>
                                                        <td style="text-align:right">
                                                            <div class="bottom-info" style="color:#2AC!important">1 <i
                                                                        class="fa fa-{{$order->currency}}"></i>
                                                                = {{$order->currency_value}} <i class="fa fa-try"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>

                                            <table class="table">
                                                <tfoot>
                                                <tr>
                                                    <td width="5%"></td>
                                                    <td width="40%"></td>
                                                    <td></td>
                                                    <td>{{trans("general.remaining")}}</td>
                                                    <td><span class="pull-right">@{{ remaining }} <i class="fa fa-{{$order->currency}}"></i></span></td>
                                                </tr>
                                                </tfoot>
                                                <tbody>

                                                    <tr v-for="item in collect_items"   class="success" style="cursor: pointer;" @click="redirect(item.id,item.type)">
                                                        <td>  <i class="fa fa-sign-in fa-rotate-90 "></i></td>
                                                        <td>@{{item.date}} </td>
                                                        <td></td>
                                                        <td>@{{item.bank_account}}</td>
                                                        <td> <span class="pull-right">@{{item.amount}} <i class="fa fa-{{$order->currency}}"></i></span></td>
                                                    </tr>


                                                </tbody>
                                            </table>



                                    </div>


                                </div>



                            </div>
                        </div>

                    </div>
                    <div class="col-sm-4">

                        <div id="order_info" class="well">
                            <div id="short_info" class="col-12">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="bottom-info">{{trans("general.order")}} {{trans("general.amount")}}<span class="pull-right"
                                                                                   style="font-size:15px;color:#2AC!important">{{$order->grand_total}}
                                                <i class="fa fa-{{$order->currency}}"></i></span></div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="bottom-info">{{trans("general.remaining")}} {{trans("general.amount")}}<span class="pull-right"
                                                                                     style="font-size:15px;color:#2AC!important">@{{ remaining }}
                                                <i class="fa fa-{{$order->currency}}"></i></span></div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="bottom-info">{{trans("general.account")}} {{trans("trans.balance")}}<span class="pull-right"
                                                                                   style="font-size:15px;color:#2AC!important">@{{ company_balance }}
                                                <i class="fa fa-{{$order->currency}}"></i></span></div>
                                    </div>
                                </div>
                              <hr>
                                @if($order->offer)
                                    <div class="col-sm-12">
                                        {{trans("general.offer")}}
                                        <br>
                                        <a href="{{route("sales.offers.show",[aid(),$order->offer["id"]])}}"> {{$order->offer["description"] == null ? "SATIŞ TEKLİFİ":$order->offer["description"]}}
                                            (#{{$order->offer["id"]}})</a><br>
                                    </div>
                                    <hr>
                                @endif
                                <div class="row">
                                    @if($order->waybills->count() > 0)
                                        <table class="table table-condensed table-hover">
                                            <thead>
                                            <tr>
                                                <th>İrsaliye No</th>
                                                <th>Düzenleme</th>
                                                <th>Sevk</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order->waybills as $waybill)
                                                <tr onmouseover="this.style.cursor='pointer'" @click="waybill_process('{{$waybill->id}}','{{$waybill->number}}')" style="cursor: pointer;">
                                                    <td>{{$waybill->number}}</td>
                                                    <td>{{$waybill->edit_date}}</td>
                                                    <td>{{$waybill->dispatch_date}}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                        <hr>
                                    @endif

                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </article>
        </div>

        @include("components.external.delete_modal",[$title="Are you sure ?",$type = "deleteModal",$message="Are you sure delete sales order ?",$id=$order->id])
        {{--İrsaliye Yazdır--}}
        <div class="modal fade" id="waybillModal" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true"
             style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-title" id="myModalLabel">İrsaliye Yazdır</h4>
                    </div>
                    <div class="modal-body modal-body-content">
                        @if(count($order->no_waybills))
                            <div class="row">
                                <form id="wizard-1" novalidate="novalidate">
                                    <div id="bootstrap-wizard-1" class="col-sm-12">
                                        <div class="form-bootstrapWizard">
                                            <ul class="bootstrapWizard form-wizard" style="width: 127%;">
                                                <li class="active" data-target="#step1">
                                                    <a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span
                                                                class="title">Ürün Seçimi</span> </a>
                                                </li>
                                                <li data-target="#step2">
                                                    <a href="#tab2" data-toggle="tab"> <span class="step">2</span> <span
                                                                class="title">İrsaliye Bilgileri</span> </a>
                                                </li>
                                                <li data-target="#step3">
                                                    <a href="#tab3" data-toggle="tab"> <span class="step">3</span> <span
                                                                class="title">Yazdır</span> </a>
                                                </li>

                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab1">
                                                <br>
                                                <br>

                                                <div class="row">
                                                    <br><br>
                                                    <div style="background: #fff; margin: -20px -1px 0px 0px;font-size: 13px;font-weight: 600;"
                                                         class="table-responsive">
                                                        <table class="table">

                                                            <tbody>

                                                            <tr v-for="item in waybill.items">
                                                                <td>
                                                                    @{{ item.product }}
                                                                </td>

                                                                <td>@{{ item.quantity }} @{{ item.unit }}</td>

                                                                <td>
                                                                    <div class="checkbox"
                                                                         style="margin-top:0px;margin-bottom:0px;">
                                                                        <label>
                                                                            <input type="checkbox"
                                                                                   v-model='item.selected'
                                                                                   class="checkbox style-3">
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>

                                                    </div>

                                                </div>


                                            </div>
                                            <div class="tab-pane" id="tab2">
                                                <br>
                                                <br>
                                                <div class="row">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">İRSALİYE NO</label>
                                                            <div class="col-md-6 ">
                                                                <div class="input-group">
                                                                    <input style="width: 266px;" type="text"
                                                                           v-model="waybill.number"
                                                                           class="form-control"
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">DÜZENLEME
                                                                TARİHİ</label>
                                                            <div class="col-md-6 ">
                                                                <div class="input-group">
                                                                    <input type="text"
                                                                           v-model="waybill.edit_date"
                                                                           data-mask="99.99.9999"
                                                                           class="form-control "
                                                                           data-dateformat="dd.mm.yy">
                                                                    <span class="input-group-addon"><i
                                                                                class="fa fa-calendar"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">SEVK TARİHİ</label>
                                                            <div class="col-md-6 ">
                                                                <div class="input-group">
                                                                    <input type="text" name=""
                                                                           data-mask="99.99.9999"
                                                                           v-model="waybill.dispatch_date"
                                                                           class="form-control "
                                                                           data-dateformat="dd.mm.yy">
                                                                    <span class="input-group-addon"><i
                                                                                class="fa fa-calendar"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="form-group">
                                                            <label for="" class="col-md-4 control-label">İRSALİYE NOTU

                                                            </label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                    <input type="text" style="width: 354px;"
                                                                           v-model="waybill.description"
                                                                           value=""
                                                                           class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab3">
                                                <br>
                                                <br>
                                                <br>
                                                <h1 class="text-center"><strong>
                                                        <button type="button" class="btn btn-default btn-lg"
                                                                @click="waybill_print"
                                                                v-html="loading_message"></button>
                                                    </strong></h1>
                                                <br>
                                                <br>
                                            </div>


                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <ul class="pager wizard no-margin">
                                                            <!--<li class="previous first disabled">
                                                            <a href="javascript:void(0);" class="btn btn-lg btn-default"> First </a>
                                                            </li>-->
                                                            <li class="previous disabled">
                                                                <a href="javascript:void(0);"
                                                                   class="btn btn-lg btn-default">
                                                                    Geri </a>
                                                            </li>
                                                            <!--<li class="next last">
                                                            <a href="javascript:void(0);" class="btn btn-lg btn-primary"> Last </a>
                                                            </li>-->
                                                            <li class="next">
                                                                <a href="javascript:void(0);"
                                                                   class="btn btn-lg txt-color-darken"> İleri </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>

                            </div>
                        @else
                            TÜM ÜRÜNLERİN İRSALİYELERİ YAZDIRILMIŞTIR.
                            YENİDEN YAZDIRMAK İÇİN İRSALİYE LİSTESİNE BAKIN
                        @endif


                    </div>
                </div>
            </div>
        </div>
        {{--İrsaliye Yazdır--}}
    </section>

    @include("components.external.transaction",[$type="collect",$local="sales_orders",$detail = $order,$abble="App\\\Model\\\Sales\\\SalesOrders"])

    @include("components.external.share",[
    $title="Sipariş",
    $thread="Satış Siparişi : ".$order->company["company_name"],
    $message="Merhaba,<br>Satış Siparişi detaylarınız ektedir indirerek inceleyebilirsiniz.<br>İyi çalışmalar.<br><br><b>".account()["name"]."</b>",
    $type="share.order",
    $data = $order])

@push("style")

    <style>
        .row_dark{
            background:#e2e2e2
        }
    </style>

    @endpush
    @push('scripts')
        <script src="{{asset("js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js")}}"></script>
        <script>
            window.addEventListener("load", () => {
                VueName = new Vue({
                    el: "#show",
                    data: {
                        loading: false,
                        loading_message: '<i class="fa fa-print"></i> Yazdır',
                        remaining:"{{$order->remaining}}",
                        company_balance:"{{$order->company->balance}}",
                        collect_items:[
                                @foreach($order->payments as $pay)
                            {
                                type:"collect",
                                id:"{{$pay->id}}",
                                date:"{{$pay->date}}",
                                bank_account:'{{$pay->bank_account["name"]}}',
                                amount:"{{get_money($pay->pivot->amount)}}"
                            },
                            @endforeach()
                                @foreach($order->cheques as $che)
                            {
                                type:"cheq",
                                id:"{{$che->id}}",
                                date:"{{$che->date}}",
                                bank_account:'ALINAN ÇEK',
                                amount:"{{get_money($che->pivot->amount)}}"
                            },
                            @endforeach()
                        ],
                        items: [@foreach($order->items as $item)
                        {
                            waybill: "{{$item->waybill_item ? 'row_dark':false}}",
                            product: "{{$item->product->named["name"]}}",
                            quantity: "{{$item->quantity}}",
                            unit: "{{$item->unit["short_name"]}}",
                            price: "{{$item->price}} ",
                            vat: "{{$item->vat}}",
                            total: "{{$item->total}}"
                        },
                            @endforeach ],
                        vat_only: [
                            {name: "%1", total: 0},
                            {name: "%8", total: 0},
                            {name: "%18", total: 0},
                        ],
                        waybill: {
                            id: "{{$order->id}}",
                            number: "",
                            edit_date: "{{date_tr()}}",
                            dispatch_date: "{{date_tr()}}",
                            description: "",
                            items: [@foreach($order->no_waybills as $item)
                            {
                                id: "{{$item["id"]}}",
                                product: "{{$item["name"]}}",
                                quantity: "{{$item["quantity"]}}",
                                unit: "{{$item["unit"]}}",
                                selected: true,
                            },
                                @endforeach ],

                        }
                    },
                    methods: {
                        waybill_print: function ($id) {
                            this.loading_message = '<i class="fa fa-refresh fa-spin  fa-fw"></i> Lütfen Bekleyiniz...';

                            axios.post("{{route("sales.waybill.add",aid())}}", this.waybill).then(res => {
                                console.log(res.data)
                                window.open("/{{aid()}}/sales/orders/waybill-print/" + res.data);
                                $("#waybillModal").modal("hide");
                                location.reload();
                            })
                        },
                        waybill_process: function ($id,$number) {

                            if($number === null){
                                $number = "Seçtiğiniz"
                            }else{
                                $number = $number;
                            }
                            swal(+$number + " irsaliye için ne yapmak istiyorsunuz ?", {
                                buttons: {

                                    print: {
                                        text: "Yazdır",
                                        value: "print"
                                    },
                                    catch: {
                                        text: "SİL!",
                                        value: "delete",
                                    },
                                    defeat: false,
                                    cancel: "Vazgeç"
                                },
                            })
                                .then((value) => {
                                        switch (value) {

                                            case"delete"
                                            :
                                                $.post("/{{aid()}}/sales/orders/waybill-delete/" + $id, function (data) {

                                                });
                                                swal("Başarılı", "Seçilen irsaliye kaldırıldı!", "success");
                                                location.reload();
                                                break;
                                            case "print":
                                                window.open("/{{aid()}}/sales/orders/waybill-print/" + $id);
                                                break;
                                        }
                                    }
                                );
                        },
                        redirect:function($id,$type){
                            if($type=="collect"){
                                return window.location.href='/{{aid()}}/finance/accounts/'+$id+'/receipt';
                            }else{
                                return window.location.href='/{{aid()}}/finance/cheques/'+$id+'/show';
                            }

                        },

                        delete_data: function ($id) {
                            fullLoading();
                            axios.delete('{{route("sales.orders.destroy",[aid(),$order->id])}}')
                                .then(function (response) {
                                    if (response.data.message == "success") {
                                        window.location.href = '{{route("sales.orders.index",aid())}}';
                                    }
                                }).catch(function (error) {
                                notification("Error", error.response.data.message, "danger");

                            });
                        },


                    },
                    computed:{

                        vat_check() {
                            vat1 = 0;
                            vat8 = 0;
                            vat18 = 0;

                            this.items.reduce((total, item) => {

                                if (item.vat == 1) {

                                    t = money_clear(item.total);
                                    a = money_clear(item.price);
                                    q = money_clear(item.quantity);

                                    st = q * a;
                                    sr = t - st;

                                    vat1 += sr;


                                } else if (item.vat == 8) {

                                    t = money_clear(item.total);
                                    a = money_clear(item.price);
                                    q = money_clear(item.quantity);

                                    st = q * a;
                                    sr = t - st;

                                    vat8 += sr;
                                } else if (item.vat == 18) {

                                    t = money_clear(item.total);
                                    a = money_clear(item.price);
                                    q = money_clear(item.quantity);

                                    st = q * a;
                                    sr = t - st;

                                    vat18 += sr;
                                }

                            }, 0);

                            if(vat1!=0){
                                this.vat_only[0].name = "%1";
                                this.vat_only[0].total = vat1.toLocaleString('tr-TR', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                            }else{
                                this.vat_only[0].total = 0;
                            }
                            if(vat8!=0){
                                this.vat_only[1].name = "%8";
                                this.vat_only[1].total = vat8.toLocaleString('tr-TR', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                            }else{
                                this.vat_only[1].total = 0;
                            }
                            if(vat18!=0){
                                this.vat_only[2].name = "%18";
                                this.vat_only[2].total = vat18.toLocaleString('tr-TR', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                            }else{
                                this.vat_only[2].total = 0;
                            }


                        },
                    },
                    mounted: function () {
                        datePicker();
                        this.vat_check
                        // fuelux wizard
                        var $validator = $("#wizard-1").validate({

                            rules: {
                                email: {
                                    required: true,
                                    email: "Your email address must be in the format of name@domain.com"
                                },
                                fname: {
                                    required: true
                                },
                                lname: {
                                    required: true
                                },
                                country: {
                                    required: true
                                },
                                city: {
                                    required: true
                                },
                                postal: {
                                    required: true,
                                    minlength: 4
                                },
                                wphone: {
                                    required: true,
                                    minlength: 10
                                },
                                hphone: {
                                    required: true,
                                    minlength: 10
                                }
                            },

                            messages: {
                                fname: "Please specify your First name",
                                lname: "Please specify your Last name",
                                email: {
                                    required: "We need your email address to contact you",
                                    email: "Your email address must be in the format of name@domain.com"
                                }
                            },

                            highlight: function (element) {
                                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                            },
                            unhighlight: function (element) {
                                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                            },
                            errorElement: 'span',
                            errorClass: 'help-block',
                            errorPlacement: function (error, element) {
                                if (element.parent('.input-group').length) {
                                    error.insertAfter(element.parent());
                                } else {
                                    error.insertAfter(element);
                                }
                            }
                        });

                        $('#bootstrap-wizard-1').bootstrapWizard({
                            'tabClass': 'form-wizard',
                            'onNext': function (tab, navigation, index) {
                                var $valid = $("#wizard-1").valid();
                                if (!$valid) {
                                    $validator.focusInvalid();
                                    return false;
                                } else {

                                    $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).addClass(
                                        'complete');
                                    $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).find('.step')
                                        .html('<i class="fa fa-check"></i>');
                                }
                            }
                        });
                    }
                });
            });
        </script>

    @endpush
@endsection