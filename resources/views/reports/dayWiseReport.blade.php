@extends('Master.master')
@section('title', 'Add Enquiry')

@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row " style="padding-right: 15px ; padding-left:15px;">

            <div class="col-sm-12 grid-margin stretch-card" >
                <div class="card">
                    <div class="card-body">

                        <p style="font-size: 1.1rem;" class="mb-0"><i class="mdi  mdi-graphql menu-icon"></i> Day Wise Enquiry Report </p>
                                <hr>
                        <br>
                        <form action="{{ url('dailyReports') }}" >

                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="from"
                                        value="{{ \Carbon\Carbon::parse($Date)->format('Y-m-d') }}">
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="to"disabled
                                        value="{{ \Carbon\Carbon::parse($Date)->addDays(6)->format('Y-m-d') }}">
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-primary btn-block">Search</button>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            @php
                    $enquiry = \App\Models\Enquiry::select('created_by')
                    ->distinct()
                    ->get();
                $status = \App\Models\Followup_remark::get();
                // $Details = \App\User::where('Created_by','=',4)->get();
                $user = \App\Models\User::where(['created_by' => 6, 'type' => 'Manager'])
                    ->orwhere('is_active', 1)
                    ->orwhere('id', 'NOT IN', 1)
                    ->get();
                // dd($user);
                $month = date('n');
            @endphp
            @php
            $fromnew = \Carbon\Carbon::parse(request('from'));
            $tonew = \Carbon\Carbon::parse(request('to'));
        @endphp

        @foreach ($user as $key => $users)
            @if(Auth::user()->type == 'Admin' || Auth::user()->type == 'Manager')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center" align="center">
                            <img style="width: 57px;
                            height: 57px;
                            padding: 2px;" src="{{ url($users->image) }}??''" class="rounded-lg me-2" width="24" alt=""/>
                            <h5 style="    font-family: system-ui;     padding-left: 13px;
                            font-size: 1.2rem;" class="w-space-no">{{ ucwords($users->name) }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Target Type</th>
                                        @for ($i = 0; $i < 7; $i++)
                                            <th>
                                                {{ \Carbon\Carbon::parse($fromnew)->addDays($i)->format('d M') }}
                                            </th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @php
                                            $i=0;
                                        @endphp
                                        <td>
                                            PAYROLL
                                            <hr>TEMP
                                            <hr>FMS
                                            <hr>RECRUITMENT
                                            <hr>TOTAL
                                        </td>
                                        @for($i = $diff ; $i >= 0 ; $i--)
                                            @php
                                                $date = \Carbon\Carbon::parse($fromnew)->subDay($i)->format('Y-m-d');
                                                $userId = $users->id;
                                                $dateFrom = $date . ' 00:00:00';
                                                $dateTo = $date . ' 23:59:59';
                                                $rec = \App\Models\Enquiry::whereBetween('created_at', [$dateFrom, $dateTo])->where(['created_by' => $userId, 'enquiry_type_id' => 4])->count();
                                                $temp = \App\Models\Enquiry::whereBetween('created_at', [$dateFrom, $dateTo])->where(['created_by' => $userId, 'enquiry_type_id' => 5])->count();
                                                $fms = \App\Models\Enquiry::whereBetween('created_at', [$dateFrom, $dateTo])->where(['created_by' => $userId, 'enquiry_type_id' => 6])->count();
                                                $pay = \App\Models\Enquiry::whereBetween('created_at', [$dateFrom, $dateTo])->where(['created_by' => $userId, 'enquiry_type_id' => 7])->count();
                                                $enqCount = \App\Models\Enquiry::whereBetween('created_at', [$dateFrom, $dateTo])->where('created_by', $userId)->count();
                                            @endphp
                                            <td>
                                                @if ($pay)
                                                    <span class="badge badge-primary light">{{ $pay }}</span>
                                                @else
                                                    <span class="badge badge-primary light">0</span>
                                                @endif
                                                <hr>
                                                @if ($temp)
                                                    <span class="badge badge-primary light"> {{ $temp }}</span>
                                                @else
                                                    <span class="badge badge-primary light">0</span>
                                                @endif
                                                <hr>
                                                @if ($fms)
                                                    <span class="badge badge-primary light">{{ $fms }}</span>
                                                @else
                                                    <span class="badge badge-primary light">0</span>
                                                @endif
                                                <hr>
                                                @if ($rec)
                                                    <span class="badge badge-primary light"> {{ $rec  }}</span>
                                                @else
                                                    <span class="badge badge-primary light">0</span>
                                                @endif
                                                <hr>
                                                @if ($enqCount)
                                                    <span class="badge badge-danger light"> {{ $enqCount }}</span>
                                                @else
                                                    <span class="badge badge-danger light">0</span>
                                                @endif
                                            </td>
                                        @endfor
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        </div>
    </div>
</div>

@endsection
