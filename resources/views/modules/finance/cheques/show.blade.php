@extends('layouts.master')
@section('content')
    <style>
        .table thead tr th, .table tbody tr td {
            border: none;

        }

        .info-title {
            font-family: "Roboto Condensed", "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 13px;
            font-weight: 600;
            color: #999593;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
    <!-- widget grid -->
    <section id="show"  v-cloak>
        <div class="row">
            <div class="col-sm-8">
                <div class="well">

                    <h1><i style="vertical-align: -7px;" class="fa fa-sign-in fa-rotate-90 fa-2x "></i> <span
                                class="semi-bold"> {{$cheq->status_text}}</span>
                    </h1>

                    <hr>
                    <div class="row">

                        <div class="col-12">
                            <div class="col-sm-5" style="font-weight: 400;font-size:15px;">
                                @if($cheq->cheque_status == 1)
                                <i class="fa fa-calendar"></i> {{trans("sentence.received_date")}}, {{trans("word.customer")}}<br>
                                @elseif($cheq->cheque_status == 0)
                                    <i class="fa fa-calendar"></i> {{trans("sentence.given_date")}}, {{trans("word.supplier")}}<br>
                                @elseif($cheq->cheque_status == 2)
                                    <i class="fa fa-calendar"></i> {{trans("sentence.received_date")}}, {{trans("word.customer")}}<br>
                                    <i class="fa fa-calendar"></i> {{trans("sentence.given_date")}}, {{trans("word.supplier")}}<br>
                                    <i class="fa fa-calendar"></i> {{trans("sentence.given_date")}}, {{trans("word.supplier")}}<br>
                                @endif
                                <i class="fa fa-calendar"></i> {{trans("sentence.due_date")}}<br>
                                    @if($cheq->bank_name != null)   <i class="fa fa-calendar"></i> BANKA ADI<br>@endif
                                    @if($cheq->bank_branch != null)  <i class="fa fa-calendar"></i> ŞUBE<br>@endif
                                    @if($cheq->document_no != null)  <i class="fa fa-calendar"></i> EVRAK NO<br>@endif
                                    @if($cheq->seri_no != null) <i class="fa fa-calendar"></i> SERİ NO<br>@endif
                                    @if($cheq->ciro_names != null)  <i class="fa fa-calendar"></i> CİRO<br>@endif
                                    @if($cheq->description != null) <i class="fa fa-calendar"></i> AÇIKLAMA<br>@endif
                                <div v-if="collect_cheque_show == true"><i class="fa fa-calendar"></i> {{ trans('sentence.collected_account') }} <br></div>
                            </div>


                            <div class="col-sm-6" style="font-weight: 400;font-size:15px;">
                                @if($cheq->cheque_status == 1)
                                    {{$cheq->date}}, <a
                                            href="{{route("sales.companies.show",[aid(),$cheq->company["id"]])}}"> {{short($cheq->company["company_name"],25)}}</a>
                                    <br>
                                @elseif($cheq->cheque_status == 0)
                                    {{$cheq->date}}, <a
                                            href="{{route("sales.companies.show",[aid(),$cheq->transfer_company["id"]])}}"> {{short($cheq->transfer_company["company_name"],25)}}</a>
                                    <br>
                                @elseif($cheq->cheque_status == 2)
                                    <a
                                            href="{{route("sales.companies.show",[aid(),$cheq->company["id"]])}}"> {{short($cheq->company["company_name"],25)}}</a>
                                    <br>
                                    {{$cheq->date}}, <a
                                            href="{{route("sales.companies.show",[aid(),$cheq->transfer_company["id"]])}}"> {{short($cheq->transfer_company["company_name"])}}</a>
                                    <br>
                                @endif



                                {{$cheq->payment_date}}<br>
                                    @if($cheq->bank_name != null) {{$cheq->bank_name}}  <br>@endif
                                    @if($cheq->bank_branch != null)  {{$cheq->bank_branch}} <br>@endif
                                    @if($cheq->document_no != null) {{$cheq->document_no}}   <br>@endif
                                    @if($cheq->seri_no != null) {{$cheq->seri_no}}  <br>@endif
                                    @if($cheq->ciro_names != null) {{$cheq->ciro_names}}  <br>@endif
                                    @if($cheq->description != null) {{$cheq->description}} <br>@endif
                                <div v-if="collect_cheque_show == true"> <div v-html="bank_name"></div><br></div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="table-responsive table-condensed table-hover " >
                            <table class="table table-hover">
                                <tfoot>
                                <tr>
                                    <td width="5%"></td>
                                    <td></td>
                                    <td style="text-align:right" >{{ trans('word.remaining') }}</td>
                                    <td><span class="pull-right">{{$cheq->remaining}} <i class="fa fa-try"></i></span></td>
                                </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                    <th width="20%">{{trans("sentence.processed_invoice")}}</th>
                                    <th width="20%">{{trans("word.status")}}</th>
                                    <th style="text-align:right" width="10%">{{trans("word.sum")}}</th>
                                    <th style="text-align:right" width="15%">{{trans("sentence.transacted_sum")}}</th>
                                </tr>
                                </tbody>
                                <tbody id="tablo" style="font-size: 11px;">
                                <tr v-for="item in orders" style="cursor:pointer" v-on:click="redirect(item.id,item.type)">
                                    <td>
                                        @{{ item.desc }}
                                    </td>
                                    <td>@{{ item.status }}</td>
                                    <td style="text-align:right">@{{ item.grand_total }} </td>
                                    <td align="right">@{{ item.process_amount }}</td>

                                </tr>
                                </tbody>

                            </table>


                        </div>
                    </div>

                </div>


            </div>
            <div class="col-sm-4" style=";height: 500px;overflow: scroll;">

                <div id="order_info" class="well">
                    <div id="short_info" class="col-12">

                        <div v-show="transfer_info">
                            <div class="row" v-if="collect_button == true">
                                @if($cheq->show_button  == "alinan0")
                                <div class="col-sm-12">
                                    <button v-on:click="other_transfer" type="button"
                                            class="btn  btn-block bg-color-blue txt-color-white ">
                                        {{trans("sentence.add_collection")}}
                                    </button>

                                </div>
                            </div><br>
                            @elseif($cheq->show_button == "verilen0")
                                <div class="col-sm-12">
                                    <button v-on:click="other_transfer" type="button"
                                            class="btn  btn-block bg-color-blue txt-color-white ">
                                        {{ trans('sentence.add_payment') }}
                                    </button>

                                </div>
                        </div><br>
                                @endif

                        </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-block bg-color-red txt-color-white">
                                {{trans("sentence.delete_cheque")}}
                            </button>
                        </div>
                    </div>
                        <div v-show="other_transfer_show">
                            <form @submit.prevent="cheuqe_collection_send" class="form-horizontal bv-form"
                                  novalidate="novalidate">
                                <h1>
                                    <i class="fa fa-1x c-textLight fa-share-square-o"></i>
                                    <span class="semi-bold">{{trans("sentence.cheque_collection")}} </span>
                                </h1>

                                <input type="hidden" value="4" name="thisAccId">
                                <fieldset>
                                    <div class="form-group "  :class="{'has-error': errors.has('money_form.bank_account_id') }">
                                        <label class="col-sm-4 control-label">
                                            <span>{{trans("word.account")}}</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">
                                                <select  v-validate="'required'" class="form-control" v-model="money_form.bank_account_id"
                                                        data-bv-field="color">
                                                    <option v-for="account in accounts" :disabled="account.id == ''" :value="account.id">@{{
                                                        account.name }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>{{trans("word.date")}}</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group">
                                                <input type="text" v-model="money_form.date" name="money_form.date" class="form-control  datepicker "
                                                       data-mask="99.99.9999" data-dateformat="dd.mm.yy">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <footer>
                                    <button type="button" v-on:click="cancel" class="btn pull-left ">
                                        {{trans("word.cancel")}}
                                    </button>

                                    <button type="submit" :disabled="money_form.bank_account_id == '' " class="btn btn btn-danger pull-right" >
                                        {{trans("word.save")}}
                                    </button>
                                    <br>
                                </footer>
                            </form>

                        </div>


                            <hr>
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="bottom-info">
                                    {{trans("word.status")}}
                                    <span class="pull-right" style="font-size:15px;color:#7a7c71!important">
                                        @{{ collect_statu }}
                                    </span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="bottom-info">
                                    {{trans("sentence.total_cheque")}}
                                    <span class="pull-right" style="font-size:15px;color:#2AC!important">
                                    {{$cheq->amount}}
                                        <i class="fa fa-try"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        </div>


        @include("components.external.delete_modal",[$title=trans('sentence.are_you_sure'),$type = "deleteModal",$message=trans('sentence.are_you_sure_delete_cheque'),$id=$cheq->id])


    </section>

    @push('scripts')
        <script>

            window.addEventListener("load", function(event) {

         VueName =   new Vue({
                el: "#show",
                data: {
                    collect_cheque_show:"{{$cheq->collect_statu == 1 ? true:false}}",
                    bank_name:"{{$cheq->collect_statu == 1 ? $cheq->collect->bank_account["name"]:false}}",
                    collect_statu:"{{$cheq->collect_status_text}}",
                    collect_button:"{{$cheq->collect_statu == 1 ? false:true}}",
                    orders:[],
                    balance: "",
                    money: {
                        decimal: ',',
                        thousands: '.',
                        precision: 2,
                        masked: false
                    },
                    details: false,
                    other_transfer_show: false,
                    transfer_info: true,
                    account_items: [],
                    accounts: [{name:"Hesap Seçin",id:""}, @foreach($accounts as $acc) {name: "{{$acc->name}}", id: "{{$acc->id}}"},@endforeach],
                    money_form: {
                        date: "{{date_tr()}}",
                        bank_account_id:"",
                        cheque_money_type:"{{$cheq->cheque_status == 0 ? 0:1}}",
                        cheque_id:"{{$cheq->id}}",
                        type:"cheque_collect",
                    },

                },
                mounted() {
                    datePicker();

                    this.orders.push(
                                @foreach($cheq->orders as $order){
                            id:"{{$order->id}}",
                            type:"sales",
                            desc: "Satış Siparişi",
                            status:"{{$order->status}}",
                            grand_total:"{{$order->grand_total}}",
                            process_amount:"{{get_money($order->pivot->amount)}}"
                        },
                            @endforeach()
                                @foreach($cheq->porders as $order){
                            id: "{{$order->id}}",
                            type: "purchases",
                            desc: "Satın Alma Siparişi",
                            status: "{{$order->status}}",
                            grand_total: "{{$order->grand_total}}",
                            process_amount: "{{get_money($order->pivot->amount)}}"
                        },
                            @endforeach()


                    );
                },
                methods: {
                    cheuqe_collection_send:function(){
                        console.log(VueName.money_form);
                        this.$validator.validate().then((result) => {
                            if (result) {

                                axios.post("{{route("finance.accounts.cheque",aid())}}",VueName.money_form).then(function(res){
                                   VueName.bank_name = res.data.bank_name
                                   VueName.collect_button = false;
                                   VueName.collect_statu = "{{$cheq->cheque_status == 0 ? "ÖDEME YAPILDI":"TAHSİL EDİLDİ"}}";
                                    VueName.collect_cheque_show = true;
                                    VueName.cancel();
                                })




                            }});
                    },
                    redirect:function($id,type){
                      return window.location.href='/{{aid()}}/'+type+'/orders/'+$id+'/show';
                    },
                    delete_data: function ($id) {
                        fullLoading();
                        axios.delete('{{route("finance.cheques.destroy",[aid(),$cheq->id])}}')
                            .then(function (response) {
                                if (response.data.message == "success") {
                                    window.location.href = '{{route("finance.cheques.index",aid())}}';
                                }
                            }).catch(function (error) {
                            notification("Error", error.response.data.message, "danger");
                            fullLoadingClose();
                        });
                    },

                    other_transfer: function () {
                        this.transfer_info = false;
                        this.other_transfer_show = true
                    },
                    cancel: function () {

                        this.other_transfer_show = false;
                        this.transfer_info = true;

                        this.money_form.bank_account_id = '';
                        this.money_form.amount = 0;
                        this.money_form.date = "{{date_tr()}}";
                        this.money_form.description = "";

                    },

                }
            });

            });
        </script>

    @endpush
@endsection