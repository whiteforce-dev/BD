
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

            <div class="col-xl-12 col-lg-8" style="margin-right: 0px; margin-left:0px;">
                <div class="card m-0 " >
                    <div class="card-body py-3 py-md-2">
                        <div class="d-sm-flex  d-block align-items-center">
                            <div class="d-flex mb-sm-0 mb-3 me-auto align-items-center">
                                <div class="media-body">
                                    <p class="mb-1 fs-12 "></p>
                                    <h3 class="mb-0 font-w600 fs-22"><i class="bi bi-bullseye"></i>  Total Target </h3>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="col-lg-12">
                @foreach ($user as $obj => $users)
                    @if ($users->id === Auth::user()->id)
                        <div class="card">
                            <div class="card-header">
                                    <div class="d-flex align-items-center" align = "center">
                                    <img style="width: 57px;
                                    height: 57px;
                                    border: 2px dashed #bfced6;
                                    padding: 2px;" src="{{ url($users->image) }}??''" class="rounded-lg me-2" width="24" alt=""/>
                                    <h5 style="    font-family: system-ui;" class="w-space-no">{{ ucwords($users->name )}}</h5>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                        <table class="table table-bordered verticle-middle table-responsive-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Target Type</th>
                                                    <th scope="col">Target</th>
                                                    <th scope="col">Total Target</th>
                                                    <th scope="col">Completed</th>
                                                    <th scope="col">Remaining</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td>
                                                            {{--  <div class="d-flex align-items-center">
                                                                <img src="{{ url($users->image) }}??''" class="rounded-lg me-2" width="24" alt=""/>
                                                                <span class="w-space-no">{{ $users->name }}</span>
                                                            </div>  --}}
                                                               PAYROLL
                                                            <hr>TEMP
                                                            <hr>FMS
                                                            <hr>RECRUITMENT
                                                        </td>
                                                        @php
                                                        $Payroll = $users->payrolltargets()->first();
                                                        $Temp = $users->temptargets()->first();
                                                        $FMS = $users->fmstargets()->first();
                                                        $recruitmentTarget = $users->recruitmenttargets()->first();
                                                        @endphp
                                                        <td>
                                                            @if ($Payroll)
                                                                <span class="badge badge-primary light">{{ $Payroll->month_target }}</span>
                                                            @else
                                                                <span class="badge badge-primary light">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($Temp)
                                                                <span class="badge badge-primary light">{{ $Temp->month_target }}</span>
                                                            @else
                                                                <span class="badge badge-primary light">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($FMS)
                                                                <span class="badge badge-primary light">{{ $FMS->month_target }}</span>
                                                            @else
                                                                <span class="badge badge-primary light">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($recruitmentTarget)
                                                                <span class="badge badge-primary light">{{ $recruitmentTarget->month_target }}</span>
                                                            @else
                                                                <span class="badge badge-primary light">0</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($Payroll)
                                                                <span class="badge badge-warning ">{{ $Payroll->target }}</span>
                                                            @else
                                                                <span class="badge badge-warning">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($Temp)
                                                                <span class="badge badge-warning">{{ $Temp->target }}</span>
                                                            @else
                                                                <span class="badge badge-warning">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($FMS)
                                                                <span class="badge badge-warning">{{ $FMS->target }}</span>
                                                            @else
                                                                <span class="badge badge-warning">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($recruitmentTarget)
                                                                <span class="badge badge-warning">{{ $recruitmentTarget->target }}</span>
                                                            @else
                                                                <span class="badge badge-warning">0</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($Payroll)
                                                                <span class="badge badge-success ">{{ $Payroll->complete }}</span>
                                                            @else
                                                                <span class="badge badge-success">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($Temp)
                                                                <span class="badge badge-success">{{ $Temp->complete }}</span>
                                                            @else
                                                                <span class="badge badge-success">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($FMS)
                                                                <span class="badge badge-success">{{ $FMS->complete }}</span>
                                                            @else
                                                                <span class="badge badge-success">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($recruitmentTarget)
                                                                <span class="badge badge-success">{{ $recruitmentTarget->complete }}</span>
                                                            @else
                                                                <span class="badge badge-success">0</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($Payroll)
                                                                <span class="badge badge-danger">{{ $Payroll->remaining }}</span>
                                                            @else
                                                                <span class="badge badge-danger">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($Temp)
                                                                <span class="badge badge-danger">{{ $Temp->remaining }}</span>
                                                            @else
                                                                <span class="badge badge-danger">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($FMS)
                                                                <span class="badge badge-danger">{{ $FMS->remaining }}</span>
                                                            @else
                                                                <span class="badge badge-danger">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($recruitmentTarget)
                                                                <span class="badge badge-danger">{{ $recruitmentTarget->remaining }}</span>
                                                            @else
                                                                <span class="badge badge-danger">0</span>
                                                            @endif
                                                        </td>
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


