@extends('Master.master')
@section('title', 'Add Enquiry')

@section('content')

<style>
    /*---------------------------------------*/
/* Form Body */
/*---------------------------------------*/
.form-body {
    padding:10px 40px;
    color:#666;
  }

  .form-group{
    margin-bottom:20px;
  }

  .form-body .label-title {
    color:#212123;
    font-size: 17px;
    font-weight: bold;
  }

  .form-body .form-input {
      font-size: 17px;
      box-sizing: border-box;
      width: 100%;
      height: 34px;
      padding-left: 10px;
      padding-right: 10px;
      color: #333333;
      text-align: left;
      border: 1px solid #d6d6d6;
      border-radius: 4px;
      background: white;
      outline: none;
  }

  .form-body .form-inputs {
    font-size: 17px;
    box-sizing: border-box;
    width: 100%;
    height: 124px;
    padding-left: 10px;
    padding-right: 10px;
    color: #333333;
    text-align: left;
    border: 1px solid #d6d6d6;
    border-radius: 4px;
    background: white;
    outline: none;
}


  .horizontal-group .left{
    float:left;
    width:49%;
  }

  .horizontal-group .right{
    float:right;
    width:49%;
  }

  input[type="file"] {
   outline: none;
   cursor:pointer;
   font-size: 17px;
  }

  #range-label {
   width:15%;
   padding:5px;
   background-color: #1BBA93;
   color:white;
   border-radius: 5px;
   font-size: 17px;
   position: relative;
   top:-8px;
  }


  ::-webkit-input-placeholder {
   color:#d9d9d9;
  }

  /*---------------------------------------*/
  /* Form Footer */
  /*---------------------------------------*/
  .form-footer {
   clear:both;
  }
</style>

<div class="content-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Excel Sheet Import</h4>
            </div>
            <br>
            <div class="container-fluid " style="margin-top: -35px">
                <div class="row">
                    <div class="col-12">
                        <div class="card ">
                            <div class="card-body">
                                {{-- import file and download sample file --}}
                                <form action="{{ url('importExcel') }}" class="mt-4 align-items-center" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{-- <label><b>File</b></label>&nbsp; --}}
                                    <input type="file" name="file" />

                                    <button class="btn btn-danger col-md-3"
                                        style="margin-top:-3px !important; margin-left:5px !important;">Import File</button>
                                    <a class="btn btn-success col-md-3 ml-1"
                                        style="margin-top:-3px !important;margin-left: 0 !important;"
                                        href="{!! url('/ExcelFile/excel_sample.xlsx') !!}" style="color: white;" download>Download Sample File</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Enquiry Form</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="needs-validation" novalidate  action="{{url('store-enquiry')}}" method="POST" id='form' enctype="multipart/form-data" >
                                @csrf
                                <input type="hidden" class="form-control" placeholder="Enter Conpany Name" name="user_id"
                                          value="{{Auth::user()->created_by}}">

                                <div class="row">
                                    <div class="col-xl-6">

                                        <div class="mb-3">
                                            <label class="form-label" >Company Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" placeholder="Enter Company Name"
                                                name="company_name"   required>
                                                <div class="invalid-feedback">
                                                    Please enter a company_name.
                                                </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom02">Contact Person Name <span
                                                    class="text-danger">*</span>
                                            </label>

                                                <input type="text" class="form-control" placeholder="Enter Contact Person Name"
                                                name="contact_person" id="validationCustom02" required>
                                                <div class="invalid-feedback">
                                                    Please enter contact_person.
                                                </div>

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom03">Vertical
                                                <span class="text-danger">*</span>
                                            </label>

                                                @php
                                                $industries = \App\Models\Industry::get()
                                            @endphp
                                            <select name="vertical" id="vertical" class="form-control" id="validationCustom03" required >
                                                <option value="">Select</option>
                                                @foreach($industries as $industry)
                                                <option value="{{$industry->industry_name}}" {{ (!empty($preview->vertical) && $preview->vertical == $industry->industry_name) ? 'selected' : '' }}>{{$industry->industry_name}}</option>
                                                @endforeach
                                            </select>
                                                <div class="invalid-feedback">
                                                    Please enter a Vertical.
                                                </div>

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom04">Location <span
                                                    class="text-danger">*</span>
                                            </label>

                                                <input type="text" class="form-control" placeholder="Enters Location" name="location"
                                                value="{{isset($preview)?$preview->location:''}}" id="validationCustom04" required>
                                                <div class="invalid-feedback">
                                                    Please enter a location.
                                                </div>

                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom5">Company Type
                                                <span class="text-danger">*</span>
                                            </label>

                                                <select class="form-control" name="company_type" id="validationCustom5" required >
                                                    <option value="">Select Company Type</option>
                                                    <option value="Old">Old</option>
                                                    <option value="Start-Up">Start-Up</option>

                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select Company Type.
                                                </div>
                                        </div>

                                        <div id="select">
                                            <div class="mb-3" >
                                                <label class="form-label" for="validationCustom6">Next Follow Date
                                                    <span class="text-danger">*</span>
                                                </label>

                                                    <input type="date" class="form-control" placeholder="Select Next-Follow-Date " name="next_follow_date"
                                                    id="validationCustom6" required >
                                                    <div class="invalid-feedback">
                                                        Please enter Next Follow Date.
                                                    </div>

                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom7">Next Follow Time <span
                                                        class="text-danger">*</span>
                                                </label>

                                                    <input type="time" class="form-control" placeholder="Select Next-Follow-Time " name="next_follow_time"
                                                    id="validationCustom7" required >
                                                    <div class="invalid-feedback">
                                                        Please enter Next Follow Time.
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="mb-3" id="break" style="display:none">
                                            <label class="form-label" for="validationCustom8">Break Date
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="date" class="form-control" name="break_date" for="validationCustom8" >
                                                <div class="invalid-feedback">
                                                    Please enter Break Date.
                                                </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom9">Complete Company Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" placeholder="Enter Complete Company Name"
                                                name="complete_com_name"  id="validationCustom9" required>
                                                <div class="invalid-feedback">
                                                    Please enter Complete company_name.
                                                </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom10">Email
                                                <span class="text-danger">*</span>
                                            </label>
                                                <input type="text" id="email" class="form-control" placeholder="Enter Your Email " name="email" id="validationCustom10" required />
                                                <div class="invalid-feedback">
                                                    Please enter a email.
                                                </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom11">Phon Number
                                                <span class="text-danger">*</span>
                                            </label>
                                                <input type="tel" class="form-control" placeholder="Enter Phone Number" name="contact"
                                                id="validationCustom11" required>
                                                <div class="invalid-feedback">
                                                    Please enter contact.
                                                </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom12">Proposal Type <span
                                                    class="text-danger">*</span>
                                            </label>

                                                <select name="enquiry_type_id" class="form-control" id="validationCustom12" required>
                                                    <option value="">Select Enquiry Type</option>
                                                    @php($Enquiry=\App\Models\EnquiryType::where(['status'=>'Active'])->get())
                                                    @foreach($Enquiry as $Enquirys)
                                                    <option value="{{$Enquirys->id}}">{{$Enquirys->name}}</option>

                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please Select Proposal Type.
                                                </div>

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom13">Status <span
                                                    class="text-danger">*</span>
                                            </label>

                                                <select name="status_id" class="form-control" onchange="addbreakdate(this.value);" id="validationCustom13" required>
                                                    <option value="">Select Status</option>
                                                    @php($status=\App\Models\Followup_remark::get())
                                                    @foreach($status as $statuss)
                                                    <option value="{{$statuss->id}}">{{$statuss->remark}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select Status.
                                                </div>

                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom14">Designation
                                                <span class="text-danger">*</span>
                                            </label>

                                                <input type="text" class="form-control" placeholder="Enter Designation" name="desig"
                                               id="validationCustom14" required>
                                                <div class="invalid-feedback">
                                                    Please enter a Designation.
                                                </div>

                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom15">DOB
                                                <span class="text-danger">*</span>
                                            </label>

                                                <input type="date" max="2004-12-31" class="form-control" placeholder="Enters Dob" name="dob"
                                                id="validationCustom15" required>
                                                <div class="invalid-feedback">
                                                    Please enter a DOB.
                                                </div>

                                        </div>


                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="mb-3">
                                            <label for="validationCustom16" class="form-label">Remark <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="remark" rows="4"
                                        placeholder="Enter Remark" id="validationCustom16" required></textarea>
                                            <div class="invalid-feedback">
                                                Please enter Remark.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 ">
                                        <div class="mb-3">
                                            <label for="validationCustom17" class="form-label">Select Company Logo <span class="text-danger">*</span></label>
                                            <div class="input-group ">
                                                <div class="form-file">
                                                    @include('cropper')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 offset-4">
                                        <div class="mb-3">

                                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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

<script>
        $('select').on('change', function() {
            var status = this.value;
        // alert(status);
    if(status=="15")
        $("#select").hide();
        else
        $("#select").show();
    });

        $('select').on('change', function() {
            var status = this.value;
        // alert(status);
    if(status=="15")

        $("#break").show();// hide multiple sections

        else

        $("#break").hide();

    });
</script>

@endsection
