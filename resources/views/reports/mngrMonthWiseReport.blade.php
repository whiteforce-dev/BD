@extends('Master.master')

@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row " style="margin-right: 0px;
        margin-left: 0px;">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card mb-4">
                    <div class="card-body">
                        <div style="width:100%" class="d-flex justify-content-between align-items-center" >
                            <h5 class="mb-0">Month Wise Report</h5>
                            <select name="monthyear" onchange="monthReport();" id="monthyear" style="    font-size: 15px;
                            padding: 3px 7px;
                            border-radius: 4px; margin-right:15px;">
                                @php
                                $currentyear = \Carbon\Carbon::now()->format('Y');
                                @endphp
                                @for($i=2020;$i<=$currentyear;$i++) <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                    </div>

                </div>


            </div>


        </div>
        <div  id="monthReport" style="overflow: auto">

        </div>
    </div>
</div>


<script>
     monthReport1();
    function monthReport() {
    $('#monthReport').html('<div class="row"><div class="col-sm-3"><div class="linear-background"></div></div><div class="col-sm-3"><div class="linear-background"></div></div><div class="col-sm-3"><div class="linear-background"></div></div><div class="col-sm-3"><div class="linear-background"></div></div></div><p></p><div class="linear-background"></div><p></p><div class="linear-background"></div><p></p><div class="linear-background"></div><p></p><div class="linear-background"></div>');
            var year = $('#monthyear').val();

   $.post("{{ url('monthReport') }}",{year:year, _token: '{{csrf_token()}}'},function(data){
             $('#monthReport').html(data);
   });
    }
</script>

@endsection
