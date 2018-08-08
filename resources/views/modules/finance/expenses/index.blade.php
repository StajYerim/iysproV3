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
                                    <th>{{trans("word.name")}}</th>
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
                                        {{trans("word.expense")}}</label>
                                    <div class="col-md-6 ">
                                        <div >
                                            <input type="text" class="form-control "
                                                   v-model="form.name" name="form.name">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{trans("word.date")}}</label>
                                    <div class="col-md-6 ">
                                        <div>
                                            <input type="text" class="form-control datepicker" name="form.date"
                                                   v-model="form.date">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{trans("word.description")}} </label>
                                        <div class="col-md-6">
                                           <textarea class="form-control" v-model="form.description" rows="2"> </textarea>
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
                                           name="form.payment_date"
                                           v-model="form.payment_date">
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
                                            <money v-bind="money" class="form-control "
                                                   v-model="form.amount"></money>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans("word.close")}}</button>
                        <button type="submit" class="btn btn-primary">{{trans("word.save")}} </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


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
                VueName = new Vue({
                    el: "#new_expense",
                    data: {
                        autocompleteItems: [@foreach($tags as $tag) {
                            text: '{{$tag->title}}',
                            style: 'background-color:{{$tag->bg_color}}',
                        }, @endforeach],
                        accounts: [{
                            name: "Select Account",
                            id: 0
                        }, @foreach($accounts as $acc) {name: "{{$acc->name}}", id: "{{$acc->id}}"}, @endforeach],
                        form: {
                            id: 0,
                            name: "",
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
                    },
                    methods: {
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

                        },
                        clear: function () {
                            this.form.id = 0;
                            this.form.name = "";
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
                    "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                },
                stateSave: true,
                responsive: true,
                stateDuration: 45,
                processing: true,
                serverSide: true,
                ajax: '{!! route('finance.expenses.index_list',aid()) !!}',
                columns: [
                    {
                        data: 'id',
                        render: function (type) {
                                return '<i class="fa fa-shopping-cart fa-2x"></i>';
                        },
                    }, {
                        data: "name",
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
                   $("#new_expense").modal("show");

                });

                }
            }

        </script>


    @endpush
@endsection