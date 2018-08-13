@extends('layouts.master')

@section('content')
    <div class="row" id="production" v-cloak>

        <div class="col-sm-12 col-md-12 col-lg-3">
            <!-- new widget -->
            <div class="jarviswidget jarviswidget-color-blueDark">
                <header>
                    <h2> BEKLEYEN SİPARİŞLER </h2>
                </header>

                <!-- widget div-->
                <div>

                    <div class="widget-body">
                        <!-- content goes here -->

                        <div v-for="item in production_list" v-if="item.status == 0">
                            <a href="#!" @click="detail(item.id)">
                                (@{{item.order.id}}) @{{item.order.description}}
                            </a>
                            <br>
                        </div>


                        <!-- end content -->
                    </div>

                </div>
                <!-- end widget div -->
            </div>
            <!-- end widget -->
            <!-- new widget -->
            <div class="jarviswidget jarviswidget-color-blueDark">
                <header>
                    <h2> TAMAMLANANLAR </h2>
                </header>

                <!-- widget div-->
                <div>

                    <div class="widget-body">
                        <!-- content goes here -->

                        <div v-for="item in production_list" v-if="item.status == 2">
                            <a href="#!" @click="detail(item.id)">
                                (@{{item.order.id}}) @{{item.order.description}}
                            </a>
                            <br>
                        </div>
                        <!-- end content -->
                    </div>

                </div>
                <!-- end widget div -->
            </div>
            {{--<!-- end widget -->--}}
            {{--<div class="well well-sm" id="event-container">--}}
            {{--<form>--}}
            {{--<fieldset>--}}
            {{--<legend>--}}
            {{--Draggable Events--}}
            {{--</legend>--}}
            {{--<ul id='external-events' class="list-unstyled">--}}
            {{--<li>--}}
            {{--<span class="bg-color-darken txt-color-white" data-description="Currently busy" data-icon="fa-time">Office Meeting</span>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<span class="bg-color-blue txt-color-white" data-description="No Description" data-icon="fa-pie">Lunch Break</span>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<span class="bg-color-red txt-color-white" data-description="Urgent Tasks" data-icon="fa-alert">URGENT</span>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--<div class="checkbox">--}}
            {{--<label>--}}
            {{--<input type="checkbox" id="drop-remove" class="checkbox style-0" checked="checked">--}}
            {{--<span>remove after drop</span> </label>--}}

            {{--</div>--}}
            {{--</fieldset>--}}
            {{--</form>--}}

            {{--</div>--}}
        </div>
        <div class="col-sm-12 col-md-12 col-lg-9">

            <!-- new widget -->
            <div class="jarviswidget jarviswidget-color-blueDark">

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
                    <span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
                    <h2> My Events </h2>
                    <div class="widget-toolbar">
                        <!-- add: non-hidden - to disable auto hide -->
                        <div class="btn-group">
                            <button class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown">
                                Showing <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu js-status-update pull-right">
                                <li>
                                    <a href="javascript:void(0);" id="mt">Month</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" id="ag">Agenda</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" id="td">Today</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </header>

                <!-- widget div-->
                <div>

                    <div class="widget-body no-padding">
                        <!-- content goes here -->
                        <div class="widget-body-toolbar">

                            <div id="calendar-buttons">

                                <div class="btn-group">
                                    <a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-prev"><i class="fa fa-chevron-left"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-next"><i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div id="calendar"></div>

                        <!-- end content -->
                    </div>

                </div>
                <!-- end widget div -->
            </div>
            <!-- end widget -->

        </div>

        {{--Detail Modal--}}
        <div class="modal fade" id="production_detail" role="dialog" aria-labelledby="remoteModalLabel"
             aria-hidden="true"
             style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-title" id="myModalLabel">SİPARİŞ DETAYI</h4>
                    </div>
                    <div class="modal-body modal-body-content">
                        <b>SİPARİŞ AÇIKLAMASI :</b>@{{ production.order.description }} <br>
                        <b>TARİH :</b>@{{ production.order.date }}<br>
                        <b>TERMİN TARİHİ :</b>@{{ production.order.termin_date }}<br>
                        <b>ÜRÜNLER</b><br>
                        <div v-for="item in production.order.items">
                            @{{ item.product.named.name }}
                            <br>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 has-feedback">
                                    <label class="control-label">DURUM</label>
                                    <select class="form-control" v-model="production.status">
                                        <option value="0">BEKLEMEDE</option>
                                        <option value="1">ÜRETİMDE</option>
                                        <option value="2">TAMAMLANDI</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-4 has-feedback">
                                    <label class="control-label">BAŞLANGIÇ TARİHİ</label>
                                    <div class="input-group">
                                        <the-mask @change="setDate(production.start_date)" :mask="['##.##.####']"
                                                  type="text" name="production.start_date"
                                                  v-validate="'required'" class="form-control datepicker"
                                                  v-model="production.start_date">
                                        </the-mask>
                                        <span class="input-group-addon"><i
                                                    class="fa fa-calendar"></i></span>

                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 has-feedback">
                                    <label class="control-label">ÜRETİM SÜRESİ(GÜN)</label>
                                    <input type="number" v-model:number="production.day" class="form-control">
                                </div>

                            </div>

                        </div>
                        <hr>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">VAZGEÇ</button>
                        <button type="button" class="btn btn-primary" @click="productionSave()">KAYDET</button>
                    </div>
                </div>

            </div>
        </div>
        {{--Detail Modal--}}

    </div>

    <script src="/js/plugin/moment/moment.min.js"></script>
    <script src="/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
    <script type="text/javascript">

        // DO NOT REMOVE : GLOBAL FUNCTIONS!

        $(document).ready(function() {
            VueName = new Vue({
                el: "#production",
                data: {
                    production: {
                        order: {}
                    },
                    production_list: []
                },
                methods: {
                    productionUpdate() {
                        axios.post("{{route("production.calendar.list",aid())}}").then(res => {
                            VueName.production_list = res.data;
                        })
                    },
                    productionSave() {
                        axios.post("{{route("production.calendar.save",aid())}}", {
                            production_id: this.production.id,
                            start_date: this.production.start_date,
                            status: this.production.status,
                            day: this.production.day
                        }).then(res => {
                            if (res.data == "ok") {
                                VueName.productionUpdate();
                                $("#production_detail").modal("hide");
                                notification("Başarılı", "İşlem başarıyla kaydedildi.", "success");

                            }

                        })
                    },
                    detail: function ($id) {
                        axios.post("{{route("production.calendar.detail",aid())}}", {production_id: $id}).then(res => {
                            console.log(res.data);
                            VueName.production = res.data;
                            $('#production_detail').modal("show");
                        })

                    }
                },
                mounted: function () {
                    datePicker()
                    this.productionUpdate();
                    "use strict";

                    var date = new Date();
                    var d = date.getDate();
                    var m = date.getMonth();
                    var y = date.getFullYear();

                    var hdr = {
                        left: 'title',
                        center: 'month,agendaWeek,agendaDay',
                        right: 'prev,today,next'
                    };

                    var initDrag = function (e) {
                        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                        // it doesn't need to have a start or end

                        var eventObject = {
                            title: $.trim(e.children().text()), // use the element's text as the event title
                            description: $.trim(e.children('span').attr('data-description')),
                            icon: $.trim(e.children('span').attr('data-icon')),
                            className: $.trim(e.children('span').attr('class')) // use the element's children as the event class
                        };
                        // store the Event Object in the DOM element so we can get to it later
                        e.data('eventObject', eventObject);

                        // make the event draggable using jQuery UI
                        e.draggable({
                            zIndex: 999,
                            revert: false, // will cause the event to go back to its
                            revertDuration: 0 //  original position after the drag
                        });
                    };

                    var addEvent = function (title, priority, description, icon) {
                        title = title.length === 0 ? "Untitled Event" : title;
                        description = description.length === 0 ? "No Description" : description;
                        icon = icon.length === 0 ? " " : icon;
                        priority = priority.length === 0 ? "label label-default" : priority;

                        var html = $('<li><span class="' + priority + '" data-description="' + description + '" data-icon="' +
                            icon + '">' + title + '</span></li>').prependTo('ul#external-events').hide().fadeIn();

                        $("#event-container").effect("highlight", 800);

                        initDrag(html);
                    };

                    /* initialize the external events
                     -----------------------------------------------------------------*/

                    $('#external-events > li').each(function () {
                        initDrag($(this));
                    });

                    $('#add-event').click(function () {
                        var title = $('#title').val(),
                            priority = $('input:radio[name=priority]:checked').val(),
                            description = $('#description').val(),
                            icon = $('input:radio[name=iconselect]:checked').val();

                        addEvent(title, priority, description, icon);
                    });

                    /* initialize the calendar
                     -----------------------------------------------------------------*/

                    $('#calendar').fullCalendar({

                        displayEventTime :false,
                        header: hdr,
                        editable: false,
                        droppable: false, // this allows things to be dropped onto the calendar !!!

                        drop: function (date, allDay) { // this function is called when something is dropped

                            // retrieve the dropped element's stored Event Object
                            var originalEventObject = $(this).data('eventObject');

                            // we need to copy it, so that multiple events don't have a reference to the same object
                            var copiedEventObject = $.extend({}, originalEventObject);

                            // assign it the date that was reported
                            copiedEventObject.start = date;
                            copiedEventObject.allDay = allDay;

                            // render the event on the calendar
                            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                            // is the "remove after drop" checkbox checked?
                            if ($('#drop-remove').is(':checked')) {
                                // if so, remove the element from the "Draggable Events" list
                                $(this).remove();
                            }

                        },

                        select: function (start, end, allDay) {
                            var title = prompt('Event Title:');
                            if (title) {
                                calendar.fullCalendar('renderEvent', {
                                        title: title,
                                        start: start,
                                        end: end,
                                        allDay: allDay
                                    }, true // make the event "stick"
                                );
                            }
                            calendar.fullCalendar('unselect');
                        },


                        events: [
                                @foreach($productions_process as $product)
                            {
                                title: '{{$product->order["description"]}}',
                                start: new Date(y, m, 1),
                                end: new Date(y, m, d - 2),
                                className: ["event", "bg-color-redLight"],
                                icon: 'fa-industry'
                            },

                    @endforeach()
                    ],

                    eventRender: function (event, element, icon) {
                        if (!event.description == "") {
                            element.find('.fc-title').append("<br/><span class='ultra-light'>" + event.description +
                                "</span>");
                        }
                        if (!event.icon == "") {
                            element.find('.fc-title').append("<i class='air air-top-right fa " + event.icon +
                                " '></i>");
                        }
                    },

                    windowResize: function (event, ui) {
                        $('#calendar').fullCalendar('render');
                    }
                });

                    /* hide default buttons */
                    $('.fc-right, .fc-center').hide();


                    $('#calendar-buttons #btn-prev').click(function () {
                        $('.fc-prev-button').click();
                        return false;
                    });

                    $('#calendar-buttons #btn-next').click(function () {
                        $('.fc-next-button').click();
                        return false;
                    });

                    $('#calendar-buttons #btn-today').click(function () {
                        $('.fc-today-button').click();
                        return false;
                    });

                    $('#mt').click(function () {
                        $('#calendar').fullCalendar('changeView', 'month');
                    });

                    $('#ag').click(function () {
                        $('#calendar').fullCalendar('changeView', 'agendaWeek');
                    });

                    $('#td').click(function () {
                        $('#calendar').fullCalendar('changeView', 'agendaDay');
                    });


                }
                })
        })

    </script>

@endsection