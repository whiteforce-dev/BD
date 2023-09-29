<!--**********************************
    Chat box start
***********************************-->

<!--**********************************
    Chat box End
***********************************-->

<div class="chatbox" id="viewFollowUp{{ $obj->id }}" style="width: 570px;">
    <div class="chatbox-close"  "></div>
    <div class="custom-tab-1">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#chat">Remarks</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="chat" role="tabpanel">
                <div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
                    <div class="card-header chat-list-header text-center">
                        @if(Auth::user()->type == 'Staff')
                            <a href="javascript:void(0)" data-toggle="modal"
                            data-target="#addfollowup{{ $obj->id }}"><svg xmlns="http://www.w3.org/2000/svg"
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
                                </svg>
                            </a>
                        @endif
                        @if(Auth::user()->type == 'Manager' && 6 == $obj->created_by)
                        <a href="javascript:void(0)" data-toggle="modal"
                            data-target="#addfollowup{{ $obj->id }}"><svg xmlns="http://www.w3.org/2000/svg"
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
                                </svg>
                            </a>
                            @else
                            <a href="javascript:void(0)" data-toggle="modal"
                                data-target="#addMngrRemark{{ $obj->id }}"><svg xmlns="http://www.w3.org/2000/svg"
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
                                </svg>
                            </a>
                        @endif

                                {{--  <a href="javascript:void(0)" data-toggle="modal"
                                data-target="#addfollowup{{ $obj->id }}"><svg xmlns="http://www.w3.org/2000/svg"
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
                                    </svg></a>  --}}
                        <div>
                            <h6 class="mb-1">FollowUp</h6>
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
                        <ul class="contacts" style="box-shadow: 0px 0px 8px -3px #b6b6c3;">
                            @php
                            $remark = \App\Models\Remark::where(['enquiry_id' => $obj->id])->get()->toArray();
                            $managerremark = \App\Models\ManagerRemark::where(['enquiry_id' => $obj->id])->get()->toArray();
                            $all_remarks = array_merge($remark,$managerremark);
                            usort($all_remarks, function ($a, $b) {
                                return $a['created_at'] <=> $b['created_at'];
                            });
                            @endphp
                            @foreach ( $all_remarks as $index=>$remarks )
                            @php
                            if(!empty($remarks['created_by'])){
                                $user_data = \App\Models\User::where('id',$remarks['created_by'])->select('image','name')->first();
                            }
                            @endphp
                            <li class="active dz-chat-user">
                                <div class="d-flex bd-highlight" style="width:100%;">
                                    <div class="img_cont" style="width: 20%; border-radius:none; background:none;">
                                        @if(!empty($user_data))
                                        <img style="    width: 75%; border-radius:none;" src="{{ $user_data->image ?? '-' }}" class=" user_img"
                                            alt="" />
                                        @else
                                        <img style="    width:75%; border-radius:none;" src="{{ $obj->GetCreatedby->image ?? '-' }}" class="user_img"
                                            alt="" />
                                        @endif

                                    </div>

                                    <div class="user_info" style="max-width: none; width:80%;  ">
                                        <div style="display: flex; align-items:center; justify-content:start;">
                                            {{--  <span >{{!empty($user_data) ? $user_data->name : $obj->GetCreatedby->name ?? '-'}} -{{ $remarks->GetStatus->remark ??'-'}}</span>  --}}
                                            <span style="width: 70%;">Saindra Jashmin </span>
                                            <span style="  width: 85px;
                                            height: 27px;
                                            background-color: #097ccb;
                                            color: white;
                                            border-radius: 4px;
                                            display: flex;
                                            font-weight: 400;
                                            font-size:13.5px;
                                            align-items: center;
                                            justify-content: center; " class="badge badge-info">Process</span>
                                        </div>

                                        <p style="text-align: justify; hyphens: auto;     font-size: 14px;
                                        margin: 4px 0px; width:90%; overflow:inherit; line-height:1.12; color: #2e3032;">We bring solutions to make hiring easier for our National & International customers.{{ trim($remarks['remark']) }}</p>


                                        <div style=" display: flex;
                                        align-items: center;
                                        justify-content: start;     font-size: 14px;
                                        margin: 7px 2px; margin-top:11px;
                                    ">
                                            <div style="width: 50%;">
                                                <span style="font-size: 13.5px; ">Posted On</span>
                                                <p style="font-size:12.6;">{{\Carbon\Carbon::parse($remarks['created_at'])->format('d-m-Y H:i:s')}}
                                                </p>
                                            </div>
                                            <div style="width: 50%;">
                                                @if(!empty($remarks['date']))
                                                <span style="font-size: 13.5px;">Next Follow Up</span>
                                                <p style="font-size: 12.6px;">{{\Carbon\Carbon::parse($remarks['date'])->format('d-m-Y')}} {{$remarks['time']}}</p>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <ul class="contacts" style="box-shadow: 0px 0px 8px -3px #b6b6c3;">
                            @php
                            $remark = \App\Models\Remark::where(['enquiry_id' => $obj->id])->get()->toArray();
                            $managerremark = \App\Models\ManagerRemark::where(['enquiry_id' => $obj->id])->get()->toArray();
                            $all_remarks = array_merge($remark,$managerremark);
                            usort($all_remarks, function ($a, $b) {
                                return $a['created_at'] <=> $b['created_at'];
                            });
                            @endphp
                            @foreach ( $all_remarks as $index=>$remarks )
                            @php
                            if(!empty($remarks['created_by'])){
                                $user_data = \App\Models\User::where('id',$remarks['created_by'])->select('image','name')->first();
                            }
                            @endphp
                            <li class="active dz-chat-user">
                                <div class="d-flex bd-highlight" style="width:100%;">
                                    <div class="img_cont" style="width: 20%; border-radius:none; background:none;">
                                        @if(!empty($user_data))
                                        <img style="    width: 75%; border-radius:none;" src="{{ $user_data->image ?? '-' }}" class=" user_img"
                                            alt="" />
                                        @else
                                        <img style="    width:75%; border-radius:none;" src="{{ $obj->GetCreatedby->image ?? '-' }}" class="user_img"
                                            alt="" />
                                        @endif

                                    </div>

                                    <div class="user_info" style="max-width: none; width:80%;  ">
                                        <div style="display: flex; align-items:center; justify-content:start;">
                                            {{--  <span >{{!empty($user_data) ? $user_data->name : $obj->GetCreatedby->name ?? '-'}} -{{ $remarks->GetStatus->remark ??'-'}}</span>  --}}
                                            <span style="width: 70%;">Saindra Jashmin </span>
                                            <span style="  width: 85px;
                                            height: 27px;
                                            background-color: #097ccb;
                                            color: white;
                                            border-radius: 4px;
                                            display: flex;
                                            font-weight: 400;
                                            font-size:13.5px;
                                            align-items: center;
                                            justify-content: center; " class="badge badge-info">Process</span>
                                        </div>

                                        <p style="text-align: justify; hyphens: auto;     font-size: 14px;
                                        margin: 4px 0px; width:90%; overflow:inherit; line-height:1.12; color: #2e3032;">We bring solutions to make hiring easier for our National & International customers.{{ trim($remarks['remark']) }}</p>


                                        <div style=" display: flex;
                                        align-items: center;
                                        justify-content: start;     font-size: 14px;
                                        margin: 7px 2px; margin-top:11px;
                                    ">
                                            <div style="width: 50%;">
                                                <span style="font-size: 13.5px; ">Posted On</span>
                                                <p style="font-size:12.6;">{{\Carbon\Carbon::parse($remarks['created_at'])->format('d-m-Y H:i:s')}}
                                                </p>
                                            </div>
                                            <div style="width: 50%;">
                                                @if(!empty($remarks['date']))
                                                <span style="font-size: 13.5px;">Next Follow Up</span>
                                                <p style="font-size: 12.6px;">{{\Carbon\Carbon::parse($remarks['date'])->format('d-m-Y')}} {{$remarks['time']}}</p>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                        <ul class="contacts" style="box-shadow: 0px 0px 8px -3px #b6b6c3;">
                            <li class="active dz-chat-user">
                                <div class="d-flex bd-highlight" style="width:100%;">
                                    <div class="img_cont" style="width: 20%; border-radius:none; background:none;">
                                                                                <img style="    width: 75%; border-radius:none;" src="Employee/1691652499.png" class=" user_img" alt="">

                                    </div>

                                    <div class="user_info" style="max-width: none; width:80%;  ">
                                        <div style="display: flex; align-items:center; justify-content:start;">

                                            <span style="width: 70%;">Saindra Jashmin </span>
                                            <span style="  width: 85px;
                                            height: 27px;
                                            background-color: #097ccb;
                                            color: white;
                                            border-radius: 4px;
                                            display: flex;
                                            font-weight: 400;
                                            font-size:13.5px;
                                            align-items: center;
                                            justify-content: center; " class="badge badge-info">Process</span>
                                        </div>

                                        <p style="text-align: justify; hyphens: auto;     font-size: 14px;
                                        margin: 4px 0px; width:90%; overflow:inherit; line-height:1.12; color: #2e3032;">We bring solutions to make hiring easier for our National &amp; International customers.fsdfg</p>


                                        <div style=" display: flex;
                                        align-items: center;
                                        justify-content: start;     font-size: 14px;
                                        margin: 7px 2px; margin-top:11px;
                                    ">
                                            <div style="width: 50%; display:flex;">
                                                <span style="font-size: 13.5px; margin-right:10px; ">Posted On : </span>
                                                <p style="font-size:12.6;">11-08-2023 10:18:23
                                                </p>
                                            </div>
                                            <div style="width: 50%;">
                                                                                            </div>

                                        </div>

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
