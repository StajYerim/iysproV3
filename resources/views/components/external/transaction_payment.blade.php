<div class="modal fade" v-if="VueName.remaining !='0,00'" id="transaction_payment" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">{{ $type == 'payment' ? 'ÖDEME EKLE' : 'TAHSİLAT EKLE' }}</h4>
            </div>
            <div class="modal-body" id="vue-payment">
                <div v-show="loading" style="text-align: center;"><img
                            src="https://loading.io/spinners/pies/lg.pie-chart-loading-gif.gif"></div>
                <div v-show="!loading" class="row">

                    <div id="collectError"></div>
                    <ul id="myTab2" style="display:flex;text-align:center"
                        class="nav nav-tabs flex-wrap">
                        <li class="active" style="text-align: center;flex:1;">
                            <a href="#s3" data-toggle="tab"
                               aria-expanded="false">{{ trans("word.cash") }} {{ $type == 'payment' ? 'ÖDEME' : 'TAHSİLAT' }}</a>
                        </li>
                        <li style="text-align: center;flex:1;">
                            <a href="#s4" data-toggle="tab"
                               aria-expanded="true">{{ trans("sentence.cheque_promissory_note") }} {{ $type == 'payment' ? 'ÖDEME' : 'TAHSİLAT' }}</a>
                        </li>
                    </ul>

                    <div id="myTabContent2" class="tab-content padding-10 ">
                        <div class="tab-pane fade active in" id="s3">
                            <form class="form-horizontal bv-form"
                                  novalidate="novalidate">
                                <button type="submit" class="bv-hidden-submit"
                                        style="display: none; width: 0px; height: 0px;"></button>
                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="col-sm-4 control-label">
                                            <div class="bottom-info">
                                                {{ trans("word.date") }}
                                            </div>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group">
                                                <input type="text" v-model="payment.form.date"
                                                       name="payment.form.date"
                                                       class="form-control datepicker"
                                                       data-dateformat="dd.mm.yy">
                                                <span class="input-group-addon"><i
                                                            class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group"
                                         :class="{'has-error':errors.has('payment.form.bank_account_id')}">
                                        <label class="col-sm-4 control-label">
                                            <div class="bottom-info">
                                                {{ trans("word.account") }}
                                            </div>
                                        </label>
                                        <div class="col-sm-8 ">
                                            <div class="input-group" style="width:100%">

                                                <select v-model="payment.form.bank_account_id"
                                                        v-validate="'required'" name="payment.form.bank_account_id"
                                                        class="form-control"
                                                        name="AccId">

                                                    <option v-for="(acc,index) in accounts" :disabled="acc.id ==''"
                                                            :value="acc.id">@{{acc.name}} (@{{acc.balance}})</option>

                                                </select>
                                                <span v-if="errors.has('payment.form.bank_account_id')"
                                                      class="error mini">
                                                    {{ trans("sentence.choose_a_safe") }}
                                                </span>
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
                                                       v-model.lazy="payment.form.amount"
                                                       class="form-control">
                                            </div>
                                            <span class="error mini" v-if="payment.warning_amount">
                                                  @{{ payment.warning_amount_message }}
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
                                                <input type="text" v-model="payment.form.description"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                            </form>
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                {{ trans("word.cancel") }}
                            </button>
                            <button @click="collectionFormSend" :disabled="payment.collect_send_btn" type="button"
                                    class="btn btn btn-danger pull-right">
                                {{ $type == 'payment' ? 'ÖDEME EKLE' : 'TAHSİLAT EKLE' }}
                            </button>
                        </div>


                        <div class="tab-pane fade " id="s4">


                                <form class="form-horizontal bv-form" novalidate="novalidate">
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
                                                <div class="input-group" style="width:100%">

                                                    <select class="form-control"  v-model="cheque_payment.form.cheque_type">
                                                        <option selected value="0">
                                                            {{ trans("sentence.bank_cheque") }}
                                                        </option>
                                                        <option value="1">
                                                            {{ trans("sentence.customer_cheque") }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset v-show="cheque_payment.form.cheque_type == 0" >
                                        <div class="form-group has-feedback">
                                            <label class="col-sm-4 control-label">
                                                <div class="bottom-info">
                                                    {{ trans("word.banks") }}
                                                </div>
                                            </label>
                                            <div class="col-sm-8 " v-if="cheque_payment.no_banks">
                                                {{ trans("sentence.you_do_not_have_a_bank_account") }}
                                            </div>
                                            <div class="col-sm-8 " v-else="!cheque_payment.no_banks">
                                                <div class="input-group" style="width:100%">

                                                    <select v-model="cheque_payment.form.cheque_bank_id"
                                                            class="form-control">
                                                        <option :disabled="accd.id == null"
                                                                v-for="(accd,index) in cheque_payment.cheque_banks"
                                                                :value="accd.id">@{{accd.name}} ()@{{ accd.balance }}</option>

                                                    </select>
                                                    <span v-if="cheque_payment.cash_error" class="error mini">
                                                        {{ trans("sentence.choose_a_safe") }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="nocheqs" >
                                        <fieldset v-show="cheque_payment.form.cheque_type == 1" >
                                            <div class="form-group has-feedback">
                                                <label class="col-sm-4 control-label">
                                                    <div class="bottom-info">
                                                        {{ trans("word.cheques") }}
                                                    </div>
                                                </label>
                                                <div class="col-sm-8 " v-if="cheque_payment.no_cheqs">
                                                    {{trans("sentence.there_are_no_customer_cheque")}}
                                                </div>
                                                <div class="col-sm-8 " v-else="!cheque_payment.no_cheqs">
                                                    <select v-model="cheque_payment.form.cheques_id"
                                                            class="form-control">
                                                        <option :disabled="cheque.id == null"
                                                                v-for="(cheque,index) in cheque_payment.cheques"
                                                                :value="cheque.id">@{{cheque.name}}
                                                        </option>

                                                    </select>
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
                                                        <input type="text" value="{{date_tr()}}"
                                                               class="form-control datepicker" v-model="cheque_payment.form.date" name="cheque_payment.form.date"
                                                               data-dateformat="dd.mm.yy">
                                                        <span class="input-group-addon"><i
                                                                    class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <div v-show="cheque_payment.form.cheque_type == 0">
                                        <fieldset>
                                            <div class="form-group has-feedback">
                                                <label class="col-sm-4 control-label">
                                                    <div class="bottom-info">
                                                        {{ trans("sentence.expiry_date") }}
                                                    </div>
                                                </label>
                                                <div class="col-sm-8 ">
                                                    <div class="input-group">
                                                        <input type="text"
                                                               value="{{date_tr()}}" v-model="cheque_payment.form.payment_date" name="cheque_payment.form.payment_date"
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
                                                        <input type="text" @keypress="isNumber"
                                                               v-model.lazy="cheque_payment.form.amount"
                                                               class="form-control">
                                                    </div>
                                                    <span class="error mini" v-if="cheque_payment.warning_amount">
                                                  @{{ cheque_payment.warning_amount_message }}
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
                                                        <input type="text" v-model="cheque_payment.form.description" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        </div>

                                    </div>
                                </form>
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    {{ trans("word.cancel") }}
                                </button>
                            <button type="button" @click="chequeCollectFormSend"
                                    class="btn btn btn-danger pull-right">
                                    {{ trans("sentence.add_payment") }}
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
    $cheq_banks = \App\Model\Finance\BankAccounts::where("account_id",aid())->where("cheque",true)->get();
    $cheqs = \App\Model\Finance\Cheques::where("account_id",aid())->where("status",0)->get();

@endphp
@push("scripts")
    <script>
        window.addEventListener("load", () => {
            VuePayment = new Vue({
                el: "#vue-payment",
                data: {
                    loading: false,
                    accounts: [{id: "", name: "Select Account"}],
                    payment: {
                        warning_amount: false,
                        warning_amount_message: "",
                        collect_send_btn: false,
                        form: {
                            doc_id: "{{$detail->id}}",
                            type: "payment",
                            bankabble_type: "{!! $abble !!}",
                            bank_account_id: "",
                            description: "",
                            date: "{{date_tr()}}",
                            amount: "{{$local == "purchase_orders" ? $detail->remaining:"0,00"}}"
                        }
                    },
                    cheque_payment:{
                        no_banks : {{count($cheq_banks)== 0 ? "true":"false"}},
                        cheque_banks: [{id: null, name: "Select Account"}],
                        cheques: [{id: null, name: "Select Account"}],
                        no_cheqs : {{count($cheqs)== 0 ? "true":"false"}},
                        cash_error : false,
                        warning_amount: false,
                        warning_amount_message: "",
                        cheque_send_btn: true,
                        form:{
                            cheque_type:0,
                            cheque_bank_id:null,
                            cheques_id: null,
                            order_id:"{{$local == "purchase_orders" ? $order->id:""}}",
                            company_id:"{{$local == "purchase_orders" ? $order->company["id"]:$company->id}}",
                            type:"cheque_payment",
                            date:"{{date_tr()}}",
                            payment_date:"{{date_tr()}}",
                            amount:"0,00",
                            description:""
                        }
                    }

                },
                mounted: function () {
                    this.accounts.push(
                                @foreach($banks as $acc)
                        {
                            "id": "{{$acc->id}}",
                            "name": "{{$acc->name}}",
                            "balance":"{{$acc->balance}}"
                        },@endforeach()

                    );

                    this.cheque_payment.cheque_banks.push(
                                @foreach($cheq_banks as $bank)
                        {id:"{{$bank->id}}",name:"{{$bank->name}}",balance:"{{$bank->balance}}"},
                            @endforeach()

                    );

                    this.cheque_payment.cheques.push(
                                @foreach($cheqs as $cheq)
                        {
                            id: "{{$cheq->id}}", name: "{{short($cheq->company["company_name"])}} ({{$cheq->amount}})"
                        },
                            @endforeach()
                    );

                    datePicker()
                },
                watch: {
                    "payment.form.amount": function (yeni, eski) {
                        this.payment.form.amount = money_clear(yeni).toLocaleString('tr-TR', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 4
                        });

                        order_total = money_clear(VueName.remaining);

                        amount = money_clear(this.payment.form.amount);
                        @if($local == "purchase_payment")

                                @endif

                                @if($local == "sales_orders")
                            order_total = money_clear(VueName.remaining);
                        @else
                            order_total = amount + amount;
                        @endif

                        if (amount > order_total) {
                            this.warning_amount = true;
                            this.warning_amount_message = "Tahsilat tutarı, sipariş tutarından yüksek olamaz.Yüksek miktarda tahsilatı müşteri profilinden yapabilirsiniz.";
                            this.collect_send_btn = true
                        }
                        else if (amount <= 0) {
                            this.payment.warning_amount = true;
                            this.payment.warning_amount_message = "Lütfen geçerli bir tutar giriniz.";
                            this.payment.collect_send_btn = true
                        } else {
                            this.payment.warning_amount = false;
                            this.payment.collect_send_btn = false
                        }
                    },
                    "cheque_payment.form.amount": function (yeni, eski) {
                        this.cheque_payment.form.amount = money_clear(yeni).toLocaleString('tr-TR', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 4
                        });


                        amount = money_clear(this.cheque_payment.form.amount);

                       if (amount <= 0) {
                            this.cheque_payment.warning_amount = true;
                            this.cheque_payment.warning_amount_message = "Lütfen geçerli bir tutar giriniz.";
                            this.cheque_payment.cheque_send_btn = true
                        } else {
                            this.cheque_payment.warning_amount = false;
                            this.cheque_payment.cheque_send_btn = false
                        }
                    },
                    "cheque_payment.form.cheque_bank_id": function (yeni) {
                        if (yeni == null) {

                            this.cheque_payment.cash_error = true;
                        } else {

                            this.cheque_payment.cash_error = false
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
                            console.log(result)
                            if (result) {

                                @if($local == "purchase_orders")
                                    this.payment.collect_send_btn = false;
                                order_total = money_clear(VueName.remaining);
                                amount = money_clear(this.payment.form.amount);
                                if (amount > order_total) {

                                } else {
                                    console.log("test");
                                    this.loading = true;
                                    axios.post("{{route("finance.accounts.transaction_payment",aid())}}", this.payment.form).then(function (res) {

                                        if (res.data.message == "success") {
                                            VueName.remaining = res.data.remaining;
//                                            VueName.statement();
                                            VuePayment.payment.form.amount = res.data.remaining;
                                            VueName.collect_items.push({
                                                type:"payment",
                                                id: res.data.collect_items.id,
                                                bank_account: res.data.collect_items.bank_account,
                                                date: res.data.collect_items.date,
                                                amount: res.data.collect_items.amount
                                            });
                                            VuePayment.loading = false;
                                            $("#transaction_payment").modal("hide");
                                            notification("Success", "Tahsilat işlemi başarıyla gerçekleşti.", "success");
                                        }
                                    }).catch(function (e) {
                                        console.log(e)
                                        VuePayment.loading = false;
                                    });

                                }

                                @else

                               this.payment.collect_send_btn = false;

                                amount = money_clear(this.payment.form.amount);
                                if (amount > 0) {

                                    this.loading = true;
                                    axios.post("{{route("finance.accounts.transaction_company",aid())}}", this.payment.form).then(function (res) {

                                        if (res.data.message == "success") {

                                            $("#transaction_payment").modal("hide");
                                            VueName.remaining = res.data.remaining;
//                                            VueName.statement();
                                            VuePayment.loading = false;

                                            notification("Success", "Nakit ile ödeme işlemi başarıyla gerçekleşti.", "success");


                                        }
                                    }).catch(function (e) {

                                        VuePayment.loading = false;
                                    });
                                }
                                @endif




                            } else {

                                console.log("validate info")
                            }
                        })

                    },
                    chequeCollectFormSend: function () {
                        $form = this.cheque_payment.form;
                        $cheque = this.cheque_payment;


                        if ($form.cheque_type == 0) {

                            if (money_clear($form.amount) > 0 && $cheque.cash_error == false) {
                                //Banka Çeki
                                axios.post('{{route("finance.accounts.transaction_company",aid())}}',$form).then(res=>{
                                    if (res.data.message == "success") {
                                        return  window.location.href="{{Request::url() }}";
                                        $("#transaction_payment").modal("hide");
                                        VueName.remaining = res.data.remaining;
                                        VueName.statement();
                                        VuePayment.loading = false;

                                        notification("Success", "Çek ile ödeme işlemi başarıyla gerçekleşti.", "success");


                                    }
                                })

                            }else{
                                if (money_clear($form.amount) >= 0) {
                                    this.cheque_payment.warning_amount = true;
                                    this.cheque_payment.warning_amount_message = "Lütfen geçerli bir tutar giriniz.";
                                }

                                if($form.cheque_bank_id == null){

                                    console.log("yemedi")
                                }

                            }


                            //Müşteri Çeki
                                } else {

                            if ($form.cheques_id != null) {
                                console.log("Müşteri Çeki")
                                axios.post('{{route("finance.accounts.transaction_company",aid())}}', {
                                    cheques_id: $form.cheques_id,
                                    type: $form.type,
                                    cheque_type: $form.cheque_type,
                                    company_id:$form.company_id
                                }).then(res => {
                                    if (res.data.message == "success") {

                                        $("#transaction_payment").modal("hide");
                                        VueName.remaining = res.data.remaining;
                                        VuePayment.loading = false;

                                        notification("Success", "Çek ile ödeme işlemi başarıyla gerçekleşti.", "success");
                                        return  window.location.href="{{Request::url() }}";

                                    }
                                })

                            } else {
                                console.log("yemedi")
                            }
                        }


                    }
                }
            })

        });
    </script>
@endpush