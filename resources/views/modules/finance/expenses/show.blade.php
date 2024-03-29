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
    <section id="show" class="">
        <div class="row">
            <div class="col-sm-8">
                <div class="well">
                    <h1>
                        <span class="semi-bold">{{$account->name}}</span> <span class="pull-right">
                            <a class="btn btn-default"
                               href="{{route("finance.accounts.form",[aid(),$account->id,$account->type,"update"])}}">{{trans("word.edit")}}
					</a>
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><span
                                        class="caret"></span></a>
                        <ul class="dropdown-menu">

                        </ul>
                        </span>
                    </h1>

                    <hr>

                    <div class="row">
                        <div class="col-12" v-show="!details">
                            <div class="col-sm-5 info-title"><i
                                        class="fa fa-{{strtolower($account->cur_info["code"] == "TRL" ? "TRY":$account->cur_info["code"])}}"></i>{{ $account->cur_info["code"]}}
                                ,{{$account->type_name}}
                            </div>

                            @if($account->type != 1)
                                <div class="col-sm-5">
                                    <div class="info-title"><i class="fa fa-hashtag"
                                                               aria-hidden="true"></i> {{$account->bank_iban}}</div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="info-title"><span v-on:click="details = !details" class="pull-right"
                                                                  style="cursor: pointer;">{{trans("sentence.all_informations")}}</span></div>
                                </div>
                            @endif
                            <br>
                        </div>

                        @if($account->type != 1)
                            <div style="" v-show="details" class="col-12">
                                <div class="col-sm-9">

                                    <table class="table table-condensed table-striped table-no-padding" width="100%"
                                           border="0">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="info-title"><i class="fa fa-bank" aria-hidden="true"></i>
                                                            {{trans("sentence.bank_and_branches")}}
                                                </div>
                                            </td>
                                            <td>{{$account->bank_name }} {{$account->bank_branch}}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="info-title"><i class="fa fa-exchange"
                                                                           aria-hidden="true"></i>
                                                    {{trans("sentence.currency_type")}}
                                                </div>
                                            </td>
                                            <td> {{$account->cur_info["code"]}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="info-title"><i class="fa fa-hashtag" aria-hidden="true"></i>
                                                    {{trans("sentence.account_number")}}
                                                </div>
                                            </td>
                                            <td>{{$account->bank_no}}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="info-title"><i class="fa fa-hashtag" aria-hidden="true"></i>
                                                    {{trans("word.iban_number")}}
                                                </div>
                                            </td>
                                            <td>{{$account->bank_iban}}</td>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>
                                <div class="col-sm-3">
                                    <div class="info-title">
                                        <span v-on:click="details = !details" class="pull-right" style="cursor: pointer;">
                                            {{trans("sentence.return_summary_informations")}}
                                        </span>
                                    </div>
                                </div>
                        </div>
                        @endif
                        <br>
                    </div>

                    <div class="row">
                        <div class="table-responsive table-condensed table-hover " style="font-size: 11px;">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th width="20%">{{trans("word.type")}}</th>
                                    <th width="20%">{{trans("word.date")}}</th>
                                    <th style="text-align:right" width="10%">{{trans("word.customer")}}/{{trans("word.supplier")}}</th>
                                    <th style="text-align:right" width="15%">{{trans("word.description")}}</th>
                                    <th style="text-align:right" width="20%">{{trans("word.sum")}}</th>
                                    <th style="text-align:right" width="20%">{{trans("word.balance")}}</th>
                                </tr>
                                </tbody>
                                <tbody id="tablo">
                                <tr v-for="item in itemsReverse">
                                    <td>
                                        @{{ item.type }}
                                    </td>
                                    <td>@{{ item.date }}</td>
                                    <td>@{{ item.contact }} </td>
                                    <td align="right">@{{ item.description }}</td>
                                    <td align="right">
                                        @{{ item.action_type }} @{{ item.amount }} <i
                                                class="fa fa-{{strtolower($account->cur_info["code"] == "TRL" ? "try":$account->cur_info["code"])}}"></i>
                                    </td>
                                    <td align="right">
                                        @{{ item.last_balance }} <i
                                                class="fa fa-{{strtolower($account->cur_info["code"] == "TRL" ? "try":$account->cur_info["code"])}}"></i>
                                    </td>
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
                            <div v-if="{{count($accounts)}} > 0" class="row">
                                <div class="col-sm-12">
                                    <button v-on:click="other_transfer" type="button"
                                            class="btn  btn-block bg-color-blueDark txt-color-white ">
                                        {{trans("sentence.transfer_to_other_account")}}
                                    </button>

                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="btn-group btn-block">
                                        <button class="btn btn-block bg-color-blueDark txt-color-white dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                            {{trans("sentence.add_money_input")}}<span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" style="min-width:293px;text-align:center;font-size:15px;">
                                            <li>
                                                <a href="javascript:void(0);" v-on:click="money_in"><i
                                                            class="fa fa-sign-in fa-rotate-90"></i> {{trans("sentence.add_money_input")}} </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" v-on:click="money_out">
                                                    <i class="fa fa-sign-out fa-rotate-270"></i>
                                                    {{trans("sentence.add_money_input")}}
                                                </a>
                                            </li>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-block bg-color-blueLight txt-color-white">
                                        {{trans("sentence.other_account_transactions")}}
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div v-show="other_transfer_show">
                            <form @submit.prevent="money_in_send(3)" class="form-horizontal bv-form"
                                  novalidate="novalidate">
                                <h1><i class="fa fa-1x c-textLight fa-share-square-o"></i> <span class="semi-bold">{{trans("sentence.transfer_to_account")}}</span>
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
                                            <span>{{trans("word.sum")}}</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">
                                                <money v-model="money_form.amount"
                                                       v-bind="money"
                                                       class="form-control " :value="0"></money>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>{{trans("word.description")}}</span>
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
                                        {{trans("word.cancel")}}
                                    </button>

                                    <button type="submit" :disabled="money_form.amount == 0 || money_form.bank_account_id == '' " class="btn btn btn-danger pull-right" >
                                        {{trans("word.transfer")}}
                                    </button>
                                    <br><br>
                                </footer>
                            </form>

                        </div>

                        <div v-show="money_in_show">
                            <form class="form-horizontal bv-form" novalidate="novalidate"
                                  @submit.prevent="money_in_send(1)">
                                <h1><i class="fa fa-sign-in fa-rotate-90"></i> <span class="semi-bold">{{trans("sentence.money_input")}}</span></h1>
                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>{{trans("word.date")}}</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group">
                                                <input type="text" v-model="money_form.date"
                                                       class="form-control  datepicker " data-mask="99.99.9999"
                                                       data-dateformat="dd.mm.yy">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>{{trans("word.sum")}}</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">
                                                <money v-model="money_form.amount"
                                                       v-bind="money"
                                                       class="form-control " :value="1"></money>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>{{trans("word.description")}}</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">
                                                <input type="text" v-model="money_form.description"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <footer>
                                    <button type="button" v-on:click="cancel" class="btn pull-left backAccountDetail">
                                        {{trans("word.cancel")}}
                                    </button>

                                    <button type="submit" class="btn btn btn-danger pull-right"
                                            :disabled="money_form.amount == 0">
                                        {{trans("word.add")}}
                                    </button>
                                    <br><br>
                                </footer>
                            </form>

                        </div>

                        <div v-show="money_out_show">
                            <form @submit.prevent="money_in_send(0)" class="form-horizontal bv-form"
                                  novalidate="novalidate">
                                <h1>
                                    <i class="fa fa-sign-out fa-rotate-270"></i>
                                    <span class="semi-bold">
                                        {{trans("sentence.money_out")}}
                                    </span>
                                </h1>

                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>{{trans("word.date")}}</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group">
                                                <input type="text" v-model="money_form.date"
                                                       class="form-control  datepicker " data-mask="99.99.9999"
                                                       data-dateformat="dd.mm.yy" id="dp1526983556332">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>{{trans("word.sum")}}</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">
                                                <money v-model="money_form.amount"
                                                       v-bind="money"
                                                       class="form-control " :value="0"></money>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <span>{{trans("word.description")}}</span>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">
                                                <input type="text" v-model="money_form.description"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <footer>
                                    <button type="button" v-on:click="cancel" class="btn pull-left ">
                                        {{trans("word.cancel")}}
                                    </button>

                                    <button type="submit" class="btn btn btn-danger pull-right"
                                            :disabled="money_form.amount == 0">
                                        {{trans("word.add")}}
                                    </button>
                                    <br><br>
                                </footer>
                            </form>

                        </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <span style="color:gray;font-weight: 600;">{{trans("word.balance")}} <span style="font-size:15px;"
                                                                                            class="pull pull-right">@{{ balance }}  <i
                                                    class="fa fa-{{strtolower($account->cur_info["code"] == "TRL" ? "try":$account->cur_info["code"])}}"></i></span></span>
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
                    balance: "{{$account->balance}}",
                    money: {
                        decimal: ',',
                        thousands: '.',
                        precision: 2,
                        masked: false
                    },
                    details: false,
                    money_in_show: false,
                    money_out_show: false,
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
                    this.actions();
                },
                methods: {
                    delete_data: function ($id) {
                        fullLoading();
                        axios.delete('{{route("stock.movements.destroy",[aid(),$account->id])}}')
                            .then(function (response) {
                                if (response.data.message == "success") {
                                    window.location.href = '{{route("stock.movements.index",aid())}}';
                                }
                            }).catch(function (error) {
                            notification("Error", error.response.data.message, "danger");
                            fullLoadingClose();
                        });
                    },
                    money_in: function () {

                        this.money_in_show = true;
                        this.transfer_info = false;
                        datePicker();
                    },
                    money_out: function () {
                        this.money_out_show = true;
                        this.transfer_info = false;
                    },
                    other_transfer: function () {
                        this.transfer_info = false;
                        this.other_transfer_show = true
                    },
                    cancel: function () {
                        this.money_out_show = false;
                        this.money_in_show = false;
                        this.other_transfer_show = false;
                        this.transfer_info = true;

                        this.money_form.bank_account_id = '';
                        this.money_form.amount = 0;
                        this.money_form.date = "{{date_tr()}}";
                        this.money_form.description = "";

                    },
                    money_in_send: function ($type) {
                        fullLoading();
                        this.money_form.type = $type;
                        axios.post("{{route("finance.accounts.transaction",[aid(),$account->id])}}", this.money_form).then(response => {

                            this.actions();
                            this.cancel();
                            this.balance = response.data.balance;
                            fullLoadingClose();
                            notification("Success", "Money was entered")
                        })
                    },
                    actions: function () {
                        axios.post("{{route("finance.accounts.items",[aid(),$account->id])}}").then(response => {
                            this.account_items = response.data;
                        });
                    }

                }
            });

            });
        </script>

    @endpush
@endsection