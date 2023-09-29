@extends('Master.Master')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    body {
        background: #e4e4e4;
    }
    .wrapper {
      width: 230px;
      height: 300px;
      background: white;
      margin: 20px;
      position: relative;
      overflow: hidden;
      border-radius: 10px 10px 10px 10px;
      box-shadow: 0;
      {{--  border: 1px solid gray;  --}}
      transform: scale(0.95);
      transition: box-shadow 0.5s, transform 0.5s;
    }


    .wrapper:hover {
      transform: scale(1);
      box-shadow: 5px 20px 30px rgba(0, 0, 0, 0.2);
    }
    .wrapper .container {
      width: 100%;
      height: 100%;
      padding: 0;
      margin-top:0;
      color:white;
    }
    .wrapper .container .top {
      height: 80%;
      width: 100%;
      -webkit-background-size: 100%;
      -moz-background-size: 100%;
      -o-background-size: 100%;
      background-size: 100%;
    }
    .wrapper .container .bottom {
      width: 100%;
      height: 20%;
      transition: transform 0.5s;
      background-color: #f5f6fa;
    }

    .wrapper .container .bottom.clicked {
      transform: translateX(-50%);
    }
    .wrapper .container .bottom h1 {
      margin: 0;
      padding: 0;
    }
    .wrapper .container .bottom p {
      margin: 0;
      padding: 0;
    }
    .wrapper .container .bottom .left {
      height: 100%;
      width: 50%;

    }
    .wrapper .container .bottom .left .details {
      padding: 20px;
      float: left;
      width: calc(70% - 40px);
    }
    .wrapper .container .bottom .left .buy {
      float: right;
     width: calc(30% - 2px);
     height: 100%;
     background: #f1f1f1;
      transition: background 0.5s;
      border-left: solid thin rgba(0, 0, 0, 0.1);
    }
    .wrapper .container .bottom .left .buy i {
     font-size: 30px;
      padding: 30px;
     color: #254053;
     transition: transform 0.5s;
    }
    .wrapper .container .bottom .left .buy:hover {
     background: #A6CDDE;
    }
    .wrapper .container .bottom .left .buy:hover i {
     transform: translateY(5px);
     color: #00394B;
    }
    .wrapper .container .bottom .right {
     width: 50%;
     background: #A6CDDE;
     color: white;
     float: right;
     height: 200%;
     overflow: hidden;
    }
    .wrapper .container .bottom .right .details {
     padding: 20px;
     float: right;
      width: calc(70% - 40px);
    }
    .wrapper .container .bottom .right .done {
     width: calc(30% - 2px);
      float: left;
     transition: transform 0.5s;
      border-right: solid thin rgba(255, 255, 255, 0.3);
     height: 50%;
    }
    .wrapper .container .bottom .right .done i {
     font-size: 30px;
     padding: 30px;
     color: white;
    }
    .wrapper .container .bottom .right .remove {
     width: calc(30% - 1px);
     clear: both;
     border-right: solid thin rgba(255, 255, 255, 0.3);
     height: 50%;
     background: #BC3B59;
     transition: transform 0.5s, background 0.5s;
    }
    .wrapper .container .bottom .right .remove:hover {
      background: #9B2847;
    }
    .wrapper .container .bottom .right .remove:hover i {
     transform: translateY(5px);
    }
    .wrapper .container .bottom .right .remove i {
     transition: transform 0.5s;
     font-size: 30px;
     padding: 30px;
     color: white;
    }
    .wrapper .container .bottom .right:hover .remove, .wrapper .container .bottom .right:hover .done {
      transform: translateY(-100%);

    }
    .wrapper .inside {
     z-index: 9;
     background: rgba(0, 0, 0, 0.5);         width: 110px;
     height: 110px;
     position: absolute;
     top: -70px;
     right: -70px;
     color: white;
     /* border-radius: 0px 0px 200px 200px; */
     transition: all 0.5s, border-radius 2s, top 1s;
     overflow: hidden;
    }
    .wrapper .inside .icon {
     position: absolute;
     right: 88px;
     top: 80px;
     color: white;
     opacity: 1;
    }

    .nav {
    font-size: 15px;
    color: #ffffff !important;
    text-decoration: none !important;
    background-color: transparent;
}

    .content-body .container-fluid{
      padding-top: 10px;
      padding-right: 40px;
      padding-left: 0px;
    }
    .wrapper .inside:hover {
     width: 70%;
     right: 0;
     top: 0;
     border-radius: 0;
     height: 45%;
    }
    .wrapper .inside:hover .icon {
     opacity: 0;
     right: 15px;
     top: 15px;
    }
    .wrapper .inside:hover .contents {
      opacity: 1;
      transform: scale(1);
      transform: translateY(0);
    }
    .wrapper .inside .contents {
      padding: 5%;
      opacity: 0;
      transform: scale(0.5);
      transform: translateY(-200%);
      transition: opacity 0.2s, transform 0.8s;
    }
    .wrapper .inside .contents table {
         text-align: left;
      width: 100%;
    }
    .wrapper .inside .contents h1, .wrapper .inside .contents p, .wrapper .inside .contents table {
      color: white;
    }
    .wrapper .inside .contents p {
      font-size: 13px;
    }
    .content-body .container {
        /* margin-top: 40px; */
    }
</style>
    <div class="content-body">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                   <div class="row">
                        @foreach ($Details as $index => $obj)
                          @if($obj->is_active == 1)
                          <div class="col-xl-3 col-xxl-3 col-sm-4">
                                                   <div class="wrapper">
                             <div class="container">
                               <div style="height: 259px;overflow-y: hidden;"  class="top">
                                <img style="width:100%;height:260px;" class="imgs" src="{{ url($obj->image) }}" alt="">
                               </div>
                               <div class="bottom" style="background-color: #d7dadc">
                                  <h2 style="display:flex;justify-content:center;position:relative;top:5px;font-size: 20px;">{{ $obj->name }}</h2>
                               </div>
                             </div>
                             <div class="inside">
                               <div class="icon"><i class="fas fa-ellipsis-v"></i></div>
                               <div class="contents">
                                 <table>
                                    <a class="nav" href="javascript:void(0);" data-toggle="tab"
                                        data-target="#changePassword{{ $obj->id }}"><tr>
                                        Password Change
                                    </tr>
                                    </a>
                                         <a class="nav" href="{{ url('/edit-employee', $obj->id) }}"><tr>
                                            Resigned / Left
                                             </tr>
                                          </a>
                                   <a class="nav" href="{{ url('/edit-employee', $obj->id) }}"><tr>
                                    Edit
                                   </tr></a>
                                  <a class="nav" href="{{ url('/delete-employee', $obj->id) }}"><tr>
                                    Delete
                                      </tr>
                                  </a>
                                 </table>
                               </div>
                             </div>
                           </div>
                          </div>
                          @endif

                          @endforeach
                      </div>
                  </div>    @include('TeamMember.resetPassword')
                  {{$Details->links()}}
              </div>

          </div>


            {{--  <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        @foreach ($Details as $index => $obj)
                            @if ($obj->is_active == 1)
                                <div class="col-xl-3 col-xxl-3 col-sm-6">
                                    <div class="card chart-bx" style="height: 255px">
                                        <div class="dropdown ms-auto" style="height: 20px;">
                                            <a href="#" class="  light sharp" data-bs-toggle="dropdown"
                                                aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="25px" height="25px"
                                                    style="margin-top: 5px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24">
                                                        </rect>
                                                        <circle fill="#000000" cx="5" cy="12" r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="12" cy="12" r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="19" cy="12" r="2">
                                                        </circle>
                                                    </g>
                                                </svg></a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li class="dropdown-item"><i
                                                        class="fa fa-user-edit text-primary me-2"></i><a
                                                        href="{{ url('/edit-employee', $obj->id) }}">Edit</a> </li>
                                                <li class="dropdown-item"><i class="fa fa-lock text-primary me-2"></i><a
                                                        href="{{ url('/edit-employee', $obj->id) }}">Password Change</a></li>
                                                <li class="dropdown-item"><i class="fa fa-star text-primary me-2"></i><a
                                                        href="{{ url('/edit-employee', $obj->id) }}"> Resigned / Left</a>
                                                </li>
                                                <li class="dropdown-item"><i class="fa fa-trash text-primary me-2"></i><a
                                                        href="{{ url('/edit-employee', $obj->id) }}">Delete</a></li>
                                            </ul>
                                        </div>
                                        <div
                                            class="card-body pt-sm-4 pt-3 d-flex align-items-center justify-content-between">
                                            <div class="me-3">
                                                @if (!file_exists($obj->image))
                                                    <img style="background:black; height: 180px;width:198px; margin-top: -10px; margin-bottom:-7px; border-radius:5px;  "
                                                        src="{{ url($obj->image) }}" alt="">
                                                @else
                                                    <img style="background:black; height: 180px;width:198px; margin-top: -10px; margin-bottom:-7px; border-radius:5px; "
                                                        src="{{ url($obj->image) }}" alt="">
                                                @endif
                                                <div class="name">
                                                    <b>{{ $obj->name }}</b>
                                                </div>

                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                {{ $Details->links() }}
            </div>  --}}

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap CSS and JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
