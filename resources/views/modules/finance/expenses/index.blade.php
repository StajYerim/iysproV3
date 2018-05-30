@extends('layouts.master')

@section('content')


    <!-- widget grid -->
    <section id="expenses" class="">

        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget " id="wid-id-0" data-widget-editbutton="false">
                    <!-- widget div-->
                    <div>
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <!-- search mobile button (this is hidden till mobile view port) -->
                            <div id="search-mobile" class="btn-header transparent pull-right">
                                <span> <a href="javascript:void(0)" title="Search"><i
                                                class="fa fa-search"></i></a> </span>
                            </div>

                            <div class="header-search pull-left" style="margin: 0px 0px 5px 7px;min-width: 360px;">
                                <input id="search-fld" type="text">
                                <button type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                                <a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i
                                            class="fa fa-times"></i></a>
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>

                            </div>

                            <div class="pull-right new-button"  onclick="update(0)">
                                <span class="btn btn-success">GİDER EKLE</span>

                            </div>

                            <table id="table" class="table table-striped table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th width="1px">#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Account</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                            </table>

                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
                <!-- end widget -->
            </article>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="new_expense" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                   Expenses
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="expense_form" @submit.prevent="expense_send" class="form-horizontal bv-form">
                    <div class="modal-body">
                                <fieldset>
                                    <div class="form-group" :class="{'has-error': errors.has('form.name') }">
                                        <label class="col-md-3 control-label">GİDER</label>
                                        <div class="col-md-6 ">
                                            <div >
                                                <input  v-validate="'required'" type="text" class="form-control "
                                                       v-model="form.name" name="form.name">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">TARİH</label>
                                    <div class="col-md-6 ">
                                        <div >
                                            <input type="text" class="form-control datepicker"
                                                   v-model="form.date">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">AÇIKLAMA </label>
                                        <div class="col-md-6">
                                           <textarea class="form-control" v-model="form.description" rows="2"> </textarea>
                                        </div>
                                    </div>
                                </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">GİDER TÜRÜ</label>
                                    <div class="col-md-6 ">
                                        <div >
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
                                <div class="form-group" :class="{'has-error': errors.has('form.amount') }">
                                    <label class="col-md-3 control-label">TUTAR</label>
                                    <div class="col-md-6 ">
                                        <div >
                                            <money v-bind="money"  v-validate="'required'" class="form-control "
                                                   v-model="form.amount"></money>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="form-group" :class="{'has-error': errors.has('form.bank_account_id') }">
                                    <label class="col-md-3 control-label">ÖDENEN HESAP</label>
                                    <div class="col-md-6 ">
                                        <div >
                                           <select class="form-control"  v-validate="'required'" name="form.bank_account_id" v-model="form.bank_account_id">
                                               <option v-for="item in accounts" :value="item.id">@{{ item.name }}</option>
                                           </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


    </section>
    <!-- end widget grid -->
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
                $expenses = new Vue({
                    el: "#new_expense",
                    data: {
                        autocompleteItems: [@foreach($tags as $tag) {
                            text: '{{$tag->title}}',
                            style: 'background-color:{{$tag->bg_color}}',
                        }, @endforeach],
                        accounts: [{
                            name: "Select Account",
                            id: ""
                        }, @foreach($accounts as $acc) {name: "{{$acc->name}}", id: "{{$acc->id}}"}, @endforeach],
                        form: {
                            id: 0,
                            name: "",
                            date: "{{date_tr()}}",
                            amount: "",
                            expence_category: [],
                            bank_account_id: "",
                            description: "",
                            tag: '',
                            tagsd: [],
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
                        expense_send: function () {
                            this.$validator.validate().then((result) => {
                                if (result) {

                                    axios.post('{{route("finance.expenses.store",[aid(),0])}}', this.form)
                                        .then(function (response) {
                                            if (response.data.message) {
                                                if (response.data.message == "success") {
                                                    $("#new_expense").modal("hide");
                                                    window.location.href = '{{route("finance.expenses.index",aid())}}';

                                                }

                                            } else {

                                                notification("Error", response, "danger");

                                            }
                                        }).catch(function (error) {

                                        notification("Error", error.response.data.message, "danger");

                                    });

                                } else {
                                    notification("Error", "Please require fields", "danger");
                                }
                            })


                        },
                        clear: function () {
                            this.form.id = 0;
                            this.form.name = "";
                            this.form.date = "{{date_tr()}}";
                            this.form.amount = "";
                            this.form.bank_account_id = ""
                            this.form.description = ""
                            this.form.tag = ""
                            this.form.tagsd = []

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
                        data: "bank_item.bank_account.name"
                    },{
                        data: "date"
                    }
                    ,{
                        data: "id",
                        render:function($id){
                            return "<button class='btn btn-warning btn-xs' onclick='update("+$id+")'>Edit</button>";
                        }
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

            table_search(tables)

            function update(id) {
                if(id == 0){
                    $expenses.clear();
                    $("#new_expense").modal("show");

                }else{

                axios.get("{{route("finance.expenses.info",aid())}}?id="+id).then(response=>{
                   $expenses.form = response.data;
                   $("#new_expense").modal("show");

                });

                }
            }

        </script>


    @endpush
@endsection