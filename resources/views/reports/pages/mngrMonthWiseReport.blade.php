<div class="table-responsive">
 @php
 $user = \App\Models\User::where(['type' => 'Manager', 'is_active' => 1])->get();
 @endphp
</div>
<style>
    thead, tbody, tfoot, tr, td, th {
         border-style: none;
    }
</style>
<div class="col-lg-12">
    @foreach ($user as $obj => $users)
                <div class="card-header" style="border: 1px solid #d1e0e2;">
                    <div class="d-flex align-items-center " align="center">
                        <img style="width: 57px;
                        height: 57px;
                        padding: 2px;"
                            src="{{ url($users->image) }}??''" class="rounded-lg me-2" width="24" alt="" />
                        <h5 style="    font-family: system-ui;     padding-left: 13px;
                        font-size: 1.2rem;" class="w-space-no">{{ ucwords($users->name) }}</h5>
                    </div>

                </div>
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-responsive-sm">
                            <thead style="border: none !important;">
                                <tr>
                                    <th style="font-size: 1.04rem;" scope="col">Report</th>
                                    <th style="font-size: 1.04rem;" scope="col">Jan </th>
                                    <th style="font-size: 1.04rem;" scope="col"> Feb </th>
                                    <th style="font-size: 1.04rem;" scope="col"> Mar</th>
                                    <th style="font-size: 1.04rem;" scope="col"> Apr </th>
                                    <th style="font-size: 1.04rem;" scope="col"> May</th>
                                    <th style="font-size: 1.04rem;" scope="col">Jun</th>
                                    <th style="font-size: 1.04rem;" scope="col">Jul</th>
                                    <th style="font-size: 1.04rem;" scope="col">Aug</th>
                                    <th style="font-size: 1.04rem;" scope="col">Sep</th>
                                    <th style="font-size: 1.04rem;" scope="col">Oct</th>
                                    <th style="font-size: 1.04rem;" scope="col">Nov</th>
                                    <th style="font-size: 1.04rem;" scope="col">Dec</th>
                                </tr>
                            </thead>


                         @php
                            $user = \App\Models\User::where(['type' => 'Manager', 'is_active' => 1])->get();
                            $month = date('n');
                            $jan = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->whereMonth('created_at', '=', date('01'))
                                ->count();
                            $feb = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->whereMonth('created_at', '=', date('02'))
                                ->whereYear('created_at', $year)
                                ->count();
                            $mar = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->whereMonth('created_at', '=', date('03'))
                                ->whereYear('created_at', $year)
                                ->count();
                            $apr = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->whereMonth('created_at', '=', date('04'))
                                ->whereYear('created_at', $year)
                                ->count();
                            $may = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->whereMonth('created_at', '=', date('05'))
                                ->whereYear('created_at', $year)
                                ->count();
                            $jun = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->whereMonth('created_at', '=', date('06'))
                                ->whereYear('created_at', $year)
                                ->count();
                            $jul = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->whereMonth('created_at', '=', date('07'))
                                ->whereYear('created_at', $year)
                                ->count();
                            $aug = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->whereMonth('created_at', '=', date('08'))
                                ->whereYear('created_at', $year)
                                ->count();
                            $sep = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->whereMonth('created_at', '=', date('09'))
                                ->whereYear('created_at', $year)
                                ->count();
                            $oct = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->whereMonth('created_at', '=', date('10'))
                                ->whereYear('created_at', $year)
                                ->count();
                            $nov = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->whereMonth('created_at', '=', date('11'))
                                ->whereYear('created_at', $year)
                                ->count();
                            $dec = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->whereMonth('created_at', '=', date('12'))
                                ->whereYear('created_at', $year)
                                ->count();

                            $janAch = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 4])
                                ->whereMonth('break_date', '=', date('01'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $febAch = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 4])
                                ->whereMonth('break_date', '=', date('02'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $marAch = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 4])
                                ->whereMonth('break_date', '=', date('03'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $aprAch = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 4])
                                ->whereMonth('break_date', '=', date('04'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $mayAch = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 4])
                                ->whereMonth('break_date', '=', date('05'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $junAch = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 4])
                                ->whereMonth('break_date', '=', date('06'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $julAch = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 4])
                                ->whereMonth('break_date', '=', date('07'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $augAch = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 4])
                                ->whereMonth('break_date', '=', date('08'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $sepAch = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 4])
                                ->whereMonth('break_date', '=', date('09'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $octAch = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 4])
                                ->whereMonth('break_date', '=', date('10'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $novAch = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 4])
                                ->whereMonth('break_date', '=', date('11'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $decAch = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 4])
                                ->whereMonth('break_date', '=', date('12'))
                                ->whereYear('break_date', $year)
                                ->count();

                            $janAchT = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 5])
                                ->whereMonth('break_date', '=', date('01'))
                                ->whereYear('break_date', $year)
                                ->whereYear('break_date', $year)
                                ->count();
                            $febAchT = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 5])
                                ->whereMonth('break_date', '=', date('02'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $marAchT = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 5])
                                ->whereMonth('break_date', '=', date('03'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $aprAchT = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 5])
                                ->whereMonth('break_date', '=', date('04'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $mayAchT = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 5])
                                ->whereMonth('break_date', '=', date('05'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $junAchT = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 5])
                                ->whereMonth('break_date', '=', date('06'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $julAchT = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 5])
                                ->whereMonth('break_date', '=', date('07'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $augAchT = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 5])
                                ->whereMonth('break_date', '=', date('08'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $sepAchT = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 5])
                                ->whereMonth('break_date', '=', date('09'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $octAchT = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 5])
                                ->whereMonth('break_date', '=', date('10'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $novAchT = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 5])
                                ->whereMonth('break_date', '=', date('12'))
                                ->whereYear('break_date', $year)
                                ->count();
                            $decAchT = \App\Models\Enquiry::where('created_by', Auth::user()->id)
                                ->where(['status_id' => 15, 'enquiry_type_id' => 5])
                                ->whereMonth('break_date', '=', date('12'))
                                ->whereYear('break_date', $year)
                                ->count();
                         @endphp
                            <tbody>
                                <tr>
                                    <td>
                                        <p style="font-size: 0.9rem;">Approach</p>

                                            <hr style="height: 0.0px !important;">
                                            <p style="font-size: 0.9rem;"> Recuriment Acchived</p>

                                            <hr style="height: 0.0px !important;">
                                            <p style="font-size: 0.9rem;"> TempStaffing Acchived</p>

                                    </td>
                                    <td><label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $jan }}</label>
                                        <hr style="margin-top: 0px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $janAch }}</label>
                                        <hr style="margin-top: 9px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $janAchT }}</label>
                                    </td>

                                    <td><label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $feb }}</label>
                                        <hr style="margin-top: 0px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $febAch }}</label>
                                        <hr style="margin-top: 9px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $febAchT }}</label>
                                    </td>

                                    <td><label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $mar }}</label>
                                        <hr style="margin-top: 0px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $marAch }}</label>
                                        <hr style="margin-top: 9px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $marAchT }}</label>
                                    </td>

                                    <td><label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $apr }}</label>
                                        <hr style="margin-top: 0px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $aprAch }}</label>
                                        <hr style="margin-top: 9px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $aprAchT }}</label>
                                    </td>

                                    <td><label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $may }}</label>
                                        <hr style="margin-top: 0px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $mayAch }}</label>
                                        <hr style="margin-top: 9px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $mayAchT }}</label>
                                    </td>

                                    <td><label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $jun }}</label>
                                        <hr style="margin-top: 0px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $junAch }}</label>
                                        <hr style="margin-top: 9px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $junAchT }}</label>
                                    </td>


                                    <td><label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $jul }}</label>
                                        <hr style="margin-top: 0px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $julAch }}</label>
                                        <hr style="margin-top: 9px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $julAchT }}</label>
                                    </td>

                                    <td><label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $aug }}</label>
                                        <hr style="margin-top: 0px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $augAch }}</label>
                                        <hr style="margin-top: 9px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $augAchT }}</label>
                                    </td>

                                    <td><label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $sep }}</label>
                                        <hr style="margin-top: 0px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $sepAch }}</label>
                                        <hr style="margin-top: 9px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $sepAchT }}</label>
                                    </td>

                                    <td><label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $oct }}</label>
                                        <hr style="margin-top: 0px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $octAch }}</label>
                                        <hr style="margin-top: 9px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $octAchT }}</label>
                                    </td>


                                    <td><label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $nov }}</label>
                                        <hr style="margin-top: 0px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $novAch }}</label>
                                        <hr style="margin-top: 9px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $novAchT }}</label>
                                    </td>


                                    <td><label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $dec }}</label>
                                        <hr style="margin-top: 0px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $decAch }}</label>
                                        <hr style="margin-top: 9px; height: 0.0px !important;">
                                        <label class="badge badge-primary light" style="font-size: 13px; background:transparent;">{{ $decAchT }}</label>
                                    </td>


                                </tr>
                            </tbody>
                        </table>
                    </div>
    @endforeach
</div>
