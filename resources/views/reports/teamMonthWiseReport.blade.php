@extends('Master.master')
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
    .table tbody tr td {
         vertical-align: top;
        border-color: #F0F0F0;
    }
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row " style="margin-right: 0px;
        margin-left: 0px;">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card mb-4">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-4"  style="display:flex; align-items:center;">
                                <i class="fa-solid fa-people-group" style="color: #4275cd;  font-size:1.5rem; margin-right:10px;"></i>
                                <h5 class="mb-0" style="font-size: 1.1rem; font-weight: 500;">Team Month Wise Report</h5>
                            </div>
                            <div class="col-4">
                                <select name="employee" id="employeeSelect" class="form-control">
                                    <option value="">Select</option>
                                    <option value="">All</option>
                                    <!-- Add a value for "All" -->
                                    @php
                                    $users = \App\Models\User::where('created_by', Auth::user()->id)->where('is_active', 1)->get();
                                    $selectedUserId = request('employee'); // Get the selected user ID from the request
                                    @endphp
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $selectedUserId == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <select class="form-control" name="monthyear" onchange="monthReport();" id="monthyear" style=" font-size: 15px;
                                padding: 3px 7px;
                                border-radius: 4px; margin-right:15px;">
                                    @php
                                    $currentyear = \Carbon\Carbon::now()->format('Y');
                                    @endphp
                                    @for($i=2020;$i<=$currentyear;$i++) <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                        </div>
                        <div style="width:100%" class="d-flex justify-content-between align-items-center" >


                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div  id="monthReport" style="overflow: auto">

        </div>
    </div>
</div>


<script>
    function monthReport() {
        $('#monthReport').html('<div class="row"><div class="col-sm-3"><div class="linear-background"></div></div><div class="col-sm-3"><div class="linear-background"></div></div><div class="col-sm-3"><div class="linear-background"></div></div><div class="col-sm-3"><div class="linear-background"></div></div></div><p></p><div class="linear-background"></div><p></p><div class="linear-background"></div><p></p><div class="linear-background"></div><p></p><div class="linear-background"></div>');
        var year = $('#monthyear').val();
        var userId = $('#employeeSelect').val(); // Get the selected user's ID
console.log(userId);
        $.post("{{ url('teamMonthReport') }}", { year: year, id: userId, _token: '{{ csrf_token() }}' }, function (data) {
            $('#monthReport').html(data);
        });
    }
</script>

@endsection
