<div class="modal right fade right-Modal" id="myModal2{{ $obj->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body custom-modal-body">
                <div class="custom-tab-1">
                    <div class="tab-content custom-tab-content">
                        <div id="details-tab{{ $obj->id }}" class="tab-pane fade active show"
                            role="tabpanel">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <h6>Enquiry Details</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row px-2">
                                        <div class="left-row col-md-6">
                                            <div class="candidate_mobile mb-4">
                                                <h6 class="m-0">Company Name</h6>
                                                <p class="m-0">
                                                    {{ isset($obj->company_name) ? $obj->company_name : 'N/A' }}
                                                    </h6>
                                            </div>
                                            <div class="candidate_qualification my-4">
                                                <h6 class="m-0">Enquiry Date</h6>
                                                <p class="m-0">{{ $obj?->created_at }}</h6>
                                            </div>
                                            <div class="candidate_sourcedPosition my-4">
                                                <h6 class="m-0">Lead Days</h6>
                                                <p class="m-0">
                                                    @if ($diffrence_one <= 30)
                                                        <label>
                                                            <?php echo $diffrence_one = $diff->format('%a'); ?></label>
                                                    @elseif($diffrence_one > 30 && $diffrence_one <= 60)
                                                        <label>
                                                            <?php echo $diffrence_one = $diff->format('%a'); ?></label>
                                                    @else
                                                        <label><?php echo $diffrence_one = $diff->format('%a'); ?></label>
                                                    @endif
                                                    </h6>
                                            </div>
                                            <div class="candidate_mobile mb-4">
                                                <h6 class="m-0">Company Type</h6>
                                                <p class="m-0">{{ $obj?->company_type }}</h6>
                                            </div>
                                            <div class="candidate_qualification my-4">
                                                <h6 class="m-0">Vertical</h6>
                                                <p class="m-0">{{ $obj?->vertical }}</h6>
                                            </div>
                                            <div class="candidate_sourcedPosition my-4">
                                                <h6 class="m-0">Contact Person</h6>
                                                <p class="m-0">
                                                    {{ $obj->contact_person }}</h6>
                                            </div>
                                            <div class="candidate_sourcedPosition my-4">
                                                <h6 class="m-0">Designation</h6>
                                                <p class="m-0">
                                                    {{ $obj?->desig }}</h6>
                                            </div>
                                            <div class="candidate_sourcedPosition my-4">
                                                <h6 class="m-0">Email</h6>
                                                <p class="m-0">
                                                    {{ $obj->email }}</h6>
                                            </div>
                                        </div>

                                        <div class="left-row col-md-6">
                                            <div class="candidate_mobile mb-4">
                                                <h6 class="m-0">Mobile</h6>
                                                <p class="m-0">
                                                    {{ $obj->contact }}</h6>
                                            </div>
                                            <div class="candidate_qualification my-4">
                                                <h6 class="m-0">Dob</h6>
                                                <p class="m-0">{{ $obj?->dob }}</h6>
                                            </div>
                                            <div class="candidate_mobile mb-4">
                                                <h6 class="m-0">Location</h6>
                                                <p class="m-0">
                                                    {{ $obj->location }}</h6>
                                            </div>
                                            <div class="candidate_qualification my-4">
                                                <h6 class="m-0">Proposal Type</h6>
                                                <p class="m-0">
                                                    {{ isset($obj->GetEnquiryType->name) ? $obj->GetEnquiryType->name : 'N/A' }}
                                                    </h6>
                                            </div>

                                            <div class="candidate_mobile mb-4">
                                                <h6 class="m-0">Current Status</h6>
                                                <p class="m-0">
                                                    {{ $obj->GetStatus->remark ?? '-' }}</h6>
                                            </div>
                                            <div class="candidate_qualification my-4">
                                                <h6 class="m-0">Next Follow Up Date</h6>
                                                <p class="m-0">{{ $obj?->next_follow_date }}</h6>
                                            </div>
                                            <div class="candidate_mobile mb-4">
                                                <h6 class="m-0">Latest
                                                    Remark</h6>
                                                <p class="m-0">{{ $obj->remark ?? '-' }}
                                                    </h6>
                                            </div>
                                            <div class="candidate_qualification my-4">
                                                <h6 class="m-0">Manager
                                                    Remark</h6>
                                                @php
                                                    $managerRemark = isset($obj->GetManagerRemarks) ? $obj->GetManagerRemarks->remark : null;
                                                @endphp
                                                <p class="m-0">
                                                    {{ $obj->GetManagerRemarks->remark ?? '-' }}</h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
