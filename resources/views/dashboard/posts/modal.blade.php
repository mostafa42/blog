<!-- Modal -->
<div class="modal fade" id="exampleModal[{{$post->id}}]" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
            <form action="{{url('dashboard/comments')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @csrf
                    <input type="text" name="post_id" hidden id="setPostId">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">comment</label>
                        <textarea class="form-control" name="comment" id="exampleFormControlTextarea1"
                            rows="5"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>