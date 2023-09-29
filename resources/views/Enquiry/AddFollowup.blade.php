
<div class="modal fade" id="addfollowup{{ $obj->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="height:550px;width:750px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Remark</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card">
                <div class="model-body">
                    <form class="needs-validation" novalidate action="{{url('storeFollowUp')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">

                                <input type="hidden" class="form-control" placeholder="Enters Next Action " name="enquiry_id" value="{{$obj->id}}" required>
                            </div>

                            <div class="form-group ">
                                <label>Status</label>
                                <select name="status_id"  class="form-control" data-enquiry-id="{{ $obj->id }}" required >
                                    <option value="">Select Status</option>
                                    @php($status=\App\Models\Followup_remark::get())
                                    @foreach($status as $statuss)
                                        <option value="{{$statuss->id}}">{{$statuss->remark}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please Select Status.
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Remark</label>
                                <textarea class="form-control" name="remark" rows="4" placeholder="Enter Remark" required>{{isset($obj)?$obj->remark:''}}</textarea>
                                <div class="invalid-feedback">
                                    Please Select Remark.
                                </div>
                            </div>



                            <div class="row" id="select-{{$obj->id}}">
                                <div class="form-group col-sm-6">
                                    <label>Next Follow Date</label>
                                    <input type="date" class="form-control" name="date" >
                                    
                                </div>

                                <div class="form-group col-sm-6" id="select-status">
                                    <label>Next Follow Time</label>
                                    <input type="time" class="form-control"  name="time"  >
                                </div>
                            </div>



                            <div class="row" id="break-{{$obj->id}}" style="display:none">
                                <div class="form-group col-sm-6">
                                    <label>Break Date</label>
                                    <input type="date" class="form-control" name="break_date">
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-10">
                                <button type="submit" class="btn btn-success" name="save" >
                                    save
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{--  <script>
        $(document).ready(function() {
            $('select[name="status_id"]').on('change', function() {
                var selectedStatus = $(this).val();

                if (selectedStatus == "15") {
                    $("#select-status").hide();
                } else {
                    $("#select-status").show();
                }
            });
        });
    </script>  --}}
    <script>
        $(document).ready(function() {
            $('select[name="status_id"]').on('change', function() {
                var selectedStatus = $(this).val();
                var enquiryId = $(this).data('enquiry-id'); // Added data-enquiry-id attribute to the select element

                if (selectedStatus == "15") {
                    $("#select-status-" + enquiryId).hide();
                } else {
                    $("#select-status-" + enquiryId).show();
                }
            });
        });
    </script>

    <script>
        $('select').on('change', function() {
            var status = this.value;
            var enquiryId = $(this).data('enquiry-id'); // Added data-enquiry-id attribute to the select element

            if (status == "15") {
                $("#select-" + enquiryId).hide();
                $("#break-" + enquiryId).show();
            } else {
                $("#select-" + enquiryId).show();
                $("#break-" + enquiryId).hide();
            }
        });
    </script>

