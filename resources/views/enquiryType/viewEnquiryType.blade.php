@extends('Master.master')
@section('title', 'Enquiries')
@section('content')
<style>
    .btn{
        padding: none;
    }
</style>
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-sm-flex  d-block align-items-center" style="width: 100%;">
                            <div class="d-flex mb-sm-0 mb-3 me-auto align-items-center">
                                <div class="media-body">
                                    <p class="mb-1 fs-15 "></p>
                                    <h3 class="mb-0 font-w600 fs-22"> Proposal Type List </h3>
                                </div>
                            </div>
                           <a href="{{ url('addEnquiryType') }}"> <button style="padding: 10px 16px;
                            float: right;" class="btn btn-rounded btn-success "><span
                                class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Add</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Proposal Type</th>
                                        <th>Status</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Details as $index=>$obj)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td style=font:14px;>{{$obj->name}}</td>
                                        <td> @if($obj->status == 'Active')
                                            <p ><label class="badge badge-success light">Active</label></p>
                                        @else

                                            <p ><label class="badge badge-danger light">De-Active </label></p>
                                        @endif

                                        </td>
                                        <td>
                                                <a href="{{ url('editEnquiryType',$obj->id) }}"> <button type="button" class="btn btn-outline-success">Edit</button></a>
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ url('deleteEnquiryType',$obj ->id) }}"><button type="button" class="btn btn-outline-danger">Delete</button></a>
                                        </td>
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
