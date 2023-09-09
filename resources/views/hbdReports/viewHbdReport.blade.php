@extends('Master.master')
@section('title', 'Enquiries')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="container mt-5"
            style="padding-left: 0px !important;
            /* width: 0px; */
            padding-right: 0px !important;">
            <div class="row justify-content-center">
                <div class="col-md-12"style="margin-top: -50px">
                    <div class="card" style="    height: 82px;">
                        <div class="card-body">
                            <!-- Search Form -->
                            <form id="searchingForm" action="{{ url('searchHbd') }}" method="get">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <select name="days" id="days" class="form-control">
                                            <option value="0">Today</option>
                                            <option value="7">07 Days</option>
                                            <option value="15">15 Days</option>
                                            <option value="30" >30 Days</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
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

                                    <div class="col-md-4" style="margin-top: -5px;">
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
       <div id="searchResults">
        @include('hbdReports.hbdReportBySearch')
       </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#searchingForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                type: 'GET',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    $('#searchResults').html(response);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
