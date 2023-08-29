@if(isset($obj))
    <div class="modal fade" id="alloteClient{{ $obj->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height:620px;width:750px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Remark</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card">
                    <div class="model-body">
                        <form action="{{url('allot-client')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <input type="hidden" name="obj_id" value="{{ $obj->id }}">
                                    <div class="form-group col-sm-6" >
                                        <label>Allot Date</label>
                                        <input type="date" name="allot_date" id="allot_date" value="{{ date('Y-m-d') }}" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-sm-6" >
                                        <label>Company Type</label>
                                        <select name="company_type"  class="form-control" id="company_type" required>
                                            <option value="">Select Company Type</option>
                                            <option value="temp" {{ ($obj->company_sub_type == 'temp') ? 'selected' : '' }}>Temp</option>
                                            <option value="IT" {{ ($obj->company_sub_type == 'IT') ? 'selected' : '' }}>IT</option>
                                            <option value="one-time" {{ ($obj->company_sub_type == 'one-time') ? 'selected' : '' }}>One Time</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6" >
                                        <label>Company Sub Type</label>
                                        <select name="alloted_software_type"  class="form-control"  id="alloted_software_type" onchange="getUserList(this.value)" required>
                                            <option value="">Select Company Sub Type</option>
                                            <option value="onrole" {{ ($obj->alloted_software_type == 'onrole') ? 'selected' : '' }}>Onrole</option>
                                            <option value="offrole" {{ ($obj->alloted_software_type == 'offrole') ? 'selected' : '' }}>Offrole</option>
                                            <option value="franchise-onrole" {{ ($obj->alloted_software_type == 'franchise-onrole') ? 'selected' : '' }}>Franchise Onrole</option>
                                            <option value="franchise-offrole" {{ ($obj->alloted_software_type == 'franchise-offrole') ? 'selected' : '' }}>Franchise Offrole</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6" >
                                        <label>Senior Manager/Manager</label>
                                        <select name="alloted_to"   class="form-control"  id="alloted_to" required>
                                            <option>Select Senior Manager/Manager</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6" >
                                        <label>Number Of Requirement</label>
                                        <input type="number" name="no_of_requirement" id="no_of_requirement" value="{{ $obj->no_req }}" class="form-control" required>
                                    </div>

                                    <div class="form-group col-sm-6" >
                                        <label>Percetange</label>
                                        <input type="text" name="percentage" id="percentage" value="{{ $obj->percentage }}" class="form-control" >
                                    </div>

                                    <div class="form-group col-sm-6" >
                                        <label>Company Logo</label>
                                        <input type="file" name="company_logo" id="company_logo" value="" class="form-control" required>
                                    </div>

                                    <div class="form-group col-sm-6" >
                                        <label>Company Website</label>
                                        <input type="text" name="company_website" id="company_website" value="{{ $obj->client_website }}" class="form-control">
                                    </div>

                                    <div class="form-group col-sm-12" >
                                        <label>About Company</label>
                                        <input type="text" name="about_company" id="about_company" value="{{ $obj->clientabt }}" class="form-control">
                                    </div>



                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10">
                                    <button type="submit" class="btn btn-success" name="save" >
                                        Allot
                                    </button>
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link href="{{ asset('path-to-select2/css/select2.min.css') }}" rel="stylesheet">
<script src="{{ asset('path-to-select2/js/select2.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2(); // Apply Select2 to elements with class 'select2'
    });
</script>

<script>
    // $(".js-example-tokenizer").select2({
    //     tags: true,
    //     tokenSeparators: [',']
    // })
    getUserList($('#alloted_software_type').val())
    function getUserList(type){
        console.log(type)
        if(type == '' || type == 'undefined'){
            return false;
        }
        $.ajax({
            type:'GET',
            url: '{{ url('getUserList') }}' + '/' + type,
            success:function(response){
               $('#alloted_to').html(response);
            }
        })
    }
</script>

