@extends('layouts.master')

@section('content')

    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget">

            <header role="heading" class="ui-sortable-handle">
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>   Account Users</h2>
                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

            <!-- widget div-->
            <div role="content">



                <!-- widget content -->
                <div class="widget-body no-padding">


                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                @admin
                                <th>ID</th>
                                @endadmin
                                <th>NAME SURNAME</th>
                                <th>E-MAIL</th>
                                <th>STATUS</th>
                                <th>ROLE</th>
                                <th>EDIT</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    @admin
                                    <th>{{ $user->id }}</th>
                                    @endadmin
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->confirmed ? 'ACTIVE' : 'NOT ACTIVE' }}</td>
                                    <td>{{ strtoupper($user->role->name) }}</td>
                                    <td><a href="{{ route('users.edit', ['company' => $user->memberOfAccount, 'user' => $user]) }}">Edit</a></td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>

@endsection