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
                    <!-- widget options:
                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                    data-widget-colorbutton="false"
                    data-widget-editbutton="false"
                    data-widget-togglebutton="false"
                    data-widget-deletebutton="false"
                    data-widget-fullscreenbutton="false"
                    data-widget-custombutton="false"
                    data-widget-collapsed="true"
                    data-widget-sortable="false"

                    -->
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

                            <div id="nestable-menu">
                                <a type="button" href="{{route("admin.menu.create")}}" class=" btn btn-success pull-left">
                                    New Route
                                </a>

                                <button type="button" class="btn btn-default pull-right" data-action="expand-all">
                                    Expand All
                                </button>
                                <button type="button" class="btn btn-default pull-right" data-action="collapse-all">
                                    Collapse All
                                </button>
                            </div>
                            <div class="row"><br>
                                <hr>
                                <div class="col-sm-6 col-lg-6">

                                    <h6>Admin Menu #1</h6>
                                    <div class="dd" id="nestable2">
                                        <ol class="dd-list">
                                            @foreach($menus_admin as $menu)
                                                <li class="dd-item" data-id="{{$menu->id}}">
                                                    <div class="dd-handle">
                                                        <span class="fa fa-{{$menu->icon}}"></span> {{$menu->name["name"]}}
                                                        <span> - ({{$menu->route == null ? "#":$menu->route}}) </span>
                                                    </div>
                                                    @foreach($menu->submenu as $item)
                                                        <ol class="dd-list">
                                                            <li class="dd-item" data-id="{{$menu->id}}">
                                                                <div class="dd-handle">
                                                                    <span class="fa fa-{{$item->icon}}"></span> {{$item->name["name"]}}
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


                                    <h6>Owner & User Menu</h6>

                                    <div class="dd" id="nestable">
                                        <ol class="dd-list">
                                            @foreach($menus_owner as $menu)
                                                <li class="dd-item" data-id="{{$menu->id}}">
                                                    <div class="dd-handle">
                                                        <span class="fa fa-{{$menu->icon}}"></span> {{$menu->name["name"]}}
                                                        <span> - ({{$menu->route == null ? "#":$menu->route}}) </span>
                                                    </div>
                                                    @foreach($menu->submenu as $item)
                                                        <ol class="dd-list">
                                                            <li class="dd-item" data-id="{{$menu->id}}">
                                                                <div class="dd-handle">
                                                                    <span class="fa fa-{{$item->icon}}"></span> {{$item->name["name"]}}
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
    @push("scripts")
        <script src="{{asset("js/plugin/jquery-nestable/jquery.nestable.min.js")}}"></script>

        <script type="text/javascript">

            // DO NOT REMOVE : GLOBAL FUNCTIONS!

            $(document).ready(function () {

                pageSetUp();

                // PAGE RELATED SCRIPTS




                var updateOutput = function (e) {
                    var list = e.length ? e : $(e.target), output = list.data('output');
                    if (window.JSON) {

                        $.ajax({
                            type: "POST",
                            url: "{{route("admin.menu.order.post")}}",
                            data: {
                                list: "data"
                            }
                        });

                    } else {
                        output.val('JSON browser support required for this demo.');
                    }
                };

                // activate Nestable for list 1
                $('#nestable').nestable({
                    group: 1
                }).on('change', updateOutput);

                // // activate Nestable for list 2
                // $('#nestable2').nestable({
                //     group : 1
                // }).on('change', updateOutput);

                // output initial serialised data
                updateOutput($('#nestable').data('output', $('#nestable-output')));
                // updateOutput($('#nestable2').data('output', $('#nestable2-output')));

                $('#nestable-menu').on('click', function (e) {
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