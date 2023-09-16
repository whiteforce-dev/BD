<style>
    thead, tbody, tfoot, tr, td, th {
        border-style: none;
   }
</style>
<div class="col-lg-12">
        {{--  $filteredUsers = \App\Models\User::where(['created_by' => 6, 'type' => 'Manager'])
            ->orWhere('is_active', 1)
            ->orWhere('id', 'NOT IN', 1)
            ->get();  --}}

    @php
        $enquiry = \App\Models\Enquiry::select('created_by')
            ->distinct()
            ->get();
        $status = \App\Models\Followup_remark::get();

        $month = date('n');
    @endphp
    @php
        $fromnew = \Carbon\Carbon::parse($Date)->format('Y-m-d');
        $tonew = \Carbon\Carbon::parse($Date)->addDays(6)->format('Y-m-d');
    @endphp

    @foreach ($filteredUsers as $key => $user)
        @if (Auth::user()->type == 'Admin' || Auth::user()->type == 'Manager')
                <div class="card-header" style="border: 1px solid #d1e0e2;">
                    <div class="d-flex align-items-center" align="center">
                        <img style="width: 57px;
                        height: 57px;
                        padding: 2px;" src="{{ url($user->image) }}" class="rounded-lg me-2" width="24" alt=""/>
                        <h5 style="font-family: system-ui; padding-left: 13px; font-size: 1.2rem;" class="w-space-no">{{ ucwords($user->name) }}</h5>
                    </div>
                </div>
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-responsive-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Target Type</th>
                                    @for ($i = 0; $i < 7; $i++)
                                        <th>
                                            {{ \Carbon\Carbon::parse($fromnew)->addDays($i)->format('d M') }}
                                        </th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @php
                                        $i = 0;
                                    @endphp
                                    <td>
                                        PAYROLL
                                        <hr style="height: 0.0px !important;">TEMP
                                        <hr style="height: 0.0px !important;">FMS
                                        <hr style="height: 0.0px !important;">RECRUITMENT
                                        <hr style="height: 0.0px !important;">TOTAL
                                    </td>
                                    @for ($i = $diff; $i >= 0; $i--)
                                        @php
                                            $date = \Carbon\Carbon::parse($tonew)->subDay($i)->format('Y-m-d');
                                            $userId = $user->id;
                                            $dateFrom = $date . ' 00:00:00';
                                            $dateTo = $date . ' 23:59:59';
                                            $rec = \App\Models\Enquiry::whereBetween('created_at', [$dateFrom, $dateTo])->where(['created_by' => $userId, 'enquiry_type_id' => 4])->count();
                                            $temp = \App\Models\Enquiry::whereBetween('created_at', [$dateFrom, $dateTo])->where(['created_by' => $userId, 'enquiry_type_id' => 5])->count();
                                            $fms = \App\Models\Enquiry::whereBetween('created_at', [$dateFrom, $dateTo])->where(['created_by' => $userId, 'enquiry_type_id' => 6])->count();
                                            $pay = \App\Models\Enquiry::whereBetween('created_at', [$dateFrom, $dateTo])->where(['created_by' => $userId, 'enquiry_type_id' => 7])->count();
                                            $enqCount = \App\Models\Enquiry::whereBetween('created_at', [$dateFrom, $dateTo])->where('created_by', $userId)->count();
                                        @endphp
                                        <td>
                                            @if ($pay)
                                                <span class="badge badge-primary light">{{ $pay }}</span>
                                            @else
                                                <span class="badge badge-primary light">0</span>
                                            @endif
                                            <hr style="height: 0.0px !important;">
                                            @if ($temp)
                                                <span class="badge badge-primary light"> {{ $temp }}</span>
                                            @else
                                                <span class="badge badge-primary light">0</span>
                                            @endif
                                            <hr style="height: 0.0px !important;">
                                            @if ($fms)
                                                <span class="badge badge-primary light">{{ $fms }}</span>
                                            @else
                                                <span class="badge badge-primary light">0</span>
                                            @endif
                                            <hr style="height: 0.0px !important;">
                                            @if ($rec)
                                                <span class="badge badge-primary light"> {{ $rec }}</span>
                                            @else
                                                <span class="badge badge-primary light">0</span>
                                            @endif
                                            <hr style="height: 0.0px !important;">
                                            @if ($enqCount)
                                                <span class="badge badge-danger light"> {{ $enqCount }}</span>
                                            @else
                                                <span class="badge badge-danger light">0</span>
                                            @endif
                                        </td>
                                    @endfor
                                </tr>
                            </tbody>
                        </table>
                    </div>
        @endif
    @endforeach
</div>
