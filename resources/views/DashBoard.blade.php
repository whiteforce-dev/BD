@extends('Master.Master')
@section('content')
    <style>
        .name{
    position: relative;
    top: 12px;
        text-align: center;
        }
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
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
								<div>
									<h6 class="mb-1">Chat List</h6>
									<p class="mb-0">Show All</p>
								</div>
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
							</div>
							<div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
								<ul class="contacts">
									<li class="name-first-letter">A</li>
									<li class="active dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
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
												<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
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
												<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
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
												<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
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
												<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
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
												<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
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
												<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
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
												<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
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
												<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
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
												<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
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
												<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
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
												<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
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
												<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
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
												<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
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
												<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
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
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"/><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/></g></svg>
								</a>
								<div>
									<h6 class="mb-1">Chat with Khelesh</h6>
									<p class="mb-0 text-success">Online</p>
								</div>
								<div class="dropdown">
									<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
									<ul class="dropdown-menu dropdown-menu-end">
										<li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
										<li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to btn-close friends</li>
										<li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
										<li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
									</ul>
								</div>
							</div>
							<div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3">
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
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
								<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
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
								<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
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
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										Bye, see you
										<span class="msg_time">9:12 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
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
								<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
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
								<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
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
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
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
										<button type="button" class="btn btn-primary"><i class="fa fa-location-arrow"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="alerts" role="tabpanel">
						<div class="card mb-sm-3 mb-md-0 contacts_card">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
								<div>
									<h6 class="mb-1">Notications</h6>
									<p class="mb-0">Show All</p>
								</div>
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
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
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
								<div>
									<h6 class="mb-1">Notes</h6>
									<p class="mb-0">Add New Nots</p>
								</div>
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
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
												<a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
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
												<a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
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
												<a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
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
												<a href="javascript:void(0);" class="btn btn-primary btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
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

				<div class="row">
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-3 col-xxl-3 col-sm-6 ">
								<div class="card chart-bx">
									<div class="card-header border-0 pb-0">
										<div class="d-flex align-items-center">
											<h2 class="chart-num font-w600 mb-0">215</h2>
											<svg  class="ms-2 primary-icon" width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path  d="M2.00401 11.1924C0.222201 11.1924 -0.670134 9.0381 0.589795 7.77817L7.78218 0.585786C8.56323 -0.195262 9.82956 -0.195262 10.6106 0.585786L17.803 7.77817C19.0629 9.0381 18.1706 11.1924 16.3888 11.1924H2.00401Z" fill="#4885ED"/>
											</svg>

										</div>
										<div>
											<h5 class="text-black font-w500 mb-0">Tickets</h5>
										</div>
									</div>
									<div class="card-body pt-0" >
										<div id="widgetChart1" class="chart-primary" ></div>
									</div>

								</div>
							</div>
							<div class="col-xl-3 col-xxl-3 col-sm-6 ">
								<div class="card chart-bx">
									<div class="card-header border-0 pb-0">
										<div class="d-flex align-items-center">
											<h2 class="chart-num font-w600 mb-0">$536k</h2>
											<svg class="ms-2" width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M2.00401 -4.76837e-06C0.222201 -4.76837e-06 -0.670134 2.15428 0.589795 3.41421L7.78218 10.6066C8.56323 11.3876 9.82956 11.3876 10.6106 10.6066L17.803 3.41421C19.0629 2.15428 18.1706 -4.76837e-06 16.3888 -4.76837e-06H2.00401Z" fill="#FF3131"/>
											</svg>
										</div>
										<div>
											<h5 class="text-black font-w500 mb-0">Revenue</h5>
										</div>
									</div>
									<div class="card-body pt-0">
										<div id="widgetChart2">
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-3 col-sm-6 ">
								<div class="card chart-bx">
									<div class="card-header border-0 pb-0">
										<div class="d-flex align-items-center">
											<h2 class="chart-num font-w600 mb-0">652</h2>
											<svg class="ms-2 primary-icon" width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M2.00401 11.1924C0.222201 11.1924 -0.670134 9.0381 0.589795 7.77817L7.78218 0.585786C8.56323 -0.195262 9.82956 -0.195262 10.6106 0.585786L17.803 7.77817C19.0629 9.0381 18.1706 11.1924 16.3888 11.1924H2.00401Z" fill="#4885ED"/>
											</svg>
										</div>
										<div>
											<h5 class="text-black font-w500 mb-0">Sales</h5>
										</div>
									</div>
									<div class="card-body pt-0">
										<canvas id="widgetChart3" height="60"></canvas>
									</div>
								</div>
							</div>

							<div class="col-xl-3 col-xxl-3 col-sm-6 ">
								<div class="card chart-bx">
									<div class="card-body pt-sm-4 pt-3 d-flex align-items-center justify-content-between">
                                        @php
                                            $user = Auth::user()
                                        @endphp
										<div class="me-3">

                                            <img style="background:black; height: 180px;width:198px; margin-top: -10px; margin-bottom:-7px; border-radius:5px; " src="{{ $user->image }}" alt="">
                                            <div class="name">
                                                <h5>{{ $user->name }}</h5>
                                            </div>

										</div>

									</div>
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
					<div class="col-xl-9 col-xxl-8">
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
							<div class="col-xl-6 col-xxl-12">
								<div class="card latest-sales-bx">
									<div class="card-header border-0 mb-0">
										<h4 class="fs-20">Latest Sales</h4>
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
									<div class="card-body pb-0 dz-scroll loadmore-content pt-0" id="LatestSalesContent">
										<div class="media pb-3 border-bottom mb-3 align-items-center">
											<div class="media-image me-2">
												<img src="images/contacts/pic1.jpg" alt="">
											</div>
											<div class="media-body">
												<h6 class="fs-16 mb-0">Olivia Johanson</h6>
												<div class="d-flex">
													<span class="fs-14 me-auto text-secondary"><i class="fa fa-ticket me-1"></i>High Performance Conert 2020..</span>
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
													<span class="fs-14 me-auto text-secondary"><i class="fa fa-ticket me-1"></i>Fireworks Show New Year 2020</span>
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
													<span class="fs-14 me-auto text-secondary"><i class="fa fa-ticket me-1"></i>High Performance Conert 2020..</span>
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
													<span class="fs-14 me-auto text-secondary"><i class="fa fa-ticket me-1"></i>High Performance Conert 2020..</span>
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
													<span class="fs-14 me-auto text-secondary"><i class="fa fa-ticket me-1"></i>High Performance Conert 2020..</span>
													<span class="fs-14 text-nowrap">9m ago</span>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer style-1 border-0 px-0">
										<a href="javascript:void();" class="dz-load-more fa fa-long-arrow-down text-secondary" id="LatestSales" rel="ajax/latest-sales.html"></a>
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
					<div class="col-xl-3 col-xxl-4">
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
												<h6 class="mt-0 mb-3 fs-14"><a class="text-black" href="event.html">Live Concert Choir Charity Event 2020</a></h6>
												<ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
													<li>Ticket Sold</li>
													<li>431/650</li>
												</ul>
												<div class="progress mb-0" style="height:4px; width:100%;">
													<div class="progress-bar bg-warning progress-animated" style="width:50%; height:8px;" role="progressbar">
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
												<h6 class="mt-0 mb-3 fs-14"><a class="text-black" href="event.html">Live Concert Choir Charity Event 2020</a></h6>
												<ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
													<li>Ticket Sold</li>
													<li>650/650</li>
												</ul>
												<div class="progress mb-0" style="height:4px; width:100%;">
													<div class="progress-bar bg-warning progress-animated" style="width:100%; height:8px;" role="progressbar">
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



@endsection
