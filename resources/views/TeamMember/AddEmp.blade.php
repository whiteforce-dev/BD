@extends('Master.Master')
@section('title', 'Add Member')
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Team Member</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form class="needs-validation" novalidate action="{{ url('/store-employee') }}" method="POST" role="form text-left"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label" >Full Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"
                                            placeholder="enter name" name="name" required />
                                            <div class="invalid-feedback">
                                                Please enter a Full-Name.
                                            </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="email" class="form-control"
                                            placeholder="enter email " name="email" required />
                                            <div class="invalid-feedback">
                                                Please enter a Email.
                                            </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Mobile Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="firstname" class="form-control"
                                            placeholder="enter Mobile Number" name="mobile" required />
                                            <div class="invalid-feedback">
                                                Please enter a Contact Number.
                                            </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <div class="input-group ">
                                            <div class="form-file">
                                                @include('cropper')
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Type</label>
                                    <div class="col-sm-9">
                                        <select name="type" class="form-control" required >
                                            <option value="">Select Designation</option>
                                            @php($Type = \App\Models\Desigination::get())
                                            @foreach ($Type as $Types)
                                                <option value="{{ $Types->name }}">{{ $Types->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Designation.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row" id="select-manager-group">
                                    <label class="col-sm-3 col-form-label">Select Manager</label>
                                    <div class="col-sm-9">
                                        <select name="created_by" class="form-control" >
                                            <option value="">Select Manager</option>
                                            @php($Manager = \App\Models\User::where('type', '=', 'Manager')->get())
                                            @foreach ($Manager as $Managers)
                                                <option value="{{ $Managers->id }}">{{ $Managers->name }}</option>
                                            @endforeach
                                        </select>
                                        {{--  <div class="invalid-feedback">
                                            Please select a Manager.
                                        </div>  --}}
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="firstname" class="form-control"
                                            placeholder="Enter Password" name="password" required />
                                            <div class="invalid-feedback">
                                                Please enter a password.
                                            </div>
                                    </div>
                                </div>
                                <br>
                                <div class="mb-3 row ">
                                    <div class="col-sm-4 ">
                                        <button type="submit" class="btn btn-primary btn-block"
                                            style="margin-left: 300px">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
        <script>
            $(document).ready(function() {
                const typeSelect = $("select[name='type']");
                const selectManagerGroup = $("#select-manager-group");

                // Function to handle visibility based on the selected value
                function handleManagerSelectVisibility() {
                    const selectedType = typeSelect.val().toLowerCase();
                    const isManager = selectedType === "manager";
                    const isAdmin = selectedType === "admin";


                    if (isManager || isAdmin) {
                        selectManagerGroup.hide();
                    } else {
                        selectManagerGroup.show();
                    }
                }

                // Initially, check the value of the "Type" select on page load
                handleManagerSelectVisibility();

                // Add change event listener to the "Type" select
                typeSelect.on("change", function() {
                    handleManagerSelectVisibility();
                });
            });
        </script>
        <!-- form body -->
    @endsection
