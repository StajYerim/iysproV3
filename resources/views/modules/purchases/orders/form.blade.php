@extends('layouts.master')
@section('content')
    @if($form_type == "copy")
        @php
                $form_type = "update";
                      $copy = 0;

                @endphp
        @endif
    <!-- widget grid -->
    <section>
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET ROW START -->
            <div class="col-sm-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false">
                    <!-- widget div-->
                    <div>
                        <!-- widget content -->
                        <div class="widget-body ">

                            <form class="form-horizontal">
                                <div id="sales_offer" v-cloak>
                                    <fieldset class="fixed-title">
                                        <div class="form-group">
                                            <label class="col-md-3 col-sm-3 control-label"> <span
                                                        style="vertical-align: -9px;">{{trans("general.description") }}</span></label>
                                            <div class="col-md-3 col-sm-4 pull-right">
                                                {{--<a href="{{$form_type == "new" ? route("stock.index",aid()): URL::previous() }}"--}}
                                                {{--class="btn btn-default btn-lg ">{{trans("general.back")}}--}}
                                                {{--</a>--}}
                                                <button type="button" @click="formSend" href="#"
                                                        class="btn btn-success btn-lg ">
                                                    {{trans("general.save")}}
                                                </button>
                                            </div>
                                            <div class="col-md-6 col-sm-6">

                                                <input

                                                        type="text" v-model="form.description" class="form-control"
                                                        AUTOCOMPLETE="OFF"
                                                        style="padding: 22px 12px">
                                            </div>
                                        </div>
                                        <hr>
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-group" :class="{'has-error':errors.has('form.company_id')}">

                                            <label class="col-md-3 control-label">{{trans("general.supplier")}}</label>
                                            <div class="col-md-6">

                                                <v-select
                                                        v-bind:class="{'v-select-error':errors.has('form.company_id')}"
                                                        v-validate="'required'" name="form.company_id" label="text"
                                                        :filterable="true" placeholder="Choose Company"
                                                        :options="options" @search="onSearch"
                                                        transition="fade" v-model="form.company_id">
                                                    <template slot="no-options">
                                                        <a type="button" style="color:white"
                                                           class='btn btn-sm btn-warning' href='#!'
                                                           data-toggle='modal' data-target='#new_supplier'>Click for New
                                                            Company </a>
                                                    </template>
                                                    <template slot="option" slot-scope="option">
                                                        <div class="d-center">
                                                            @{{ option.text }}
                                                        </div>
                                                    </template>

                                                </v-select>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-group" v-bind:class="{'has-error':errors.has('form.date')}">
                                            <label class="col-md-3 control-label">Sipariş Tarihi</label>
                                            <div class="col-md-2 ">
                                                <div class="input-group">
                                                    <the-mask @change="setDate(form.date)" :mask="['##.##.####']" type="text" name="form.date"
                                                              v-validate="'required'" class="form-control datepicker"
                                                              v-model="form.date"></the-mask>
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group"
                                             v-bind:class="{'has-error':errors.has('form.due_date')}">
                                            <label class="col-md-3 control-label">Ödeneceği Tarih</label>
                                            <div class="col-md-2 ">
                                                <div class="input-group">
                                                    <the-mask :mask="['##.##.####']" type="text"
                                                              name="form.due_date" v-validate="'required'"
                                                              class="form-control datepicker"
                                                              v-model="form.due_date"></the-mask>

                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                @includeIf("components.external.rows",[$offer = $order,$proccess_type = "sales"])
                            </form>


                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->
            </div>
            <!-- WIDGET ROW END -->
        </div>
        @include("components.modals.companies",[$title="New Supplier",$type = "new_supplier",$message="Company Form",$id=0])
    </section>

    {{--@include("components.modals.companies",[$title="New Company",$type = "new_company",$message="Company Form",$id=0])--}}
    {{--@include("components.modals.products",[$title="New Product",$type = "new_product",$message="Product Form",$id=0])--}}

    @push("scripts")

        <script>

            window.addEventListener("load", () => {
                Vue.use(VueTheMask);
                Vue.component('v-select', VueSelect.VueSelect);
                VueName = new Vue({
                    el: "#sales_offer",
                    data: () => ({
                        options: [],
                        money: {
                            decimal: ',',
                            thousands: '.',
                            precision: 2,
                            masked: false
                        },
                        form: {
                            description: "{{$form_type == "update" ? $order->description:""}}",
                            company_id: @if($form_type == "update") { id:'{{$order->company["id"]}}',text:'{{$order->company["company_name"]}}' } @else "" @endif,
                            date: "{{$form_type == "update" ? $order->date:date_tr()}}",
                            due_date: "{{$form_type == "update" ? $order->due_date:date_tr()}}",
                            grand_total: "{{$form_type == "update" ? $order->grand_total:"0,00"}}",
                            sub_total: "{{$form_type == "update" ? $order->sub_total:"0,00"}}",
                            vat_total: "{{$form_type == "update" ? $order->vat_total:"0,00"}}",
                            currency: "{{$form_type == "update" ? $order->currency:"try"}}",
                            currency_value: "{{$form_type == "update" ? $order->currency_value:"0,00"}}",
                        }
                    }),
                    mounted: function () {
                        money_per();
                      datePicker();
                    },
                    methods: {
                        addRow: function () {
                            this.form.items.push({
                                id: 0,
                                product_id: "",
                                quantity: 1,
                                unit_id: 1
                            });
                        },
                        removeRow: function (index) {
                            if (index != 0) {
                                this.form.items.splice(index, 1);
                            }
                        },
                        onSearch(search, loading) {
                            loading(true);
                            this.search(loading, search, this);
                        }, search: _.debounce(function (loading, search, vm) {
                            axios.get("{{route("company.source",aid())}}?q=" + escape(search)).then(function (res) {
                                Companies.form.company_name = search;
                                vm.options = res.data;
                                loading(false)
                            });

                        }, 350),
                        formSend: function () {

                            this.$validator.validate().then((result) => {
                                if (result) {
                                    fullLoading();
                                    axios.post('{{route("purchases.orders.store",[aid(),isset($copy)  == false ? $form_type == "update" ? $order->id:0:0])}}', {
                                        form: this.form,
                                        items: Vuen.items
                                    })
                                        .then(function (response) {
                                            if (response.data.message) {
                                                if (response.data.message == "success") {
                                                    window.location.href = '/{{aid()}}/purchases/orders/' + response.data.id + "/show";
                                                    fullLoadingClose();
                                                }

                                            } else {
                                                fullLoadingClose();
                                                notification("Error", response, "danger");

                                            }
                                        }).catch(function (error) {
                                        fullLoadingClose();
                                        notification("Error", "Please add offer item", "danger");

                                    });

                                } else {
                                    notification("Error","Please required fields","danger");
                                }
                            })


                        }
                    }
                });
            });
        </script>
    @endpush

@endsection