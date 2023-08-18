

<div class="col-xl-12 col-lg-8" style="padding-left: 0px !important;
/* width: 0px; */
padding-right: 0px !important;">
<div class="card m-0 ">
<div class="card-body py-3 py-md-2">
    <div class="d-sm-flex  d-block align-items-center">
        <div class="d-flex mb-sm-0 mb-3 me-auto align-items-center">
            <svg class="me-2 user-ico mb-1" width="24" height="24" viewBox="0 0 24 24"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)">
                    <path
                        d="M21 24H3C2.73478 24 2.48043 23.8946 2.29289 23.7071C2.10536 23.5196 2 23.2652 2 23V22.008C2.00287 20.4622 2.52021 18.9613 3.47044 17.742C4.42066 16.5227 5.74971 15.6544 7.248 15.274C7.46045 15.2219 7.64959 15.1008 7.78571 14.9296C7.92182 14.7583 7.9972 14.5467 8 14.328V13.322L6.883 12.206C6.6032 11.9313 6.38099 11.6036 6.22937 11.2419C6.07776 10.8803 5.99978 10.4921 6 10.1V5.96201C6.01833 4.41693 6.62821 2.93765 7.70414 1.82861C8.78007 0.719572 10.2402 0.0651427 11.784 5.16174e-06C12.5992 -0.00104609 13.4067 0.158488 14.1603 0.469498C14.9139 0.780509 15.5989 1.2369 16.1761 1.81263C16.7533 2.38835 17.2114 3.07213 17.5244 3.82491C17.8373 4.5777 17.999 5.38476 18 6.20001V10.1C17.9997 10.4949 17.9204 10.8857 17.7666 11.2495C17.6129 11.6132 17.388 11.9426 17.105 12.218L16 13.322V14.328C16.0029 14.5469 16.0784 14.7586 16.2147 14.9298C16.351 15.1011 16.5404 15.2221 16.753 15.274C18.251 15.6548 19.5797 16.5232 20.5298 17.7424C21.4798 18.9617 21.997 20.4624 22 22.008V23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24ZM4 22H20C19.9954 20.8996 19.6249 19.8319 18.9469 18.9651C18.2689 18.0983 17.3219 17.4816 16.255 17.212C15.6125 17.0494 15.0423 16.6779 14.6341 16.1558C14.2259 15.6337 14.0028 14.9907 14 14.328V12.908C14.0001 12.6428 14.1055 12.3885 14.293 12.201L15.703 10.792C15.7965 10.7026 15.8711 10.5952 15.9221 10.4763C15.9731 10.3574 15.9996 10.2294 16 10.1V6.20001C16.0017 5.09492 15.5671 4.03383 14.7907 3.24737C14.0144 2.46092 12.959 2.01265 11.854 2.00001C10.8264 2.04117 9.85379 2.47507 9.1367 3.21225C8.41962 3.94943 8.01275 4.93367 8 5.96201V10.1C7.99979 10.2266 8.0249 10.352 8.07384 10.4688C8.12278 10.5856 8.19458 10.6914 8.285 10.78L9.707 12.2C9.89455 12.3875 9.99994 12.6418 10 12.907V14.327C9.99724 14.9896 9.77432 15.6325 9.3663 16.1545C8.95827 16.6766 8.3883 17.0482 7.746 17.211C6.67872 17.4804 5.73137 18.0972 5.05318 18.9642C4.37498 19.8313 4.00447 20.8993 4 22Z"
                        fill="#000" />
                </g>
                <defs>
                    <clipPath id="clip0">
                        <rect width="24" height="24" fill="white" />
                    </clipPath>
                </defs>
            </svg>
            <div class="media-body">
                <p class="mb-1 fs-12 "></p>
                <h3 class="mb-0 font-w600 fs-22">Total Enquiries - {{ $Details1 }}</h3>
            </div>
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
                                @if($obj->image)
                                    <img src="{{ $obj->image }}" alt="" width="90%">
                                    @else
                                        <img src="{{ url('1691661956.png') }}" alt=""  width="70%" ">
                                @endif

                                <!-- <img src="{{ url('1691662031.png') }}" alt="" width="100" style="border-radius: 50%;"> -->
                            </div>
                            <div class="enquiry">
                                <h3>{{ isset($obj->company_name) ? $obj->company_name : 'N/A' }}</h3>
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
                                            @endif</span>
                                    </p>


                                </div>

                            </div>

                            <div class="dropdown btn">
                                <button class="dropbtn"
                                    style="display: flex; align-items: center; justify-content: center; text-align: center; margin-top: -35px;">Action
                                    <i style="font-size: 1.2rem; margin-left: 5px; margin-top: -12px;"
                                        class="fa-solid fa-sort-down"></i></button>
                                <div class="dropdown-content">
                                    <a href="javascript:void(0)" data-toggle="modal"
                                        data-target="#myModal2{{ $obj->id }}">View Details</a>

                                    <!-- <a href="javascript:void(0)" data-toggle="modal"
                                        data-target="#addMngrRemark{{ $obj->id }}"> Add Manager
                                        Remark</a> -->
                                    <a class="nav-link bell bell-link" href="javascript:void(0);" data-toggle="tab"
                                        data-target="#viewMRemarks{{ $obj->id }}"> View Remarks</a>

                                    <!-- <a href="javascript:void(0)" data-toggle="modal"
                                        data-target="#addfollowup{{ $obj->id }}"><i
                                            class="mdi  mdi-plus menu-icon text-primary"></i>Add Follow-Up</a> -->

                                        <!-- <a class="nav-link bell bell-link" href="javascript:void(0);" data-toggle="tab"
                                        data-target="#viewFollowUp{{ $obj->id }}"> View Follow-Up </a> -->
                                    <a href="{{ url('edit-enquiry', $obj->id) }}">Edit</a>
                                    <a href="{{ url('delete-enquiry', $obj->id) }}">Delete</a>
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
                                    <p class="font-b"> Next FollowUp Date</p>
                                    <p>
                                        @if ($obj->next_follow_date != '')
                                            @if ($rowStatus == 'Hot')
                                                {{ \Carbon\Carbon::parse($obj->next_follow_date)->format('d-m-Y') }}
                                            @else
                                                {{ \Carbon\Carbon::parse($obj->next_follow_date)->format('d-m-Y') }}
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
                                    <img src="{{ $obj->GetCreatedby->image ?? '-' }} " alt="">
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
                <div class="modal right fade right-Modal" id="myModal2{{ $obj->id }}" tabindex="-1"
                    role="dialog" aria-labelledby="myModalLabel2">
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
                @include('Enquiry.viewManagerRemarks')
                @include('Enquiry.AddManagerRemarks ')
                @include('Enquiry.AddFollowup')
                @include('Enquiry.viewFollowUp')
            @endforeach
            {{ $Details->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
