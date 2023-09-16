@extends('Master.master')
@section('title', 'Enquiries')
@section('content')
    <style>
        .right-Modal {
            background: rgb(98 98 98 / 59%);
        }

        .modal.left .modal-dialog,
        .modal.right .modal-dialog {
            position: fixed;
            margin: auto;
            width: 642px;
            max-width: 642px;
            height: 100%;
            -webkit-transform: translate3d(0%, 0, 0);
            -ms-transform: translate3d(0%, 0, 0);
            -o-transform: translate3d(0%, 0, 0);
            transform: translate3d(0%, 0, 0);
        }

        .modal.left .modal-content,
        .modal.right .modal-content {
            height: 100%;
            overflow-y: auto;
        }


        /*Left*/
        .modal.left.fade .modal-dialog {
            left: -320px;
            -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
            -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
            -o-transition: opacity 0.3s linear, left 0.3s ease-out;
            transition: opacity 0.3s linear, left 0.3s ease-out;
        }

        .modal.left.fade.in .modal-dialog {
            left: 0;
        }

        /*Right*/
        .modal.right.fade .modal-dialog {
            right: 0;
            -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
            -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
            -o-transition: opacity 0.3s linear, right 0.3s ease-out;
            transition: opacity 0.3s linear, right 0.3s ease-out;
        }

        .modal.right.fade.in .modal-dialog {
            right: 0;
        }

        .between {
            justify-content: space-between;
        }

        /* ----- MODAL STYLE ----- */
        .modal-content {
            border-radius: 0;
            border: none;
        }

        .candidate_Information {
            width: 55%;
        }

        .position_Information {
            width: 100%;
        }

        .custom-modal-header {
            border-bottom-color: #EEEEEE;
            background-color: #F2F7FA;
            height: 114px;
        }

        .custom-modal-header .candidate_img {
            width: 80px;
            height: 80px;
            background: #f2f7fa;
            border-radius: 50%;
        }

        .custom-modal-header .candidate_img img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 50%;
        }

        .custom-btn {
            padding: 4px 18px;
            font-size: 12px;
        }

        .custom-modal-body {
            padding: 0;
        }

        .custom-nav-modal {
            padding: 0.8rem 1.4rem !important;
            color: #858585;
        }

        .custom-tab-content {
            padding: 22px;
        }

        .custom-card {
            border: 1px solid #d2d2d2;
        }

        .card-header h6 {
            color: #555555;
        }

        .candidate_mobile h6,
        .candidate_sourcedPosition h6,
        .candidate_qualification h6,
        .candidate_email h6,
        .candidate_prefLocation h6,
        .candidate_pincode h6 {
            font-size: 14px;
            font-weight: 600;
            color: #3c3c3c;
        }

        .candidate_mobile p,
        .candidate_sourcedPosition p,
        .candidate_qualification p,
        .candidate_email p,
        .candidate_prefLocation p,
        .candidate_pincode p {
            font-size: 12px;
            font-weight: 400;
            color: #353434;
        }
    </style>
    @php
        $type = $type ?? 0;
        $employee = $employee ?? 0;
        $follow = $follow ?? 0;
        $status = $status ?? 0;
    @endphp

    <link rel="stylesheet" href="{{ url('EnquiryCards/cards.css') }}">
    <div class="content-body">
        <div class="container-fluid">

            <div id="searchFormContainer" style="display: none;">
                <div class="container mt-5"
                style="padding-left: 0px !important;
                /* width: 0px; */
                padding-right: 0px !important;">
                <div class="row justify-content-center">
                    <div class="col-md-12"style="margin-top: -50px">
                        <div class="card">
                            <a href="{{ url('enquiry-list') }}" class="btn btn-light " style="margin-top: -30px">
                                <i class="fa-solid fa-rotate-right" style="color: #2f66c6;"></i>
                            </a>
                            <div class="card-body">
                                <!-- Search Form -->
                                <form id="searchForm" action="{{ url('searchEnquiry') }}" method="get">

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Contact Person</label>
                                            <input type="text" name="searchByContactPerson" class="form-control"
                                                placeholder="Search by Contact Person">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label">Company Name</label>
                                            <input type="text" name="searchByCompanyName" class="form-control"
                                                placeholder="Search by Company Name">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label">Contact Number</label>
                                            <input type="text" name="searchByMobile" class="form-control"
                                                placeholder="Search by mobile">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Date From</label>
                                            <input type="date" name="from" class="form-control"
                                                value="{{ $from ?? '' }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label">Date To</label>
                                            <input type="date" name="to" class="form-control"
                                                value="{{ $to ?? '' }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label">Proposal Type</label>
                                            <select name="type" class="form-control">
                                                <option value="">Select</option>
                                                <option value="">All</option>

                                                @php
                                                    $Enquiry = \App\Models\EnquiryType::get();
                                                @endphp
                                                @foreach ($Enquiry as $Enquirys)
                                                    <option value="{{ $Enquirys->id }}"
                                                        {{ $type == $Enquirys->id ? 'selected' : '' }}>
                                                        {{ $Enquirys->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Enquiry Status</label>
                                            <select name="status" class="form-control">
                                                <option value="">Select</option>
                                                <option value="">All</option>

                                                @php
                                                    $status = \App\Models\Followup_remark::get();
                                                @endphp
                                                @foreach ($status as $statuss)
                                                    <option value="{{ $statuss->id }}">{{ $statuss->remark }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if (Auth::user()->type == 'Admin' || Auth::user()->type == 'Manager')
                                            <div class="col-md-4">
                                                <label class="form-label">Employee</label>
                                                <select name="employee" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="">All</option>

                                                    @php
                                                        $user = \App\Models\User::where('is_active', 1)->get();
                                                    @endphp
                                                    @foreach ($user as $users)
                                                        <option value="{{ $users->id }}"
                                                            {{ $employee == $users->id ? 'selected' : '' }}>
                                                            {{ $users->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <div class="col-md-4">
                                            <label class="form-label">FollowUp Date</label>
                                            <input type="date" name="follow" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="margin-left: 240px;">
                                        <button class="btn btn-primary btn-block" type="submit">Search</button>

                                    </div>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
            </div >

            <div id="searchResults">
                @include('Enquiry.searchingResultEnquiry')
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/66f2518709.js" crossorigin="anonymous"></script>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-XXXXXXX" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap CSS and JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var employeeRemark = document.querySelector(".employee-remark");
            employeeRemark.addEventListener("mouseenter", function(event) {
                var fullRemark = event.target.getAttribute("title");
                event.target.innerText = fullRemark || 'N/A';
            });
            employeeRemark.addEventListener("mouseleave", function(event) {
                var truncatedRemark = (event.target.innerText.length > 40) ? event.target.innerText
                    .substring(0, 40) : event.target.innerText;
                event.target.innerText = truncatedRemark + (event.target.innerText.length > 40 ? '...' :
                    '');
            });
        });

        $(document).ready(function() {
            $("#showModalBtn").click(function() {
                $("#myModal2").modal("show");
            });
        });
    </script>

    //remarks

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


@endsection
