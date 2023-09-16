@extends('Master.master')
@section('title', 'Enquiries')
@section('content')
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
        {{--  padding: 30px;  --}}
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
        padding: 30px;
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
    a.badge-danger:hover {
        color: #f72b50 !important;
    }
    .col-md-3 {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        flex: 0 0 30% !important;
        width: 17% !important;
        max-width: 27% !important;
    }
    .form-control {
        width: 63% !important;
        font-size: 0.8rem !important;
        font-weight: 500 !important;
    }
    .col-md-4 {
        flex: 0 0 25.333333% !important;
        max-width: 33.333333%;
        display: flex  !important;
    align-items: center !important;
    justify-content: space-evenly !important;
    }
    .col-md-2 {
        flex: 0 0 16.666667% !important;
        max-width: 16.666667% !important;
    }
</style>
    <div class="content-body">
        <div class="container-fluid">

            <div class="container mt-5"
                style="padding-left: 0px !important;
                /* width: 0px; */
                padding-right: 0px !important;">
            <div class="row justify-content-center" style="margin-right: 0px; margin-left:0px;">
                <div class="col-md-12"style="margin-top: -50px">
                    <div class="card" style="    height: 84px;">
                        <div class="card-body">
                            <!-- Search Form -->
                            <form id="searchingForm" action="{{ url('searchPendingHbdCount') }}" method="get">
                                @csrf
                                <div class="row mb-3" style="display: flex;
                                align-items: center;
                                justify-content: space-evenly;">
                                    <div class="col-md-3">
                                        <label for="" style="font-size: 0.9rem; margin-top:8px;">From Date</label>
                                        <input type="date" class="form-control" name="from_date" id="from_date">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" style="font-size: 0.9rem; margin-top:8px;">To Date</label>
                                        <input type="date" class="form-control" name="to_date" id="to_date">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" style="font-size: 0.9rem; margin-top:8px;">Select Status</label>
                                        <select name="status" id="status" class="form-control" style="width: 40% !important;">
                                            <option value="">All</option>
                                            @php
                                            $status = App\Models\Followup_remark::where('status','active')->get()
                                            @endphp
                                            @foreach($status as $obj)
                                            <option value="{{ $obj->id }}">{{ $obj->remark }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2" style=" width:20%;">
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style=" font-size: 1.1rem;">Pending Birthday Report</h4>
                    </div>
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr >
                                        <th style="font-size: 14.5px;padding: 0.2rem;"><p style="margin-bottom: 0px !important;">S.No</p></th>
                                        <th style="font-size: 14.5px;padding: 0.2rem;"><p style="margin-bottom: 0px !important;">Image</p></th>
                                        <th style="font-size: 14.5px;padding: 0.2rem;"><p style="margin-bottom: 0px !important;">Employee Name</p></th>
                                        <th style="font-size: 14.5px;padding: 0.2rem;"><p style="margin-bottom: 0px !important;">Total Client</p></th>
                                        <th style="font-size: 14.5px;padding: 0.2rem;"><p style="margin-bottom: 0px !important;">Added Birhtday</p></th>
                                        <th style="font-size: 14.5px;padding: 0.2rem;"><p style="margin-bottom: 0px !important;">Pending Birhtday</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $currentUser)
                                    <tr>
                                        <td><p style="font-size: 16px;">{{ $index + 1 }}</p></td>
                                        <td style="width: 130px;height:130px;"><img src="{{ $currentUser->image }}??''" class="rounded-lg me-2" width="100%" height="100%" alt=""/></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="w-space-no">{{ $currentUser->name }}</span>
                                            </div>
                                        </td>
                                        <td style="font-size: 16px;"><span style="background: transparent;" class="badge badge-info light">{{ $currentUser->totalClients }}</span></td>
                                        <td style="font-size: 16px;"><span style="background: transparent;" class="badge badge-success light">{{ $currentUser->addedBirthdays }}</span></td>
                                        <td style="font-size: 16px;"><a style="background: transparent;" href="{{route('pendingBirthdaysList',['id' => $currentUser->id])}}" class="badge badge-danger light">{{ $currentUser->pendingBirthdays }}</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
