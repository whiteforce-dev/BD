    <div class="row"style="margin-bottom: 20px">
        <div class="col-lg-12">
            <div class="table-responsive rounded">
                <table id="example5" class="table customer-table display mb-4 fs-14 card-table">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>NAME</th>
                            <th>COMPANY NAME</th>
                            <th>DESIGNATION</th>
                            <th>STATUS</th>
                            <th>BIRTHDAY DATE</th>
                            <th>REMAINING DAYS</th>
                        </tr>
                    </thead>
                    <tbody id="hr_birthday">
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
                            <tr >
                                <td>{{ $index +1 }}</td>
                                <td>{{ $obj->contact_person }}</td>
                                <td>{{ isset($obj->company_name) ? $obj->company_name : 'N/A' }}</td>
                                <td>{{ $obj?->desig }}</td>

                                    <?php
                                            $rowStatus = $obj->GetStatus->remark ?? '-';
                                        ?>

                                        @if (isset($obj->GetStatus->remark))
                                            @if ($rowStatus == 'Hot')
                                                <td><label class="badge badge-danger">Hot</label></td>
                                            @elseif($rowStatus == 'Cold')
                                                <td><label class="badge badge-info">Cold</label></td>
                                            @elseif($rowStatus == 'Process')
                                                <td><label class="badge badge-primary">Process</label></td>
                                            @elseif($rowStatus == 'Break')
                                                <td><label class="badge badge-success">Break</label></td>
                                            @elseif($rowStatus == 'Hold')
                                                <td><label class="badge badge-warning">Hold </label></td>
                                            @elseif($rowStatus == 'Positive')
                                                <td><label class="badge badge-info">Positive </label></td>
                                            @endif
                                        @else
                                            <td>-</td>
                                        @endif

                                        <td> @if ($obj->dob != '')
                                            {{\Carbon\Carbon::parse($obj->dob)->format('d-M')}}
                                            @else
                                                N/A
                                            @endif
                                        </td>

                                        <?php
                                        $year = date('Y');
                                        $birth = \Carbon\carbon::parse($obj->created_at)->format('Y-m-d');
                                        $today = \Carbon\carbon::now()->format('d-m');
                                        $date1 = date_create($today . '-' . $year);
                                        $date2 = date_create($birth . '-' . $year);
                                        $diff = date_diff($date1, $date2);
                                        $diffrence_one = $diff->format('%a');
                                        ?>
                                        <td class="text-secondary font-w500" style="align-items: center;">{{ $diffrence == 0 ? 'Today' : $diffrence }}
                                        </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
