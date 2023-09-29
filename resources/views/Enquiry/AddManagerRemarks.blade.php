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
                    <form class="needs-validation" novalidate action="{{ url('storeManagerRemark') }}" method="post" class="mx-4">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" placeholder="Enters Next Action "
                                        name="enquiry_id" value="{{ $obj->id }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Remark</label>
                                    <textarea class="form-control" name="manager_remark" rows="4" placeholder="Enter Remark" required >{{ $obj->manager_remark }}</textarea>
                                    <div class="invalid-feedback">
                                        Please enter a company_name.
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10">
                                    <button type="submit" class="btn btn-success" >
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
