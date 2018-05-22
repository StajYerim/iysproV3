@extends('layouts.master')

@section('content')
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget">

            <header role="heading" class="ui-sortable-handle">
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>   Lang Description List</h2>
                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

        <!-- widget div-->
        <div role="content">



            <!-- widget content -->
            <div class="widget-body no-padding">


                <div class="table-responsive">

                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>COMPANY NAME</th>
                            <th>NAME SURNAME</th>
                            <th>MOBILE</th>
                            <th>SECTOR</th>
                            <th>EXPIRY</th>
                            <th>EDIT</th>
                            <th>INVITE</th>
                        </tr>
                        </thead>
                        <tbody>



                        </tbody>
                    </table>

                </div>
            </div>
            <!-- end widget content -->

        </div>
        <!-- end widget div -->

    </div>

@endsection