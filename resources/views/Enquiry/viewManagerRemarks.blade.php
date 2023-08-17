<!--**********************************
    Chat box start
***********************************-->

<!--**********************************
    Chat box End
***********************************-->

<div class="chatbox" id="viewMRemarks{{ $obj->id }}">
    <div class="chatbox-close"></div>
    <div class="custom-tab-1">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#chat">Remarks</a>
                <button></button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="chat" role="tabpanel">
                <div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
                    <div class="card-header chat-list-header text-center">
                        <a href="javascript:void(0)" data-toggle="modal"
                        data-target="#addMngrRemark{{ $obj->id }}""><svg xmlns="http://www.w3.org/2000/svg"
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
                            <h6 class="mb-1">Manager Remarks</h6>
                            <p class="mb-0">Show All</p>
                        </div>
                        <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="5" cy="12"
                                        r="2" />
                                    <circle fill="#000000" cx="12" cy="12"
                                        r="2" />
                                    <circle fill="#000000" cx="19" cy="12"
                                        r="2" />
                                </g>
                            </svg></a>
                    </div>
                    <div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
                        <ul class="contacts">
                            <li class="name-first-letter">FollowUps</li>
                            @php
                            $remark = \App\Models\Remark::where(['enquiry_id' => $obj->id])->orderBy('id','asc')->get();
                            @endphp
                            @foreach ( $remark as $index=>$remarks )
                            <li class="active dz-chat-user">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont">
                                        <img src="{{ $obj->GetCreatedby->image ?? '-' }}" class="rounded-circle user_img"
                                            alt="" />
                                        <span class="online_icon"></span>
                                    </div>
                                    <div class="user_info" style="max-width: none;  ">
                                        <span>{{$obj->GetCreatedby->name ??'-'}} -{{ $remarks->GetStatus->remark ??'-'}}</span>
                                        <p style="text-align: justify; hyphens: auto;">{{ trim($remarks->remark) }}</p>


                                        <div style=" margin-top: 5px; margin-left: 90px;">
                                            <span style="font-size: 13px;">Posted On</span>
                                            <p>{{\Carbon\Carbon::parse($remarks->created_at)->format('d-m-Y H:i:s')}}
                                            </p>
                                            <span style="font-size: 12px;  margin-top: 5px;">Next Follow Up</span>
                                        <p>{{\Carbon\Carbon::parse($remarks->date)->format('d-m-Y')}} {{$remarks->time}}
                                        </p>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @php
                            $remark = \App\Models\ManagerRemark::where(['enquiry_id' => $obj->id])->orderBy('id','asc')->get();
                            @endphp
                            <li class="name-first-letter">Manager Remarks</li>
                            @foreach ( $remark as $index=>$remarks )
                            <li class="active dz-chat-user">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont">
                                        <img src="{{ $obj->GetUser->image ?? '-' }}" class="rounded-circle user_img"
                                            alt="" />
                                        <span class="online_icon"></span>
                                    </div>
                                    <div class="user_info" style="max-width: none;">
                                        <span>{{ $obj->GetUser->name ?? '-' }}</span>
                                        <p>{{ $remarks->remark }}</p>
                                        <div style=" margin-top: 5px; margin-left: 110px;">
                                            <span style="font-size: 12px;">Remark Added On</span>
                                            <p>{{ \Carbon\Carbon::parse($remarks->created_at)->format('d-m-Y H:i:s') }}
                                            </p>
                                        </div>

                                    </div>


                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    jQuery(document).ready(function() {
        jQuery(".bell-link").on("click", function() {
            var target = jQuery(this).data("target");
            console.log("Clicked link with data-target:", target);
            jQuery(target).addClass("active");
        });

        jQuery(".chatbox-close").on("click", function() {
            console.log("Chatbox close button clicked");
            jQuery(".chatbox").removeClass("active");
        });
    });
</script>
