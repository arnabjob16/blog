    <div class="modal fade" id="addCommentModal" tabindex="-1" role="dialog" aria-labelledby="addCommentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" autocomplete="off" action="{{route('add_comment')}}" id="add_comment_form">
                        @csrf                    
                        <input name="post_id" type="hidden">
                        <div class="form-group">
                            <textarea class="form-control" name="comment"></textarea>
                        </div>                        
                        <div class="form-group text-right">              
                            <button type="submit" class="btn btn-primary">Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>