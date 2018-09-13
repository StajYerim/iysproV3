@extends('layouts.master')

@section('content')
    <div id="sales_expenses_vat">
        <section id="widget-grid" class="col-sm-12">
            <div class="jarviswidget" id="wid-id-0">

                <header style="padding-left:10px;">
                    <b>{{ trans('sentence.vat_reports_per_calendar_month') }}</b>
                </header>

                <div>
                    <div class="widget-body no-padding">
                        <table id="table" class="table table-striped table-hover" width="100%">
                            <thead>
                            <tr>
                                <th>{{ trans('word.month') }}</th>
                                <th>{{ trans('sentence.calculated_vat') }}</th>
                                <th>{{ trans('sentence.reduced_vat') }}</th>
                                <th>{{ trans('sentence.clear_vat') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            for($i=12; $i>=1; $i--)
                            {
                                $sales= \App\Model\Sales\SalesOrders::where("account_id",aid())->whereMonth("date",$i)->sum('vat_total');
                                $purchase= \App\Model\Purchases\PurchaseOrders::where("account_id",aid())->whereMonth('date',$i)->sum('vat_total');
                                $net_vat = $sales-$purchase;

                            ?>
                           @if(get_money($sales) != "0,00" || get_money($purchase) != "0,00")

                               <tr data-month="{{$i}}" class="month">
                                   <td><b>{{give_me_month_name($i)}}</b></td>
                                   <td>{{get_money($sales)}} <i class="fa fa-try"></i></td>
                                   <td>{{get_money($purchase)}} <i class="fa fa-try"></i></td>
                                   <td>{{get_money($net_vat)}} <i class="fa fa-try"></i></td>
                               </tr>
                            @endif
                            <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </section>

        <section class="col-sm-12 section_sales_expenses" id="widget-grid" style="margin-bottom: 50px; display: none;">
            <div class="jarviswidget">
                <header style="padding-left:10px;">
                    <div>
                        <span style=" float: none;margin: 0 auto;">
                            <b class="hangi_ay"></b>
                        </span>
                        <div class="pull-right nav nav-tabs">
                            <a data-toggle="tab" href="#sales" class="btn btn-xs btn-primary">{{ trans('word.sales') }}</a>
                            <a data-toggle="tab" href="#expenses" class="btn btn-xs btn-primary">{{ trans('word.expense')  }}</a>
                        </div>
                    </div>
                </header>
                <div>
                    <div class="widget-body no-padding tab-content">
                        <div id="sales" class="tab-pane fade in active">
                            <table class="table table-striped table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>{{ trans('word.type') }}</th>
                                        <th>{{ trans('word.description') }}</th>
                                        <th>{{ trans('word.customer') }} / {{ trans('word.supplier') }}</th>
                                        <th>{{ trans('sentence.edit_date') }}<th>
                                        <th>{{ trans('word.vat') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="sales_table_body">
                                </tbody>
                            </table>
                        </div>
                        <div id="expenses" class="tab-pane fade">
                            <table id="expenses" class="table table-striped table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>{{ trans('word.type') }}</th>
                                        <th>{{ trans('word.description') }}</th>
                                        <th>{{ trans('word.customer') }} / {{ trans('word.supplier') }}</th>
                                        <th>{{ trans('sentence.edit_date') }}<th>
                                        <th>{{ trans('word.vat') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="expenses_table_body">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(function(){
            function get_month_name(month){
                var month_name='';
                month_name += (month == 1) ? "{{ trans('month.january') }}" : '';
                month_name += (month == 2) ? "{{ trans('month.february') }}" : '';
                month_name += (month == 3) ? "{{ trans('month.march') }}" : '';
                month_name += (month == 4) ? "{{ trans('month.april') }}" : '';
                month_name += (month == 5) ? "{{ trans('month.may') }}" : '';
                month_name += (month == 6) ? "{{ trans('month.june') }}" : '';
                month_name += (month == 7) ? "{{ trans('month.july') }}" : '';
                month_name += (month == 8) ? "{{ trans('month.august') }}" : '';
                month_name += (month == 9) ? "{{ trans('month.september') }}" : '';
                month_name += (month == 10) ? "{{ trans('month.october') }}" : '';
                month_name += (month == 11) ? "{{ trans('month.november') }}" : '';
                month_name += (month == 12) ? "{{ trans('month.december') }}" : '';
                return month_name;
            }

            $(".month").on('click',function(){
                $('.section_sales_expenses').show();
                $('.sales_table_body').empty();
                $('.expenses_table_body').empty();
                var content_sales = "";
                var content_expenses = "";
                month       = $(this).data("month");
                month_name  = get_month_name(month);
                $(".hangi_ay").html(month_name+ " - {{ trans('sentence.sales_and_expenses_vat_table') }}");

                $.ajax({
                    type: "POST",
                    url: '{{route('finance.vat_report.month',aid())}}',
                    data: { month:month },
                    success: function(response){
                        console.log(response);
                        if(response.sales.length == 0)
                        {
                            content_sales += '<tr><td align="center" colspan="5"><b>'+ get_month_name(month) +' - {{ trans("sentence.any_sales_invoice_was_not_created") }}</b></td></tr>';
                        }
                        else
                        {
                            $.each(response.sales,function(index){
                                if(response.sales[index].description == null){
                                    response.sales[index].description = "";
                                }
                                content_sales += '<tr>' +
                                    '<td>{{ trans("sentence.sales_invoice") }}</td>' +
                                    '<td>'+response.sales[index].description+'</td>' +
                                    '<td>'+response.sales[index].company.company_name+'</td>' +
                                    '<td>'+response.sales[index].date+'</td>' +
                                    '<td>'+response.sales[index].vat_total+' <i class="fa fa-try"></i></td>' +

                                    '</tr> ';
                            });
                        }

                        if(response.purchase.length == 0)
                        {
                            content_expenses += '<tr><td align="center" colspan="5"><b>'+ get_month_name(month) +' - {{ trans("sentence.any_sales_invoice_was_not_created") }}</b></td></tr>';
                        }
                        else
                        {
                            $.each(response.purchase,function(index){
                                if(response.purchase[index].description == null){
                                    response.purchase[index].description = "";
                                }
                                content_expenses += '<tr>' +
                                    '<td>{{ trans("word.receipt") }}/{{ trans("word.invoice") }}</td>' +
                                    '<td>'+response.purchase[index].description+'</td>' +
                                    '<td>'+response.purchase[index].company.company_name+'</td>' +
                                    '<td>'+response.purchase[index].date+'</td>' +
                                    '<td>'+response.purchase[index].vat_total+' <i class="fa fa-try"></i></td>' +
                                    '</tr>';
                            });
                        }
                        $('.sales_table_body').html(content_sales);
                        $('.expenses_table_body').html(content_expenses);
                    },
                    dataType:'json'
                });
            });

        });
    </script>

@endsection