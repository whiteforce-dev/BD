@extends('Master.master')
@section('title', 'Enquiries')

@section('content')


    <div class="content-body">
        <div class="container-fluid">

            <div class="col-lg-12">
                <div class="card" >
                    <div class="card-header">
                        <h4 class="card-title">Total Enquiry - {{ $Details1 }} </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="height: 380px">
                            <table class="table table-bordered table-responsive-sm" >
                                <thead >
                                    <tr>
                                        <th scope="col">Sn. No</th>
                                        <th scope="col">Enquiry Date</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Lead Days</th>
                                        <th scope="col">Company Type</th>
                                        <th scope="col">Vertical</th>
                                        <th scope="col">Contact Person</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Proposal Type</th>
                                        <th scope="col">Current Status</th>
                                        <th scope="col">Next Follow Up Date</th>
                                        <th scope="col">Latest Remark</th>
                                        <th scope="col">Manager Remark</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Details as $index => $obj)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="email" value="{{ $obj->email }}"
                                                class="checkBoxClass"
                                                value="{{ $obj->id }}" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            {{ ($Details->currentpage() - 1) * $Details->perpage() + $index + 1 }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($obj->created_at)->format('d-m-Y') }}
                                            {{ $obj->time }}
                                        </td>
                                        <td>
                                            {{ isset($obj->company_name) ? $obj->company_name : 'N/A' }}<br>
                                            <small>Created by:{{ $obj->GetCreatedby->name }}</small>
                                        </td>
                                        <td>
                                            <?php
                                            $year = date('Y');
                                            $birth = \Carbon\carbon::parse($obj->created_at)->format('Y-m-d');
                                            $today = \Carbon\carbon::now()->format('d-m');
                                            $date1 = date_create($today . '-' . $year);
                                            $date2 = date_create($birth . '-' . $year);
                                            $diff = date_diff($date1, $date2);
                                            $diffrence_one = $diff->format('%a');
                                            ?>
                                            @if ($diffrence_one <= 30)
                                                <label class="btn btn-success">
                                                    <?php echo $diffrence_one = $diff->format('%a'); ?>
                                                </label>
                                            @elseif($diffrence_one > 30 && $diffrence_one <= 60)
                                                <label class="btn btn-warning">
                                                    <?php echo $diffrence_one = $diff->format('%a'); ?>
                                                </label>
                                            @else
                                                <label class="btn btn-danger">
                                                    <?php echo $diffrence_one = $diff->format('%a'); ?>
                                                </label>
                                            @endif
                                        </td>

                                        <td>{{ isset($obj->company_type) ? $obj->company_type : 'N/A' }}</td>
                                        {{-- <td>{{ $obj->budget }}</td> --}}
                                        <td>{{ $obj->vertical }}</td>
                                        <td>{{ $obj->contact_person }}</td>
                                        <td>{{ $obj->desig }}</td>
                                        <td>{{ $obj->email }}</td>
                                        <td>{{ $obj->contact }}</td>

                                        @if ($obj->dob != '')
                                            <td>{{ \Carbon\Carbon::parse($obj->dob)->format('d-m-Y') }}</td>
                                        @else
                                            <td>N/A</td>
                                        @endif
                                        <td>{{ $obj->location }}</td>

                                        <td>{{ isset($obj->GetEnquiryType->name) ? $obj->GetEnquiryType->name : 'N/A' }}
                                        </td>
                                        <?php
                                        $rowStatus = $obj->GetStatus->remark ?? '-';
                                        ?>

                                        @if (isset($obj->GetStatus->remark))
                                            @if ($rowStatus == 'Hot')
                                                <td><label class="">Hot</label></td>
                                            @elseif($rowStatus == 'Cold')
                                                <td><label class="">Cold</label></td>
                                            @elseif($rowStatus == 'Process')
                                                <td><label class="">Process</label></td>
                                            @elseif($rowStatus == 'Break')
                                                <td><label class="">Break</label></td>
                                            @elseif($rowStatus == 'Hold')
                                                <td><label class="">Hold </label></td>
                                            @elseif($rowStatus == 'Positive')
                                                <td><label class="">Positive </label></td>
                                            @endif
                                        @else
                                            <td>-</td>
                                        @endif


                                        @if ($obj->next_follow_date != '')
                                            @if ($rowStatus == 'Hot')
                                                <td> <label class="badge badge-warning">
                                                        {{ \Carbon\Carbon::parse($obj->next_follow_date)->format('d-m-Y') }}
                                                </td>
                                            @else
                                                <td> {{ \Carbon\Carbon::parse($obj->next_follow_date)->format('d-m-Y') }}
                                                </td>
                                            @endif
                                        @else
                                            <td>N/A
                                            </td>
                                        @endif
                                        {{-- <td>{{ isset($obj->remark) ? $obj->remark : 'N/A' }}</td>
                                <td>{{ $obj->manager_remark ?? '-' }}</td> --}}

                                        <td style="white-space: normal !important; vertical-align: middle !important;">
                                            <ul>
                                                <li>
                                                    <p
                                                        style="width: 120px !important; word-break: break-word;margin-top:0px;">
                                                        {{ isset($obj->remark) ? $obj->remark : 'N/A' }}</p>
                                                </li>
                                                <small>Created at :</small><small>
                                                    {{ \carbon\carbon::parse($obj->updated_at)->format('d-m-Y') }}</small>
                                            </ul>
                                        </td>


                                        <?php

                                        $remarks = \App\Models\ManagerRemark::where(['enquiry_id' => $obj->id])
                                            ->orderBy('id', 'desc')
                                            ->first();

                                        ?>
                                        <td style=" word-wrap: break-word;">

                                            <ul>
                                                {{-- @foreach ($remarks as $remark) --}}
                                                <li
                                                    style="white-space: normal !important; vertical-align: text-top !important;">
                                                    <p
                                                        style="width: 120px !important; word-break: break-word;margin-top:0px;">
                                                        {{ $remarks->remark ?? '-' }}
                                                </li>


                                                <small>Created at
                                                    :</small><small>{{ \Carbon\Carbon::parse($remarks->created_at ?? '')->format('d-m-Y') }}</small>
                                                {{-- @endforeach   --}}
                                            </ul>
                                        </td>
                                        <td>
                                            <span class="nav-item dropdown btn btn-outline-info ">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-body"
                                                    href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false" v-pre="">
                                                    More
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="">
                                                        Add follow up
                                                    </a>

                                                    <a class="dropdown-item" href="">
                                                        View follow up
                                                    </a>

                                                    <a class="dropdown-item" href="">
                                                        View manager remark
                                                    </a>

                                                    <a class="dropdown-item"
                                                        href="{{ url('/editEnquiry', $obj->id) }}">
                                                        Edit
                                                    </a>

                                                    <a class="dropdown-item"
                                                        href="{{ url('deleteEnquiry', $obj->id) }}">
                                                        Delete
                                                    </a>


                                                </div>
                                            </span>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>


    </div>
@endsection
