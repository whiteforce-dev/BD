@extends('Master.master')
@section('title', 'Enquiries')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Proposal Type</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action = "{{ url('storeEnquiryType') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Proposal Type</label>
                                    <input type="text" class="form-control input-default " placeholder="Enter Enquiry Type" name="name" value="{{isset($preview)?$preview->name:''}}" >
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                                    <div class="basic-form">
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <select class="form-control" name="status">
                                                    <option  value="{{isset($preview)?$preview->status:''}}">{{isset($preview)?$preview->status:'Select'}}</option>
                                                    <option value="Active">Active</option>
                                                    <option value="De-active">De-active</option>
                                                </select>
                                            </div>
                                            @error('status')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
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
