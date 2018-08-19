@php
    use App\Account;$units = Account::find(aid())->units;
    if($proccess_type == "sales"){
$products = \App\Model\Stock\Product\Product::where("account_id",aid())->whereIn("type_id",[2,3])->get();
    }else{
    $products = \App\Model\Stock\Product\Product::where("account_id",aid())->whereIn("type_id",[1,3,4])->get();
}
@endphp
<div id="rows" v-cloak>
    <fieldset>
        <div class="form-group"><label class="col-md-3 control-label">{{ trans("sentence.currency_type") }}
            </label>
            <div class="col-md-2 ">

                <div class="input-group">
                    <div class="dropdown change"><a data-toggle="dropdown" href="#"
                                              aria-expanded="true"
                                              class="btn btn-sm btn-default change dropdown-toggle "><span
                                    class="fa fa-try"></span> {{ trans("sentence.currency_type") }}</a>
                        <ul class="dropdown-menu change dropdown-caret"
                            style="min-width: 350px; padding: 7px 9px; margin: -32px -1px 0px;">
                            <li>
                                <div class="alert alert-warning" style="font-size:11px">
                                    {{ trans("sentence.currency_type_information") }}
                                </div>
                                <select class="form-control" v-model="currency">
                                    @foreach(\App\Currency::all() as $cur)
                                        <option value="{{$cur->code}}">{{$cur->icon}} - {{$cur->name}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <button class="btn btn-default" type="button" v-on:click="currency_process(currency)">
                                    {{ trans("word.okay") }}
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div v-show="dont_try">
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"> 1 <div v-bind:class="[currency_class]"></div> = </span>
                        <input class="form-control" id="appendprepend" type="text" v-model="currency_value"
                               v-on:keyup="currency_process()" style="width: 117px;">
                        <span class="input-group-addon"><i class="fa fa-try"></i></span>
                    </div>


                </div>


            </div>
        </div>
    </fieldset>
    <div class="invoice_table">
        <table class="table  table-condensed">
            <tbody>
            <tr>
                <th width="41%">{{ trans("word.service") }} / {{ trans("word.product") }}</th>
                <th width="10%">{{ trans("word.quantity") }}</th>
                <th width="10%">{{ trans("word.unit") }}</th>
                <th width="10%">{{ trans("sentence.unit_price") }}</th>
                <th width="12%">{{ trans("word.vat") }}</th>
                <th width="13%">{{ trans("word.total") }}</th>
                <th width="1%">#</th>
            </tr>
            </tbody>

            <tbody v-for="(item, index) in items">
            <tr>
                <td>
                    <v-select :ref="'field-'+index" label="text" v-model="item.tetra"
                              v-bind:class="{'v-select-error':errors.has('item.tetra'+index)}"

                              v-validate="'required'" :filterable="true" placeholder="{{ trans("sentence.choose_product") }}"
                              :options="options" :name="'item.tetra'+index"
                              @input="function(val) { consoleCallback(index, val); }">

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
                </td>
                <td>

                    <input v-on:keypress="isNumber" v-model.lazy="item.quantity"
                           class="form-control"
                           style="text-align: right"/>


                </td>

                <td>
                    <select v-model="item.unit" disabled class="form-control select-disabled">
                        <option v-for="unit in units" :value="unit.d">@{{ unit.name }}</option>
                    </select>
                </td>
                <td>
                    <input v-on:keypress="isNumber" v-model.lazy="item.amount"
                           class="form-control" style="text-align:right"/>
                    @{{ subamount_row[index] }}
                </td>
                <td>
                    <select v-model="item.vat" class="form-control">
                        <option v-for="vat in vats" :value="vat.id">@{{ vat.name }}</option>
                    </select>
                </td>
                <td>
                    <input v-on:keypress="isNumber" v-model.lazy="item.total = subtotal_row[index]"
                           class="form-control"
                           style="text-align: right"/>
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="fa fa-list"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#!" v-on:click="addNote(index)" v-show="!item.description_show">{{ trans("word.note") }}</a></li>
                            <li><a href="#!" v-on:click="addTermin(index)" v-show="!item.termin_show">{{ trans("word.deadline") }}</a></li>
                            <li><a href="#!">{{ trans("word.discount") }}</a></li>
                            <li><a href="#!" v-if="index != 0 " v-on:click="removeRow(index)">
                                   {{trans("sentence.delete_row")}}
                                </a></li>
                        </ul>
                    </div>
                </td>

            </tr>
            <tr>
                <td colspan="1">
                    <div class="input-group" style="top: 2px;" v-show="item.description_show">
                        <input type="text" class="form-control" v-model="item.description">
                        <div class="input-group-btn">
                            <button type="button" placeholder="Description" class="btn btn-default"
                                    @click="item.description_show = false" tabindex="-1">X
                            </button>
                        </div>
                    </div>
                </td>
                <td colspan="2">
                    <div class="input-group" style="top: 2px;" v-show="item.termin_show">
                        <input  type="date"
                                  class="form-control"
                                  v-model="item.termin_date">

                        <div class="input-group-btn">
                            <button type="button" placeholder="Termin {{ trans("word.date") }}" class="btn btn-default"
                                    @click="item.termin_show = false" tabindex="-1">X
                            </button>
                        </div>
                    </div>
                </td>
                <td colspan="4"></td>
            </tr>


            </tbody>
        </table>
        <div class="row ">
            <div class="col-sm-8">
                <button type="button" v-on:click="addRow" class="btn btn-default"><i class="fa fa-plus"></i>  {{ trans("sentence.add_new_row") }}</button>
            </div>
            <div class="col-sm-4">

                <table class="table table-condensed table-striped table-no-padding" width="100%" border="0">
                    <tbody>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">
                            <div class="bottom-info">{{ trans("sentence.sub_total") }}</div>
                        </td>
                        <td style="text-align:right;    border-bottom: 1px solid #ddd;">
                            <div class="bottom-info"><span id="total-half">@{{sub_totall}}</span>
                                <div v-bind:class="[currency_class]"></div>
                            </div>
                        </td>

                    </tr>

                    <tr v-for="vato in vat_only" v-if="vato.total!=0 || vato.name != vato.name">
                        <td style="border-top: 0px;">
                            <div class="bottom-info" style="font-size: 11px">{{ trans("sentence.total_vat") }}@{{ vato.name }}</div>
                        </td>
                        <td style="text-align:right">
                            <div class="bottom-info" style="font-size: 11px"><span
                                        id="total-vat-1">@{{ vato.total }}</span> <i
                                        v-bind:class="[currency_class]"></i></div>
                        </td>
                    </tr>

                    <tr>
                        <td style="border-top: 0px;">
                            <div class="bottom-info">{{trans("sentence.total_vat") }}</div>
                        </td>
                        <td style="text-align:right;border-top: 0px;">
                            <div class="bottom-info"><span id="total-vat"></span>@{{ vat_totall }}
                                <div v-bind:class="[currency_class]"></div>
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <div class="bottom-info">{{ trans("sentence.general_total") }} @{{ vat_check }}</div>
                            <div class="bottom-info" v-show="dont_try">TL KARŞILIĞI</div>
                        </td>
                        <td style="text-align:right">
                            <div class="bottom-info" style="color:#2AC!important"><span
                                        id="total-all"> @{{ general_total }}</span>
                                <div v-bind:class="[currency_class]"></div>
                            </div>
                            <div class="bottom-info" v-show="dont_try" style="color:#2AC!important"><span
                                        id="total-all"> @{{ total_exchange }}</span>
                                <div class="fa fa-try"></div>
                            </div>
                            <div class="bottom-info" v-show="dont_try" style="color:#2AC!important"><span
                                        id="total-all">1 <div v-bind:class="[currency_class]"></div> = @{{ currency_value }}  </span>
                                <div class="fa fa-try"></div>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
@push("script_form")
    <script>
        window.addEventListener("load", () => {
            Vue.directive('focus', {
                inserted: function (el, binding, vnode) {
                    Vue.nextTick(function () {
                        el.focus()
                    })
                }
            })

            Vue.component('v-select', VueSelect.VueSelect);
            Vuen = new Vue({
                el: "#rows",
                data() {
                    return {
                        load: false,
                        units: [@foreach($units as $unit) {
                            d: "{{$unit->id}}",
                            name: "{{$unit->short_name}}"
                        }, @endforeach],
                        vats: [@foreach(vat_list() as $vat) {
                            id: "{{$vat["id"]}}",
                            name: "{{$vat["name"]}}"
                        }, @endforeach],
                        options: [@foreach($products as $product) {
                            product_id: "{{$product->id}}",
                            text: "{{$product->named["name"]}}",
                            vat_id: "{{$product->vat_rate}}",
                            price: "{{$proccess_type == "sales" ? $product->list_price:$product->buying_price}}",
                            unit_id: "{{$product->unit_id}}"
                        }, @endforeach],
                        grand_total: "0,00",
                        sub_total: "0,00",
                        vat_total: "0,00",
                        vat_only: [
                            {name: "%1", total: 0},
                            {name: "%8", total: 0},
                            {name: "%18", total: 0},
                        ],
                        dont_try: false,
                        currency_class: '{{$form_type == "update" ? "fa fa-".$offer->currency."":""}}',
                        currency: '{{$form_type == "update" ? $offer->currency:"TRY"}}',
                        currency_value: '{{$form_type == "update" ? $offer->_value:"0,00"}}',
                        items: [@if($form_type != "update"){
                            id: 0,
                            description: "",
                            description_show: false,
                            termin_show: false,
                            termin_date: "{{date_local()}}",
                            unit: 1,
                            vat: 18,
                            note: "",
                            product_id: "",
                            tetra: "",
                            amount: "0,00",
                            quantity: "0",
                            total: "0,00",
                        }@endif ],
                    }
                },
                watch: {
                    items: {
                        handler(newVal, oldVal) {
                            let changedIndex;
                            newVal.forEach((item, idx) => {
                                item.amount = (money_clear(newVal[idx].amount) * 1).toLocaleString('tr-TR', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 4
                                });
                                item.quantity = (money_clear(newVal[idx].quantity) * 1).toLocaleString('tr-TR', {
                                    minimumFractionDigits: 0,
                                    maximumFractionDigits: 2
                                });
                                item.total = (money_clear(newVal[idx].total) * 1).toLocaleString('tr-TR', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });

                            })
                        },
                        deep: true
                    }
                },
                computed: {
                    subtotal_row() {
                        return this.items.map((item) => {

                            total = total_price(money_clear(item.quantity), item.vat, money_clear(item.amount));

                            return total.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                        });
                    },
                    subamount_row() {
                        return this.items.map((item, idx) => {


                            $net = ((this.items[idx].total) / (1 + (this.items[idx].vat / 100)) / (money_clear(this.items[idx].quantity))).toLocaleString('tr-TR', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 4
                            });

                            if ($net != "NaN") {
                                this.items[idx].amount = $net;
                            }

                        });
                    },
                    sub_totall() {
                        let st = 0;
                        return this.items.reduce((total, item) => {
                            st += money_clear(item.quantity) * money_clear(item.amount);
                            result = st.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 4});
                            this.sub_total = result;
                            VueName.form.sub_total = result;
                            return result;
                        }, 0);

                    },
                    general_total() {
                        let tp = 0;
                        this.items.reduce((total, item) => {
                            tp += money_clear(item.total) * 1;
                        }, 0);

                        let yeni = tp.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 4});
                        this.grand_total = yeni;
                        VueName.form.grand_total = yeni;
                        return yeni;


                    },
                    total_exchange() {

                        return (money_clear(this.currency_value) * money_clear(this.general_total)).toLocaleString('tr-TR', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                    },
                    vat_totall() {
                        vat_totali = money_clear(this.general_total) - money_clear(this.sub_totall);

                        result = vat_totali.toLocaleString('tr-TR', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 4
                        });
                        this.vat_total = result;
                        VueName.form.vat_total = result;
                        return result;
                    },
                    vat_check() {
                        vat1 = 0;
                        vat8 = 0;
                        vat18 = 0;

                        this.items.reduce((total, item) => {

                            if (item.vat == 1) {

                                t = money_clear(item.total);
                                a = money_clear(item.amount);
                                q = money_clear(item.quantity);

                                st = q * a;
                                sr = t - st;

                                vat1 += sr;


                            } else if (item.vat == 8) {

                                t = money_clear(item.total);
                                a = money_clear(item.amount);
                                q = money_clear(item.quantity);

                                st = q * a;
                                sr = t - st;

                                vat8 += sr;
                            } else if (item.vat == 18) {


                                t = money_clear(item.total);
                                a = money_clear(item.amount);
                                q = money_clear(item.quantity);

                                st = q * a;
                                sr = t - st;

                                vat18 += sr;
                            }

                        }, 0);

                        if (vat1 != 0) {
                            this.vat_only[0].name = "%1";
                            this.vat_only[0].total = vat1.toLocaleString('tr-TR', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                        } else {
                            this.vat_only[0].total = 0;

                        }
                        if (vat8 != 0) {
                            this.vat_only[1].name = "%8";
                            this.vat_only[1].total = vat8.toLocaleString('tr-TR', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                        } else {
                            this.vat_only[1].total = 0;

                        }
                        if (vat18 != 0) {
                            this.vat_only[2].name = "%18";
                            this.vat_only[2].total = vat18.toLocaleString('tr-TR', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                        } else {

                            this.vat_only[2].total = 0;

                        }

                    },
                },
                mounted: function () {
                    datePicker();

                    @if($form_type == "update")

                            @foreach($offer->items as $item)
                        this.items.push(
                        {
                            id: "{{isset($copy) == false ? $item->id:0}}",
                            description: "{{$item->note != null ? $item->note:""}}",
                            description_show: "{{$item->note != null ? true:false}}",
                            unit: "{{$item->unit_id}}",
                            vat: "{{$item->vat}}",
                            tetra: {id: '{{$item->product_id}}', text: "{{$item->product->named["name"]}}"},
                            note: "{{$item->note}}",
                            product_id: "{{$item->product_id}}",
                            amount: "{{$item->price}}",
                            termin_date: "{{$item->termin_date}}",
                            termin_show: "{{$item->termin_show}}",
                            quantity: "{{$item->quantity}}",
                            total: "{{$item->total}}",
                        }
                    );
                    @endforeach

                            @endif

                   this.currency_process(this.currency);

                    window.addEventListener("keypress", function (e) {
                        if (e.keyCode == 43) {
                            Vuen.addRow();
                        } else if (e.keyCode == 45) {
                            Vuen.removeRow(Vuen.items.length - 1);

                            console.log(Vuen.items.lenght)
                        }

                    }.bind(this));


                    $(document).on('click', '.change', function (e) {
                        e.stopPropagation();

                    });
                },
                methods: {
                    itemdate(index){
                      return "itemdate-"+index;
                    },
                    consoleCallback: function (val, tag) {

                        if (this.load == true) {
                            console.log("artık çalışıyor.")
                            if (tag.product_id != 'undefined' && tag.product_id != '' && tag.product_id != null) {

                                this.items[val].product_id = tag.product_id
                                this.items[val].vat = tag.vat_id
                                this.items[val].amount = tag.price
                                this.items[val].unit = tag.unit_id
                            }
                        } else {
                            console.log("ilk hamle çalışmadı")
                            this.load = true;
                        }
                    },
                    currency_process(cur) {
                        console.log(cur)
                        this.currency_class = "fa fa-" + this.currency;

                        if (cur == "TRY") {

                            this.dont_try = false;
                            this.currency_value = "0,00"
                            VueName.form.currency_value = "0,00";
                            VueName.form.currency = "TRY";

                        } else {
                            VueName.form.currency = cur;
                            axios.get("{{route("exchange",[aid()])}}?code=" + this.currency).then(function (response) {

                                Vuen.currency_value = response.data;
                                VueName.form.currency_value = response.data


                            }).catch(function (error) {
                                Vuen.currency_value = "0,00";
                                VueName.form.currency_value = "0,00";
                                notification("Error", "Kur bilgisi çekilemedi.", "error");
                            });

                            this.dont_try = true;
                        }

                        $(".dropdown").removeClass("open");
                    },
                    addRow: function () {

                        this.items.push({
                            id: 0,
                            unit: "1",
                            description_show: false,
                            termin_show: false,
                            termin_date: "{{date_local()}}",
                            vat: 18,
                            tetra: "",
                            product_id: "",
                            amount: "0,00",
                            quantity: "0",
                            total: "0,00",
                            note: "",
                        });

                        col = this.items.length - 1;

                        this.$nextTick(() => {
                            const input = this.$refs["field-" + col][0].$el.querySelector('input');
                            input.focus();

                        })

                        console.log(this.items[col].product_id = '');
                    },
                    removeRow: function (index) {
                        if (index != 0) {
                            this.items.splice(index, 1);
                        }
                    },
                    addNote: function (index) {

                        this.items[index].description_show = true;
                    },
                    addTermin: function (index) {
                        this.items[index].termin_show = true;
                        datePicker();
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
                        axios.get("{{route("stock.product.source",aid())}}?q=" + search).then(function (res) {
                            // Companies.form.company_name = search;
                            vm.options = res.data;

                            loading(false)
                        });

                    }, 350),

                }
            })
        });
    </script>
@endpush