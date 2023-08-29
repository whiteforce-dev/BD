<div class="modal fade" id="addAgreement{{ $obj->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="height:430px;width:750px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Agreement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card">
                <div class="model-body">
                    <form action="{{url('storeAgreement')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">


                      <input type="hidden" name="id" value="{{ $obj->id }}">
                             <div class="form-group">
                                <label>Aggrement</label>
                                <select class="form-control"  name="aggrement">
                                    {{-- <option value="{{ $preview->aggrement }}">{{ $preview->aggrement }}</option> --}}
                                    <option value="Yes">Yes</option>
                                    {{-- <option value="No">No</option> --}}
                                </select>

                            </div>


                            <div class="form-group">
                                <label>Aggrement Pdf Upload</label>
                               <input type="file" name="pdf_upload" class="form-control" value="{{ isset($obj->pdf_upload)?$obj->pdf_upload:'N/A' }}">

                            </div>


                            <div class="form-group">
                                <label>Payment Invoice Upload</label>
                                <input type="file" name="invoice" class="form-control" value="{{ isset($obj->invoice)?$obj->invoice:'N/A' }}">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-10">
                                <button type="submit" class="btn btn-success" name="save">
                                    Save
                                 </button>
                            </div>
                            <div class="col-1">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
