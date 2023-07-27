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
                <i class="flaticon-013-checkmark"></i>
                <span class="nav-text">DashBoard</span>
              </a>
            </li>

            <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                <i class="flaticon-013-checkmark"></i>
                <span class="nav-text">Today Follow-Up</span>
              </a>
            </li>

            @if(Auth::user()->type == 'Admin' || Auth::user()->type == 'Manager' )
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-050-info"></i>
                        <span class="nav-text">Team</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ url('/add-employee') }}">Add Member</a></li>
                        <li><a href="{{ url('/viewTeam') }}">Member List</a></li>


                    </ul>
                </li>
            @endif

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-041-graph"></i>
                    <span class="nav-text">Enquiry</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('add-enquiry') }}">Add New Enquiry</a></li>
                    <li><a href="{{ url('enquiry-list') }}">Enquiry List</a></li>
                    @if( Auth::user()->type == 'Manager' )
                    <li><a href="{{ url('manager-enquiry-list') }}">Team Member Enquiry</a></li>
                    @endif
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-086-star"></i>
                    <span class="nav-text">Hot</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="ui-accordion.html">Accordion</a></li>
                    <li><a href="ui-alert.html">Alert</a></li>
                    <li><a href="ui-badge.html">Badge</a></li>
                    <li><a href="ui-button.html">Button</a></li>
                    <li><a href="ui-modal.html">Modal</a></li>
                    <li><a href="ui-button-group.html">Button Group</a></li>
                    <li><a href="ui-list-group.html">List Group</a></li>

                    <li><a href="ui-card.html">Cards</a></li>
                    <li><a href="ui-carousel.html">Carousel</a></li>
                    <li><a href="ui-dropdown.html">Dropdown</a></li>
                    <li><a href="ui-popover.html">Popover</a></li>
                    <li><a href="ui-progressbar.html">Progressbar</a></li>
                    <li><a href="ui-tab.html">Tab</a></li>
                    <li><a href="ui-typography.html">Typography</a></li>
                    <li><a href="ui-pagination.html">Pagination</a></li>
                    <li><a href="ui-grid.html">Grid</a></li>

                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-045-heart"></i>
                    <span class="nav-text">User Target</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="uc-select2.html">Select 2</a></li>
                    <li><a href="uc-nestable.html">Nestedable</a></li>
                    <li><a href="uc-noui-slider.html">Noui Slider</a></li>
                    <li><a href="uc-sweetalert.html">Sweet Alert</a></li>
                    <li><a href="uc-toastr.html">Toastr</a></li>
                    <li><a href="map-jqvmap.html">Jqv Map</a></li>
                    <li><a href="uc-lightgallery.html">Light Gallery</a></li>
                </ul>
            </li>
            <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-013-checkmark"></i>
                    <span class="nav-text">Break</span>
                </a>
            </li>
            <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                <i class="flaticon-013-checkmark"></i>
                <span class="nav-text">Proposal Setting</span>
                </a>
            </li>
            <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                <i class="flaticon-013-checkmark"></i>
                <span class="nav-text">Email</span>
              </a>
            </li>

            <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                <i class="flaticon-013-checkmark"></i>
                <span class="nav-text">Holidays</span>
              </a>
            </li>

            <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                <i class="flaticon-013-checkmark"></i>
                <span class="nav-text">Reports</span>
              </a>
            </li>

        </ul>

    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
