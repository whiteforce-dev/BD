<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxxxxxxxxxxxxxxxxxxx" crossorigin="anonymous" />
<!--**********************************
    Nav header start
***********************************-->
<div class="nav-header">
    <a href="index.html" class="brand-logo">
        <!--

        <div class="brand-title">Ventic</div> -->
        <svg class="logo-abbr"  width="54" height="54" viewBox="0 0 54 54" fill="none">
            <img class="logo-abbr" src="{{ url('white-force-logo2.png') }}" alt="" style="    max-width: 149px;
            min-width: 50px;
            margin-left: -20px;">
            <rect class="svg-logo-rect" width="54" height="54" rx="14" fill="#0E8A74"/>
            <path class="svg-logo-path" d="M13 17H24.016L31.802 34.544L38.33 17H40.948L31.972 40.8H23.54L13 17Z" fill="white"/>
        </svg>

        </svg>
    </a>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<!--**********************************
    Nav header end
***********************************-->

<!--**********************************
    Sidebar start
***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            <li><a href="/dashboard" class="ai-icon" aria-expanded="false">
                <i class="mdi mdi-view-dashboard"></i>
                <span class="nav-text">DashBoard</span>
              </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-users"></i>
                    <span class="nav-text">Follow-Up</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('/todayFollowups') }}">Today Follow-Up</a></li>
                    <li><a href="{{ url('/missedFollowups') }}">Missed Follow-Up</a></li>
                    <li><a href="{{ url('/totalFollowups') }}">Total Follow-Up</a></li>
                </ul>
            </li>


            @if(Auth::user()->type == 'Admin' || Auth::user()->type == 'Manager' )
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-users"></i>
                        <span class="nav-text">Team</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ url('/add-employee') }}">Add Member</a></li>
                        <li><a href="{{ url('/viewTeam') }}">Member List</a></li>


                    </ul>
                </li>
            @endif

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="bi bi-person-lines-fill"></i>
                    <span class="nav-text">Enquiry</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('add-enquiry') }}">Add New Enquiry</a></li>
                    <li><a href="{{ url('enquiry-list') }}">Enquiry List</a></li>
                    @if( Auth::user()->type == 'Manager' )
                    <li><a href="{{ url('manager-enquiry-list') }}">Manager Enquiry</a></li>
                    @endif
                    <li><a href="{{ url('hot-list') }}">Hot List</a></li>
                    @if( Auth::user()->type == 'Manager' )
                    <li><a href="{{ url('team-hot-list') }}">Team Hot List</a></li>
                    @endif
                    <li><a href="{{ url('team-hot-list') }}">Break</a></li>
                    <li><a href="{{ url('hold-list') }}">Hold</a></li>
                </ul>
            </li>
            @if(Auth::user()->type == 'Admin')
                <li>
                    <a href="{{ url('assignTarget') }}" class="ai-icon" aria-expanded="false">
                    <i class="bi bi-bullseye"></i>
                    <span class="nav-text">User Target</span>
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ url('viewMonthlyTarget') }}" class="ai-icon" aria-expanded="false">
                    <i class="bi bi-bullseye"></i>
                    <span class="nav-text">User Target</span>
                    </a>
                </li>
           @endif

        <li>
            <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="bi bi-card-list"></i>
                <span class="nav-text">Reports</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ url('viewHbdReport') }}">HBD Report</a></li>
                <li><a href="{{ url('pendingBirthdays') }}">PendingHbdReport</a></li>

            </ul>
        </li>
        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="fa fa-users"></i>
                <span class="nav-text">Settings</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="#">Proposal Setting</a></li>
                <li><a href="#">Email</a></li>
                <li><a href="{{ url('/holidays') }}">Holidays</a></li>
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
