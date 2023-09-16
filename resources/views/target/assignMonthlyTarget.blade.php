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
<style>
    .review-table tbody tr td:nth-child(2) {
        width: 8%;
    }

    form-control:focus{
        box-shadow: none !important;
    }
</style>

    <div class="content-body">
        <div class="container-fluid">
            <div class="col-lg-12" >
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="font-size: 1.2rem;">Target Assign</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('storeMonthlyTarget') }}" method="POST">
                            @csrf
                            <div class="col-xl-12 col-lg-8" style="margin-right: 0px; margin-left:0px;">
                                <div class="card m-0 ">
                                    <div class="card-body py-3 py-md-2">
                                        <div class="d-sm-flex  d-block align-items-center">
                                            <div class="d-flex mb-sm-0 mb-3 me-auto align-items-center" style="width: 100%;">
                                                <div class="media-body">
                                                    <p class="mb-1 fs-12 "></p>
                                                    <div class="row">
                                                        <div class="col-6" style="display: flex; align-items:center;">
                                                            <h5 class="mb-0 font-w600 fs-10" style="font-size: 0.95rem; font-weight:500 ">Select Target Type </h5>
                                                        </div>
                                                        <div class="col-6" >
                                                            <select style="border: 1px solid rgb(204 214 232);
                                                            font-size: 0.95rem;  box-shadow: none !important;" name="target_type" class="form-control " id="targetTypeSelect" required onchange="getTable(this.value)" required>
                                                                <option value=""><h5>Select</h5></option>
                                                                <option value="4">Recruitment</option>
                                                               <option value="5">Temp</option>
                                                               <option value="6">Fms</option>
                                                               <option value="7">Payroll</option>
                                                            </select>
                                                            @error('target_type')
                                                            <p style="color: #fff" >{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="recivedTable" class="table-container" >

                            </div>

                            {{--  <div id="tempTable" class="table-container" >

                            </div>

                            <div id="fmsTable" class="table-container" >

                            </div>

                            <div id="payrollTable" class="table-container">

                            </div>  --}}

                            {{--  @foreach ($targetTypes as $targetType)
                            <?php $showButton = $buttonShowStatus[$targetType]; ?>

                            <div class="mb-4">
                                @if ($showButton)
                                    <button type="submit" class="btn btn-outline-primary btn-lg btn-block" id="assignButton{{ $targetType }}">
                                        Assign {{ getTargetTypeName($targetType) }} Targets
                                    </button>
                                @else
                                    <p class="text-success">Targets already assigned for {{ getTargetTypeName($targetType) }} this month.</p>
                                @endif
                            </div>
                        @endforeach  --}}

                        <button type="submit" class="btn btn-outline-primary btn-lg btn-block" id="assignButton" style="font-size: 0.9rem !important; font-weight:500;width: 96% !important;
                        margin: 0 auto;">Assign Target</button>
                        </form>
                        <button  class="btn btn-outline-primary btn-lg btn-block" id="alreadyAssignButton" style="display: none; font-size: 0.9rem !important; font-weight:500;width: 96% !important;
                        margin: 0 auto;">This Month Target is Already Assign</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function handleTargetTypeChange() {
            const targetTypeSelect = document.getElementById('targetTypeSelect');
            const selectedValue = targetTypeSelect.value;

            // Hide all table containers
            const tableContainers = document.querySelectorAll('.table-container');
            tableContainers.forEach(container => {
                container.style.display = 'none';
            });

            // Show the selected table container
            if (selectedValue === '4') {
                document.getElementById('recruitmentTable').style.display = 'block';
            } else if (selectedValue === '5') {
                document.getElementById('tempTable').style.display = 'block';
            } else if (selectedValue === '6') {
                document.getElementById('fmsTable').style.display = 'block';
            } else if (selectedValue === '7') {
                document.getElementById('payrollTable').style.display = 'block';
            }
        }
    </script>
    <script>
        function validateForm() {
            const inputs = document.querySelectorAll('input[name^="user["]'); // Assuming your input names are like user[XX]
            for (const input of inputs) {
                const value = parseInt(input.value);
                if (isNaN(value) || value < 0 || value > 50) {
                    alert('Invalid input value. Please enter a number between 0 and 50.');
                    return false; // Prevent form submission
                }
            }
            return true; // Allow form submission
        }

        function getTable(e) {
            console.log(e);
            var currentUrl = window.location.href;
            var parts = currentUrl.split("/");
            var lastPart = parts[parts.length - 1];
              $.get("{{ url('get-table') }}" + '/' + lastPart, {
                table_id:e,
            }, function(response) {
                console.log(response);
                $('#recivedTable').empty();
                $('#recivedTable').html(response);
            });
            }

    </script>

    <script>
        const targetTypeSelect = document.getElementById("targetTypeSelect");
        const assignButton = document.getElementById("assignButton");
        const alreadyAssignButton = document.getElementById("alreadyAssignButton");
        const buttonShowStatus = @json($buttonShowStatus);

        targetTypeSelect.addEventListener("change", function() {
            const selectedTargetType = targetTypeSelect.value;
            if (selectedTargetType) {
                if (buttonShowStatus[selectedTargetType]) {
                    assignButton.style.display = "block";
                    alreadyAssignButton.style.display = "none";
                } else {
                    assignButton.style.display = "none";
                    alreadyAssignButton.style.display = "block";
                }
            } else {
                assignButton.style.display = "none";
                alreadyAssignButton.style.display = "none";
            }
        });
    </script>
@endsection
