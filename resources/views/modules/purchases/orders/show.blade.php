@extends('layouts.master')
@section('content')
    <!-- widget grid -->
    <section id="show" v-cloak>
        <div class="col-lg-12 new-title">
            <div class="col-lg-8 col-sm-8">
                <h1>
                    <i class="fa fa-file-text-o"></i>
                    <span class="semi-bold">{{$order->descriptions}}</span>
                    @if($order->tags->count() != 0)
                        <span class="pull-right">@foreach($order->tags as $tag) <span  class="badge" style="background-color:{{$tag->bg_color}}">{{$tag->title}}</span>@endforeach</span>
                    @endif
                </h1>
            </div>
            <div class="col-lg-4 col-sm-4">

                <div class="btn-group btn-group-justified pull-right option-menu">
                    <div class="btn-group ">
                        <a class="btn btn-default  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span  class="fa fa-reorder"></span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route("purchases.orders.form",[aid(),$order->id,"update"])}}">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                    {{trans("word.edit")}}
                                </a>
                            </li>
                            <li>
                                <a href="#!" v-if="remaining !='0,00'"  data-toggle="modal" data-target="#transaction_payment">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                    {{trans("sentence.add_payment")}}</a>
                            </li>
                            <li>
                                <a href="{{route("purchases.orders.form",[aid(),$order->id,"copy"])}}"><i class="fa fa-copy"
                                                                                                      aria-hidden="true"></i>
                                    {{trans("sentence.create_copy")}}</a>
                            </li>

                            <li class="divider"></li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"
                                                                                              aria-hidden="true"></i>
                                    {{trans("word.delete")}}</a>
                            </li>

                        </ul>

                    </div>
                    <div class="btn-group">
                        <a class="btn btn-default  dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span
                                    class="fa fa-print"></span> {{trans("word.print")}} <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a target="_blank" href="http://demo.iyspro.com/salesmanager/sales-offer/8/print"><i
                                            class="fa fa-print" aria-hidden="true"></i>
                                    {{trans("sentence.print_offer")}}</a>
                            </li>
                            <li>
                                <a download="" href="http://demo.iyspro.com/salesmanager/sales-offer/8/printDown"
                                   id="waybillInfo"><i class="fa fa-print" aria-hidden="true"></i>
                                    {{trans("sentence.download_offer")}}</a>
                            </li>

                        </ul>

                    </div>

                    <a href="#" data-toggle="modal" data-target="#remoteModal" class="btn btn-default"><i
                                class="fa fa-envelope"></i> {{trans("word.share")}}</a>

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
                                                <th width="33%">{{trans("word.service")}} / {{trans("word.product")}}</th>
                                                <th width="14%">{{trans("word.quantity")}}</th>
                                                <th width="10%" style="text-align:right">{{trans("word.unit")}} F.</th>
                                                <th width="10%" style="text-align:right">{{trans("word.vat")}}</th>
                                                <th width="10%" style="text-align:right">{{trans("word.total")}}</th>
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
                                                        <div class="bottom-info">{{trans("sentence.sub_total")}}</div>
                                                    </td>
                                                    <td style="text-align:right">
                                                        <div class="bottom-info">{{$order->sub_total}} <i
                                                                    class="fa fa-{{$order->currency}}"></i></div>
                                                    </td>
                                                </tr>


                                                <tr v-for="vato in vat_only" class="trow"
                                                    v-if="vato.total!=0">

                                                    <td style="border-top: 0px;">
                                                        <div class="bottom-info" style="font-size: 11px" >{{trans("sentence.total_vat")}} @{{
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
                                                        <div class="bottom-info">{{trans("word.total")}} KDV</div>
                                                    </td>
                                                    <td style="text-align:right">
                                                        <div class="bottom-info">{{$order->vat_total}} <i
                                                                    class="fa fa-{{$order->currency}}"></i></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="bottom-info">{{trans("sentence.general_total")}}</div>
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
                                                            <div class="bottom-info">
                                                                {{ trans("sentence.provision_for_tl") }}
                                                            </div>
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
                                                    <td>{{trans("word.remaining")}}</td>
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
                                        <div class="bottom-info">{{trans("sentence.order_amount")}}<span class="pull-right"
                                                                                   style="font-size:15px;color:#2AC!important">{{$order->grand_total}}
                                                <i class="fa fa-{{$order->currency}}"></i></span></div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="bottom-info">{{trans("sentence.remaining_amount")}}<span class="pull-right"
                                                                                     style="font-size:15px;color:#2AC!important">@{{ remaining }}
                                                <i class="fa fa-{{$order->currency}}"></i></span></div>
                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>

                </div>


            </article>
        </div>

        @include("components.external.delete_modal",[$title=trans('sentence.are_you_sure'),$type = "deleteModal",$message=trans('sentence.are_you_sure_delete_purchase_order'),$id=$order->id])

    </section>
    @include("components.external.transaction_payment",[$type="payment",$local="purchase_orders",$detail = $order,$abble="App\\\Model\\\Purchases\\\PurchaseOrders"])

    @push('scripts')
        <script>
            window.addEventListener("load", () => {
                VueName = new Vue({
                    el: "#show",
                    data: {

                        remaining:"{{$order->remaining}}",
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
                                bank_account:'VERİLEN ÇEK',
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
                            axios.delete('{{route("purchases.orders.destroy",[aid(),$order->id])}}')
                                .then(function (response) {
                                    if (response.data.message == "success") {
                                        window.location.href = '{{route("purchases.orders.index",aid())}}';
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