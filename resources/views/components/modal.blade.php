<form action="{{$submitUrl}}" method="post">
    @csrf
    @isset($submitMethod)
        @method($submitMethod)
    @endisset
    <div class="modal fade" id="{{$modalId}}" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{$modalTitle}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{$slot}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">{{$submitText}}</button>
                </div>
            </div>
        </div>
    </div>
</form>