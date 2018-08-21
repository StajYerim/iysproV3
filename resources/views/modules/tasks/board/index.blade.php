@extends('layouts.master')

@section('content')

    <section id="widget-grid" class="">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <div>
                        <div class="widget-body no-padding" style="min-height: 50px;">
                            <!-- Add Task button - Start -->
                            <div class="pull-right new-button"  onclick="addTasks();">
                                <span class="btn btn-success">Add Task</span>
                            </div>
                        </div>
                        <!-- new widget -->
							<div class="jarviswidget jarviswidget-color-blue" id="wid-id-4" data-widget-editbutton="false" data-widget-colorbutton="false">

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
									<span class="widget-icon"> <i class="fa fa-check txt-color-white"></i> </span>
									<h2> ToDo's </h2>
									<!-- <div class="widget-toolbar">
									add: non-hidden - to disable auto hide

									</div>-->
								</header>

								<!-- widget div-->
								<div>
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<div>
											<label>Title:</label>
											<input type="text" />
										</div>
									</div>
									<!-- end widget edit box -->
                                    <!-- Tasks box design Start -->
									<div class="widget-body no-padding smart-form">
										<!-- content goes here -->
                                        <div class="col-sm-4 col-md-4 col-xs-4">
                                            <h5 class="todo-group-title"><i class="fa fa-warning"></i> To Do (<small class="num-of-tasks">{{count($tasksTodo)}}</small>)</h5>
                                            <ul id="sortable1" class="todo sortable connectedSortable">
                                                @foreach($tasksTodo as $key => $task)
                                                    <li id="task_{{$task->id}}" class="task-card-box">
                                                        <span class="handle"> <label class="checkbox">
                                                            <input type="checkbox" name="checkbox-inline">
                                                            <i></i> </label> </span>
                                                        <p>
                                                            <strong>Task #{{$task->id}}</strong> - {{$task->title}} <span class="text-muted">{{$task->description}} </span>
                                                            <span class="date">{{date("F d, Y", strtotime($task->task_time))}}</span>
                                                        </p>
                                                    </li>
                                                @endforeach
                                            </ul> 
                                        </div>
										<div class="col-sm-4 col-md-4 col-xs-4">
                                            <h5 class="todo-group-title"><i class="fa fa-exclamation"></i> In Progress (<small class="num-of-tasks">{{count($tasksInProgress)}}</small>)</h5>
                                            <ul id="sortable2" class="todo sortable connectedSortable">
                                                @foreach($tasksInProgress as $key => $task)
                                                    <li id="task_{{$task->id}}" class="task-card-box">
                                                        <span class="handle"> <label class="checkbox">
                                                            <input type="checkbox" name="checkbox-inline">
                                                            <i></i> </label> </span>
                                                        <p>
                                                            <strong>Task #{{$task->id}}</strong> - {{$task->title}} <span class="text-muted">{{$task->description}} </span>
                                                            <span class="date">{{date("F d, Y", strtotime($task->task_time))}}</span>
                                                        </p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-xs-4">
                                            <h5 class="todo-group-title"><i class="fa fa-check"></i> Completed (<small class="num-of-tasks">{{count($tasksCompleted)}}</small>)</h5>
                                            <ul id="sortable3" class="todo sortable connectedSortable">
                                                @foreach($tasksCompleted as $key => $task)
                                                    <li id="task_{{$task->id}}" class="task-card-box">
                                                        <span class="handle"> <label class="checkbox">
                                                            <input type="checkbox" name="checkbox-inline">
                                                            <i></i> </label> </span>
                                                        <p>
                                                            <strong>Task #{{$task->id}}</strong> - {{$task->title}} <span class="text-muted">{{$task->description}} </span>
                                                            <span class="date">{{date("F d, Y", strtotime($task->task_time))}}</span>
                                                        </p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>                                       
										<!-- end content -->
									</div>
								</div>
								<!-- end widget div -->
							</div>
							<!-- end widget -->

                    </div>

                </div>

            </article>
        </div>
        <!-- Add Task Modal -->
        <div class="modal fade" id="task_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        New Task
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="task_form" @submit.prevent="task_send" class="form-horizontal bv-form">
                        <div class="modal-body">
                            <fieldset>
                                <div class="form-group" :class="{'has-error': errors.has('form.title') }">
                                    <label class="col-md-3 control-label">Task Title</label>
                                    <div class="col-md-6 ">
                                        <div >
                                            <input  v-validate="'required'" type="text" class="form-control "
                                                   v-model="form.title" name="form.title" maxlength="250">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Category Color</label>
                                    <div class="col-md-6 ">
                                        <div class="btn-group btn-group-justified btn-select-tick" data-toggle="buttons">
                                            <label class="btn bg-color-red active category-sel-cls" @click="colorChange(1)">
                                                <input value="1" checked="" 
                                                       type="radio" name="category_selection" />
                                                A <i class="fa fa-check txt-color-white"></i>  </label>
                                            <label class="btn bg-color-orange category-sel-cls" @click="colorChange(2)">
                                                <input value="2" 
                                                       type="radio"  name="category_selection" />
                                                B <i class="fa fa-check txt-color-white"></i> </label>
                                            <label class="btn bg-color-greenLight category-sel-cls" @click="colorChange(3)">
                                                <input value="3" 
                                                       type="radio" name="category_selection" />
                                                C <i class="fa fa-check txt-color-white"></i> </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Task Priority</label>
                                    <div class="col-md-6 ">
                                        <div class="btn-group btn-group-sm btn-group-justified" data-toggle="buttons">
                                            <label class="btn btn-default active" @click="priorityChange(1)">
                                                <input name="form.priority" id="icon-1" value="1" checked="" type="radio">
                                                <i class="fa fa-bolt text-muted"></i> <br> 1 </label>
                                            <label class="btn btn-default" @click="priorityChange(2)">
                                                <input name="form.priority" id="icon-2" value="2" type="radio">
                                                <i class="fa fa-flag text-muted"></i> <br> 2  </label>
                                            <label class="btn btn-default" @click="priorityChange(3)">
                                                <input name="form.priority" id="icon-3" value="3" type="radio">
                                                <i class="fa fa-flag-o text-muted"></i>  <br> 3  </label>
                                            <label class="btn btn-default" @click="priorityChange(4)">
                                                <input name="form.priority" id="icon-4" value="4" type="radio">
                                                <i class="fa fa-flag-checkered text-muted"></i>  <br> 4 </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">User</label>
                                    <div class="col-md-6 " :class="{'has-error': errors.has('form.user') }">
                                        <div>
                                            <select style="width:100%" class="select2-selection" multiple 
                                                    tabindex="-1" aria-hidden="true" name="task_users">
                                                 @foreach ($users as $user) 
                                                    <option value="{{ $user->id }}" :value="{{ $user->id }}">{{ $user->name }}</option>
                                                  @endforeach
                                            </select>
                                            <input type="hidden" name="form.user" v-model="form.user" value="" 
                                                   id="hd_task_users" v-validate="'required'" @click="usersChange" />    
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Date & Time</label>
                                    <div class="col-md-6 input-group" style="padding-left: 12px;" :class="{'has-error': errors.has('form.date') }">
                                        <input placeholder="Select a date" class="form-control datepicker hasDatepicker" data-dateformat="dd/mm/yy" id="date" type="text" 
                                               style="padding-left: 12px;" name="task_date" onblur="dateTask()" />
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="hidden" name="form.date" v-model="form.date" value="" 
                                                   id="hd_task_date" v-validate="'required'" @click="dateChange" />
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group" :class="{'has-error': errors.has('form.duration') }">
                                    <label class="col-md-3 control-label">Duration</label>
                                    <div class="col-md-6">
                                        <div >
                                            <input placeholder="Duration to Complete in hours" type="text" v-validate="'required'" 
                                                   v-model="form.duration" name="form.duration" class="form-control" maxlength="5" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Description</label>
                                    <div class="col-md-6 ">
                                        <div >
                                            <textarea class="form-control" placeholder="Task Description | Please be brief" rows="4" 
                                                      maxlength="400" id="description" v-model="form.description" name="form.description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans("word.close")}}</button>
                            <button type="submit" class="btn btn-primary">{{trans("word.save")}} </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <style type="text/css">
        .task-card-box {
            cursor: move;
        }
    </style>
    @push('scripts')
    <script type="text/javascript">
    window.addEventListener("load", () => {
        $tasks = new Vue({
            el: "#task_modal",
            data: {
                form: {
                    id: 0,
                    title: "",
                    color: "1",
                    priority: "1",
                    user: "",
                    date: null,
                    duration: "",
                    description: "",
                }
            },
            computed: {
            },
            mounted: function () {
                $('.select2-selection')
                    .select2({
                        dropdownParent: $('#task_modal')
                    })
                    .val(this.value)
                    .trigger('change')
                    .on('change', function () {
                        if($(this).val() != "") {
                            var val = $(this).val();
                            $('#hd_task_users').val(val.toString());
                            $('#hd_task_users').click();
                            $('#hd_task_date').val($('.datepicker').val());
                        }
                        else {
                            $('#hd_task_users').val();
                            $('#hd_task_users').click();
                            $('#hd_task_date').val($('.datepicker').val());
                        }
                    });
            },
            methods: {
                colorChange (val) {
                    this.form.color = val;
                },
                priorityChange (val) {
                    this.form.priority = val;
                },
                usersChange () {
                    this.form.user = $('#hd_task_users').val();
                },
                dateChange () {
                    this.form.date = $('#hd_task_date').val();
                },
                task_send: function () {
                    this.$validator.validate().then((result) => {
                        if (result) {
                            axios.post('{{route("tasks.board.store",[aid(),0])}}', this.form)
                                .then(function (response) {
                                    if (response.data.message) {
                                        if (response.data.message == "success") {
                                            $("#task_modal").modal("hide");
                                            window.location.href = '{{route("tasks.board.index",aid())}}';
                                        }

                                    } else {
                                        notification("Error", response, "danger");
                                    }
                                }).catch(function (error) {
                                notification("Error", error.response.data.message, "danger");
                            });

                        } else {
                            notification("Error", "Please require fields", "danger");
                        }
                    })
                },
                clear: function () {
                    this.form.id = 0;
                    this.form.title = "";
                    this.form.color = "1";
                    this.form.priority = "1";
                    this.form.date = null;
                    this.form.duration = "";
                    this.form.description = "";
                    this.form.user = '';
                }
            }
        });
    });
    function addTasks() {
        $tasks.clear();
        $("#task_modal").modal("show");
        var dateNow = new Date();
        $('.datepicker').datetimepicker({
            defaultDate:dateNow
        });
        $('#hd_task_date').val($('.datepicker').val());
        $('#hd_task_date').click();
    }
    function dateTask() {
        $('#hd_task_date').val($('.datepicker').val());
        $('#hd_task_date').click();
    } 
    $( ".sortable" ).sortable({
      connectWith: ".connectedSortable",
      receive: function( event, ui ) {
          var draggableID = ui.item.attr("id");
          var droppableID = $(this).attr("id");
          var data =  {
                    id: draggableID,
                    status: droppableID,
                };
          axios.post('{{route("tasks.board.status",[aid()])}}', data)
                .then(function (response) {
                    if (response.data.message) {
                        if (response.data.message == "success") 
                            notification("Success", "Task status has been changed successfully.", "success");
                    } else {
                        notification("Error", response, "danger");
                    }
                }).catch(function (error) {
                notification("Error", error.response.data.message, "danger");
          });
          console.log("Amar" + ui.item.attr("id"));
          console.log("Shah" + $(this).attr("id"));
      }
    }).disableSelection();  
    </script>
    @endpush
@endsection