@extends('Master.master')
@section('title', 'Edit Member')

@section('content')
    <style>
        /*---------------------------------------*/
        /* Form Body */
        /*---------------------------------------*/


        .form-body {
            padding: 10px 40px;
            color: #666;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-body .label-title {
            color: #E4316F;
            font-size: 17px;
            font-weight: bold;
        }

        .form-body .form-input {
            font-size: 17px;
            box-sizing: border-box;
            width: 100%;
            height: 34px;
            padding-left: 10px;
            padding-right: 10px;
            color: #333333;
            text-align: left;
            border: 1px solid #d6d6d6;
            border-radius: 4px;
            background: white;
            outline: none;
        }



        .horizontal-group .left {
            float: left;
            width: 49%;
        }

        .horizontal-group .right {
            float: right;
            width: 49%;
        }

        input[type="file"] {
            outline: none;
            cursor: pointer;
            font-size: 17px;
        }

        #range-label {
            width: 15%;
            padding: 5px;
            background-color: #1BBA93;
            color: white;
            border-radius: 5px;
            font-size: 17px;
            position: relative;
            top: -8px;
        }


        ::-webkit-input-placeholder {
            color: #d9d9d9;
        }

        /*---------------------------------------*/
        /* Form Footer */
        /*---------------------------------------*/
        .form-footer {
            clear: both;
        }
    </style>
    <div>
        <div class="container-fluid" style="margin-top:50px">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            @php
                                $user = Auth::user();
                            @endphp

                            <img src="{{ $user->img }}" alt="..." class="w-100 border-radius-lg shadow-sm">

                            <a href="javascript:;"
                                class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                                <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Edit Image"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $user->name }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{--  {{$user->type }}  --}}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        {{--  <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                                        role="tab" aria-controls="dashboard" aria-selected="false">
                                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40"
                                            version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>settings</title>
                                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="Rounded-Icons" transform="translate(-2020.000000, -442.000000)"
                                                    fill="#FFFFFF" fill-rule="nonzero">
                                                    <g id="Icons-with-opacity"
                                                        transform="translate(1716.000000, 291.000000)">
                                                        <g id="settings" transform="translate(304.000000, 151.000000)">
                                                            <polygon class="color-background" id="Path"
                                                                opacity="0.596981957"
                                                                points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                            </polygon>
                                                            <path class="color-background"
                                                                d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"
                                                                id="Path" opacity="0.596981957"></path>
                                                            <path class="color-background"
                                                                d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"
                                                                id="Path"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="ms-1">{{ __('Projects') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>  --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="card">
                <form action="{{ url('/updateEmp', $Emp->id) }}" method="POST" role="form text-left"
                    enctype="multipart/form-data>

                    @csrf
                    @if ($errors->any())
             <div class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                    <span class="alert-text text-white">
                        {{ $errors->first() }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="fa fa-close" aria-hidden="true"></i>
                    </button>
            </div>
            @endif
            @if (session('success'))
                <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                    <span class="alert-text text-white">
                        {{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i class="fa fa-close" aria-hidden="true"></i>
                    </button>
                </div>
            @endif
            <div class="form-body">

                <!-- Firstname and Lastname -->
                <div class="horizontal-group">
                    <div class="form-group left">
                        <label for="name" class="label-title"> Full Name *</label>
                        <input class="form-input" type="text" value="{{ $Emp->name }}" id="user-name" name="name">
                        @error('name')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group right">
                        <label for="email" class="label-title">Email*</label>
                        <input class="form-input" type="email" value="{{ $Emp->email }}" id="user-email" name="email">
                        @error('email')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group left">
                        <label for="mobile" class="label-title"> Mobile Number *</label>
                        <input class="form-input" type="text" value="{{ $Emp->mobile }}" id="mobile" name="mobile">
                        @error('mobile')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group right">
                        <label for="img" class="label-title">Image*</label>
                        <input type="file" id="lastname" class="form-input" name="img" />
                    </div>

                    <div class="form-group left">
                        <label for="firstname" class="label-title">Type*</label>
                        <div class="form-input">
                            <select name="type" class="form-control">
                                <option value="">Select Designation</option>
                                @php($Designation = \App\Models\Desigination::get())
                                @foreach ($Designation as $Designations)
                                    @if ($Designations->id == (isset($Emp) ? $Emp->type : 'Select Designation'))
                                        <option selected value="{{ $Designations->name }}">{{ $Designations->name }}
                                        </option>
                                    @else
                                        <option value="{{ $Designations->name }}">{{ $Designations->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('type')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group right">
                        <label for="created_by" class="label-title">Select Manager*</label>
                        <div class="form-input">
                            <select name="created_by" class="form-control">
                                <option value="{{ Auth::user()->id }}">Select Manager</option>
                                @php($user = \App\Models\User::where('type', '=', '5')->get())
                                @foreach ($user as $users)
                                    @if ($users->id == (isset($Emp) ? $Emp->created_by : 'Select Manager'))
                                        <option selected value="{{ $users->id }}">{{ $users->name }}
                                        </option>
                                    @else
                                        <option value="{{ $users->id }}">{{ $users->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('created_by')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>


                    </div>



                    <div class="form-group right " style="margin-top: 8px; color:#E4316F;">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4"
                            style="margin-top: 8px; margin-left:-490px; color:#E4316F; " >{{ 'Update' }}</button>
                    </div>
                </div>

            </div>

            </form>


        </div>
    </div>
    </div>


    <!-- form body -->
@endsection


