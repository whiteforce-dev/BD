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
                                    <h3 class="mb-0 font-w600 fs-22"> Template List </h3>
                                </div>
                            </div>
                           <a href="{{ url('addEmailTemplate') }}"> <button style="padding: 10px 16px;
                            float: right;" class="btn btn-rounded btn-info"><span
                                class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Add</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border" style="min-width: 500px;">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Created-by</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mails as $key=>$mail)
                                        <tr class="table-active">
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $mail->name }}</td>
                                            <td>{{  Auth::user()->name }}</td>
                                            <td>
                                                <a href="{{ url('editTemplate',$mail->id) }}"> <button type="button" class="btn btn-outline-success">Edit</button></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ url('deleteTemplate',$mail->id) }}"><button type="button" class="btn btn-outline-danger">Delete</button></a>
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
