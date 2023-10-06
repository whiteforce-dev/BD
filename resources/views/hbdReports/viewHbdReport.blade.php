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
        {{--  max-width: 1000px; /* Set your desired maximum width in pixels */  --}}
    width: 100%; /* Set it to 100% to fill the container or adjust as needed */
    background: #fff;
    -webkit-box-shadow: 0px 5px 12px -12px rgba(0, 0, 0, 0.29);
    -moz-box-shadow: 0px 5px 12px -12px rgba(0, 0, 0, 0.29);
    box-shadow: 0px 5px 12px -12px rgba(0, 0, 0, 0.29);
    text-align: center;
    }
    .table thead th {
        border: none;
        padding: 30px;
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
</style>
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
                            <form id="searchingForm"  action="{{ url('searchHbd') }}" method="get">
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <select name="days" id="days" class="form-control">
                                            <option value="0" {{ request('days') == '0' ? 'selected' : '' }}>Today</option>
                                            <option value="7" {{ request('days') == '7' ? 'selected' : '' }}>07 Days</option>
                                            <option value="15" {{ request('days') == '15' ? 'selected' : '' }}>15 Days</option>
                                            <option value="30" {{ request('days') == '30' ? 'selected' : '' }}>30 Days</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        @if (Auth::user()->type == 'Manager' || Auth::user()->type == 'Staff')
                                        <select name="employee" class="form-control">
                                            <option value="">Select</option>
                                            @php
                                            $users = \App\Models\User::where('is_active', 1)->where('parent_id', Auth::user()->id)->get();
                                        @endphp
                                            @foreach ($users as $users)
                                            {{--  <option value="">All</option>  --}}
                                                <option value="{{ $users->id }}"
                                                    {{ request('employee') == $users->id ? 'selected' : '' }}>
                                                    {{ $users->name }}</option>
                                            @endforeach
                                        </select>
                                        @elseif(Auth::user()->type == 'Admin')
                                        <select name="employee" class="form-control">
                                            <option value="">Select</option>
                                            <option value="">All</option>
                                            @php
                                            $users = \App\Models\User::where('is_active', 1)->get();
                                        @endphp
                                            @foreach ($users as $users)
                                                <option value="{{ $users->id }}"
                                                    {{ request('employee') == $users->id ? 'selected' : '' }}>
                                                    {{ $users->name }}</option>
                                            @endforeach
                                        </select>
                                        @endif

                                    </div>
                                    <div class="col-md-3">
                                        <select name="status" id="status" class="form-control">
                                            <option value="">All</option>
                                            @php
                                            $status = App\Models\Followup_remark::where('status','active')->get()
                                            @endphp
                                            @foreach($status as $obj)
                                            <option value="{{ $obj->id }}" {{ request('status') == $obj->id ? 'selected' : '' }}>{{ $obj->remark }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3" >
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
       <div class="row" id="searchResults">
        @include('hbdReports.hbdReportBySearch')
    </div>
    {{ $Details->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#searchingForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                type: 'GET',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    $('#searchResults').html(response);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
