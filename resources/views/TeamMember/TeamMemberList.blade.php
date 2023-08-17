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


        .name{
            position: relative;
            top: 12px;
                text-align: center;
                font-size: 15px;
                }




    </style>
    <div class="content-body">
        <div class="container-fluid">




            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        @foreach ($Details as $index => $obj)
                        @if($obj->is_active == 1)
                        <div class="col-xl-3 col-xxl-3 col-sm-6">
                            <div class="card chart-bx" style="height: 255px">
                                <div class="dropdown ms-auto" style="height: 20px;">
                                    <a  href="#" class="  light sharp" data-bs-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25px" height="25px" style="margin-top: 5px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li  class="dropdown-item"><i class="fa fa-user-edit text-primary me-2"></i><a href="{{ url('/edit-employee',$obj->id) }}">Edit</a> </li>
                                        <li class="dropdown-item"><i class="fa fa-lock text-primary me-2"></i><a href="{{ url('/edit-employee',$obj->id) }}">Password Change</a></li>
                                        <li class="dropdown-item"><i class="fa fa-star text-primary me-2"></i><a href="{{ url('/edit-employee',$obj->id) }}"> Resigned / Left</a></li>
                                        <li class="dropdown-item"><i class="fa fa-trash text-primary me-2"></i><a href="{{ url('/edit-employee',$obj->id) }}">Delete</a></li>
                                    </ul>
                                </div>
                                <div class="card-body pt-sm-4 pt-3 d-flex align-items-center justify-content-between">
                                    <div class="me-3">
                                        @if (!file_exists($obj->image))
                                        <img style="background:black; height: 180px;width:198px; margin-top: -10px; margin-bottom:-7px; border-radius:5px;  " src="{{ $obj->image }}" alt="">
                                        @else
                                        <img style="background:black; height: 180px;width:198px; margin-top: -10px; margin-bottom:-7px; border-radius:5px; " src="{{ $obj->image }}" alt="">
                                        @endif
                                        <div class="name">
                                            <b>{{ $obj->name }}</b>
                                        </div>

                                    </div>
                                    <div >
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                {{$Details->links()}}
            </div>

        </div>
    </div>
@endsection



