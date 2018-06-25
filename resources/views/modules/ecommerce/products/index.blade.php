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
                        <form action="" class="form-horizontal">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Ürün</label>
                                    <div class="col-md-4">
                                        <select class="form-control" id="product-list"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Satış Fiyatı</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <input type="text" name="selling_price" value="0,00" autocomplete="OFF" class="form-control ">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Açıklama</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" rows="5"></textarea>
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
                    <div class="widget-body">

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
        <script type="text/javascript">
            $.get("{!! route('stock.index_list', aid()) !!}", function ({ data }) {
                data.forEach(function(element) {
                    $("#product-list").append(`<option value="${element.id}">${element.named.name}</option>`);
                });
            });

            $("input[name='selling_price']").focusout(function() {
                var new_money = money_clear($(this).val()).toLocaleString('tr-TR', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 4
                });
                $(this).val(new_money);
            });
        </script> 
    @endpush
@endsection