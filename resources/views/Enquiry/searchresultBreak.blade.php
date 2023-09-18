        <div class="col-xl-12 col-lg-8" style="padding-left: 0px !important;
            /* width: 0px; */
            padding-right: 0px !important;">
            <div class="card m-0 ">
                <div class="card-body py-3 py-md-2">
                    <div class="d-sm-flex  d-block align-items-center">
                        <div class="d-flex mb-sm-0 mb-3 me-auto align-items-center"
                        style="width: 97%;
                        margin: 10px 5px;">
                        <i class="fa-solid fa-user-tie" style="color: #3772d7;
                        font-size: 1.4rem;
                        margin-top: -10px;"></i>
                        <div class="media-body" style="padding-left: 15px;">
                            {{--  <p class="mb-1 fs-12 "></p>  --}}
                            <input id="chkCheckAll"
                                style="position: absolute;
                                    right: 1%;
                                    top: 26%; border: 2px solid #d2d4DE;"
                                type="checkbox" class="form-check-input" type="checkbox" onchange="checkAll(this)"
                                name="chk[]" />
                            <div class="row" style="width: 180%;">
                                <div class="col-4" style="max-width: 66.333333%;">
                                    <h3 class="mb-0 font-w600 fs-22" style="font-size: 1.05rem !important;
                                    color: #383e45;
                                    margin-top: -3px;">
                                        Total Enquiries - {{ $Details1 }}</h3>
                                </div>

                                    <div class="col-md-4" style="max-width: 11% !important;
                                    margin-top: -8px;">
                                        <select class="form-control" name="template" value=""
                                            style="border:1px solid #ccc; font-size:0.9rem; height:34px; ">
                                            <option>Select Template</option>
                                            @php
                                                $user = \App\Models\Email::get();
                                            @endphp
                                            @foreach ($user as $users)
                                                <option value="">{{ $users->name }}</option>
                                            @endforeach
                                        </select>
                                  </div>
                                    <div class="col-md-4" style=" max-width: 8% !important;
                                    margin-top: -8px;">
                                        <button type="submit" class="btn btn-primary col-md-12" style="margin-top: -4px; font-size:0.9rem; height:34px;">Send
                                            Mail</button>
                                    </div>


                            </div>
                        </div>
                        {{--  <a id="searchingForm" class="searchbtn btn float-right "
                            style="padding: 10px 14px !important;
                            margin-top: 1px;
                            cursor: pointer;
                            width: 8%;"
                            onclick="toggleSearchForm(event)">
                            <i class="fa-solid fa-magnifying-glass" style="color: #2e6ad1; font-size: 1.2rem;"></i>
                        </a>  --}}
                        <i id="searchingForm" onclick="toggleSearchForm(event)" class="fa-solid fa-magnifying-glass" style="color: #2e6ad1; font-size: 1.2rem; "></i>
                    </div>

                    </div>
                </div>
            </div>
        </div>

        @foreach ($Details as $index => $obj)
            <section class="cards-one" style=" font-family: Poppins, sans-serif;">
                <div class="head">
                    <div class="first-head">
                        <div class="logo">
                            @if ($obj->image)
                                <img src="{{ url( $obj->image) }}" alt="" width="90%">
                            @else
                                <img src="{{ url('logo.png') }}" alt="" width="90%" ">
                           @endif
                        </div>
                        <div class="enquiry">
                            <h3>{{ isset($obj->company_name) ? $obj->company_name : 'N/A' }}</h3>
                            <input type="checkbox"
                            style="border: 2px solid #d2d4DE; position: absolute;
                                    right: 0 !important;
                                    left: 980px;
                                    top: 8px;"
                            type="checkbox" class="form-check-input" name="email" value="{{ $obj->email }}"
                            class="checkBoxClass" value="{{ $obj->id }}" />
                            <div class="enq">
                                {{--  <!-- <p class="date">Enquiry Date : 07/08/2023</p>
                                                <p class="date">Lead Days :28 </p> -->  --}}
                                <p style="width: 40%;"><span>Contact Person :</span> {{ $obj->contact_person }}</p>
                                <p><span>Email : </span>{{ $obj->email }}</p>
                            </div>
                            <div class="info">
                                <p style="width: 40%;"><span>Location : </span>{{ $obj->location }}</p>
                                <p><span>Phone Number : </span> {{ $obj->contact }}</p>
                                <p style="padding-left: 30px;"> <span style="color: #2960be; ">Current Status : </span>
                                    <span>
                                        <?php
                                        $rowStatus = $obj->GetStatus->remark ?? '-';
                                        ?>

                                        @if (isset($obj->GetStatus->remark))
                                            @if ($rowStatus == 'Hot')
                                                <td><label class="badge badge-danger">Hot</label></td>
                                            @elseif($rowStatus == 'Cold')
                                                <td><label class="badge badge-info">Cold</label></td>
                                            @elseif($rowStatus == 'Process')
                                                <td><label class="badge badge-primary">Process</label></td>
                                            @elseif($rowStatus == 'Break')
                                                <td><label class="badge badge-success">Break</label></td>
                                            @elseif($rowStatus == 'Hold')
                                                <td><label class="badge badge-warning">Hold </label></td>
                                            @elseif($rowStatus == 'Positive')
                                                <td><label class="badge badge-info">Positive </label></td>
                                            @endif
                                        @else
                                            <td>-</td>
                                        @endif
                                    </span>
                                </p>


                            </div>

                        </div>

                        <div class="dropdown btn" style="margin-top: 30px;">
                            <button class="dropbtn"
                                style="display: flex; align-items: center; justify-content: center; text-align: center; margin-top: -35px;">Action
                                <i style="font-size: 1.2rem; margin-left: 5px; margin-top: -12px;"
                                    class="fa-solid fa-sort-down"></i></button>
                            <div class="dropdown-content">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal2{{ $obj->id }}">View
                                    Details</a>

                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#alloteClient{{ $obj->id }}">Allot to Manager</a>

                                    <a href="javascript:void(0)" data-toggle="modal"
                                    data-target="#addAgreement{{ $obj->id }}"><i
                                    class="mdi  mdi-plus menu-icon text-primary"></i>Add Agreement/Pdf</a>

                                    <a href="javascript:void(0)" data-toggle="modal"
                                    data-target="#addFeedback{{ $obj->id }}"><i
                                        class="mdi  mdi-plus menu-icon text-primary"></i>Feedback</a>

                                {{--  <!-- <a class="nav-link bell bell-link" href="javascript:void(0);" data-toggle="tab"
                                            data-target="#viewMRemarks{{ $obj->id }}"> View Manager Remark</a> -->  --}}

                             @if(Auth::user()->type == 'Admin')
                             <a href="{{ url('cancel-agreement', $obj->id) }}">Cancle Agreement</a>
                             <a href="{{ url('deleteEnquiry', $obj->id) }}">Delete</a>
                             @endif
                            </div>
                        </div>
                        <!-- <div class="btn">
                                                        <button>Action</button>
                                        </div> -->
                    </div>

                </div>
                <div class="box">
                    <div class="up-box">

                        <div class="inner">
                            <div class="icon">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                            </div>
                            <div class="sub-inner">
                                <?php
                                $year = date('Y');
                                $birth = \Carbon\carbon::parse($obj->created_at)->format('Y-m-d');
                                $today = \Carbon\carbon::now()->format('d-m');
                                $date1 = date_create($today . '-' . $year);
                                $date2 = date_create($birth . '-' . $year);
                                $diff = date_diff($date1, $date2);
                                $diffrence_one = $diff->format('%a');
                                ?>
                                <p class="font-b"> Lead Days</p>
                                <p>
                                    @if ($diffrence_one <= 30)
                                        <label>
                                            <?php echo $diffrence_one = $diff->format('%a'); ?></label>
                                    @elseif($diffrence_one > 30 && $diffrence_one <= 60)
                                        <label>
                                            <?php echo $diffrence_one = $diff->format('%a'); ?></label>
                                    @else
                                        <label><?php echo $diffrence_one = $diff->format('%a'); ?></label>
                                    @endif
                                </p>
                            </div>


                        </div>
                        <div class="inner">
                            <div class="icon">
                                <i class="fa-solid fa-map-location"></i>
                            </div>

                            <div class="sub-inner">
                                <p class="font-b"> Manager Remark</p>
                                @php
                                    $managerRemark = isset($obj->GetManagerRemarks) ? $obj->GetManagerRemarks->remark : null;
                                @endphp
                                <p class="manager-remark" title="{{ $managerRemark ?? 'N/A' }}">
                                    {{ $managerRemark ? substr($managerRemark, 0, 25) : 'N/A' }}{{ $managerRemark && strlen($managerRemark) > 25 ? '...' : '' }}
                                </p>
                            </div>


                        </div>
                    </div>
                    <div class="up-box">

                        <div class="inner">
                            <div class="icon">
                                <i class="fa-solid fa-file-import"></i>
                            </div>
                            <div class="sub-inner">
                                <p class="font-b"> Enquiry Date</p>
                                <p>{{ \Carbon\Carbon::parse($obj->created_at)->format('d-m-Y') }}
                                    {{ $obj->time }}</p>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="icon">
                                <i class="fa-solid fa-user-tag"></i>
                            </div>
                            <div class="sub-inner">
                                <p class="font-b"> Employee Remark</p>
                                <p class="employee-remark" title="{{ isset($obj->remark) ? $obj->remark : 'N/A' }}">
                                    {{ isset($obj->remark) ? substr($obj->remark, 0, 25) : 'N/A' }}{{ strlen($obj->remark) > 25 ? '...' : '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="up-box">
                        <div class="inner">
                            <div class="icon">
                                <i class="fa-regular fa-calendar"></i>
                            </div>
                            <?php
                            $rowStatus = $obj->GetStatus->remark ?? '-';
                            ?>
                            <div class="sub-inner">
                                <p class="font-b"> Break Date</p>
                                <p>
                                    @if ($obj->break_date != '')
                                        @if ($rowStatus == 'Hot')
                                            {{ \Carbon\Carbon::parse($obj->break_date)->format('d-m-Y') }}
                                        @else
                                            {{ \Carbon\Carbon::parse($obj->break_date)->format('d-m-Y') }}
                                        @endif
                                    @else
                                        <td>N/A
                                        </td>
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="inner">
                            <div class="icon">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                            <div class="sub-inner">
                                <p class="font-b">Proposal Type</p>
                                <p>{{ isset($obj->GetEnquiryType->name) ? $obj->GetEnquiryType->name : 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="up-box">
                        <div class="inner">
                            <div class="icon">
                                <i class="fa-solid fa-user-shield"></i>
                            </div>
                            <div class="sub-inner">

                                <p class="font-b">DOB :</p>
                                <p>
                                    @if ($obj->dob != '')
                                        {{ \Carbon\Carbon::parse($obj->dob)->format('d-m-Y') }}
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="inner">
                            <div class="icon">
                                <!-- <i class="fa-solid fa-square-plus"></i> -->
                                <img src="{{ url($obj->GetCreatedby->image ?? '-') }} " alt="">
                            </div>
                            <div class="sub-inner">
                                <p class="font-b">Created By</p>
                                <p>{{ $obj->GetCreatedby->name ?? '-' }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <br>
            <div class="modal right fade right-Modal" id="myModal2{{ $obj->id }}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel2">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body custom-modal-body">
                            <div class="custom-tab-1">
                                <div class="tab-content custom-tab-content">
                                    <div id="details-tab{{ $obj->id }}" class="tab-pane fade active show"
                                        role="tabpanel">
                                        <div class="card custom-card">
                                            <div class="card-header">
                                                <h6>Enquiry Details</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row px-2">
                                                    <div class="left-row col-md-6">
                                                        <div class="candidate_mobile mb-4">
                                                            <h6 class="m-0">Company Name</h6>
                                                            <p class="m-0">
                                                                {{ isset($obj->company_name) ? $obj->company_name : 'N/A' }}
                                                                </h6>
                                                        </div>
                                                        <div class="candidate_qualification my-4">
                                                            <h6 class="m-0">Enquiry Date</h6>
                                                            <p class="m-0">{{ $obj?->created_at }}</h6>
                                                        </div>
                                                        <div class="candidate_sourcedPosition my-4">
                                                            <h6 class="m-0">Lead Days</h6>
                                                            <p class="m-0">
                                                                @if ($diffrence_one <= 30)
                                                                    <label>
                                                                        <?php echo $diffrence_one = $diff->format('%a'); ?></label>
                                                                @elseif($diffrence_one > 30 && $diffrence_one <= 60)
                                                                    <label>
                                                                        <?php echo $diffrence_one = $diff->format('%a'); ?></label>
                                                                @else
                                                                    <label><?php echo $diffrence_one = $diff->format('%a'); ?></label>
                                                                @endif
                                                                </h6>
                                                        </div>
                                                        <div class="candidate_mobile mb-4">
                                                            <h6 class="m-0">Company Type</h6>
                                                            <p class="m-0">{{ $obj?->company_type }}</h6>
                                                        </div>
                                                        <div class="candidate_qualification my-4">
                                                            <h6 class="m-0">Vertical</h6>
                                                            <p class="m-0">{{ $obj?->vertical }}</h6>
                                                        </div>
                                                        <div class="candidate_sourcedPosition my-4">
                                                            <h6 class="m-0">Contact Person</h6>
                                                            <p class="m-0">
                                                                {{ $obj->contact_person }}</h6>
                                                        </div>
                                                        <div class="candidate_sourcedPosition my-4">
                                                            <h6 class="m-0">Designation</h6>
                                                            <p class="m-0">
                                                                {{ $obj?->desig }}</h6>
                                                        </div>
                                                        <div class="candidate_sourcedPosition my-4">
                                                            <h6 class="m-0">Email</h6>
                                                            <p class="m-0">
                                                                {{ $obj->email }}</h6>
                                                        </div>
                                                    </div>

                                                    <div class="left-row col-md-6">
                                                        <div class="candidate_mobile mb-4">
                                                            <h6 class="m-0">Mobile</h6>
                                                            <p class="m-0">
                                                                {{ $obj->contact }}</h6>
                                                        </div>
                                                        <div class="candidate_qualification my-4">
                                                            <h6 class="m-0">Dob</h6>
                                                            <p class="m-0">{{ $obj?->dob }}</h6>
                                                        </div>
                                                        <div class="candidate_mobile mb-4">
                                                            <h6 class="m-0">Location</h6>
                                                            <p class="m-0">
                                                                {{ $obj->location }}</h6>
                                                        </div>
                                                        <div class="candidate_qualification my-4">
                                                            <h6 class="m-0">Proposal Type</h6>
                                                            <p class="m-0">
                                                                {{ isset($obj->GetEnquiryType->name) ? $obj->GetEnquiryType->name : 'N/A' }}
                                                                </h6>
                                                        </div>

                                                        <div class="candidate_mobile mb-4">
                                                            <h6 class="m-0">Current Status</h6>
                                                            <p class="m-0">
                                                                {{ $obj->GetStatus->remark ?? '-' }}</h6>
                                                        </div>
                                                        <div class="candidate_qualification my-4">
                                                            <h6 class="m-0">Next Follow Up Date</h6>
                                                            <p class="m-0">{{ $obj?->next_follow_date }}</h6>
                                                        </div>
                                                        <div class="candidate_mobile mb-4">
                                                            <h6 class="m-0">Latest
                                                                Remark</h6>
                                                            <p class="m-0">{{ $obj->remark ?? '-' }}
                                                                </h6>
                                                        </div>
                                                        <div class="candidate_qualification my-4">
                                                            <h6 class="m-0">Manager
                                                                Remark</h6>
                                                            @php
                                                                $managerRemark = isset($obj->GetManagerRemarks) ? $obj->GetManagerRemarks->remark : null;
                                                            @endphp
                                                            <p class="m-0">
                                                                {{ $obj->GetManagerRemarks->remark ?? '-' }}</h6>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('Enquiry.clientAllote.alloteClient')
            @include('Enquiry.feedback.feedback')
            @include('Enquiry.agreement.addAgreement')
            @include('Enquiry.viewFollowUp')
        @endforeach
   {{ $Details->appends(request()->except('page'))->links('pagination::bootstrap-4') }}


