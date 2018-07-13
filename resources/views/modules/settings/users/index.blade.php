@extends('layouts.master')
@section('content')

    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget">

            <header role="heading" class="ui-sortable-handle">
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>   Account Users</h2>
                <div class="pull-right">

                    <a href="!#" data-toggle="modal" data-target="#new_invite">
                        <span class="btn btn-success btn-sm">{{trans("general.new")}} {{trans("general.invite")}}</span>
                    </a>
                </div>
                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

            <!-- widget div-->
            <div role="content">



                <!-- widget content -->
                <div class="widget-body no-padding">


                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{trans("general.name")}} {{trans("general.surname")}}</th>
                                <th>{{trans("general.email")}}</th>
                                <th>{{trans("general.status")}}</th>
                                <th>{{trans("general.role")}}</th>
                                <th>{{trans("general.edit")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>

                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->confirmed ? 'ACTIVE' : 'NOT ACTIVE' }}</td>
                                    <td>{{ strtoupper($user->role->name) }}</td>
                                    <td><a href="{{ route('settings.users.edit',[aid(),$user->id]) }}">Edit</a></td>
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
        <!-- Modal -->
        <div id="new_invite" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form action="{{ route("settings.users.store",aid()) }}"
                      method="POST">
                    @csrf

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{trans("general.model")}} {{trans("general.header")}}</h4>
                    </div>
                    <div class="modal-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-md-right">{{trans("general.name")}} {{trans("general.surname")}} :</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-md-right">{{trans("general.email")}} :</label>

                                <div class="col-md-9">
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-md-right">{{trans("general.mobile")}} {{trans("general.number")}} :</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="">

                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-md-right">{{trans("general.language")}} :</label>

                                <div class="col-md-9">
                                    @php $languages = \App\Language::All(); @endphp
                                    <select class="form-control{{ $errors->has('language') ? ' is-invalid' : '' }}" name="language" required>
                                        @foreach($languages as $language)
                                            <option value="{{ $language->lang_id }}" >
                                                {{ $language->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('language'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('language') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        {{-- Owner can not set permissions for himself --}}
                        @if(!isset($user) || auth()->id() != $user->id)
                            @if(auth()->user()->role_id == 3)
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-md-right"></label>

                                    <div class="col-md-9">
                                        <button type="button" class="btn btn-danger" id="permission">{{trans("general.permissions")}}</button>
                                    </div>
                                </div>
                            @endif
                            <hr>



                        @endif
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-md-right">{{trans("general.company")}} {{trans("general.access")}} :</label>

                            <div class="col-md-9">
                                <select class="form-control{{ $errors->has('language') ? ' is-invalid' : '' }}" name="company_access" required>
                                    {{-- TODO: extend of module-role-permissions is required--}}
                                    <option value="1"{{ old('company_access') == 1 || (isset($user) && $user->hasPermissions(1)) ? ' selected=selected' : '' }}>{{trans("general.no")}} {{trans("general.access")}}</option>
                                    <option value="2"{{ old('company_access') == 2 || (isset($user) && $user->hasPermissions(2)) ? ' selected=selected' : '' }}>{{trans("general.view")}} {{trans("general.only")}}</option>
                                    <option value="3"{{ old('company_access') == 3 || (isset($user) && $user->hasPermissions(3)) ? ' selected=selected' : '' }}>{{trans("general.full")}} {{trans("general.access")}} {{trans("general.view")}}/{{trans("general.edit")}}</option>
                                </select>

                                @if ($errors->has('company_access'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('company_access') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans("general.close")}}</button>
                        <button type="submit" class="btn btn-success" >{{trans("general.save")}}</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
@endsection