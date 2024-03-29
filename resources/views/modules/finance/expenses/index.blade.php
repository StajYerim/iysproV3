@extends('layouts.master')

@section('content')


    <section id="expenses" class="">

        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget " id="wid-id-0" data-widget-editbutton="false">
                    <div>
                        <div class="widget-body no-padding">

                            <div id="search-mobile" class="btn-header transparent pull-right">
                                <span> <a href="javascript:void(0)" title="{{ trans("word.search") }}"><i
                                                class="fa fa-search"></i></a> </span>
                            </div>

                            <div class="header-search pull-left" style="margin: 0px 0px 5px 7px;min-width: 360px;">
                                <input id="search-fld" type="text">
                                <button type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                                <a href="javascript:void(0);" id="cancel-search-js" title="{{ trans("sentence.cancel_search") }}"><i
                                            class="fa fa-times"></i></a>
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>

                            </div>

                            <div class="pull-right new-button"  onclick="update(0)">
                                <span class="btn btn-success">{{trans("sentence.add_expense")}}</span>
                            </div>

                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th width="1px">#</th>
                                    <th>{{trans("word.supplier")}}</th>
                                    <th>{{trans("word.description")}}</th>
                                    <th>{{trans("word.account")}}</th>
                                    <th>{{trans("word.date")}}</th>
                                    <th>{{trans("word.status")}}</th>
                                </tr>
                                </thead>

                            </table>

                        </div>
                    </div>
                </div>
            </article>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="new_expense" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        {{trans("word.expenses")}}
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="expense_form" @submit.prevent="expense_send" class="form-horizontal bv-form">
                    <div class="modal-body">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">
                                        {{trans("word.supplier")}}</label>
                                    <div class="col-md-6 ">
                                        <div>
                                            <v-select label="text" :filterable="true" placeholder="{{ trans('sentence.choose_company') }}"
                                                      :options="options_company" @search="onSearch"
                                                      transition="fade" v-model="form.company_id">
                                                <template slot="no-options">
                                                    <a type="button" style="color:white" class='btn btn-sm btn-warning' href='#!'
                                                       data-toggle='modal' data-target='#new_company'>
                                                        {{trans("sentence.click_for_a_new_company")}}
                                                    </a>
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
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{trans("word.date")}}</label>
                                    <div class="col-md-6 ">
                                        <div>
                                            <input type="text" class="form-control datepicker"  v-validate="'required|date_format:DD.MM.YYYY'"  name="form.date"
                                                   v-model="form.date">
                                            <span style="color:red;font-weight: bold">@{{ errors.first('form.date') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{trans("word.description")}} </label>
                                        <div class="col-md-6">
                                           <textarea class="form-control" maxlength="150" v-model="form.description" rows="2"> </textarea>
                                        </div>
                                    </div>
                                </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">
                                        {{trans("sentence.expense_type")}}
                                    </label>
                                    <div class="col-md-6">
                                        <div>
                                            <vue-tags-input
                                                    v-model="form.tag"
                                                    :tags="form.tagsd"
                                                    :maxlength="30"
                                                    :autocomplete-items="filteredItems"
                                                    @tags-changed="newTags => form.tagsd = newTags"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">
                                        {{ trans("sentence.expense_status") }}
                                    </label>
                                    <div class="col-md-9" v-if="form.payment_status">
                                        <div class="alert alert-success fade in">
                                            <b>@{{ form.payment_date }}</b> tarihli <b>@{{ form.bank_item.bank_account.name }}</b> hesabından <b>@{{ form.bank_item.amount }}</b>  ödeme yapıldı.
                                        </div>
                                        <button type="button"  onclick="VueName.payment_delete(VueName.form.id)" class="btn btn-danger"><span class="fa fa-trash"></span> ÖDEMEYİ SİL</button>
                                    </div>
                                    <div class="col-md-5" v-if="!form.payment_status">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success"
                                                    onclick="VueName.payStatusChange(1)">
                                                {{ trans("word.paid") }}
                                            </button>
                                            <button type="button" class="btn btn-warning"
                                                    onclick="VueName.payStatusChange(0)">
                                                {{ trans("word.payable") }}
                                            </button>
                                        </div>
                                    </div>
                                    </div>
                            </fieldset>

                        <fieldset>
                            <div class="form-group" v-if="!form.payment_status">
                                <label class="col-md-3 control-label" v-if="!form.pay_status">
                                    ÖDENECEĞİ TARİH
                                    </label>


                                <label class="col-md-3 control-label" v-if="form.pay_status">
                                    ÖDENDİĞİ TARİH
                                </label>

                                <div class="col-md-6">

                                    <input style="width: 270px" type="text" class="form-control datepicker"
                                           name="form.payment_date" v-validate="'required|date_format:DD.MM.YYYY'"
                                           v-model="form.payment_date">
                                    <span style="color:red;font-weight: bold">@{{ errors.first('form.payment_date') }}</span>
                                    </div>
                                </div>
                        </fieldset>

                        <fieldset v-show="form.pay_status" v-if="!form.payment_status">
                            <div class="form-group">
                                    <label class="col-md-3 control-label">
                                        HESAP SEÇ
                                    </label>
                                    <div class="col-md-6 ">
                                        <select class="form-control" name="form.bank_account_id"
                                                v-model="form.bank_account_id">
                                            <option v-for="item in accounts" :value="item.id" :disabled="item.id==0">@{{
                                                item.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset v-if="!form.payment_status">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{trans("word.amount")}}</label>
                                    <div class="col-md-6 ">
                                        <div >
                                            <money v-bind="money" maxlength="15" class="form-control "
                                                   v-model="form.amount"></money>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" v-if="form.id!=0" v-on:click="delete_expense(form.id)" >{{trans("word.delete")}}</button>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans("word.close")}}</button>
                        <button type="submit" class="btn btn-primary">{{trans("word.save")}} </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        @include("components.modals.companies",[$option="supplier",$title="New Company",$type = "new_company",$message="Company Form",$id=0])


    </section>
    @push('scripts')
        <!-- PAGE RELATED PLUGIN(S) -->
        <script src="/js/plugin/datatables/jquery.dataTables.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.colVis.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.tableTools.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
        <script src="/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
        <script src="https://unpkg.com/@johmun/vue-tags-input/dist/vue-tags-input.js"></script>
        <script type="text/javascript">
            window.addEventListener("load", () => {

                const dict = {
                    custom: {
                        'form.date':{
                            required:'Tarih alanı boş bırakılamaz',
                            date_format:"Tarihi 'GG.AA.YYYY' olacak şekilde girin"

                        },
                        'form.payment_date':{
                            required:'Ödeme tarihi boş bırakılamaz',
                            date_format:"Tarihi 'GG.AA.YYYY' olacak şekilde girin"

                        }

                    }
                };
                Vue.component('v-select', VueSelect.VueSelect);
                VueName = new Vue({
                    el: "#new_expense",
                    data: {
                        options_company: [],
                        autocompleteItems: [@foreach($tags as $tag) {
                            text: '{{$tag->title}}',
                            style: 'color:#fff;background-color:{{$tag->bg_color}}',
                        }, @endforeach],
                        accounts: [{
                            name: "Select Account",
                            id: 0
                        }, @foreach($accounts as $acc) {name: "{{$acc->name}}", id: "{{$acc->id}}"}, @endforeach],
                        form: {
                            id: 0,
                            company_id:"",
                            date: "{{date_tr()}}",
                            payment_date: "{{date_tr()}}",
                            amount: "",
                            expence_category: [],
                            bank_account_id: 0,
                            description: "",
                            tag: '',
                            tagsd: [],
                            payment_status:false,
                            pay_status: 1
                        },
                        money: {
                            decimal: ',',
                            thousands: '.',
                            precision: 2,
                            masked: true
                        },
                    },
                    computed: {
                        filteredItems() {
                            return this.autocompleteItems.filter(i => new RegExp(this.tag, 'i').test(i.text));
                        },
                    },
                    mounted: function () {
                        datePicker();
                        this.$validator.localize('en', dict);
                    },
                    methods: {  onSearch(search, loading) {
                            loading(true);
                            this.search(loading, search, this);
                        }, search: _.debounce(function (loading, search, vm) {
                            axios.get("{{route("company.source",aid())}}?q=" + search).then(function (res) {
                                Companies.company_name = search;
                                vm.options_company = res.data;

                                loading(false)
                            });

                        }, 350),
                        delete_expense:function($id){
                            swal({
                                title: "GİDER FİŞİ SİLİNECEK!",
                                text: "Bu gider fişi varsa ödemesi ile birlikte kayıtlardan silinecektir.",
                                icon: "warning",
                                buttons:["VAZGEÇ","ONAYLA"],
                                dangerMode: true,
                            })
                                .then((willCheck) => {
                                    if (willCheck) {

                                        fullLoading("Lütfen Bekleyiniz.");

                                        axios.post("{{route("finance.expenses.delete",aid())}}",{id:$id}).then(res=>{
                                            fullLoadingClose();
                                            swal("Gider fişi başarıyla silindi.", {
                                                icon: "success",
                                            });

                                            window.location.href = '{{route("finance.expenses.index",aid())}}';

                                        }).catch(error=>{
                                            fullLoadingClose();
                                            swal("İşlem hatalı lütfen daha sonra tekrar deneyiniz.", {
                                                icon: "error",
                                            });
                                        });
                                    }
                                });
                        },
                        payment_delete:function($id){
                        axios.post("{{route("finance.expenses.payment.delete",aid())}}",{id:$id}).then(res=>{
                            if(res.data== 1){
                                VueName.form.pay_status = 0;
                                VueName.form.payment_status =0;
                                notification("Success","Bu gider fişinin ödmesini sildiniz.", "success");
                            }
                        }).catch(function (error) {

                            notification("Error","Bir hata oluştu", "danger");

                        });
                        },
                        payStatusChange: function ($status) {

                            this.form.pay_status = $status
                            console.log( this.form.pay_status)
                        },
                        expense_send: function () {
                            this.$validator.validate().then((result) => {
                                if (result) {

                            $this = this;

                            if ($this.form.pay_status == 1) {

                                if ($this.form.bank_account_id != 0) {
                                    axios.post('{{route("finance.expenses.store",[aid(),0])}}', this.form)
                                        .then(function (response) {
                                            if (response.data.message) {
                                                if (response.data.message == "success") {
                                                    $("#new_expense").modal("hide");
                                                    window.location.href = '{{route("finance.expenses.index",aid())}}';

                                                }else{
                                                    notification("Error", response.data, "danger");
                                                }
                                            } else {
                                                notification("Error", response.data, "danger");
                                            }
                                        }).catch(function (error) {

                                        notification("Error", error, "danger");

                                    });

                                } else {
                                    notification("Error", "Lütfen ödeme yaptığınız banka hesabını seçin", "danger");
                                }
                            } else {

                                $this.form.bank_account_id =0
                                axios.post('{{route("finance.expenses.store",[aid(),0])}}', this.form)
                                    .then(function (response) {
                                        if (response.data.message) {
                                            if (response.data.message == "success") {
                                                $("#new_expense").modal("hide");
                                                window.location.href = '{{route("finance.expenses.index",aid())}}';

                                            }else{
                                                notification("Error", response.data, "danger");
                                            }
                                        } else {
                                            notification("Error", response.data, "danger");
                                        }
                                    }).catch(function (error) {

                                    notification("Error", error, "danger");

                                });
                            }

                                } })
                        },
                        clear: function () {
                            this.form.id = 0;
                            this.form.company_id = "";
                            this.form.date = "{{date_tr()}}";
                            this.form.payment_date = "{{date_tr()}}";
                            this.form.amount = "";
                            this.form.bank_account_id = 0;
                            this.form.description = "";
                            this.form.tag = "";
                            this.form.tagsd = [];
                            this.form.payment_status = false;
                            this.form.pay_status = 1;

                        }

                    }

                });
            });


            var responsiveHelper_dt_basic = undefined;
            var breakpointDefinition = {
                tablet: 1024,
                phone: 480
            };
            tables = $('#table').DataTable({
                "sDom": "t" +
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
                "oLanguage": {
                    "sUrl": "{{route("general.datatable.lang",aid())}}",
                    "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                },
//                stateSave: true,
                responsive: true,
//                stateDuration: 45,
                processing: true,
                "order": [[ 4, "desc" ]],
                serverSide: true,
                ajax: '{!! route('finance.expenses.index_list',aid()) !!}',
                columns: [
                    {
                        data: 'id',
                        render: function (type) {
                                return '<i class="fa fa-shopping-cart fa-2x"></i>';
                        },
                    }, {
                        data: "company_id",
                    }, {
                        data: "description"

                    }, {
                        data: "bank_item"
                    },{
                        data: "date",
                        name: "date"
                    }
                    ,{
                        data: "payment_status"
                    }
                ],
                "preDrawCallback": function () {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_dt_basic) {
                        responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#table'), breakpointDefinition);
                    }
                },
                "rowCallback": function (nRow) {
                    responsiveHelper_dt_basic.createExpandIcon(nRow);
                },
                "drawCallback": function (oSettings) {
                    responsiveHelper_dt_basic.respond();
                }
            });

            table_search(tables);

            function update(id) {
                if(id == 0){
                    VueName.clear();
                    $("#new_expense").modal("show");

                }else{

                axios.get("{{route("finance.expenses.info",aid())}}?id="+id).then(response=>{
                    VueName.form = response.data;
                   if(response.data.supplier != null)
                    VueName.form.company_id = {
                        id: response.data.supplier.id,
                        text: response.data.supplier.company_name
                    };
                   $("#new_expense").modal("show");

                });

                }
            }
        </script>


    @endpush
@endsection