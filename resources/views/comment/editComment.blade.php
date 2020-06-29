
<!-- The Modal -->

<div class="modal" id="editComment{{$comment_stu->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Update Comment</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{route('comment.update', $comment_stu->id)}}" method="POST">
                    @csrf
                    @method('patch')
                    <textarea name="comment" id="comment" cols="30" rows="3" placeholder="{{$comment_stu->comment}}" class="form-control"></textarea>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>