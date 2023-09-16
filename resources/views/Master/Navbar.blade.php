<!--**********************************
    Header start
***********************************-->
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="input-group search-area d-xl-inline-flex d-none">
                        <button class="input-group-text"><i class="flaticon-381-search-2 text-primary"></i></button>
                        <input type="text" class="form-control" placeholder="Search here...">
                    </div>
                </div>
                <ul class="navbar-nav header-right">

                    {{--  <li class="nav-item dropdown notification_dropdown">
                        <select class="language-btn default-select">
                          <option data-display="ENGLISH">ENGLISH</option>
                          <option value="1">FRANCE</option>
                          <option value="2">CANADA</option>
                          <option value="3">GERMAN</option>
                        </select>
                    </li>  --}}
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            @php
                                $user = Auth::user()
                            @endphp
                            <div class="header-info me-3">
                                <span class="fs-16 font-w600 ">{{ $user->name }}</span>
                            </div>
                            <img style="width: 39px;
                            height: 39px;" src="{{ url($user->image) }}" width="20" alt=""/>
                        </a>


                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!--**********************************
    Header end ti-comment-alt
***********************************-->
