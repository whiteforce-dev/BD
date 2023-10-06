@extends('Master.Master')
@section('content')
    <link rel="stylesheet" href="{{ url('table/table.css') }}">
    @php
        $teams = Auth::user()->get();
    @endphp
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

        .table-bordered tbody td:nth-child(odd){
            font-size: 15px;
        }

        .table-bordered thead th {
            font-size: 15px;
        }

        .table-bordered{
            border: 5px;
            -webkit-box-shadow: 3px 3px 5px 6px #ccc;
    -moz-box-shadow: 3px 3px 5px 3px #ccc;
    box-shadow: 3px 3px 5px 3px #ccc;
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
            color: #000000;
            font-weight: 700;
            font-size: 1.15rem;
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
    {{--  $totalLeftFollowup = $followUpTotal - $totalAtndFollowUp
    $todayLeftFollowup = $followUpToday - $todayAtndFollowUp
    $weekLeftFollowup = $followUpWeek - $weekAtndFollowUp
    $monthLeftFollowup = $followUpMonth - $monthAtndFollowUp  --}}
    @if(Auth::user()->type === 'Admin')
    @php

    $today = \carbon\carbon::today()->format('Y-m-d');
    $weekdate = \Carbon\Carbon::today()
        ->subDays(7)
        ->format('Y-m-d');
    $monthdate = \Carbon\Carbon::today()
        ->subDays(30)
        ->format('Y-m-d');
    $followUpTotal = App\Models\Enquiry::where('next_follow_date', '<=', \Carbon\Carbon::today())
        ->count();
    $followUpToday = App\Models\Enquiry::where('next_follow_date', '=', \Carbon\Carbon::today())
        ->count();
    // dd($weekdate);
    $followUpWeek = App\Models\Enquiry::whereBetween('next_follow_date', [$weekdate, $today])
        ->count();
    $followUpMonth = App\Models\Enquiry::whereBetween('next_follow_date', [$monthdate, $today])
        ->count();
    // dd($followUpMonth);
    $todayAtndFollowUp = App\Models\Remark::whereRaw('Date(created_at) = CURDATE()')
        ->distinct('enquiry_id')
        ->count('enquiry_id');
    $totalAtndFollowUp = App\Models\Remark::whereRaw('created_at' >= $today)
        ->distinct('enquiry_id')
        ->count('enquiry_id');
    $weekAtndFollowUp = App\Models\Remark::whereBetween('created_at', [$weekdate, $today])
        ->distinct('enquiry_id')
        ->count('enquiry_id');
    $monthAtndFollowUp = App\Models\Remark::whereBetween('updated_at', [$monthdate, $today])
        ->distinct('enquiry_id')
        ->count('enquiry_id');
        $followUpLeftTotal = $followUpTotal - $totalAtndFollowUp;
        $followUpLeftToday = $followUpToday - $todayAtndFollowUp;
        $followUpLeftWeekly = $followUpWeek - $weekAtndFollowUp;
        $followUpLeftMonthly = $followUpMonth - $monthAtndFollowUp;

@endphp
@else
@php

        $followUpTotal = App\Models\Enquiry::where('created_by', Auth::user()->id)
            ->where('next_follow_date', '<=', \Carbon\Carbon::today())
            ->count();
        $followUpToday = App\Models\Enquiry::where('created_by', Auth::user()->id)
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
        $followUpWeek = App\Models\Enquiry::where('created_by', Auth::user()->id)
            ->whereBetween('next_follow_date', [$weekdate, $today])
            ->count();
        $followUpMonth = App\Models\Enquiry::where('created_by', Auth::user()->id)
            ->whereBetween('next_follow_date', [$monthdate, $today])
            ->count();
        // dd($followUpMonth);
        $todayAtndFollowUp = App\Models\Remark::where('created_by', Auth::user()->id)
            ->whereRaw('Date(created_at) = CURDATE()')
            ->distinct('enquiry_id')
            ->count('enquiry_id');
        $totalAtndFollowUp = App\Models\Remark::where('created_by', Auth::user()->id)
            ->whereRaw('created_at' >= $today)
            ->distinct('enquiry_id')
            ->count('enquiry_id');
        $weekAtndFollowUp = App\Models\Remark::where('created_by', Auth::user()->id)
            ->whereBetween('created_at', [$weekdate, $today])
            ->distinct('enquiry_id')
            ->count('enquiry_id');
        $monthAtndFollowUp = App\Models\Remark::where('created_by', Auth::user()->id)
            ->whereBetween('updated_at', [$monthdate, $today])
            ->distinct('enquiry_id')
            ->count('enquiry_id');
            $followUpLeftTotal = $followUpTotal - $totalAtndFollowUp;
            $followUpLeftToday = $followUpToday - $todayAtndFollowUp;
            $followUpLeftWeekly = $followUpWeek - $weekAtndFollowUp;
            $followUpLeftMonthly = $followUpMonth - $monthAtndFollowUp;
    @endphp
    @endif
    <!--**********************************
                        Content body start
                    ***********************************-->
    <div class="content-body">
        <div class="container-fluid" style="padding-top: 35px;">
            {{--  <div class="form-head mb-4 d-flex flex-wrap align-items-center">
                <div class="me-auto">
                    <h2 class="font-w600 mb-0" style="font-size: 1.8rem;
                }">Dashboard</h2>
                </div>
            </div>  --}}
            <div class="content">
                <div class="row" style="height: 318px;">
                    <div class="col-xl-9">
                        <div class="card">
                            <div class="card-header border-0 pb-0 flex-wrap">
                                <a href="{{ url('totalFollowups') }}">
                                    <h4
                                        style="font-size:1.1rem;
                                    font-weight: 600; color:#207bc6;">
                                        Total Follow-Up</h4>
                                </a>
                                <div class="card-action coin-tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a style="font-size: 1rem;
                                            font-weight: 500;"
                                                class="nav-link active" data-bs-toggle="tab" href="#Total">
                                                Total
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a style="font-size: 0.9rem;
                                            font-weight: 500;"
                                                class="nav-link " data-bs-toggle="tab" href="#Today">
                                                Today
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a style="font-size: 0.9rem;
                                            font-weight: 500;"
                                                class="nav-link " data-bs-toggle="tab" href="#Weekly">
                                                Weekly
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a style="font-size: 0.9rem;
                                            font-weight: 500;"
                                                class="nav-link " data-bs-toggle="tab" href="#Month">
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
                                                <p
                                                    style="    font-size: 1rem;
                                                font-weight: 400;
                                                margin-top: 21px;">
                                                    Display detail of total follow-up Done. Includes number of Totel
                                                    follow-up, aligned and attended.</p>
                                                <div class="d-flex  mt-4">
                                                    <div style="text-align:center;">
                                                        <svg width="20" height="8" viewBox="0 0 20 8"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="8" rx="4"
                                                                fill="#FB3E7A" />
                                                        </svg>
                                                        <h4 class="fs-18 text-black mb-0 font-w600">{{ $followUpTotal }}
                                                        </h4>
                                                        <span class="fs-14">Follow-Up</span>
                                                    </div>
                                                    <div style="margin-left: 55px;text-align:center;">
                                                        <svg class="primary-icon" width="20" height="8"
                                                            viewBox="0 0 20 8" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="8" rx="4"
                                                                fill="#4585ED" />
                                                        </svg>
                                                        <h4 class="fs-18 text-black mb-0 font-w600">{{ $totalAtndFollowUp }}
                                                        </h4>
                                                        <span class="fs-14">Attended</span>
                                                    </div>
                                                    <div style="margin-left: 55px;text-align:center;">
                                                        <svg width="20" height="8" viewBox="0 0 20 8" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="8" rx="4"
                                                                fill="#C8C8C8" />
                                                        </svg>
                                                        <h4 class="fs-18 text-black mb-0 font-w600">{{$followUpLeftTotal}}</h4>
                                                        <span class="fs-14">Follow-Up Left</span>
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
                                                <p
                                                    style="    font-size: 1rem;
                                                font-weight: 400;
                                                margin-top: 21px;">
                                                    Display detail of total follow-up done today. Includes number of Totel
                                                    follow-up, aligned and attended.</p>
                                                <div class="d-flex  mt-4">
                                                    <div style="text-align:center;">
                                                        <svg width="20" height="8" viewBox="0 0 20 8" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="8" rx="4"
                                                                fill="#FB3E7A" />
                                                        </svg>
                                                        <h4 class="fs-18 text-black mb-0 font-w600">{{ $followUpToday }}
                                                        </h4>
                                                        <span class="fs-14">Follow-Up</span>
                                                    </div>
                                                    <div style="margin-left: 55px;text-align:center;">
                                                        <svg width="20" height="8" viewBox="0 0 20 8"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="8" rx="4"
                                                                fill="#4585ED" />
                                                        </svg>
                                                        <h4 class="fs-18 text-black mb-0 font-w600">
                                                            {{ $todayAtndFollowUp }}</h4>
                                                        <span class="fs-14">Attended</span>
                                                    </div>
                                                    <div style="margin-left: 55px;text-align:center;">
                                                        <svg width="20" height="8" viewBox="0 0 20 8"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="8" rx="4"
                                                                fill="#C8C8C8" />
                                                        </svg>
                                                        <h4 class="fs-18 text-black mb-0 font-w600">{{ $followUpLeftToday }}</h4>
                                                        <span class="fs-14">Follow-Up Left</span>
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
                                                <p
                                                    style="    font-size: 1rem;
                                                font-weight: 400;
                                                margin-top: 21px;">
                                                    Display detail of total follow-up in this week . Includes number of
                                                    Totel follow-up, aligned and attended.</p>
                                                <div class="d-flex  mt-4">
                                                    <div style="text-align:center;">
                                                        <svg width="20" height="8" viewBox="0 0 20 8"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="8" rx="4"
                                                                fill="#FB3E7A" />
                                                        </svg>
                                                        <h4 class="fs-18 text-black mb-0 font-w600">{{ $followUpWeek }}
                                                        </h4>
                                                        <span class="fs-14">Follow-Up</span>
                                                    </div>
                                                    <div style="margin-left: 55px;text-align:center;">
                                                        <svg width="20" height="8" viewBox="0 0 20 8"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="8" rx="4"
                                                                fill="#0E8A74" />
                                                        </svg>
                                                        <h4 class="fs-18 text-black mb-0 font-w600">{{ $weekAtndFollowUp }}
                                                        </h4>
                                                        <span class="fs-14">Attended</span>
                                                    </div>
                                                    <div style="margin-left: 55px;text-align:center;">
                                                        <svg width="20" height="8" viewBox="0 0 20 8"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="8" rx="4"
                                                                fill="#C8C8C8" />
                                                        </svg>
                                                        <h4 class="fs-18 text-black mb-0 font-w600">{{ $followUpLeftWeekly }}</h4>
                                                        <span class="fs-14">Follow-Up Left</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Month">
                                        <div class="d-sm-flex d-block align-items-center justify-content-center">
                                            <div class="col-xl-6 col-xxl-5 text-center">
                                                <div id="donutChart4" class="donutChart2 d-inline-block" style="min-height: 184.3px;"><div id="apexchartsn1m1065i" class="apexcharts-canvas apexchartsn1m1065i apexcharts-theme-light" style="width: 300px; height: 184.3px;"><svg id="SvgjsSvg1215" width="300" height="184.3" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1217" class="apexcharts-inner apexcharts-graphical" transform="translate(63, 0)"><defs id="SvgjsDefs1216"><clipPath id="gridRectMaskn1m1065i"><rect id="SvgjsRect1219" width="17610004" height="19810" x="-7" y="-5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMaskn1m1065i"><rect id="SvgjsRect1220" width="180" height="202" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1221" class="apexcharts-pie"><g id="SvgjsG1222" transform="translate(0, 0) scale(1)"><circle id="SvgjsCircle1223" r="33.03414634146342" cx="88" cy="99" fill="transparent"></circle><g id="SvgjsG1224" class="apexcharts-slices"><g id="SvgjsG1225" class="apexcharts-series apexcharts-pie-series" seriesName="seriesx1" rel="1" data:realIndex="0"><path id="SvgjsPath1226" d="M 5.615807946835005 93.23913609518027 A 82.58536585365854 82.58536585365854 0 0 1 168.1322275407445 79.02079174389085 L 120.05289101629779 91.00831669755634 A 33.03414634146342 33.03414634146342 0 0 0 55.046323178734 96.69565443807211 L 5.615807946835005 93.23913609518027 z" fill="rgba(14,138,116,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="10" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" data:angle="162" data:startAngle="-86" data:strokeWidth="10" data:value="45" data:pathOrig="M 5.615807946835005 93.23913609518027 A 82.58536585365854 82.58536585365854 0 0 1 168.1322275407445 79.02079174389085 L 120.05289101629779 91.00831669755634 A 33.03414634146342 33.03414634146342 0 0 0 55.046323178734 96.69565443807211 L 5.615807946835005 93.23913609518027 z" stroke="#ffffff"></path></g><g id="SvgjsG1230" class="apexcharts-series apexcharts-pie-series" seriesName="seriesx2" rel="2" data:realIndex="1"><path id="SvgjsPath1231" d="M 168.1322275407445 79.02079174389085 A 82.58536585365854 82.58536585365854 0 0 1 107.97920825610916 179.1322275407445 L 95.99168330244366 131.0528910162978 A 33.03414634146342 33.03414634146342 0 0 0 120.05289101629779 91.00831669755634 L 168.1322275407445 79.02079174389085 z" fill="rgba(251,62,122,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="10" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="90" data:startAngle="76" data:strokeWidth="10" data:value="25" data:pathOrig="M 168.1322275407445 79.02079174389085 A 82.58536585365854 82.58536585365854 0 0 1 107.97920825610916 179.1322275407445 L 95.99168330244366 131.0528910162978 A 33.03414634146342 33.03414634146342 0 0 0 120.05289101629779 91.00831669755634 L 168.1322275407445 79.02079174389085 z" stroke="#ffffff"></path></g><g id="SvgjsG1235" class="apexcharts-series apexcharts-pie-series" seriesName="seriesx3" rel="3" data:realIndex="2"><path id="SvgjsPath1236" d="M 107.97920825610916 179.1322275407445 A 82.58536585365854 82.58536585365854 0 0 1 5.614803741194109 93.2535149368795 L 55.045921496477646 96.7014059747518 A 33.03414634146342 33.03414634146342 0 0 0 95.99168330244366 131.0528910162978 L 107.97920825610916 179.1322275407445 z" fill="rgba(200,200,200,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="10" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-2" index="0" j="2" data:angle="108" data:startAngle="166" data:strokeWidth="10" data:value="30" data:pathOrig="M 107.97920825610916 179.1322275407445 A 82.58536585365854 82.58536585365854 0 0 1 5.614803741194109 93.2535149368795 L 55.045921496477646 96.7014059747518 A 33.03414634146342 33.03414634146342 0 0 0 95.99168330244366 131.0528910162978 L 107.97920825610916 179.1322275407445 z" stroke="#ffffff"></path></g><g id="SvgjsG1227" class="apexcharts-datalabels"><text id="SvgjsText1228" font-family="Helvetica, Arial, sans-serif" x="82.96154776925611" y="41.410227477632795" text-anchor="middle" dominant-baseline="auto" font-size="15px" font-weight="600" fill="#ffffff" class="apexcharts-text apexcharts-pie-label" style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1229">45%</tspan></text></g><g id="SvgjsG1232" class="apexcharts-datalabels"><text id="SvgjsText1233" font-family="Helvetica, Arial, sans-serif" x="137.5526325883938" y="128.77422549150756" text-anchor="middle" dominant-baseline="auto" font-size="15px" font-weight="600" fill="#ffffff" class="apexcharts-text apexcharts-pie-label" style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1234">25%</tspan></text></g><g id="SvgjsG1237" class="apexcharts-datalabels"><text id="SvgjsText1238" font-family="Helvetica, Arial, sans-serif" x="50.84060506148693" y="143.28484241660004" text-anchor="middle" dominant-baseline="auto" font-size="15px" font-weight="600" fill="#ffffff" class="apexcharts-text apexcharts-pie-label" style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1239">30%</tspan></text></g></g></g></g><line id="SvgjsLine1240" x1="0" y1="0" x2="176" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1241" x1="0" y1="0" x2="176" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG1218" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-dark" style="left: 170.578px; top: 26.3438px;"><div class="apexcharts-tooltip-series-group apexcharts-active" style="display: flex; background-color: rgb(14, 138, 116);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(14, 138, 116); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">series-1: </span><span class="apexcharts-tooltip-text-value">45</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="display: none; background-color: rgb(14, 138, 116);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(14, 138, 116); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">series-1: </span><span class="apexcharts-tooltip-text-value">45</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="display: none; background-color: rgb(14, 138, 116);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(14, 138, 116); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">series-1: </span><span class="apexcharts-tooltip-text-value">45</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 412px; height: 185px;"></div></div><div class="contract-trigger"></div></div></div>
                                            <div class="col-xl-6 col-xxl-7">
                                                <p
                                                    style="    font-size: 1rem;
                                                font-weight: 400;
                                                margin-top: 21px;">
                                                    Display detail of total follow-up done in this month. Includes number of
                                                    Totel follow-up, aligned and attended.</p>
                                                <div class="d-flex  mt-4">
                                                    <div style="text-align:center;">
                                                        <svg width="20" height="8" viewBox="0 0 20 8"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="8" rx="4"
                                                                fill="#FB3E7A" />
                                                        </svg>
                                                        <h4 class="fs-18 text-black mb-0 font-w600">{{ $followUpMonth }}
                                                        </h4>
                                                        <span class="fs-14">Follow-Up</span>
                                                    </div>
                                                    <div style="margin-left: 55px;text-align:center;">
                                                        <svg width="20" height="8" viewBox="0 0 20 8"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="8" rx="4"
                                                                fill="#0E8A74" />
                                                        </svg>
                                                        <h4 class="fs-18 text-black mb-0 font-w600">
                                                            {{ $monthAtndFollowUp }}</h4>
                                                        <span class="fs-14">Attended</span>
                                                    </div>

                                                    <div style="margin-left: 55px;text-align:center;">
                                                        <svg width="20" height="8" viewBox="0 0 20 8"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="20" height="8" rx="4"
                                                                fill="#C8C8C8" />
                                                        </svg>
                                                        <h4 class="fs-18 text-black mb-0 font-w600">{{ $followUpLeftMonthly }}</h4>
                                                        <span class="fs-14">Follow-Up Left</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            @php
                                $user = Auth::user();
                            @endphp
                            <div style="height:20px;" class="card-body">
                                <div id="div_209183630582" class="ct-chart"><img style="height:257px; width:100%;"
                                        src="{{ url($user->image) ?? 'image not found' }}" alt="">
                                </div>
                            </div>
                            <div class="card-footer">
                                {{--  <h3 class="admin">{{ ucwords($user->name) }}</h3>  --}}
                                <div class="stats">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            @if (Auth::user()->type === 'Manager')
                                <div class="col-lg-4" style="height: 300px;">
                                    <div class="card">
                                        <div class="card-header border-0 pb-0">
                                            <h4
                                                style="font-size: 1.1rem;
                                            font-weight: 600;
                                            color: #207bc6;">
                                                Enquiries</h4>
                                        </div>
                                        <div style: opacity :0.6; class="card-body pb-0">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex px-0 justify-content-between">
                                                    <h6>Important Client</h6>
                                                    <a class="text-success" href="{{ url('hot-list') }}"> <span
                                                            class="mb-0">{{ $hotCount }}</span></a>
                                                </li>
                                                <li class="list-group-item d-flex px-0 justify-content-between">
                                                    <h6>Hot </h6>
                                                    <a class="text-danger" href="{{ url('hot-list') }}"> <span
                                                            class="mb-0">{{ $hotCount }}</span></a>
                                                </li>
                                                <li class="list-group-item d-flex px-0 justify-content-between">
                                                    <h6>Team Hot </h6>
                                                    <a class="text-warning" href="{{ url('team-hot-list') }}"> <span
                                                            class="mb-0">{{ $totalHotEnquiry }}</span>
                                                    </a>
                                                </li>
                                                <li class="list-group-item d-flex px-0 justify-content-between">
                                                    <h6>Break</h6>
                                                    <a class="text-info" href="{{ url('break-list') }}"> <span
                                                            class="mb-0">{{ $breakEnquiry }}</span>
                                                    </a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>

                                </div>
                            @else
                                <div class="col-lg-4" style="height: 300px;">
                                    <div class="card">
                                        <div class="card-header border-0 pb-0">
                                            <h4
                                                style="font-size: 1.1rem;
                                            font-weight: 600;
                                            color: #207bc6;">
                                                Enquiries</h4>
                                        </div>
                                        <div style: opacity :0.6; class="card-body pb-0">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex px-0 justify-content-between">
                                                    <h6>Important Client</h6>
                                                    <a class="text-danger" href="{{ url('hot-list') }}"> <span
                                                            class="mb-0">{{ $hotCount }}</span></a>
                                                </li>
                                                <li class="list-group-item d-flex px-0 justify-content-between">
                                                    <h6>Cold</h6>
                                                    <a class="text-warning" href="{{ url('team-hot-list') }}"> <span
                                                            class="mb-0">{{ $totalHotEnquiry }}</span>
                                                    </a>
                                                </li>
                                                <li class="list-group-item d-flex px-0 justify-content-between">
                                                    <h6>Break</h6>
                                                    <a class="text-info" href="{{ url('break-list') }}"> <span
                                                            class="mb-0">{{ $breakEnquiry }}</span>
                                                    </a>
                                                </li>
                                                <li class="list-group-item d-flex px-0 justify-content-between">
                                                    <h6>Hold</h6>
                                                    <a class="text-success" href="{{ url('team-break-list') }}"><span
                                                            class="mb-0">{{ $totalBreakEnquiry }}</span>
                                                    </a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>

                                </div>
                            @endif
                            <div class="col-xl-8" style="height: 300px;">
                                <div class="card bg-primary">
                                    <div class="card-body">
                                        <div class="d-sm-flex d-block pb-sm-3 align-items-end mb-2">
                                            <div class="me-auto pe-3 mb-3 mb-sm-0">
                                                <span class="chart-num-3 font-w200 d-block mb-sm-3 mb-2 text-white"
                                                    style="font-size: 1.1rem;
                                                font-weight: 600;
                                                color: #207bc6;">Total
                                                    Enquiry</span>
                                                <h2 class="chart-num-2 text-white mb-0">{{ $enquiries1 }}<span
                                                        class="fs-18 me-2 ms-3"></span></h2>
                                            </div>
                                            <div class="d-flex flex-wrap mb-3 mb-sm-0">
                                                <svg width="87" height="58" viewBox="0 0 87 58" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18.4571 37.6458C11.9375 44.6715 4.81049 52.3964 2 55.7162H68.8125C77.6491 55.7162 84.8125 48.5528 84.8125 39.7162V2L61.531 31.9333C56.8486 37.9536 48.5677 39.832 41.746 36.4211L37.3481 34.2222C30.9901 31.0432 23.2924 32.4352 18.4571 37.6458Z"
                                                        fill="url(#paint0_linear)" />
                                                    <path
                                                        d="M2 55.7162C4.81049 52.3964 11.9375 44.6715 18.4571 37.6458C23.2924 32.4352 30.9901 31.0432 37.3481 34.2222L41.746 36.4211C48.5677 39.832 56.8486 37.9536 61.531 31.9333L84.8125 2"
                                                        stroke="white" stroke-width="4" stroke-linecap="round" />
                                                    <defs>
                                                        <linearGradient id="paint0_linear" x1="43.4062" y1="8.71453"
                                                            x2="46.7635" y2="55.7162" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="white" offset="0" />
                                                            <stop offset="1" stop-color="white" stop-opacity="0" />
                                                        </linearGradient>
                                                    </defs>
                                                </svg>
                                                <div class="ms-3">
                                                    <p class="fs-20 mb-0 font-w500 text-white">{{ $yesterdayEnq }}</p>
                                                    <span class="fs-12 text-white">Yesterday Enquiries</span>
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
                                        <p class=" text-white pt-4"
                                            style="    font-size: 0.9rem;
                                        font-weight: 500;
                                    }">
                                            Display the Total Number enquiries that are done till date, by the business
                                            development associate </p>
                                        <a href="{{ url('enquiry-list') }}" class="text-white">View detail<i
                                                class="las la-long-arrow-alt-right scale5 ms-3"></i></a>
                                    </div>
                                </div>
                            </div>
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
                                                        <p class="mb-1"
                                                            style="font-size: 1.1rem;
                                                        font-weight: 600;
                                                        color: #207bc6;">
                                                            Active User</p>
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
                                                    <div class="media-body" >
                                                        <p class="mb-1" >Approach Achieved</p>
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

                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 style="font-size: 1.1rem; font-weight: 600; color: #207bc6;">Quarter Achieved
                                        (Team)</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table header-border">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th style="font-size: 16px; font-weight: 600;">q1</th>
                                                    <th style="font-size: 16px; font-weight: 600;">q2</th>
                                                    <th style="font-size: 16px; font-weight: 600;">q3</th>
                                                    <th style="font-size: 16px; font-weight: 600;">q4</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="table-primary">
                                                    <td>Recruitment</td>
                                                    <td>
                                                        @php
                                                            $sum = 0;
                                                        @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '4'])
                                                                    ->whereBetween('date', [date('Y-01-01'), date('Y-03-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $sum = 0;
                                                        @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '4'])
                                                                    ->whereBetween('date', [date('Y-04-01'), date('Y-06-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $sum = 0;
                                                        @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '4'])
                                                                    ->whereBetween('date', [date('Y-07-01'), date('Y-09-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $sum = 0;
                                                        @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '4'])
                                                                    ->whereBetween('date', [date('Y-10-01'), date('Y-12-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                </tr>
                                                <tr class="table-success">
                                                    <td>Temp</td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '5'])
                                                                    ->whereBetween('date', [date('Y-01-01'), date('Y-03-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '5'])
                                                                    ->whereBetween('date', [date('Y-04-01'), date('Y-06-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '5'])
                                                                    ->whereBetween('date', [date('Y-07-01'), date('Y-09-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '5'])
                                                                    ->whereBetween('date', [date('Y-10-01'), date('Y-12-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                </tr>
                                                <tr class="table-info">
                                                    <td>Fms</td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '6'])
                                                                    ->whereBetween('date', [date('Y-01-01'), date('Y-03-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '6'])
                                                                    ->whereBetween('date', [date('Y-04-01'), date('Y-06-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '6'])
                                                                    ->whereBetween('date', [date('Y-07-01'), date('Y-09-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '6'])
                                                                    ->whereBetween('date', [date('Y-10-01'), date('Y-12-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                </tr>
                                                <tr class="table-warning">
                                                    <td>Payroll</td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '7'])
                                                                    ->whereBetween('date', [date('Y-01-01'), date('Y-03-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '7'])
                                                                    ->whereBetween('date', [date('Y-04-01'), date('Y-06-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '7'])
                                                                    ->whereBetween('date', [date('Y-07-01'), date('Y-09-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '7'])
                                                                    ->whereBetween('date', [date('Y-10-01'), date('Y-12-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
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
                                    <h4
                                        style="font-size: 1.1rem;
                                    font-weight: 600;
                                    color: #207bc6;">
                                        Team Business Achieved (month)</h4>
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
                        @php
                            $authUser = auth()->user(); // Get the authenticated user
                            $currentMonth = Carbon\Carbon::now()->month;

                            // Calculate the start and end months of the current quarter
                            if ($currentMonth >= 1 && $currentMonth <= 3) {
                                $quarterStartMonth = 1;
                                $quarterEndMonth = 3;
                            } elseif ($currentMonth >= 4 && $currentMonth <= 6) {
                                $quarterStartMonth = 4;
                                $quarterEndMonth = 6;
                            } elseif ($currentMonth >= 7 && $currentMonth <= 9) {
                                $quarterStartMonth = 7;
                                $quarterEndMonth = 9;
                            } else {
                                $quarterStartMonth = 10;
                                $quarterEndMonth = 12;
                            }

                            // Get the targets for the current quarter
                            $quarterPayrollTarget = $authUser->payrolltargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('target');

                            $quarterTempTarget = $authUser->temptargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('target');

                            $quarterFMSTarget = $authUser->fmstargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('target');

                            $quarterRecruitmentTarget = $authUser->recruitmenttargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('target');

                            // Get the achievements for the current quarter
                            $quarterPayrollAchieved = $authUser->payrolltargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('complete');

                            $quarterTempAchieved = $authUser->temptargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('complete');

                            $quarterFMSAchieved = $authUser->fmstargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('complete');

                            $quarterRecruitmentAchieved = $authUser->recruitmenttargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('complete');

                            // Calculate pending targets for the current quarter
                            $quarterPayrollPending = $quarterPayrollTarget - $quarterPayrollAchieved;
                            $quarterTempPending = $quarterTempTarget - $quarterTempAchieved;
                            $quarterFMSPending = $quarterFMSTarget - $quarterFMSAchieved;
                            $quarterRecruitmentPending = $quarterRecruitmentTarget - $quarterRecruitmentAchieved;
                        @endphp
            <div class="col-lg-12">
                <table class="table table-bordered verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">Target Type</th>
                            <th scope="col">Quarter Target</th>
                            <th scope="col">Quarter Achieve</th>
                            <th scope="col">Quarter Pending</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td >

                                PAYROLL
                                <hr style="height: 0px !important;">TEMP
                                <hr style="height: 0px !important;">FMS
                                <hr style="height: 0px !important;">RECRUITMENT
                            </td>
                            <td>
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterPayrollTarget }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterTempTarget }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterFMSTarget }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterRecruitmentTarget }}</span>
                            </td>
                            <td>
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterPayrollTarget }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterTempAchieved }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterFMSAchieved }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterRecruitmentAchieved }}</span>
                            </td>
                            <td>
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterPayrollPending }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterTempPending }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterFMSPending }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterRecruitmentPending }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
                                {{--  <div class="col-xl-4 col-xxl-3 col-sm-6 ">
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
                                </div>  --}}
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
                                                        <p class="mb-1">Team Achieved</p>
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
                        @php
                            $authUser = auth()->user(); // Get the authenticated user
                            $Payroll = $authUser
                                ->payrolltargets()
                                ->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->first();
                            $Temp = $authUser
                                ->temptargets()
                                ->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->first();
                            $FMS = $authUser
                                ->fmstargets()
                                ->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->first();
                            $recruitmentTarget = $authUser
                                ->recruitmenttargets()
                                ->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->first();
                        @endphp

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4  style="font-size: 1.1rem;
                                    font-weight: 600;
                                    color: #207bc6;">Business Target</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table header-border" >

                                            <tbody>
                                                <tr class="table-primary">
                                                    <td>Recruit</td>
                                                    <td>{{ $recruitmentTarget->target ?? '0' }}</td>

                                                </tr>
                                                <tr class="table-success">
                                                    <td>Temp</td>
                                                    <td>{{ $Temp->target ?? '0' }}</td>
                                                </tr>
                                                <tr class="table-info">
                                                    <td>Fms</td>
                                                    <td>{{ $FMS->target ?? '0' }}</td>
                                                </tr>
                                                <tr class="table-warning">
                                                    <td>Payroll</td>
                                                    <td>{{ $Payroll->target ?? '0' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="card-footer pt-0 border-0">
                                            <a href="{{ url('viewMonthlyTarget') }}"
                                                class="btn btn-primary btn-block text-white">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4  style="font-size: 1.1rem;
                                    font-weight: 600;
                                    color: #207bc6;">Business Achieved</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table header-border" >

                                            <tbody>
                                                <tr class="table-primary">
                                                    <td>Recruit</td>
                                                    <td>{{ $recruitmentTarget->complete ?? '0' }}</td>

                                                </tr>
                                                <tr class="table-success">
                                                    <td>Temp</td>
                                                    <td>{{ $Temp->complete ?? '0' }}</td>
                                                </tr>
                                                <tr class="table-info">
                                                    <td>Fms</td>
                                                    <td>{{ $FMS->complete ?? '0' }}</td>
                                                </tr>
                                                <tr class="table-warning">
                                                    <td>Payroll</td>
                                                    <td>{{ $Payroll->complete ?? '0' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="card-footer pt-0 border-0">
                                            <a href="{{ url('viewMonthlyTarget') }}"
                                                class="btn btn-primary btn-block text-white">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4  style="font-size: 1.1rem;
                                    font-weight: 600;
                                    color: #207bc6;">Business Pending</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table header-border" >

                                            <tbody>
                                                <tr class="table-primary">
                                                    <td>Recruit</td>
                                                    <td>{{ $recruitmentTarget->remaining ?? '0' }}</td>

                                                </tr>
                                                <tr class="table-success">
                                                    <td>Temp</td>
                                                    <td>{{ $Temp->remaining ?? '0' }}</td>
                                                </tr>
                                                <tr class="table-info">
                                                    <td>Fms</td>
                                                    <td>{{ $FMS->remaining ?? '0' }}</td>
                                                </tr>
                                                <tr class="table-warning">
                                                    <td>Payroll</td>
                                                    <td>{{ $Payroll->remaining ?? '0' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="card-footer pt-0 border-0">
                                            <a href="{{ url('viewMonthlyTarget') }}"
                                                class="btn btn-primary btn-block text-white">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $authUser = auth()->user(); // Get the authenticated user
                            $currentMonth = Carbon\Carbon::now()->month;

                            // Calculate the start and end months of the current quarter
                            if ($currentMonth >= 1 && $currentMonth <= 3) {
                                $quarterStartMonth = 1;
                                $quarterEndMonth = 3;
                            } elseif ($currentMonth >= 4 && $currentMonth <= 6) {
                                $quarterStartMonth = 4;
                                $quarterEndMonth = 6;
                            } elseif ($currentMonth >= 7 && $currentMonth <= 9) {
                                $quarterStartMonth = 7;
                                $quarterEndMonth = 9;
                            } else {
                                $quarterStartMonth = 10;
                                $quarterEndMonth = 12;
                            }

                            // Get the targets for the current quarter
                            $quarterPayrollTarget = $authUser->payrolltargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('target');

                            $quarterTempTarget = $authUser->temptargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('target');

                            $quarterFMSTarget = $authUser->fmstargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('target');

                            $quarterRecruitmentTarget = $authUser->recruitmenttargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('target');

                            // Get the achievements for the current quarter
                            $quarterPayrollAchieved = $authUser->payrolltargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('complete');

                            $quarterTempAchieved = $authUser->temptargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('complete');

                            $quarterFMSAchieved = $authUser->fmstargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('complete');

                            $quarterRecruitmentAchieved = $authUser->recruitmenttargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('complete');

                            // Calculate pending targets for the current quarter
                            $quarterPayrollPending = $quarterPayrollTarget - $quarterPayrollAchieved;
                            $quarterTempPending = $quarterTempTarget - $quarterTempAchieved;
                            $quarterFMSPending = $quarterFMSTarget - $quarterFMSAchieved;
                            $quarterRecruitmentPending = $quarterRecruitmentTarget - $quarterRecruitmentAchieved;
                        @endphp

                    <div class="col-lg-12">
                        <table class="table table-bordered verticle-middle table-responsive-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Target Type</th>
                                    <th scope="col">Quarter Target</th>
                                    <th scope="col">Quarter Achieve</th>
                                    <th scope="col">Quarter Pending</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>

                                        PAYROLL
                                        <hr style="height: 0px !important;">TEMP
                                        <hr style="height: 0px !important;">FMS
                                        <hr style="height: 0px !important;">RECRUITMENT
                                    </td>
                                    <td>
                                        <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterPayrollTarget }}</span>
                                        <hr style="height: 0px !important;">
                                        <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterTempTarget }}</span>
                                        <hr style="height: 0px !important;">
                                        <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterFMSTarget }}</span>
                                        <hr style="height: 0px !important;">
                                        <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterRecruitmentTarget }}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterPayrollTarget }}</span>
                                        <hr style="height: 0px !important;">
                                        <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterTempAchieved }}</span>
                                        <hr style="height: 0px !important;">
                                        <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterFMSAchieved }}</span>
                                        <hr style="height: 0px !important;">
                                        <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterRecruitmentAchieved }}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterPayrollPending }}</span>
                                        <hr style="height: 0px !important;">
                                        <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterTempPending }}</span>
                                        <hr style="height: 0px !important;">
                                        <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterFMSPending }}</span>
                                        <hr style="height: 0px !important;">
                                        <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterRecruitmentPending }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                        @php
                            $authUser = auth()->user(); // Get the authenticated user
                            $currentMonth = Carbon\Carbon::now()->month;

                            // Calculate the start and end months of the current quarter
                            if ($currentMonth >= 1 && $currentMonth <= 3) {
                                $quarterStartMonth = 1;
                                $quarterEndMonth = 3;
                            } elseif ($currentMonth >= 4 && $currentMonth <= 6) {
                                $quarterStartMonth = 4;
                                $quarterEndMonth = 6;
                            } elseif ($currentMonth >= 7 && $currentMonth <= 9) {
                                $quarterStartMonth = 7;
                                $quarterEndMonth = 9;
                            } else {
                                $quarterStartMonth = 10;
                                $quarterEndMonth = 12;
                            }

                            // Get the targets for the current quarter
                            $quarterPayrollTarget = $authUser
                                ->payrolltargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)
                                ->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('target');

                            $quarterTempTarget = $authUser
                                ->temptargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)
                                ->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('target');

                            $quarterFMSTarget = $authUser
                                ->fmstargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)
                                ->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('target');

                            $quarterRecruitmentTarget = $authUser
                                ->recruitmenttargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)
                                ->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('target');

                            // Get the achievements for the current quarter
                            $quarterPayrollAchieved = $authUser
                                ->payrolltargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)
                                ->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('complete');

                            $quarterTempAchieved = $authUser
                                ->temptargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)
                                ->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('complete');

                            $quarterFMSAchieved = $authUser
                                ->fmstargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)
                                ->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('complete');

                            $quarterRecruitmentAchieved = $authUser
                                ->recruitmenttargets()
                                ->whereMonth('created_at', '>=', $quarterStartMonth)
                                ->whereMonth('created_at', '<=', $quarterEndMonth)
                                ->whereMonth('created_at', Carbon\Carbon::now()->month)
                                ->sum('complete');

                            // Calculate pending targets for the current quarter
                            $quarterPayrollPending = $quarterPayrollTarget - $quarterPayrollAchieved;
                            $quarterTempPending = $quarterTempTarget - $quarterTempAchieved;
                            $quarterFMSPending = $quarterFMSTarget - $quarterFMSAchieved;
                            $quarterRecruitmentPending = $quarterRecruitmentTarget - $quarterRecruitmentAchieved;
                        @endphp
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 style="font-size: 1.1rem; font-weight: 600; color: #207bc6;">Quarter Achieved
                                        (Team)</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table header-border">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th style="font-size: 16px; font-weight: 600;">q1</th>
                                                    <th style="font-size: 16px; font-weight: 600;">q2</th>
                                                    <th style="font-size: 16px; font-weight: 600;">q3</th>
                                                    <th style="font-size: 16px; font-weight: 600;">q4</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="table-primary">
                                                    <td>Recruitment</td>
                                                    <td>
                                                        @php
                                                            $sum = 0;
                                                        @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '4'])
                                                                    ->whereBetween('date', [date('Y-01-01'), date('Y-03-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $sum = 0;
                                                        @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '4'])
                                                                    ->whereBetween('date', [date('Y-04-01'), date('Y-06-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $sum = 0;
                                                        @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '4'])
                                                                    ->whereBetween('date', [date('Y-07-01'), date('Y-09-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $sum = 0;
                                                        @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '4'])
                                                                    ->whereBetween('date', [date('Y-10-01'), date('Y-12-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                </tr>
                                                <tr class="table-success">
                                                    <td>Temp</td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '5'])
                                                                    ->whereBetween('date', [date('Y-01-01'), date('Y-03-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '5'])
                                                                    ->whereBetween('date', [date('Y-04-01'), date('Y-06-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '5'])
                                                                    ->whereBetween('date', [date('Y-07-01'), date('Y-09-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '5'])
                                                                    ->whereBetween('date', [date('Y-10-01'), date('Y-12-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                </tr>
                                                <tr class="table-info">
                                                    <td>Fms</td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '6'])
                                                                    ->whereBetween('date', [date('Y-01-01'), date('Y-03-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '6'])
                                                                    ->whereBetween('date', [date('Y-04-01'), date('Y-06-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '6'])
                                                                    ->whereBetween('date', [date('Y-07-01'), date('Y-09-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '6'])
                                                                    ->whereBetween('date', [date('Y-10-01'), date('Y-12-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                </tr>
                                                <tr class="table-warning">
                                                    <td>Payroll</td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '7'])
                                                                    ->whereBetween('date', [date('Y-01-01'), date('Y-03-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '7'])
                                                                    ->whereBetween('date', [date('Y-04-01'), date('Y-06-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '7'])
                                                                    ->whereBetween('date', [date('Y-07-01'), date('Y-09-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                    <td>@php
                                                        $sum = 0;
                                                    @endphp
                                                        @foreach ($teams as $team)
                                                            @php
                                                                $sum += \App\Models\Target::where(['user_id' => $team->id, 'type' => '7'])
                                                                    ->whereBetween('date', [date('Y-10-01'), date('Y-12-t')])
                                                                    ->sum('complete');
                                                            @endphp
                                                        @endforeach
                                                        {{ $sum }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                            $team = auth()->user(); // Get the authenticated user
                            // Initialize variables to store total achievements
                            $totalRecruit = 0;
                            $totalTemp = 0;
                            $totalFMS = 0;
                            $totalPayroll = 0;
                            if ($team) {
                                $teamMembers = $team->users;
                                foreach ($userr as $teamMember) {
                                    $totalRecruit += $teamMember
                                        ->recruitmenttargets()
                                        ->whereMonth('created_at', Carbon\Carbon::now()->month)
                                        ->sum('complete');
                                    $totalTemp += $teamMember
                                        ->temptargets()
                                        ->whereMonth('created_at', Carbon\Carbon::now()->month)
                                        ->sum('complete');
                                    $totalFMS += $teamMember
                                        ->fmstargets()
                                        ->whereMonth('created_at', Carbon\Carbon::now()->month)
                                        ->sum('complete');
                                    $totalPayroll += $teamMember
                                        ->payrolltargets()
                                        ->whereMonth('created_at', Carbon\Carbon::now()->month)
                                        ->sum('complete');
                                }
                            }
                        @endphp
                        <div class="col-lg-4">
                            <!-- Total Business Achieved Card -->
                            <div class="card">
                                <!-- Card Header -->
                                <div class="card-header border-0 pb-0">
                                    <h4 style="font-size: 1.1rem; font-weight: 600; color: #207bc6;">Team Business
                                        Achieved(M)</h4>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body pb-0">
                                    <!-- List of Achievements -->
                                    <ul class="list-group list-group-flush">
                                        <!-- Total Recruit Achieved -->
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <h6>Total Recruit</h6>
                                            <span class="mb-0">{{ $totalRecruit }}</span>
                                        </li>
                                        <!-- Total Temp Achieved -->
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <h6>Total Temp</h6>
                                            <span class="mb-0">{{ $totalTemp }}</span>
                                        </li>
                                        <!-- Total FMS Achieved -->
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <h6>Total FMS</h6>
                                            <span class="mb-0">{{ $totalFMS }}</span>
                                        </li>
                                        <!-- Total Payroll Achieved -->
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <h6>Total Payroll</h6>
                                            <span class="mb-0">{{ $totalPayroll }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Card Footer -->
                                <div class="card-footer pt-0 border-0">
                                    <a href="{{ url('getMngrMonthlyTeam') }}"
                                        class="btn btn-primary btn-block text-white">View Detail</a>
                                </div>
                            </div>
                        </div>

                </div>
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
                                                        src=" {{ url('dashboard_icons/todayEnq.png') }}" alt="">
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
                    @php
                        $authUser = auth()->user(); // Get the authenticated user
                        $Payroll = $authUser
                            ->payrolltargets()
                            ->whereMonth('created_at', Carbon\Carbon::now()->month)
                            ->first();
                        $Temp = $authUser
                            ->temptargets()
                            ->whereMonth('created_at', Carbon\Carbon::now()->month)
                            ->first();
                        $FMS = $authUser
                            ->fmstargets()
                            ->whereMonth('created_at', Carbon\Carbon::now()->month)
                            ->first();
                        $recruitmentTarget = $authUser
                            ->recruitmenttargets()
                            ->whereMonth('created_at', Carbon\Carbon::now()->month)
                            ->first();
                    @endphp

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4  style="font-size: 1.1rem;
                                font-weight: 600;
                                color: #207bc6;">Business Target</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table header-border" >

                                        <tbody>
                                            <tr class="table-primary">
                                                <td>Recruit</td>
                                                <td>{{ $recruitmentTarget->target ?? '0' }}</td>

                                            </tr>
                                            <tr class="table-success">
                                                <td>Temp</td>
                                                <td>{{ $Temp->target ?? '0' }}</td>
                                            </tr>
                                            <tr class="table-info">
                                                <td>Fms</td>
                                                <td>{{ $FMS->target ?? '0' }}</td>
                                            </tr>
                                            <tr class="table-warning">
                                                <td>Payroll</td>
                                                <td>{{ $Payroll->target ?? '0' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="card-footer pt-0 border-0">
                                        <a href="{{ url('viewMonthlyTarget') }}"
                                            class="btn btn-primary btn-block text-white">View
                                            Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4  style="font-size: 1.1rem;
                                font-weight: 600;
                                color: #207bc6;">Business Achieved</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table header-border" >

                                        <tbody>
                                            <tr class="table-primary">
                                                <td>Recruit</td>
                                                <td>{{ $recruitmentTarget->complete ?? '0' }}</td>

                                            </tr>
                                            <tr class="table-success">
                                                <td>Temp</td>
                                                <td>{{ $Temp->complete ?? '0' }}</td>
                                            </tr>
                                            <tr class="table-info">
                                                <td>Fms</td>
                                                <td>{{ $FMS->complete ?? '0' }}</td>
                                            </tr>
                                            <tr class="table-warning">
                                                <td>Payroll</td>
                                                <td>{{ $Payroll->complete ?? '0' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="card-footer pt-0 border-0">
                                        <a href="{{ url('viewMonthlyTarget') }}"
                                            class="btn btn-primary btn-block text-white">View
                                            Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4  style="font-size: 1.1rem;
                                font-weight: 600;
                                color: #207bc6;">Business Pending</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table header-border" >

                                        <tbody>
                                            <tr class="table-primary">
                                                <td>Recruit</td>
                                                <td>{{ $recruitmentTarget->remaining ?? '0' }}</td>

                                            </tr>
                                            <tr class="table-success">
                                                <td>Temp</td>
                                                <td>{{ $Temp->remaining ?? '0' }}</td>
                                            </tr>
                                            <tr class="table-info">
                                                <td>Fms</td>
                                                <td>{{ $FMS->remaining ?? '0' }}</td>
                                            </tr>
                                            <tr class="table-warning">
                                                <td>Payroll</td>
                                                <td>{{ $Payroll->remaining ?? '0' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="card-footer pt-0 border-0">
                                        <a href="{{ url('viewMonthlyTarget') }}"
                                            class="btn btn-primary btn-block text-white">View
                                            Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        $authUser = auth()->user(); // Get the authenticated user
                        $currentMonth = Carbon\Carbon::now()->month;

                        // Calculate the start and end months of the current quarter
                        if ($currentMonth >= 1 && $currentMonth <= 3) {
                            $quarterStartMonth = 1;
                            $quarterEndMonth = 3;
                        } elseif ($currentMonth >= 4 && $currentMonth <= 6) {
                            $quarterStartMonth = 4;
                            $quarterEndMonth = 6;
                        } elseif ($currentMonth >= 7 && $currentMonth <= 9) {
                            $quarterStartMonth = 7;
                            $quarterEndMonth = 9;
                        } else {
                            $quarterStartMonth = 10;
                            $quarterEndMonth = 12;
                        }

                        // Get the targets for the current quarter
                        $quarterPayrollTarget = $authUser->payrolltargets()
                            ->whereMonth('created_at', '>=', $quarterStartMonth)
                            ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                            ->sum('target');

                        $quarterTempTarget = $authUser->temptargets()
                            ->whereMonth('created_at', '>=', $quarterStartMonth)
                            ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                            ->sum('target');

                        $quarterFMSTarget = $authUser->fmstargets()
                            ->whereMonth('created_at', '>=', $quarterStartMonth)
                            ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                            ->sum('target');

                        $quarterRecruitmentTarget = $authUser->recruitmenttargets()
                            ->whereMonth('created_at', '>=', $quarterStartMonth)
                            ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                            ->sum('target');

                        // Get the achievements for the current quarter
                        $quarterPayrollAchieved = $authUser->payrolltargets()
                            ->whereMonth('created_at', '>=', $quarterStartMonth)
                            ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                            ->sum('complete');

                        $quarterTempAchieved = $authUser->temptargets()
                            ->whereMonth('created_at', '>=', $quarterStartMonth)
                            ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                            ->sum('complete');

                        $quarterFMSAchieved = $authUser->fmstargets()
                            ->whereMonth('created_at', '>=', $quarterStartMonth)
                            ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                            ->sum('complete');

                        $quarterRecruitmentAchieved = $authUser->recruitmenttargets()
                            ->whereMonth('created_at', '>=', $quarterStartMonth)
                            ->whereMonth('created_at', '<=', $quarterEndMonth)->whereMonth('created_at', Carbon\Carbon::now()->month)
                            ->sum('complete');

                        // Calculate pending targets for the current quarter
                        $quarterPayrollPending = $quarterPayrollTarget - $quarterPayrollAchieved;
                        $quarterTempPending = $quarterTempTarget - $quarterTempAchieved;
                        $quarterFMSPending = $quarterFMSTarget - $quarterFMSAchieved;
                        $quarterRecruitmentPending = $quarterRecruitmentTarget - $quarterRecruitmentAchieved;
                    @endphp
            <div class="col-lg-12">
                <table class="table table-bordered verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">Target Type</th>
                            <th scope="col">Quarter Target</th>
                            <th scope="col">Quarter Achieve</th>
                            <th scope="col">Quarter Pending</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>

                                PAYROLL
                                <hr style="height: 0px !important;">TEMP
                                <hr style="height: 0px !important;">FMS
                                <hr style="height: 0px !important;">RECRUITMENT
                            </td>
                            <td>
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterPayrollTarget }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterTempTarget }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterFMSTarget }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterRecruitmentTarget }}</span>
                            </td>
                            <td>
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterPayrollTarget }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterTempAchieved }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterFMSAchieved }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterRecruitmentAchieved }}</span>
                            </td>
                            <td>
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterPayrollPending }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterTempPending }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterFMSPending }}</span>
                                <hr style="height: 0px !important;">
                                <span class="badge badge-primary light" style="font-size: 16px; font-weight: 600; background: transparent;">{{  $quarterRecruitmentPending }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
                @endif
            </div>
        </div>
    </div>

    <!--**********************************
                        Content body end
                    ***********************************-->




    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
