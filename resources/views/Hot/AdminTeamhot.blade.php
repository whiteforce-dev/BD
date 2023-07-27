
@extends('Master.master')
@section('title', 'HotList')
@section('content')
<style>
   th{
    color: #ffffff !important;
   }
</style>

<div class="col-lg-12 grid-margin stretch-card" style="    margin-top: 20px;">
        <div class="card">
            <div class="card-body">
                    <div class="card-header text-white border-0 ch1" >
                        <div>
                            <h3 class="mb-0"><i class="mdi mdi-graphql menu-icon"></i> Manager Hot Report</h3>
                            <hr>
                        </div>

                    </div>
                <br>

                <div class="table-responsive">
                    <table class="table table-striped table-hover" data-aos="fade-right">
                        <thead>
                        <tr style="background-color:#57a0f4;">

                            <th style="padding-left:40px;" >S.no</th>
                            <th style="padding-left:40px;">Image</th>
                            <th >Name</th>


                            <th >Hot Call </th>



                        </tr>
                        </thead>

                        @php
                        $enquiry = \App\Models\Enquiry::select('created_by')->distinct()->get();
                        $status = \App\Models\Followup_remark::get();
                        $user = \App\Models\User::where(['type'=>5,'is_active'=>1])->get();
                        $month = date('n');
                       @endphp



                        <tbody>

                        <tr>

                        @foreach($user as $obj=> $users)

                             {{-- @dd($users); --}}
                                <td style="padding-left:45px;">{{$obj+1}}</td>
                                @if($users->image)
                                    <td><img src="{{  url($users->image)}}" height="100px" width="100px"> </td>

                                @else
                                    <th><img class="img-lg" src="{!! url('/AdminEndAsstes/images/usericon.png')!!}"  alt="" ></th>

                                @endif
                                <td><a href="javascript:" onclick="addEdit('{{url('ViewUseradmin'.'/'.$users->id)}}')">{{$users->name}}</a></td>


                                  <td style="padding-left:40px;"><a href="{{url('hotenquiry'.'/'.$users->id)}}"><label class="badge badge-danger">{{\App\Models\Enquiry::where('created_by',$users->id)->where('status_id','=','10')->count()}}</label></a></td>

                                   {{-- <td align="center"><a href="{{url('monthenquiry'.'/'.$users->id)}}"><label class="badge badge-success">{{\App\Models\Enquiry::where('created_by',$users->id)->whereMonth('created_at', Carbon\Carbon::now()->month)->whereYear('created_at',Carbon\Carbon::now()->year)->count()}}</label></a></td>

                                <td align="center"><a href="{{url('baenquiry'.'/'.$users->id)}}"><label class="badge badge-warning">{{\App\Models\Enquiry::where('created_by',$users->id)->where(['status_id'=>15,'enquiry_type_id'=>4])->whereMonth('break_date', Carbon\Carbon::now()->month)->whereYear('created_at',Carbon\Carbon::now()->year)->count()}}</label></a></td>

                                        <td align="center"><a href="{{url('tsenquiry'.'/'.$users->id)}}"><label class="badge badge-info">{{\App\Models\Enquiry::where('created_by',$users->id)->where(['status_id'=>15,'enquiry_type_id'=>5])->whereMonth('break_date', Carbon\Carbon::now()->month)->whereYear('created_at',Carbon\Carbon::now()->year)->count()}}</label></a></td>
                                @if ($month <= 3);

                                <td align="center"><label class="badge badge-dark"> {{\App\Enquiry::where('created_by',$users->id)->where('status_id','=','15')->whereBetween('break_date',array(date('Y-01-01'),date('Y-03-31')))->count()}}</label></td>
                                @elseif($month <= 6);
                                <td align="center"><label class="badge badge-dark">  {{\App\Enquiry::where('created_by',$users->id)->where('status_id','=','15')->whereBetween('break_date',array(date('Y-04-01'),date('Y-06-30')))->count()}}</label></td>
                                @elseif($month <= 9)
                                    <td align="center"><label class="badge badge-dark"> {{\App\Enquiry::where('created_by',$users->id)->where('status_id','=','15')->whereBetween('break_date',array(date('Y-07-01'),date('Y-09-30')))->count()}}</label></td>
                                @else
                                    <td align="center"><label class="badge badge-dark"> {{ \App\Models\Enquiry::where('created_by',$users->id)->where('status_id','=','15')->whereBetween('break_date',array(date('Y-10-01'),date('Y-12-31')))->count()}}</label></td>
                                @endif
                               <td align="center"><a href="{{url('todayenquiry'.'/'.$users->id)}}"><label class="badge badge-primary">{{\App\Models\Enquiry::where('created_by',$users->id)->whereRaw('Date(created_at) = CURDATE()')->count()}}</label></a></td>
                            </tr> --}}

                        @endforeach


                        </tbody>




                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
