@extends('layouts.master')

@section('content')
<!-- widget grid -->
<section id="widget-grid" class="">
    <!-- row -->
    <div class="row">
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="jarviswidget" id="wid-id-0">
                <header>
                    <span class="widget-icon">
                        <i class="fa fa-comments"></i>
                    </span>
                    <h2>Ürün Ekle </h2>

                </header>
                <!-- widget div-->
                <div>
                    <!-- widget content -->
                    <div class="widget-body">
                        <form action="{{ route('ecommerce.products.add_product', [ aid() ]) }}" method="POST" class="form-horizontal">
                            @csrf
                            <input type="hidden" name="category">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Ürün</label>
                                    <div class="col-md-4">
                                        <select name="product" class="form-control" id="product-list"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">N11 Ana Kategori</label>
                                    <div class="col-md-4">
                                        <select class="form-control" id="n11-category-list"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-4">
                                        <select id="n11-subcategory-list-1" class="form-control"></select>
                                    </div>
                                    <div class="col-md-4">
                                        <select id="n11-subcategory-list-2" class="form-control"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-4">
                                        <select id="n11-subcategory-list-3" class="form-control"></select>
                                    </div>
                                    <div class="col-md-4">
                                        <select id="n11-subcategory-list-4" class="form-control"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Mağaza Kodu</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" name="store_code" placeholder="000000" autocomplete="OFF" class="form-control ">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Satış Fiyatı</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" name="price" value="0,00" autocomplete="OFF" class="form-control ">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Stok Sayısı</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" name="stock" value="1" autocomplete="OFF" class="form-control ">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Açıklama</label>
                                    <div class="col-md-9">
                                        <textarea name="description" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <button type="submit" href="#" class="btn btn-success">
                                            Ekle
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->
            </div>
            <!-- end widget -->
        </article>
        <!-- WIDGET END -->
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="jarviswidget" id="wid-id-0">
                <header>
                    <span class="widget-icon">
                        <i class="fa fa-comments"></i>
                    </span>
                    <h2>Ürünler </h2>

                </header>
                <!-- widget div-->
                <div>
                    <!-- widget content -->
                    <div class="widget-body no-padding">

                        <table id="table" class="table table-striped table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th width="1px">#</th>
                                    <th>Code</th>
                                    <th>Adı</th>
                                    <th>Stok Miktarı</th>
                                    <th>Satış Fiyatı</th>
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
        <!-- WIDGET END -->
    </div>
    <!-- end row -->
</section>
<!-- end widget grid -->
    @push('scripts')
        <script src="/js/plugin/datatables/jquery.dataTables.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.colVis.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.tableTools.min.js"></script>
        <script src="/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
        <script src="/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
        <script type="text/javascript">
            function getCategories(id = null, nextElement = null) {
                if (id === null) {
                    $.get("{!! route('ecommerce.products.categories', aid()) !!}", function ({ categoryList }) {
                        categoryList.category.forEach(function(element) {
                            $("#n11-category-list").append(`<option value="${element.id}">${element.name}</option>`);
                        });
                    });
                } else {
                    $.get(`{!! route('ecommerce.products.categories', aid()) !!}/${id}`, function ({ category }) {
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