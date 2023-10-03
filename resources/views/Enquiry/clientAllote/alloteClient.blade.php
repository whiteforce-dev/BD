@if(isset($enquiry))
    {{--  <div class="modal fade" id="alloteClient{{ $enquiry->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">  --}}
        <div class="modal-dialog">
            <div class="modal-content" style="height: 710px;
            width: 750px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Allote Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card">
                    <div class="model-body">
                        <form class="needs-validation" novalidate action="{{url('allot-client')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <input type="hidden" name="enquiry_id" value="{{ $enquiry->id }}">
                                    <div class="form-group col-sm-6" >
                                        <label>Allot Date</label>
                                        <input type="date" name="allot_date" id="allot_date" value="{{ date('Y-m-d') }}" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-6" >
                                        <label>Company Type</label>
                                        <select name="company_type"  class="form-control" id="company_type" required>
                                            <option value="">Select Company Type</option>
                                            <option value="temp" {{ ($enquiry->company_sub_type == 'temp') ? 'selected' : '' }}>Temp</option>
                                            <option value="IT" {{ ($enquiry->company_sub_type == 'IT') ? 'selected' : '' }}>IT</option>
                                            <option value="one-time" {{ ($enquiry->company_sub_type == 'one-time') ? 'selected' : '' }}>One Time</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Company Type.
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6" >
                                        <label>Company Sub Type</label>
                                        <select name="alloted_software_type"  class="form-control"  id="alloted_software_type" onchange="getUserList(this.value)" required>
                                            <option value="">Select Company Sub Type</option>
                                            <option value="onrole" {{ ($enquiry->alloted_software_type == 'onrole') ? 'selected' : '' }}>Onrole</option>
                                            <option value="offrole" {{ ($enquiry->alloted_software_type == 'offrole') ? 'selected' : '' }}>Offrole</option>
                                            <option value="franchise-onrole" {{ ($enquiry->alloted_software_type == 'franchise-onrole') ? 'selected' : '' }}>Franchise Onrole</option>
                                            <option value="franchise-offrole" {{ ($enquiry->alloted_software_type == 'franchise-offrole') ? 'selected' : '' }}>Franchise Offrole</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select Company Sub Type.
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <div class="col-md- col-12 mb-2">
                                            <label>Senior Manager/Manager</label>
                                            <select   name="alloted_to[]" class="form-control manager" id="alloted_to{{ $enquiry->id }}" required multiple = "multiple" >
                                                <option>Select Senior Manager/Manager</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a Senior Manager/Manager.
                                            </div>
                                        </div>


                                    </div>

                                    <div class="form-group col-sm-6" >
                                        <label>Number Of Requirement</label>
                                        <input type="number" name="no_of_requirement" id="no_of_requirement" value="{{ $enquiry->no_req }}" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please enter Number Of Requirement.
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6" >
                                        <label>Percetange</label>
                                        <input type="text" name="percentage" id="percentage" value="{{ $enquiry->percentage }}" class="form-control" >
                                        <div class="invalid-feedback">
                                            Please enter Percetange.
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6" >
                                        <label>Company Logo</label>
                                        <input type="file" name="company_logo" id="company_logo" value="" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please select Company Logo.
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6" >
                                        <label>Company Website</label>
                                        <input type="text" name="company_website" id="company_website" value="{{ $enquiry->client_website }}" class="form-control">
                                        <div class="invalid-feedback">
                                            Please enter Company Website.
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12" >
                                        <label>About Company</label>
                                        <input type="text" name="about_company" id="about_company" value="{{ $enquiry->clientabt }}" class="form-control">
                                        <div class="invalid-feedback">
                                            Please enter About Company.
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10">
                                    <button type="submit" class="btn btn-success" name="save" >
                                        Allot
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
@endif

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

 <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
    <script src="https://kit.fontawesome.com/aea6f081fa.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/aea6f081fa.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
	integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    $("#alloted_to{{ $enquiry->id }}").select2({
        tags: true,
        tokenSeparators: [','],
    });
    // $(".js-example-tokenizer").select2({
    //     tags: true,
    //     tokenSeparators: [',']
    // })
    getUserList($('#alloted_software_type').val())
    function getUserList(type){
        console.log(type)
        if(type == '' || type == 'undefined'){
            return false;
        }
        $.ajax({
            type:'GET',
            url: '{{ url('getUserList') }}' + '/' + type,
            success:function(response){
               $('.manager').html(response);
            }
        })
    }
</script>

