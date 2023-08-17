<div class="modal fade" id="addMngrRemark{{ $obj->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{ url('storeManagerRemark') }}" method="post" class="mx-4">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" placeholder="Enters Next Action "
                                        name="enquiry_id" value="{{ $obj->id }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Remark</label>
                                    <textarea class="form-control" name="manager_remark" rows="4" placeholder="Enter Remark">{{ $obj->manager_remark }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10">
                                    <button type="submit" class="btn btn-success" name="save" >
                                        save
                                    </button>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
