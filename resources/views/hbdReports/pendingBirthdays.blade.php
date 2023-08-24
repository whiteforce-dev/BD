@extends('Master.master')
@section('title', 'Enquiries')
@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <div class="container mt-5"
            style="padding-left: 0px !important;
            /* width: 0px; */
            padding-right: 0px !important;">
            <div class="row justify-content-center" style="margin-right: 0px; margin-left:0px;">
                <div class="col-md-12"style="margin-top: -50px">
                    <div class="card" style="    height: 122px;">
                        <div class="card-body">
                            <!-- Search Form -->
                            <form id="searchingForm" action="{{ url('searchPendingHbdCount') }}" method="get">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="">From Date</label>
                                        <input type="date" class="form-control" name="from_date" id="from_date">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">To Date</label>
                                        <input type="date" class="form-control" name="to_date" id="to_date">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Select Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">All</option>
                                            @php
                                            $status = App\Models\Followup_remark::where('status','active')->get()
                                            @endphp
                                            @foreach($status as $obj)
                                            <option value="{{ $obj->id }}">{{ $obj->remark }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3" style="margin-top: 32px;">
                                        <button class="btn btn-primary btn-block" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
       </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pending Birthday</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr >
                                        <th><strong style="font-size: 16px;">S.NO</strong></th>
                                        <th><strong style="font-size: 16px;">EMPLOYEE NAME</strong></th>
                                        <th><strong style="font-size: 16px;">TOTAL CLIENT</strong></th>
                                        <th><strong style="font-size: 16px;">ADDED BIRTHDAY COUNT</strong></th>
                                        <th><strong style="font-size: 16px;">PENDING BIRTHDAY COUNT</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $currentUser)
                                    <tr>
                                        <td><strong style="font-size: 16px;">{{ $index + 1 }}</strong></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $currentUser->image }}??''" class="rounded-lg me-2" width="24" alt=""/>
                                                <span class="w-space-no">{{ $currentUser->name }}</span>
                                            </div>
                                        </td>
                                        <td style="font-size: 16px;"><span class="badge badge-info">{{ $currentUser->totalClients }}</span></td>
                                        <td style="font-size: 16px;"><span class="badge badge-success">{{ $currentUser->addedBirthdays }}</span></td>
                                        <td style="font-size: 16px;"><a href="{{route('pendingBirthdaysList',['id' => $currentUser->id])}}" class="btn btn-danger">{{ $currentUser->pendingBirthdays }}</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
