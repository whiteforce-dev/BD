@extends('Master.master')
@section('title', 'Enquiries')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Template</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form class="needs-validation" novalidate action = "{{ url('storeEmailTemplate') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name"  class="form-control input-default " placeholder="Enter a name.." required>
                                    <div class="invalid-feedback">
                                        Please Enter Name.
                                    </div>
                                </div>
                                    <div class="basic-form">
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" rows="4"  id="dz-password" class="tinymce-editor"style="height:150px" name="description" placeholder="Descriptions" required ></textarea>
                                                <div class="invalid-feedback">
                                                    Please Enter Description.
                                                </div>
                                            </div>
                                    </div>

                                    <div class="col-6" style="margin-left: 200px;">
                                        <button type="submit" class="btn me-2 btn-primary btn-block">Submit</button>
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


    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        height: 500,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        setup: function (editor) {
            editor.on('init', function () {
                 this.setContent(editor.value);
            });
        }
    });
    </script>

    @endsection
