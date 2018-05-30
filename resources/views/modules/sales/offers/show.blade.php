@extends('layouts.master')
@section('content')
    <!-- widget grid -->
    <section id="show" v-cloak>
        <div class="col-lg-12 new-title">
            <div class="col-lg-8 col-sm-8">
                <h1><i class="fa fa-file-text-o"></i> <span class="semi-bold">{{$offer->descriptions}}</span></h1>

            </div>
            <div class="col-lg-4 col-sm-4">

                <div class="btn-group btn-group-justified pull-right option-menu">
                    <div class="btn-group ">
                        <a class="btn btn-default  dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span
                                    class="fa fa-reorder"></span> &nbsp;<span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route("sales.offers.form",[aid(),$offer->id,"update"])}}"><i
                                            class="fa fa-edit" aria-hidden="true"></i>
                                    DÜZENLE</a>
                            </li>
                            <li>
                                <a href="{{route("sales.offers.form",[aid(),$offer->id,"copy"])}}"><i class="fa fa-copy"
                                                                                                      aria-hidden="true"></i>
                                    KOPYASINI OLUŞTUR</a>
                            </li>
                            <li>
                                <a onclick="$(this).orderReturn()" data-id="0" id="orderReturn" href="#"><i
                                            class="fa fa-reply " aria-hidden="true"></i>
                                    SİPARİŞE DÖNÜŞTÜR</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"
                                                                                              aria-hidden="true"></i>
                                    SİL</a>
                            </li>

                        </ul>

                    </div>
                    <div class="btn-group">
                        <a class="btn btn-default  dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span
                                    class="fa fa-print"></span> YAZDIR <span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a target="_blank" href="http://demo.iyspro.com/salesmanager/sales-offer/8/print"><i
                                            class="fa fa-print" aria-hidden="true"></i>
                                    TEKLİFİ YAZDIR</a>
                            </li>
                            <li>
                                <a download="" href="http://demo.iyspro.com/salesmanager/sales-offer/8/printDown"
                                   id="waybillInfo"><i class="fa fa-print" aria-hidden="true"></i>
                                    TEKLİFİ İNDİR</a>
                            </li>

                        </ul>

                    </div>

                    <a href="#" data-toggle="modal" data-target="#remoteModal" class="btn btn-default"><i
                                class="fa fa-envelope"></i> Paylaş</a>

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
                                            href="{{route("sales.companies.show",[aid(),$offer->company["id"]])}}">{{$offer->company["company_name"] == null ? "Belirtilmedi":$offer->company["company_name"]}}</a>
                                </div>
                                <div class="col-sm-3" style="font-weight: 400;font-size:15px;"><i
                                            class="fa fa-calendar"></i> {{$offer->date}}</div>
                                <div class="col-sm-3" style="font-weight: 400;font-size:15px;"><i
                                            class="fa fa-calendar"></i> {{$offer->expired_date}}</div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive ">

                                        <table class="table table-hover table-condensed table-no-padding">

                                            <tbody>
                                            <tr>
                                                <th width="33%">HİZMET / ÜRÜN</th>
                                                <th width="14%">MİKTAR</th>
                                                <th width="10%" style="text-align:right">BİRİM F.</th>
                                                <th width="10%" style="text-align:right">KDV</th>
                                                <th width="10%" style="text-align:right">TOPLAM</th>
                                            </tr>

                                            </tbody>
                                            <tbody>

                                            <tr v-for="item in items">
                                                <td>
                                                    @{{ item.product }}
                                                </td>

                                                <td>@{{ item.quantity }} @{{ item.unit }}</td>
                                                <td style="text-align:right">@{{ item.price }} <i
                                                            class='fa fa-{{$offer->currency}}'></i></td>
                                                <td align="right">%@{{item.vat}}</td>
                                                <td style="text-align:right"> @{{ item.total }} <i
                                                            class="fa fa-{{$offer->currency}}"></i></td>
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
                                                        <div class="bottom-info">ARA TOPLAM</div>
                                                    </td>
                                                    <td style="text-align:right">
                                                        <div class="bottom-info">{{$offer->sub_total}} <i
                                                                    class="fa fa-{{$offer->currency}}"></i></div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="bottom-info">TOPLAM KDV</div>
                                                    </td>
                                                    <td style="text-align:right">
                                                        <div class="bottom-info">{{$offer->vat_total}} <i
                                                                    class="fa fa-{{$offer->currency}}"></i></div>
                                                    </td>
                                                </tr>
                                                <tr v-for="vato in vat_only" class="trow"
                                                    v-if="vato.total!=0">

                                                    <td style="border-top: 0px;">
                                                        <div class="bottom-info" style="font-size: 11px" >TOPLAM KDV @{{
                                                            vato.name }}
                                                        </div>
                                                    </td>
                                                    <td style="text-align:right">
                                                        <div class="bottom-info" style="font-size: 11px"><span
                                                                    id="total-vat-1">@{{ vato.total }}</span> <i
                                                                    class="fa fa-{{$offer->currency}}"></i></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="bottom-info">GENEL TOPLAM</div>
                                                    </td>
                                                    <td style="text-align:right">
                                                        <div class="bottom-info"
                                                             style="color:#2AC!important">{{$offer->grand_total}}
                                                            <i class="fa fa-{{$offer->currency}}"></i></div>
                                                    </td>
                                                </tr>
                                                @if($offer->currency != "try")
                                                    <tr>
                                                        <td>
                                                            <div class="bottom-info">TL KARŞILIĞI</div>
                                                        </td>
                                                        <td style="text-align:right">
                                                            <div class="bottom-info"
                                                                 style="color:#2AC!important">{{$offer->tl_convert}}
                                                                <i class="fa fa-try"></i></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                        </td>
                                                        <td style="text-align:right">
                                                            <div class="bottom-info" style="color:#2AC!important">1 <i
                                                                        class="fa fa-{{$offer->currency}}"></i>
                                                                = {{$offer->currency_value}} <i class="fa fa-try"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                    <div class="col-sm-4" style=";height: 600px;overflow: scroll;">

                        <div id="order_info" class="well">


                            <div id="short_info" class="col-12">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="bottom-info">TEKLİF TUTARI <span class="pull-right"
                                                                                     style="font-size:15px;color:#2AC!important">{{$offer->grand_total}}
                                                <i class="fa fa-{{$offer->currency}}"></i></span></div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div style="font-size:15px;" :class="status_color" class="bottom-info">
                                            @{{status_name}}
                                            <a href="#" @click="offer_status"><span
                                                        class="fa fa-edit " :class="status_color"></span> </a><span
                                                    class="pull-right " style="font-size:15px;">@{{status_effective_date}}</span>
                                        </div>
                                    </div>

                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-sm-12">
                                        TEKLİFTEN OLUŞTURULAN SİPARİŞLER
                                        <br>
                                        <a href="http://demo.iyspro.com/salesmanager/sales-orders/22"> SATIŞ SİPARİŞİ
                                            &nbsp;(#22)</a><br>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </article>
        </div>

        @include("components.external.delete_modal",[$title="Are you sure ?",$type = "deleteModal",$message="Are you sure delete sales offer ?",$id=$offer->id])


        {{-- Durum Modal--}}
        <div class="modal fade" id="statusModal" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true"
             style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-title" id="myModalLabel">DEĞİŞTİR</h4>
                    </div>
                    <div class="modal-body modal-body-content">
                        <form id="StatusForm">
                            <div class="row">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">DURUM</label>
                                        <div class="col-md-6 ">
                                            <div class="input-group">
                                                <select v-model="form.status" class="form-control">
                                                    <option v-for="statu in status" :value="statu.id">@{{statu.name}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <HR>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">EFEKTİF TARİH</label>
                                        <div class="col-md-4 ">
                                            <div class="input-group">
                                                <input type="text"
                                                       v-model="form.effective_date"
                                                       data-mask="99.99.9999"
                                                       name="form.effective_date"
                                                       value="{{$offer->effective_date}}"
                                                       class="form-control datepicker"
                                                       data-dateformat="dd.mm.yy">
                                                <span class="input-group-addon"><i
                                                            class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <hr>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">AÇIKLAMA</label>
                                        <div class="col-md-6 ">
                                            <div class="input-group">
                                                <textarea v-model="form.note" rows="3" cols="25"
                                                          class="form-control custom-scroll">{{$offer->note}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            VAZGEÇ
                        </button>
                        <button type="button" class="btn btn-primary" v-on:click="status_send">
                            KAYDET
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </section>

    @push('scripts')
        <script>
            window.addEventListener("load", () => {
                VueName = new Vue({
                    el: "#show",
                    data: {
                        status: [@foreach($offer->get_status as $statu) {
                            id: "{{$statu["id"]}}",
                            name: "{{$statu["name"]}}"
                        },  @endforeach],
                        form: {
                            status: "{{$offer->status}}",
                            note: "{{$offer->note}}",
                            effective_date: "{{$offer->effective_date}}"
                        },
                        items: [@foreach($offer->items as $item)
                        {
                            product: "{{$item->product->named["name"]}}",
                            quantity: "{{$item->quantity}}",
                            unit: "{{$item->unit["short_name"]}}",
                            price: "{{$item->price}} ",
                            vat: "{{$item->vat}}",
                            total: "{{$item->total}}"
                        },
                            @endforeach ],
                        status_color: "{{$offer->status_color}}",
                        status_name: "{{$offer->status_name}}",
                        status_effective_date: "{{$offer->effective_date}}",
                        vat_only: [
                            {name: "%1", total: 0},
                            {name: "%8", total: 0},
                            {name: "%18", total: 0},
                        ],
                    },
                    methods: {
                        offer_status: function () {
                            $("#statusModal").modal("show");
                        },
                        status_send: function () {
                            axios.post('{{route("sales.offers.status_send",[aid(),$offer->id])}}', this.form)
                                .then(function (response) {
                                    if (response.data.message == "success") {
                                        VueName.status_name = response.data.status_name;
                                        VueName.status_color = response.data.status_color;
                                        VueName.status_effective_date = response.data.status_effective_date;
                                        $("#statusModal").modal("hide");
                                    }
                                }).catch(function (error) {
                                notification("Error", error.response.data.message, "danger");

                            });
                        },
                        delete_data: function ($id) {
                            fullLoading();
                            axios.delete('{{route("sales.offers.destroy",[aid(),$offer->id])}}')
                                .then(function (response) {
                                    if (response.data.message == "success") {
                                        window.location.href = '{{route("sales.offers.index",aid())}}';
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