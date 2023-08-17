
@extends('Master.master')
@section('title', 'Enquiries')
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="col-xl-12">
                <div class="tab-content">
                    <div id="navpills-1" class="tab-pane fade show active">
                        <div class="table-responsive rounded table-hover fs-14">
                            <table class="table mb-4 dataTablesCard card-table p-0  review-table fs-14" id="example6">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check checkbox-secondary">
                                              <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                              <label class="form-check-label" for="checkAll">
                                              </label>
                                            </div>
                                        </th>
                                       
                                        <th style="width:250px;">Holiday Name</th>
                                        <th class="d-none d-lg-table-cell">Holiday Date</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check checkbox-secondary">
                                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                                              <label class="form-check-label" for="flexCheckDefault1">
                                              </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media align-items-center tbl-img">
                                                <img class="img-fluid  me-3 d-none d-xl-inline-block" width="70" src="images/avatar/1.jpg" alt="DexignZone">
                                                <div class="media-body">
                                                    <h4 class="font-w600 mb-1 ">Cindy Hawkins</h4>
                                                    <span>Sunday, 24 July 2020 04:55 PM</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="d-none d-lg-table-cell">The Story of Danau Toba (Musical Drama)</td>
                                        <td>
                                            <span class="star-review d-inline-block mb-2 fs-16">
                                                <i class="fa fa-star fs-16 text-orange"></i>
                                                <i class="fa fa-star fs-16 text-orange"></i>
                                                <i class="fa fa-star fs-16 text-orange"></i>
                                                <i class="fa fa-star fs-16 text-orange"></i>
                                                <i class="fa fa-star fs-16 text-gray"></i>
                                            </span>
                                            <p class="mb-0 d-none d-xl-inline-block">I've used Karciz for almost ten years. From small general admission church shows to complete turn key ticketing services at Jakarta. I use them for marketing and ticketing on every show. No questions.</p>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="javascript:void(0);" class="btn btn-secondary btn-rounded text-white btn-sm px-4">Publish</a>
                                                <a href="javascript:void(0);" class="btn btn-outline-danger btn-rounded btn-sm ms-2 px-4">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

