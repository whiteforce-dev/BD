@extends('Master.Master')
@section('content')
    <style>
        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
            opacity: 0.9;
            -webkit-box-shadow: 3px 3px 5px 6px #ccc;
            /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
            -moz-box-shadow: 3px 3px 5px 3px #ccc;
            /* Firefox 3.5 - 3.6 */
            box-shadow: 3px 3px 5px 3px #ccc;
            /* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */
        }



        .col-9 {
            -ms-flex: 0 0 75%;
            flex: 0 0 75%;
            max-width: 75%;
            font-size: 18px;
            margin-top: 10px;
        }

        b,
        strong {
            font-weight: 100;
        }

        .table tbody tr td {
            vertical-align: middle;
            border-color: #F0F0F0;
            color: black;
            font-weight: 500;
            /* opacity :0.6; */

        }

        .admin {
            display: flex;
            justify-content: center;
        }

        .table-primary {
            opacity: 0.6;
        }

        .table-success {
            opacity: 0.6;
        }

        .table-info {
            opacity: 0.6;
        }

        .table-warning {
            opacity: 0.6;
        }

        .list-group-flush>.list-group-item {
            color: black;
            backgroun: blue;
        }

        .card .filter {
            position: absolute;
            z-index: 2;
            background-color: rgba(0, 0, 0, .68);
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            text-align: center;
            opacity: 0;
            filter: alpha(opacity=0)
        }

        .card .filter .btn {
            position: relative;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%)
        }

        .card:hover .filter {
            opacity: 1;
            filter: alpha(opacity=100)
        }

        .card .btn-hover {
            opacity: 0;
            filter: alpha(opacity=0)
        }

        .card:hover .btn-hover {
            opacity: 1;
            filter: alpha(opacity=100)
        }

        .card .card-body {
            padding: 15px 15px 5px
        }

        .card .card-header {
            padding: 15px 15px 0;
            background-color: #f2f3f4;
            border-bottom: none !important
        }

        .card .card-category,
        .card label {
            font-size: 14px;
            font-weight: 400;
            color: #9a9a9a;
            margin-bottom: 0
        }

        .card .card-category i,
        .card label i {
            font-size: 16px
        }

        .card label {
            font-size: 12px;
            margin-bottom: 5px;
            text-transform: uppercase
        }

        .card .card-title {
            margin: 0;
            color: #333;
            font-weight: 300
        }

        .card .avatar {
            width: 30px;
            height: 30px;
            overflow: hidden;
            border-radius: 50%;
            margin-right: 5px
        }

        .card .description {
            font-size: 14px;
            color: #333
        }

        .card .card-footer {
            padding-top: 0;
            background-color: transparent;
            line-height: 30px;
            border-top: none !important;
            font-size: 14px
        }

        .card .card-footer .legend {
            padding: 5px 0
        }

        .card .card-footer hr {
            margin-top: 5px;
            margin-bottom: 5px
        }

        .widget-stat a {
            text-decoration: none;
        }

        .card .stats {
            color: #a9a9a9
        }

        .container-fluid {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
            background: #edf2f9;
            font-family: 'poppins';
        }
    </style>


    @php

    $follow = App\Models\Enquiry::where('created_by', Auth::user()->id)
    ->where('next_follow_date', '<=', \Carbon\Carbon::today())
    ->count();
$followtoday = App\Models\Enquiry::where('created_by', Auth::user()->id)
    ->where('next_follow_date', '=', \Carbon\Carbon::today())
    ->count();

$today = \carbon\carbon::today()->format('Y-m-d');

$weekdate = \Carbon\Carbon::today()
    ->subDays(7)
    ->format('Y-m-d');
$monthdate = \Carbon\Carbon::today()
    ->subDays(30)
    ->format('Y-m-d');

// dd($weekdate);
$follow_seven = App\Models\Enquiry::where('created_by', Auth::user()->id)
    ->whereBetween('next_follow_date', [$weekdate, $today])
    ->count();
$follow_month = App\Models\Enquiry::where('created_by', Auth::user()->id)
    ->whereBetween('next_follow_date', [$monthdate, $today])
    ->count();
// dd($follow_month);

$followuptoday = App\Models\Remark::where('created_by', Auth::user()->id)
    ->whereRaw('Date(created_at) = CURDATE()')
    ->distinct('enquiry_id')
    ->count('enquiry_id');
$followuptotal = App\Models\Remark::where('created_by', Auth::user()->id)
    ->whereRaw('created_at' >= $today)
    ->distinct('enquiry_id')
    ->count('enquiry_id');
$followup_weekly = App\Models\Remark::where('created_by', Auth::user()->id)
    ->whereBetween('created_at', [$weekdate, $today])
    ->distinct('enquiry_id')
    ->count('enquiry_id');
$followup_monthly = App\Models\Remark::where('created_by', Auth::user()->id)
    ->whereBetween('updated_at', [$monthdate, $today])
    ->distinct('enquiry_id')
    ->count('enquiry_id');

    @endphp


    <!--**********************************
                    Content body start
                ***********************************-->
    <div class="content-body">
        <div class="container-fluid">

            <div class="form-head mb-4 d-flex flex-wrap align-items-center">
                <div class="me-auto">
                    <h2 class="font-w600 mb-0">Dashboard</h2>
                </div>
            </div>

            <div class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="fs-20">Users Behavior</h4>
                                <p class="card-category">24 Hours performance</p>
                            </div>
                            <div class="card-body">
                                <div id="div_151327004007" class="ct-chart"><svg
                                        xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="245px"
                                        class="ct-chart-line" style="width: 100%; height: 245px;">
                                        <g class="ct-grids">
                                            <line y1="210" y2="210" x1="50" x2="594"
                                                class="ct-grid ct-vertical"></line>
                                            <line y1="185.625" y2="185.625" x1="50" x2="594"
                                                class="ct-grid ct-vertical">
                                            </line>
                                            <line y1="161.25" y2="161.25" x1="50" x2="594"
                                                class="ct-grid ct-vertical">
                                            </line>
                                            <line y1="136.875" y2="136.875" x1="50" x2="594"
                                                class="ct-grid ct-vertical">
                                            </line>
                                            <line y1="112.5" y2="112.5" x1="50" x2="594"
                                                class="ct-grid ct-vertical"></line>
                                            <line y1="88.125" y2="88.125" x1="50" x2="594"
                                                class="ct-grid ct-vertical">
                                            </line>
                                            <line y1="63.75" y2="63.75" x1="50" x2="594"
                                                class="ct-grid ct-vertical"></line>
                                            <line y1="39.375" y2="39.375" x1="50" x2="594"
                                                class="ct-grid ct-vertical">
                                            </line>
                                            <line y1="15" y2="15" x1="50" x2="594"
                                                class="ct-grid ct-vertical"></line>
                                        </g>
                                        <g>
                                            <g class="ct-series ct-series-a">
                                                <path
                                                    d="M50,140.044C75.905,132.081,101.81,124.393,127.714,116.156C153.619,107.919,179.524,90.881,205.429,90.563C231.333,90.244,257.238,90.39,283.143,90.075C309.048,89.76,334.952,78.392,360.857,74.963C386.762,71.533,412.667,71.207,438.571,67.163C464.476,63.118,490.381,39.863,516.286,39.863C542.19,39.863,568.095,40.35,594,40.594"
                                                    class="ct-line"></path>
                                                <line x1="50" y1="140.04375" x2="50.01" y2="140.04375"
                                                    class="ct-point" ct:value="287" opacity="1"></line>
                                                <line x1="127.71428571428571" y1="116.15625" x2="127.72428571428571"
                                                    y2="116.15625" class="ct-point" ct:value="385" opacity="1"></line>
                                                <line x1="205.42857142857142" y1="90.5625" x2="205.4385714285714"
                                                    y2="90.5625" class="ct-point" ct:value="490" opacity="1"></line>
                                                <line x1="283.1428571428571" y1="90.075" x2="283.1528571428571"
                                                    y2="90.075" class="ct-point" ct:value="492" opacity="1"></line>
                                                <line x1="360.85714285714283" y1="74.9625" x2="360.8671428571428"
                                                    y2="74.9625" class="ct-point" ct:value="554" opacity="1">
                                                </line>
                                                <line x1="438.57142857142856" y1="67.1625" x2="438.58142857142855"
                                                    y2="67.1625" class="ct-point" ct:value="586" opacity="1">
                                                </line>
                                                <line x1="516.2857142857142" y1="39.86250000000001"
                                                    x2="516.2957142857142" y2="39.86250000000001" class="ct-point"
                                                    ct:value="698" opacity="1">
                                                </line>
                                                <line x1="594" y1="40.59375" x2="594.01" y2="40.59375"
                                                    class="ct-point" ct:value="695" opacity="1"></line>
                                            </g>
                                            <g class="ct-series ct-series-b">
                                                <path
                                                    d="M50,193.669C75.905,186.763,101.81,172.95,127.714,172.95C153.619,172.95,179.524,175.144,205.429,175.144C231.333,175.144,257.238,156.645,283.143,151.5C309.048,146.355,334.952,143.903,360.857,140.044C386.762,136.185,412.667,133.614,438.571,128.344C464.476,123.073,490.381,104.287,516.286,103.969C542.19,103.65,568.095,103.644,594,103.481"
                                                    class="ct-line"></path>
                                                <line x1="50" y1="193.66875" x2="50.01" y2="193.66875"
                                                    class="ct-point" ct:value="67" opacity="1"></line>
                                                <line x1="127.71428571428571" y1="172.95" x2="127.72428571428571"
                                                    y2="172.95" class="ct-point" ct:value="152" opacity="1">
                                                </line>
                                                <line x1="205.42857142857142" y1="175.14375" x2="205.4385714285714"
                                                    y2="175.14375" class="ct-point" ct:value="143" opacity="1">
                                                </line>
                                                <line x1="283.1428571428571" y1="151.5" x2="283.1528571428571"
                                                    y2="151.5" class="ct-point" ct:value="240" opacity="1">
                                                </line>
                                                <line x1="360.85714285714283" y1="140.04375" x2="360.8671428571428"
                                                    y2="140.04375" class="ct-point" ct:value="287" opacity="1">
                                                </line>
                                                <line x1="438.57142857142856" y1="128.34375" x2="438.58142857142855"
                                                    y2="128.34375" class="ct-point" ct:value="335" opacity="1">
                                                </line>
                                                <line x1="516.2857142857142" y1="103.96875" x2="516.2957142857142"
                                                    y2="103.96875" class="ct-point" ct:value="435" opacity="1">
                                                </line>
                                                <line x1="594" y1="103.48125" x2="594.01" y2="103.48125"
                                                    class="ct-point" ct:value="437" opacity="1"></line>
                                            </g>
                                            <g class="ct-series ct-series-c">
                                                <path
                                                    d="M50,204.394C75.905,197.081,101.81,182.456,127.714,182.456C153.619,182.456,179.524,193.669,205.429,193.669C231.333,193.669,257.238,188.117,283.143,183.675C309.048,179.233,334.952,168.672,360.857,163.688C386.762,158.703,412.667,156.372,438.571,151.744C464.476,147.116,490.381,135.329,516.286,135.169C542.19,135.009,568.095,135.006,594,134.925"
                                                    class="ct-line"></path>
                                                <line x1="50" y1="204.39375" x2="50.01" y2="204.39375"
                                                    class="ct-point" ct:value="23" opacity="1"></line>
                                                <line x1="127.71428571428571" y1="182.45625" x2="127.72428571428571"
                                                    y2="182.45625" class="ct-point" ct:value="113" opacity="1">
                                                </line>
                                                <line x1="205.42857142857142" y1="193.66875" x2="205.4385714285714"
                                                    y2="193.66875" class="ct-point" ct:value="67" opacity="1">
                                                </line>
                                                <line x1="283.1428571428571" y1="183.675" x2="283.1528571428571"
                                                    y2="183.675" class="ct-point" ct:value="108" opacity="1">
                                                </line>
                                                <line x1="360.85714285714283" y1="163.6875" x2="360.8671428571428"
                                                    y2="163.6875" class="ct-point" ct:value="190" opacity="1">
                                                </line>
                                                <line x1="438.57142857142856" y1="151.74375" x2="438.58142857142855"
                                                    y2="151.74375" class="ct-point" ct:value="239" opacity="1">
                                                </line>
                                                <line x1="516.2857142857142" y1="135.16875" x2="516.2957142857142"
                                                    y2="135.16875" class="ct-point" ct:value="307" opacity="1">
                                                </line>
                                                <line x1="594" y1="134.925" x2="594.01" y2="134.925"
                                                    class="ct-point" ct:value="308" opacity="1"></line>
                                            </g>
                                        </g>
                                        <g class="ct-labels">
                                            <foreignObject style="overflow: visible;" x="50" y="215"
                                                width="77.71428571428571" height="20"><span
                                                    class="ct-label ct-horizontal ct-end"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="width: 78px; height: 20px;">9:00AM</span></foreignObject>
                                            <foreignObject style="overflow: visible;" x="127.71428571428571"
                                                y="215" width="77.71428571428571" height="20"><span
                                                    class="ct-label ct-horizontal ct-end"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="width: 78px; height: 20px;">12:00AM</span></foreignObject>
                                            <foreignObject style="overflow: visible;" x="205.42857142857142"
                                                y="215" width="77.7142857142857" height="20"><span
                                                    class="ct-label ct-horizontal ct-end"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="width: 78px; height: 20px;">3:00PM</span></foreignObject>
                                            <foreignObject style="overflow: visible;" x="283.1428571428571"
                                                y="215" width="77.71428571428572" height="20"><span
                                                    class="ct-label ct-horizontal ct-end"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="width: 78px; height: 20px;">6:00PM</span></foreignObject>
                                            <foreignObject style="overflow: visible;" x="360.85714285714283"
                                                y="215" width="77.71428571428572" height="20"><span
                                                    class="ct-label ct-horizontal ct-end"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="width: 78px; height: 20px;">9:00PM</span></foreignObject>
                                            <foreignObject style="overflow: visible;" x="438.57142857142856"
                                                y="215" width="77.71428571428567" height="20"><span
                                                    class="ct-label ct-horizontal ct-end"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="width: 78px; height: 20px;">12:00PM</span></foreignObject>
                                            <foreignObject style="overflow: visible;" x="516.2857142857142"
                                                y="215" width="77.71428571428578" height="20"><span
                                                    class="ct-label ct-horizontal ct-end"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="width: 78px; height: 20px;">3:00AM</span></foreignObject>
                                            <foreignObject style="overflow: visible;" x="594" y="215"
                                                width="30" height="20"><span class="ct-label ct-horizontal ct-end"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="width: 30px; height: 20px;">6:00AM</span></foreignObject>
                                            <foreignObject style="overflow: visible;" y="185.625" x="10"
                                                height="24.375" width="30"><span
                                                    class="ct-label ct-vertical ct-start"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="height: 24px; width: 30px;">0</span></foreignObject>
                                            <foreignObject style="overflow: visible;" y="161.25" x="10"
                                                height="24.375" width="30"><span
                                                    class="ct-label ct-vertical ct-start"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="height: 24px; width: 30px;">100</span></foreignObject>
                                            <foreignObject style="overflow: visible;" y="136.875" x="10"
                                                height="24.375" width="30"><span
                                                    class="ct-label ct-vertical ct-start"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="height: 24px; width: 30px;">200</span></foreignObject>
                                            <foreignObject style="overflow: visible;" y="112.5" x="10"
                                                height="24.375" width="30"><span
                                                    class="ct-label ct-vertical ct-start"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="height: 24px; width: 30px;">300</span></foreignObject>
                                            <foreignObject style="overflow: visible;" y="88.125" x="10"
                                                height="24.375" width="30"><span
                                                    class="ct-label ct-vertical ct-start"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="height: 24px; width: 30px;">400</span></foreignObject>
                                            <foreignObject style="overflow: visible;" y="63.75" x="10"
                                                height="24.375" width="30"><span
                                                    class="ct-label ct-vertical ct-start"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="height: 24px; width: 30px;">500</span></foreignObject>
                                            <foreignObject style="overflow: visible;" y="39.375" x="10"
                                                height="24.375" width="30"><span
                                                    class="ct-label ct-vertical ct-start"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="height: 24px; width: 30px;">600</span></foreignObject>
                                            <foreignObject style="overflow: visible;" y="15" x="10"
                                                height="24.375" width="30"><span
                                                    class="ct-label ct-vertical ct-start"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="height: 24px; width: 30px;">700</span></foreignObject>
                                            <foreignObject style="overflow: visible;" y="-15" x="10"
                                                height="30" width="30">
                                                <span class="ct-label ct-vertical ct-start"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="height: 30px; width: 30px;">800</span>
                                            </foreignObject>
                                        </g>
                                    </svg></div>
                            </div>
                            <div class="card-footer">
                                <div class="legend"><i class="fa fa-circle text-info"></i> Open
                                    <i class="fa fa-circle text-danger"></i> Click
                                    <i class="fa fa-circle text-warning"></i> Click Second Time
                                </div>
                                <div class="stats">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div style="height:20px;opacity: 0.8;" class="card-body">
                                <div id="div_209183630582" class="ct-chart"><img style="height:280px;"
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-KQ_OgPlLlo7ohkOcN6p8Iso2zsNUpHf-86mq-zgnEp0Oh2ppK61YeSS83q-15DQQDb0&usqp=CAU"
                                        alt="">
                                </div>
                            </div>
                            <div class="card-footer">
                                <h3 class="admin">Admin</h3>
                                <div class="stats">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header border-0 pb-0 flex-wrap">
                                        <a href="{{ url('totalFollowups') }}"><h4 class="fs-20 font-w500">Total Follow-Up</h4>
                                        </a>
                                        <div class="card-action coin-tabs">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#Total">
                                                        Total
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " data-bs-toggle="tab" href="#Today">
                                                        Today
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " data-bs-toggle="tab" href="#Weekly">
                                                        Weekly
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " data-bs-toggle="tab" href="#Month">
                                                        Monthly
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="Total">
                                                <div class="d-sm-flex d-block align-items-center justify-content-center">
                                                    <div class="col-xl-6 col-xxl-5 text-center">
                                                        <div id="donutChart2" class="donutChart2 d-inline-block"></div>
                                                    </div>
                                                    <div class="col-xl-6 col-xxl-7">
                                                        <p class="fs-12 mt-3">Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                            dolore magna aliqua. Ut enim ad mini</p>
                                                        <div class="d-flex  mt-4">
                                                            <div class="me-4">
                                                                <svg width="20" height="8" viewBox="0 0 20 8"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <rect width="20" height="8" rx="4"
                                                                        fill="#FB3E7A" />
                                                                </svg>
                                                                <h4 class="fs-18 text-black mb-0 font-w600">{{ $follow }}</h4>
                                                                <span class="fs-14">Follow-Up</span>
                                                            </div>
                                                            <div class="me-4">
                                                                <svg class="primary-icon" width="20" height="8"
                                                                    viewBox="0 0 20 8" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <rect width="20" height="8" rx="4"
                                                                        fill="#4585ED" />
                                                                </svg>
                                                                <h4 class="fs-18 text-black mb-0 font-w600">{{ $followuptotal }}</h4>
                                                                <span class="fs-14">Attended</span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="Today">
                                                <div class="d-sm-flex d-block align-items-center justify-content-center">
                                                    <div class="col-xl-6 col-xxl-5 text-center">
                                                        <div id="donutChart3" class="donutChart2 d-inline-block"></div>
                                                    </div>
                                                    <div class="col-xl-6 col-xxl-7">
                                                        <p class="fs-12 mt-3">Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                            dolore magna aliqua. Ut enim ad mini</p>
                                                        <div class="d-flex  mt-4">
                                                            <div class="me-4">
                                                                <svg width="20" height="8" viewBox="0 0 20 8"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect width="20" height="8" rx="4"
                                                                        fill="#FB3E7A" />
                                                                </svg>
                                                                <h4 class="fs-18 text-black mb-0 font-w600">{{ $followtoday }}</h4>
                                                                <span class="fs-14">Follow-Up</span>
                                                            </div>
                                                            <div class="me-4">
                                                                <svg width="20" height="8" viewBox="0 0 20 8"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect width="20" height="8" rx="4"
                                                                        fill="#0E8A74" />
                                                                </svg>
                                                                <h4 class="fs-18 text-black mb-0 font-w600">{{ $followuptoday }}</h4>
                                                                <span class="fs-14">Attended</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="Weekly">
                                                <div class="d-sm-flex d-block align-items-center justify-content-center">
                                                    <div class="col-xl-6 col-xxl-5 text-center">
                                                        <div id="donutChart4" class="donutChart2 d-inline-block"></div>
                                                    </div>
                                                    <div class="col-xl-6 col-xxl-7">
                                                        <p class="fs-12 mt-3">Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                            dolore magna aliqua. Ut enim ad mini</p>
                                                        <div class="d-flex  mt-4">
                                                            <div class="me-4">
                                                                <svg width="20" height="8" viewBox="0 0 20 8"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect width="20" height="8" rx="4"
                                                                        fill="#FB3E7A" />
                                                                </svg>
                                                                <h4 class="fs-18 text-black mb-0 font-w600">{{ $follow_seven }}</h4>
                                                                <span class="fs-14">Follow-Up</span>
                                                            </div>
                                                            <div class="me-4">
                                                                <svg width="20" height="8" viewBox="0 0 20 8"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect width="20" height="8" rx="4"
                                                                        fill="#0E8A74" />
                                                                </svg>
                                                                <h4 class="fs-18 text-black mb-0 font-w600">{{ $followup_weekly }}</h4>
                                                                <span class="fs-14">Attended</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="Month">
                                                <div class="d-sm-flex d-block align-items-center justify-content-center">
                                                    <div class="col-xl-6 col-xxl-5 text-center">
                                                        <div id="apexchartsikjb70fti"
                                                            class="apexcharts-canvas apexchartsikjb70fti apexcharts-theme-light"
                                                            style="width: 196px; height: 162.3px;"><svg id="SvgjsSvg1006"
                                                                width="196" height="162.3"
                                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                xmlns:svgjs="http://svgjs.com/svgjs"
                                                                class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                                                transform="translate(0, 0)"
                                                                style="background: transparent;">
                                                                <g id="SvgjsG1008"
                                                                    class="apexcharts-inner apexcharts-graphical"
                                                                    transform="translate(11, 0)">
                                                                    <defs id="SvgjsDefs1007">
                                                                        <clipPath id="gridRectMaskikjb70fti">
                                                                            <rect id="SvgjsRect1010" width="17610004"
                                                                                height="19810" x="-7"
                                                                                y="-5" rx="0"
                                                                                ry="0" opacity="1"
                                                                                stroke-width="0" stroke="none"
                                                                                stroke-dasharray="0" fill="#fff">
                                                                            </rect>
                                                                        </clipPath>
                                                                        <clipPath id="gridRectMarkerMaskikjb70fti">
                                                                            <rect id="SvgjsRect1011" width="180"
                                                                                height="202" x="-2"
                                                                                y="-2" rx="0"
                                                                                ry="0" opacity="1"
                                                                                stroke-width="0" stroke="none"
                                                                                stroke-dasharray="0" fill="#fff">
                                                                            </rect>
                                                                        </clipPath>
                                                                    </defs>
                                                                    <g id="SvgjsG1012" class="apexcharts-pie">
                                                                        <g id="SvgjsG1013"
                                                                            transform="translate(0, 0) scale(1)">
                                                                            <circle id="SvgjsCircle1014"
                                                                                r="28.74146341463415" cx="88"
                                                                                cy="88" fill="transparent">
                                                                            </circle>
                                                                            <g id="SvgjsG1015" class="apexcharts-slices">
                                                                                <g id="SvgjsG1016"
                                                                                    class="apexcharts-series apexcharts-pie-series"
                                                                                    seriesName="seriesx1" rel="1"
                                                                                    data:realIndex="0">
                                                                                    <path id="SvgjsPath1017"
                                                                                        d="M 16.32137336425751 82.98774215487332 A 71.85365853658537 71.85365853658537 0 0 1 157.71929779534355 70.61702672105802 L 115.88771911813743 81.04681068842321 A 28.74146341463415 28.74146341463415 0 0 0 59.328549345702996 85.99509686194934 L 16.32137336425751 82.98774215487332 z"
                                                                                        fill="rgba(72,133,237,1)"
                                                                                        fill-opacity="1"
                                                                                        stroke-opacity="1"
                                                                                        stroke-linecap="butt"
                                                                                        stroke-width="10"
                                                                                        stroke-dasharray="0"
                                                                                        class="apexcharts-pie-area apexcharts-donut-slice-0"
                                                                                        index="0" j="0"
                                                                                        data:angle="162"
                                                                                        data:startAngle="-86"
                                                                                        data:strokeWidth="10"
                                                                                        data:value="45"
                                                                                        data:pathOrig="M 16.32137336425751 82.98774215487332 A 71.85365853658537 71.85365853658537 0 0 1 157.71929779534355 70.61702672105802 L 115.88771911813743 81.04681068842321 A 28.74146341463415 28.74146341463415 0 0 0 59.328549345702996 85.99509686194934 L 16.32137336425751 82.98774215487332 z"
                                                                                        stroke="#ffffff"></path>
                                                                                </g>
                                                                                <g id="SvgjsG1021"
                                                                                    class="apexcharts-series apexcharts-pie-series"
                                                                                    seriesName="seriesx2" rel="2"
                                                                                    data:realIndex="1">
                                                                                    <path id="SvgjsPath1022"
                                                                                        d="M 157.71929779534355 70.61702672105802 A 71.85365853658537 71.85365853658537 0 0 1 105.38297327894199 157.71929779534355 L 94.95318931157679 115.88771911813743 A 28.74146341463415 28.74146341463415 0 0 0 115.88771911813743 81.04681068842321 L 157.71929779534355 70.61702672105802 z"
                                                                                        fill="rgba(251,62,122,1)"
                                                                                        fill-opacity="1"
                                                                                        stroke-opacity="1"
                                                                                        stroke-linecap="butt"
                                                                                        stroke-width="10"
                                                                                        stroke-dasharray="0"
                                                                                        class="apexcharts-pie-area apexcharts-donut-slice-1"
                                                                                        index="0" j="1"
                                                                                        data:angle="90"
                                                                                        data:startAngle="76"
                                                                                        data:strokeWidth="10"
                                                                                        data:value="25"
                                                                                        data:pathOrig="M 157.71929779534355 70.61702672105802 A 71.85365853658537 71.85365853658537 0 0 1 105.38297327894199 157.71929779534355 L 94.95318931157679 115.88771911813743 A 28.74146341463415 28.74146341463415 0 0 0 115.88771911813743 81.04681068842321 L 157.71929779534355 70.61702672105802 z"
                                                                                        stroke="#ffffff"></path>
                                                                                </g>
                                                                                <g id="SvgjsG1026"
                                                                                    class="apexcharts-series apexcharts-pie-series"
                                                                                    seriesName="seriesx3" rel="3"
                                                                                    data:realIndex="2">
                                                                                    <path id="SvgjsPath1027"
                                                                                        d="M 105.38297327894199 157.71929779534355 A 71.85365853658537 71.85365853658537 0 0 1 16.320499651966287 83.0002525115319 L 59.32819986078651 86.00010100461276 A 28.74146341463415 28.74146341463415 0 0 0 94.95318931157679 115.88771911813743 L 105.38297327894199 157.71929779534355 z"
                                                                                        fill="rgba(200,200,200,1)"
                                                                                        fill-opacity="1"
                                                                                        stroke-opacity="1"
                                                                                        stroke-linecap="butt"
                                                                                        stroke-width="10"
                                                                                        stroke-dasharray="0"
                                                                                        class="apexcharts-pie-area apexcharts-donut-slice-2"
                                                                                        index="0" j="2"
                                                                                        data:angle="108"
                                                                                        data:startAngle="166"
                                                                                        data:strokeWidth="10"
                                                                                        data:value="30"
                                                                                        data:pathOrig="M 105.38297327894199 157.71929779534355 A 71.85365853658537 71.85365853658537 0 0 1 16.320499651966287 83.0002525115319 L 59.32819986078651 86.00010100461276 A 28.74146341463415 28.74146341463415 0 0 0 94.95318931157679 115.88771911813743 L 105.38297327894199 157.71929779534355 z"
                                                                                        stroke="#ffffff"></path>
                                                                                </g>
                                                                                <g id="SvgjsG1018"
                                                                                    class="apexcharts-datalabels"><text
                                                                                        id="SvgjsText1019"
                                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                                        x="83.6162787147751"
                                                                                        y="37.89383642915127"
                                                                                        text-anchor="middle"
                                                                                        dominant-baseline="auto"
                                                                                        font-size="15px"
                                                                                        font-weight="600" fill="#ffffff"
                                                                                        class="apexcharts-text apexcharts-pie-label"
                                                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                                                        <tspan id="SvgjsTspan1020">45%
                                                                                        </tspan>
                                                                                    </text></g>
                                                                                <g id="SvgjsG1023"
                                                                                    class="apexcharts-datalabels"><text
                                                                                        id="SvgjsText1024"
                                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                                        x="131.11342457336332"
                                                                                        y="113.90515897754912"
                                                                                        text-anchor="middle"
                                                                                        dominant-baseline="auto"
                                                                                        font-size="15px"
                                                                                        font-weight="600" fill="#ffffff"
                                                                                        class="apexcharts-text apexcharts-pie-label"
                                                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                                                        <tspan id="SvgjsTspan1025">25%
                                                                                        </tspan>
                                                                                    </text></g>
                                                                                <g id="SvgjsG1028"
                                                                                    class="apexcharts-datalabels"><text
                                                                                        id="SvgjsText1029"
                                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                                        x="55.66935100742484"
                                                                                        y="126.53016708780382"
                                                                                        text-anchor="middle"
                                                                                        dominant-baseline="auto"
                                                                                        font-size="15px"
                                                                                        font-weight="600" fill="#ffffff"
                                                                                        class="apexcharts-text apexcharts-pie-label"
                                                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                                                        <tspan id="SvgjsTspan1030">30%
                                                                                        </tspan>
                                                                                    </text></g>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <line id="SvgjsLine1031" x1="0"
                                                                        y1="0" x2="176" y2="0"
                                                                        stroke="#b6b6b6" stroke-dasharray="0"
                                                                        stroke-width="1" class="apexcharts-ycrosshairs">
                                                                    </line>
                                                                    <line id="SvgjsLine1032" x1="0"
                                                                        y1="0" x2="176" y2="0"
                                                                        stroke-dasharray="0" stroke-width="0"
                                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                                </g>
                                                                <g id="SvgjsG1009" class="apexcharts-annotations"></g>
                                                            </svg>
                                                            <div class="apexcharts-legend"></div>
                                                            <div class="apexcharts-tooltip apexcharts-theme-dark">
                                                                <div class="apexcharts-tooltip-series-group"><span
                                                                        class="apexcharts-tooltip-marker"
                                                                        style="background-color: rgb(72, 133, 237);"></span>
                                                                    <div class="apexcharts-tooltip-text"
                                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                                class="apexcharts-tooltip-text-label"></span><span
                                                                                class="apexcharts-tooltip-text-value"></span>
                                                                        </div>
                                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                                class="apexcharts-tooltip-text-z-value"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="apexcharts-tooltip-series-group"><span
                                                                        class="apexcharts-tooltip-marker"
                                                                        style="background-color: rgb(251, 62, 122);"></span>
                                                                    <div class="apexcharts-tooltip-text"
                                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                                class="apexcharts-tooltip-text-label"></span><span
                                                                                class="apexcharts-tooltip-text-value"></span>
                                                                        </div>
                                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                                class="apexcharts-tooltip-text-z-value"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="apexcharts-tooltip-series-group"><span
                                                                        class="apexcharts-tooltip-marker"
                                                                        style="background-color: rgb(200, 200, 200);"></span>
                                                                    <div class="apexcharts-tooltip-text"
                                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                                class="apexcharts-tooltip-text-label"></span><span
                                                                                class="apexcharts-tooltip-text-value"></span>
                                                                        </div>
                                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                                class="apexcharts-tooltip-text-z-value"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-xxl-7">
                                                        <p class="fs-12 mt-3">Lorem ipsum dolor sit amet, consectetur
                                                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                            dolore magna aliqua. Ut enim ad mini</p>
                                                        <div class="d-flex  mt-4">
                                                            <div class="me-4">
                                                                <svg width="20" height="8" viewBox="0 0 20 8"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect width="20" height="8" rx="4"
                                                                        fill="#FB3E7A" />
                                                                </svg>
                                                                <h4 class="fs-18 text-black mb-0 font-w600">{{ $follow_month }}</h4>
                                                                <span class="fs-14">Follow-Up</span>
                                                            </div>
                                                            <div class="me-4">
                                                                <svg width="20" height="8" viewBox="0 0 20 8"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect width="20" height="8" rx="4"
                                                                        fill="#0E8A74" />
                                                                </svg>
                                                                <h4 class="fs-18 text-black mb-0 font-w600">{{ $followup_monthly }}</h4>
                                                                <span class="fs-14">Attended</span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (Auth::user()->type === 'Manager')
                            <div class="col-xl-6">
                                <div class="card bg-primary">
                                    <div class="card-body">
                                        <div class="d-sm-flex d-block pb-sm-3 align-items-end mb-2">
                                            <div class="me-auto pe-3 mb-3 mb-sm-0">
                                                <span class="chart-num-3 font-w200 d-block mb-sm-3 mb-2 text-white">Total Team Enquiry</span>
                                                <h2 class="chart-num-2 text-white mb-0">{{ $totalTeamEnquiry }}<span
                                                        class="fs-18 me-2 ms-3">pcs</span></h2>
                                            </div>
                                            <div class="d-flex flex-wrap mb-3 mb-sm-0">
                                                <svg width="87" height="58" viewBox="0 0 87 58"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18.4571 37.6458C11.9375 44.6715 4.81049 52.3964 2 55.7162H68.8125C77.6491 55.7162 84.8125 48.5528 84.8125 39.7162V2L61.531 31.9333C56.8486 37.9536 48.5677 39.832 41.746 36.4211L37.3481 34.2222C30.9901 31.0432 23.2924 32.4352 18.4571 37.6458Z"
                                                        fill="url(#paint0_linear)" />
                                                    <path
                                                        d="M2 55.7162C4.81049 52.3964 11.9375 44.6715 18.4571 37.6458C23.2924 32.4352 30.9901 31.0432 37.3481 34.2222L41.746 36.4211C48.5677 39.832 56.8486 37.9536 61.531 31.9333L84.8125 2"
                                                        stroke="white" stroke-width="4" stroke-linecap="round" />
                                                    <defs>
                                                        <linearGradient id="paint0_linear" x1="43.4062"
                                                            y1="8.71453" x2="46.7635" y2="55.7162"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="white" offset="0" />
                                                            <stop offset="1" stop-color="white"
                                                                stop-opacity="0" />
                                                        </linearGradient>
                                                    </defs>
                                                </svg>
                                                <div class="ms-3">
                                                    <p class="fs-20 mb-0 font-w500 text-white">+4%</p>
                                                    <span class="fs-12 text-white">than last day</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress style-1" style="height:15px; ">
                                            <div class="progress-bar bg-white progress-animated"
                                                style="width: 55%; height:15px; " role="progressbar">
                                                <span class="sr-only">55% Complete</span>
                                                <span class="bg-white arrow"></span>
                                                <span class="font-w600 counter-bx text-black"
                                                    style="background-color: blackl;"><strong
                                                        class="counter font-w400">985pcs Left</strong></span>
                                            </div>
                                        </div>
                                        <p class="fs-12 text-white pt-4">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing
                                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                            ad mini</p>
                                        <a href="{{url('team-enquiry-list')}}" class="text-white">View detail<i
                                                class="las la-long-arrow-alt-right scale5 ms-3"></i></a>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-xl-6">
                                <div class="card bg-primary">
                                    <div class="card-body">
                                        <div class="d-sm-flex d-block pb-sm-3 align-items-end mb-2">
                                            <div class="me-auto pe-3 mb-3 mb-sm-0">
                                                <span class="chart-num-3 font-w200 d-block mb-sm-3 mb-2 text-white">Total Enquiry</span>
                                                <h2 class="chart-num-2 text-white mb-0">{{ $enquiries1 }}<span
                                                        class="fs-18 me-2 ms-3">pcs</span></h2>
                                            </div>
                                            <div class="d-flex flex-wrap mb-3 mb-sm-0">
                                                <svg width="87" height="58" viewBox="0 0 87 58"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18.4571 37.6458C11.9375 44.6715 4.81049 52.3964 2 55.7162H68.8125C77.6491 55.7162 84.8125 48.5528 84.8125 39.7162V2L61.531 31.9333C56.8486 37.9536 48.5677 39.832 41.746 36.4211L37.3481 34.2222C30.9901 31.0432 23.2924 32.4352 18.4571 37.6458Z"
                                                        fill="url(#paint0_linear)" />
                                                    <path
                                                        d="M2 55.7162C4.81049 52.3964 11.9375 44.6715 18.4571 37.6458C23.2924 32.4352 30.9901 31.0432 37.3481 34.2222L41.746 36.4211C48.5677 39.832 56.8486 37.9536 61.531 31.9333L84.8125 2"
                                                        stroke="white" stroke-width="4" stroke-linecap="round" />
                                                    <defs>
                                                        <linearGradient id="paint0_linear" x1="43.4062"
                                                            y1="8.71453" x2="46.7635" y2="55.7162"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="white" offset="0" />
                                                            <stop offset="1" stop-color="white"
                                                                stop-opacity="0" />
                                                        </linearGradient>
                                                    </defs>
                                                </svg>
                                                <div class="ms-3">
                                                    <p class="fs-20 mb-0 font-w500 text-white">+4%</p>
                                                    <span class="fs-12 text-white">than last day</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress style-1" style="height:15px; ">
                                            <div class="progress-bar bg-white progress-animated"
                                                style="width: 55%; height:15px; " role="progressbar">
                                                <span class="sr-only">55% Complete</span>
                                                <span class="bg-white arrow"></span>
                                                <span class="font-w600 counter-bx text-black"
                                                    style="background-color: blackl;"><strong
                                                        class="counter font-w400">985pcs Left</strong></span>
                                            </div>
                                        </div>
                                        <p class="fs-12 text-white pt-4">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing
                                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                            ad mini</p>
                                        <a href="{{ url('enquiry-list') }}" class="text-white">View detail<i
                                                class="las la-long-arrow-alt-right scale5 ms-3"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @if (Auth::user()->type === 'Admin')
                        <div class="col-xl-12">
                            <div class="row">

                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="{{ url('viewTeam') }}">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-primary text-primary">
                                                        <!-- <i class="ti-user"></i> -->
                                                        <img style="height:40px;"
                                                            src=" {{ url('dashboard_icons/activeMember.png') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Active User</p>
                                                        <h4 class="mb-0">{{ $activeMember }}</h4>
                                                        <span class="badge badge-primary">+3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="{{ url('enquiry-list') }}">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-warning text-warning">
                                                        <img style="height:40px;"
                                                            src=" {{ url('dashboard_icons/totalEnq.png') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Total Enquiry</p>
                                                        <h4 class="mb-0">{{ $enquiries1 }}</h4>
                                                        <span class="badge badge-warning">+3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="{{ url('todayEnquiries') }}">
                                            <div class="card-body  p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-danger text-danger">
                                                        <img style="height:40px;"
                                                            src=" {{ url('dashboard_icons/todayEnq.png') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Today Enquiry</p>
                                                        <h4 class="mb-0">{{ $todayEnquiries }}</h4>
                                                        <span class="badge badge-danger">-3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="{{ url('hot-list') }}">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-success text-success">
                                                        <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-database">
                                                            <ellipse cx="12" cy="5" rx="9"
                                                                ry="3"></ellipse>
                                                            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                                            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                                        </svg>
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Hot Enquiry</p>
                                                        <h4 class="mb-0">{{ $hotCount }}</h4>
                                                        <span class="badge badge-success">-3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="{{ url('break-list') }}">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-success text-success">
                                                        <img style="height:40px;"
                                                            src=" {{ url('dashboard_icons/breakEnq.png') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Break Enquiry</p>
                                                        <h4 class="mb-0"> {{ $breakEnquiry }}</h4>
                                                        <span class="badge badge-success">-3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="#">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-success text-success">
                                                        <img style="height:55px;"
                                                            src=" {{ url('dashboard_icons/approach.png') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Approach Achieved</p>
                                                        <h4 class="mb-0"> {{ $approached }}</h4>
                                                        <span class="badge badge-success">-3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (Auth::user()->type === 'Manager')
                        <div class="col-xl-12">
                            <div class="row">

                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="{{ url('viewTeam') }}">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-primary text-primary">
                                                        <!-- <i class="ti-user"></i> -->
                                                        <img style="height:40px;"
                                                            src=" {{ url('dashboard_icons/activeMember.png') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Active User</p>
                                                        <h4 class="mb-0">{{ $activeMember }}</h4>
                                                        <span class="badge badge-primary">+3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="{{ url('enquiry-list') }}">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-warning text-warning">
                                                        <img style="height:40px;"
                                                            src=" {{ url('dashboard_icons/totalEnq.png') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Total Enquiry</p>
                                                        <h4 class="mb-0">{{ $enquiries1 }}</h4>
                                                        <span class="badge badge-warning">+3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="{{ url('todayEnquiries') }}">
                                            <div class="card-body  p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-danger text-danger">
                                                        <img style="height:40px;"
                                                            src=" {{ url('dashboard_icons/todayEnq.png') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Today Enquiry</p>
                                                        <h4 class="mb-0">{{ $todayEnquiries }}</h4>
                                                        <span class="badge badge-danger">-3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="{{ url('hot-list') }}">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-success text-success">
                                                        <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-database">
                                                            <ellipse cx="12" cy="5" rx="9"
                                                                ry="3"></ellipse>
                                                            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                                            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                                        </svg>
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Hot Enquiry</p>
                                                        <h4 class="mb-0">{{ $hotCount }}</h4>
                                                        <span class="badge badge-success">-3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="{{ url('break-list') }}">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-success text-success">
                                                        <img style="height:40px;"
                                                            src=" {{ url('dashboard_icons/breakEnq.png') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Break Enquiry</p>
                                                        <h4 class="mb-0"> {{ $breakEnquiry }}</h4>
                                                        <span class="badge badge-success">-3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="#">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-success text-success">
                                                        <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-database">
                                                            <ellipse cx="12" cy="5" rx="9"
                                                                ry="3"></ellipse>
                                                            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                                            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                                        </svg>
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Team Approach Achieved</p>
                                                        <h4 class="mb-0"> {{ $teamApproachAchived }}</h4>
                                                        <span class="badge badge-success">-3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-primary text-primary">
                                                        <img style="height:60px;"
                                                            src=" {{ url('dashboard_icons/totalApproach.png') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Approach Target</p>
                                                        <h4 class="mb-0">250</h4>
                                                        <span class="badge badge-primary">+3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="#">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-success text-success">
                                                        <img style="height:55px;"
                                                            src=" {{ url('dashboard_icons/approach.png') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Approach Achieved</p>
                                                        <h4 class="mb-0"> {{ $approached }}</h4>
                                                        <span class="badge badge-success">-3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="#">
                                            <div class="card-body  p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-danger text-danger">
                                                        <img style="height:50px;"
                                                            src=" {{ url('dashboard_icons/PendingApproach.png') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Approach Pending</p>
                                                        <h4 class="mb-0">{{ $approachedPending }}</h4>
                                                        <span class="badge badge-danger">-3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="{{ url('team-hot-list') }}">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-primary text-primary">
                                                        <i class="fa fa-usd"></i>
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Total Hot</p>
                                                        <h4 class="mb-0">{{ $totalHotEnquiry }}</h4>
                                                        <span class="badge badge-primary">+3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                 <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="{{ url('team-break-list') }}">
                                            <div class="card-body  p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-danger text-danger">

                                                        <i class="fa fa-usd"></i>
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Total Break</p>
                                                        <h4 class="mb-0">{{ $totalBreakEnquiry }}</h4>
                                                        <span class="badge badge-danger">-3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="{{ url('team-enquiry-list') }}">
                                            <div class="card-body  p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-danger text-danger">
                                                        <img style="height:40px;"
                                                            src=" {{ url('dashboard_icons/team.png') }}" alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Total Team Enquiry</p>
                                                        <h4 class="mb-0">{{ $totalTeamEnquiry }}</h4>
                                                        <span class="badge badge-danger">-3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>  --}}
                    @endif
                    @if (Auth::user()->type === 'Staff')
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="{{ url('todayEnquiries') }}">
                                            <div class="card-body  p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-danger text-danger">
                                                        <img style="height:40px;"
                                                            src=" {{ url('dashboard_icons/todayEnq.png') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Today Enquiry</p>
                                                        <h4 class="mb-0">{{ $todayEnquiries }}</h4>
                                                        <span class="badge badge-danger">-3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="{{ url('hot-list') }}">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-success text-success">
                                                        <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-database">
                                                            <ellipse cx="12" cy="5" rx="9"
                                                                ry="3"></ellipse>
                                                            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                                            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                                        </svg>
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Hot Enquiry</p>
                                                        <h4 class="mb-0">{{ $hotCount }}</h4>
                                                        <span class="badge badge-success">-3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="{{ url('break-list') }}">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-success text-success">
                                                        <img style="height:40px;"
                                                            src=" {{ url('dashboard_icons/breakEnq.png') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Break Enquiry</p>
                                                        <h4 class="mb-0"> {{ $breakEnquiry }}</h4>
                                                        <span class="badge badge-success">-3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-primary text-primary">
                                                        <img style="height:60px;"
                                                            src=" {{ url('dashboard_icons/totalApproach.png') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Approach Target</p>
                                                        <h4 class="mb-0">250</h4>
                                                        <span class="badge badge-primary">+3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="#">
                                            <div class="card-body p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-success text-success">
                                                        <img style="height:55px;"
                                                            src=" {{ url('dashboard_icons/approach.png') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Approach Achieved</p>
                                                        <h4 class="mb-0"> {{ $approached }}</h4>
                                                        <span class="badge badge-success">-3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                    <div class="widget-stat card">
                                        <a href="#">
                                            <div class="card-body  p-4">
                                                <div class="media ai-icon">
                                                    <span class="me-3 bgl-danger text-danger">
                                                        <img style="height:50px;"
                                                            src=" {{ url('dashboard_icons/PendingApproach.png') }}"
                                                            alt="">
                                                    </span>
                                                    <div class="media-body">
                                                        <p class="mb-1">Approach Pending</p>
                                                        <h4 class="mb-0">{{ $approachedPending }}</h4>
                                                        <span class="badge badge-danger">-3.5%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="fs-20"> Quarter Achieved (Team)</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table header-border" style="min-width: 500px;">
                                        <thead>
                                            <tr>
                                                <th></th>

                                                <th>q1</th>
                                                <th>q2</th>
                                                <th>q3</th>
                                                <th>q4</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-primary">
                                                <td>Recruit</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>

                                            </tr>
                                            <tr class="table-success">
                                                <td>Temp</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>

                                            </tr>
                                            <tr class="table-info">
                                                <td>Fms</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>

                                            </tr>
                                            <tr class="table-warning">
                                                <td>Payroll</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="fs-20"> Business Achieved (month)</h4>
                            </div>
                            <div style: opacity :0.6; class="card-body pb-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Gender</h6>
                                        <span class="mb-0">Male</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Education</h6>
                                        <span class="mb-0">PHD</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Designation</h6>
                                        <span class="mb-0">Se. Professor</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Operation Done</h6>
                                        <span class="mb-0">120</span>
                                    </li>
                                </ul>

                            </div>
                            <div class="card-footer pt-0 border-0">
                                <a href="javascript:void(0);" class="btn btn-secondary btn-block text-white">View
                                    Detail</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="fs-20"> Quarter 1 (Jan-Mar)</h4>
                            </div>
                            <div class="card-body pb-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Gender</h6>
                                        <span class="mb-0">Male</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Education</h6>
                                        <span class="mb-0">PHD</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Designation</h6>
                                        <span class="mb-0">Se. Professor</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Operation Done</h6>
                                        <span class="mb-0">120</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Operation Done</h6>
                                        <span class="mb-0">120</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer pt-0 border-0">
                                <a href="javascript:void(0);" class="btn btn-secondary btn-block text-white">View
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="fs-20"> Quarter 2 (Apr-Jun)</h4>
                            </div>
                            <div class="card-body pb-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Gender</h6>
                                        <span class="mb-0">Male</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Education</h6>
                                        <span class="mb-0">PHD</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Designation</h6>
                                        <span class="mb-0">Se. Professor</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Operation Done</h6>
                                        <span class="mb-0">120</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Operation Done</h6>
                                        <span class="mb-0">120</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer pt-0 border-0">
                                <a href="javascript:void(0);" class="btn btn-secondary btn-block text-white">View
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="fs-20"> Quarter 3 (Jul-Sep)</h4>
                            </div>
                            <div class="card-body pb-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Gender</h6>
                                        <span class="mb-0">Male</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Education</h6>
                                        <span class="mb-0">PHD</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Designation</h6>
                                        <span class="mb-0">Se. Professor</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Operation Done</h6>
                                        <span class="mb-0">120</span>
                                    </li>
                                    <li class="list-group-item d-flex px-0 justify-content-between">
                                        <h6>Operation Done</h6>
                                        <span class="mb-0">120</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer pt-0 border-0">
                                <a href="javascript:void(0);" class="btn btn-secondary btn-block text-white">View
                                    Detail</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
                    Content body end
                ***********************************-->




        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @endsection
