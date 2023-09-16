
@extends('Master.master')
@section('title', 'Enquiries')
@section('content')
<style>
    .review-table tbody tr td:nth-child(2) {
        width: 8%;
    }
</style>
<style>
    thead, tbody, tfoot, tr, td, th {
        border-style: none;
   }
</style>
<style>
    /*!
 * Bootstrap v4.3.1 (https://getbootstrap.com/)
 * Copyright 2011-2019 The Bootstrap Authors
 * Copyright 2011-2019 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */

    html {
        font-family: sans-serif;
        line-height: 1.15;
        -webkit-text-size-adjust: 100%;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }

    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: left;
        background-color: #fff;
    }

    table {
        border-collapse: collapse;
    }

    caption {
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
        color: #6c757d;
        text-align: left;
        caption-side: bottom;
    }

    th {
        text-align: inherit;
    }

    label {
        display: inline-block;
        margin-bottom: 0.5rem;
    }

    .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }

    @media (min-width: 576px) {
        .container {
            max-width: 540px;
        }
    }

    @media (min-width: 768px) {
        .container {
            max-width: 720px;
        }
    }

    @media (min-width: 992px) {
        .container {
            max-width: 960px;
        }
    }

    @media (min-width: 1200px) {
        .container {
            max-width: 1140px;
        }
    }

    .container-fluid {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }

    .row {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }
    .table {
        max-width: 1000px; /* Set your desired maximum width in pixels */
    width: 100%; /* Set it to 100% to fill the container or adjust as needed */
    background: #fff;
    -webkit-box-shadow: 0px 5px 12px -12px rgba(0, 0, 0, 0.29);
    -moz-box-shadow: 0px 5px 12px -12px rgba(0, 0, 0, 0.29);
    box-shadow: 0px 5px 12px -12px rgba(0, 0, 0, 0.29);
    text-align: center;
    }
    .table thead th {
        border: none;
        padding: 15px;
        font-size: 14px;
        color: #fff;
        background: #4885ED;
    }

    .table tbody tr {
        margin-bottom: 10px;
    }

    .table tbody th,
    .table tbody td {
        border: none;
        padding: 17px;
        font-size: 14px;
        background: #fff;
        vertical-align: middle;
        border-bottom: 2px solid #f8f9fd;
    }

    .table tbody th.scope {
        background: #e8ebf8;
        border-bottom: 2px solid #e0e5f6;
    }

    @media (min-width: 768px) {
        .table tbody td:nth-child(odd) {
            background: #f4f6fc;
            border-bottom: 2px solid #eceffa;
        }
    }

    .btn {
        cursor: pointer;
        border-width: 2px;
        border-radius: 2px;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        font-size: 13px;
        font-weight: 500;
        -webkit-box-shadow: 0px 10px 20px -6px rgba(0, 0, 0, 0.12);
        -moz-box-shadow: 0px 10px 20px -6px rgba(0, 0, 0, 0.12);
        box-shadow: 0px 10px 20px -6px rgba(0, 0, 0, 0.12);
    }

    .btn:hover,
    .btn:active,
    .btn:focus {
        outline: none !important;
        -webkit-box-shadow: 0px 12px 20px -6px rgba(0, 0, 0, 0.21);
        -moz-box-shadow: 0px 12px 20px -6px rgba(0, 0, 0, 0.21);
        box-shadow: 0px 12px 20px -6px rgba(0, 0, 0, 0.21);
    }
    .blue {
        background-color: blue;
        border-radius: 5px;
        color: white;
        font-weight: 700;
        width: 90px;
    }

    .yellow {
        background-color: yellow;
        border-radius: 5px;
        font-weight: 700;
        color: #636b85;
    }
    .red {
        background-color: red;
        border-radius: 5px;
        color: white;
        font-weight: 700;
    }
</style>
    <div class="content-body">
        <div class="container-fluid">

            <div class="col-xl-12 col-lg-8" style="margin-right: 0px; margin-left:0px;">
                <div class="card m-0 " >
                    <div class="card-body py-3 py-md-2">
                        <div class="d-sm-flex  d-block align-items-center">
                            <div class="d-flex mb-sm-0 mb-3 me-auto align-items-center">
                                <div class="media-body" style="display:flex; align-items: center; ">
                                    <i class="fa-solid fa-street-view" style="color: #397fdb; margin-right:10px; font-size:1.5rem;"></i>
                                    <h3 style="font-size: 1.2rem;
                                    font-weight: 600;" class="mb-0 ">Total Target </h3>
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
                            <div class="card-header" style="border: 1px solid #d1e0e2;">
                                    <div class="d-flex align-items-center" align = "center">
                                    <img style="width: 60px;
                                    height: 60px;
                                    padding: 2px;" src="{{ url($users->image) }}??''" class="rounded-lg me-2" width="24" alt=""/>
                                    <h5 style="    font-family: system-ui;" class="w-space-no">{{ ucwords($users->name )}}</h5>
                                </div>

                            </div>
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
                                                                <span class="badge badge-warning light ">{{ $Payroll->target }}</span>
                                                            @else
                                                                <span class="badge badge-warning light">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($Temp)
                                                                <span class="badge badge-warning light">{{ $Temp->target }}</span>
                                                            @else
                                                                <span class="badge badge-warning light">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($FMS)
                                                                <span class="badge badge-warning light">{{ $FMS->target }}</span>
                                                            @else
                                                                <span class="badge badge-warning light">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($recruitmentTarget)
                                                                <span class="badge badge-warning light">{{ $recruitmentTarget->target }}</span>
                                                            @else
                                                                <span class="badge badge-warning light">0</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($Payroll)
                                                                <span class="badge badge-success light ">{{ $Payroll->complete }}</span>
                                                            @else
                                                                <span class="badge badge-success light">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($Temp)
                                                                <span class="badge badge-success light">{{ $Temp->complete }}</span>
                                                            @else
                                                                <span class="badge badge-success light">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($FMS)
                                                                <span class="badge badge-success light">{{ $FMS->complete }}</span>
                                                            @else
                                                                <span class="badge badge-success light">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($recruitmentTarget)
                                                                <span class="badge badge-success light">{{ $recruitmentTarget->complete }}</span>
                                                            @else
                                                                <span class="badge badge-success light">0</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($Payroll)
                                                                <span class="badge badge-danger light">{{ $Payroll->remaining }}</span>
                                                            @else
                                                                <span class="badge badge-danger light">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($Temp)
                                                                <span class="badge badge-danger light">{{ $Temp->remaining }}</span>
                                                            @else
                                                                <span class="badge badge-danger light">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($FMS)
                                                                <span class="badge badge-danger light">{{ $FMS->remaining }}</span>
                                                            @else
                                                                <span class="badge badge-danger light">0</span>
                                                            @endif
                                                            <hr>
                                                            @if ($recruitmentTarget)
                                                                <span class="badge badge-danger light">{{ $recruitmentTarget->remaining }}</span>
                                                            @else
                                                                <span class="badge badge-danger light">0</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                </div>
                    @endif
               @endforeach
            </div>
        </div>
    </div>
@endsection


