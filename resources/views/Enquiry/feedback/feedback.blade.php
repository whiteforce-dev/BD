<div class="modal fade" id="addFeedback{{ $obj->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="height:350px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card">
                <div class="model-body">
                    <form action="{{url('storeFeedback')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                          <input type="hidden" name="id" value="{{ $obj->id }}">
                            <div class="form-group">
                                <label><b>Requiter Feedback</b></label>
                                <textarea class="form-control" rows="5" name="feedback" placeholder="Write Your Feedback">{{ $obj->feedback }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-success" name="save" >
                                    Submit
                                </button>
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
