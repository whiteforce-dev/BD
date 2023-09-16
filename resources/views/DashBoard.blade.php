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
            -webkit-box-shadow: 3px 3px 5px 6px #ccc;
            /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
            -moz-box-shadow: 3px 3px 5px 3px #ccc;
            /* Firefox 3.5 - 3.6 */
            box-shadow: 3px 3px 5px 3px #ccc;
            /* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */
        }


        .card .card-body {
            padding: 15px 15px 10px
        }

        .card .card-header {
            padding: 15px 15px 0;
            background-color: #fff;
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

        .container-fluid {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
            background: #edf2f9;
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

        .card .stats {
            color: #a9a9a9
        }

        .card .card-footer div {
            display: inline-block
        }

        .card .author {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase
        }

        .card .author i {
            font-size: 14px
        }

        .card h6 {
            font-size: 12px;
            margin: 0
        }

        .card.card-separator:after {
            height: 100%;
            right: -15px;
            top: 0;
            width: 1px;
            background-color: #ddd;
            card-body: "";
            position: absolute
        }

        .card .ct-chart {
            height: 245px
        }

        .card .ct-label {
            font-size: 1rem !important
        }

        .card .table tbody td:first-child,
        .card .table thead th:first-child {
            padding-left: 15px
        }

        .card .table tbody td:last-child,
        .card .table thead th:last-child {
            padding-right: 15px
        }

        .card .alert {
            border-radius: 4px;
            position: relative
        }

        .card .alert.alert-with-icon {
            padding-left: 65px
        }

        .card-stats .card-body {
            padding: 15px 15px 0
        }

        .card-stats .card-body .numbers {
            font-size: 1.8rem;
            text-align: right
        }

        .card-stats .card-body .numbers p {
            margin-bottom: 0
        }

        .card-stats .card-footer {
            padding: 0 15px 10px
        }

        .card-stats .icon-big {
            font-size: 3em;
            min-height: 64px
        }

        .card-stats .icon-big i {
            line-height: 59px
        }

        .card-user .card-image {
            height: 110px
        }

        .card-user .card-image-plain {
            height: 0;
            margin-top: 110px
        }

        .card-user .author {
            text-align: center;
            text-transform: none;
            margin-top: -70px
        }

        .card-user .avatar {
            width: 124px;
            height: 124px;
            border: 5px solid #fff;
            position: relative;
            margin-bottom: 15px
        }

        .card-user .avatar.border-gray {
            border-color: #eee
        }

        .card-user .title {
            line-height: 24px
        }

        .card-user .card-body {
            min-height: 240px
        }

        .card-price .card-footer,
        .card-user .card-footer {
            padding: 5px 15px 10px
        }

        .card-price hr,
        .card-user hr {
            margin: 5px 15px
        }

        .card-plain {
            background-color: transparent;
            box-shadow: none;
            border-radius: 0
        }

        .card-plain .card-image {
            border-radius: 4px
        }

        .card.card-plain {
            border: none !important
        }

        .card.card-plain .card-header {
            background-color: transparent !important
        }
    </style>





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
                <div style="height:;" class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="fs-20 font-w500">Users Behavior</h4>
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
                                                class="ct-grid ct-vertical"></line>
                                            <line y1="161.25" y2="161.25" x1="50" x2="594"
                                                class="ct-grid ct-vertical"></line>
                                            <line y1="136.875" y2="136.875" x1="50" x2="594"
                                                class="ct-grid ct-vertical"></line>
                                            <line y1="112.5" y2="112.5" x1="50" x2="594"
                                                class="ct-grid ct-vertical"></line>
                                            <line y1="88.125" y2="88.125" x1="50" x2="594"
                                                class="ct-grid ct-vertical"></line>
                                            <line y1="63.75" y2="63.75" x1="50" x2="594"
                                                class="ct-grid ct-vertical"></line>
                                            <line y1="39.375" y2="39.375" x1="50" x2="594"
                                                class="ct-grid ct-vertical"></line>
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
                                                    ct:value="698" opacity="1"></line>
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
                                                height="30" width="30"><span class="ct-label ct-vertical ct-start"
                                                    xmlns="http://www.w3.org/2000/xmlns/"
                                                    style="height: 30px; width: 30px;">800</span></foreignObject>
                                        </g>
                                    </svg></div>
                            </div>
                            <div class="card-footer">
                                <div class="legend"><i class="fa fa-circle text-info"></i> Open
                                    <i class="fa fa-circle text-danger"></i> Click
                                    <i class="fa fa-circle text-warning"></i> Click Second Time
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div style="height:20px;" class="card-body">
                                <div id="div_209183630582" class="ct-chart"><img style="height:280px;"
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-KQ_OgPlLlo7ohkOcN6p8Iso2zsNUpHf-86mq-zgnEp0Oh2ppK61YeSS83q-15DQQDb0&usqp=CAU"
                                        alt=""></div>
                            </div>
                            <div class="card-footer">
                                <div class="legend">
                                </div>
                                <h3 class="admin">Admin</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @if(Auth::user()->type === 'Admin')
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
                                                            src=" {{ url('dashboard_icons/totalEnq.png') }}" alt="">
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
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-database">
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
                                                            src=" {{ url('dashboard_icons/breakEnq.png') }}" alt="">
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
                                                            src=" {{ url('dashboard_icons/approach.png') }}" alt="">
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
                   @if(Auth::user()->type === 'Manager')
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
                                                        src=" {{ url('dashboard_icons/totalEnq.png') }}" alt="">
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
                                                        src=" {{ url('dashboard_icons/approach.png') }}" alt="">
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
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-4 col-xxl-3 col-sm-6 ">
                                <div class="widget-stat card">
                                    <a href="{{ url('enquiry-list') }}">
                                        <div class="card-body p-4">
                                            <div class="media ai-icon">
                                                <span class="me-3 bgl-warning text-warning">
                                                    <img style="height:40px;"
                                                        src=" {{ url('dashboard_icons/totalEnq.png') }}" alt="">
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
                                    <a href="{{ url('hot-list') }}">
                                        <div class="card-body p-4">
                                            <div class="media ai-icon">
                                                <span class="me-3 bgl-success text-success">
                                                    <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-database">
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
                                                        src=" {{ url('dashboard_icons/approach.png') }}" alt="">
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
                                    <a href="{{ url('break-list') }}">
                                        <div class="card-body p-4">
                                            <div class="media ai-icon">
                                                <span class="me-3 bgl-success text-success">
                                                    <img style="height:40px;"
                                                        src=" {{ url('dashboard_icons/breakEnq.png') }}" alt="">
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
                                    <a href="{{ url('team-break-list') }}">
                                        <div class="card-body  p-4">
                                            <div class="media ai-icon">
                                                <span class="me-3 bgl-danger text-danger">
                                                    {{--  <img style="height:40px;" src=" {{url('dashboard_icons/breakEnq.png')}}" alt="">  --}}
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
                        </div>
                    </div>

                    <div class="col-xl-12">
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
                                    <a href="#">
                                        <div class="card-body p-4">
                                            <div class="media ai-icon">
                                                <span class="me-3 bgl-success text-success">
                                                    <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-database">
                                                        <ellipse cx="12" cy="5" rx="9"
                                                            ry="3"></ellipse>
                                                        <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                                        <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                                    </svg>
                                                </span>
                                                <div class="media-body">
                                                    <p class="mb-1">Total Team Achieved</p>
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
                    </div>

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header border-0 pb-0 flex-wrap">
                                        <h4 class="fs-20 font-w500">Best Selling</h4>
                                        <div class="card-action coin-tabs">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#Monthly">
                                                        Monthly
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " data-bs-toggle="tab" href="#Weekly">
                                                        Weekly
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " data-bs-toggle="tab" href="#Weekly">
                                                        Weekly
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " data-bs-toggle="tab" href="#Daily">
                                                        Daily
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="Monthly">
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
                                                                <h4 class="fs-18 text-black mb-0 font-w600">21,512</h4>
                                                                <span class="fs-14">Ticket Left</span>
                                                            </div>
                                                            <div class="me-4">
                                                                <svg class="primary-icon" width="20" height="8"
                                                                    viewBox="0 0 20 8" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <rect width="20" height="8" rx="4"
                                                                        fill="#4585ED" />
                                                                </svg>
                                                                <h4 class="fs-18 text-black mb-0 font-w600">45,612</h4>
                                                                <span class="fs-14">Ticket Sold</span>
                                                            </div>
                                                            <div class="">
                                                                <svg width="20" height="8" viewBox="0 0 20 8"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect width="20" height="8" rx="4"
                                                                        fill="#C8C8C8" />
                                                                </svg>
                                                                <h4 class="fs-18 text-black mb-0 font-w600">275</h4>
                                                                <span class="fs-14">Event Held</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="Weekly">
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
                                                                <h4 class="fs-18 text-black mb-0 font-w600">21,512</h4>
                                                                <span class="fs-14">Ticket Left</span>
                                                            </div>
                                                            <div class="me-4">
                                                                <svg width="20" height="8" viewBox="0 0 20 8"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect width="20" height="8" rx="4"
                                                                        fill="#0E8A74" />
                                                                </svg>
                                                                <h4 class="fs-18 text-black mb-0 font-w600">45,612</h4>
                                                                <span class="fs-14">Ticket Sold</span>
                                                            </div>
                                                            <div class="">
                                                                <svg width="20" height="8" viewBox="0 0 20 8"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect width="20" height="8" rx="4"
                                                                        fill="#C8C8C8" />
                                                                </svg>
                                                                <h4 class="fs-18 text-black mb-0 font-w600">275</h4>
                                                                <span class="fs-14">Event Held</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="Daily">
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
                                                                <h4 class="fs-18 text-black mb-0 font-w600">21,512</h4>
                                                                <span class="fs-14">Ticket Left</span>
                                                            </div>
                                                            <div class="me-4">
                                                                <svg width="20" height="8" viewBox="0 0 20 8"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect width="20" height="8" rx="4"
                                                                        fill="#0E8A74" />
                                                                </svg>
                                                                <h4 class="fs-18 text-black mb-0 font-w600">45,612</h4>
                                                                <span class="fs-14">Ticket Sold</span>
                                                            </div>
                                                            <div class="">
                                                                <svg width="20" height="8" viewBox="0 0 20 8"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect width="20" height="8" rx="4"
                                                                        fill="#C8C8C8" />
                                                                </svg>
                                                                <h4 class="fs-18 text-black mb-0 font-w600">275</h4>
                                                                <span class="fs-14">Event Held</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card bg-primary">
                                    <div class="card-body">
                                        <div class="d-sm-flex d-block pb-sm-3 align-items-end mb-2">
                                            <div class="me-auto pe-3 mb-3 mb-sm-0">
                                                <span class="chart-num-3 font-w200 d-block mb-sm-3 mb-2 text-white">Ticket
                                                    Sold Today</span>
                                                <h2 class="chart-num-2 text-white mb-0">456,502<span
                                                        class="fs-18 me-2 ms-3">pcs</span></h2>
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
                                        <p class="fs-12 text-white pt-4">Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                            ad mini</p>
                                        <a href="javascript:void(0);" class="text-white">View detail<i
                                                class="las la-long-arrow-alt-right scale5 ms-3"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-8">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card event-bx">
                                    <div class="card-header border-0 mb-0">
                                        <h4 class="fs-20">Recent Event List</h4>
                                        <div class="dropdown custom-dropdown mb-0 tbl-orders-style">
                                            <div class="btn sharp tp-btn" data-bs-toggle="dropdown">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                        stroke="#194039" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                        stroke="#194039" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                        stroke="#194039" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body dz-scroll loadmore-content pt-0" id="EventListContent">
                                        <div class="media event-list pb-3 border-bottom mb-3">
                                            <div class="image">
                                                <img src="images/card/Untitled-15.jpg" alt="">
                                                <i class="las la-film image-icon"></i>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);"
                                                        class="text-black"> Envato International Online Meetup 2020</a>
                                                </h4>
                                                <span class="fs-14 d-block mb-sm-3 mb-2 text-secondary">Medan,
                                                    Indonesia</span>
                                                <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                    enim ad mini</p>
                                            </div>
                                            <div class="media-footer">
                                                <div class="text-center">
                                                    <span class="ticket-icon-1 mb-3">
                                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                                    </span>
                                                    <div class="fs-12 text-primary" style="color: #4585ED">$124,00</div>
                                                </div>
                                                <div class="text-center">
                                                    <span class="ticket-icon-1 mb-3">
                                                        <i class="fa fa-ticket" aria-hidden="true"></i>
                                                    </span>
                                                    <div class="fs-12 text-primary">561 pcs Left</div>
                                                </div>
                                                <div class="text-center">
                                                    <span class="ticket-icon-1 mb-3">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>
                                                    <div class="fs-12 text-primary">24 June 2020</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media event-list pb-3 border-bottom mb-3">
                                            <div class="image">
                                                <img src="images/card/Untitled-16.jpg" alt="">
                                                <i class="fa fa-music image-icon"></i>

                                            </div>
                                            <div class="media-body">
                                                <h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);"
                                                        class="text-black"> Envato International Online Meetup 2020</a>
                                                </h4>
                                                <span class="fs-14 d-block mb-sm-3 mb-2 text-secondary">Medan,
                                                    Indonesia</span>
                                                <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                    enim ad mini</p>
                                            </div>
                                            <div class="media-footer">
                                                <div class="text-center">
                                                    <span class="ticket-icon-1 mb-3">
                                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                                    </span>
                                                    <div class="fs-12 text-primary">$124,00</div>
                                                </div>
                                                <div class="text-center">
                                                    <span class="ticket-icon-1 mb-3 disabled">
                                                        <i class="fa fa-ticket" aria-hidden="true"></i>
                                                    </span>
                                                    <div class="fs-12 text-primary">561 pcs Left</div>
                                                </div>
                                                <div class="text-center">
                                                    <span class="ticket-icon-1 mb-3">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>
                                                    <div class="fs-12 text-primary">24 June 2020</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media event-list pb-3 border-bottom mb-3">
                                            <div class="image">
                                                <img src="images/card/Untitled-17.jpg" alt="">
                                                <i class="fa fa-music image-icon"></i>

                                            </div>
                                            <div class="media-body">
                                                <h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);"
                                                        class="text-black"> Envato International Online Meetup 2020</a>
                                                </h4>
                                                <span class="fs-14 d-block mb-sm-3 mb-2 text-secondary">Medan,
                                                    Indonesia</span>
                                                <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                    enim ad mini</p>
                                            </div>
                                            <div class="media-footer">
                                                <div class="text-center">
                                                    <span class="ticket-icon-1 mb-3">
                                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                                    </span>
                                                    <div class="fs-12 text-primary">$124,00</div>
                                                </div>
                                                <div class="text-center">
                                                    <span class="ticket-icon-1 mb-3 disabled">
                                                        <i class="fa fa-ticket" aria-hidden="true"></i>
                                                    </span>
                                                    <div class="fs-12 text-primary">561 pcs Left</div>
                                                </div>
                                                <div class="text-center">
                                                    <span class="ticket-icon-1 disabled mb-3">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>
                                                    <div class="fs-12 text-primary">24 June 2020</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media event-list pb-3 border-bottom mb-3">
                                            <div class="image">
                                                <img src="images/card/Untitled-15.jpg" alt="">
                                                <i class="fa fa-music image-icon"></i>

                                            </div>
                                            <div class="media-body">
                                                <h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);"
                                                        class="text-black"> Envato International Online Meetup 2020</a>
                                                </h4>
                                                <span class="fs-14 d-block mb-sm-3 mb-2 text-secondary">Medan,
                                                    Indonesia</span>
                                                <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                    enim ad mini</p>
                                            </div>
                                            <div class="media-footer">
                                                <div class="text-center">
                                                    <span class="ticket-icon-1 mb-3">
                                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                                    </span>
                                                    <div class="fs-12 text-primary">$124,00</div>
                                                </div>
                                                <div class="text-center">
                                                    <span class="ticket-icon-1 mb-3 disabled">
                                                        <i class="fa fa-ticket" aria-hidden="true"></i>
                                                    </span>
                                                    <div class="fs-12 text-primary">561 pcs Left</div>
                                                </div>
                                                <div class="text-center">
                                                    <span class="ticket-icon-1 disabled mb-3">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>
                                                    <div class="fs-12 text-primary">24 June 2020</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media event-list pb-3 border-bottom mb-3">
                                            <div class="image">
                                                <img src="images/card/Untitled-16.jpg" alt="">
                                                <i class="fa fa-music image-icon"></i>

                                            </div>
                                            <div class="media-body">
                                                <h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);"
                                                        class="text-black"> Envato International Online Meetup 2020</a>
                                                </h4>
                                                <span class="fs-14 d-block mb-sm-3 mb-2 text-secondary">Medan,
                                                    Indonesia</span>
                                                <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                    enim ad mini</p>
                                            </div>
                                            <div class="media-footer">
                                                <div class="text-center">
                                                    <span class="ticket-icon-1 mb-3">
                                                        <i class="fa fa-usd text-primary" aria-hidden="true"></i>
                                                    </span>
                                                    <div class="fs-12 text-primary">$124,00</div>
                                                </div>
                                                <div class="text-center">
                                                    <span class="ticket-icon-1 mb-3 disabled">
                                                        <i class="fa fa-ticket" aria-hidden="true"></i>
                                                    </span>
                                                    <div class="fs-12 text-primary">561 pcs Left</div>
                                                </div>
                                                <div class="text-center">
                                                    <span class="ticket-icon-1 disabled mb-3">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>
                                                    <div class="fs-12 text-primary">24 June 2020</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer pt-0 border-0">
                                        <a href="javascript:void(0);"
                                            class="btn btn-secondary btn-lg btn-block text-white dz-load-more"
                                            id="EventList" rel="ajax/event-list.html">Load More</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-4">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body text-center event-calender pb-2">
                                        <input type='text' class="form-control d-none" id='datetimepicker1' />
                                    </div>
                                    <div class="card-header py-0 border-0">
                                        <h4 class="text-black fs-20">Upcoming Events</h4>
                                    </div>
                                    <div class="card-body pb-0" style="height: 500px;">
                                        <div class="media mb-5 align-items-center event-list">
                                            <div class="p-3 text-center me-3 date-bx bgl-primary">
                                                <h2 class="mb-0 text-secondary fs-28 font-w600">3</h2>
                                                <h5 class="mb-1 text-black">Wed</h5>
                                            </div>
                                            <div class="media-body px-0">
                                                <h6 class="mt-0 mb-3 fs-14"><a class="text-black" href="event.html">Live
                                                        Concert Choir Charity Event 2020</a></h6>
                                                <ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
                                                    <li>Ticket Sold</li>
                                                    <li>561/650</li>
                                                </ul>
                                                <div class="progress mb-0" style="height:4px; width:100%;">
                                                    <div class="progress-bar bg-warning progress-animated"
                                                        style="width:60%; height:8px; background :aliceblue !important;"
                                                        role="progressbar">
                                                        <span
                                                            style="width:60%; height:8px; color:aliceblue !important; class="">60%
                                                            Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media mb-5 align-items-center event-list">
                                            <div class="p-3 text-center me-3 date-bx bgl-primary">
                                                <h2 class="mb-0 text-secondary fs-28 font-w600">16</h2>
                                                <h5 class="mb-1 text-black">Wed</h5>
                                            </div>
                                            <div class="media-body px-0">
                                                <h6 class="mt-0 mb-3 fs-14"><a class="text-black"
                                                        href="event.html">Live Concert Choir Charity Event 2020</a></h6>
                                                <ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
                                                    <li>Ticket Sold</li>
                                                    <li>431/650</li>
                                                </ul>
                                                <div class="progress mb-0" style="height:4px; width:100%;">
                                                    <div class="progress-bar bg-warning progress-animated"
                                                        style="width:50%; height:8px;" role="progressbar">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media mb-5 align-items-center event-list">
                                            <div class="p-3 text-center me-3 date-bx bgl-primary">
                                                <h2 class="mb-0 text-primary fs-28 font-w600">28</h2>
                                                <h5 class="mb-1 text-black">Wed</h5>
                                            </div>
                                            <div class="media-body px-0">
                                                <h6 class="mt-0 mb-3 fs-14"><a class="text-black"
                                                        href="event.html">Live Concert Choir Charity Event 2020</a></h6>
                                                <ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
                                                    <li>Ticket Sold</li>
                                                    <li>650/650</li>
                                                </ul>
                                                <div class="progress mb-0" style="height:4px; width:100%;">
                                                    <div class="progress-bar bg-warning progress-animated"
                                                        style="width:100%; height:8px;" role="progressbar">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer pt-0 border-0">
                                        <a href="javascript:void(0);"
                                            class="btn btn-secondary btn-block text-white">Load More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-4 col-xxl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Timeline</h4>
                            </div>
                            <div class="card-body">
                                <div id="DZ_W_TimeLine" class="widget-timeline dz-scroll height370 ps ps--active-y">
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-badge primary"></div>
                                            <a class="timeline-panel text-muted" href="#">
                                                <span>10 minutes ago</span>
                                                <h6 class="mb-0">Youtube, a video-sharing website, goes live <strong
                                                        class="text-primary">$500</strong>.</h6>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge info">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                                <span>20 minutes ago</span>
                                                <h6 class="mb-0">New order placed <strong
                                                        class="text-info">#XF-2356.</strong></h6>
                                                <p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt...
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge danger">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                                <span>30 minutes ago</span>
                                                <h6 class="mb-0">john just buy your product <strong
                                                        class="text-warning">Sell $250</strong></h6>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge success">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                                <span>15 minutes ago</span>
                                                <h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge warning">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                                <span>20 minutes ago</span>
                                                <h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge dark">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                                <span>20 minutes ago</span>
                                                <h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; height: 370px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 216px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-xxl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Timeline 2</h4>
                            </div>
                            <div class="card-body">
                                <div id="DZ_W_TimeLine11"
                                    class="widget-timeline dz-scroll style-1 height370 ps ps--active-y">
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-badge primary"></div>
                                            <a class="timeline-panel text-muted" href="#">
                                                <span>10 minutes ago</span>
                                                <h6 class="mb-0">Youtube, a video-sharing website, goes live <strong
                                                        class="text-primary">$500</strong>.</h6>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge info">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                                <span>20 minutes ago</span>
                                                <h6 class="mb-0">New order placed <strong
                                                        class="text-info">#XF-2356.</strong></h6>
                                                <p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt...
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge danger">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                                <span>30 minutes ago</span>
                                                <h6 class="mb-0">john just buy your product <strong
                                                        class="text-warning">Sell $250</strong></h6>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge success">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                                <span>15 minutes ago</span>
                                                <h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge warning">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                                <span>20 minutes ago</span>
                                                <h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge dark">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                                <span>20 minutes ago</span>
                                                <h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; height: 370px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 295px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-xxl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header  border-0 pb-0">
                                <h4 class="card-title">Notifications</h4>
                            </div>
                            <div class="card-body">
                                <div id="DZ_W_Todo1" class="widget-media dz-scroll height370 ps ps--active-y">
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-panel">
                                                <div class="media me-2">
                                                    <img alt="image" width="50" src="images/avatar/1.jpg">
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                                    <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                </div>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-primary light sharp"
                                                        data-bs-toggle="dropdown">
                                                        <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                            version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12"
                                                                    r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-panel">
                                                <div class="media me-2 media-info">
                                                    KG
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-1">Resport created successfully</h5>
                                                    <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                </div>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-info light sharp"
                                                        data-bs-toggle="dropdown">
                                                        <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                            version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12"
                                                                    r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-panel">
                                                <div class="media me-2 media-success">
                                                    <i class="fa fa-home"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                                    <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                </div>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-success light sharp"
                                                        data-bs-toggle="dropdown">
                                                        <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                            version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12"
                                                                    r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-panel">
                                                <div class="media me-2">
                                                    <img alt="image" width="50" src="images/avatar/1.jpg">
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-1">Dr sultads Send you Photo</h5>
                                                    <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                </div>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-primary light sharp"
                                                        data-bs-toggle="dropdown">
                                                        <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                            version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12"
                                                                    r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-panel">
                                                <div class="media me-2 media-danger">
                                                    KG
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-1">Resport created successfully</h5>
                                                    <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                </div>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-danger light sharp"
                                                        data-bs-toggle="dropdown">
                                                        <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                            version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12"
                                                                    r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-panel">
                                                <div class="media me-2 media-primary">
                                                    <i class="fa fa-home"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-1">Reminder : Treatment Time!</h5>
                                                    <small class="d-block">29 July 2020 - 02:26 PM</small>
                                                </div>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-primary light sharp"
                                                        data-bs-toggle="dropdown">
                                                        <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                            version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12"
                                                                    r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; height: 370px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 300px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-xxl-3 col-sm-6">
                        <div class="card overflow-hidden">
                            <div class="social-graph-wrapper widget-facebook">
                                <span class="s-icon"><i class="fab fa-facebook-f"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-end">
                                    <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                        <h4 class="m-1"><span class="counter">89</span> k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                        <h4 class="m-1"><span class="counter">119</span> k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-3 col-sm-6">
                        <div class="card overflow-hidden">
                            <div class="social-graph-wrapper widget-linkedin">
                                <span class="s-icon"><i class="fab fa-linkedin"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-end">
                                    <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                        <h4 class="m-1"><span class="counter">89</span> k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                        <h4 class="m-1"><span class="counter">119</span> k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-3 col-sm-6">
                        <div class="card overflow-hidden">
                            <div class="social-graph-wrapper widget-googleplus">
                                <span class="s-icon"><i class="fab fa-google-plus-g"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-end">
                                    <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                        <h4 class="m-1"><span class="counter">89</span> k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                        <h4 class="m-1"><span class="counter">119</span> k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-3 col-sm-6">
                        <div class="card overflow-hidden">
                            <div class="social-graph-wrapper widget-twitter">
                                <span class="s-icon"><i class="fab fa-twitter"></i></span>
                            </div>
                            <div class="row">
                                <div class="col-6 border-end">
                                    <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                        <h4 class="m-1"><span class="counter">89</span> k</h4>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                        <h4 class="m-1"><span class="counter">119</span> k</h4>
                                        <p class="m-0">Followers</p>
                                    </div>
                                </div>
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
