{{--  <div class="modal fade" id="addAgreement{{ $enquiry->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">  --}}
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
                    <form class="needs-validation" novalidate action="{{url('storeAgreement')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">


                      <input type="hidden" name="id" value="{{ $enquiry->id }}">
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
                               <input type="file" name="pdf_upload" class="form-control" value="{{ isset($enquiry->pdf_upload)?$enquiry->pdf_upload:'N/A' }}" required>
                               <div class="invalid-feedback">
                                  Please Aggrement Pdf Upload.
                               </div>
                            </div>


                            <div class="form-group">
                                <label>Payment Invoice Upload</label>
                                <input type="file" name="invoice" class="form-control" value="{{ isset($enquiry->invoice)?$enquiry->invoice:'N/A' }}" required>
                                <div class="invalid-feedback">
                                    Please Payment Invoice Upload.
                                </div>
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
{{--  </div>  --}}
<script src="vendor/global/global.min.js"></script>

<!-- Jquery Validation -->
<!-- <script src="./vendor/jquery-validation/jquery.validate.min.js"></script> -->
<!-- Form validate init -->
<!-- <script src="./js/plugins-init/jquery.validate-init.js"></script> -->

<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

<script src="js/custom.min.js"></script>
<script src="js/deznav-init.js"></script>
<script src="js/demo.js"></script>
<script src="js/styleSwitcher.js"></script>
<script>
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()
</script>
