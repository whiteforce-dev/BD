@extends('Master.master')
@section('title', 'Enquiries')
@section('content')
<style>
    .review-table tbody tr td:nth-child(2) {
        width: 8%;
    }
</style>

    <div class="content-body">
        <div class="container-fluid">
            <div class="col-lg-12" >
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Target Assign</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('storeMonthlyTarget') }}" method="POST">
                            @csrf
                            <div class="col-xl-12 col-lg-8" style="margin-right: 0px; margin-left:0px;">
                                <div class="card m-0 ">
                                    <div class="card-body py-3 py-md-2">
                                        <div class="d-sm-flex  d-block align-items-center">
                                            <div class="d-flex mb-sm-0 mb-3 me-auto align-items-center">
                                                <div class="media-body">
                                                    <p class="mb-1 fs-12 "></p>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="mb-0 font-w600 fs-10">Select Target Type </h5>
                                                        </div>
                                                        <div class="col-6" >
                                                            <select style="border: 2px solid rgb(37, 36, 36);" name="target_type" class="form-control " id="validationCustom09" required>
                                                                <option value=""><h5>Select Target Type</h5></option>
                                                                @php
                                                                $targetType = \App\Models\EnquiryType::where(['status'=>'Active'])
                                                                ->get()
                                                                @endphp
                                                                @foreach($targetType as $targetTypes)
                                                                <option value="{{$targetTypes->id}}">{{$targetTypes->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th ><strong>Sr. NO.</strong></th>
                                            <th><strong>NAME</strong></th>
                                            @if (Auth::user()->type == 'Admin')
                                            <th>Assign Target</th>
                                        @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $total_month_target = 0;
                                        $total_target = 0;
                                        $total_complete = 0;
                                        $total_left = 0;
                                    @endphp
                                    {{--  @php
                                    $user = \App\Models\User::where('',Auth::user()->id)->where('is_active',1)->get();
                                    @endphp  --}}
                                    @foreach ($user as $obj => $users)
                                        <tr>
                                            <td><strong>{{ $obj+1 }}</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center"><img src="{{ url($users->image) }}" class="rounded-lg me-2" width="24" alt=""/> <span class="w-space-no">{{ $users->name }}</span></div></td>

                                            @if(Auth::user()->type == 'Admin')
                                                    <td>
                                                        <input type="number" min="0" max="50" name="{{ $users['id'] }}"
                                                            class="form-control" placeholder="Set Target" required>
                                                    </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>


                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Assign Team Target
                                  </button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Monthly Target - Recruitment</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Target</th>
                                            <th scope="col">Total Target</th>
                                            <th scope="col">Completed</th>
                                            <th scope="col">Remaining</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $obj => $users)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url($users->image) }}??''" class="rounded-lg me-2" width="24" alt=""/>
                                                        <span class="w-space-no">{{ $users->name }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    @php
                                                    $recruitmentTarget = $users->recruitmenttargets()->first(); // Retrieve the first recruitment target
                                                    @endphp
                                                    @if ($recruitmentTarget)
                                                        <span class="badge badge-primary light">{{ $recruitmentTarget->month_target }}</span>
                                                    @else
                                                        <span class="badge badge-primary light">N/A</span>
                                                    @endif
                                                </td>
                                                <td> @if ($recruitmentTarget)
                                                    <span class="badge badge-warning">{{ $recruitmentTarget->target }}</span>
                                                @else
                                                    <span class="badge badge-warning">N/A</span>
                                                @endif
                                                <td>
                                                    @if ($recruitmentTarget)
                                                        <span class="badge badge-success">{{ $recruitmentTarget->complete }}</span>
                                                    @else
                                                        <span class="badge badge-success">N/A</span>
                                                    @endif
                                                </td>
                                                <td>
                                                     @if ($recruitmentTarget)
                                                        <span class="badge badge-danger">{{ $recruitmentTarget->remaining }}</span>
                                                    @else
                                                        <span class="badge badge-danger">N/A</span>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Monthly Target - Temp Staffing</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Target</th>
                                            <th scope="col">Total Target</th>
                                            <th scope="col">Completed</th>
                                            <th scope="col">Remaining</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $obj => $users)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url($users->image) }}??''" class="rounded-lg me-2" width="24" alt=""/>
                                                        <span class="w-space-no">{{ $users->name }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    @php
                                                    $Temp = $users->temptargets()->first(); // Retrieve the first recruitment target
                                                    @endphp
                                                    @if ($Temp)
                                                        <span class="badge badge-primary light">{{ $Temp->month_target }}</span>
                                                    @else
                                                        <span class="badge badge-primary light">N/A</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($Temp)
                                                    <span class="badge badge-warning">{{ $Temp->target }}</span>
                                                @else
                                                    <span class="badge badge-warning">N/A</span>
                                                @endif
                                                <td>
                                                    @if ($Temp)
                                                        <span class="badge badge-success">{{ $Temp->complete }}</span>
                                                    @else
                                                        <span class="badge badge-success">N/A</span>
                                                    @endif
                                                </td>
                                                <td>
                                                     @if ($Temp)
                                                        <span class="badge badge-danger">{{ $Temp->remaining }}</span>
                                                    @else
                                                        <span class="badge badge-danger">N/A</span>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Monthly Target - FMS</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Target</th>
                                            <th scope="col">Total Target</th>
                                            <th scope="col">Completed</th>
                                            <th scope="col">Remaining</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $obj => $users)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url($users->image) }}??''" class="rounded-lg me-2" width="24" alt=""/>
                                                        <span class="w-space-no">{{ $users->name }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    @php
                                                    $FMS = $users->fmstargets()->first(); // Retrieve the first recruitment target
                                                    @endphp
                                                    @if ($FMS)
                                                        <span class="badge badge-primary light">{{ $FMS->month_target }}</span>
                                                    @else
                                                        <span class="badge badge-primary light">N/A</span>
                                                    @endif
                                                </td>
                                                <td> @if ($FMS)
                                                    <span class="badge badge-warning">{{ $FMS->target }}</span>
                                                @else
                                                    <span class="badge badge-warning">N/A</span>
                                                @endif
                                                <td>
                                                    @if ($FMS)
                                                        <span class="badge badge-success">{{ $FMS->complete }}</span>
                                                    @else
                                                        <span class="badge badge-success">N/A</span>
                                                    @endif
                                                </td>
                                                <td>
                                                     @if ($FMS)
                                                        <span class="badge badge-danger">{{ $FMS->remaining }}</span>
                                                    @else
                                                        <span class="badge badge-danger">N/A</span>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Monthly Target - Payroll </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Target</th>
                                            <th scope="col">Total Target</th>
                                            <th scope="col">Completed</th>
                                            <th scope="col">Remaining</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $obj => $users)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ url($users->image) }}??''" class="rounded-lg me-2" width="24" alt=""/>
                                                        <span class="w-space-no">{{ $users->name }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    @php
                                                    $Payroll = $users->payrolltargets()->first(); // Retrieve the first recruitment target
                                                    @endphp
                                                    @if ($Payroll)
                                                        <span class="badge badge-primary light">{{ $Payroll->month_target }}</span>
                                                    @else
                                                        <span class="badge badge-primary light">N/A</span>
                                                    @endif
                                                </td>
                                                <td> @if ($Payroll)
                                                    <span class="badge badge-warning">{{ $Payroll->target }}</span>
                                                @else
                                                    <span class="badge badge-warning">N/A</span>
                                                @endif
                                                <td>
                                                    @if ($Payroll)
                                                        <span class="badge badge-success">{{ $Payroll->complete }}</span>
                                                    @else
                                                        <span class="badge badge-success">N/A</span>
                                                    @endif
                                                </td>
                                                <td>
                                                     @if ($Payroll)
                                                        <span class="badge badge-danger">{{ $Payroll->remaining }}</span>
                                                    @else
                                                        <span class="badge badge-danger">N/A</span>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
