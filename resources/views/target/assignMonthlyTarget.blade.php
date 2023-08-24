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
            <div class="col-lg-12" >
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Target Assign</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('storeMonthlyTarget') }}" method="POST">
                            @csrf
                            <div class="col-xl-12 col-lg-8" style="margin-right: 0px; margin-left:0px;">
                                <div class="card m-0 ">
                                    <div class="card-body py-3 py-md-2">
                                        <div class="d-sm-flex  d-block align-items-center">
                                            <div class="d-flex mb-sm-0 mb-3 me-auto align-items-center">
                                                <div class="media-body">
                                                    <p class="mb-1 fs-12 "></p>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="mb-0 font-w600 fs-10">Select Target Type </h5>
                                                        </div>
                                                        <div class="col-6" >
                                                            <select style="border: 2px solid rgb(37, 36, 36);" name="target_type" class="form-control " id="targetTypeSelect" required onchange="getTable(this.value)" required>
                                                                <option value=""><h5>Select Target Type</h5></option>
                                                                <option value="4">Recruitment</option>
                                                               <option value="5">Temp</option>
                                                               <option value="6">Fms</option>
                                                               <option value="7">Payroll</option>
                                                            </select>
                                                            @error('target_type')
                                                            <p style="color: #fff" >{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="recivedTable" class="table-container" >

                            </div>

                            {{--  <div id="tempTable" class="table-container" >

                            </div>

                            <div id="fmsTable" class="table-container" >

                            </div>

                            <div id="payrollTable" class="table-container">

                            </div>  --}}


                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Assign Team Target
                            </button>

                        </form>
                    </div>
                </div>
            </div>

            {{--  <div class="col-lg-12" >
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Target Assign</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('storeMonthlyTarget') }}" method="POST">
                            @csrf
                            <div class="col-xl-12 col-lg-8" style="margin-right: 0px; margin-left:0px;">
                                <div class="card m-0 ">
                                    <div class="card-body py-3 py-md-2">
                                        <div class="d-sm-flex  d-block align-items-center">
                                            <div class="d-flex mb-sm-0 mb-3 me-auto align-items-center">
                                                <div class="media-body">
                                                    <p class="mb-1 fs-12 "></p>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="mb-0 font-w600 fs-10">Select Target Type </h5>
                                                        </div>
                                                        <div class="col-6" >
                                                            <select style="border: 2px solid rgb(37, 36, 36);" name="target_type" class="form-control " id="targetTypeSelect" required>
                                                                <option value=""><h5>Select Target Type</h5></option>
                                                                @php
                                                                $targetType = \App\Models\EnquiryType::where(['status'=>'Active'])
                                                                ->get()
                                                                @endphp
                                                                @foreach($targetType as $targetTypes)
                                                                <option value="{{$targetTypes->id}}">{{$targetTypes->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('target_type')
                                                            <p style="color: #fff" >{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">

                            </div>


                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Assign Team Target
                                  </button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12" >
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Target Assign</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('storeMonthlyTarget') }}" method="POST">
                            @csrf
                            <div class="col-xl-12 col-lg-8" style="margin-right: 0px; margin-left:0px;">
                                <div class="card m-0 ">
                                    <div class="card-body py-3 py-md-2">
                                        <div class="d-sm-flex  d-block align-items-center">
                                            <div class="d-flex mb-sm-0 mb-3 me-auto align-items-center">
                                                <div class="media-body">
                                                    <p class="mb-1 fs-12 "></p>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="mb-0 font-w600 fs-10">Select Target Type </h5>
                                                        </div>
                                                        <div class="col-6" >
                                                            <select style="border: 2px solid rgb(37, 36, 36);" name="target_type" class="form-control " id="targetTypeSelect" required>
                                                                <option value=""><h5>Select Target Type</h5></option>
                                                                @php
                                                                $targetType = \App\Models\EnquiryType::where(['status'=>'Active'])
                                                                ->get()
                                                                @endphp
                                                                @foreach($targetType as $targetTypes)
                                                                <option value="{{$targetTypes->id}}">{{$targetTypes->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('target_type')
                                                            <p style="color: #fff" >{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">

                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Assign Team Target
                                  </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12" >
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Target Assign</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('storeMonthlyTarget') }}" method="POST">
                            @csrf
                            <div class="col-xl-12 col-lg-8" style="margin-right: 0px; margin-left:0px;">
                                <div class="card m-0 ">
                                    <div class="card-body py-3 py-md-2">
                                        <div class="d-sm-flex  d-block align-items-center">
                                            <div class="d-flex mb-sm-0 mb-3 me-auto align-items-center">
                                                <div class="media-body">
                                                    <p class="mb-1 fs-12 "></p>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="mb-0 font-w600 fs-10">Select Target Type </h5>
                                                        </div>
                                                        <div class="col-6" >
                                                            <select style="border: 2px solid rgb(37, 36, 36);" name="target_type" class="form-control " id="targetTypeSelect" required>
                                                                <option value=""><h5>Select Target Type</h5></option>
                                                                @php
                                                                $targetType = \App\Models\EnquiryType::where(['status'=>'Active'])
                                                                ->get()
                                                                @endphp
                                                                @foreach($targetType as $targetTypes)
                                                                <option value="{{$targetTypes->id}}">{{$targetTypes->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('target_type')
                                                            <p style="color: #fff" >{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">

                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Assign Team Target
                                  </button>
                        </form>
                    </div>
                </div>
            </div>  --}}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function handleTargetTypeChange() {
            const targetTypeSelect = document.getElementById('targetTypeSelect');
            const selectedValue = targetTypeSelect.value;

            // Hide all table containers
            const tableContainers = document.querySelectorAll('.table-container');
            tableContainers.forEach(container => {
                container.style.display = 'none';
            });

            // Show the selected table container
            if (selectedValue === '4') {
                document.getElementById('recruitmentTable').style.display = 'block';
            } else if (selectedValue === '5') {
                document.getElementById('tempTable').style.display = 'block';
            } else if (selectedValue === '6') {
                document.getElementById('fmsTable').style.display = 'block';
            } else if (selectedValue === '7') {
                document.getElementById('payrollTable').style.display = 'block';
            }
        }
    </script>
    <script>
        function validateForm() {
            const inputs = document.querySelectorAll('input[name^="user["]'); // Assuming your input names are like user[XX]
            for (const input of inputs) {
                const value = parseInt(input.value);
                if (isNaN(value) || value < 0 || value > 50) {
                    alert('Invalid input value. Please enter a number between 0 and 50.');
                    return false; // Prevent form submission
                }
            }
            return true; // Allow form submission
        }

        function getTable(e) {
            console.log(e);
            var currentUrl = window.location.href;
            var parts = currentUrl.split("/");
            var lastPart = parts[parts.length - 1];
              $.get("{{ url('get-table') }}" + '/' + lastPart, {
                table_id:e,
            }, function(response) {
                console.log(response);
                $('#recivedTable').empty();
                $('#recivedTable').html(response);
            });
            }

    </script>

@endsection
