@extends('Master.master')
@section('title', 'Edit Enquiry')

@section('content')


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
                            <form class="needs-validation" novalidate  action="{{url('update-enquiry',  $enquiry->id )}}" method="POST" id='form' enctype="multipart/form-data" >
                                @csrf
                                <input type="hidden" class="form-control" placeholder="Enter Conpany Name" name="user_id"
                                          value="{{Auth::user()->created_by}}">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Company Name
                                                <span class="text-danger">*</span>
                                            </label>

                                                <input type="text" class="form-control" placeholder="Enters Company Name"
                                                name="company_name"  id="validationCustom01"  value="{{ $enquiry->company_name }}" required>
                                                <div class="invalid-feedback">
                                                    Please enter a company_name.
                                                </div>

                                        </div>
                                        <div class="mb-3 ">
                                            <label class="form-label" for="validationCustom02">Contact Person Name <span
                                                    class="text-danger">*</span>
                                            </label>
                                                <input type="text" class="form-control" placeholder="Enters Contact Person Name"
                                                name="contact_person" id="validationCustom02" value="{{ $enquiry->contact_person }}" required>
                                                <div class="invalid-feedback" >
                                                    Please enter contact_person.
                                                </div>
                                        </div>
                                        <div class="mb-3 ">
                                            <label class="form-label" for="validationCustom03">Vertical
                                                <span class="text-danger">*</span>
                                            </label>

                                                @php
                                                $industries = \App\Models\Industry::get()
                                            @endphp
                                            <select name="vertical" id="vertical" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($industries as $industry)
                                                    <option value="{{ $industry->industry_name }}" {{ (!empty($enquiry->vertical) && $enquiry->vertical == $industry->industry_name) ? 'selected' : '' }}>
                                                        {{ $industry->industry_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                                <div class="invalid-feedback">
                                                    Please enter a Vertical.
                                                </div>

                                        </div>
                                        <div class="mb-3 ">
                                            <label class="form-label" for="validationCustom04">Location <span
                                                    class="text-danger">*</span>
                                            </label>
                                                <input type="text" class="form-control" placeholder="Enters Location" name="location"
                                                value="{{ $enquiry->location }}" id="validationCustom04" required>
                                                <div class="invalid-feedback">
                                                    Please enter a location.
                                                </div>
                                        </div>

                                        <div class="mb-3 ">
                                            <label class="form-label" for="validationCustom05">Designation
                                                <span class="text-danger">*</span>
                                            </label>

                                                <input type="text" class="form-control" placeholder="Enters Designation" name="desig"
                                               id="validationCustom05"  value="{{ $enquiry->desig }}" required>
                                                <div class="invalid-feedback">
                                                    Please enter a Designation.
                                                </div>

                                        </div>
                                        <div class="mb-3 ">
                                            <label class="form-label" for="validationCustom06">DOB
                                                <span class="text-danger">*</span>
                                            </label>

                                                <input type="date" max="2004-12-31" class="form-control" placeholder="Enters Dob" name="dob"
                                                id="validationCustom06"  value="{{ $enquiry->dob }}">
                                                <div class="invalid-feedback">
                                                    Please enter a DOB.
                                                </div>

                                        </div>
                                    </div>
                                    <div class="col-xl-6">

                                        <div class="mb-3 ">
                                            <label class="form-label" for="validationCustom08">Email
                                                <span class="text-danger">*</span>
                                            </label>

                                                <input type="text" id="email" class="form-control" placeholder="enter your email " name="email" id="validationCustom08" value="{{ $enquiry->email }}" />
                                                <div class="invalid-feedback">
                                                    Please enter a email.
                                                </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom07">Phon Number
                                                <span class="text-danger">*</span>
                                            </label>
                                                <input type="tel" class="form-control" placeholder="Enters Phone Number" name="contact"
                                                id="validationCustom07" value="{{ $enquiry->contact}}" required>
                                                <div class="invalid-feedback">
                                                    Please enter contact.
                                                </div>
                                        </div>
                                        <div class="mb-3 ">
                                            <label class="form-label" for="validationCustom09">Proposal Type <span
                                                    class="text-danger">*</span>
                                            </label>

                                                <select name="enquiry_type_id" class="form-control" required>
                                                    <option value="">Select Enquiry Type</option>

                                                    @php
                                                    $Enquiry=\App\Models\EnquiryType::where(['status'=>'Active'])->get()
                                                    @endphp
                                                    @foreach($Enquiry as $Enquirys)
                                                    @if($Enquirys->id==(isset($enquiry)?$enquiry->enquiry_type_id:'Select'))
                                                    <option selected value="{{$Enquirys->id}}">{{$Enquirys->name}}</option>
                                                    @else

                                                    <option value="{{$Enquirys->id}}">{{$Enquirys->name}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please Select Proposal Type.
                                                </div>

                                        </div>
                                        <div class="mb-3 ">
                                            <label class="form-label" for="validationCustom10">Status <span
                                                    class="text-danger">*</span>
                                            </label>

                                                <select name="status_id" class="form-control"
                                                data-enquiry-id="{{ $enquiry->id }}" required>
                                                    <option value="">Select Status</option>
                                                    @php
                                                    $status=\App\Models\Followup_remark::get()
                                                    @endphp
                                                    @foreach($status as $statuss)
                                                    @if($statuss->id==(isset($enquiry)?$enquiry->status_id:'Select'))
                                                    <option selected value="{{$statuss->id}}">{{$statuss->remark}}</option>
                                                    @else

                                                    <option value="{{$statuss->id}}">{{$statuss->remark}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select Status.
                                                </div>

                                        </div>
                                        <div id="select-{{$enquiry->id}}">
                                            <div class="mb-3" >
                                                <label class="form-label" for="validationCustom11">Next Follow Date
                                                    <span class="text-danger">*</span>
                                                </label>

                                                    <input type="date" class="form-control" placeholder="Select Next-Follow-Date " name="next_follow_date"
                                                    id="validationCustom11"  >
                                                    <div class="invalid-feedback">
                                                        Please enter Next Follow Date.
                                                    </div>

                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="validationCustom12">Next Follow Time <span
                                                        class="text-danger">*</span>
                                                </label>

                                                    <input type="time" class="form-control" placeholder="Select Next-Follow-Time " name="next_follow_time"
                                                    id="validationCustom12" >
                                                    <div class="invalid-feedback">
                                                        Please enter Next Follow Time.
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="mb-3" id="break-{{$enquiry->id}}" style="display:none">
                                            <label class="form-label" for="validationCustom11">Break Date
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="date" class="form-control" name="break_date" >
                                                <div class="invalid-feedback">
                                                    Please enter Break Date.
                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom13">Company Type
                                                <span class="text-danger">*</span>
                                            </label>

                                            <select class="form-control" name="company_type">
                                                @if(isset($enquiry))
                                                <option value="Old" <?php if ($enquiry->company_type == "Old") { ?> selected="" <?php } ?>>Old
                                                </option>
                                                <option value="Start-Up" <?php if ($enquiry->company_type == "Start-Up") { ?> selected=""
                                                    <?php } ?>>Start-Up</option>
                                                @else
                                                <option value="Old">Old</option>
                                                <option value="Start-Up">Start-Up</option>
                                                @endif
                                            </select>
                                                <div class="invalid-feedback">
                                                    Please select Company Type.
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="mb-3">
                                            <label for="validationCustom14" class="form-label">Remark <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="remark" rows="4"
                                                 placeholder="Enter Remark" id="validationCustom14">{{ $enquiry->remark  }}</textarea>
                                            <div class="invalid-feedback">
                                                Please enter Remark.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 ">
                                        <div class="mb-3">
                                            <label for="validationCustom14" class="form-label">Select Company Logo <span class="text-danger">*</span></label>
                                            <div class="input-group ">
                                                <div class="form-file">
                                                    @php
                                                    $preview = $enquiry->image;
                                                    @endphp
                                                    @include('cropper')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 offset-4">
                                        <div class="mb-3">

                                            <button type="submit" class="btn btn-primary btn-block">Update</button>
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
    <div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('select[name="status_id"]').on('change', function() {
            var selectedStatus = $(this).val();
            var enquiryId = $(this).data('enquiry-id');

            if (selectedStatus == "15") {
                $("#select-" + enquiryId).hide();
                $("#break-" + enquiryId).show();
            } else {
                $("#select-" + enquiryId).show();
                $("#break-" + enquiryId).hide();
            }
        });
    });
</script>
