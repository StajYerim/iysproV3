@extends('layouts.master')

@section('content')
<!-- widget grid -->
<section id="widget-grid" class="">
    <!-- row -->
    <div class="row">
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <div class="jarviswidget" id="wid-id-0">
                <header>
                    <span class="widget-icon">
                        <i class="fa fa-info"></i>
                    </span>
                    <h2>Orders </h2>

                </header>
                <!-- widget div-->
                <div>
                    <!-- widget content -->
                    <div class="widget-body no-padding">
                      <table id="table" class="table table-striped table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th width="1px">#</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                        <div class="dt-toolbar-footer">
                          <div class="col-sm-6 col-xs-12 hidden-xs">
                            <div class="dataTables_info" id="table_info" role="status" aria-live="polite">Toplam 0 Sipariş</div>
                          </div>
                          <div class="col-sm-6 col-xs-12">
                            <div class="dataTables_paginate paging_simple_numbers">
                              <ul class="pagination" id="paginate_ul">
                                
                              </ul>
                            </div>
                          </div>
                        </div>
                   </div>
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->
            </div>
            <!-- end widget -->
        </article>
        <!-- WIDGET END -->
        <!-- NEW WIDGET START -->
          <article class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
              <div class="jarviswidget" id="wid-id-0">
                  <header>
                      <span class="widget-icon">
                          <i class="fa fa-info"></i>
                      </span>
                      <h2>Searches </h2>

                  </header>
                  <!-- widget div-->
                  <div>
                      <!-- widget content -->
                      <div class="widget-body">
                        <ul class="nav nav-pills nav-stacked" id="order-status">
                          <li role="presentation" class="active"><a href="#">All</a></li>
                          <li role="presentation"><a href="#">New</a></li>
                          <li role="presentation"><a href="#">Approved</a></li>
                          <li role="presentation"><a href="#">Rejected</a></li>
                          <li role="presentation"><a href="#">Shipped</a></li>
                          <li role="presentation"><a href="#">Delivered</a></li>
                          <li role="presentation"><a href="#">Completed</a></li>
                          <li role="presentation"><a href="#">Claimed</a></li>
                        </ul>
                     </div>
                      <!-- end widget content -->
                  </div>
                  <!-- end widget div -->
              </div>
              <!-- end widget -->
              <div class="jarviswidget" id="wid-id-0">
                    <header>
                        <span class="widget-icon">
                            <i class="fa fa-info"></i>
                        </span>
                        <h2>N11 Orders Job </h2>

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
      <script>
        window.status = "";
        
        function renderRow(data) {
            var status;
            if (data.status == 0) status = '<span class="label label-primary">New</span>';
            else if (data.status == 1) status = '<span class="label label-primary">Approved</span>';
            else if (data.status == 2) status = '<span class="label label-danger">Rejected</span>';
            else if (data.status == 3) status = '<span class="label label-info">Shipped</span>';
            else if (data.status == 4) status = '<span class="label label-info">Delivered</span>';
            else if (data.status == 5) status = '<span class="label label-success">Completed</span>';
            else if (data.status == 6) status = '<span class="label label-success">Claimed</span>';
            
            $("#table tbody").append(`
              <tr class="row-title odd" role="row" data-id="${data.id}">
                <td class="sorting_1">${data.id}</td>
                <td>${status}</td>
                <td>${data.createDate}</td>
                <td>${data.citizenshipId}</td>
                <td>${data.totalAmount}₺</td>
              </tr>`);
        }
        
        function fetchData(page, status, first = false) {
          $.get("{!! route('ecommerce.orders.index_list',aid()) !!}?page=" + page + "&status=" + status, function(data) {
           $("#table_info").html(`Toplam ${data.pagingData.totalCount} Sipariş`);
           if(first) {
             for(var i = 1; i <= data.pagingData.pageCount; i++) {
               $("#paginate_ul").append(`
                <li class="paginate_button">
                  <a href="#">${i}</a>
                </li>`);
             }
           }
           data.orderList.order.forEach(function(data) {
             renderRow(data);
           });
          });
        }
        
        fetchData(0, window.status, true);
        
        $("#order-status li a").click(function(e) {
          $("#table tbody").empty();
          $("#order-status li").removeClass("active");
          $(this).parent().addClass("active");
          window.status = $(this).text();
          $("#paginate_ul").empty();
          $("#table_info").html(`Yükleniyor..`);
          fetchData(0, window.status, true);
          e.preventDefault();
        });
        
        $(document).on('click', '#paginate_ul li a', function(e) { 
          $("#table tbody").empty();
          $("#table_info").html(`Yükleniyor..`);
          var page = $(this).text();
          fetchData(parseInt(page) - 1, window.status);
          e.preventDefault();
        });
        
        $(document).on('click', '#table tbody tr', function(e) {
          var url = "{!! route('ecommerce.orders.show', [aid(), ':id']) !!}";
          url = url.replace(':id', $(this).data('id'));
          window.location.href = url;
          e.preventDefault();
        });
      </script>
    @endpush
@endsection