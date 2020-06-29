
<!-- The Modal -->

<div class="modal" id="deleteComment{{$comment_stu->id}}">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Delete Comment</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{route('comment.update', $comment_stu->id)}}" method="POST">
                    @csrf
                    @method('DELETE')   
                    <P>Are you sure delete this comment?</P>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger mt-2">OK</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>