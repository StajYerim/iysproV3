@extends('layouts.master')

@section('content')
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-8 sortable-grid ui-sortable">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget">

            <header role="heading" class="ui-sortable-handle"> <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>     {{ isset($user) ? 'Edit' : 'Invite user' }}</h2>

                <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

            <!-- widget div-->
            <div role="content">

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body">
                    {{-- find required POST route --}}
                    <form action="{{ isset($user) ? route('users.update', ['company' => $company, 'user' => $user]) : \App\User::getStoreRoute(Null, $company) }}"
                          method="POST">
                        @csrf

                        @if(isset($user))
                            {{-- We need patch method if we are goint to update user --}}
                            @method('PATCH')
                        @endif

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-md-right">NAME SURNAME :</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name or old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-md-right">E-MAIL :</label>

                            <div class="col-md-9">
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email or old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-md-right">MOBILE NO :</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ $user->mobile or old('mobile') }}">

                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-md-right">LANGUAGE :</label>

                            <div class="col-md-9">
                                <select class="form-control{{ $errors->has('language') ? ' is-invalid' : '' }}" name="language" required>
                                    @foreach($languages as $language)
                                        <option value="{{ $language->lang_id }}"{{ old('language') == $language->lang_id || (isset($user) && $user->lang_id == $language->lang_id) ? ' selected=selected' : '' }}>
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
                                <button type="button" class="btn btn-danger" id="permission">PERMISSIONS</button>
                            </div>
                        </div>
                            @endif
                        <hr>


                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-md-right">COMPANY ACCESS :</label>

                                <div class="col-md-9">
                                    <select class="form-control{{ $errors->has('language') ? ' is-invalid' : '' }}" name="company_access" required>
                                        {{-- TODO: extend of module-role-permissions is required--}}
                                        <option value="1"{{ old('company_access') == 1 || (isset($user) && $user->hasPermissions(1)) ? ' selected=selected' : '' }}>No Access</option>
                                        <option value="2"{{ old('company_access') == 2 || (isset($user) && $user->hasPermissions(2)) ? ' selected=selected' : '' }}>View Only</option>
                                        <option value="3"{{ old('company_access') == 3 || (isset($user) && $user->hasPermissions(3)) ? ' selected=selected' : '' }}>Full Access View/Edit</option>
                                    </select>

                                    @if ($errors->has('company_access'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('company_access') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif


                        <div class="form-group row">
                            <div class="col-sm-12 col-form-label text-md-right">
                                <a href="{{ \App\User::getIndexRoute() }}" class="btn btn-outline-dark">CANCEL</a>
                                <button type="submit" class="btn btn-primary">SUBMIT</button>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget -->


    </article>

    @if(auth()->user()->role_id == 3)

        @php

            if(auth()->user()->role_id == 1)    {
                $menu = \App\Menu::whereNull("parent_id")->where("permission",1)->orderBy("order","asc")->get();
            }else{
               $menu = \App\Menu::whereNull("parent_id")->whereIn("id",json_decode(auth()->user()->memberOfAccount["modules"]))->whereIn("permission",[2,3])->orderBy("order","asc")->get();
            }
        @endphp

    {{--İzin Modalı--}}
    <div class="modal fade" id="permissionModal" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Kullanıcı İzinleri</h4>
                </div>
                <div class="modal-body" style="padding:2px !important;">
                    <div class="tabs-left">
                        <ul class="nav nav-tabs tabs-left" id="demo-pill-nav">
                            @foreach($menu as $item)
                                <li class="{{$item->id == 1 ? "active":""}}">
                                    <a href="#tab-r{{$item->id}}" data-toggle="tab" aria-expanded="true"><span
                                                class="badge bg-color-blue txt-color-white">{{$item->submenu->count()+1}}</span> {{$item->lang}}
                                    </a>
                                </li>
                            @endforeach


                        </ul>
                        <div class="tab-content">
                            @foreach($menu as $item)
                                <div class="tab-pane {{$item->id == 1 ? "active":""}}" id="tab-r{{$item->id}}">


                                    <div class="table-responsive">
                                        <h1>{{$item->lang}} Module</h1>
                                        <table class="table">
                                            <thead>
                                            <tr>

                                                <th width="120px">NAME</th>
                                                <th width="10px">READ</th>
                                                <th width="10px">CREATE/EDIT</th>
                                                <th width="10px">DELETE</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>{{$item->lang}}</td>
                                                <td>
                                                    <div class="onoffswitch">
                                                        <input type="checkbox" name="status[]"
                                                               class="onoffswitch-checkbox "
                                                               onclick="permission_update({{$item->id}})"
                                                               id="switch-{{$item->id}}" {{in_array($item->id,json_decode($user->permissions)) == true ? "checked":""}} >
                                                        <label class="onoffswitch-label" for="switch-{{$item->id}}">
                                                            <span class="onoffswitch-inner"></span>
                                                            <span class="onoffswitch-switch"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>X</td>
                                                <td>X</td>
                                            </tr>
                                            @foreach($item->submenu as $sitem)
                                                <tr>

                                                    <td>{{$sitem->lang}}</td>
                                                    <td>
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" name="status[]"
                                                                   class="onoffswitch-checkbox "  {{in_array($sitem->id,json_decode($user->permissions)) == true ? "checked":""}}
                                                                   onclick="permission_update({{$sitem->id}})"
                                                                   id="switch-{{$sitem->id}}">
                                                            <label class="onoffswitch-label"
                                                                   for="switch-{{$sitem->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>X</td>
                                                    <td>X</td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>

                                    </div>


                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                <div class="modal-footer" style="border-top:0px">

                </div>
            </div>
        </div>
    </div>
    {{--İzin Modalı--}}
    @endif
    @push("scripts")
        @if(isset($user))
    <script>
        $("#permission").on("click", function () {
            $("#permissionModal").modal("show");
        });

        function permission_update(id) {
            axios.post("{{route("settings.users.permission.update",[aid(),$user->id])}}", {id: id}).then(res => {

            })
        }
    </script>
        @endif
    @endpush()
@endsection