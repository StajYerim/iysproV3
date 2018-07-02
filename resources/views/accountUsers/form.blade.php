@extends('layouts.master')

@section('content')
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-8 sortable-grid ui-sortable">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-0" data-widget-editbutton="false" role="widget">

            <header role="heading" class="ui-sortable-handle"> <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>     {{ isset($user) ? '' : 'Invite user' }}</h2>

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
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-md-right"></label>

                            <div class="col-md-9">
                                <button type="button" class="btn btn-danger" id="permission">PERMISSIONS</button>
                            </div>
                        </div>
                        <hr>

                        {{-- Owner can not set permissions for himself --}}
                        @if(!isset($user) || auth()->id() != $user->id)
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

                    <form id="permissionForm">
                        <div class="panel-group smart-accordion-default" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapseOne" aria-expanded="true" class=""> <i
                                                    class="fa fa-lg fa-angle-down pull-right"></i> <i
                                                    class="fa fa-lg fa-angle-up pull-right"></i> İŞ LİSTESİ İZİNLERİ</a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true" style="">
                                    <div class="panel-body no-padding">
                                        <table class="table table-bordered table-condensed">
                                            <thead>
                                            <tr>
                                                <th width="200px">İŞLEM SAYFALARI</th>
                                                <th>GÖSTER</th>
                                                <th>EKLE</th>
                                                <th>SİL</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($permissions as $permission)
                                                @php
                                                    $name = explode("*",$permission->name);
                                                @endphp
                                                @if($name[1] == "İŞ LİSTESİ")
                                                    <tr>
                                                        <td>

                                                            <h7>{{$name[1]}}</h7>

                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input name="permission[]" value="{{$permission->name}}"
                                                                       @if($user->can($permission->name)) checked
                                                                       @endif type="checkbox" class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input type="checkbox" disabled
                                                                       class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input type="checkbox" disabled
                                                                       class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapseTwo" class="collapsed"
                                                               aria-expanded="false">
                                            <i class="fa fa-lg fa-angle-down pull-right"></i> <i
                                                    class="fa fa-lg fa-angle-up pull-right"></i>SATIŞ İŞLEMLERİ İZİNLERİ
                                        </a></h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 0px;">
                                    <div class="panel-body no-padding">
                                        <table class="table table-bordered table-condensed">
                                            <thead>
                                            <tr>
                                                <th width="200px">İŞLEM SAYFALARI</th>
                                                <th>GÖSTER</th>
                                                <th>EKLE</th>
                                                <th>SİL</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($permissions as $permission)
                                                @php
                                                    $name = explode("*",$permission->name);


                                                @endphp
                                                @if($name[0] == "1" )
                                                    <tr>
                                                        <td>

                                                            <h7>{{$name[1]}}</h7>

                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input name="permission[]" value="{{$permission->name}}"
                                                                       @if($user->can($permission->name)) checked
                                                                       @endif type="checkbox" class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input type="checkbox" disabled
                                                                       class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input type="checkbox" disabled
                                                                       class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapseThree" class="collapsed"
                                                               aria-expanded="false"> <i
                                                    class="fa fa-lg fa-angle-down pull-right"></i> <i
                                                    class="fa fa-lg fa-angle-up pull-right"></i> SATIN ALMA İZİNLERİ</a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 0px;">
                                    <div class="panel-body no-padding">
                                        <table class="table table-bordered table-condensed">
                                            <thead>
                                            <tr>
                                                <th width="200px">İŞLEM SAYFALARI</th>
                                                <th>GÖSTER</th>
                                                <th>EKLE</th>
                                                <th>SİL</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($permissions as $permission)
                                                @php
                                                    $name = explode("*",$permission->name);


                                                @endphp
                                                @if($name[0] == "2" )
                                                    <tr>
                                                        <td>

                                                            <h7>{{$name[1]}}</h7>

                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input name="permission[]" value="{{$permission->name}}"
                                                                       @if($user->can($permission->name)) checked
                                                                       @endif type="checkbox" class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input type="checkbox" disabled
                                                                       class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input type="checkbox" disabled
                                                                       class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapseFour" class="collapsed"
                                                               aria-expanded="false">
                                            <i class="fa fa-lg fa-angle-down pull-right"></i> <i
                                                    class="fa fa-lg fa-angle-up pull-right"></i> FİNANS İZİNLERİ</a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 0px;">
                                    <div class="panel-body no-padding">
                                        <table class="table table-bordered table-condensed">
                                            <thead>
                                            <tr>
                                                <th width="200px">İŞLEM SAYFALARI</th>
                                                <th>GÖSTER</th>
                                                <th>EKLE</th>
                                                <th>SİL</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($permissions as $permission)
                                                @php
                                                    $name = explode("*",$permission->name);


                                                @endphp
                                                @if($name[0] == "3" )
                                                    <tr>
                                                        <td>

                                                            <h7>{{$name[1]}}</h7>

                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input name="permission[]" value="{{$permission->name}}"
                                                                       @if($user->can($permission->name)) checked
                                                                       @endif type="checkbox" class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input type="checkbox" disabled
                                                                       class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input type="checkbox" disabled
                                                                       class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapseFive" class="collapsed"
                                                               aria-expanded="false">
                                            <i class="fa fa-lg fa-angle-down pull-right"></i> <i
                                                    class="fa fa-lg fa-angle-up pull-right"></i> STOK İZİNLERİ </a></h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 0px;">
                                    <div class="panel-body no-padding">
                                        <table class="table table-bordered table-condensed">
                                            <thead>
                                            <tr>
                                                <th width="200px">İŞLEM SAYFALARI</th>
                                                <th>GÖSTER</th>
                                                <th>EKLE</th>
                                                <th>SİL</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($permissions as $permission)
                                                @php
                                                    $name = explode("*",$permission->name);
                                                @endphp
                                                @if($name[0] == "4" )
                                                    <tr>
                                                        <td>

                                                            <h7>{{$name[1]}}</h7>

                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input name="permission[]" value="{{$permission->name}}"
                                                                       @if($user->can($permission->name)) checked
                                                                       @endif type="checkbox" class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input type="checkbox" disabled
                                                                       class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input type="checkbox" disabled
                                                                       class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
                                                               href="#collapseSix" class="collapsed"
                                                               aria-expanded="false">
                                            <i class="fa fa-lg fa-angle-down pull-right"></i> <i
                                                    class="fa fa-lg fa-angle-up pull-right"></i> ÜRETİM PLANLAMA İZİNLERİ </a></h4>
                                </div>
                                <div id="collapseSix" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 0px;">
                                    <div class="panel-body no-padding">
                                        <table class="table table-bordered table-condensed">
                                            <thead>
                                            <tr>
                                                <th width="200px">İŞLEM SAYFALARI</th>
                                                <th>GÖSTER</th>
                                                <th>EKLE</th>
                                                <th>SİL</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($permissions as $permission)
                                                @php
                                                    $name = explode("*",$permission->name);
                                                @endphp
                                                @if($name[0] == "5" )
                                                    <tr>
                                                        <td>

                                                            <h7>{{$name[1]}}</h7>

                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input name="permission[]" value="{{$permission->name}}"
                                                                       @if($user->can($permission->name)) checked
                                                                       @endif type="checkbox" class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input type="checkbox" disabled
                                                                       class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td><label class="checkbox-inline">
                                                                <input type="checkbox" disabled
                                                                       class="checkbox style-3">
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Vazgeç
                    </button>
                    <button type="button" class="btn btn-primary" id="permissionSave">
                        Kaydet
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--İzin Modalı--}}

    @push("scripts")
    <script>
        $("#permission").on("click", function () {
            $("#permissionModal").modal("show");
        });

        $("#permissionSave").on("click", function () {
            ajaxEnd("post", "{{route("permission.AddEdit",$user->id)}}", $("#permissionForm").serialize(), function (res) {
                if (res == "ok") {
                    bildirim("İşlem Başarılı", "Kullanıcı yetkileri düzenlendi", "success", "check");
                    $("#permissionModal").modal("hide");
                }
            }, function () {
                bildirim("İşlem Hatalı", "Kullanıcı yetkileri düzenlenemedi", "error", "remove");
                $("#permissionModal").modal("hide");
            })

        });
    </script>
    @endpush()
@endsection