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

                        <h1><i style="vertical-align: -7px;" class="fa fa-sign-in fa-rotate-90 fa-2x "></i> <span class="semi-bold">Alınan  Çek</span>
                    </h1>

                    <hr>
                    <div class="row">

                        <div class="col-12">
                            <div class="col-sm-5" style="font-weight: 400;font-size:15px;">
                                <i class="fa fa-calendar"></i> ALINDIĞI TARİH, MÜŞTERİ<br><br>
                                <i class="fa fa-calendar"></i> VADE TARİHİ<br><br>
                            </div>


                            <div class="col-sm-6">
                                <div>{{$cheq->date}}, <a href="{{route("sales.companies.show",[aid(),$cheq->company["id"]])}}"> {{$cheq->company["company_name"]}}</a></div><br><br>
                                <div>{{$cheq->payment_date}}</div><br><br>
                            </div>

                        </div>
                    </div>


                </div>


            </div>
            <div class="col-sm-4" style=";height: 500px;overflow: scroll;">

                <div id="order_info" class="well">
                    <div id="short_info" class="col-12">

                        <div v-show="transfer_info">
                            <div class="row">
                                <div class="col-sm-12">
                                    <button v-on:click="other_transfer" type="button"
                                            class="btn  btn-block bg-color-blue txt-color-white ">
                                        TAHSİL ET
                                    </button>

                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-block bg-color-red txt-color-white">
                                       ÇEKİ SİL
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div v-show="other_transfer_show">
                            <form @submit.prevent="money_in_send(3)" class="form-horizontal bv-form"
                                  novalidate="novalidate">
                                <h1><i class="fa fa-1x c-textLight fa-share-square-o"></i> <span class="semi-bold">ÇEK TAHSİLATI</span>
                                </h1>

                                <input type="hidden" value="4" name="thisAccId">
                                <fieldset>
                                    <div class="form-group "  :class="{'has-error': errors.has('money_form.bank_account_id') }">
                                        <label class="col-sm-4 control-label">
                                            <span>HESAP</span>
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
                                            <span>TARİH</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group">
                                                <input type="text" v-model="money_form.date" class="form-control  datepicker "
                                                       data-mask="99.99.9999" data-dateformat="dd.mm.yy">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>



                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>AÇIKLAMA</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">
                                                <input type="text" v-model="money_form.description" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <footer>
                                    <button type="button" v-on:click="cancel" class="btn pull-left ">
                                        VAZGEÇ
                                    </button>

                                    <button type="submit" :disabled="money_form.amount == 0 || money_form.bank_account_id == '' " class="btn btn btn-danger pull-right" >
                                        TRANSFER ET
                                    </button>
                                    <br><br>
                                </footer>
                            </form>

                        </div>


                            <hr>
                        <div class="row">

                            <div class="col-sm-12">
                                <h7>DURUMU <span class="pull-right" style="font-size:15px;color:#7a7c71!important">
                                                                                Tahsil Edilecek

                                    </span></h7>
                            </div>
                            <div class="col-sm-12">
                                <h7>ÇEK TOPLAMI <span class="pull-right" style="font-size:15px;color:#2AC!important">
                                    {{$cheq->amount}}   <i class="fa fa-try"></i></span></h7>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        </div>



    </section>

    @push('scripts')
        <script>

            window.addEventListener("load", function(event) {

            new Vue({
                el: "#show",
                data: {
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
                        amount: "",
                        bank_account_id:"",
                        description: "",
                        type: ""
                    },

                },
                computed: {
                    itemsReverse() {
                        return this.account_items.reverse()
                    }
                },
                mounted() {
                    datePicker();

                },
                methods: {
                    delete_data: function ($id) {
                        fullLoading();
                        axios.delete('{{route("stock.movements.destroy",[aid(),0])}}')
                            .then(function (response) {
                                if (response.data.message == "success") {
                                    window.location.href = '{{route("stock.movements.index",aid())}}';
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
                    {{--money_in_send: function ($type) {--}}
                        {{--fullLoading();--}}
                        {{--this.money_form.type = $type;--}}
                        {{--axios.post("{{route("finance.accounts.transaction",[aid(),0])}}", this.money_form).then(response => {--}}

                            {{--this.actions();--}}
                            {{--this.cancel();--}}
                            {{--this.balance = response.data.balance;--}}

                            {{--notification("Success", "Money was entered","success")--}}
                            {{--fullLoadingClose();--}}
                        {{--})--}}
                    {{--}--}}

                }
            });

            });
        </script>

    @endpush
@endsection