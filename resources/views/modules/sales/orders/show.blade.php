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

                                            <tr v-for="item in items">
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
                                <div class="row">
                                  @if($order->offer)
                                    <div class="col-sm-12">
                                       {{trans("general.offer")}}
                                        <br>
                                        <a href="{{route("sales.offers.show",[aid(),$order->offer["id"]])}}"> {{$order->offer["description"] == null ? "SATIŞ TEKLİFİ":$order->offer["description"]}} (#{{$order->offer["id"]}})</a><br>
                                    </div>
                                      @endif


                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </article>
        </div>

        @include("components.external.delete_modal",[$title="Are you sure ?",$type = "deleteModal",$message="Are you sure delete sales order ?",$id=$order->id])

    </section>

    {{--İrsaliye Yazdır--}}
    <div class="modal fade" id="waybillModal" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-title" id="myModalLabel">İrsaliye Yazdır</h4>
                </div>
                <div class="modal-body modal-body-content ">

                    <div class="wizard" data-initialize="wizard" id="myWizard">
                        <div class="steps-container">
                            <ul class="steps">
                                <li data-step="1" data-name="campaign" class="active">
                                    <span class="badge">1</span>Campaign
                                    <span class="chevron"></span>
                                </li>
                                <li data-step="2">
                                    <span class="badge">2</span>Recipients
                                    <span class="chevron"></span>
                                </li>
                                <li data-step="3" data-name="template">
                                    <span class="badge">3</span>Template
                                    <span class="chevron"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="actions">
                            <button type="button" class="btn btn-default btn-prev">
                                <span class="glyphicon glyphicon-arrow-left"></span>Prev</button>
                            <button type="button" class="btn btn-primary btn-next" data-last="Complete">Next
                                <span class="glyphicon glyphicon-arrow-right"></span>
                            </button>
                        </div>
                        <div class="step-content">
                            <div class="step-pane active sample-pane alert" data-step="1">
                                <h4>Setup Campaign</h4>
                                <p>Veggies es bonus vobis, proinde vos postulo essum magis kohlrabi welsh onion daikon amaranth tatsoi tomatillo melon azuki bean garlic. Beetroot water spinach okra water chestnut ricebean pea catsear courgette.</p>
                            </div>
                            <div class="step-pane sample-pane bg-info alert" data-step="2">
                                <h4>Choose Recipients</h4>
                                <p>Celery quandong swiss chard chicory earthnut pea potato. Salsify taro catsear garlic gram celery bitterleaf wattle seed collard greens nori. Grape wattle seed kombu beetroot horseradish carrot squash brussels sprout chard. </p>
                            </div>
                            <div class="step-pane sample-pane bg-danger alert" data-step="3">
                                <h4>Design Template</h4>
                                <p>Nori grape silver beet broccoli kombu beet greens fava bean potato quandong celery. Bunya nuts black-eyed pea prairie turnip leek lentil turnip greens parsnip. Sea lettuce lettuce water chestnut eggplant winter purslane fennel azuki bean earthnut pea sierra leone bologi leek soko chicory celtuce parsley jÃ­cama salsify. </p>
                            </div>
                        </div>


                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        VAZGEÇ
                    </button>
                    <button type="button" class="btn btn-primary" >
                        KAYDET
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--İrsaliye Yazdır--}}

    @include("components.external.transaction",[$type="collect",$local="sales_orders",$detail = $order,$abble="App\\\Model\\\Sales\\\SalesOrders"])

    @include("components.external.share",[
    $title="Sipariş",
    $thread="Satış Siparişi : ".$order->company["company_name"],
    $message="Merhaba,<br>Satış Siparişi detaylarınız ektedir indirerek inceleyebilirsiniz.<br>İyi çalışmalar.<br><br><b>".account()["name"]."</b>",
    $type="share.order",
    $data = $order])

@push("style")
    <link rel="stylesheet" href="//www.fuelcdn.com/fuelux/3.13.0/css/fuelux.min.css">
    @endpush
    @push('scripts')

        <script src="//www.fuelcdn.com/fuelux/3.13.0/js/fuelux.min.js"></script>
        <script>
            window.addEventListener("load", () => {

                $('#myWizard').on('actionclicked.fu.wizard', function (evt, data) {
                    // do something
                });


                VueName = new Vue({
                    el: "#show",
                    data: {

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
                    },
                    methods: {

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

                    }
                });
            });
        </script>

    @endpush
@endsection