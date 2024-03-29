<div class="modal fade" v-if="VueName.remaining !='0,00'" id="transaction" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">{{ $type == 'payment' ? trans('sentence.add_payment') : trans('sentence.add_collection') }}</h4>
            </div>
            <div class="modal-body" id="vue-trans">
                <div v-show="loading" style="text-align: center;"><img
                            src="https://loading.io/spinners/pies/lg.pie-chart-loading-gif.gif"></div>
                <div v-show="!loading" class="row">

                    <div id="collectError"></div>
                    <ul id="myTab1" style="display:flex;text-align:center"
                        class="nav nav-tabs flex-wrap">
                        <li class="active" style="text-align: center;flex:1;">
                            <a href="#s1" data-toggle="tab"
                               aria-expanded="false">{{ trans("word.cash") }} {{ $type == 'payment' ? trans('word.payment') : trans('word.collection') }}
                            </a>
                        </li>

                        @if(strtoupper($detail->currency) == "TRY")
                        <li style="text-align: center;flex:1;">
                            <a href="#s2" data-toggle="tab"
                               aria-expanded="true">{{ trans("sentence.cheque_promissory_note") }} {{ $type == 'payment' ? trans('word.payment') : trans('word.collection') }}</a>
                        </li>
                        @endif
                        @if($local!="sales_orders")
                            <li style="text-align: center;flex:1;">
                                <a href="#s2" data-toggle="tab"
                                   aria-expanded="true">{{ trans("sentence.cheque_promissory_note") }} {{ $type == 'payment' ? trans('word.payment') : trans('word.collection') }}</a>
                            </li>
                        @endif


                    </ul>

                    <div id="myTabContent1" class="tab-content padding-10 ">
                        <div class="tab-pane fade active in" id="s1">
                            <form class="form-horizontal bv-form"
                                  novalidate="novalidate">
                                <button type="submit" class="bv-hidden-submit"
                                        style="display: none; width: 0px; height: 0px;"></button>
                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <div class="bottom-info">{{ trans("word.date") }}</div>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group">
                                                <input type="text" v-model="collection.form.date"
                                                       name="collection.form.date"
                                                       class="form-control datepicker"
                                                       data-dateformat="dd.mm.yy">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group"
                                         :class="{'has-error':errors.has('collection.form.bank_account_id')}">
                                        <label class="col-sm-4 control-label">
                                            <div class="bottom-info">{{ trans("word.account") }}</div>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">

                                                <select v-model="collection.form.bank_account_id"
                                                        v-validate="'required'" name="collection.form.bank_account_id"
                                                        class="form-control"
                                                        name="AccId">

                                                    <option v-for="(acc,index) in accounts" :disabled="acc.id ==''"
                                                            :value="acc.id">@{{ acc.currency }} - @{{acc.name}} (@{{
                                                        acc.balance }})
                                                    </option>

                                                </select>
                                                <span v-if="errors.has('collection.form.bank_account_id')"
                                                      class="error mini">{{ trans("sentence.choose_a_safe") }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <div class="bottom-info">{{ trans("word.sum") }}</div>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">
                                                <input type="text" @keypress="isNumber"
                                                       v-model.lazy="collection.form.amount"
                                                       class="form-control">
                                            </div>
                                            <span class="error mini" v-if="collection.warning_amount">
                                                  @{{ collection.warning_amount_message }}
                                                </span>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <div class="bottom-info">{{ trans("word.description") }}</div>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">
                                                <input type="text" v-model="collection.form.description"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                            </form>
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                {{ trans("word.cancel") }}
                            </button>
                            <button @click="collectionFormSend" :disabled="collection.collect_send_btn" type="button"
                                    class="btn btn btn-danger pull-right">
                                {{ $type == 'payment' ? trans('sentence.add_payment') : trans('sentence.add_collection') }}
                            </button>
                        </div>


                        <div class="tab-pane fade " id="s2">

                                <form class="form-horizontal bv-form" novalidate="novalidate">
                                    {{--Çek senet tahsilat işlemleri--}}
                                    <button type="submit" class="bv-hidden-submit"
                                            style="display: none; width: 0px; height: 0px;"></button>

                                    <fieldset>
                                        <div class="form-group has-feedback">
                                            <label class="col-sm-4 control-label">
                                                <div class="bottom-info">
                                                    {{ trans("sentence.document_type") }}
                                                </div>
                                            </label>

                                            <div class="col-sm-8 ">
                                                <label class="radio radio-inline">

                                                    <input type="radio" class="radiobox" :value="0" checked
                                                           v-model="cheque_collect.form.doc_type">
                                                    <span>{{ trans("word.cheque") }}</span>

                                                </label>
                                                <label class="radio radio-inline">
                                                    <input type="radio" class="radiobox" :value="1"
                                                           v-model="cheque_collect.form.doc_type">
                                                    <span>{{ trans("sentence.promissory_note") }}</span>
                                                </label>

                                            </div>

                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group has-feedback">
                                            <label class="col-sm-4 control-label">
                                                <div class="bottom-info">{{ trans("sentence.bank_name") }}</div>
                                            </label>
                                            <div class="col-sm-8 ">
                                                <div class="input-group" style="width:100%">
                                                    <input type="text" v-model="cheque_collect.form.bank_name"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-group has-feedback">
                                            <label class="col-sm-4 control-label">
                                                <div class="bottom-info">{{ trans("sentence.bank_branch") }}</div>
                                            </label>
                                            <div class="col-sm-8 ">
                                                <div class="input-group" style="width:100%">
                                                    <input type="text" v-model="cheque_collect.form.branch_name"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-group has-feedback">
                                            <label class="col-sm-4 control-label">
                                                <div class="bottom-info">
                                                    {{ trans("sentence.document_number") }}
                                                </div>
                                            </label>
                                            <div class="col-sm-8 ">
                                                <div class="input-group" style="width:100%">
                                                    <input type="text" v-model="cheque_collect.form.number"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-group has-feedback">
                                            <label class="col-sm-4 control-label">
                                                <div class="bottom-info">
                                                    SERİ NO
                                                </div>
                                            </label>
                                            <div class="col-sm-8 ">
                                                <div class="input-group" style="width:100%">
                                                    <input type="text" v-model="cheque_collect.form.seri_no"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-group has-feedback">
                                            <label class="col-sm-4 control-label">
                                                <div class="bottom-info">
                                                    CİRO
                                                </div>
                                            </label>
                                            <div class="col-sm-8 ">
                                                <div class="input-group" style="width:100%">
                                                    <input type="text" v-model="cheque_collect.form.ciro_names"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group has-feedback">
                                            <label class="col-sm-4 control-label">
                                                <div class="bottom-info">
                                                    {{ trans("word.date") }}
                                                </div>
                                            </label>
                                            <div class="col-sm-8 ">
                                                <div class="input-group">
                                                    <input type="text" v-model="cheque_collect.form.date" name="cheque_collect.form.date"
                                                           value="{{date_tr()}}"
                                                           class="form-control datepicker" data-dateformat="dd.mm.yy">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-group has-feedback">
                                            <label class="col-sm-4 control-label">
                                                <div class="bottom-info">
                                                    {{ trans("sentence.due_date") }}
                                                </div>
                                            </label>
                                            <div class="col-sm-8 ">
                                                <div class="input-group">
                                                    <input type="text" v-model="cheque_collect.form.payment_date" name="cheque_collect.form.payment_date"
                                                           value="{{date_tr()}}"
                                                           class="form-control datepicker" data-dateformat="dd.mm.yy">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-group has-feedback">
                                            <label class="col-sm-4 control-label">
                                                <div class="bottom-info">
                                                    {{ trans("word.sum") }}
                                                </div>
                                            </label>
                                            <div class="col-sm-8 ">
                                                <div class="input-group" style="width:100%">
                                                    <input type="text" class="form-control"
                                                           v-model.lazy="cheque_collect.form.amount"  @keypress="isNumber"
                                                           value="0,00">
                                                </div>
                                                <span class="error mini" v-if="cheque_collect.warning_amount">
                                                  @{{ cheque_collect.warning_amount_message }}
                                                </span>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-group has-feedback">
                                            <label class="col-sm-4 control-label">
                                                <div class="bottom-info">
                                                    {{ trans("word.description") }}
                                                </div>
                                            </label>
                                            <div class="col-sm-8 ">
                                                <div class="input-group" style="width:100%">
                                                    <input type="text" v-model="cheque_collect.form.description"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    {{ trans("word.cancel") }}
                                </button>
                                <button type="button" @click="chequeCollectFormSend" :disabled="cheque_collect.cheque_send_btn"
                                        class="btn btn btn-primary pull-right">
                                    {{ trans("sentence.add_collection") }}
                                </button>


                        </div>
                    </div>
                </div>


            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
@php
    $banks = \App\Model\Finance\BankAccounts::where("account_id",aid())->get();

@endphp
@push("scripts")
    <script>
        window.addEventListener("load", () => {
            VueCollect = new Vue({
                el: "#vue-trans",
                data: {
                    loading: false,
                    accounts: [{id: "", name: "Hesap Seçiniz"}],
                    collection: {
                        warning_amount: false,
                        warning_amount_message: "",
                        collect_send_btn: false,
                        form: {
                            doc_id: "{{$detail->id}}",
                            type: "collect",
                            bankabble_type: "{!! $abble !!}",
                            bank_account_id: "",
                            description: "",
                            date: "{{date_tr()}}",
                            amount: "{{$local == "sales_orders" ? $detail->remaining:"0,00"}}"
                        }
                    },
                    cheque_collect:{
                        warning_amount: false,
                        warning_amount_message: "",
                        cheque_send_btn: true,
                        form:{
                            doc_type:"0",
                            order_id:"{{$local == "sales_orders" ? $order->id:""}}",
                            company_id:"{{$local == "sales_orders" ? $order->company["id"]:$company->id}}",
                            type:"cheque_collect",
                            bank_name:"",
                            branch_name:"",
                            number:"",
                            seri_no:"",
                            ciro_names:"",
                            date:"{{date_tr()}}",
                            payment_date:"{{date_tr()}}",
                            amount:"0,00",
                            description:""
                        }
                    }
                },
                mounted: function () {
                    this.accounts.push(
                                @if(($detail->currency))
                                @foreach($banks as $acc)

                                @if(strtoupper($detail->currency) == strtoupper($acc->currency))
                        {
                            "id": "{{$acc->id}}",
                            "name": "{{$acc->name}}",
                            "balance": "{{$acc->balance}}",
                            "currency": "{{$acc->currency}}"
                        },
                                @endif

                                @endforeach()
                                @else
                                @foreach($banks as $acc)

                        {
                            "id": "{{$acc->id}}",
                            "name": "{{$acc->name}}",
                            "balance":"{{$acc->balance}}",
                            "currency": "{{$acc->currency}}"
                        },


                            @endforeach()
                            @endif()
                    )
                },
                watch: {
                    "collection.form.amount": function (yeni, eski) {
                        this.collection.form.amount = money_clear(yeni).toLocaleString('tr-TR', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 4
                        });



                        amount = money_clear(this.collection.form.amount);

                        @if($local == "sales_orders")
                            order_total = money_clear(VueName.remaining);
                        @else
                            order_total = amount+amount;
                        @endif
                        if (amount > order_total) {

                            this.collection.warning_amount = true;
                            this.collection.warning_amount_message = "Tahsilat tutarı, sipariş tutarından yüksek olamaz.Yüksek miktarda tahsilatı müşteri profilinden yapabilirsiniz.";
                            this.collection.collect_send_btn = true
                        } else if (amount <= 0) {
                            this.collection.warning_amount = true;
                            this.collection.warning_amount_message = "Lütfen geçerli bir tutar giriniz.";
                            this.collection.collect_send_btn = true
                        } else {
                            this.collection.warning_amount = false;
                            this.collection.collect_send_btn = false
                        }
                    },
                    "cheque_collect.form.amount": function (yeni, eski) {
                        this.cheque_collect.form.amount = money_clear(yeni).toLocaleString('tr-TR', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 4
                        });


                        amount = money_clear(this.cheque_collect.form.amount);

                       if (amount <= 0) {
                            this.cheque_collect.warning_amount = true;
                            this.cheque_collect.warning_amount_message = "Lütfen geçerli bir tutar giriniz.";
                            this.cheque_collect.cheque_send_btn = true
                        } else {
                            this.cheque_collect.warning_amount = false;
                            this.cheque_collect.cheque_send_btn = false
                        }
                    },
                    deep: true
                },
                methods: {
                    isNumber: function (evt) {
                        evt = (evt) ? evt : window.event;
                        var charCode = (evt.which) ? evt.which : evt.keyCode;
                        if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode != 8 && charCode != 44 && charCode != 46) {
                            evt.preventDefault();
                        } else {
                            return true;
                        }
                    },
                    collectionFormSend: function () {
                        this.$validator.validate().then((result) => {
                            if (result) {
                                @if($local != "sales_orders")
                                this.collection.collect_send_btn = false;

                                amount = money_clear(this.collection.form.amount);
                                if (amount > 0) {
                                    this.loading = true;
                                    axios.post("{{route("finance.accounts.transaction_company",aid())}}", this.collection.form).then(function (res) {

                                        if (res.data.message == "success") {
                                            VueName.remaining = res.data.remaining;
                                            VueName.statement();

                                            VueCollect.collection.form.amount = "0,00";
                                            VueCollect.loading = false;
                                            $("#transaction").modal("hide");
                                            notification("Success", "Tahsilat işlemi başarıyla gerçekleşti.", "success");
                                        }

                                    }).catch(function (e) {

                                        VueCollect.loading = false;
                                    });
                                } else {

                                    VueCollect.collection.warning_amount = true;
                                    VueCollect.collection.warning_amount_message = "Lütfen geçerli bir tutar giriniz.";
                                    VueCollect.collection.collect_send_btn = true
                                }
                                @else
                                    this.collection.collect_send_btn = false;
                                order_total = money_clear(VueName.remaining);
                                amount = money_clear(this.collection.form.amount);
                                if (amount > order_total) {

                                } else {
                                    amount = money_clear(this.collection.form.amount);
                                    if (amount > 0) {
                                        this.loading = true;
                                        axios.post("{{route("finance.accounts.global_transaction",aid())}}", this.collection.form).then(function (res) {

                                            if (res.data.message == "success") {
                                                VueName.remaining = res.data.remaining;
                                                VueName.company_balance = res.data.balance;
                                                VueCollect.collection.form.amount = res.data.remaining;
                                                VueName.collect_items.push({
                                                    type: "collect",
                                                    id: res.data.collect_items.id,
                                                    bank_account: res.data.collect_items.bank_account,
                                                    date: res.data.collect_items.date,
                                                    amount: res.data.collect_items.amount
                                                });

                                                VueCollect.loading = false;
                                                $("#transaction").modal("hide");
                                                notification("Success", "Tahsilat işlemi başarıyla gerçekleşti.", "success");


                                            }
                                        }).catch(function (e) {
                                            console.log(e)
                                            VueCollect.loading = false;
                                        });
                                    } else {

                                        VueCollect.collection.warning_amount = true;
                                        VueCollect.collection.warning_amount_message = "Lütfen geçerli bir tutar giriniz.";
                                        VueCollect.collection.collect_send_btn = true
                                    }
                                }

                                @endif




                            } else {


                            }
                        })

                    },
                    chequeCollectFormSend: function () {
                        if(amount>!0){

                            this.cheque_collect.cheque_send_btn = true;

                            this.loading = true;


                            axios.post("{{route("finance.accounts.transaction_company",aid())}}", this.cheque_collect.form).then(function (res) {

                                if (res.data.message == "success") {
                                    $("#transaction").modal("hide");

                                    return  window.location.href="{{Request::url() }}";
                                    VueName.remaining = res.data.remaining;
                                    VueCollect.collection.form.amount = res.data.remaining;
                                    VueCollect.loading = false;
//                                    VueName.statement();
                                }

                            }).catch(function (e) {
                                console.log(e)
                                VueCollect.loading = false;
                                VueCollect.cheque_collect.cheque_send_btn = false;
                            });

                        }else {

                        }
                    }
                }
            })

        });
    </script>
@endpush