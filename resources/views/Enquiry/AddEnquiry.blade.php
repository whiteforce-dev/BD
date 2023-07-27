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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Validation</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="needs-validation" novalidate  action="{{url('store-enquiry')}}" method="POST" id='form' >
                                @csrf
                                <input type="hidden" class="form-control" placeholder="Enter Conpany Name" name="user_id"
                                          value="{{Auth::user()->created_by}}">
                                <div class="row">
                                    <div class="col-xl-6">

                                        <div class="mb-3 row">
                                            <label class="col-lg-6 col-form-label" for="validationCustom01">Company Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" placeholder="Enters Company Name"
                                                name="company_name"  id="validationCustom01" required>
                                                <div class="invalid-feedback">
                                                    Please enter a company_name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-6 col-form-label" for="validationCustom02">Contact Person Name <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" placeholder="Enters Contact Person Name"
                                                name="contact_person" id="validationCustom02" required>
                                                <div class="invalid-feedback">
                                                    Please enter contact_person.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-6 col-form-label" for="validationCustom03">Vertical
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                @php
                                                $industries = \App\Models\Industry::get()
                                            @endphp
                                            <select name="vertical" id="vertical" class="form-control" id="validationCustom03">
                                                <option value="">Select</option>
                                                @foreach($industries as $industry)
                                                <option value="{{$industry->industry_name}}" {{ (!empty($preview->vertical) && $preview->vertical == $industry->industry_name) ? 'selected' : '' }}>{{$industry->industry_name}}</option>
                                                @endforeach
                                            </select>
                                                <div class="invalid-feedback">
                                                    Please enter a Vertical.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-6 col-form-label" for="validationCustom04">Location <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" placeholder="Enters Location" name="location"
                                                value="{{isset($preview)?$preview->location:''}}" id="validationCustom04" required>
                                                <div class="invalid-feedback">
                                                    Please enter a location.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-lg-6 col-form-label" for="validationCustom05">Designation
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" placeholder="Enters Designation" name="desig"
                                               id="validationCustom05" required>
                                                <div class="invalid-feedback">
                                                    Please enter a Designation.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-6 col-form-label" for="validationCustom06">DOB
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" max="2004-12-31" class="form-control" placeholder="Enters Dob" name="dob"
                                                id="validationCustom06">
                                                <div class="invalid-feedback">
                                                    Please enter a DOB.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-lg-6 col-form-label" for="validationCustom14">Remark <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" name="remark" rows="4"
                                                 placeholder="Enter Remark" id="validationCustom14"></textarea>
                                                <div class="invalid-feedback">
                                                    Please enter Remark.
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6">

                                        <div class="mb-3 row">
                                            <label class="col-lg-5 col-form-label" for="validationCustom08">Email
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" id="email" class="form-control" placeholder="enter your email " name="email" id="validationCustom08" />
                                                <div class="invalid-feedback">
                                                    Please enter a email.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-lg-5 col-form-label" for="validationCustom07">Phon Number
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="tel" class="form-control" placeholder="Enters Phone Number" name="contact"
                                                id="validationCustom07" required>
                                                <div class="invalid-feedback">
                                                    Please enter contact.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-5 col-form-label" for="validationCustom09">Proposal Type <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select name="enquiry_type_id" class="form-control" id="validationCustom09" required>
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
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-5 col-form-label" for="validationCustom10">Status <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select name="status_id" class="form-control" onchange="addbreakdate(this.value);" id="validationCustom10" required>
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
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-5 col-form-label" for="validationCustom11">Next Follow Date
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" placeholder="Enters Next Action " name="next_follow_date"
                                                id="validationCustom11"  required>
                                                <div class="invalid-feedback">
                                                    Please enter Next Follow Date.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-5 col-form-label" for="validationCustom12">Next Follow Time <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="time" class="form-control" placeholder="Enters Next Action " name="next_follow_time"
                                                id="validationCustom12" required>
                                                <div class="invalid-feedback">
                                                    Please enter Next Follow Time.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-5 col-form-label" for="validationCustom13">Company Type
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="company_type" id="validationCustom13">

                                                    <option value="Old">Old</option>
                                                    <option value="Start-Up">Start-Up</option>

                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select Company Type.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-lg-6 ms-auto ">
                                                <button type="submit" class="btn btn-primary btn-block" style="margin-left: -40px ">Submit</button>
                                            </div>
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
@endsection
