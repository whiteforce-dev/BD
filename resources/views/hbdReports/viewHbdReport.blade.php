@extends('Master.master')
@section('title', 'Enquiries')
@section('content')
<link rel="stylesheet" href="{{ url('EnquiryCards/cards.css') }}">
<div class="content-body">
    <div class="container-fluid">
        <div class="container mt-5"
        style="padding-left: 0px !important;
        /* width: 0px; */
        padding-right: 0px !important;">
        <div class="row justify-content-center">
            <div class="col-md-12"style="margin-top: -50px">
                <div class="card" style="    height: 82px;">
                    <div class="card-body">
                        <!-- Search Form -->
                        <form id="searchForm" action="{{ url('searchEnquiry') }}" method="get">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <select name="days" id="days" class="form-control">
                                        <option value="0">Today</option>
                                        <option value="7">07 Days</option>
                                        <option value="15">15 Days</option>
                                        <option value="30" >30 Days</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <select name="status" id="status" class="form-control">
                                        <option value="">All</option>
                                        @php
                                        $status = App\Models\Followup_remark::where('status','active')->get()
                                        @endphp
                                        @foreach($status as $obj)
                                        <option value="{{ $obj->id }}">{{ $obj->remark }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4" style="margin-top: -5px;">
                                    <button class="btn btn-primary btn-block" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
        {{--  <div class="row">
            <div class="col-xl-4 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header border-0 pb-0" style="background-color: white;">
                        <h2 class="card-title">Birthday - 27 Sep.</h2>
                    </div>
                    <div class="card-body pb-0">
                        <h5>Village Financial Services</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                <strong>Name</strong>
                                <span class="mb-0">Shainki Asati</span>
                            </li>
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                <strong>Contact</strong>
                                <span class="mb-0">8269417032</span>
                            </li>
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                <strong>Email</strong>
                                <span class="mb-0">Shainkiasati@gmail.com</span>
                            </li>
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                <strong>Designation</strong>
                                <span class="mb-0">Laravel Developer</span>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer pt-0 pb-0 text-center" style="background-color: white; font-size: 13px;">
                        <div class="row">
                            <div class="col-4 pt-3 pb-3 border-end">
                                <h3 class="mb-1 text-primary" style="font-size: 15px;">150</h3>
                                <span>Remaining Days</span>
                            </div>
                            <div class="col-4 pt-3 pb-3 border-end">
                                <h3 class="mb-1 text-primary" style="font-size: 15px;">Hot</h3>
                                <span>Status</span>
                            </div>
                            <div class="col-4 pt-3 pb-3">
                                <h3 class="mb-1 text-primary" style="font-size: 15px;" >shainki</h3>
                                <span>Created By</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  --}}
        @foreach ($Details as $index => $obj)
        <section class="cards-one" style=" font-family: Poppins, sans-serif;">
            <div class="head">
                <div class="first-head">
                    <div class="logo">
                        @if($obj->image)
                            <img src="{{ $obj->image }}" alt="" width="90%">
                            @else
                                <img src="{{ url('logo2.png') }}" alt=""  width="70%" ">
                        @endif

                        <!-- <img src="{{ url('logo.png') }}" alt="" width="100" style="border-radius: 50%;"> -->
                    </div>
                    <div class="enquiry">
                        <div class="enq" >
                            <h3 style="width: 55%;">{{ isset($obj->company_name) ? $obj->company_name : 'N/A' }}</h3>
                            <p style=""> <span style="color: #2960be; ">Current Status : </span>
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
                        <div class="enq" style="margin-top: -10px;">
                            {{--  <!-- <p class="date">Enquiry Date : 07/08/2023</p>
                                    <p class="date">Lead Days :28 </p> -->  --}}

                            <p style="width: 55%;"><span>Contact Person :</span> {{ $obj->contact_person }}</p>
                            <p style="width: 40%; margin:0px;"><span>Location : </span>{{ $obj->location }}</p>


                        </div>
                        <div class="info">
                            <p style="width: 40%; margin:0px;"><span>Email : </span>{{ $obj->email }}</p>

                            <p ><span>Phone Number : </span> {{ $obj->contact }}</p>
                        </div>

                    </div>
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

                            <p class="font-b">Birthday Date:</p>
                            <p>
                                @if ($obj->dob != '')
                                {{\Carbon\Carbon::parse($obj->dob)->format('d-M')}}
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


@endforeach
    {{ $Details->appends(request()->except('page'))->links('pagination::bootstrap-4') }}

    </div>
</div>
@endsection
