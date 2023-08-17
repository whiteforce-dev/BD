
@extends('Master.master')
@section('title', 'Enquiries')
@section('content')

    <div class="content-body">
        <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="authincation-content">
                                <div class="row no-gutters">
                                    <div class="col-xl-12">
                                        <div class="auth-form">
                                            <h4 class="text-center mb-4">Add Holiday</h4>
                                            <form method="POST" action="{{ url('storeHolidays') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="mb-1"><strong>Holiday Name</strong></label>
                                                    <input type="text" name="name" class="form-control" placeholder="Holiday Name">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="mb-1"><strong>Holiday Date</strong></label>
                                                    <input type="date" name="date" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="mb-1"><strong>Image</strong></label>
                                                    <div class="input-group ">
                                                        <div class="form-file">
                                                            @include('cropper')
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center mt-4">
                                                    <button style="height: 38px;" type="submit" class="btn btn-primary btn-block">Submit</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
    </div>

@endsection

