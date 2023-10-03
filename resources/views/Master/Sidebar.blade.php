


<!--**********************************
    Sidebar start
***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            <li><a href="/dashboard" class="ai-icon" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>                <span class="nav-text">DashBoard</span>
              </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>                    <span class="nav-text">Follow-Up</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('/todayFollowups') }}">Today Follow-Up</a></li>
                    <li><a href="{{ url('/missedFollowups') }}">Missed Follow-Up</a></li>
                    <li><a href="{{ url('/totalFollowups') }}">Total Follow-Up</a></li>
                </ul>
            </li>


            @if(Auth::user()->type == 'Admin' || Auth::user()->type == 'Manager' )
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>                        <span class="nav-text">Team</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ url('/add-employee') }}">Add Member</a></li>
                        @if (Auth::user()->type === 'Admin')
                        <li><a href="{{ url('mngrPage') }}">Member List</a></li>
                        @else
                        <li><a href="{{ url('/viewTeam') }}">Member List</a></li>
                        @endif
                    </ul>
                </li>
            @endif

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>                    <span class="nav-text">Enquiry</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('add-enquiry') }}">Add New Enquiry</a></li>
                    <li><a href="{{ url('enquiry-list') }}">Enquiry List</a></li>
                    {{--  @if( Auth::user()->type == 'Manager' )
                    <li><a href="{{ url('manager-enquiry-list') }}">Manager Enquiry</a></li>
                    @endif  --}}
                    <li><a href="{{ url('hot-list') }}">Hot List</a></li>
                    @if( Auth::user()->type == 'Manager' )
                    <li><a href="{{ url('team-hot-list') }}">Team Hot List</a></li>
                    @endif
                    <li><a href="{{ url('break-list') }}">Break</a></li>
                    <li><a href="{{ url('hold-list') }}">Hold</a></li>
                </ul>
            </li>
            @if(Auth::user()->type == 'Admin')
                <li>
                    <a href="{{ url('assignTarget') }}" class="ai-icon" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-crosshair"><circle cx="12" cy="12" r="10"></circle><line x1="22" y1="12" x2="18" y2="12"></line><line x1="6" y1="12" x2="2" y2="12"></line><line x1="12" y1="6" x2="12" y2="2"></line><line x1="12" y1="22" x2="12" y2="18"></line></svg>                    <span class="nav-text">User Target</span>
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ url('viewMonthlyTarget') }}" class="ai-icon" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-crosshair"><circle cx="12" cy="12" r="10"></circle><line x1="22" y1="12" x2="18" y2="12"></line><line x1="6" y1="12" x2="2" y2="12"></line><line x1="12" y1="6" x2="12" y2="2"></line><line x1="12" y1="22" x2="12" y2="18"></line></svg>                    <span class="nav-text">User Target</span>
                    </a>
                </li>
           @endif

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg>                <span class="nav-text">Reports</span>
                </a>
                <ul aria-expanded="false">
                    @if(Auth::user()->type == 'Admin')
                    <li><a href="{{ url('dailyReports') }}">Day Wise Report</a></li>
                    <li><a href="{{ url('ManagerPage') }}">Manager Enquiry</a></li>
                    @endif
                    @if(Auth::user()->type == 'Manager')
                    <li><a href="{{ url('dailyReports') }}">Day Wise Report</a></li>
                    <li><a href="{{ url('getMngrMonthlyTeam') }}">Team Enquiry</a></li>
                    <li><a href="{{ url('monthWiseReport') }}">Month Wise</a></li>
                    <li><a href="{{ url('teamMonthWiseReport') }}">Team Month Wise</a></li>
                    @endif
                    <li><a href="{{ url('viewHbdReport') }}">HBD Report</a></li>
                    <li><a href="{{ url('pendingBirthdays') }}">PendingHbdReport</a></li>
                    <li><a href="{{ url('addedBirhtday') }}">Added Birthday</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="fa-regular fa-envelope" style="color: #5890EE; font-size:1.5rem"></i>
                    <span class="nav-text">Settings</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('viewEmailList') }}">Email</a></li>
                    @if(Auth::user()->type == 'Admin')
                        <li><a href="{{ url('viewEnquiryType') }}">Proposal Setting</a></li>
                        <li><a href="{{ url('/holidays') }}">Holidays</a></li>
                    @endif
                </ul>
            </li>

        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="path/to/perfect-scrollbar.min.js"></script>

<!-- Initialize PerfectScrollbar for .deznav-scroll elements -->
<script>
    jQuery(document).ready(function() {
        jQuery(".deznav-scroll").each(function() {
            new PerfectScrollbar(this);
        });
    });
</script>
