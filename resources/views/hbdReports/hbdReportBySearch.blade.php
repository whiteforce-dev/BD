<div class="col-lg-12">
    <div class="card">
        <div class="card-header">

            <i class="fa-solid fa-cake-candles" style="color: #3269c8; font-size:1.1rem;"></i>
            <h2 class="card-title" style= "font-size: 1.01rem;
            font-weight: 500;
            margin-right: 896px;">Happy Birthday Report</h4>
        </div>
            <div class="table-responsive">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            <th style="width:80px;"><p>S.No</p></th>
                            <th><p>Name</p></th>
                            <th><p>Company</p></th>
                            <th><p>Designation</p></th>
                            <th><p>Status</p></th>
                            <th><p>Email</p></th>
                            <th><p>Contact Number</p></th>
                            <th><p>Birthday</p></th>
                            <th><p>Remaining days</p></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Details as $index => $obj)
                            @php
                                // $year = date('Y');
                                $year = date('Y-');
                                $birth = \Carbon\carbon::parse($obj->dob)->format('m-d');
                                $today = \Carbon\carbon::now()->format('Y-m-d');

                                $date1=date_create($today);
                                $date2=date_create($year.$birth);

                                $diff=date_diff($date1,$date2);
                                $diffrence = $diff->format("%a days Left");
                                $diffrence_one = $diff->format("%a");

                            @endphp
                            <tr>
                                <td><p>{{$index + 1 + ($Details->perPage() * ($Details->currentPage() - 1)) }}</p></td>
                                <td>{{ $obj->contact_person }}</td>
                                <td><p style="width: 176px !important; word-break: break-word;">
                                    {{ $obj->company_name }} <br> <small>Created By - <b>{{ $obj->GetCreatedby->name ?? '-' }}</b></small></p></td>
                                <td>{{ $obj->desig }}</td>

                                    <span>
                                                @if($obj->status_id== 15)
                                                    <td><span class="badge light badge-success">Break</span></td>
                                                    @elseif($obj->status_id==6)
                                                    <td ><span class="badge light badge-warning">Process</span></td>
                                                    @elseif($obj->status_id==10)
                                                    <td ><span class="badge light badge-info">Hot</span></td>
                                                    @elseif($obj->status_id==11)
                                                    <td><span class="badge light badge-danger">Cold</span></td>
                                                    @elseif($obj->status_id==16)
                                                    <td ><span class="badge light badge-info">Hold</span></td>
                                                    @elseif($obj->status_id==17)
                                                    <td ><span class="badge light badge-warning">Positive</span></td>
                                                    @elseif($obj->status_id==null)
                                                    <td>-</td>
                                                @endif
                                  </span>
                                  <td>{{ $obj->email}}</td>
                                  <td>{{ $obj->contact}}</td>
                                <td>
                                    @if($obj->dob != '')
                                      {{\Carbon\Carbon::parse($obj->dob)->format('d-M')}}
                                    @endif
                                </td>
                                <td>
                                    <span class="badge light badge-info"> {{ $diffrence == 0 ? 'Today' : $diffrence }}</span>
                                </td>
                            </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
            {{--  {{ $Details->appends(request()->except('page'))->links('pagination::bootstrap-4') }}  --}}
    </div>
</div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{--  <script>
            $(document).ready(function () {
                // Handle form submission
                $('#searchingForm').submit(function (event) {
                    event.preventDefault(); // Prevent default form submission

                    var formData = $(this).serialize(); // Serialize form data
                    var url = $(this).attr('action'); // Get form action URL

                    // Make AJAX request to fetch search results
                    $.ajax({
                        url: url,
                        method: "GET",
                        data: formData,
                        success: function (response) {
                            // Update the container with new search results
                            $('#searchResultsContainer').html(response);
                        },
                        error: function (error) {
                            console.error("Error fetching search results:", error);
                        }
                    });
                });
            });
        </script>  --}}

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script type="text/javascript">
            document.getElementById("#empbdy").click();
            </script>

        <script>
                        hrbirthdays();
                pendingbirthdays();
                    function hrbirthdays() {
                var token = '{{ Session::token() }}';
                var days = $('#days').val();
            var status = $('#status').val();

                var url = '{{ url('searchHbd') }}';
            $.ajax({
                url : url,
                type : 'Post',
                data :{
                    days:days,
                    status:status,
                    _token : token
                },
                success : function(response){
                    console.log(response)
                $('#hr_birthday').html(response)
                }
            })
                }
       </script>
