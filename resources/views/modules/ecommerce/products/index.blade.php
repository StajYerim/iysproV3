@extends('layouts.master')

@section('content')
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{trans("sentence.add_product")}}</h4>
      </div>
      <div class="modal-body">
        <form id="add-product-form" action="{{ route('ecommerce.products.add_product', [ aid() ]) }}" method="POST">
          @csrf
          <input type="hidden" name="category">
          <div id="wizard">
            <h1>{{trans("word.category")}}</h1>
            <div>
              <div class="form-group">
                <select class="form-control" id="n11-category-list" size="5"></select>
              </div>
              <div class="form-group">
                <div class="col-md-6" style="margin-bottom:10px;padding-left:0">
                  <select class="form-control" id="n11-subcategory-list-1" size="5"></select>
                </div>
                <div class="col-md-6" style="margin-bottom:10px;padding-right:0">
                  <select class="form-control" id="n11-subcategory-list-2" size="5"></select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6" style="padding-left:0">
                  <select class="form-control" id="n11-subcategory-list-3" size="5"></select>
                </div>
                <div class="col-md-6" style="padding-right:0">
                  <select class="form-control" id="n11-subcategory-list-4" size="5"></select>
                </div>
              </div>
            </div>

            <h1>{{trans("sentence.product_detail")}}</h1>
            <div>
              <div class="form-group">
                <label>{{trans("sentence.choose_product")}}</label>
                <select name="product" class="form-control" id="product-list" size="5"></select>
              </div>
              <div class="form-group">
                <label>{{trans("sentence.shop_code")}}</label>
                <input type="text" name="store_code" placeholder="000000" autocomplete="OFF" class="form-control">
              </div>
              <div class="form-group">
                <label>{{trans("sentence.sales_price")}}</label>
                <input type="text" name="price" value="0,00" autocomplete="OFF" class="form-control">
              </div>
              <div class="form-group">
                <label>{{trans("sentencel.stock_number")}}</label>
                <input type="text" name="stock" value="1" autocomplete="OFF" class="form-control">
              </div>
            </div>
            
            <h1>{{trans("word.description")}}</h1>
            <div>
              <div class="form-group">
                <label>{{trans("word.description")}}</label>
                <textarea name="description" class="form-control" rows="5"></textarea>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">{{trans("word.close")}}</button>
      </div>
    </div>
  </div>
</div>

<section id="widget-grid" class="">
    <div class="row">
        <a href="#" data-toggle="modal" data-target="#myModal" style="margin-top:8px;margin-right:13px;margin-bottom:8px;float: right;" class="btn btn-success">
          <i class="fa fa-plus"></i> {{trans("sentence.add_product")}}
        </a>
        <a href="#" style="margin-top:8px;margin-right:8px;margin-bottom:8px;float: right;" class="btn btn-default">
          <i class="fa fa-filter"></i> {{trans("word.filter")}}
        </a>
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-0">
                <header>
                    <span class="widget-icon">
                        <i class="fa fa-comments"></i>
                    </span>
                    <h2>{{trans("word.product")}} </h2>
                </header>
                <div style="padding:5px 13px 0">
                    <div class="widget-body no-padding">
                        
                        <table id="table" class="table table-striped table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th width="1px">#</th>
                                    <th>{{trans("word.code")}}</th>
                                    <th>{{trans("word.name")}}</th>
                                    <th>{{trans("word.api")}}</th>
                                    <th>{{trans("sentence.stock_quantity")}}</th>
                                    <th>{{trans("sentence.sales_price")}}</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </article>
    </div>
</section>
    @push('scripts')
        <script src="/js/plugin/datatables/jquery.dataTables.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.colVis.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.tableTools.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
        <script src="/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
        <script src="/js/jquery.steps.min.js"></script>
        <script type="text/javascript">
            $("#wizard").steps({
             onFinished: function (event, currentIndex) {
              $("#add-product-form").submit();
              fullLoading("Ekleniyor...");
             },
             labels: {
                cancel: "İptal",
                current: "current step:",
                pagination: "Sayfalama",
                finish: "Ekle",
                next: "İleri",
                previous: "Geri",
                loading: "Yükleniyor ..."
            }});
            function getCategories(id = null, nextElement = null) {
                fullLoading("Loading...");
                if (id === null) {
                    $.get("{!! route('ecommerce.products.categories', aid()) !!}", function ({ categoryList }) {
                        $('body').loadingModal('destroy');
                        categoryList.category.forEach(function(element) {
                            $("#n11-category-list").append(`<option value="${element.id}">${element.name}</option>`);
                        });
                    });
                } else {
                    $.get(`{!! route('ecommerce.products.categories', aid()) !!}/${id}`, function ({ category }) {
                        $('body').loadingModal('destroy');
                        if (category.subCategoryList) {
                            category.subCategoryList.subCategory.forEach(function(element) {
                                nextElement.append(`<option value="${element.id}">${element.name}</option>`);
                            });    
                        } else {
                            alert("Başka Alt Kategori Kalmadı!");
                        }
                    });
                }
                $('input[name="category"]').val(id);
            }
            
            getCategories();

            $.get("{!! route('stock.index_list', aid()) !!}", function ({ data }) {
                data.forEach(function(element) {
                    $("#product-list").append(`<option value="${element.id}">${element.named.name}</option>`);
                });
            });

            $("#n11-category-list").change(function() {
                var id = $(this).val();
                var element = $("#n11-subcategory-list-1");
                $("#n11-subcategory-list-1").empty();
                getCategories(id, element);
            });

            $("#n11-subcategory-list-1").change(function() {
                var id = $(this).val();
                var element = $("#n11-subcategory-list-2");
                $("#n11-subcategory-list-2").empty();
                getCategories(id, element);
            });

            $("#n11-subcategory-list-2").change(function() {
                var id = $(this).val();
                var element = $("#n11-subcategory-list-3");
                $("#n11-subcategory-list-3").empty();
                getCategories(id, element);
            });

            $("#n11-subcategory-list-3").change(function() {
                var id = $(this).val();
                var element = $("#n11-subcategory-list-4");
                $("#n11-subcategory-list-4").empty();
                getCategories(id, element);
            });

            $("#n11-subcategory-list-4").change(function() {
                // !!!!
            });

            $("input[name='price']").focusout(function() {
                var new_money = money_clear($(this).val()).toLocaleString('tr-TR', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 4
                });
                $(this).val(new_money);
            });

            tables = $('#table').DataTable({
                "sDom": "t" +
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
                "oLanguage": {
                    "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                },
                "autoWidth": true,
                stateSave: true,
                responsive: true,
                stateDuration: 45,
                processing: true,
                serverSide: true,
                ajax: '{!! route('ecommerce.products.index_list',aid()) !!}',
                columns: [
                    {
                        data: 'id',
                        render: function ($name) {
                            return '<i class="fa fa-cube fa-2x"></i>';
                        },
                    }, {
                        data: "store_code",
                    }, {
                        data: "name.name",
                    }, {
                        data: "ecommerce_type"
                    },{
                        data: "stock"
                    }, {
                        data: "price"
                    }
                ]
            });

           table_search(tables)
        </script> 
    @endpush
@endsection