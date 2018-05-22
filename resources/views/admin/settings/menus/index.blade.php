@extends("layouts.master")
@section("content")
    <!-- widget grid -->
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-sm-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget well" id="wid-id-0">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-comments"></i> </span>
                        <h2>My Data </h2>
                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body" id="routeCrud">
                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->

            </article>
            <!-- WIDGET END -->
        </div>
    </section>
    <template id="add-admin-route">
        <section>

            <form  v-on:submit.prevent="createAdminRoute">


                <fieldset>
                    <legend>
                        Add New Admin Route <span class="pull-right">
                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-save"></i>
                                Save
                            </button>
                            <router-link to="/" class="btn btn-primary">
                                <i class="fa fa-back"></i>
                                Cancel
                            </router-link>
                        </span>
                    </legend>
                    <div class="form-group">

                        <div class="row">
                            <div class="col-md-4 has-feedback">
                                <label class="control-label">Name</label>
                                <input type="text" class="form-control" name="title" v-model="route.name">
                            </div>
                            <div class="col-sm-12 col-md-4 has-feedback">
                                <label class="control-label">Route Name or Url(ex:/sales_order)</label>
                                <input type="text" class="form-control" name="route" v-model="route.url">
                            </div>

                            <div class="col-sm-12 col-md-4 has-feedback">
                                <label class="control-label">Select Top Menu</label>
                                <select class="form-control" name="top_menu" v-model="route.top_menu">
                                    <option value="" selected>No, Select</option>
                                    @foreach($menus_admin as $item)
                                        <option value="{{$item->id}}">{{$item->lang}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 has-feedback">
                                <label class="control-label">Icon</label>
                                <input type="text" class="form-control" name="icon"  v-model="route.icon">
                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="writer" data-bv-result="NOT_VALIDATED" style="display: none;">The writer name is required</small><small class="help-block" data-bv-validator="stringLength" data-bv-for="writer" data-bv-result="NOT_VALIDATED" style="display: none;">The writer name must be less than 80 characters long</small></div>

                            <div class="col-sm-12 col-md-4 has-feedback">
                                <label class="control-label">Order</label>
                                <input type="text" class="form-control" name="order"  v-model="route.order">
                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="producer" data-bv-result="NOT_VALIDATED" style="display: none;">The producer name is required</small><small class="help-block" data-bv-validator="stringLength" data-bv-for="producer" data-bv-result="NOT_VALIDATED" style="display: none;">The producer name must be less than 80 characters long</small></div>

                            <div class="col-sm-12 col-md-4 has-feedback">
                                <label class="control-label">is Route</label>
                                <input type="checkbox"  name="is_route" v-model="route.is_route">
                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="producer" data-bv-result="NOT_VALIDATED" style="display: none;">The producer name is required</small><small class="help-block" data-bv-validator="stringLength" data-bv-for="producer" data-bv-result="NOT_VALIDATED" style="display: none;">The producer name must be less than 80 characters long</small></div>


                        </div>
                    </div>
                </fieldset>
                <br><br><br>

            </form>
        </section>
    </template>

    <template id="add-owner-route">
        <section>
            <form  v-on:submit.prevent="createOwnerRoute">
                {{ csrf_field() }}
                <fieldset>
                    <legend>
                        Add New Owner Route <span class="pull-right">
                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-save"></i>
                                Save
                            </button>
                            <router-link to="/" class="btn btn-primary">
                                <i class="fa fa-back"></i>
                                Cancel
                            </router-link>
                        </span>
                    </legend>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 has-feedback">
                                <label class="control-label">Name</label>
                                <input type="text" class="form-control" name="title" v-model="route.name">
                            </div>
                            <div class="col-sm-12 col-md-4 has-feedback">
                                <label class="control-label">Route Name or Url(ex:/sales_order)</label>
                                <input type="text" class="form-control" name="route" v-model="route.url">
                           </div>

                            <div class="col-sm-12 col-md-4 has-feedback">
                                <label class="control-label">Select Top Menu</label>
                                <select class="form-control" name="top_menu" v-model="route.top_menu">
                                    <option value="" selected >No, Select</option>
                                    @foreach($menus_owner as $item)
                                        <option value="{{$item->id}}">{{$item}}</option>
                                    @endforeach
                                </select>
                           </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="form-group">
                        <div class="row">

                            <div class="col-sm-12 col-md-4 has-feedback">
                                <label class="control-label">Icon</label>
                                <input type="text" class="form-control" name="icon"  v-model="route.icon">
                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="writer" data-bv-result="NOT_VALIDATED" style="display: none;">The writer name is required</small><small class="help-block" data-bv-validator="stringLength" data-bv-for="writer" data-bv-result="NOT_VALIDATED" style="display: none;">The writer name must be less than 80 characters long</small></div>

                            <div class="col-sm-12 col-md-4 has-feedback">
                                <label class="control-label">Order</label>
                                <input type="text" class="form-control" name="order"  v-model="route.order">
                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="producer" data-bv-result="NOT_VALIDATED" style="display: none;">The producer name is required</small><small class="help-block" data-bv-validator="stringLength" data-bv-for="producer" data-bv-result="NOT_VALIDATED" style="display: none;">The producer name must be less than 80 characters long</small></div>
                        </div>
                    </div>
                </fieldset>
                <br><br><br>
            </form>
        </section>
    </template>
    <template id="route-list">
        <div class="section">
            <div id="nestable-menu">
                <button type="button" class="btn btn-default pull-right" data-action="expand-all">
                    Expand All
                </button>
                <button type="button" class="btn btn-default pull-right" id="collapseAll" data-action="collapse-all">
                    Collapse All
                </button>
            </div>
            <br>
            <hr>
            <div class="col-sm-6 col-lg-6">

                <h6>Admin Menu <router-link class=" btn btn-sm btn-success pull-right" :to="{path: '/add-admin-route'}"> New Admin Route</router-link>
                </h6>
                <div class="dd" id="nestable2">
                    <ol class="dd-list">
                        @foreach($menus_admin as $menu)
                            <li class="dd-item" data-id="{{$menu->id}}">
                                <div class="">
                                <div class="dd-handle">
                                    <span class="fa fa-{{$menu->icon}}"></span> {{$menu->lang}}
                                    <span> - ({{$menu->route == null ? "#":$menu->route}}) </span>
                                </div>
                                    <button class="btn btn-sm pull-right"> Edit</button>
                                </div>
                                @foreach($menu->submenu as $item)
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="{{$item->id}}">
                                            <div class="dd-handle">
                                                <span class="fa fa-{{$item->icon}}"></span> {{$item->lang}}
                                                <span> - ({{$item->route == null ? "#":$item->route}}
                                                    )</span>
                                            </div>
                                        </li>
                                    </ol>
                                @endforeach
                            </li>
                        @endforeach
                    </ol>
                </div>


            </div>

            <div class="col-sm-6 col-lg-6">


                <h6>{{trans("general.account_menu")}} <router-link class=" btn btn-sm btn-success pull-right" :to="{path: '/add-owner-route'}"> New Owner Route</router-link>
                </h6>
                <div class="dd" id="nestable">
                    <ol class="dd-list">
                        @foreach($menus_owner as $menu)
                            <li class="dd-item" data-id="{{$menu->id}}">
                                <div class="dd-handle">
                                    <span class="fa fa-{{$menu->icon}}"></span> {{$menu->lang}}
                                    <span> - ({{$menu->route == null ? "#":$menu->route}}) </span>
                                </div>
                                @foreach($menu->submenu as $item)
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="{{$item->id}}">
                                            <div class="dd-handle">
                                                <span class="fa fa-{{$item->icon}}"></span> {{$item->lang}}
                                                <span> - ({{$item->route == null ? "#":$item->route}}
                                                    )</span>
                                            </div>
                                        </li>
                                    </ol>
                                @endforeach
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>

    </template>

    <!-- end widget grid -->
    @push("scripts")
        <script src="{{asset("js/plugin/jquery-nestable/jquery.nestable.min.js")}}"></script>

        <script type="text/javascript">

            // DO NOT REMOVE : GLOBAL FUNCTIONS!

            $(document).ready(function () {


                pageSetUp();
                $('.dd').nestable('collapseAll');
                var list_route = Vue.extend({
                    template: '#route-list',

                });

                var add_admin_route = Vue.extend({
                    template: '#add-admin-route',
                    data: function () {
                        return {
                            route: {
                                name: '',
                                url: '',
                                order: '',
                                is_route: '',
                                top_menu: '',
                                permission:'1',
                                icon: ''
                        }
                        }
                    },
                    methods: {
                        createAdminRoute: function() {
                            axios.post('{{route("admin.menu.store.update",0)}}',this.route).then(function (response) {
                            notification("Success","New admin route added!","success");
                            router.push("/")
                            setTimeout(function(){
                                   window.location.href="{{route("admin.menu.index")}}"
                                }, 1500);


                            })
                                .catch(function (error) {
                                   var errors = error.response.data;

                                    $.each(errors.errors, function( index, value ) {

                                        notification("Error",value,"danger");
                                    });

                                });
                        }
                    },
                });




                var add_owner_route = Vue.extend({
                    template: '#add-owner-route',
                    data: function () {
                        return {route: {
                                name: '',
                                url: '',
                                is_route: '',
                                order: '',
                                permission: '2',
                                icon: ''
                            }
                        }
                    },
                    methods: {
                        createOwnerRoute: function() {
                            axios.post('{{route("admin.menu.store.update",0)}}',this.route).then(function (response) {
                                notification("Success","New admin route added!","success");
                                router.push("/")
                                setTimeout(function(){
                                    window.location.href="{{route("admin.menu.index")}}"
                                }, 1500);

                            })
                                .catch(function (error) {
                                    var errors = error.response.data;

                                    $.each(errors.errors, function( index, value ) {
                                        notification("Error",value,"danger");
                                    });

                                });
                        }
                    }
                });


                var router = new VueRouter({
                    routes: [{path: '/', component: list_route, name: 'root'},
                        {path: '/add-admin-route', component: add_admin_route},
                        {path: '/add-owner-route', component: add_owner_route}

                    ]});

                new Vue({
                    el: '#routeCrud',
                    router: router,
                    template: '<router-view></router-view>'
                });


                var updateOutput = function (e) {
                    var list = e.length ? e : $(e.target), output = list.data('output');
                    if (window.JSON) {

                       axios.post("{{route("admin.menu.order.post")}}",{list:list.nestable('serialize')})

                    } else {
                        output.val('JSON browser support required for this demo.');
                    }
                };

                // activate Nestable for list 1
                $('#nestable').nestable({
                    group: 1
                }).on('change', updateOutput);

                // activate Nestable for list 2
                $('#nestable2').nestable({
                    group : 1
                }).on('change', updateOutput);

                // output initial serialised data
                updateOutput($('#nestable').data('output', $('#nestable-output')));
                // updateOutput($('#nestable2').data('output', $('#nestable2-output')));

                $('#nestable-menu').on('click', function(e) {
                    var target = $(e.target), action = target.data('action');
                    if (action === 'expand-all') {
                        $('.dd').nestable('expandAll');
                    }
                    if (action === 'collapse-all') {
                        $('.dd').nestable('collapseAll');
                    }
                });


            })

        </script>
    @endpush
@endsection