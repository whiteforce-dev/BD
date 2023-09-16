
@extends('Master.master')
@section('title', 'Add Enquiry')

@section('content')
{{--  <style>
   th{
    color: #ffffff !important;
   }
</style>  --}}
<div class="content-body">
    <div class="container-fluid">
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
                                    <th style="vertical-align: top; font-size: 0.9rem;" >S.no</th>
                                    <th style="vertical-align: top; font-size: 0.9rem;" >Image</th>
                                    <th style="vertical-align: top; font-size: 0.9rem;" >Name</th>
                                    <th style="vertical-align: top; font-size: 0.9rem;" >Hot Call </th>
                                    <th style="vertical-align: top; font-size: 0.9rem;"> MTD </th>
                                    <th style="vertical-align: top; font-size: 0.9rem;">  Recuriment <br> Achieved </th>
                                    <th style="vertical-align: top; font-size: 0.9rem;"> Temp <br> Achieved </th>
                                    <th style="vertical-align: top; font-size: 0.9rem;"> Quarter <br>Achieved</th>
                                    <th style="vertical-align: top; font-size: 0.9rem;" >Today (10)</th>
                                </tr>
                            </thead>
                            @php
                            $enquiry = \App\Models\Enquiry::select('created_by')->distinct()->get();
                            $status = \App\Models\Followup_remark::get();
                            $user = \App\Models\User::where(['type'=>'Manager','is_active'=>1])->get();
                            $month = date('n');
                           @endphp
                            <tbody>
                                @foreach($user as $obj=> $users)

                                {{-- @dd($users); --}}
                                   <td align="center">{{$obj+1}}</td>
                                   <td><div class="d-flex align-items-center"><img src="{{ $users->image }}" class="rounded-lg me-2" width="24" style="    width: 60px; height:60px;
                                    " alt=""/></div></td>
                                   <td style="font-size: 0.9rem;"><a href="{{url('getMnagerTeam'.'/'.$users->id)}}">{{ucwords($users->name)}}</a></td>


                                     <td align="center"><a href="{{url('getTeamHot'.'/'.$users->id)}}"><label class="badge badge-danger light">{{\App\Models\Enquiry::where('created_by',$users->id)->where('status_id','=','10')->count()}}</label></a></td>

                                      <td align="center"><a href="{{url('monthTillDate'.'/'.$users->id)}}"><label class="badge badge-success light">{{\App\Models\Enquiry::where('created_by',$users->id)->whereMonth('created_at', Carbon\Carbon::now()->month)->whereYear('created_at',Carbon\Carbon::now()->year)->count()}}</label></a></td>

                                   <td align="center"><a href="{{url('recAchieved'.'/'.$users->id)}}"><label class="badge badge-warning light">{{\App\Models\Enquiry::where('created_by',$users->id)->where(['status_id'=>15,'enquiry_type_id'=>4])->whereMonth('break_date', Carbon\Carbon::now()->month)->whereYear('created_at',Carbon\Carbon::now()->year)->count()}}</label></a></td>

                                           <td align="center"><a href="{{url('tempAchieved'.'/'.$users->id)}}"><label class="badge badge-info light">{{\App\Models\Enquiry::where('created_by',$users->id)->where(['status_id'=>15,'enquiry_type_id'=>5])->whereMonth('break_date', Carbon\Carbon::now()->month)->whereYear('created_at',Carbon\Carbon::now()->year)->count()}}</label></a></td>
                                   @if ($month <= 3);

                                   <td align="center"><label class="badge badge-dark light"> {{\App\Models\Enquiry::where('created_by',$users->id)->where('status_id','=','15')->whereBetween('break_date',array(date('Y-01-01'),date('Y-03-31')))->count()}}</label></td>
                                   @elseif($month <= 6);
                                   <td align="center"><label class="badge badge-dark light">  {{\App\Models\Enquiry::where('created_by',$users->id)->where('status_id','=','15')->whereBetween('break_date',array(date('Y-04-01'),date('Y-06-30')))->count()}}</label></td>
                                   @elseif($month <= 9)
                                       <td align="center"><label class="badge badge-dark light"> {{\App\Models\Enquiry::where('created_by',$users->id)->where('status_id','=','15')->whereBetween('break_date',array(date('Y-07-01'),date('Y-09-30')))->count()}}</label></td>
                                   @else
                                       <td align="center"><label class="badge badge-dark light"> {{ \App\Models\Enquiry::where('created_by',$users->id)->where('status_id','=','15')->whereBetween('break_date',array(date('Y-10-01'),date('Y-12-31')))->count()}}</label></td>
                                   @endif
                                  <td align="center"><a href="{{url('todayenquiry'.'/'.$users->id)}}"><label class="badge badge-primary light">{{\App\Models\Enquiry::where('created_by',$users->id)->whereRaw('Date(created_at) = CURDATE()')->count()}}</label></a></td>
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
