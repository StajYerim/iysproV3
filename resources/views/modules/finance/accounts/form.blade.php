@extends('layouts.master')
@section('content')
    <section id="account" v-cloak>
        <div class="row">
            <div class="col-sm-12">
                <div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false">
                    <div>
                        <div class="widget-body ">
                            <form @submit.prevent="formSend" class="form-horizontal">
                                <fieldset class="fixed-title">
                                    <div class="form-group" :class="{'has-error': errors.has('form.name') }">
                                        <label class="col-md-3 col-sm-3 control-label"> <span
                                                    style="vertical-align: -9px;">{{trans("sentence.account_name")}}</span></label>
                                        <div class="col-md-3 col-sm-4 pull-right">
                                            <a href="{{$form_type == "new" ? route("finance.accounts.index",aid()): URL::previous() }}"
                                               class="btn btn-default btn-lg ">{{trans("word.back")}}
                                            </a>
                                            <button type="submit" href="#" class="btn btn-success btn-lg ">
                                                {{trans("word.save")}}
                                            </button>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <input v-model="form.name" name="form.name" maxlength="100" v-validate="'required'"
                                                   type="text" class="form-control"
                                                   AUTOCOMPLETE="OFF"
                                                   style="padding: 22px 12px">
                                        </div>
                                    </div>
                                    <hr>
                                </fieldset>
                                @if($id == 0 and $form_type == "new")
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{trans("sentence.currency_type")}}</label>
                                        <div class="col-md-4 ">
                                            <div class="">
                                                <select v-model="form.currency" class="form-control">
                                                    <option v-cloak v-for="item in currency_list" v-bind:value="item.code">
                                                        @{{ item.icon }} - @{{ item.code }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                @else
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">{{trans("word.currency")}}</label>
                                            <label class=" control-label">{{$account->cur_info["icon"]." ".$account->cur_info["code"]}} - {{$account->cur_info["name"]}}</label>

                                        </div>
                                    </fieldset>

                                 @endif

                                @if($id == 0 and $form_type == "new")
                                <fieldset >
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{trans("sentence.opening_balance")}}</label>
                                        <div class="col-md-4 ">
                                            <div>
                                                <money v-bind="money" class="form-control "
                                                       v-model="form.item.start_balance"></money>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{trans("sentence.opening_balance_date")}}</label>
                                        <div class="col-md-4 ">
                                            <div >
                                                <input type="text" class="form-control datepicker"
                                                       v-model="form.item.start_date">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                @endif
                                @if($type == 2 or $type==3)
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> </label>
                                        <div class="col-md-4">
                                            <div class="checkbox"  style="z-index: 1;">
                                                <label>
                                                    <input type="checkbox" v-model="form.cheque"
                                                           class="checkbox style-3">
                                                    <span>{{trans("sentence.check_is_available")}}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <hr>
                                <fieldset>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{trans("sentence.bank_name")}}</label>
                                        <div class="col-md-4 ">
                                            <div >
                                                <input type="text" class="form-control " maxlength="100" v-model="form.bank_name">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{trans("sentence.bank_branch")}}</label>
                                        <div class="col-md-4 ">
                                            <div >
                                                <input type="text" class="form-control " maxlength="100" v-model="form.bank_branch">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{trans("sentence.account_number")}}</label>
                                        <div class="col-md-4 ">
                                            <div >
                                                <input type="text" class="form-control " maxlength="100" v-model="form.bank_no">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{trans("word.iban")}}</label>
                                        <div class="col-md-4">
                                            <div >
                                                <input type="text" class="form-control " maxlength="100" v-model="form.bank_iban">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                    @endif
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </section>

    @push("style")
        <link href="{{asset("/js/flager/css/flags.css")}}"
              rel="stylesheet"/>
        <link href="{{asset("/js/boost-select/css/bootstrap-select.min.css")}}"
              rel="stylesheet"/>
    @endpush
    @push("scripts")

        <script src="{{asset("/js/flager/js/jquery.flagstrap.min.js")}}"></script>
        <script src="{{asset("/js/boost-select/js/bootstrap-select.js")}}"></script>
        <script>
            window.addEventListener("load", () => {
                Vue.component('v-select', VueSelect.VueSelect);
                Account = new Vue({
                    el: "#account",
                    data: () => ({
                        form: {
                            name: "{{$id == 0 ? "":$account->name}}",
                            currency: '{{$id == 0 ? "try":$account->currency}}',
                            bank_name: '{{$id == 0 ? "":$account->bank_name}}',
                            bank_branch: '{{$id == 0 ? "":$account->bank_branch}}',
                            bank_no: '{{$id == 0 ? "":$account->bank_no}}',
                            bank_iban: '{{$id == 0 ? "":$account->bank_iban}}',
                            type:'{{$id == 0 ? $type:$account->type}}',
                            cheque:'{{$id == 0 ? false:$account->cheque}}',
                            item: {
                                start_balance: "",
                                start_date: "{{date_tr()}}"
                            }
                        },
                        currency_list: [
                                @foreach($currency as $cur)
                            {
                                icon: "{{$cur->icon}}", code: "{{$cur->code}}"
                            },
                            @endforeach
                        ],
                        money: {
                            decimal: ',',
                            thousands: '.',
                            precision: 2,
                            masked: true
                        },
                    }),
                    mounted: function () {
                        datePicker();
                    },
                    methods: {
                        formSend:
                            function () {
                                this.$validator.validate().then((result) => {
                                    if (result) {
                                        fullLoading();
                                        axios.post('{{route("finance.accounts.store",[aid(),$form_type == "update" ? $account->id:0])}}', this.form)
                                            .then(function (response) {
                                                if (response.data.message) {
                                                    if (response.data.message == "success") {
                                                        window.location.href = '/{{aid()}}/finance/accounts/' + response.data.id + "/show";
                                                        fullLoadingClose();
                                                    }

                                                } else {
                                                    fullLoadingClose();
                                                    notification("Error", response, "danger");

                                                }
                                            }).catch(function (error) {
                                            fullLoadingClose();
                                            notification("Error", error.response.data.message, "danger");

                                        });

                                    } else {
                                        notification("Error", "Please require fields", "danger");
                                    }
                                })


                            }
                    }
                })
                ;
            });
        </script>
    @endpush

@endsection