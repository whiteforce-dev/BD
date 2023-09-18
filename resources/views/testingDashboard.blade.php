@extends('Master.Master')
@section('content')
<style>
	.card {
		position: relative;
		display: -ms-flexbox;
		display: flex;
		-ms-flex-direction: column;
		flex-direction: column;
		min-width: 0;
		word-wrap: break-word;
		background-clip: border-box;
		border: 1px solid rgba(0, 0, 0, .125);
		border-radius: .25rem;
		opacity: 0.9;
		-webkit-box-shadow: 3px 3px 5px 6px #ccc;
		/* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
		-moz-box-shadow: 3px 3px 5px 3px #ccc;
		/* Firefox 3.5 - 3.6 */
		box-shadow: 3px 3px 5px 3px #ccc;
		/* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */
	}



	.col-9 {
		-ms-flex: 0 0 75%;
		flex: 0 0 75%;
		max-width: 75%;
		font-size: 18px;
		margin-top: 10px;
	}

	b,
	strong {
		font-weight: 100;
	}

	.table tbody tr td {
		vertical-align: middle;
		border-color: #F0F0F0;
		color: black;
		font-weight: 500;
		/* opacity :0.6; */

	}

	.admin {
		display: flex;
		justify-content: center;
	}

	.table-primary {
		opacity: 0.6;
	}

	.table-success {
		opacity: 0.6;
	}

	.table-info {
		opacity: 0.6;
	}

	.table-warning {
		opacity: 0.6;
	}

	.list-group-flush>.list-group-item {
		color: black;
		backgroun: blue;
	}

	.card .filter {
		position: absolute;
		z-index: 2;
		background-color: rgba(0, 0, 0, .68);
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		text-align: center;
		opacity: 0;
		filter: alpha(opacity=0)
	}

	.card .filter .btn {
		position: relative;
		top: 50%;
		-webkit-transform: translateY(-50%);
		transform: translateY(-50%)
	}

	.card:hover .filter {
		opacity: 1;
		filter: alpha(opacity=100)
	}

	.card .btn-hover {
		opacity: 0;
		filter: alpha(opacity=0)
	}

	.card:hover .btn-hover {
		opacity: 1;
		filter: alpha(opacity=100)
	}

	.card .card-body {
		padding: 15px 15px 5px
	}

	.card .card-header {
		padding: 15px 15px 0;
		background-color: #f2f3f4;
		border-bottom: none !important
	}

	.card .card-category,
	.card label {
		font-size: 14px;
		font-weight: 400;
		color: #9a9a9a;
		margin-bottom: 0
	}

	.card .card-category i,
	.card label i {
		font-size: 16px
	}

	.card label {
		font-size: 12px;
		margin-bottom: 5px;
		text-transform: uppercase
	}

	.card .card-title {
		margin: 0;
		color: #333;
		font-weight: 300
	}

	.card .avatar {
		width: 30px;
		height: 30px;
		overflow: hidden;
		border-radius: 50%;
		margin-right: 5px
	}

	.card .description {
		font-size: 14px;
		color: #333
	}

	.card .card-footer {
		padding-top: 0;
		background-color: transparent;
		line-height: 30px;
		border-top: none !important;
		font-size: 14px
	}

	.card .card-footer .legend {
		padding: 5px 0
	}

	.card .card-footer hr {
		margin-top: 5px;
		margin-bottom: 5px
	}

	.widget-stat a {
		text-decoration: none;
	}

	.card .stats {
		color: #a9a9a9
	}

	.container-fluid {
		width: 100%;
		padding-right: 15px;
		padding-left: 15px;
		margin-right: auto;
		margin-left: auto;
		background: #edf2f9;
		font-family: 'poppins';
	}
</style>






<!--**********************************
			Content body start
		***********************************-->
<div class="content-body">
	<!-- row -->

	<div class="container-fluid">
		<div class="form-head mb-4 d-flex flex-wrap align-items-center">
			<div class="me-auto">
				<h2 class="font-w600 mb-0">Dashboard</h2>
			</div>

		</div>


		<div class="content">
			<div class="row">
                <div class="col-xl-8">
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
                                            <p class="fs-12 mt-3">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. Ut enim ad mini</p>
                                            <div class="d-flex  mt-4">
                                                <div class="me-4">
                                                    <svg width="20" height="8" viewBox="0 0 20 8"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="20" height="8" rx="4" fill="#FB3E7A" />
                                                    </svg>
                                                    <h4 class="fs-18 text-black mb-0 font-w600">21,512</h4>
                                                    <span class="fs-14">Ticket Left</span>
                                                </div>
                                                <div class="me-4">
                                                    <svg class="primary-icon" width="20" height="8"
                                                        viewBox="0 0 20 8" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="20" height="8" rx="4" fill="#4585ED" />
                                                    </svg>
                                                    <h4 class="fs-18 text-black mb-0 font-w600">45,612</h4>
                                                    <span class="fs-14">Ticket Sold</span>
                                                </div>
                                                <div class="">
                                                    <svg width="20" height="8" viewBox="0 0 20 8" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="20" height="8" rx="4" fill="#C8C8C8" />
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
                                            <p class="fs-12 mt-3">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. Ut enim ad mini</p>
                                            <div class="d-flex  mt-4">
                                                <div class="me-4">
                                                    <svg width="20" height="8" viewBox="0 0 20 8" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="20" height="8" rx="4" fill="#FB3E7A" />
                                                    </svg>
                                                    <h4 class="fs-18 text-black mb-0 font-w600">21,512</h4>
                                                    <span class="fs-14">Ticket Left</span>
                                                </div>
                                                <div class="me-4">
                                                    <svg width="20" height="8" viewBox="0 0 20 8" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="20" height="8" rx="4" fill="#0E8A74" />
                                                    </svg>
                                                    <h4 class="fs-18 text-black mb-0 font-w600">45,612</h4>
                                                    <span class="fs-14">Ticket Sold</span>
                                                </div>
                                                <div class="">
                                                    <svg width="20" height="8" viewBox="0 0 20 8" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="20" height="8" rx="4" fill="#C8C8C8" />
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
                                            <p class="fs-12 mt-3">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                dolore magna aliqua. Ut enim ad mini</p>
                                            <div class="d-flex  mt-4">
                                                <div class="me-4">
                                                    <svg width="20" height="8" viewBox="0 0 20 8" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="20" height="8" rx="4" fill="#FB3E7A" />
                                                    </svg>
                                                    <h4 class="fs-18 text-black mb-0 font-w600">21,512</h4>
                                                    <span class="fs-14">Ticket Left</span>
                                                </div>
                                                <div class="me-4">
                                                    <svg width="20" height="8" viewBox="0 0 20 8" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="20" height="8" rx="4" fill="#0E8A74" />
                                                    </svg>
                                                    <h4 class="fs-18 text-black mb-0 font-w600">45,612</h4>
                                                    <span class="fs-14">Ticket Sold</span>
                                                </div>
                                                <div class="">
                                                    <svg width="20" height="8" viewBox="0 0 20 8" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="20" height="8" rx="4" fill="#C8C8C8" />
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
				<div class="col-md-4">
					<div class="card">
						<div style="height:20px;opacity: 0.8;" class="card-body">
							<div id="div_209183630582" class="ct-chart"><img style="height:280px;"
									src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-KQ_OgPlLlo7ohkOcN6p8Iso2zsNUpHf-86mq-zgnEp0Oh2ppK61YeSS83q-15DQQDb0&usqp=CAU"
									alt="">
							</div>
						</div>
						<div class="card-footer">
							<h3 class="admin">Admin</h3>
							<div class="stats">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">

				<div class="col-xl-12">
					<div class="row">
						<div class="col-xl-4 col-xxl-3 col-sm-6 ">

							<div class="widget-stat card">
								<a href="#">
									<div class="card-body p-4">
										<div class="media ai-icon">
											<span class="me-3 bgl-warning text-warning">
												<img style="height:40px;opacity: 0.8;" src=" {{url('741373.png')}}"
													alt="">

											</span>
											<div class="media-body">
												<p class="mb-1">Active Member</p>
												<h4 class="mb-0">2570</h4>
												<span class="badge badge-warning">+3.5%</span>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xl-4 col-xxl-3 col-sm-6 ">
							<div class="widget-stat card">
								<a href="#">
									<div class="card-body p-4">
										<div class="media ai-icon">
											<span class="me-3 bgl-success text-success">
												<img style="height:40px;opacity: 0.8;" src=" {{url('enq.png')}}" alt="">
											</span>
											<div class="media-body">
												<p class="mb-1">Total Enquiry</p>
												<h4 class="mb-0">364.50K</h4>
												<span class="badge badge-success">-3.5%</span>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xl-4 col-xxl-3 col-sm-6 ">
							<div class="widget-stat card">
								<a href="#">
									<div class="card-body  p-4">
										<div class="media ai-icon">
											<span class="me-3 bgl-danger text-danger">
												<img style="height:40px;opacity: 0.8;" src=" {{url('hot.png')}}" alt="">

											</span>
											<div class="media-body">
												<p class="mb-1">Today Enquiry</p>
												<h4 class="mb-0">364.50K</h4>
												<span class="badge badge-danger">-3.5%</span>
											</div>
										</div>
									</div>
								</a>
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
												<img style="height:80px;opacity: 0.8;" src=" {{url('approch.png')}}"
													alt="">

											</span>
											<div class="media-body">
												<p class="mb-1">Patient</p>
												<h4 class="mb-0">3280</h4>
												<span class="badge badge-primary">+3.5%</span>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xl-4 col-xxl-3 col-sm-6 ">
							<div class="widget-stat card">
								<a href="#">
									<div class="card-body p-4">
										<div class="media ai-icon">
											<span class="me-3 bgl-success text-success">
												<img style="height:55px;opacity: 0.8;" src=" {{url('1570237.png')}}"
													alt="">

											</span>
											<div class="media-body">
												<p class="mb-1">Total Enquiry</p>
												<h4 class="mb-0">364.50K</h4>
												<span class="badge badge-success">-3.5%</span>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xl-4 col-xxl-3 col-sm-6 ">
							<div class="widget-stat card">
								<a href="#">
									<div class="card-body  p-4">
										<div class="media ai-icon">
											<span class="me-3 bgl-danger text-danger">
												<img style="height:50px;opacity: 0.8;" src=" {{url('images.png')}}"
													alt="">

											</span>
											<div class="media-body">
												<p class="mb-1">Today Enquiry</p>
												<h4 class="mb-0">364.50K</h4>
												<span class="badge badge-danger">-3.5%</span>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>


					</div>
				</div>

				<div class="col-xl-12">
					<div class="row">
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header border-0 pb-0">
									<h4 class="fs-20"> Business Achieved (month)</h4>
								</div>
								<div style: opacity :0.6; class="card-body pb-0">
									<ul class="list-group list-group-flush">
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Gender</h6>
											<span class="mb-0">Male</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Education</h6>
											<span class="mb-0">PHD</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Designation</h6>
											<span class="mb-0">Se. Professor</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Operation Done</h6>
											<span class="mb-0">120</span>
										</li>
									</ul>

								</div>
								<div class="card-footer pt-0 border-0">
									<a href="javascript:void(0);" class="btn btn-secondary btn-block text-white">View
										Detail</a>
								</div>
							</div>

						</div>
						<div class="col-xl-6">
							<div class="card bg-primary">
								<div class="card-body">
									<div class="d-sm-flex d-block pb-sm-3 align-items-end mb-2">
										<div class="me-auto pe-3 mb-3 mb-sm-0">
											<span class="chart-num-3 font-w200 d-block mb-sm-3 mb-2 text-white">Ticket
												Sold Today</span>
											<h2 class="chart-num-2 text-white mb-0">456,502<span
													class="fs-18 me-2 ms-3">pcs</span></h2>
										</div>
										<div class="d-flex flex-wrap mb-3 mb-sm-0">
											<svg width="87" height="58" viewBox="0 0 87 58" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path
													d="M18.4571 37.6458C11.9375 44.6715 4.81049 52.3964 2 55.7162H68.8125C77.6491 55.7162 84.8125 48.5528 84.8125 39.7162V2L61.531 31.9333C56.8486 37.9536 48.5677 39.832 41.746 36.4211L37.3481 34.2222C30.9901 31.0432 23.2924 32.4352 18.4571 37.6458Z"
													fill="url(#paint0_linear)" />
												<path
													d="M2 55.7162C4.81049 52.3964 11.9375 44.6715 18.4571 37.6458C23.2924 32.4352 30.9901 31.0432 37.3481 34.2222L41.746 36.4211C48.5677 39.832 56.8486 37.9536 61.531 31.9333L84.8125 2"
													stroke="white" stroke-width="4" stroke-linecap="round" />
												<defs>
													<linearGradient id="paint0_linear" x1="43.4062" y1="8.71453"
														x2="46.7635" y2="55.7162" gradientUnits="userSpaceOnUse">
														<stop stop-color="white" offset="0" />
														<stop offset="1" stop-color="white" stop-opacity="0" />
													</linearGradient>
												</defs>
											</svg>
											<div class="ms-3">
												<p class="fs-20 mb-0 font-w500 text-white">+4%</p>
												<span class="fs-12 text-white">than last day</span>
											</div>
										</div>
									</div>
									<div class="progress style-1" style="height:15px; ">
										<div class="progress-bar bg-white progress-animated"
											style="width: 55%; height:15px; " role="progressbar">
											<span class="sr-only">55% Complete</span>
											<span class="bg-white arrow"></span>
											<span class="font-w600 counter-bx text-black"
												style="background-color: blackl;"><strong
													class="counter font-w400">985pcs Left</strong></span>
										</div>
									</div>
									<p class="fs-12 text-white pt-4">Lorem ipsum dolor sit amet, consectetur adipiscing
										elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
										ad mini</p>
									<a href="javascript:void(0);" class="text-white">View detail<i
											class="las la-long-arrow-alt-right scale5 ms-3"></i></a>
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
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path
													d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
													stroke="#194039" stroke-width="2" stroke-linecap="round"
													stroke-linejoin="round" />
												<path
													d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
													stroke="#194039" stroke-width="2" stroke-linecap="round"
													stroke-linejoin="round" />
												<path
													d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
													stroke="#194039" stroke-width="2" stroke-linecap="round"
													stroke-linejoin="round" />
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
											<h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);"
													class="text-black"> Envato International Online Meetup 2020</a></h4>
											<span class="fs-14 d-block mb-sm-3 mb-2 text-secondary">Medan,
												Indonesia</span>
											<p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
												sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
												enim ad mini</p>
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
											<h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);"
													class="text-black"> Envato International Online Meetup 2020</a></h4>
											<span class="fs-14 d-block mb-sm-3 mb-2 text-secondary">Medan,
												Indonesia</span>
											<p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
												sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
												enim ad mini</p>
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
											<h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);"
													class="text-black"> Envato International Online Meetup 2020</a></h4>
											<span class="fs-14 d-block mb-sm-3 mb-2 text-secondary">Medan,
												Indonesia</span>
											<p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
												sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
												enim ad mini</p>
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
											<h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);"
													class="text-black"> Envato International Online Meetup 2020</a></h4>
											<span class="fs-14 d-block mb-sm-3 mb-2 text-secondary">Medan,
												Indonesia</span>
											<p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
												sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
												enim ad mini</p>
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
											<h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);"
													class="text-black"> Envato International Online Meetup 2020</a></h4>
											<span class="fs-14 d-block mb-sm-3 mb-2 text-secondary">Medan,
												Indonesia</span>
											<p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
												sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
												enim ad mini</p>
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
									<a href="javascript:void(0);" class="btn btn-secondary btn-block text-white">View
										Detail</a>
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
									<h4 class="fs-20">Upcoming Events</h4>
								</div>
								<div style="height:500px;" class="card-body pb-0">
									<div class="media mb-5 align-items-center event-list">
										<div class="p-3 text-center me-3 date-bx bgl-primary">
											<h2 class="mb-0 text-secondary fs-28 font-w600">3</h2>
											<h5 class="mb-1 text-black">Wed</h5>
										</div>
										<div class="media-body px-0">
											<h6 class="mt-0 mb-3 fs-14"><a class="text-black" href="event.html">Live
													Concert Choir Charity Event 2020</a></h6>
											<ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
												<li>Ticket Sold</li>
												<li>561/650</li>
											</ul>
											<div class="progress mb-0" style="height:4px; width:100%;">
												<div class="progress-bar bg-warning progress-animated"
													style="width:60%; height:8px; background :aliceblue !important;"
													role="progressbar">
													<span
														style="width:60%; height:8px; color:aliceblue !important; class="">60% Complete</span>
													</div>
												</div>
											</div>
										</div>
										<div class=" media mb-5 align-items-center event-list">
														<div class="p-3 text-center me-3 date-bx bgl-primary">
															<h2 class="mb-0 text-secondary fs-28 font-w600">16</h2>
															<h5 class="mb-1 text-black">Wed</h5>
														</div>
														<div class="media-body px-0">
															<h6 class="mt-0 mb-3 fs-14"><a class="text-black"
																	href="event.html">Live Concert Choir Charity Event
																	2020</a></h6>
															<ul
																class="fs-14 list-inline mb-2 d-flex justify-content-between">
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
														<h6 class="mt-0 mb-3 fs-14"><a class="text-black"
																href="event.html">Live Concert Choir Charity Event
																2020</a></h6>
														<ul
															class="fs-14 list-inline mb-2 d-flex justify-content-between">
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
												<a href="javascript:void(0);"
													class="btn btn-secondary btn-block text-white">View Detail</a>
											</div>
										</div>
									</div>
								</div>

							</div>



							<div class="col-xl-4 col-xxl-6 col-lg-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="fs-20">Timeline</h4>
									</div>
									<div class="card-body">
										<div id="DZ_W_TimeLine"
											class="widget-timeline dz-scroll height370 ps ps--active-y">
											<ul class="timeline">
												<li>
													<div class="timeline-badge primary"></div>
													<a class="timeline-panel text-muted" href="#">
														<span>10 minutes ago</span>
														<h6 class="mb-0">Youtube, a video-sharing website, goes live
															<strong class="text-primary">$500</strong>.</h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge info">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>20 minutes ago</span>
														<h6 class="mb-0">New order placed <strong
																class="text-info">#XF-2356.</strong></h6>
														<p class="mb-0">Quisque a consequat ante Sit amet magna at
															volutapt...</p>
													</a>
												</li>
												<li>
													<div class="timeline-badge danger">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>30 minutes ago</span>
														<h6 class="mb-0">john just buy your product <strong
																class="text-warning">Sell $250</strong></h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge success">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>15 minutes ago</span>
														<h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge warning">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>20 minutes ago</span>
														<h6 class="mb-0">Mashable, a news website and blog, goes live.
														</h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge dark">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>20 minutes ago</span>
														<h6 class="mb-0">Mashable, a news website and blog, goes live.
														</h6>
													</a>
												</li>
											</ul>
											<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
												<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
												</div>
											</div>
											<div class="ps__rail-y" style="top: 0px; height: 370px; right: 0px;">
												<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 216px;">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-xxl-6 col-lg-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="fs-20">Timeline 2</h4>
									</div>
									<div class="card-body">
										<div id="DZ_W_TimeLine11"
											class="widget-timeline dz-scroll style-1 height370 ps ps--active-y">
											<ul class="timeline">
												<li>
													<div class="timeline-badge primary"></div>
													<a class="timeline-panel text-muted" href="#">
														<span>10 minutes ago</span>
														<h6 class="mb-0">Youtube, a video-sharing website, goes live
															<strong class="text-primary">$500</strong>.</h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge info">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>20 minutes ago</span>
														<h6 class="mb-0">New order placed <strong
																class="text-info">#XF-2356.</strong></h6>
														<p class="mb-0">Quisque a consequat ante Sit amet magna at
															volutapt...</p>
													</a>
												</li>
												<li>
													<div class="timeline-badge danger">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>30 minutes ago</span>
														<h6 class="mb-0">john just buy your product <strong
																class="text-warning">Sell $250</strong></h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge success">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>15 minutes ago</span>
														<h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge warning">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>20 minutes ago</span>
														<h6 class="mb-0">Mashable, a news website and blog, goes live.
														</h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge dark">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>20 minutes ago</span>
														<h6 class="mb-0">Mashable, a news website and blog, goes live.
														</h6>
													</a>
												</li>
											</ul>
											<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
												<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
												</div>
											</div>
											<div class="ps__rail-y" style="top: 0px; height: 370px; right: 0px;">
												<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 295px;">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-xxl-6 col-lg-6">
								<div class="card">
									<div class="card-header  border-0 pb-0">
										<h4 class="fs-20">Notification</h4>
									</div>
									<div class="card-body">
										<div id="DZ_W_Todo1" class="widget-media dz-scroll height370 ps ps--active-y">
											<ul class="timeline">
												<li>
													<div class="timeline-panel">
														<div class="media me-2">
															<img alt="image" width="50" src="images/avatar/1.jpg">
														</div>
														<div class="media-body">
															<h5 class="mb-1">Dr sultads Send you Photo</h5>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
														<div class="dropdown">
															<button type="button" class="btn btn-primary light sharp"
																data-bs-toggle="dropdown">
																<svg width="18px" height="18px" viewBox="0 0 24 24"
																	version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
																		fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<circle fill="#000000" cx="5" cy="12" r="2">
																		</circle>
																		<circle fill="#000000" cx="12" cy="12" r="2">
																		</circle>
																		<circle fill="#000000" cx="19" cy="12" r="2">
																		</circle>
																	</g>
																</svg>
															</button>
															<div class="dropdown-menu dropdown-menu-end">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media me-2 media-info">
															KG
														</div>
														<div class="media-body">
															<h5 class="mb-1">Resport created successfully</h5>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
														<div class="dropdown">
															<button type="button" class="btn btn-info light sharp"
																data-bs-toggle="dropdown">
																<svg width="18px" height="18px" viewBox="0 0 24 24"
																	version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
																		fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<circle fill="#000000" cx="5" cy="12" r="2">
																		</circle>
																		<circle fill="#000000" cx="12" cy="12" r="2">
																		</circle>
																		<circle fill="#000000" cx="19" cy="12" r="2">
																		</circle>
																	</g>
																</svg>
															</button>
															<div class="dropdown-menu dropdown-menu-end">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media me-2 media-success">
															<i class="fa fa-home"></i>
														</div>
														<div class="media-body">
															<h5 class="mb-1">Reminder : Treatment Time!</h5>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
														<div class="dropdown">
															<button type="button" class="btn btn-success light sharp"
																data-bs-toggle="dropdown">
																<svg width="18px" height="18px" viewBox="0 0 24 24"
																	version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
																		fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<circle fill="#000000" cx="5" cy="12" r="2">
																		</circle>
																		<circle fill="#000000" cx="12" cy="12" r="2">
																		</circle>
																		<circle fill="#000000" cx="19" cy="12" r="2">
																		</circle>
																	</g>
																</svg>
															</button>
															<div class="dropdown-menu dropdown-menu-end">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media me-2">
															<img alt="image" width="50" src="images/avatar/1.jpg">
														</div>
														<div class="media-body">
															<h5 class="mb-1">Dr sultads Send you Photo</h5>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
														<div class="dropdown">
															<button type="button" class="btn btn-primary light sharp"
																data-bs-toggle="dropdown">
																<svg width="18px" height="18px" viewBox="0 0 24 24"
																	version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
																		fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<circle fill="#000000" cx="5" cy="12" r="2">
																		</circle>
																		<circle fill="#000000" cx="12" cy="12" r="2">
																		</circle>
																		<circle fill="#000000" cx="19" cy="12" r="2">
																		</circle>
																	</g>
																</svg>
															</button>
															<div class="dropdown-menu dropdown-menu-end">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media me-2 media-danger">
															KG
														</div>
														<div class="media-body">
															<h5 class="mb-1">Resport created successfully</h5>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
														<div class="dropdown">
															<button type="button" class="btn btn-danger light sharp"
																data-bs-toggle="dropdown">
																<svg width="18px" height="18px" viewBox="0 0 24 24"
																	version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
																		fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<circle fill="#000000" cx="5" cy="12" r="2">
																		</circle>
																		<circle fill="#000000" cx="12" cy="12" r="2">
																		</circle>
																		<circle fill="#000000" cx="19" cy="12" r="2">
																		</circle>
																	</g>
																</svg>
															</button>
															<div class="dropdown-menu dropdown-menu-end">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media me-2 media-primary">
															<i class="fa fa-home"></i>
														</div>
														<div class="media-body">
															<h5 class="mb-1">Reminder : Treatment Time!</h5>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
														<div class="dropdown">
															<button type="button" class="btn btn-primary light sharp"
																data-bs-toggle="dropdown">
																<svg width="18px" height="18px" viewBox="0 0 24 24"
																	version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
																		fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<circle fill="#000000" cx="5" cy="12" r="2">
																		</circle>
																		<circle fill="#000000" cx="12" cy="12" r="2">
																		</circle>
																		<circle fill="#000000" cx="19" cy="12" r="2">
																		</circle>
																	</g>
																</svg>
															</button>
															<div class="dropdown-menu dropdown-menu-end">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</div>
												</li>
											</ul>
											<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
												<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
												</div>
											</div>
											<div class="ps__rail-y" style="top: 0px; height: 370px; right: 0px;">
												<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 300px;">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


						</div>











					</div>


					<div class="row">
						<div class="col-lg-8">
							<div class="card">
								<div class="card-header">
									<h4 class="fs-20"> Quarter Achieved (Team)</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table header-border" style="min-width: 500px;">
											<thead>
												<tr>
													<th></th>

													<th>q1</th>
													<th>q2</th>
													<th>q3</th>
													<th>q4</th>

												</tr>
											</thead>
											<tbody>
												<tr class="table-primary">
													<td>Recruit</td>
													<td>0</td>
													<td>0</td>
													<td>0</td>
													<td>0</td>

												</tr>
												<tr class="table-success">
													<td>Temp</td>
													<td>0</td>
													<td>0</td>
													<td>0</td>
													<td>0</td>

												</tr>
												<tr class="table-info">
													<td>Fms</td>
													<td>0</td>
													<td>0</td>
													<td>0</td>
													<td>0</td>

												</tr>
												<tr class="table-warning">
													<td>Payroll</td>
													<td>0</td>
													<td>0</td>
													<td>0</td>
													<td>0</td>

												</tr>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="card">
								<div class="card-header border-0 pb-0">
									<h4 class="fs-20"> Business Achieved (month)</h4>
								</div>
								<div style: opacity :0.6; class="card-body pb-0">
									<ul class="list-group list-group-flush">
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Gender</h6>
											<span class="mb-0">Male</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Education</h6>
											<span class="mb-0">PHD</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Designation</h6>
											<span class="mb-0">Se. Professor</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Operation Done</h6>
											<span class="mb-0">120</span>
										</li>
									</ul>

								</div>
								<div class="card-footer pt-0 border-0">
									<a href="javascript:void(0);" class="btn btn-secondary btn-block text-white">View
										Detail</a>
								</div>
							</div>

						</div>
					</div>

					<div class="row">
						<div class="col-lg-4">
							<div class="card">
								<div class="card-header border-0 pb-0">
									<h4 class="fs-20"> Quarter 1 (Jan-Mar)</h4>
								</div>
								<div class="card-body pb-0">
									<ul class="list-group list-group-flush">
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Gender</h6>
											<span class="mb-0">Male</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Education</h6>
											<span class="mb-0">PHD</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Designation</h6>
											<span class="mb-0">Se. Professor</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Operation Done</h6>
											<span class="mb-0">120</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Operation Done</h6>
											<span class="mb-0">120</span>
										</li>
									</ul>
								</div>
								<div class="card-footer pt-0 border-0">
									<a href="javascript:void(0);" class="btn btn-secondary btn-block text-white">View
										Detail</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="card">
								<div class="card-header border-0 pb-0">
									<h4 class="fs-20"> Quarter 2 (Apr-Jun)</h4>
								</div>
								<div class="card-body pb-0">
									<ul class="list-group list-group-flush">
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Gender</h6>
											<span class="mb-0">Male</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Education</h6>
											<span class="mb-0">PHD</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Designation</h6>
											<span class="mb-0">Se. Professor</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Operation Done</h6>
											<span class="mb-0">120</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Operation Done</h6>
											<span class="mb-0">120</span>
										</li>
									</ul>
								</div>
								<div class="card-footer pt-0 border-0">
									<a href="javascript:void(0);" class="btn btn-secondary btn-block text-white">View
										Detail</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="card">
								<div class="card-header border-0 pb-0">
									<h4 class="fs-20"> Quarter 3 (Jul-Sep)</h4>
								</div>
								<div class="card-body pb-0">
									<ul class="list-group list-group-flush">
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Gender</h6>
											<span class="mb-0">Male</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Education</h6>
											<span class="mb-0">PHD</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Designation</h6>
											<span class="mb-0">Se. Professor</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Operation Done</h6>
											<span class="mb-0">120</span>
										</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
											<h6>Operation Done</h6>
											<span class="mb-0">120</span>
										</li>
									</ul>
								</div>
								<div class="card-footer pt-0 border-0">
									<a href="javascript:void(0);" class="btn btn-secondary btn-block text-white">View
										Detail</a>
								</div>
							</div>

						</div>
					</div>

					<div class="row">
						<div class="col-xl-3 col-xxl-3 col-sm-6">
							<div class="card overflow-hidden">
								<div class="social-graph-wrapper widget-facebook">
									<span class="s-icon"><i class="fab fa-facebook-f"></i></span>
								</div>
								<div class="row">
									<div class="col-6 border-end">
										<div class="pt-3 pb-3 ps-0 pe-0 text-center">
											<h4 class="m-1"><span class="counter">89</span> k</h4>
											<p class="m-0">Friends</p>
										</div>
									</div>
									<div class="col-6">
										<div class="pt-3 pb-3 ps-0 pe-0 text-center">
											<h4 class="m-1"><span class="counter">119</span> k</h4>
											<p class="m-0">Followers</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-xxl-3 col-sm-6">
							<div class="card overflow-hidden">
								<div class="social-graph-wrapper widget-linkedin">
									<span class="s-icon"><i class="fab fa-linkedin"></i></span>
								</div>
								<div class="row">
									<div class="col-6 border-end">
										<div class="pt-3 pb-3 ps-0 pe-0 text-center">
											<h4 class="m-1"><span class="counter">89</span> k</h4>
											<p class="m-0">Friends</p>
										</div>
									</div>
									<div class="col-6">
										<div class="pt-3 pb-3 ps-0 pe-0 text-center">
											<h4 class="m-1"><span class="counter">119</span> k</h4>
											<p class="m-0">Followers</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-xxl-3 col-sm-6">
							<div class="card overflow-hidden">
								<div class="social-graph-wrapper widget-googleplus">
									<span class="s-icon"><i class="fab fa-google-plus-g"></i></span>
								</div>
								<div class="row">
									<div class="col-6 border-end">
										<div class="pt-3 pb-3 ps-0 pe-0 text-center">
											<h4 class="m-1"><span class="counter">89</span> k</h4>
											<p class="m-0">Friends</p>
										</div>
									</div>
									<div class="col-6">
										<div class="pt-3 pb-3 ps-0 pe-0 text-center">
											<h4 class="m-1"><span class="counter">119</span> k</h4>
											<p class="m-0">Followers</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-xxl-3 col-sm-6">
							<div class="card overflow-hidden">
								<div class="social-graph-wrapper widget-twitter">
									<span class="s-icon"><i class="fab fa-twitter"></i></span>
								</div>
								<div class="row">
									<div class="col-6 border-end">
										<div class="pt-3 pb-3 ps-0 pe-0 text-center">
											<h4 class="m-1"><span class="counter">89</span> k</h4>
											<p class="m-0">Friends</p>
										</div>
									</div>
									<div class="col-6">
										<div class="pt-3 pb-3 ps-0 pe-0 text-center">
											<h4 class="m-1"><span class="counter">119</span> k</h4>
											<p class="m-0">Followers</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">

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
													stroke="#194039" stroke-width="2" stroke-linecap="round"
													stroke-linejoin="round" />
												<path
													d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
													stroke="#194039" stroke-width="2" stroke-linecap="round"
													stroke-linejoin="round" />
												<path
													d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
													stroke="#194039" stroke-width="2" stroke-linecap="round"
													stroke-linejoin="round" />
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
												<span class="fs-14 me-auto text-secondary"><i
														class="fa fa-ticket me-1"></i>High Performance Conert
													2020..</span>
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
												<span class="fs-14 me-auto text-secondary"><i
														class="fa fa-ticket me-1"></i>Fireworks Show New Year
													2020</span>
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
												<span class="fs-14 me-auto text-secondary"><i
														class="fa fa-ticket me-1"></i>High Performance Conert
													2020..</span>
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
												<span class="fs-14 me-auto text-secondary"><i
														class="fa fa-ticket me-1"></i>High Performance Conert
													2020..</span>
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
												<span class="fs-14 me-auto text-secondary"><i
														class="fa fa-ticket me-1"></i>High Performance Conert
													2020..</span>
												<span class="fs-14 text-nowrap">9m ago</span>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer style-1 border-0 px-0">
									<a href="javascript:void();"
										class="dz-load-more fa fa-long-arrow-down text-secondary" id="LatestSales"
										rel="ajax/latest-sales.html"></a>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-xxl-12">
							<div class="card">
								<div class="card-header border-0 flex-wrap pb-0">
									<h4 class="fs-20">Sales Revenue</h4>
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


			<script src="https://kit.fontawesome.com/d31220f8d2.js" crossorigin="anonymous"></script>
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
			@endsection
