@extends('Master.master')
@section('title', 'Add Enquiry')

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
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row " style="padding-right: 15px ; padding-left:15px;">

            <div class="col-sm-12 grid-margin stretch-card" >
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; align-items:center;">
                            <i class="fa-regular fa-calendar" style="color: #3b71ce; margin-right: 10px; font-size: 1.1rem;"></i><p style="font-size: 1.01rem;font-weight: 500;" class="mb-0"> Day Wise Enquiry Report </p>
                        </div>
                                <hr>
                        <br>
                        <form id="searchForm" action="{{ url('dailyReportsSearch') }}" method="GET">
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" name="from"
                                        value="{{ \Carbon\Carbon::parse($Date)->format('Y-m-d') }}">
                                </div>
                                <div class="col-sm-3">

                                    <input type="date" class="form-control" name="to" id="to-date"
                                        value="{{ \Carbon\Carbon::parse($Date)->addDays(6)->format('Y-m-d') }}">
                                </div>
                                <div class="col-sm-3">
                                    <select name="employee" class="form-control">
                                        <option value="">Select</option>
                                      <!-- Add a value for "All" -->
                                        @if (Auth::user()->type == 'Manager')
                                        @php
                                        $users = \App\Models\User::where('is_active', 1)->where('parent_id', Auth::user()->id )->get();
                                        $selectedUserId = request('employee'); // Get the selected user ID from the request
                                        @endphp
                                        @else
                                        @php
                                        $users = \App\Models\User::where('is_active', 1)->get();
                                        $selectedUserId = request('employee'); // Get the selected user ID from the request
                                        @endphp
                                        @endif
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $selectedUserId == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <button class="btn btn-primary btn-block">Search</button>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>

       <div id="searchResults" >
                {{--  @include('reports.pages.dayWiseReportBySearch')  --}}
       </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script>
        $(document).ready(function() {
            $('#searchForm').submit(function(event) {
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
    <script>
        $(document).ready(function () {
            // Get references to the "from" and "to" input fields
            var fromInput = $('#searchForm input[name="from"]');
            var toInput = $('#searchForm input[name="to"]');

            // Function to enable or disable the "to" input field
            function toggleToInput() {
                var fromDate = new Date(fromInput.val());
                var toDate = new Date(fromDate);
                toDate.setDate(fromDate.getDate() + 6); // Add 6 days to the "from" date
                toInput.val(toDate.toISOString().split('T')[0]);
                toInput.prop('disabled', true); // Disable the "to" input field
            }

            // Initial toggle based on the "from" input's value
            toggleToInput();

            // Add an event listener to the "from" input field
            fromInput.on('input', function () {
                toggleToInput();
            });
        });
    </script>

@endsection
