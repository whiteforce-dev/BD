@extends('Master.master')
@section('title', 'Add Enquiry')
@section('content')

<div class="content-body">
    <div class="container-fluid">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Team Member Report</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                    <th style="vertical-align: top; font-size: 0.9rem;">S.no</th>
                                    <th style="vertical-align: top; font-size: 0.9rem;" >Image</th>
                                    <th style="vertical-align: top; font-size: 0.9rem;" >Name</th>
                                    <th style="vertical-align: top; font-size: 0.9rem;" >Hot Call </th>
                                    <th style="vertical-align: top; font-size: 0.9rem;" >MTD</th>
                                    <th style="vertical-align: top; font-size: 0.9rem;"> Recruitment<br>Achieved </th>
                                    <th style="vertical-align: top; font-size: 0.9rem;">Temp Staffing <br>Achieved </th>
                                    <th style="vertical-align: top; font-size: 0.9rem;"> FMS <br>Achieved </th>
                                    <th style="vertical-align: top; font-size: 0.9rem;">Payroll <br>Achieved </th>
                                    <th style="vertical-align: top; font-size: 0.9rem;" >Quarter <br>Achieved</th>
                                    <th style="vertical-align: top; font-size: 0.9rem;">Today (10)</th>

                                    </tr>
                                </thead>
                                @php
                                  $status = \App\Models\Followup_remark::get();
                                  $user = \App\Models\User::where('created_by',$Details->id)->where('is_active',1)->get();
                                   $month = date('n');

                                     $from = Carbon\Carbon::parse(date('Y-m-01'))->format('Y-m-01');
                                     $from= $from.' 00:00:00';
                                     $to = Carbon\Carbon::parse(Carbon\Carbon::now())->format('Y-m-t');
                                     $to= $to.' 23:59:59';
                                   @endphp

                                <tfoot>
                                    <th>Total</th>
                                    <th>0</th>
                                    <th>0</th>

                                    <th><label class="badge badge-dark">{{\App\Models\Enquiry::where('user_id',Auth::user()->id)->where('status_id','=','10')->count()}}</label></th>

                                    <th><label class="badge badge-dark">{{\App\Models\Enquiry::where('user_id',Auth::user()->id)->whereBetween('created_at',array(date('Y-m-01'),date('Y-m-t')))->count()}}</label></th>

                                    <th><label class="badge badge-dark">{{\App\Models\Enquiry::where('user_id',Auth::user()->id)->where(['status_id'=>15,'enquiry_type_id'=>4])->whereBetween('updated_at',array($from,$to))->count()}}</label></th>

                                    <th><label class="badge badge-dark">{{\App\Models\Enquiry::where('user_id',Auth::user()->id)->where(['status_id'=>15,'enquiry_type_id'=>5])->whereBetween('updated_at',array($from,$to))->count()}}</label></th>

                                    <th><label class="badge badge-dark">{{\App\Models\Enquiry::where('user_id',Auth::user()->id)->where(['status_id'=>15,'enquiry_type_id'=>6])->whereBetween('updated_at',array($from,$to))->count()}}</label></th>

                                    <th><label class="badge badge-dark">{{\App\Models\Enquiry::where('user_id',Auth::user()->id)->where(['status_id'=>15,'enquiry_type_id'=>7])->whereBetween('updated_at',array($from,$to))->count()}}</label></th>
                                    @if ($month <= 3);

                                    <td><label class="badge badge-dark"> {{\App\Models\Enquiry::where('user_id',Auth::user()->id)->where('status_id','=','15')->whereBetween('updated_at',array(date('Y-01-01'),date('Y-03-31')))->count()}}</label></td>
                                    @elseif($month <= 6);
                                    <td><label class="badge badge-dark">  {{\App\Models\Enquiry::where('user_id',Auth::user()->id)->where('status_id','=','15')->whereBetween('updated_at',array(date('Y-04-01'),date('Y-06-30')))->count()}}</label></td>
                                    @elseif($month <= 9)
                                        <td><label class="badge badge-dark"> {{\App\Models\Enquiry::where('user_id',Auth::user()->id)->where('status_id','=','15')->whereBetween('updated_at',array(date('Y-07-01'),date('Y-09-30')))->count()}}</label></td>
                                    @else
                                        <td><label class="badge badge-dark"> {{ \App\Models\Enquiry::where('user_id',Auth::user()->id)->where('status_id','=','15')->whereBetween('updated_at',array(date('Y-10-01'),date('Y-12-31')))->count()}}</label></td>
                                    @endif
                                    <th><label class="badge badge-dark">{{\App\Models\Enquiry::where('user_id',Auth::user()->id)->whereRaw('Date(created_at) = CURDATE()')->count()}}</label></th>
                                </tfoot>

                                <tbody>
                                    @foreach($user as $obj=> $users)


                                        <tr>
                                            <td>{{$obj+1}}</td>
                                            @if($users->image)
                                                <td><img src="{{ url($users->image) }}" class="rounded-lg me-2" width="24" style="    width: 50px; height:50px;
                                                    " alt=""/></td>

                                            @else
                                                <th><img class="img-lg" src="{!! url('/AdminEndAsstes/images/usericon.png')!!}"  alt="" height="50" width="50"></th>

                                            @endif
                                            <td style="font-size: 0.9rem;"><a href="{{url('totalEnquiries'.'/'.$users->id)}}">{{ucwords($users->name)}}</a></td>


                                            <td><a href="{{url('getTeamHot'.'/'.$users->id)}}"><label class="badge badge-danger light">{{\App\Models\Enquiry::where('created_by',$users->id)->where('status_id','=','10')->count()}}</label></a></td>

                                            <td><a href="{{url('monthTillDate'.'/'.$users->id)}}"><label class="badge badge-success light">{{\App\Models\Enquiry::where('created_by',$users->id)->whereMonth('created_at', Carbon\Carbon::now()->month)->whereYear('created_at',Carbon\Carbon::now()->year)->count()}}</label></a></td>

                                            <td><a href="{{url('recAchieved'.'/'.$users->id)}}"><label class="badge badge-warning  light">{{\App\Models\Enquiry::where('created_by',$users->id)->where(['status_id'=>15,'enquiry_type_id'=>4])->whereMonth('break_date', Carbon\Carbon::now()->month)->whereYear('created_at',Carbon\Carbon::now()->year)->count()}}</label></a></td>

                                            <td><a href="{{url('tempAchieved'.'/'.$users->id)}}"><label class="badge badge-info light">{{\App\Models\Enquiry::where('created_by',$users->id)->where(['status_id'=>15,'enquiry_type_id'=>5])->whereMonth('break_date', Carbon\Carbon::now()->month)->whereYear('created_at',Carbon\Carbon::now()->year)->count()}}</label></a></td>
                                            <td><a href="{{url('fmsAchieved'.'/'.$users->id)}}"><label class="badge badge-warning  light">{{\App\Models\Enquiry::where('created_by',$users->id)->where(['status_id'=>15,'enquiry_type_id'=>6])->whereMonth('break_date', Carbon\Carbon::now()->month)->whereYear('created_at',Carbon\Carbon::now()->year)->count()}}</label></a></td>
                                            <td><a href="{{url('payAchieved'.'/'.$users->id)}}"><label class="badge badge-info  light">{{\App\Models\Enquiry::where('created_by',$users->id)->where(['status_id'=>15,'enquiry_type_id'=>7])->whereMonth('break_date', Carbon\Carbon::now()->month)->whereYear('created_at',Carbon\Carbon::now()->year)->count()}}</label></a></td>

                                            @if ($month <= 3);

                                            <td><label class="badge badge-dark  light"> {{\App\Models\Enquiry::where('created_by',$users->id)->where('status_id','=','15')->whereBetween('break_date',array(date('Y-01-01'),date('Y-03-31')))->count()}}</label></td>
                                            @elseif($month <= 6);
                                            <td><label class="badge badge-dark light">  {{\App\Models\Enquiry::where('created_by',$users->id)->where('status_id','=','15')->whereBetween('break_date',array(date('Y-04-01'),date('Y-06-30')))->count()}}</label></td>
                                            @elseif($month <= 9)
                                                <td><label class="badge badge-dark light"> {{\App\Models\Enquiry::where('created_by',$users->id)->where('status_id','=','15')->whereBetween('break_date',array(date('Y-07-01'),date('Y-09-30')))->count()}}</label></td>
                                            @else
                                                <td><label class="badge badge-dark light"> {{ \App\Models\Enquiry::where('created_by',$users->id)->where('status_id','=','15')->whereBetween('break_date',array(date('Y-10-01'),date('Y-12-31')))->count()}}</label></td>
                                            @endif
                                            <td><a href="{{url('todayEnquiry'.'/'.$users->id)}}"><label class="badge badge-primary light">{{\App\Models\Enquiry::where('created_by',$users->id)->whereRaw('Date(created_at) = CURDATE()')->count()}}</label></a></td>
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
