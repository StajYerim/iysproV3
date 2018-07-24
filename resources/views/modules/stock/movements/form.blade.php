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
                            <form id="form" @submit.prevent="formSend" class="form-horizontal">
                                <fieldset class="fixed-title">
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 control-label"> <span
                                                    style="vertical-align: -9px;">{{trans("word.description") }}</span></label>
                                        <div class="col-md-3 col-sm-4 pull-right">
                                            <a href="{{$form_type == "new" ? route("stock.index",aid()): URL::previous() }}"
                                               class="btn btn-default btn-lg ">{{trans("word.back")}}
                                            </a>
                                            <button type="submit" href="#" class="btn btn-success btn-lg ">
                                                {{trans("word.save")}}
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

                                        <label class="col-md-3 control-label">{{$action == 0  ? trans("word.customer"):trans("word.supplier")}}</label>
                                        <div class="col-md-6">

                                            <v-select label="text" :filterable="true" placeholder="Choose Company"
                                                      :options="options_company" @search="onSearch"
                                                      transition="fade" v-model="form.company_id">
                                                <template slot="no-options">
                                                    <a type="button" style="color:white" class='btn btn-sm btn-warning' href='#!'
                                                       data-toggle='modal' data-target='#new_company'>{{trans("sentence.click_for_a_new_company")}}</a>
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
                                        <label class="col-md-3 control-label">{{trans("sentence.edit_date")}}</label>
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
                                        <label class="col-md-3 control-label">{{trans("sentence.receipt_type")}}</label>
                                        <div class="col-md-3">
                                            <select v-model="form.receipt_id" class="form-control">
                                                <option disabled value="">
                                                    {{trans("sentence.choose_receipt_type")}} </option>
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
                                            <th width="33%">{{trans("word.service")}} / {{trans("word.product")}}</th>
                                            <th width="10%">{{trans("word.quantity")}}</th>
                                            <th width="10%">{{trans("word.unity")}}</th>
                                            <th width="7%"></th>
                                        </tr>
                                        </tbody>

                                        <tbody v-for="(item, index) in form.items">
                                        <tr>
                                            <td>
                                                <div class=""
                                                     :class="{'has-error': errors.has('item.product_id') }">
                                                    <v-select :ref="'field-'+index" label="text" v-model="item.tetra"
                                                              v-bind:class="{'v-select-error':errors.has('item.tetra'+index)}"

                                                              v-validate="'required'" :filterable="true"
                                                              placeholder="{{ trans("sentence.choose_product") }}"
                                                              :options="options" :name="'item.tetra'+index"
                                                              @input="function(val) { consoleCallback(index, val); }">

                                                </div>
                                            </td>
                                            <td>
                                                <input v-on:keypress="isNumber" v-model.lazy="item.quantity"
                                                       class="form-control"
                                                       style="text-align: right"/>

                                            </td>

                                            <td><select class="form-control" v-model="item.unit_id">
                                                    @foreach($units as $unit)
                                                        <option value="{{$unit->id}}">{{$unit->short_name}}</option>
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

                                    <button class="btn btn-default" type="button" @click="addRow">{{trans("sentence.new_row")}}</button>

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

    @include("components.modals.companies",[$option="supplier",$title="New Company",$type = "new_company",$message="Company Form",$id=0,$act=$action])
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
                        load: false,
                        options: [@foreach($products as $product) {
                            product_id: "{{$product->id}}",
                            text: "{{$product->named["name"]}}",
                            vat_id: "{{$product->vat_rate}}",
                            price: "{{$product->list_price}}",
                            unit_id: "{{$product->unit_id}}"
                        }, @endforeach],
                        options_company: [],
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
                                    quantity: "1,00",
                                    unit_id: 1,
                                    tetra: "",
                                },
                                @endif
                            ],
                        }
                    }),

                    mounted: function () {

                        money_per();
                        money_clear();
                        @if($form_type == "update")

                            this.form.company_id = {
                            id: '{{$stock->company["id"]}}',
                            text: '{{$stock->company["company_name"]}}'
                        };

                        @foreach($stock->items as $item)
                            this.form.items.push({
                            id: "{{$item->id}}",
                            product_id: "{{$item->product_id}}",
                            quantity: "{{$item->quantity}}",
                            tetra: {id: '{{$item->product_id}}', product_id: '{{$item->product_id}}',text: "{{$item->product->named["name"]}}"},
                            unit_id: "{{$item->unit_id}}"
                        });
                        @endforeach
                        @endif

                        datePicker();

                        window.addEventListener("keypress", function (e) {
                            if (e.keyCode == 43) {
                                VueName.addRow();
                            } else if (e.keyCode == 45) {
                                VueName.removeRow(VueName.items.length - 1);

                                console.log(VueName.items.lenght)
                            }

                        }.bind(this));
                    },
                     watch: {
                         items: {
                             handler(newVal, oldVal) {

                                 let changedIndex;
                                 newVal.forEach((item, idx) => {
                                     console.log("data");
                                     item.quantity = (money_clear(newVal[idx].quantity)).toLocaleString('tr-TR', {
                                         minimumFractionDigits: 0,
                                         maximumFractionDigits: 2
                                     });

                                     console.log(item.quantity, idx)

                                 })
                             },
                             deep: true

                         }
                     },
                    methods: {
                        consoleCallback: function (val, tag) {

                            if (this.load == true) {


                                this.form.items[val].unit_id = tag.unit_id
                                if (tag.product_id != 'undefined' && tag.product_id != '' && tag.product_id != null) {


                                }
                            } else {
                                console.log("ilk hamle çalışmadı")
                                this.load = true;
                            }
                        },
                        addRow: function () {
                            this.items.push({
                                id: 0,
                                product_id: "",
                                quantity: "1,00",
                                unit_id: 1
                            });
                        },
                        removeRow: function (index) {
                            if (index != 0) {
                                this.items.splice(index, 1);
                            }
                        },
                        isNumber: function (evt) {
                            evt = (evt) ? evt : window.event;
                            var charCode = (evt.which) ? evt.which : evt.keyCode;
                            if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode != 8 && charCode != 44 && charCode != 46) {
                                evt.preventDefault();
                            } else {
                                return true;
                            }
                        },
                        onSearch(search, loading) {
                            loading(true);
                            this.search(loading, search, this);
                        }, search: _.debounce(function (loading, search, vm) {
                            axios.get("{{route("company.source",aid())}}?q=" + search).then(function (res) {
                                Companies.company_name = search;
                                vm.options_company = res.data;

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