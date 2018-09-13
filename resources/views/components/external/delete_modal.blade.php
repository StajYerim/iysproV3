<div class="modal fade" id="{{$type}}" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{$title}}</h4>
            </div>
            <div class="modal-body">
                <p>{{$message}}</p>
                <p id="response_data_delete"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans("word.cancel") }}</button>
                <button type="button" class="btn btn-danger" data-loading-text="Waiting" v-on:click="delete_data({{$id}})" >{{ trans("word.delete") }}</button>

            </div>
        </div>

    </div>
</div>