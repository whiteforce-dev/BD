
<div class="modal fade" id="changePassword{{ $obj->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="height:350px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Remark</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card">
                <div class="model-body">
                    <form action="{{url('update-password'.'/'.$obj->id)}}" method="post">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" class="form-control" placeholder="Enter New Password" name="password"  required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="save">
                               Save
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
