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

            <li><a href="{{ url('todayFollowups') }}" class="ai-icon" aria-expanded="false">
                <i class="mdi mdi-calendar-today"></i>
                <span class="nav-text">Today Follow-Up</span>
              </a>
            </li>
            <li><a href="{{ url('missedFollowups') }}" class="ai-icon" aria-expanded="false">
                <i class="mdi mdi-calendar-today"></i>
                <span class="nav-text">Missed Follow-Up</span>
              </a>
            </li>
            <li><a href="{{ url('totalFollowups') }}" class="ai-icon" aria-expanded="false">
                <i class="mdi mdi-calendar-today"></i>
                <span class="nav-text">Total Follow-Up</span>
              </a>
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



                </ul>
            </li>

            <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                <i class="bi bi-file-earmark-break-fill"></i>
                    <span class="nav-text">Break</span>
                </a>
            </li>
            <li><a href="{{ url('hold-list') }}" class="ai-icon" aria-expanded="false">
                <i class="bi bi-file-earmark-break-fill"></i>
                    <span class="nav-text">Hold</span>
                </a>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="bi bi-bullseye"></i>
                <span class="nav-text">User Target</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="uc-select2.html">Select 2</a></li>

            </ul>
        </li>
            <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                <i class="bi bi-gear-fill"></i>
                <span class="nav-text">Proposal Setting</span>
                </a>
            </li>
            <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                <i class="bi bi-envelope"></i>
                <span class="nav-text">Email</span>
              </a>
            </li>

            <li><a href="{{ url('holidays') }}" class="ai-icon" aria-expanded="false">
                <i class="bi bi-calendar2-check-fill"></i>
                <span class="nav-text">Holidays</span>
              </a>
            </li>

            <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                <i class="bi bi-card-list"></i>
                <span class="nav-text">Reports</span>
              </a>
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
