@extends('Master.Master')
@section('content')
    <style>
        .name {
            position: relative;
            top: 12px;
            text-align: center;
        }

        .chart-bx .card-body {
            position: relative;
            left: 15px;
        }

        .heading {
            font-size: 20px;
            margin: 1rem;
            position: relative;
            left: 60px;
        }

        .card-header .card-title {
            margin-bottom: 0px;
            font-size: 15px;
        }

        .widget-stat .media>span {
            height: 40px;
            width: 10px;
            border-radius: 272px;
            padding: 10px 12px;
            font-size: 32px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #464a53;
            min-width: 85px;
        }

        .widget-stat .media .media-body h3,
        .widget-stat .media .media-body .h3 {
            font-size: 20px;
            font-weight: 600;
            margin: 0;
            line-height: 1.2;
        }

        .ct-area {
            width: 20px;
        }

        .text-center {
            text-align: center !important;
            font-size: 12px;
        }

        .fw-normal {
            font-weight: 400 !important;
            font-size: 15px;
        }

        .chart-bx {
            width: 62rem;
            right: 15px;
            position: relative;
            background-image: url();
        }

        .card-header {
            height: 2;
        }

        .tab-content {
            display: ;
        }

        .contacts_body {}
    </style>
    <!--**********************************
                Chat box start
            ***********************************-->

    <div class="chatbox">

        <div class="chatbox-close"></div>
        <div class="custom-tab-1">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#notes">Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#alerts">Alerts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#chat">Chat</a>
                </li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane fade active show" id="chat" role="tabpanel">
                    <div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
                        <div class="card-header chat-list-header text-center">
                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                    viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect fill="#000000" x="4" y="11" width="16" height="2"
                                            rx="1" />
                                        <rect fill="#000000" opacity="0.3"
                                            transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) "
                                            x="4" y="11" width="16" height="2" rx="1" />
                                    </g>
                                </svg></a>
                            <div>
                                <h6 class="mb-1">Chat List</h6>
                                <p class="mb-0">Show All</p>
                            </div>
                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                    viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="5" cy="12" r="2" />
                                        <circle fill="#000000" cx="12" cy="12" r="2" />
                                        <circle fill="#000000" cx="19" cy="12" r="2" />
                                    </g>
                                </svg></a>
                        </div>
                        <div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
                            <ul class="contacts">
                                <li class="name-first-letter">A</li>
                                <li class="active dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="" />
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Archie Parker</span>
                                            <p>Kalid is online</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="images/avatar/2.jpg" class="rounded-circle user_img" alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Alfie Mason</span>
                                            <p>Taherah left 7 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="images/avatar/3.jpg" class="rounded-circle user_img"
                                                alt="" />
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>AharlieKane</span>
                                            <p>Sami is online</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="images/avatar/4.jpg" class="rounded-circle user_img"
                                                alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Athan Jacoby</span>
                                            <p>Nargis left 30 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="name-first-letter">B</li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="images/avatar/5.jpg" class="rounded-circle user_img"
                                                alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Bashid Samim</span>
                                            <p>Rashid left 50 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="images/avatar/1.jpg" class="rounded-circle user_img"
                                                alt="" />
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Breddie Ronan</span>
                                            <p>Kalid is online</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="images/avatar/2.jpg" class="rounded-circle user_img"
                                                alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Ceorge Carson</span>
                                            <p>Taherah left 7 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="name-first-letter">D</li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="images/avatar/3.jpg" class="rounded-circle user_img"
                                                alt="" />
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Darry Parker</span>
                                            <p>Sami is online</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="images/avatar/4.jpg" class="rounded-circle user_img"
                                                alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Denry Hunter</span>
                                            <p>Nargis left 30 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="name-first-letter">J</li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="images/avatar/5.jpg" class="rounded-circle user_img"
                                                alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Jack Ronan</span>
                                            <p>Rashid left 50 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="images/avatar/1.jpg" class="rounded-circle user_img"
                                                alt="" />
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Jacob Tucker</span>
                                            <p>Kalid is online</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="images/avatar/2.jpg" class="rounded-circle user_img"
                                                alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>James Logan</span>
                                            <p>Taherah left 7 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="images/avatar/3.jpg" class="rounded-circle user_img"
                                                alt="" />
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Joshua Weston</span>
                                            <p>Sami is online</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="name-first-letter">O</li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="images/avatar/4.jpg" class="rounded-circle user_img"
                                                alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Oliver Acker</span>
                                            <p>Nargis left 30 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="dz-chat-user">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="images/avatar/5.jpg" class="rounded-circle user_img"
                                                alt="" />
                                            <span class="online_icon offline"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Oscar Weston</span>
                                            <p>Rashid left 50 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card chat dz-chat-history-box d-none">
                        <div class="card-header chat-list-header text-center">
                            <a href="javascript:void(0);" class="dz-chat-history-back">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <rect fill="#000000" opacity="0.3"
                                            transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) "
                                            x="14" y="7" width="2" height="10"
                                            rx="1" />
                                        <path
                                            d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) " />
                                    </g>
                                </svg>
                            </a>
                            <div>
                                <h6 class="mb-1">Chat with Khelesh</h6>
                                <p class="mb-0 text-success">Online</p>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <circle fill="#000000" cx="5" cy="12" r="2" />
                                            <circle fill="#000000" cx="12" cy="12" r="2" />
                                            <circle fill="#000000" cx="19" cy="12" r="2" />
                                        </g>
                                    </svg></a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View
                                        profile</li>
                                    <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to
                                        btn-close friends</li>
                                    <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group
                                    </li>
                                    <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3">
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                                <div class="msg_cotainer">
                                    Hi, how are you samim?
                                    <span class="msg_time">8:40 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    Hi Khalid i am good tnx how about you?
                                    <span class="msg_time_send">8:55 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                                <div class="msg_cotainer">
                                    I am good too, thank you for your chat template
                                    <span class="msg_time">9:00 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    You are welcome
                                    <span class="msg_time_send">9:05 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                                <div class="msg_cotainer">
                                    I am looking for your next templates
                                    <span class="msg_time">9:07 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    Ok, thank you have a good day
                                    <span class="msg_time_send">9:10 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                                <div class="msg_cotainer">
                                    Bye, see you
                                    <span class="msg_time">9:12 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                                <div class="msg_cotainer">
                                    Hi, how are you samim?
                                    <span class="msg_time">8:40 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    Hi Khalid i am good tnx how about you?
                                    <span class="msg_time_send">8:55 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                                <div class="msg_cotainer">
                                    I am good too, thank you for your chat template
                                    <span class="msg_time">9:00 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    You are welcome
                                    <span class="msg_time_send">9:05 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                                <div class="msg_cotainer">
                                    I am looking for your next templates
                                    <span class="msg_time">9:07 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    Ok, thank you have a good day
                                    <span class="msg_time_send">9:10 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                                <div class="msg_cotainer">
                                    Bye, see you
                                    <span class="msg_time">9:12 AM, Today</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer type_msg">
                            <div class="input-group">
                                <textarea class="form-control" placeholder="Type your message..."></textarea>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary"><i
                                            class="fa fa-location-arrow"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="alerts" role="tabpanel">
                    <div class="card mb-sm-3 mb-md-0 contacts_card">
                        <div class="card-header chat-list-header text-center">
                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                    viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="5" cy="12" r="2" />
                                        <circle fill="#000000" cx="12" cy="12" r="2" />
                                        <circle fill="#000000" cx="19" cy="12" r="2" />
                                    </g>
                                </svg></a>
                            <div>
                                <h6 class="mb-1">Notications</h6>
                                <p class="mb-0">Show All</p>
                            </div>
                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                    viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path
                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg></a>
                        </div>
                        <div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body1">
                            <ul class="contacts">
                                <li class="name-first-letter">SEVER STATUS</li>
                                <li class="active">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont primary">KK</div>
                                        <div class="user_info">
                                            <span>David Nester Birthday</span>
                                            <p class="text-primary">Today</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="name-first-letter">SOCIAL</li>
                                <li>
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont success">RU</div>
                                        <div class="user_info">
                                            <span>Perfection Simplified</span>
                                            <p>Jame Smith commented on your status</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="name-first-letter">SEVER STATUS</li>
                                <li>
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont primary">AU</div>
                                        <div class="user_info">
                                            <span>AharlieKane</span>
                                            <p>Sami is online</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont info">MO</div>
                                        <div class="user_info">
                                            <span>Athan Jacoby</span>
                                            <p>Nargis left 30 mins ago</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="notes">
                    <div class="card mb-sm-3 mb-md-0 note_card">
                        <div class="card-header chat-list-header text-center">
                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                    viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect fill="#000000" x="4" y="11" width="16"
                                            height="2" rx="1" />
                                        <rect fill="#000000" opacity="0.3"
                                            transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) "
                                            x="4" y="11" width="16" height="2"
                                            rx="1" />
                                    </g>
                                </svg></a>
                            <div>
                                <h6 class="mb-1">Notes</h6>
                                <p class="mb-0">Add New Nots</p>
                            </div>
                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                    viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path
                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg></a>
                        </div>
                        <div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body2">
                            <ul class="contacts">
                                <li class="active">
                                    <div class="d-flex bd-highlight">
                                        <div class="user_info">
                                            <span>New order placed..</span>
                                            <p>10 Aug 2020</p>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i
                                                    class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex bd-highlight">
                                        <div class="user_info">
                                            <span>Youtube, a video-sharing website..</span>
                                            <p>10 Aug 2020</p>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i
                                                    class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex bd-highlight">
                                        <div class="user_info">
                                            <span>john just buy your product..</span>
                                            <p>10 Aug 2020</p>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i
                                                    class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex bd-highlight">
                                        <div class="user_info">
                                            <span>Athan Jacoby</span>
                                            <p>10 Aug 2020</p>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i
                                                    class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
                Chat box End
            ***********************************-->





    <!--**********************************
                Content body start
            ***********************************-->
    <div class="content-body">
        <!-- row -->

        <div class="container-fluid">
            <div class="form-head mb-4 d-flex flex-wrap align-items-center" style="    background: white;
            border-radius: 8px;
            border: 1px solid #e7e7f1;
            box-shadow: 3px 3px 7px -2px #e1e1e9;
        ">
                <div class="me-auto" style="margin: 20px 16px;">
                    <h2 class="font-w600 mb-0" style="font-size: 1.5rem;
                    font-weight: 500;">Dashboard</h2>
                </div>

            </div>
            <div class="card" style="height: 254px !important; background:transparent;border:none; box-shadow:none;">
                        <div class="card-body">

                                    <div class="row">

                                        <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6" style="    border: 1px solid rgba(0,0,0,.125); height: 240px !important;    box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05); background-color:white;  border-radius:4px; max-width:24% !important;">
                                            <div class="widget-stat card bg-primary"  style="margin-top: 15px;">
                                                <div class="card-body  p-4">
                                                    <div class="media" style="flex-direction: column;">
                                                        <span class="me-3">
                                                            <i class="la la-users"></i>
                                                        </span>
                                                        <div class="media-body text-white" style="margin-top: 20px;">
                                                            <p class="mb-1">Total Enquiry</p>
                                                            <h3 class="text-white">3280</h3>
                                                            <div class="progress mb-2 bg-secondary">
                                                                <div class="progress-bar progress-animated bg-light" style="width: 80%">
                                                                </div>
                                                            </div>
                                                            <small>80% Increase in 20 Days</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6" style="height: 239px;     border: 1px solid rgba(0,0,0,.125);     box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05); max-width:24% !important; margin:0 13px; background-color:white;">
                                            <div class="widget-stat card bg-danger overflow-hidden" style="margin-top: 15px;">
                                                <div class="card-header pb-3 border-0 pb-0">
                                                    <h3 class="card-title text-white">Fees Collection</h3>
                                                    <h5 class="text-white mb-0"><i class="fa fa-caret-up" aria-hidden="true"></i> 3280$
                                                    </h5>
                                                </div>
                                                <div class="card-body p-0">
                                                    <span class="peity-line-2" data-width="100%"
                                                        style="display: none;">7,6,8,7,3,8,3,3,6,5,9,2,8</span><svg class="peity"
                                                        height="150" width="100%">
                                                        <polygon fill="#fa707e"
                                                            points="0 148.5 0 34.16666666666667 40.291666666666664 50.5 80.58333333333333 17.833333333333343 120.875 34.16666666666667 161.16666666666666 99.5 201.45833333333331 17.833333333333343 241.75 99.5 282.04166666666663 99.5 322.3333333333333 50.5 362.625 66.83333333333333 402.91666666666663 1.5 443.2083333333333 115.83333333333334 483.5 17.833333333333343 483.5 148.5">
                                                        </polygon>
                                                        <polyline fill="none"
                                                            points="0 34.16666666666667 40.291666666666664 50.5 80.58333333333333 17.833333333333343 120.875 34.16666666666667 161.16666666666666 99.5 201.45833333333331 17.833333333333343 241.75 99.5 282.04166666666663 99.5 322.3333333333333 50.5 362.625 66.83333333333333 402.91666666666663 1.5 443.2083333333333 115.83333333333334 483.5 17.833333333333343"
                                                            stroke="#f77f8b" stroke-width="3" stroke-linecap="square"></polyline>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6" style="    border: 1px solid rgba(0,0,0,.125); height: 240px !important;    box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05); max-width:24% !important; margin-right:13px; background-color:white;">
                                            <div class="widget-stat card" style="height: 210px; background-color:#ffe23e !important; margin-top:15px;">
                                                <div class="card-header pb-3 border-0 pb-0">
                                                    <h3 class="card-title text-white">Total Course</h3>
                                                    <h5 class="text-white mb-0"><i class="fa fa-caret-up" aria-hidden="true"></i> 547
                                                    </h5>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="px-4"><span class="bar1"
                                                            data-peity="{ &quot;fill&quot;: [&quot;rgb(255, 255, 255)&quot;, &quot;rgb(255, 255, 255)&quot;]}"
                                                            style="display: none;">6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span><svg
                                                            class="peity" height="140" width="106%">

                                                            <rect data-value="6" fill=" #248cf7"; " x="2.1775" y="24.705882352941188" width="17.42" height="100px"></rect>

                                                                <rect data-value="2" fill="rgb(14, 138, 116)" x="23.9525" y="57.647058823529406" width="17.419999999999995" height="70px"></rect>

                                                                <rect data-value="8" fill="#1c6eb6" x="45.727500000000006" y="8.235294117647072" width="17.419999999999995" height="100px"></rect>

                                                                <rect data-value="4" fill="#0E8A74" x="67.5025" y="41.17647058823529" width="17.42" height="100px"></rect>

                                                                <rect data-value="-3" fill="#FB3E7A" x="89.2775" y="74.11764705882354" width="17.420000000000016" height="100px"></rect>

                                                                <rect data-value="8" fill="#3693FF" x="111.05249999999998" y="8.235294117647072" width="17.420000000000044" height="100px"></rect>

                                                                <rect data-value="1" fill="#1c6eb6" x="132.8275" y="65.88235294117646" width="17.420000000000016" height="100px"></rect>

                                                                <rect data-value="-3" fill="#FB3E7A" x="154.6025" y="74.11764705882354" width="19.420000000000016" height="100px"></rect>

                                                                <rect data-value="6" fill="#3693FF" x="176.3775" y="24.705882352941188" width="17.420000000000016" height="49.41176470588235"></rect><rect data-value="-5" fill="#0E8A74" x="198.15249999999997" y="74.11764705882354" width="17.420000000000016" height="41.17647058823529"></rect><rect data-value="9" fill="#FB3E7A" x="219.9275" y="0" width="17.419999999999987" height="74.11764705882354"></rect><rect data-value="2" fill="#3693FF" x="241.70250000000001" y="57.647058823529406" width="17.419999999999987" height="16.47058823529413"></rect><rect data-value="-8" fill="#0E8A74" x="263.4775" y="74.11764705882354" width="17.41999999999996" height="65.88235294117646"></rect><rect data-value="1" fill="#FB3E7A" x="285.2525" y="65.88235294117646" width="17.420000000000016" height="8.235294117647072"></rect><rect data-value="4" fill="#3693FF" x="307.02750000000003" y="41.17647058823529" width="17.41999999999996" height="32.941176470588246"></rect><rect data-value="8" fill="#0E8A74" x="328.8025" y="8.235294117647072" width="17.41999999999996" height="65.88235294117646"></rect><rect data-value="9" fill="#FB3E7A" x="350.5775" y="0" width="17.420000000000016" height="74.11764705882354"></rect><rect data-value="8" fill="#3693FF" x="372.3525" y="8.235294117647072" width="17.41999999999996" height="65.88235294117646"></rect><rect data-value="2" fill="#0E8A74" x="394.1275" y="57.647058823529406" width="17.41999999999996" height="16.47058823529413"></rect><rect data-value="1" fill="#FB3E7A" x="415.90250000000003" y="65.88235294117646" width="17.419999999999902" height="8.235294117647072"></rect></svg>
                                                            </div>
                                        </div>
                                </div>
                       </div>

                                       <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 " style="    border: 1px solid rgba(0,0,0,.125); height: 240px !important;    box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.05); max-width:24% !important; background-color:white;">
                                            <!-- Tab panes -->
                                            @php
                                                $user = Auth::user()
                                            @endphp
                                                <div class="tab-content" style="margin-top: 15px;">
                                                    <div role="tabpanel" class="tab-pane fade show active" id="first"  style="height: 213px;        overflow: hidden;">
                                                        <img class="img-fluid" src="{{ $user->image }}" alt="" style="height: 213px; width:213px; border-radius:5px;">
                                                    </div>
                                                     {{--  <h1 class="heading" style="left: 0 !important; text-align:center;">Shainki Asati</h1>  --}}
                                                </div>

                                        </div>
                                    </div>
                                </div>
        </div>
       <!-- <div class="col-xl-3 col-xxl-3 col-sm-6 ">
            <div class="card chart-bx">
             <div class="card-body pt-sm-4 pt-3 d-flex align-items-center justify-content-between"><h1>Welcome To Dashboard</h1>
                                            @php
                                                $user = Auth::user();
                                            @endphp
              <div class="me-3">

                                                <img style="background:black; height: 180px;width:198px; margin-top: -10px; margin-bottom:-7px; border-radius:5px; " src="{{ $user->image }}" alt="">
                                                <div class="name">
                                                    <h5>{{ $user->name }}</h5>
                                                </div>

              </div>

             </div>
            </div>
           </div> -->
        <div class="row">
        <div class="col-xl-12">
          <div class="row">
           <div class="col-xl-4 col-xxl-3 col-sm-6 ">
           <div class="widget-stat card">
            <a href="#">
           <div class="card-body p-4">
            <div class="media ai-icon">
             <span class="me-3 bgl-warning text-warning">
              <svg id="icon-orders" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
               <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
               <polyline points="14 2 14 8 20 8"></polyline>
               <line x1="16" y1="13" x2="8" y2="13"></line>
               <line x1="16" y1="17" x2="8" y2="17"></line>
               <polyline points="10 9 9 9 8 9"></polyline>
              </svg>
             </span>
             <div class="media-body">
              <p class="mb-1">Active Member</p>
              <h4 class="mb-0">2570</h4>
              <span class="badge badge-warning">+3.5%</span>
             </div>
            </div>
           </div></a>
          </div>
           </div>
           <div class="col-xl-4 col-xxl-3 col-sm-6 ">
           <div class="widget-stat card">
            <a href="#">
           <div class="card-body p-4">
            <div class="media ai-icon">
             <span class="me-3 bgl-success text-success">
              <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
               <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
               <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
               <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
              </svg>
             </span>
             <div class="media-body">
              <p class="mb-1">Total Enquiry</p>
              <h4 class="mb-0">364.50K</h4>
              <span class="badge badge-success">-3.5%</span>
             </div>
            </div>
           </div></a>
          </div>
           </div>
           <div class="col-xl-4 col-xxl-3 col-sm-6 ">
           <div class="widget-stat card">
            <a href="#">
           <div class="card-body  p-4">
            <div class="media ai-icon">
             <span class="me-3 bgl-danger text-danger">
              <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
               <line x1="12" y1="1" x2="12" y2="23"></line>
               <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
              </svg>
             </span>
             <div class="media-body">
              <p class="mb-1">Today Enquiry</p>
              <h4 class="mb-0">364.50K</h4>
              <span class="badge badge-danger">-3.5%</span>
             </div>
            </div>
           </div></a>
          </div>
           </div>


          </div>
         </div>
         <div class="col-xl-12">
          <div class="row">
           <div class="col-xl-4 col-xxl-3 col-sm-6 ">
           <div class="widget-stat card">
            <a href="">
           <div class="card-body p-4">
            <div class="media ai-icon">
             <span class="me-3 bgl-primary text-primary">
              <!-- <i class="ti-user"></i> -->
              <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
               <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
               <circle cx="12" cy="7" r="4"></circle>
              </svg>
             </span>
             <div class="media-body">
              <p class="mb-1">Patient</p>
              <h4 class="mb-0">3280</h4>
              <span class="badge badge-primary">+3.5%</span>
             </div>
            </div>
           </div></a>
          </div>
           </div>
           <div class="col-xl-4 col-xxl-3 col-sm-6 ">
           <div class="widget-stat card">
            <a href="#">
           <div class="card-body p-4">
            <div class="media ai-icon">
             <span class="me-3 bgl-success text-success">
              <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
               <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
               <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
               <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
              </svg>
             </span>
             <div class="media-body">
              <p class="mb-1">Total Enquiry</p>
              <h4 class="mb-0">364.50K</h4>
              <span class="badge badge-success">-3.5%</span>
             </div>
            </div>
           </div></a>
          </div>
           </div>
           <div class="col-xl-4 col-xxl-3 col-sm-6 ">
           <div class="widget-stat card">
            <a href="#">
           <div class="card-body  p-4">
            <div class="media ai-icon">
             <span class="me-3 bgl-danger text-danger">
              <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
               <line x1="12" y1="1" x2="12" y2="23"></line>
               <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
              </svg>
             </span>
             <div class="media-body">
              <p class="mb-1">Today Enquiry</p>
              <h4 class="mb-0">364.50K</h4>
              <span class="badge badge-danger">-3.5%</span>
             </div>
            </div>
           </div></a>
          </div>
           </div>


          </div>
         </div>

         <div class="col-xl-12">
          <div class="row">
           <div class="col-xl-6">
            <div class="card">
             <div class="card-header border-0 pb-0 flex-wrap">
              <h4 class="fs-20 font-w500">Best Selling</h4>
              <div class="card-action coin-tabs">
               <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                 <a class="nav-link active" data-bs-toggle="tab" href="#Monthly">
                  Monthly
                 </a>
                </li>
                <li class="nav-item">
                 <a class="nav-link " data-bs-toggle="tab" href="#Weekly">
                  Weekly
                 </a>
                </li>
                <li class="nav-item">
                 <a class="nav-link " data-bs-toggle="tab" href="#Daily">
                  Daily
                 </a>
                </li>
               </ul>
              </div>
             </div>
             <div class="card-body pt-2">
              <div class="tab-content">
               <div class="tab-pane fade active show" id="Monthly">
                <div class="d-sm-flex d-block align-items-center justify-content-center">
                 <div class="col-xl-6 col-xxl-5 text-center">
                  <div id="donutChart2" class="donutChart2 d-inline-block"></div>
                 </div>
                 <div class="col-xl-6 col-xxl-7">
                  <p class="fs-12 mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini</p>
                  <div class="d-flex  mt-4">
                   <div class="me-4">
                    <svg width="20" height="8" viewBox="0 0 20 8"  xmlns="http://www.w3.org/2000/svg">
                     <rect width="20" height="8" rx="4" fill="#FB3E7A"/>
                    </svg>
                    <h4 class="fs-18 text-black mb-0 font-w600">21,512</h4>
                    <span class="fs-14">Ticket Left</span>
                   </div>
                   <div class="me-4">
                    <svg class="primary-icon" width="20" height="8" viewBox="0 0 20 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <rect width="20" height="8" rx="4" fill="#4585ED"/>
                    </svg>
                    <h4 class="fs-18 text-black mb-0 font-w600">45,612</h4>
                    <span class="fs-14">Ticket Sold</span>
                   </div>
                   <div class="">
                    <svg width="20" height="8" viewBox="0 0 20 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <rect width="20" height="8" rx="4" fill="#C8C8C8"/>
                    </svg>
                    <h4 class="fs-18 text-black mb-0 font-w600">275</h4>
                    <span class="fs-14">Event Held</span>
                   </div>
                  </div>
                 </div>
                </div>
               </div>
               <div class="tab-pane fade" id="Weekly">
                <div class="d-sm-flex d-block align-items-center justify-content-center">
                 <div class="col-xl-6 col-xxl-5 text-center">
                  <div id="donutChart3" class="donutChart2 d-inline-block"></div>
                 </div>
                 <div class="col-xl-6 col-xxl-7">
                  <p class="fs-12 mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini</p>
                  <div class="d-flex  mt-4">
                   <div class="me-4">
                    <svg width="20" height="8" viewBox="0 0 20 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <rect width="20" height="8" rx="4" fill="#FB3E7A"/>
                    </svg>
                    <h4 class="fs-18 text-black mb-0 font-w600">21,512</h4>
                    <span class="fs-14">Ticket Left</span>
                   </div>
                   <div class="me-4">
                    <svg width="20" height="8" viewBox="0 0 20 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <rect width="20" height="8" rx="4" fill="#0E8A74"/>
                    </svg>
                    <h4 class="fs-18 text-black mb-0 font-w600">45,612</h4>
                    <span class="fs-14">Ticket Sold</span>
                   </div>
                   <div class="">
                    <svg width="20" height="8" viewBox="0 0 20 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <rect width="20" height="8" rx="4" fill="#C8C8C8"/>
                    </svg>
                    <h4 class="fs-18 text-black mb-0 font-w600">275</h4>
                    <span class="fs-14">Event Held</span>
                   </div>
                  </div>
                 </div>
                </div>
               </div>
               <div class="tab-pane fade" id="Daily">
                <div class="d-sm-flex d-block align-items-center justify-content-center">
                 <div class="col-xl-6 col-xxl-5 text-center">
                  <div id="donutChart4" class="donutChart2 d-inline-block"></div>
                 </div>
                 <div class="col-xl-6 col-xxl-7">
                  <p class="fs-12 mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini</p>
                  <div class="d-flex  mt-4">
                   <div class="me-4">
                    <svg width="20" height="8" viewBox="0 0 20 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <rect width="20" height="8" rx="4" fill="#FB3E7A"/>
                    </svg>
                    <h4 class="fs-18 text-black mb-0 font-w600">21,512</h4>
                    <span class="fs-14">Ticket Left</span>
                   </div>
                   <div class="me-4">
                    <svg width="20" height="8" viewBox="0 0 20 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <rect width="20" height="8" rx="4" fill="#0E8A74"/>
                    </svg>
                    <h4 class="fs-18 text-black mb-0 font-w600">45,612</h4>
                    <span class="fs-14">Ticket Sold</span>
                   </div>
                   <div class="">
                    <svg width="20" height="8" viewBox="0 0 20 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <rect width="20" height="8" rx="4" fill="#C8C8C8"/>
                    </svg>
                    <h4 class="fs-18 text-black mb-0 font-w600">275</h4>
                    <span class="fs-14">Event Held</span>
                   </div>
                  </div>
                 </div>
                </div>
               </div>
              </div>
             </div>
            </div>
           </div>
           <div class="col-xl-6">
            <div class="card bg-primary">
             <div class="card-body">
              <div class="d-sm-flex d-block pb-sm-3 align-items-end mb-2">
               <div class="me-auto pe-3 mb-3 mb-sm-0">
                <span class="chart-num-3 font-w200 d-block mb-sm-3 mb-2 text-white">Ticket Sold Today</span>
                <h2 class="chart-num-2 text-white mb-0">456,502<span class="fs-18 me-2 ms-3">pcs</span></h2>
               </div>
               <div class="d-flex flex-wrap mb-3 mb-sm-0">
                <svg width="87" height="58" viewBox="0 0 87 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <path d="M18.4571 37.6458C11.9375 44.6715 4.81049 52.3964 2 55.7162H68.8125C77.6491 55.7162 84.8125 48.5528 84.8125 39.7162V2L61.531 31.9333C56.8486 37.9536 48.5677 39.832 41.746 36.4211L37.3481 34.2222C30.9901 31.0432 23.2924 32.4352 18.4571 37.6458Z" fill="url(#paint0_linear)"/>
                 <path d="M2 55.7162C4.81049 52.3964 11.9375 44.6715 18.4571 37.6458C23.2924 32.4352 30.9901 31.0432 37.3481 34.2222L41.746 36.4211C48.5677 39.832 56.8486 37.9536 61.531 31.9333L84.8125 2" stroke="white" stroke-width="4" stroke-linecap="round"/>
                 <defs>
                 <linearGradient id="paint0_linear" x1="43.4062" y1="8.71453" x2="46.7635" y2="55.7162" gradientUnits="userSpaceOnUse">
                 <stop stop-color="white" offset="0"/>
                 <stop offset="1" stop-color="white" stop-opacity="0"/>
                 </linearGradient>
                 </defs>
                </svg>
                <div class="ms-3">
                 <p class="fs-20 mb-0 font-w500 text-white">+4%</p>
                 <span class="fs-12 text-white">than last day</span>
                </div>
               </div>
              </div>
              <div class="progress style-1" style="height:15px; " >
               <div class="progress-bar bg-white progress-animated" style="width: 55%; height:15px; " role="progressbar">
                <span class="sr-only">55% Complete</span>
                <span class="bg-white arrow"></span>
                <span class="font-w600 counter-bx text-black" style="background-color: blackl;"><strong class="counter font-w400">985pcs Left</strong></span>
               </div>
              </div>
              <p class="fs-12 text-white pt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini</p>
              <a href="javascript:void(0);" class="text-white">View detail<i class="las la-long-arrow-alt-right scale5 ms-3"></i></a>
             </div>
            </div>
           </div>
          </div>
         </div>
         <div class="col-xl-6 col-xxl-8">
          <div class="row">
           <div class="col-xl-12">
            <div class="card event-bx">
             <div class="card-header border-0 mb-0">
              <h4 class="fs-20">Recent Event List</h4>
              <div class="dropdown custom-dropdown mb-0 tbl-orders-style">
               <div class="btn sharp tp-btn" data-bs-toggle="dropdown">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#194039" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                 <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#194039" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                 <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#194039" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
               </div>
               <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="javascript:void(0);">Details</a>
                <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
               </div>
              </div>
             </div>
             <div class="card-body dz-scroll loadmore-content pt-0" id="EventListContent">
              <div class="media event-list pb-3 border-bottom mb-3">
               <div class="image">
                <img src="images/card/Untitled-15.jpg" alt="">
                <i class="las la-film image-icon"></i>
               </div>
               <div class="media-body">
                <h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);" class="text-black"> Envato International Online Meetup 2020</a></h4>
                <span class="fs-14 d-block mb-sm-3 mb-2 text-secondary">Medan, Indonesia</span>
                <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini</p>
               </div>
               <div class="media-footer">
                <div class="text-center">
                 <span class="ticket-icon-1 mb-3">
                  <i class="fa fa-usd" aria-hidden="true"></i>
                 </span>
                 <div class="fs-12 text-primary" style="color: #4585ED">$124,00</div>
                </div>
                <div class="text-center">
                 <span class="ticket-icon-1 mb-3">
                  <i class="fa fa-ticket" aria-hidden="true"></i>
                 </span>
                 <div class="fs-12 text-primary">561 pcs Left</div>
                </div>
                <div class="text-center">
                 <span class="ticket-icon-1 mb-3">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                 </span>
                 <div class="fs-12 text-primary">24 June 2020</div>
                </div>
               </div>
              </div>
              <div class="media event-list pb-3 border-bottom mb-3">
               <div class="image">
                <img src="images/card/Untitled-16.jpg" alt="">
                <i class="fa fa-music image-icon"></i>

               </div>
               <div class="media-body">
                <h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);" class="text-black"> Envato International Online Meetup 2020</a></h4>
                <span class="fs-14 d-block mb-sm-3 mb-2 text-secondary">Medan, Indonesia</span>
                <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini</p>
               </div>
               <div class="media-footer">
                <div class="text-center">
                 <span class="ticket-icon-1 mb-3">
                  <i class="fa fa-usd" aria-hidden="true"></i>
                 </span>
                 <div class="fs-12 text-primary">$124,00</div>
                </div>
                <div class="text-center">
                 <span class="ticket-icon-1 mb-3 disabled">
                  <i class="fa fa-ticket" aria-hidden="true"></i>
                 </span>
                 <div class="fs-12 text-primary">561 pcs Left</div>
                </div>
                <div class="text-center">
                 <span class="ticket-icon-1 mb-3">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                 </span>
                 <div class="fs-12 text-primary">24 June 2020</div>
                </div>
               </div>
              </div>
              <div class="media event-list pb-3 border-bottom mb-3">
               <div class="image">
                <img src="images/card/Untitled-17.jpg" alt="">
                <i class="fa fa-music image-icon"></i>

               </div>
               <div class="media-body">
                <h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);" class="text-black"> Envato International Online Meetup 2020</a></h4>
                <span class="fs-14 d-block mb-sm-3 mb-2 text-secondary">Medan, Indonesia</span>
                <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini</p>
               </div>
               <div class="media-footer">
                <div class="text-center">
                 <span class="ticket-icon-1 mb-3">
                  <i class="fa fa-usd" aria-hidden="true"></i>
                 </span>
                 <div class="fs-12 text-primary">$124,00</div>
                </div>
                <div class="text-center">
                 <span class="ticket-icon-1 mb-3 disabled">
                  <i class="fa fa-ticket" aria-hidden="true"></i>
                 </span>
                 <div class="fs-12 text-primary">561 pcs Left</div>
                </div>
                <div class="text-center">
                 <span class="ticket-icon-1 disabled mb-3">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                 </span>
                 <div class="fs-12 text-primary">24 June 2020</div>
                </div>
               </div>
              </div>
              <div class="media event-list pb-3 border-bottom mb-3">
               <div class="image">
                <img src="images/card/Untitled-15.jpg" alt="">
                <i class="fa fa-music image-icon"></i>

               </div>
               <div class="media-body">
                <h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);" class="text-black"> Envato International Online Meetup 2020</a></h4>
                <span class="fs-14 d-block mb-sm-3 mb-2 text-secondary">Medan, Indonesia</span>
                <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini</p>
               </div>
               <div class="media-footer">
                <div class="text-center">
                 <span class="ticket-icon-1 mb-3">
                  <i class="fa fa-usd" aria-hidden="true"></i>
                 </span>
                 <div class="fs-12 text-primary">$124,00</div>
                </div>
                <div class="text-center">
                 <span class="ticket-icon-1 mb-3 disabled">
                  <i class="fa fa-ticket" aria-hidden="true"></i>
                 </span>
                 <div class="fs-12 text-primary">561 pcs Left</div>
                </div>
                <div class="text-center">
                 <span class="ticket-icon-1 disabled mb-3">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                 </span>
                 <div class="fs-12 text-primary">24 June 2020</div>
                </div>
               </div>
              </div>
              <div class="media event-list pb-3 border-bottom mb-3">
               <div class="image">
                <img src="images/card/Untitled-16.jpg" alt="">
                <i class="fa fa-music image-icon"></i>

               </div>
               <div class="media-body">
                <h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);" class="text-black"> Envato International Online Meetup 2020</a></h4>
                <span class="fs-14 d-block mb-sm-3 mb-2 text-secondary">Medan, Indonesia</span>
                <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini</p>
               </div>
               <div class="media-footer">
                <div class="text-center">
                 <span class="ticket-icon-1 mb-3">
                  <i class="fa fa-usd text-primary" aria-hidden="true"></i>
                 </span>
                 <div class="fs-12 text-primary">$124,00</div>
                </div>
                <div class="text-center">
                 <span class="ticket-icon-1 mb-3 disabled">
                  <i class="fa fa-ticket" aria-hidden="true"></i>
                 </span>
                 <div class="fs-12 text-primary">561 pcs Left</div>
                </div>
                <div class="text-center">
                 <span class="ticket-icon-1 disabled mb-3">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                 </span>
                 <div class="fs-12 text-primary">24 June 2020</div>
                </div>
               </div>
              </div>
             </div>
             <div class="card-footer pt-0 border-0">
              <a href="javascript:void(0);" class="btn btn-secondary btn-lg btn-block text-white dz-load-more" id="EventList" rel="ajax/event-list.html">Load More</a>
             </div>
            </div>
           </div>

          </div>
         </div>
         <div class="col-xl-6 col-xxl-4">
          <div class="row">
           <div class="col-xl-12">
            <div class="card">
             <div class="card-body text-center event-calender pb-2">
              <input type='text' class="form-control d-none" id='datetimepicker1' />
             </div>
             <div class="card-header py-0 border-0">
              <h4 class="text-black fs-20">Upcoming Events</h4>
             </div>
             <div class="card-body pb-0">
              <div class="media mb-5 align-items-center event-list">
               <div class="p-3 text-center me-3 date-bx bgl-primary">
                <h2 class="mb-0 text-secondary fs-28 font-w600">3</h2>
                <h5 class="mb-1 text-black">Wed</h5>
               </div>
               <div class="media-body px-0">
                <h6 class="mt-0 mb-3 fs-14"><a class="text-black" href="event.html">Live Concert Choir Charity Event 2020</a></h6>
                <ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
                 <li>Ticket Sold</li>
                 <li>561/650</li>
                </ul>
                <div class="progress mb-0" style="height:4px; width:100%;">
                 <div class="progress-bar bg-warning progress-animated" style="width:60%; height:8px; background :aliceblue !important;" role="progressbar">
                  <span style="width:60%; height:8px; color:aliceblue !important; class="">60% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media mb-5 align-items-center event-list">
                            <div class="p-3 text-center me-3 date-bx bgl-primary">
                                <h2 class="mb-0 text-secondary fs-28 font-w600">16</h2>
                                <h5 class="mb-1 text-black">Wed</h5>
                            </div>
                            <div class="media-body px-0">
                                <h6 class="mt-0 mb-3 fs-14"><a class="text-black" href="event.html">Live Concert Choir
                                        Charity Event 2020</a></h6>
                                <ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
                                    <li>Ticket Sold</li>
                                    <li>431/650</li>
                                </ul>
                                <div class="progress mb-0" style="height:4px; width:100%;">
                                    <div class="progress-bar bg-warning progress-animated"
                                        style="width:50%; height:8px;" role="progressbar">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media mb-5 align-items-center event-list">
                            <div class="p-3 text-center me-3 date-bx bgl-primary">
                                <h2 class="mb-0 text-primary fs-28 font-w600">28</h2>
                                <h5 class="mb-1 text-black">Wed</h5>
                            </div>
                            <div class="media-body px-0">
                                <h6 class="mt-0 mb-3 fs-14"><a class="text-black" href="event.html">Live Concert Choir
                                        Charity Event 2020</a></h6>
                                <ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
                                    <li>Ticket Sold</li>
                                    <li>650/650</li>
                                </ul>
                                <div class="progress mb-0" style="height:4px; width:100%;">
                                    <div class="progress-bar bg-warning progress-animated"
                                        style="width:100%; height:8px;" role="progressbar">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer pt-0 border-0">
                        <a href="javascript:void(0);" class="btn btn-secondary btn-block text-white">Load More</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-xl-6 col-xxl-12">
        <div class="card latest-sales-bx">
            <div class="card-header border-0 mb-0">
                <h4 class="fs-20">Latest Sales</h4>
                <div class="dropdown custom-dropdown mb-0 tbl-orders-style">
                    <div class="btn sharp tp-btn" data-bs-toggle="dropdown">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                stroke="#194039" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                stroke="#194039" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                stroke="#194039" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="javascript:void(0);">Details</a>
                        <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                    </div>
                </div>
            </div>
            <div class="card-body pb-0 dz-scroll loadmore-content pt-0" id="LatestSalesContent">
                <div class="media pb-3 border-bottom mb-3 align-items-center">
                    <div class="media-image me-2">
                        <img src="images/contacts/pic1.jpg" alt="">
                    </div>
                    <div class="media-body">
                        <h6 class="fs-16 mb-0">Olivia Johanson</h6>
                        <div class="d-flex">
                            <span class="fs-14 me-auto text-secondary"><i class="fa fa-ticket me-1"></i>High Performance
                                Conert 2020..</span>
                            <span class="fs-14 text-nowrap">2m ago</span>
                        </div>
                    </div>
                </div>
                <div class="media pb-3 border-bottom mb-3 align-items-center">
                    <div class="media-image me-2">
                        <img src="images/contacts/pic2.jpg" alt="">
                    </div>
                    <div class="media-body">
                        <h6 class="fs-16 mb-0">Griezerman</h6>
                        <div class="d-flex">
                            <span class="fs-14 me-auto text-secondary"><i class="fa fa-ticket me-1"></i>Fireworks Show
                                New Year 2020</span>
                            <span class="fs-14 text-nowrap">5m ago</span>
                        </div>
                    </div>
                </div>
                <div class="media pb-3 border-bottom mb-3 align-items-center">
                    <div class="media-image me-2">
                        <img src="images/contacts/pic3.jpg" alt="">
                    </div>
                    <div class="media-body">
                        <h6 class="fs-16 mb-0">Uli Trumb</h6>
                        <div class="d-flex">
                            <span class="fs-14 me-auto text-secondary"><i class="fa fa-ticket me-1"></i>High Performance
                                Conert 2020..</span>
                            <span class="fs-14 text-nowrap">8m ago</span>
                        </div>
                    </div>
                </div>
                <div class="media pb-3 border-bottom mb-3 align-items-center">
                    <div class="media-image me-2">
                        <img src="images/contacts/pic1.jpg" alt="">
                    </div>
                    <div class="media-body">
                        <h6 class="fs-16 mb-0">Oconner</h6>
                        <div class="d-flex">
                            <span class="fs-14 me-auto text-secondary"><i class="fa fa-ticket me-1"></i>High Performance
                                Conert 2020..</span>
                            <span class="fs-14 text-nowrap">9m ago</span>
                        </div>
                    </div>
                </div>
                <div class="media pb-3 border-bottom mb-3 align-items-center">
                    <div class="media-image me-2">
                        <img src="images/contacts/pic1.jpg" alt="">
                    </div>
                    <div class="media-body">
                        <h6 class="fs-16 mb-0">Oconner</h6>
                        <div class="d-flex">
                            <span class="fs-14 me-auto text-secondary"><i class="fa fa-ticket me-1"></i>High Performance
                                Conert 2020..</span>
                            <span class="fs-14 text-nowrap">9m ago</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer style-1 border-0 px-0">
                <a href="javascript:void();" class="dz-load-more fa fa-long-arrow-down text-secondary"
                    id="LatestSales" rel="ajax/latest-sales.html"></a>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-xxl-12">
        <div class="card">
            <div class="card-header border-0 flex-wrap pb-0">
                <h4 class="fs-20 font-w500 text-black">Sales Revenue</h4>
                <div class="card-action coin-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#Monthly1">
                                Monthly
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-bs-toggle="tab" href="#Weekly1">
                                Weekly
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-bs-toggle="tab" href="#Daily1">
                                Daily
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body pb-2">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="Monthly1">
                        <div id="salesChart" class="chart-primary"></div>
                    </div>
                    <div class="tab-pane fade" id="Weekly1">
                        <div id="salesChart1" class="chart-primary"></div>

                    </div>
                    <div class="tab-pane fade" id="Daily1">
                        <div id="salesChart2" class="chart-primary"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    </div>
    <!--**********************************
                Content body end
            ***********************************-->




    <!--**********************************
               Support ticket button start
            ***********************************-->

    <!--**********************************
               Support ticket button end
            ***********************************-->

    <script>
        /**
         * Owl Carousel v2.2.1
         * Copyright 2013-2017 David Deutsch
         * Licensed under  ()
         */
        ! function(a, b, c, d) {
            function e(b, c) {
                this.settings = null,
                    this.options = a.extend({}, e.Defaults, c),
                    this.$element = a(b),
                    this._handlers = {},
                    this._plugins = {},
                    this._supress = {},
                    this._current = null,
                    this._speed = null,
                    this._coordinates = [],
                    this._breakpoint = null,
                    this._width = null,
                    this._items = [],
                    this._clones = [],
                    this._mergers = [],
                    this._widths = [],
                    this._invalidated = {},
                    this._pipe = [],
                    this._drag = {
                        time: null,
                        target: null,
                        pointer: null,
                        stage: {
                            start: null,
                            current: null
                        },
                        direction: null
                    },
                    this._states = {
                        current: {},
                        tags: {
                            initializing: ["busy"],
                            animating: ["busy"],
                            dragging: ["interacting"]
                        }
                    },
                    a.each(["onResize", "onThrottledResize"], a.proxy(function(b, c) {
                        this._handlers[c] = a.proxy(this[c], this)
                    }, this)),
                    a.each(e.Plugins, a.proxy(function(a, b) {
                        this._plugins[a.charAt(0).toLowerCase() + a.slice(1)] = new b(this)
                    }, this)),
                    a.each(e.Workers, a.proxy(function(b, c) {
                        this._pipe.push({
                            filter: c.filter,
                            run: a.proxy(c.run, this)
                        })
                    }, this)),
                    this.setup(),
                    this.initialize()
            }
            e.Defaults = {
                    items: 3,
                    loop: !1,
                    center: !1,
                    rewind: !1,
                    mouseDrag: !0,
                    touchDrag: !0,
                    pullDrag: !0,
                    freeDrag: !1,
                    margin: 0,
                    stagePadding: 0,
                    merge: !1,
                    mergeFit: !0,
                    autoWidth: !1,
                    startPosition: 0,
                    rtl: !1,
                    smartSpeed: 250,
                    fluidSpeed: !1,
                    dragEndSpeed: !1,
                    responsive: {},
                    responsiveRefreshRate: 200,
                    responsiveBaseElement: b,
                    fallbackEasing: "swing",
                    info: !1,
                    nestedItemSelector: !1,
                    itemElement: "div",
                    stageElement: "div",
                    refreshClass: "owl-refresh",
                    loadedClass: "owl-loaded",
                    loadingClass: "owl-loading",
                    rtlClass: "owl-rtl",
                    responsiveClass: "owl-responsive",
                    dragClass: "owl-drag",
                    itemClass: "owl-item",
                    stageClass: "owl-stage",
                    stageOuterClass: "owl-stage-outer",
                    grabClass: "owl-grab"
                },
                e.Width = {
                    Default: "default",
                    Inner: "inner",
                    Outer: "outer"
                },
                e.Type = {
                    Event: "event",
                    State: "state"
                },
                e.Plugins = {},
                e.Workers = [{
                    filter: ["width", "settings"],
                    run: function() {
                        this._width = this.$element.width()
                    }
                }, {
                    filter: ["width", "items", "settings"],
                    run: function(a) {
                        a.current = this._items && this._items[this.relative(this._current)]
                    }
                }, {
                    filter: ["items", "settings"],
                    run: function() {
                        this.$stage.children(".cloned").remove()
                    }
                }, {
                    filter: ["width", "items", "settings"],
                    run: function(a) {
                        var b = this.settings.margin || "",
                            c = !this.settings.autoWidth,
                            d = this.settings.rtl,
                            e = {
                                width: "auto",
                                "margin-left": d ? b : "",
                                "margin-right": d ? "" : b
                            };
                        !c && this.$stage.children().css(e),
                            a.css = e
                    }
                }, {
                    filter: ["width", "items", "settings"],
                    run: function(a) {
                        var b = (this.width() / this.settings.items).toFixed(3) - this.settings.margin,
                            c = null,
                            d = this._items.length,
                            e = !this.settings.autoWidth,
                            f = [];
                        for (a.items = {
                                merge: !1,
                                width: b
                            }; d--;)
                            c = this._mergers[d],
                            c = this.settings.mergeFit && Math.min(c, this.settings.items) || c,
                            a.items.merge = c > 1 || a.items.merge,
                            f[d] = e ? b * c : this._items[d].width();
                        this._widths = f
                    }
                }, {
                    filter: ["items", "settings"],
                    run: function() {
                        var b = [],
                            c = this._items,
                            d = this.settings,
                            e = Math.max(2 * d.items, 4),
                            f = 2 * Math.ceil(c.length / 2),
                            g = d.loop && c.length ? d.rewind ? e : Math.max(e, f) : 0,
                            h = "",
                            i = "";
                        for (g /= 2; g--;)
                            b.push(this.normalize(b.length / 2, !0)),
                            h += c[b[b.length - 1]][0].outerHTML,
                            b.push(this.normalize(c.length - 1 - (b.length - 1) / 2, !0)),
                            i = c[b[b.length - 1]][0].outerHTML + i;
                        this._clones = b,
                            a(h).addClass("cloned").appendTo(this.$stage),
                            a(i).addClass("cloned").prependTo(this.$stage)
                    }
                }, {
                    filter: ["width", "items", "settings"],
                    run: function() {
                        for (var a = this.settings.rtl ? 1 : -1, b = this._clones.length + this._items.length, c = -
                                1, d = 0, e = 0, f = []; ++c < b;)
                            d = f[c - 1] || 0,
                            e = this._widths[this.relative(c)] + this.settings.margin,
                            f.push(d + e * a);
                        this._coordinates = f
                    }
                }, {
                    filter: ["width", "items", "settings"],
                    run: function() {
                        var a = this.settings.stagePadding,
                            b = this._coordinates,
                            c = {
                                width: Math.ceil(Math.abs(b[b.length - 1])) + 2 * a,
                                "padding-left": a || "",
                                "padding-right": a || ""
                            };
                        this.$stage.css(c)
                    }
                }, {
                    filter: ["width", "items", "settings"],
                    run: function(a) {
                        var b = this._coordinates.length,
                            c = !this.settings.autoWidth,
                            d = this.$stage.children();
                        if (c && a.items.merge)
                            for (; b--;)
                                a.css.width = this._widths[this.relative(b)],
                                d.eq(b).css(a.css);
                        else
                            c && (a.css.width = a.items.width,
                                d.css(a.css))
                    }
                }, {
                    filter: ["items"],
                    run: function() {
                        this._coordinates.length < 1 && this.$stage.removeAttr("style")
                    }
                }, {
                    filter: ["width", "items", "settings"],
                    run: function(a) {
                        a.current = a.current ? this.$stage.children().index(a.current) : 0,
                            a.current = Math.max(this.minimum(), Math.min(this.maximum(), a.current)),
                            this.reset(a.current)
                    }
                }, {
                    filter: ["position"],
                    run: function() {
                        this.animate(this.coordinates(this._current))
                    }
                }, {
                    filter: ["width", "position", "items", "settings"],
                    run: function() {
                        var a, b, c, d, e = this.settings.rtl ? 1 : -1,
                            f = 2 * this.settings.stagePadding,
                            g = this.coordinates(this.current()) + f,
                            h = g + this.width() * e,
                            i = [];
                        for (c = 0,
                            d = this._coordinates.length; c < d; c++)
                            a = this._coordinates[c - 1] || 0,
                            b = Math.abs(this._coordinates[c]) + f * e,
                            (this.op(a, "<=", g) && this.op(a, ">", h) || this.op(b, "<", g) && this.op(b, ">",
                            h)) && i.push(c);
                        this.$stage.children(".active").removeClass("active"),
                            this.$stage.children(":eq(" + i.join("), :eq(") + ")").addClass("active"),
                            this.settings.center && (this.$stage.children(".center").removeClass("center"),
                                this.$stage.children().eq(this.current()).addClass("center"))
                    }
                }],
                e.prototype.initialize = function() {
                    if (this.enter("initializing"),
                        this.trigger("initialize"),
                        this.$element.toggleClass(this.settings.rtlClass, this.settings.rtl),
                        this.settings.autoWidth && !this.is("pre-loading")) {
                        var b, c, e;
                        b = this.$element.find("img"),
                            c = this.settings.nestedItemSelector ? "." + this.settings.nestedItemSelector : d,
                            e = this.$element.children(c).width(),
                            b.length && e <= 0 && this.preloadAutoWidthImages(b)
                    }
                    this.$element.addClass(this.options.loadingClass),
                        this.$stage = a("<" + this.settings.stageElement + ' class="' + this.settings.stageClass + '"/>')
                        .wrap('<div class="' + this.settings.stageOuterClass + '"/>'),
                        this.$element.append(this.$stage.parent()),
                        this.replace(this.$element.children().not(this.$stage.parent())),
                        this.$element.is(":visible") ? this.refresh() : this.invalidate("width"),
                        this.$element.removeClass(this.options.loadingClass).addClass(this.options.loadedClass),
                        this.registerEventHandlers(),
                        this.leave("initializing"),
                        this.trigger("initialized")
                },
                e.prototype.setup = function() {
                    var b = this.viewport(),
                        c = this.options.responsive,
                        d = -1,
                        e = null;
                    c ? (a.each(c, function(a) {
                                a <= b && a > d && (d = Number(a))
                            }),
                            e = a.extend({}, this.options, c[d]),
                            "function" == typeof e.stagePadding && (e.stagePadding = e.stagePadding()),
                            delete e.responsive,
                            e.responsiveClass && this.$element.attr("class", this.$element.attr("class").replace(new RegExp(
                                "(" + this.options.responsiveClass + "-)\\S+\\s", "g"), "$1" + d))) : e = a.extend({}, this
                            .options),
                        this.trigger("change", {
                            property: {
                                name: "settings",
                                value: e
                            }
                        }),
                        this._breakpoint = d,
                        this.settings = e,
                        this.invalidate("settings"),
                        this.trigger("changed", {
                            property: {
                                name: "settings",
                                value: this.settings
                            }
                        })
                },
                e.prototype.optionsLogic = function() {
                    this.settings.autoWidth && (this.settings.stagePadding = !1,
                        this.settings.merge = !1)
                },
                e.prototype.prepare = function(b) {
                    var c = this.trigger("prepare", {
                        content: b
                    });
                    return c.data || (c.data = a("<" + this.settings.itemElement + "/>").addClass(this.options.itemClass)
                            .append(b)),
                        this.trigger("prepared", {
                            content: c.data
                        }),
                        c.data
                },
                e.prototype.update = function() {
                    for (var b = 0, c = this._pipe.length, d = a.proxy(function(a) {
                            return this[a]
                        }, this._invalidated), e = {}; b < c;)
                        (this._invalidated.all || a.grep(this._pipe[b].filter, d).length > 0) && this._pipe[b].run(e),
                        b++;
                    this._invalidated = {},
                        !this.is("valid") && this.enter("valid")
                },
                e.prototype.width = function(a) {
                    switch (a = a || e.Width.Default) {
                        case e.Width.Inner:
                        case e.Width.Outer:
                            return this._width;
                        default:
                            return this._width - 2 * this.settings.stagePadding + this.settings.margin
                    }
                },
                e.prototype.refresh = function() {
                    this.enter("refreshing"),
                        this.trigger("refresh"),
                        this.setup(),
                        this.optionsLogic(),
                        this.$element.addClass(this.options.refreshClass),
                        this.update(),
                        this.$element.removeClass(this.options.refreshClass),
                        this.leave("refreshing"),
                        this.trigger("refreshed")
                },
                e.prototype.onThrottledResize = function() {
                    b.clearTimeout(this.resizeTimer),
                        this.resizeTimer = b.setTimeout(this._handlers.onResize, this.settings.responsiveRefreshRate)
                },
                e.prototype.onResize = function() {
                    return !!this._items.length && (this._width !== this.$element.width() && (!!this.$element.is(
                        ":visible") && (this.enter("resizing"),
                            this.trigger("resize").isDefaultPrevented() ? (this.leave("resizing"),
                                !1) : (this.invalidate("width"),
                                this.refresh(),
                                this.leave("resizing"),
                                void this.trigger("resized")))))
                },
                e.prototype.registerEventHandlers = function() {
                    a.support.transition && this.$stage.on(a.support.transition.end + ".owl.core", a.proxy(this
                            .onTransitionEnd, this)),
                        this.settings.responsive !== !1 && this.on(b, "resize", this._handlers.onThrottledResize),
                        this.settings.mouseDrag && (this.$element.addClass(this.options.dragClass),
                            this.$stage.on("mousedown.owl.core", a.proxy(this.onDragStart, this)),
                            this.$stage.on("dragstart.owl.core selectstart.owl.core", function() {
                                return !1
                            })),
                        this.settings.touchDrag && (this.$stage.on("touchstart.owl.core", a.proxy(this.onDragStart, this)),
                            this.$stage.on("touchcancel.owl.core", a.proxy(this.onDragEnd, this)))
                },
                e.prototype.onDragStart = function(b) {
                    var d = null;
                    3 !== b.which && (a.support.transform ? (d = this.$stage.css("transform").replace(/.*\(|\)| /g, "")
                            .split(","),
                            d = {
                                x: d[16 === d.length ? 12 : 4],
                                y: d[16 === d.length ? 13 : 5]
                            }) : (d = this.$stage.position(),
                            d = {
                                x: this.settings.rtl ? d.left + this.$stage.width() - this.width() + this.settings
                                    .margin : d.left,
                                y: d.top
                            }),
                        this.is("animating") && (a.support.transform ? this.animate(d.x) : this.$stage.stop(),
                            this.invalidate("position")),
                        this.$element.toggleClass(this.options.grabClass, "mousedown" === b.type),
                        this.speed(0),
                        this._drag.time = (new Date).getTime(),
                        this._drag.target = a(b.target),
                        this._drag.stage.start = d,
                        this._drag.stage.current = d,
                        this._drag.pointer = this.pointer(b),
                        a(c).on("mouseup.owl.core touchend.owl.core", a.proxy(this.onDragEnd, this)),
                        a(c).one("mousemove.owl.core touchmove.owl.core", a.proxy(function(b) {
                            var d = this.difference(this._drag.pointer, this.pointer(b));
                            a(c).on("mousemove.owl.core touchmove.owl.core", a.proxy(this.onDragMove, this)),
                                Math.abs(d.x) < Math.abs(d.y) && this.is("valid") || (b.preventDefault(),
                                    this.enter("dragging"),
                                    this.trigger("drag"))
                        }, this)))
                },
                e.prototype.onDragMove = function(a) {
                    var b = null,
                        c = null,
                        d = null,
                        e = this.difference(this._drag.pointer, this.pointer(a)),
                        f = this.difference(this._drag.stage.start, e);
                    this.is("dragging") && (a.preventDefault(),
                        this.settings.loop ? (b = this.coordinates(this.minimum()),
                            c = this.coordinates(this.maximum() + 1) - b,
                            f.x = ((f.x - b) % c + c) % c + b) : (b = this.settings.rtl ? this.coordinates(this
                            .maximum()) : this.coordinates(this.minimum()),
                            c = this.settings.rtl ? this.coordinates(this.minimum()) : this.coordinates(this.maximum()),
                            d = this.settings.pullDrag ? -1 * e.x / 5 : 0,
                            f.x = Math.max(Math.min(f.x, b + d), c + d)),
                        this._drag.stage.current = f,
                        this.animate(f.x))
                },
                e.prototype.onDragEnd = function(b) {
                    var d = this.difference(this._drag.pointer, this.pointer(b)),
                        e = this._drag.stage.current,
                        f = d.x > 0 ^ this.settings.rtl ? "left" : "right";
                    a(c).off(".owl.core"),
                        this.$element.removeClass(this.options.grabClass),
                        (0 !== d.x && this.is("dragging") || !this.is("valid")) && (this.speed(this.settings.dragEndSpeed ||
                                this.settings.smartSpeed),
                            this.current(this.closest(e.x, 0 !== d.x ? f : this._drag.direction)),
                            this.invalidate("position"),
                            this.update(),
                            this._drag.direction = f,
                            (Math.abs(d.x) > 3 || (new Date).getTime() - this._drag.time > 300) && this._drag.target.one(
                                "click.owl.core",
                                function() {
                                    return !1
                                })),
                        this.is("dragging") && (this.leave("dragging"),
                            this.trigger("dragged"))
                },
                e.prototype.closest = function(b, c) {
                    var d = -1,
                        e = 30,
                        f = this.width(),
                        g = this.coordinates();
                    return this.settings.freeDrag || a.each(g, a.proxy(function(a, h) {
                            return "left" === c && b > h - e && b < h + e ? d = a : "right" === c && b > h - f -
                                e && b < h - f + e ? d = a + 1 : this.op(b, "<", h) && this.op(b, ">", g[a + 1] ||
                                    h - f) && (d = "left" === c ? a + 1 : a),
                                d === -1
                        }, this)),
                        this.settings.loop || (this.op(b, ">", g[this.minimum()]) ? d = b = this.minimum() : this.op(b, "<",
                            g[this.maximum()]) && (d = b = this.maximum())),
                        d
                },
                e.prototype.animate = function(b) {
                    var c = this.speed() > 0;
                    this.is("animating") && this.onTransitionEnd(),
                        c && (this.enter("animating"),
                            this.trigger("translate")),
                        a.support.transform3d && a.support.transition ? this.$stage.css({
                            transform: "translate3d(" + b + "px,0px,0px)",
                            transition: this.speed() / 1e3 + "s"
                        }) : c ? this.$stage.animate({
                            left: b + "px"
                        }, this.speed(), this.settings.fallbackEasing, a.proxy(this.onTransitionEnd, this)) : this.$stage
                        .css({
                            left: b + "px"
                        })
                },
                e.prototype.is = function(a) {
                    return this._states.current[a] && this._states.current[a] > 0
                },
                e.prototype.current = function(a) {
                    if (a === d)
                        return this._current;
                    if (0 === this._items.length)
                        return d;
                    if (a = this.normalize(a),
                        this._current !== a) {
                        var b = this.trigger("change", {
                            property: {
                                name: "position",
                                value: a
                            }
                        });
                        b.data !== d && (a = this.normalize(b.data)),
                            this._current = a,
                            this.invalidate("position"),
                            this.trigger("changed", {
                                property: {
                                    name: "position",
                                    value: this._current
                                }
                            })
                    }
                    return this._current
                },
                e.prototype.invalidate = function(b) {
                    return "string" === a.type(b) && (this._invalidated[b] = !0,
                            this.is("valid") && this.leave("valid")),
                        a.map(this._invalidated, function(a, b) {
                            return b
                        })
                },
                e.prototype.reset = function(a) {
                    a = this.normalize(a),
                        a !== d && (this._speed = 0,
                            this._current = a,
                            this.suppress(["translate", "translated"]),
                            this.animate(this.coordinates(a)),
                            this.release(["translate", "translated"]))
                },
                e.prototype.normalize = function(a, b) {
                    var c = this._items.length,
                        e = b ? 0 : this._clones.length;
                    return !this.isNumeric(a) || c < 1 ? a = d : (a < 0 || a >= c + e) && (a = ((a - e / 2) % c + c) % c +
                            e / 2),
                        a
                },
                e.prototype.relative = function(a) {
                    return a -= this._clones.length / 2,
                        this.normalize(a, !0)
                },
                e.prototype.maximum = function(a) {
                    var b, c, d, e = this.settings,
                        f = this._coordinates.length;
                    if (e.loop)
                        f = this._clones.length / 2 + this._items.length - 1;
                    else if (e.autoWidth || e.merge) {
                        for (b = this._items.length,
                            c = this._items[--b].width(),
                            d = this.$element.width(); b-- && (c += this._items[b].width() + this.settings.margin,
                                !(c > d));)
                        ;
                        f = b + 1
                    } else
                        f = e.center ? this._items.length - 1 : this._items.length - e.items;
                    return a && (f -= this._clones.length / 2),
                        Math.max(f, 0)
                },
                e.prototype.minimum = function(a) {
                    return a ? 0 : this._clones.length / 2
                },
                e.prototype.items = function(a) {
                    return a === d ? this._items.slice() : (a = this.normalize(a, !0),
                        this._items[a])
                },
                e.prototype.mergers = function(a) {
                    return a === d ? this._mergers.slice() : (a = this.normalize(a, !0),
                        this._mergers[a])
                },
                e.prototype.clones = function(b) {
                    var c = this._clones.length / 2,
                        e = c + this._items.length,
                        f = function(a) {
                            return a % 2 === 0 ? e + a / 2 : c - (a + 1) / 2
                        };
                    return b === d ? a.map(this._clones, function(a, b) {
                        return f(b)
                    }) : a.map(this._clones, function(a, c) {
                        return a === b ? f(c) : null
                    })
                },
                e.prototype.speed = function(a) {
                    return a !== d && (this._speed = a),
                        this._speed
                },
                e.prototype.coordinates = function(b) {
                    var c, e = 1,
                        f = b - 1;
                    return b === d ? a.map(this._coordinates, a.proxy(function(a, b) {
                        return this.coordinates(b)
                    }, this)) : (this.settings.center ? (this.settings.rtl && (e = -1,
                                f = b + 1),
                            c = this._coordinates[b],
                            c += (this.width() - c + (this._coordinates[f] || 0)) / 2 * e) : c = this._coordinates[f] ||
                        0,
                        c = Math.ceil(c))
                },
                e.prototype.duration = function(a, b, c) {
                    return 0 === c ? 0 : Math.min(Math.max(Math.abs(b - a), 1), 6) * Math.abs(c || this.settings.smartSpeed)
                },
                e.prototype.to = function(a, b) {
                    var c = this.current(),
                        d = null,
                        e = a - this.relative(c),
                        f = (e > 0) - (e < 0),
                        g = this._items.length,
                        h = this.minimum(),
                        i = this.maximum();
                    this.settings.loop ? (!this.settings.rewind && Math.abs(e) > g / 2 && (e += f * -1 * g),
                            a = c + e,
                            d = ((a - h) % g + g) % g + h,
                            d !== a && d - e <= i && d - e > 0 && (c = d - e,
                                a = d,
                                this.reset(c))) : this.settings.rewind ? (i += 1,
                            a = (a % i + i) % i) : a = Math.max(h, Math.min(i, a)),
                        this.speed(this.duration(c, a, b)),
                        this.current(a),
                        this.$element.is(":visible") && this.update()
                },
                e.prototype.next = function(a) {
                    a = a || !1,
                        this.to(this.relative(this.current()) + 1, a)
                },
                e.prototype.prev = function(a) {
                    a = a || !1,
                        this.to(this.relative(this.current()) - 1, a)
                },
                e.prototype.onTransitionEnd = function(a) {
                    if (a !== d && (a.stopPropagation(),
                            (a.target || a.srcElement || a.originalTarget) !== this.$stage.get(0)))
                        return !1;
                    this.leave("animating"),
                        this.trigger("translated")
                },
                e.prototype.viewport = function() {
                    var d;
                    return this.options.responsiveBaseElement !== b ? d = a(this.options.responsiveBaseElement).width() : b
                        .innerWidth ? d = b.innerWidth : c.documentElement && c.documentElement.clientWidth ? d = c
                        .documentElement.clientWidth : console.warn("Can not detect viewport width."),
                        d
                },
                e.prototype.replace = function(b) {
                    this.$stage.empty(),
                        this._items = [],
                        b && (b = b instanceof jQuery ? b : a(b)),
                        this.settings.nestedItemSelector && (b = b.find("." + this.settings.nestedItemSelector)),
                        b.filter(function() {
                            return 1 === this.nodeType
                        }).each(a.proxy(function(a, b) {
                            b = this.prepare(b),
                                this.$stage.append(b),
                                this._items.push(b),
                                this._mergers.push(1 * b.find("[data-merge]").addBack("[data-merge]").attr(
                                    "data-merge") || 1)
                        }, this)),
                        this.reset(this.isNumeric(this.settings.startPosition) ? this.settings.startPosition : 0),
                        this.invalidate("items")
                },
                e.prototype.add = function(b, c) {
                    var e = this.relative(this._current);
                    c = c === d ? this._items.length : this.normalize(c, !0),
                        b = b instanceof jQuery ? b : a(b),
                        this.trigger("add", {
                            content: b,
                            position: c
                        }),
                        b = this.prepare(b),
                        0 === this._items.length || c === this._items.length ? (0 === this._items.length && this.$stage
                            .append(b),
                            0 !== this._items.length && this._items[c - 1].after(b),
                            this._items.push(b),
                            this._mergers.push(1 * b.find("[data-merge]").addBack("[data-merge]").attr("data-merge") || 1)
                            ) : (this._items[c].before(b),
                            this._items.splice(c, 0, b),
                            this._mergers.splice(c, 0, 1 * b.find("[data-merge]").addBack("[data-merge]").attr(
                                "data-merge") || 1)),
                        this._items[e] && this.reset(this._items[e].index()),
                        this.invalidate("items"),
                        this.trigger("added", {
                            content: b,
                            position: c
                        })
                },
                e.prototype.remove = function(a) {
                    a = this.normalize(a, !0),
                        a !== d && (this.trigger("remove", {
                                content: this._items[a],
                                position: a
                            }),
                            this._items[a].remove(),
                            this._items.splice(a, 1),
                            this._mergers.splice(a, 1),
                            this.invalidate("items"),
                            this.trigger("removed", {
                                content: null,
                                position: a
                            }))
                },
                e.prototype.preloadAutoWidthImages = function(b) {
                    b.each(a.proxy(function(b, c) {
                        this.enter("pre-loading"),
                            c = a(c),
                            a(new Image).one("load", a.proxy(function(a) {
                                c.attr("src", a.target.src),
                                    c.css("opacity", 1),
                                    this.leave("pre-loading"),
                                    !this.is("pre-loading") && !this.is("initializing") && this
                                    .refresh()
                            }, this)).attr("src", c.attr("src") || c.attr("data-src") || c.attr(
                                "data-src-retina"))
                    }, this))
                },
                e.prototype.destroy = function() {
                    this.$element.off(".owl.core"),
                        this.$stage.off(".owl.core"),
                        a(c).off(".owl.core"),
                        this.settings.responsive !== !1 && (b.clearTimeout(this.resizeTimer),
                            this.off(b, "resize", this._handlers.onThrottledResize));
                    for (var d in this._plugins)
                        this._plugins[d].destroy();
                    this.$stage.children(".cloned").remove(),
                        this.$stage.unwrap(),
                        this.$stage.children().contents().unwrap(),
                        this.$stage.children().unwrap(),
                        this.$element.removeClass(this.options.refreshClass).removeClass(this.options.loadingClass)
                        .removeClass(this.options.loadedClass).removeClass(this.options.rtlClass).removeClass(this.options
                            .dragClass).removeClass(this.options.grabClass).attr("class", this.$element.attr("class")
                            .replace(new RegExp(this.options.responsiveClass + "-\\S+\\s", "g"), "")).removeData(
                            "owl.carousel")
                },
                e.prototype.op = function(a, b, c) {
                    var d = this.settings.rtl;
                    switch (b) {
                        case "<":
                            return d ? a > c : a < c;
                        case ">":
                            return d ? a < c : a > c;
                        case ">=":
                            return d ? a <= c : a >= c;
                        case "<=":
                            return d ? a >= c : a <= c
                    }
                },
                e.prototype.on = function(a, b, c, d) {
                    a.addEventListener ? a.addEventListener(b, c, d) : a.attachEvent && a.attachEvent("on" + b, c)
                },
                e.prototype.off = function(a, b, c, d) {
                    a.removeEventListener ? a.removeEventListener(b, c, d) : a.detachEvent && a.detachEvent("on" + b, c)
                },
                e.prototype.trigger = function(b, c, d, f, g) {
                    var h = {
                            item: {
                                count: this._items.length,
                                index: this.current()
                            }
                        },
                        i = a.camelCase(a.grep(["on", b, d], function(a) {
                            return a
                        }).join("-").toLowerCase()),
                        j = a.Event([b, "owl", d || "carousel"].join(".").toLowerCase(), a.extend({
                            relatedTarget: this
                        }, h, c));
                    return this._supress[b] || (a.each(this._plugins, function(a, b) {
                                b.onTrigger && b.onTrigger(j)
                            }),
                            this.register({
                                type: e.Type.Event,
                                name: b
                            }),
                            this.$element.trigger(j),
                            this.settings && "function" == typeof this.settings[i] && this.settings[i].call(this, j)),
                        j
                },
                e.prototype.enter = function(b) {
                    a.each([b].concat(this._states.tags[b] || []), a.proxy(function(a, b) {
                        this._states.current[b] === d && (this._states.current[b] = 0),
                            this._states.current[b]++
                    }, this))
                },
                e.prototype.leave = function(b) {
                    a.each([b].concat(this._states.tags[b] || []), a.proxy(function(a, b) {
                        this._states.current[b]--
                    }, this))
                },
                e.prototype.register = function(b) {
                    if (b.type === e.Type.Event) {
                        if (a.event.special[b.name] || (a.event.special[b.name] = {}),
                            !a.event.special[b.name].owl) {
                            var c = a.event.special[b.name]._default;
                            a.event.special[b.name]._default = function(a) {
                                    return !c || !c.apply || a.namespace && a.namespace.indexOf("owl") !== -1 ? a
                                        .namespace && a.namespace.indexOf("owl") > -1 : c.apply(this, arguments)
                                },
                                a.event.special[b.name].owl = !0
                        }
                    } else
                        b.type === e.Type.State && (this._states.tags[b.name] ? this._states.tags[b.name] = this._states
                            .tags[b.name].concat(b.tags) : this._states.tags[b.name] = b.tags,
                            this._states.tags[b.name] = a.grep(this._states.tags[b.name], a.proxy(function(c, d) {
                                return a.inArray(c, this._states.tags[b.name]) === d
                            }, this)))
                },
                e.prototype.suppress = function(b) {
                    a.each(b, a.proxy(function(a, b) {
                        this._supress[b] = !0
                    }, this))
                },
                e.prototype.release = function(b) {
                    a.each(b, a.proxy(function(a, b) {
                        delete this._supress[b]
                    }, this))
                },
                e.prototype.pointer = function(a) {
                    var c = {
                        x: null,
                        y: null
                    };
                    return a = a.originalEvent || a || b.event,
                        a = a.touches && a.touches.length ? a.touches[0] : a.changedTouches && a.changedTouches.length ? a
                        .changedTouches[0] : a,
                        a.pageX ? (c.x = a.pageX,
                            c.y = a.pageY) : (c.x = a.clientX,
                            c.y = a.clientY),
                        c
                },
                e.prototype.isNumeric = function(a) {
                    return !isNaN(parseFloat(a))
                },
                e.prototype.difference = function(a, b) {
                    return {
                        x: a.x - b.x,
                        y: a.y - b.y
                    }
                },
                a.fn.owlCarousel = function(b) {
                    var c = Array.prototype.slice.call(arguments, 1);
                    return this.each(function() {
                        var d = a(this),
                            f = d.data("owl.carousel");
                        f || (f = new e(this, "object" == typeof b && b),
                                d.data("owl.carousel", f),
                                a.each(["next", "prev", "to", "destroy", "refresh", "replace", "add", "remove"],
                                    function(b, c) {
                                        f.register({
                                                type: e.Type.Event,
                                                name: c
                                            }),
                                            f.$element.on(c + ".owl.carousel.core", a.proxy(function(a) {
                                                a.namespace && a.relatedTarget !== this && (this.suppress([
                                                        c]),
                                                    f[c].apply(this, [].slice.call(arguments, 1)),
                                                    this.release([c]))
                                            }, f))
                                    })),
                            "string" == typeof b && "_" !== b.charAt(0) && f[b].apply(f, c)
                    })
                },
                a.fn.owlCarousel.Constructor = e
        }(window.Zepto || window.jQuery, window, document),
        function(a, b, c, d) {
            var e = function(b) {
                this._core = b,
                    this._interval = null,
                    this._visible = null,
                    this._handlers = {
                        "initialized.owl.carousel": a.proxy(function(a) {
                            a.namespace && this._core.settings.autoRefresh && this.watch()
                        }, this)
                    },
                    this._core.options = a.extend({}, e.Defaults, this._core.options),
                    this._core.$element.on(this._handlers)
            };
            e.Defaults = {
                    autoRefresh: !0,
                    autoRefreshInterval: 500
                },
                e.prototype.watch = function() {
                    this._interval || (this._visible = this._core.$element.is(":visible"),
                        this._interval = b.setInterval(a.proxy(this.refresh, this), this._core.settings
                            .autoRefreshInterval))
                },
                e.prototype.refresh = function() {
                    this._core.$element.is(":visible") !== this._visible && (this._visible = !this._visible,
                        this._core.$element.toggleClass("owl-hidden", !this._visible),
                        this._visible && this._core.invalidate("width") && this._core.refresh())
                },
                e.prototype.destroy = function() {
                    var a, c;
                    b.clearInterval(this._interval);
                    for (a in this._handlers)
                        this._core.$element.off(a, this._handlers[a]);
                    for (c in Object.getOwnPropertyNames(this))
                        "function" != typeof this[c] && (this[c] = null)
                },
                a.fn.owlCarousel.Constructor.Plugins.AutoRefresh = e
        }(window.Zepto || window.jQuery, window, document),
        function(a, b, c, d) {
            var e = function(b) {
                this._core = b,
                    this._loaded = [],
                    this._handlers = {
                        "initialized.owl.carousel change.owl.carousel resized.owl.carousel": a.proxy(function(b) {
                            if (b.namespace && this._core.settings && this._core.settings.lazyLoad && (b
                                    .property && "position" == b.property.name || "initialized" == b.type))
                                for (var c = this._core.settings, e = c.center && Math.ceil(c.items / 2) || c
                                        .items, f = c.center && e * -1 || 0, g = (b.property && b.property
                                            .value !== d ? b.property.value : this._core.current()) + f, h =
                                        this._core.clones().length, i = a.proxy(function(a, b) {
                                            this.load(b)
                                        }, this); f++ < e;)
                                    this.load(h / 2 + this._core.relative(g)),
                                    h && a.each(this._core.clones(this._core.relative(g)), i),
                                    g++
                        }, this)
                    },
                    this._core.options = a.extend({}, e.Defaults, this._core.options),
                    this._core.$element.on(this._handlers)
            };
            e.Defaults = {
                    lazyLoad: !1
                },
                e.prototype.load = function(c) {
                    var d = this._core.$stage.children().eq(c),
                        e = d && d.find(".owl-lazy");
                    !e || a.inArray(d.get(0), this._loaded) > -1 || (e.each(a.proxy(function(c, d) {
                            var e, f = a(d),
                                g = b.devicePixelRatio > 1 && f.attr("data-src-retina") || f.attr("data-src");
                            this._core.trigger("load", {
                                    element: f,
                                    url: g
                                }, "lazy"),
                                f.is("img") ? f.one("load.owl.lazy", a.proxy(function() {
                                    f.css("opacity", 1),
                                        this._core.trigger("loaded", {
                                            element: f,
                                            url: g
                                        }, "lazy")
                                }, this)).attr("src", g) : (e = new Image,
                                    e.onload = a.proxy(function() {
                                        f.css({
                                                "background-image": 'url("' + g + '")',
                                                opacity: "1"
                                            }),
                                            this._core.trigger("loaded", {
                                                element: f,
                                                url: g
                                            }, "lazy")
                                    }, this),
                                    e.src = g)
                        }, this)),
                        this._loaded.push(d.get(0)))
                },
                e.prototype.destroy = function() {
                    var a, b;
                    for (a in this.handlers)
                        this._core.$element.off(a, this.handlers[a]);
                    for (b in Object.getOwnPropertyNames(this))
                        "function" != typeof this[b] && (this[b] = null)
                },
                a.fn.owlCarousel.Constructor.Plugins.Lazy = e
        }(window.Zepto || window.jQuery, window, document),
        function(a, b, c, d) {
            var e = function(b) {
                this._core = b,
                    this._handlers = {
                        "initialized.owl.carousel refreshed.owl.carousel": a.proxy(function(a) {
                            a.namespace && this._core.settings.autoHeight && this.update()
                        }, this),
                        "changed.owl.carousel": a.proxy(function(a) {
                            a.namespace && this._core.settings.autoHeight && "position" == a.property.name &&
                                this.update()
                        }, this),
                        "loaded.owl.lazy": a.proxy(function(a) {
                            a.namespace && this._core.settings.autoHeight && a.element.closest("." + this._core
                                .settings.itemClass).index() === this._core.current() && this.update()
                        }, this)
                    },
                    this._core.options = a.extend({}, e.Defaults, this._core.options),
                    this._core.$element.on(this._handlers)
            };
            e.Defaults = {
                    autoHeight: !1,
                    autoHeightClass: "owl-height"
                },
                e.prototype.update = function() {
                    var b = this._core._current,
                        c = b + this._core.settings.items,
                        d = this._core.$stage.children().toArray().slice(b, c),
                        e = [],
                        f = 0;
                    a.each(d, function(b, c) {
                            e.push(a(c).height())
                        }),
                        f = Math.max.apply(null, e),
                        this._core.$stage.parent().height(f).addClass(this._core.settings.autoHeightClass)
                },
                e.prototype.destroy = function() {
                    var a, b;
                    for (a in this._handlers)
                        this._core.$element.off(a, this._handlers[a]);
                    for (b in Object.getOwnPropertyNames(this))
                        "function" != typeof this[b] && (this[b] = null)
                },
                a.fn.owlCarousel.Constructor.Plugins.AutoHeight = e
        }(window.Zepto || window.jQuery, window, document),
        function(a, b, c, d) {
            var e = function(b) {
                this._core = b,
                    this._videos = {},
                    this._playing = null,
                    this._handlers = {
                        "initialized.owl.carousel": a.proxy(function(a) {
                            a.namespace && this._core.register({
                                type: "state",
                                name: "playing",
                                tags: ["interacting"]
                            })
                        }, this),
                        "resize.owl.carousel": a.proxy(function(a) {
                            a.namespace && this._core.settings.video && this.isInFullScreen() && a
                                .preventDefault()
                        }, this),
                        "refreshed.owl.carousel": a.proxy(function(a) {
                            a.namespace && this._core.is("resizing") && this._core.$stage.find(
                                ".cloned .owl-video-frame").remove()
                        }, this),
                        "changed.owl.carousel": a.proxy(function(a) {
                            a.namespace && "position" === a.property.name && this._playing && this.stop()
                        }, this),
                        "prepared.owl.carousel": a.proxy(function(b) {
                            if (b.namespace) {
                                var c = a(b.content).find(".owl-video");
                                c.length && (c.css("display", "none"),
                                    this.fetch(c, a(b.content)))
                            }
                        }, this)
                    },
                    this._core.options = a.extend({}, e.Defaults, this._core.options),
                    this._core.$element.on(this._handlers),
                    this._core.$element.on("click.owl.video", ".owl-video-play-icon", a.proxy(function(a) {
                        this.play(a)
                    }, this))
            };
            e.Defaults = {
                    video: !1,
                    videoHeight: !1,
                    videoWidth: !1
                },
                e.prototype.fetch = function(a, b) {
                    var c = function() {
                            return a.attr("data-vimeo-id") ? "vimeo" : a.attr("data-vzaar-id") ? "vzaar" : "youtube"
                        }(),
                        d = a.attr("data-vimeo-id") || a.attr("data-youtube-id") || a.attr("data-vzaar-id"),
                        e = a.attr("data-width") || this._core.settings.videoWidth,
                        f = a.attr("data-height") || this._core.settings.videoHeight,
                        g = a.attr("href");
                    if (!g)
                        throw new Error("Missing video URL.");
                    if (d = g.match(
                            /(http:|https:|)\/\/(player.|www.|app.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com)|vzaar\.com)\/(video\/|videos\/|embed\/|channels\/.+\/|groups\/.+\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/
                            ),
                        d[3].indexOf("youtu") > -1)
                        c = "youtube";
                    else if (d[3].indexOf("vimeo") > -1)
                        c = "vimeo";
                    else {
                        if (!(d[3].indexOf("vzaar") > -1))
                            throw new Error("Video URL not supported.");
                        c = "vzaar"
                    }
                    d = d[6],
                        this._videos[g] = {
                            type: c,
                            id: d,
                            width: e,
                            height: f
                        },
                        b.attr("data-video", g),
                        this.thumbnail(a, this._videos[g])
                },
                e.prototype.thumbnail = function(b, c) {
                    var d, e, f, g = c.width && c.height ? 'style="width:' + c.width + "px;height:" + c.height + 'px;"' :
                        "",
                        h = b.find("img"),
                        i = "src",
                        j = "",
                        k = this._core.settings,
                        l = function(a) {
                            e = '<div class="owl-video-play-icon"></div>',
                                d = k.lazyLoad ? '<div class="owl-video-tn ' + j + '" ' + i + '="' + a + '"></div>' :
                                '<div class="owl-video-tn" style="opacity:1;background-image:url(' + a + ')"></div>',
                                b.after(d),
                                b.after(e)
                        };
                    if (b.wrap('<div class="owl-video-wrapper"' + g + "></div>"),
                        this._core.settings.lazyLoad && (i = "data-src",
                            j = "owl-lazy"),
                        h.length)
                        return l(h.attr(i)),
                            h.remove(),
                            !1;
                    "youtube" === c.type ? (f = "//img.youtube.com/vi/" + c.id + "/hqdefault.jpg",
                        l(f)) : "vimeo" === c.type ? a.ajax({
                        type: "GET",
                        url: "//vimeo.com/api/v2/video/" + c.id + ".json",
                        jsonp: "callback",
                        dataType: "jsonp",
                        success: function(a) {
                            f = a[0].thumbnail_large,
                                l(f)
                        }
                    }) : "vzaar" === c.type && a.ajax({
                        type: "GET",
                        url: "//vzaar.com/api/videos/" + c.id + ".json",
                        jsonp: "callback",
                        dataType: "jsonp",
                        success: function(a) {
                            f = a.framegrab_url,
                                l(f)
                        }
                    })
                },
                e.prototype.stop = function() {
                    this._core.trigger("stop", null, "video"),
                        this._playing.find(".owl-video-frame").remove(),
                        this._playing.removeClass("owl-video-playing"),
                        this._playing = null,
                        this._core.leave("playing"),
                        this._core.trigger("stopped", null, "video")
                },
                e.prototype.play = function(b) {
                    var c, d = a(b.target),
                        e = d.closest("." + this._core.settings.itemClass),
                        f = this._videos[e.attr("data-video")],
                        g = f.width || "100%",
                        h = f.height || this._core.$stage.height();
                    this._playing || (this._core.enter("playing"),
                        this._core.trigger("play", null, "video"),
                        e = this._core.items(this._core.relative(e.index())),
                        this._core.reset(e.index()),
                        "youtube" === f.type ? c = '<iframe width="' + g + '" height="' + h +
                        '" src="//www.youtube.com/embed/' + f.id + "?autoplay=1&rel=0&v=" + f.id +
                        '" frameborder="0" allowfullscreen></iframe>' : "vimeo" === f.type ? c =
                        '<iframe src="//player.vimeo.com/video/' + f.id + '?autoplay=1" width="' + g + '" height="' +
                        h + '" frameborder="0" Winkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>' :
                        "vzaar" === f.type && (c = '<iframe frameborder="0"height="' + h + '"width="' + g +
                            '" allowfullscreen mozallowfullscreen WinkitAllowFullScreen src="//view.vzaar.com/' + f.id +
                            '/player?autoplay=true"></iframe>'),
                        a('<div class="owl-video-frame">' + c + "</div>").insertAfter(e.find(".owl-video")),
                        this._playing = e.addClass("owl-video-playing"))
                },
                e.prototype.isInFullScreen = function() {
                    var b = c.fullscreenElement || c.mozFullScreenElement || c.WinkitFullscreenElement;
                    return b && a(b).parent().hasClass("owl-video-frame")
                },
                e.prototype.destroy = function() {
                    var a, b;
                    this._core.$element.off("click.owl.video");
                    for (a in this._handlers)
                        this._core.$element.off(a, this._handlers[a]);
                    for (b in Object.getOwnPropertyNames(this))
                        "function" != typeof this[b] && (this[b] = null)
                },
                a.fn.owlCarousel.Constructor.Plugins.Video = e
        }(window.Zepto || window.jQuery, window, document),
        function(a, b, c, d) {
            var e = function(b) {
                this.core = b,
                    this.core.options = a.extend({}, e.Defaults, this.core.options),
                    this.swapping = !0,
                    this.previous = d,
                    this.next = d,
                    this.handlers = {
                        "change.owl.carousel": a.proxy(function(a) {
                            a.namespace && "position" == a.property.name && (this.previous = this.core
                            .current(),
                                this.next = a.property.value)
                        }, this),
                        "drag.owl.carousel dragged.owl.carousel translated.owl.carousel": a.proxy(function(a) {
                            a.namespace && (this.swapping = "translated" == a.type)
                        }, this),
                        "translate.owl.carousel": a.proxy(function(a) {
                            a.namespace && this.swapping && (this.core.options.animateOut || this.core.options
                                .animateIn) && this.swap()
                        }, this)
                    },
                    this.core.$element.on(this.handlers)
            };
            e.Defaults = {
                    animateOut: !1,
                    animateIn: !1
                },
                e.prototype.swap = function() {
                    if (1 === this.core.settings.items && a.support.animation && a.support.transition) {
                        this.core.speed(0);
                        var b, c = a.proxy(this.clear, this),
                            d = this.core.$stage.children().eq(this.previous),
                            e = this.core.$stage.children().eq(this.next),
                            f = this.core.settings.animateIn,
                            g = this.core.settings.animateOut;
                        this.core.current() !== this.previous && (g && (b = this.core.coordinates(this.previous) - this.core
                                .coordinates(this.next),
                                d.one(a.support.animation.end, c).css({
                                    left: b + "px"
                                }).addClass("animated owl-animated-out").addClass(g)),
                            f && e.one(a.support.animation.end, c).addClass("animated owl-animated-in").addClass(f))
                    }
                },
                e.prototype.clear = function(b) {
                    a(b.target).css({
                            left: ""
                        }).removeClass("animated owl-animated-out owl-animated-in").removeClass(this.core.settings
                            .animateIn).removeClass(this.core.settings.animateOut),
                        this.core.onTransitionEnd()
                },
                e.prototype.destroy = function() {
                    var a, b;
                    for (a in this.handlers)
                        this.core.$element.off(a, this.handlers[a]);
                    for (b in Object.getOwnPropertyNames(this))
                        "function" != typeof this[b] && (this[b] = null)
                },
                a.fn.owlCarousel.Constructor.Plugins.Animate = e
        }(window.Zepto || window.jQuery, window, document),
        function(a, b, c, d) {
            var e = function(b) {
                this._core = b,
                    this._timeout = null,
                    this._paused = !1,
                    this._handlers = {
                        "changed.owl.carousel": a.proxy(function(a) {
                            a.namespace && "settings" === a.property.name ? this._core.settings.autoplay ? this
                                .play() : this.stop() : a.namespace && "position" === a.property.name && this
                                ._core.settings.autoplay && this._setAutoPlayInterval()
                        }, this),
                        "initialized.owl.carousel": a.proxy(function(a) {
                            a.namespace && this._core.settings.autoplay && this.play()
                        }, this),
                        "play.owl.autoplay": a.proxy(function(a, b, c) {
                            a.namespace && this.play(b, c)
                        }, this),
                        "stop.owl.autoplay": a.proxy(function(a) {
                            a.namespace && this.stop()
                        }, this),
                        "mouseover.owl.autoplay": a.proxy(function() {
                            this._core.settings.autoplayHoverPause && this._core.is("rotating") && this.pause()
                        }, this),
                        "mouseleave.owl.autoplay": a.proxy(function() {
                            this._core.settings.autoplayHoverPause && this._core.is("rotating") && this.play()
                        }, this),
                        "touchstart.owl.core": a.proxy(function() {
                            this._core.settings.autoplayHoverPause && this._core.is("rotating") && this.pause()
                        }, this),
                        "touchend.owl.core": a.proxy(function() {
                            this._core.settings.autoplayHoverPause && this.play()
                        }, this)
                    },
                    this._core.$element.on(this._handlers),
                    this._core.options = a.extend({}, e.Defaults, this._core.options)
            };
            e.Defaults = {
                    autoplay: !1,
                    autoplayTimeout: 5e3,
                    autoplayHoverPause: !1,
                    autoplaySpeed: !1
                },
                e.prototype.play = function(a, b) {
                    this._paused = !1,
                        this._core.is("rotating") || (this._core.enter("rotating"),
                            this._setAutoPlayInterval())
                },
                e.prototype._getNextTimeout = function(d, e) {
                    return this._timeout && b.clearTimeout(this._timeout),
                        b.setTimeout(a.proxy(function() {
                            this._paused || this._core.is("busy") || this._core.is("interacting") || c.hidden ||
                                this._core.next(e || this._core.settings.autoplaySpeed)
                        }, this), d || this._core.settings.autoplayTimeout)
                },
                e.prototype._setAutoPlayInterval = function() {
                    this._timeout = this._getNextTimeout()
                },
                e.prototype.stop = function() {
                    this._core.is("rotating") && (b.clearTimeout(this._timeout),
                        this._core.leave("rotating"))
                },
                e.prototype.pause = function() {
                    this._core.is("rotating") && (this._paused = !0)
                },
                e.prototype.destroy = function() {
                    var a, b;
                    this.stop();
                    for (a in this._handlers)
                        this._core.$element.off(a, this._handlers[a]);
                    for (b in Object.getOwnPropertyNames(this))
                        "function" != typeof this[b] && (this[b] = null)
                },
                a.fn.owlCarousel.Constructor.Plugins.autoplay = e
        }(window.Zepto || window.jQuery, window, document),
        function(a, b, c, d) {
            "use strict";
            var e = function(b) {
                this._core = b,
                    this._initialized = !1,
                    this._pages = [],
                    this._controls = {},
                    this._templates = [],
                    this.$element = this._core.$element,
                    this._overrides = {
                        next: this._core.next,
                        prev: this._core.prev,
                        to: this._core.to
                    },
                    this._handlers = {
                        "prepared.owl.carousel": a.proxy(function(b) {
                            b.namespace && this._core.settings.dotsData && this._templates.push('<div class="' +
                                this._core.settings.dotClass + '">' + a(b.content).find("[data-dot]")
                                .addBack("[data-dot]").attr("data-dot") + "</div>")
                        }, this),
                        "added.owl.carousel": a.proxy(function(a) {
                            a.namespace && this._core.settings.dotsData && this._templates.splice(a.position, 0,
                                this._templates.pop())
                        }, this),
                        "remove.owl.carousel": a.proxy(function(a) {
                            a.namespace && this._core.settings.dotsData && this._templates.splice(a.position, 1)
                        }, this),
                        "changed.owl.carousel": a.proxy(function(a) {
                            a.namespace && "position" == a.property.name && this.draw()
                        }, this),
                        "initialized.owl.carousel": a.proxy(function(a) {
                            a.namespace && !this._initialized && (this._core.trigger("initialize", null,
                                    "navigation"),
                                this.initialize(),
                                this.update(),
                                this.draw(),
                                this._initialized = !0,
                                this._core.trigger("initialized", null, "navigation"))
                        }, this),
                        "refreshed.owl.carousel": a.proxy(function(a) {
                            a.namespace && this._initialized && (this._core.trigger("refresh", null,
                                    "navigation"),
                                this.update(),
                                this.draw(),
                                this._core.trigger("refreshed", null, "navigation"))
                        }, this)
                    },
                    this._core.options = a.extend({}, e.Defaults, this._core.options),
                    this.$element.on(this._handlers)
            };
            e.Defaults = {
                    nav: !1,
                    navText: ["prev", "next"],
                    navSpeed: !1,
                    navElement: "div",
                    navContainer: !1,
                    navContainerClass: "owl-nav",
                    navClass: ["owl-prev", "owl-next"],
                    slideBy: 1,
                    dotClass: "owl-dot",
                    dotsClass: "owl-dots",
                    dots: !0,
                    dotsEach: !1,
                    dotsData: !1,
                    dotsSpeed: !1,
                    dotsContainer: !1
                },
                e.prototype.initialize = function() {
                    var b, c = this._core.settings;
                    this._controls.$relative = (c.navContainer ? a(c.navContainer) : a("<div>").addClass(c
                            .navContainerClass).appendTo(this.$element)).addClass("disabled"),
                        this._controls.$previous = a("<" + c.navElement + ">").addClass(c.navClass[0]).html(c.navText[0])
                        .prependTo(this._controls.$relative).on("click", a.proxy(function(a) {
                            this.prev(c.navSpeed)
                        }, this)),
                        this._controls.$next = a("<" + c.navElement + ">").addClass(c.navClass[1]).html(c.navText[1])
                        .appendTo(this._controls.$relative).on("click", a.proxy(function(a) {
                            this.next(c.navSpeed)
                        }, this)),
                        c.dotsData || (this._templates = [a("<div>").addClass(c.dotClass).append(a("<span>")).prop(
                            "outerHTML")]),
                        this._controls.$absolute = (c.dotsContainer ? a(c.dotsContainer) : a("<div>").addClass(c.dotsClass)
                            .appendTo(this.$element)).addClass("disabled"),
                        this._controls.$absolute.on("click", "div", a.proxy(function(b) {
                            var d = a(b.target).parent().is(this._controls.$absolute) ? a(b.target).index() : a(b
                                .target).parent().index();
                            b.preventDefault(),
                                this.to(d, c.dotsSpeed)
                        }, this));
                    for (b in this._overrides)
                        this._core[b] = a.proxy(this[b], this)
                },
                e.prototype.destroy = function() {
                    var a, b, c, d;
                    for (a in this._handlers)
                        this.$element.off(a, this._handlers[a]);
                    for (b in this._controls)
                        this._controls[b].remove();
                    for (d in this.overides)
                        this._core[d] = this._overrides[d];
                    for (c in Object.getOwnPropertyNames(this))
                        "function" != typeof this[c] && (this[c] = null)
                },
                e.prototype.update = function() {
                    var a, b, c, d = this._core.clones().length / 2,
                        e = d + this._core.items().length,
                        f = this._core.maximum(!0),
                        g = this._core.settings,
                        h = g.center || g.autoWidth || g.dotsData ? 1 : g.dotsEach || g.items;
                    if ("page" !== g.slideBy && (g.slideBy = Math.min(g.slideBy, g.items)),
                        g.dots || "page" == g.slideBy)
                        for (this._pages = [],
                            a = d,
                            b = 0,
                            c = 0; a < e; a++) {
                            if (b >= h || 0 === b) {
                                if (this._pages.push({
                                        start: Math.min(f, a - d),
                                        end: a - d + h - 1
                                    }),
                                    Math.min(f, a - d) === f)
                                    break;
                                b = 0,
                                    ++c
                            }
                            b += this._core.mergers(this._core.relative(a))
                        }
                },
                e.prototype.draw = function() {
                    var b, c = this._core.settings,
                        d = this._core.items().length <= c.items,
                        e = this._core.relative(this._core.current()),
                        f = c.loop || c.rewind;
                    this._controls.$relative.toggleClass("disabled", !c.nav || d),
                        c.nav && (this._controls.$previous.toggleClass("disabled", !f && e <= this._core.minimum(!0)),
                            this._controls.$next.toggleClass("disabled", !f && e >= this._core.maximum(!0))),
                        this._controls.$absolute.toggleClass("disabled", !c.dots || d),
                        c.dots && (b = this._pages.length - this._controls.$absolute.children().length,
                            c.dotsData && 0 !== b ? this._controls.$absolute.html(this._templates.join("")) : b > 0 ? this
                            ._controls.$absolute.append(new Array(b + 1).join(this._templates[0])) : b < 0 && this._controls
                            .$absolute.children().slice(b).remove(),
                            this._controls.$absolute.find(".active").removeClass("active"),
                            this._controls.$absolute.children().eq(a.inArray(this.current(), this._pages)).addClass(
                                "active"))
                },
                e.prototype.onTrigger = function(b) {
                    var c = this._core.settings;
                    b.page = {
                        index: a.inArray(this.current(), this._pages),
                        count: this._pages.length,
                        size: c && (c.center || c.autoWidth || c.dotsData ? 1 : c.dotsEach || c.items)
                    }
                },
                e.prototype.current = function() {
                    var b = this._core.relative(this._core.current());
                    return a.grep(this._pages, a.proxy(function(a, c) {
                        return a.start <= b && a.end >= b
                    }, this)).pop()
                },
                e.prototype.getPosition = function(b) {
                    var c, d, e = this._core.settings;
                    return "page" == e.slideBy ? (c = a.inArray(this.current(), this._pages),
                            d = this._pages.length,
                            b ? ++c : --c,
                            c = this._pages[(c % d + d) % d].start) : (c = this._core.relative(this._core.current()),
                            d = this._core.items().length,
                            b ? c += e.slideBy : c -= e.slideBy),
                        c
                },
                e.prototype.next = function(b) {
                    a.proxy(this._overrides.to, this._core)(this.getPosition(!0), b)
                },
                e.prototype.prev = function(b) {
                    a.proxy(this._overrides.to, this._core)(this.getPosition(!1), b)
                },
                e.prototype.to = function(b, c, d) {
                    var e;
                    !d && this._pages.length ? (e = this._pages.length,
                        a.proxy(this._overrides.to, this._core)(this._pages[(b % e + e) % e].start, c)) : a.proxy(this
                        ._overrides.to, this._core)(b, c)
                },
                a.fn.owlCarousel.Constructor.Plugins.Navigation = e
        }(window.Zepto || window.jQuery, window, document),
        function(a, b, c, d) {
            "use strict";
            var e = function(c) {
                this._core = c,
                    this._hashes = {},
                    this.$element = this._core.$element,
                    this._handlers = {
                        "initialized.owl.carousel": a.proxy(function(c) {
                            c.namespace && "URLHash" === this._core.settings.startPosition && a(b).trigger(
                                "hashchange.owl.navigation")
                        }, this),
                        "prepared.owl.carousel": a.proxy(function(b) {
                            if (b.namespace) {
                                var c = a(b.content).find("[data-hash]").addBack("[data-hash]").attr(
                                    "data-hash");
                                if (!c)
                                    return;
                                this._hashes[c] = b.content
                            }
                        }, this),
                        "changed.owl.carousel": a.proxy(function(c) {
                            if (c.namespace && "position" === c.property.name) {
                                var d = this._core.items(this._core.relative(this._core.current())),
                                    e = a.map(this._hashes, function(a, b) {
                                        return a === d ? b : null
                                    }).join();
                                if (!e || b.location.hash.slice(1) === e)
                                    return;
                                b.location.hash = e
                            }
                        }, this)
                    },
                    this._core.options = a.extend({}, e.Defaults, this._core.options),
                    this.$element.on(this._handlers),
                    a(b).on("hashchange.owl.navigation", a.proxy(function(a) {
                        var c = b.location.hash.substring(1),
                            e = this._core.$stage.children(),
                            f = this._hashes[c] && e.index(this._hashes[c]);
                        f !== d && f !== this._core.current() && this._core.to(this._core.relative(f), !1, !0)
                    }, this))
            };
            e.Defaults = {
                    URLhashListener: !1
                },
                e.prototype.destroy = function() {
                    var c, d;
                    a(b).off("hashchange.owl.navigation");
                    for (c in this._handlers)
                        this._core.$element.off(c, this._handlers[c]);
                    for (d in Object.getOwnPropertyNames(this))
                        "function" != typeof this[d] && (this[d] = null)
                },
                a.fn.owlCarousel.Constructor.Plugins.Hash = e
        }(window.Zepto || window.jQuery, window, document),
        function(a, b, c, d) {
            function e(b, c) {
                var e = !1,
                    f = b.charAt(0).toUpperCase() + b.slice(1);
                return a.each((b + " " + h.join(f + " ") + f).split(" "), function(a, b) {
                        if (g[b] !== d)
                            return e = !c || b,
                                !1
                    }),
                    e
            }

            function f(a) {
                return e(a, !0)
            }
            var g = a("<support>").get(0).style,
                h = "Winkit Moz O ms".split(" "),
                i = {
                    transition: {
                        end: {
                            WinkitTransition: "WinkitTransitionEnd",
                            MozTransition: "transitionend",
                            OTransition: "oTransitionEnd",
                            transition: "transitionend"
                        }
                    },
                    animation: {
                        end: {
                            WinkitAnimation: "WinkitAnimationEnd",
                            MozAnimation: "animationend",
                            OAnimation: "oAnimationEnd",
                            animation: "animationend"
                        }
                    }
                },
                j = {
                    csstransforms: function() {
                        return !!e("transform")
                    },
                    csstransforms3d: function() {
                        return !!e("perspective")
                    },
                    csstransitions: function() {
                        return !!e("transition")
                    },
                    cssanimations: function() {
                        return !!e("animation")
                    }
                };
            j.csstransitions() && (a.support.transition = new String(f("transition")),
                    a.support.transition.end = i.transition.end[a.support.transition]),
                j.cssanimations() && (a.support.animation = new String(f("animation")),
                    a.support.animation.end = i.animation.end[a.support.animation]),
                j.csstransforms() && (a.support.transform = new String(f("transform")),
                    a.support.transform3d = j.csstransforms3d())
        }(window.Zepto || window.jQuery, window, document);
    </script>
@endsection
