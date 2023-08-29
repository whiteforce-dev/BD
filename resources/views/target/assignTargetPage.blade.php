
@extends('Master.master')
@section('title', 'Enquiries')
@section('content')
<style>
    .review-table tbody tr td:nth-child(2) {
        width: 8%;
    }
</style>

    <div class="content-body">
        <div class="container-fluid">

            <div class="col-xl-12 col-lg-8" style="margin-right: 0px; margin-left:0px;">
                <div class="card m-0 " >
                    <div class="card-body py-3 py-md-2">
                        <div class="d-sm-flex  d-block align-items-center">
                            <div class="d-flex mb-sm-0 mb-3 me-auto align-items-center">
                                <div class="media-body">
                                    <p class="mb-1 fs-12 "></p>
                                    <h3 class="mb-0 font-w600 fs-22"><i class="bi bi-bullseye"></i> Assign Target </h3>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Manager List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>Sr. NO.</strong></th>
                                        <th><strong>Image</strong></th>
                                        <th><strong>Manager Name</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user as $index => $mngr)
                                        <tr>
                                            <td><strong>{{  $index + 1 }}</strong></td>
                                            <td><div class="d-flex align-items-center"><img src="{{ $mngr->image }}" class="rounded-lg me-2" width="24" style="    width: 50px;
                                                border: 2px dotted #c6d0d5;" alt=""/></div></td>
                                            <td><div class="d-flex align-items-center"> <span class="w-space-no">{{ ucwords($mngr->name) }}</span></div></td>
                                            <td> <div class="d-flex">
                                                <a href="{{ url('assignMonthlyTarget',$mngr->id) }}" class="btn btn-primary btn-rounded text-white btn-sm px-4">Assign Monthly Target</a>

                                            </div></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{--  <div class="col-xl-12">
                <div class="tab-content">
                    <div id="navpills-1" class="tab-pane fade show active">
                        <div class="table-responsive rounded table-hover fs-14">
                            <table class="table mb-4 dataTablesCard card-table p-0  review-table fs-0" id="example6">
                                <thead>
                                    <tr>
                                        <th style="width: 30px;">S.N0.</th>
                                        <th>Image</th>
                                        <th >Manager Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user as $index => $mngr)
                                        <tr>
                                            <td><h5>{{  $index + 1 }}</h5></td>
                                            <td>
                                                <div class="media align-items-center tbl-img">
                                                    <img class="img-fluid  me-3 d-none d-xl-inline-block" width="70" src="{{ $mngr->image }}" alt="DexignZone">
                                                </div>
                                            </td>
                                            <td style="width: 0px;">
                                                <div class="media-body">
                                                    <h4 style="font-size: 16px;" class="font-w400 mb-1 ">{{ ucwords($mngr->name) }}</h4>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ url('assignMonthlyTarget',$mngr->id) }}" class="btn btn-primary btn-rounded text-white btn-sm px-4">Assign Monthly Target</a>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>  --}}
        </div>
    </div>
@endsection

