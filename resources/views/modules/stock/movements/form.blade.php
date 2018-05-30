@extends('layouts.master')
@section('content')
    <!-- widget grid -->
    <section id="stock" v-cloak>
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
                            <form @submit.prevent="formSend" class="form-horizontal">
                                <fieldset class="fixed-title">
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 control-label"> <span
                                                    style="vertical-align: -9px;">{{trans("general.description") }}</span></label>
                                        <div class="col-md-3 col-sm-4 pull-right">
                                            <a href="{{$form_type == "new" ? route("stock.index",aid()): URL::previous() }}"
                                               class="btn btn-default btn-lg ">{{trans("general.back")}}
                                            </a>
                                            <button type="submit" href="#" class="btn btn-success btn-lg ">
                                                {{trans("general.save")}}
                                            </button>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <input
                                                    v-model="form.description"
                                                    type="text" class="form-control"
                                                    AUTOCOMPLETE="OFF"
                                                    style="padding: 22px 12px">
                                        </div>
                                    </div>
                                    <hr>
                                </fieldset>

                                <fieldset>
                                    <div class="form-group">

                                        <label class="col-md-3 control-label">{{$action == 0  ? trans("general.customer"):trans("general.supplier")}}</label>
                                        <div class="col-md-6">

                                            <v-select label="text" :filterable="true" placeholder="Choose Company"
                                                      :options="options" @search="onSearch"
                                                      transition="fade" v-model="form.company_id">
                                                <template slot="no-options">
                                                    <a type="button" style="color:white" class='btn btn-sm btn-warning' href='#!'
                                                       data-toggle='modal' data-target='#new_company'>Click for New
                                                        Company </a>
                                                </template>
                                                <template slot="option" slot-scope="option">
                                                    <div class="d-center">
                                                        @{{ option.text }}
                                                    </div>
                                                </template>
                                                <template slot="selected-option" scope="option">
                                                    <div class="selected d-center">
                                                        @{{ option.text }}
                                                    </div>
                                                </template>
                                            </v-select>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Düzenleme Tarihi</label>
                                        <div class="col-md-2 ">
                                            <div class="input-group">
                                                <input type="text" class="form-control datepicker" v-model="form.date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Fiş Türü</label>
                                        <div class="col-md-3">
                                            <select v-model="form.receipt_id" class="form-control">
                                                <option disabled value="">
                                                    Choose Receipt Type
                                                </option>
                                                @foreach(movements_type($action) as $receipt)
                                                    <option value="{{$receipt["id"]}}">{{$receipt["name"]}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="invoice_table">
                                    <table class="table  table-hover table-condensed" id="invoice-table">
                                        <tbody>
                                        <tr>
                                            <th width="33%">HİZMET / ÜRÜN</th>
                                            <th width="10%">MİKTAR</th>
                                            <th width="10%">BİRİM</th>
                                            <th width="7%"></th>
                                        </tr>
                                        </tbody>

                                        <tbody v-for="(item, index) in form.items">
                                        <tr>
                                            <td>
                                                <div class=""
                                                     :class="{'has-error': errors.has('item.product_id') }">
                                                    <v-select placeholder="Choose Product" v-validate="'required'"
                                                              transition="fade"
                                                              :options="[@foreach($products as $pro){label: '{{$pro->name}}', value: '{{$pro->id}}'},  @endforeach]"
                                                              v-model="item.product_id">
                                                        <template slot="no-options">
                                                        <a href="#!" type="button" style="color:white"
                                                           data-toggle='modal' data-target='#new_product' class="btn btn-warning">Add New Product</a></template>
                                                    </v-select>

                                                </div>
                                            </td>
                                            <td>
                                                <money v-model="item.quantity"
                                                       v-bind="money"
                                                       class="form-control " :value="1"></money>

                                            </td>

                                            <td><select class="form-control" v-model="item.unit_id">
                                                    @foreach($units as $unit)
                                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td>

                                                <a v-if="index != 0 " style="margin-left:7px;display:inline-flex"
                                                   v-on:click="removeRow(index)"
                                                   class="remove-row btn btn-default">
                                                    <i class="fa fa-remove"></i>
                                                </a>
                                            </td>

                                        </tr>

                                        </tbody>
                                    </table>

                                    <button class="btn btn-default" type="button" @click="addRow">New Row</button>

                                </div>
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

    </section>

    @include("components.modals.companies",[$title="New Company",$type = "new_company",$message="Company Form",$id=0])
    {{--@include("components.modals.products",[$title="New Product",$type = "new_product",$message="Product Form",$id=0])--}}

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
                 VueName = new Vue({
                    el: "#stock",
                    data: () => ({
                        options: [],
                        money: {
                            decimal: ',',
                            thousands: '.',
                            precision: 2,
                            masked: false
                        },
                        form: {
                            description: "{{$form_type == "update" ? $stock->description:""}}",
                            company_id: "",
                            date: "{{$form_type == "update" ? $stock->date:date_tr()}}",
                            receipt_id: "{{$form_type == "update" ? $stock->receipt_id:""}}",
                            status: "{{$action}}",
                            items: [
                                    @if($form_type == "new")
                                {
                                    id: 0,
                                    product_id: "",
                                    quantity: 1,
                                    unit_id: 1,
                                },
                                @endif
                            ],
                        },
                    }),

                    mounted: function () {
                        money_per();
                        @if($form_type == "update")

                            this.form.company_id = {
                            id: '{{$stock->company["id"]}}',
                            text: '{{$stock->company["company_name"]}}'
                        };
                        @foreach($stock->items as $item)
                            this.form.items.push({
                            id: "{{$item->id}}",
                            product_id: {value: "{{$item->product_id}}", label: "{{$item->product["name"]}}"},
                            quantity: "{{$item->quantity}}",
                            unit_id: "{{$item->unit_id}}"
                        });
                        @endforeach
                        @endif

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
                                    axios.post('{{route("stock.movements.store",[aid(),$form_type == "update" ? $stock->id:0])}}', this.form)
                                        .then(function (response) {
                                            if (response.data.message) {
                                                if (response.data.message == "success") {
                                                    window.location.href = '/{{aid()}}/stocks/movements/' + response.data.id + "/show";
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
                                    notification("Error", "Please choose product", "danger");
                                }
                            })


                        }
                    }
                });
            });
        </script>
    @endpush

@endsection