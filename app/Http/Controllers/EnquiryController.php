<?php

namespace App\Http\Controllers;
use Aws\S3\Visibility\PortableVisibilityConverter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Storage;
use App\Models\Enquiry;
use App\Models\User;
use App\Models\Target;
use Carbon\Carbon;
use App\Models\CompanyAllotment;
use App\Models\ManagerRemark;
use App\Models\UtilitesTools;
class EnquiryController extends Controller
{
    //     public function searchByContactPerson(Request $request)
    // {
    //     $search3 = $request->get('searchByContactPerson');
    //     $detailc1 = Enquiry::where('contact_person', 'like', '%' . $search3 . '%')->count();
    //     $detailc = Enquiry::where('contact_person', 'like', '%' . $search3 . '%')->paginate(20);
    //     return view('Enquiry.EnquiryList')->with(['Details' => $detailc, 'Details1' => $detailc1]);
    // }
    // public function searchByMobile(Request $request)
    // {
    //     $search1 = $request->get('searchByMobile');
    //     $detailb = Enquiry::where('contact', 'like', '%' . $search1 . '%')->paginate(20);
    //     $detail1 = Enquiry::where('contact', 'like', '%' . $search1 . '%')->count();
    //     return view('Enquiry.EnquiryList')->with(['Details' => $detailb, 'Details1' => $detail1]);
    // }
    // public function searchByCompanyName(Request $request)
    // {
    //     $search = $request->get('searchByCompanyName');
    //     $detaila = Enquiry::where('company_name', 'like', '%' . $search . '%')->paginate(20);
    //     $detaila1 = Enquiry::where('company_name', 'like', '%' . $search . '%')->count();
    //     return view('Enquiry.EnquiryList')->with(['Details' => $detaila, 'Details1' => $detaila1]);
    // }

    public function searchEnquiry(Request $request){


        $from = $request->get('from') == "" ? carbon::parse(date('2020-01-01'))->format('Y-m-d') : $request->get('from');
        $to = $request->get('to') == "" ? carbon::parse(carbon::now())->format('Y-m-d') : $request->get('to');
        $type = $request->get('type') ?? 0;
        $status = $request->get('status') ?? 0;
        $employee = $request->get('employee') ?? 0;
        $follow = $request->get('follow') ?? 0;
        $search1 = $request->get('searchByMobile')?? 0;
        $search = $request->get('searchByCompanyName')?? 0;
        $search3 = $request->get('searchByContactPerson')?? 0;

        $detail = Enquiry::whereBetween('created_at',  array($from . ' 00:00:00', $to . ' 23:59:59'));

            if (Auth::user()->type === 'Admin') {

            if ($type != 0) {
                $detail =   $detail->where('enquiry_type_id', '=', $type);
            }
            if ($status != 0) {
                $detail =   $detail->where('status_id', '=', $status);
            }
            if ($employee != 0) {
                $detail =   $detail->where('created_by', '=', $employee);
            }
            if ($follow != 0) {
                $detail =   $detail->where('next_follow_date', '=', $follow);
            }
            if ($search1 != 0) {
                $detail =   $detail->where('contact', 'like', '%' . $search1 . '%');
            }
            if ($search != 0) {
                $detail =   $detail->where('company_name', 'like', '%' . $search . '%');
            }
            if ($search3 != 0) {
                $detail =   $detail->where('contact_person', 'like', '%' . $search3 . '%');
            }
        }elseif(Auth::user()->type === 'Manager') {

            $user = Auth::user();
            $detail = $detail->whereHas('GetCreatedby', function ($query) use ($user) {
                $query->where('created_by', $user->id);
            });

            if ($type != 0) {
                $detail =   $detail->where('enquiry_type_id', '=', $type);
            }
            if ($status != 0) {
                $detail =   $detail->where('status_id', '=', $status);
            }
            if ($employee != 0) {
                $detail =   $detail->where('created_by', '=', $employee);
            }
            if ($follow != 0) {
                $detail =   $detail->where('next_follow_date', '=', $follow);
            }
            if ($search1 != 0) {
                $detail =   $detail->where('contact', 'like', '%' . $search1 . '%');
            }
            if ($search != 0) {
                $detail =   $detail->where('company_name', 'like', '%' . $search . '%');
            }
            if ($search3 != 0) {
                $detail =   $detail->where('contact_person', 'like', '%' . $search3 . '%');
            }

        }
        else {

            $detail = $detail->where('created_by', Auth::user()->id);

            if ($type != 0) {
                $detail =   $detail->where('enquiry_type_id', '=', $type);
            }
            if ($status != 0) {
                $detail =   $detail->where('status_id', '=', $status);
            }
            if ($employee != 0) {
                $detail =   $detail->where('created_by', '=', $employee);
            }
            if ($follow != 0) {
                $detail =   $detail->where('next_follow_date', '=', $follow);
            }
            if ($search1 != 0) {
                $detail =   $detail->where('contact', 'like', '%' . $search1 . '%');
            }
            if ($search != 0) {
                $detail =   $detail->where('company_name', 'like', '%' . $search . '%');
            }
            if ($search3 != 0) {
                $detail =   $detail->where('contact_person', 'like', '%' . $search3 . '%');
            }

         }
            $detail2 = $detail->get();
            $detail = $detail->orderBy("id", "desc")->paginate(10);
            $detail1 = $detail2->count();

        if ($request->ajax()) {
            return view('Enquiry.searchingResultEnquiry')->with(['Details' => $detail, 'Details1' => $detail1]);
        }

        // Append the query parameters to the pagination links
        $detail->appends([
            'from' => $from,
            'to' => $to,
            'type' => $type,
            'status' => $status,
            'employee' => $employee,
            'follow' => $follow,
            'searchByMobile' => $search1,
            'searchByCompanyName' => $search,
            'searchByContactPerson' => $search3,
        ]);
        return view('Enquiry.EnquiryList')->with([
            'Details' => $detail,
            'Details1' => $detail1,
            'from' => $from,
            'to' => $to,
            'type' => $type,
            'status' => $status,
            'employee' => $employee,
            'follow' => $follow
        ]);
    }
    function addEnquiry(){

        return view('Enquiry.AddEnquiry');
    }

    function enquiryList(){
        $user = Auth::user();
        $enquiries = Enquiry::query();
        $enquiries1 = null;
        if ($user->type === 'Admin') {
            $enquiries = $enquiries->orderBy("id", "desc");
            $enquiries1 = $enquiries->orderBy("id", "desc")->count();
        } elseif ($user->type === 'Manager') {
            // $enquiries = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
            //     $query->where('created_by', $user->id)->orderBy("id","desc");
            // });
            // $enquiries1 = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
            //     $query->where('created_by', $user->id)->orderBy("id","desc");
            // })->count();
            $enquiries = $enquiries->where('created_by', $user->id)->orderBy("id", "desc");
            $enquiries1 = $enquiries->where('created_by', $user->id)->orderBy("id", "desc")->count();
        } elseif ($user->type === 'Staff') {
            $enquiries = $enquiries->where('created_by', $user->id)->orderBy("id", "desc");
            $enquiries1 = $enquiries->where('created_by', $user->id)->orderBy("id", "desc")->count();
        }
        if ($enquiries1 === null) {
            $enquiries1 = 0;
        }
        $enquiries = $enquiries->paginate(10);
        foreach ($enquiries as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        $enquiryTagline = "Total Enquiries";

        return view('Enquiry.EnquiryList')->with(['Details' => $enquiries, 'Details1' => $enquiries1, 'enquiryTagline'=>$enquiryTagline ]);
    }


    function storeEnquiry(Request $request){

        $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'vertical' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'company_type' => 'required|string|in:Old,Start-Up',
            'next_follow_date' => 'nullable|date',
            'next_follow_time' => 'nullable|date_format:H:i',
            'break_date' => 'nullable|date',
            'email' => 'required|email|max:255',
            'contact' => 'required|string|max:255',
            'enquiry_type_id' => 'required|integer',
            'status_id' => 'required|integer',
            'desig' => 'required|string|max:255',
            'dob' => 'nullable|date',
            'remark' => 'required|string',
        ]);

            $enquiry = new Enquiry();
            $enquiry->enquiry_type_id = $request->input('enquiry_type_id');
            $enquiry->company_name = $request->input('company_name');
            $enquiry->complete_com_name = $request->input('complete_com_name');
            $enquiry->contact_person = $request->input('contact_person');
            $enquiry->vertical = $request->input('vertical');
            $enquiry->dob = $request->input('dob');
            $enquiry->location = $request->input('location');
            $enquiry->desig = $request->input('desig');
            $enquiry->status_id = $request->input('status_id');
            $enquiry->contact = $request->input('contact');
            $enquiry->email = $request->input('email');
            $enquiry->user_id = $request->input('user_id');
            $enquiry->break_date = $request->input('break_date');
            $enquiry->next_follow_date = $request->input('next_follow_date');
            $enquiry->next_follow_time = $request->input('next_follow_time');
            $enquiry->remark = $request->input('remark');
            $enquiry->company_type = $request->input('company_type');
            $enquiry->created_by = Auth::user()->id;

             //image
               $image_code = $request->imageBaseString;
                $fileName = uploadImageWithBase64($image_code);
                if(!empty($image_code)){
                    $filepath = time() . '_' . rand() . '.png';
                    // Storage::disk('s3')->put($filepath, base64_decode($image_code), 'public');
                    Storage::disk('s3')->put($filepath, file_get_contents($fileName), 'public');
                    $enquiry->image = $filepath;
                }
                $enquiry->save();

                //target

        if ($enquiry->status_id == '15') {
            if ($enquiry->enquiry_type_id == '7') {
                $lastTargetRecord = Target::where('user_id', Auth::user()->id)->where(['type' => '7'])->latest()->first();
                if($lastTargetRecord){
                    $lastTargetRecord->complete = $lastTargetRecord->complete + 1;
                    $lastTargetRecord->save();
                    $lastTargetRecord->remaining = $lastTargetRecord->remaining - 1;
                    $lastTargetRecord->save();
                }
            }
            if ($enquiry->enquiry_type_id == '5') {
                $lastTargetRecord = Target::where('user_id', Auth::user()->id)->where(['type' => '5'])->latest()->first();
                if($lastTargetRecord){
                $lastTargetRecord->complete = $lastTargetRecord->complete + 1;
                $lastTargetRecord->save();
                $lastTargetRecord->remaining = $lastTargetRecord->remaining - 1;
                $lastTargetRecord->save();
            }}
            if ($enquiry->enquiry_type_id == '6') {
                $lastTargetRecord = Target::where('user_id', Auth::user()->id)->where(['type' => '6'])->latest()->first();
                if( $lastTargetRecord){
                $lastTargetRecord->complete = $lastTargetRecord->complete + 1;
                $lastTargetRecord->save();
                $lastTargetRecord->remaining = $lastTargetRecord->remaining - 1;
                $lastTargetRecord->save();
            }}
            if ($enquiry->enquiry_type_id == '4') {
                $lastTargetRecord = Target::where('user_id', Auth::user()->id)->where(['type' => '4'])->latest()->first();
                if( $lastTargetRecord){
                $lastTargetRecord->complete = $lastTargetRecord->complete + 1;
                $lastTargetRecord->save();
                $lastTargetRecord->remaining = $lastTargetRecord->remaining - 1;
                $lastTargetRecord->save();
            }}
        }

                return redirect('enquiry-list');


    }

    function teamEnquiry() {
        $user = Auth::user();
        $enquiries = Enquiry::query();
        $enquiries1 = 0;
        if ($user->type === 'Manager') {
            // $enquiries = $enquiries->where('created_by', $user->id)->where('status_id', '!=', '15')->orderBy("id", "desc");
            // $enquiries->each(function ($enquiri) {
            //     if (!empty($enquiri->image)) { // Corrected line
            //         $disk = Storage::disk('s3');
            //         $enquiri->image = $disk->temporaryUrl($enquiri->image, now()->addMinutes(5));

            //     }
            // });
            // $enquiries1 = Enquiry::where('created_by', $user->id)->where('status_id', '!=', '15')->orderBy("id", "desc")->count();
            $enquiries = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
                $query->where('created_by', $user->id)->orderBy("id","desc");
            });
            $enquiries1 = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
                $query->where('created_by', $user->id)->orderBy("id","desc");
            })->count();

            // $enquiries = $enquiries->where('created_by', $user->id)->orderBy("id", "desc");
            $enquiries->each(function ($enquiri) {
                if (!empty($enquiri->image)) { // Corrected line
                    $disk = Storage::disk('s3');
                    $enquiri->image = $disk->temporaryUrl($enquiri->image, now()->addMinutes(5));

                }
            });
            // $enquiries1 = Enquiry::where('created_by', $user->id)->orderBy("id", "desc")->count();
        }
        $enquiries = $enquiries->paginate (10);
        foreach ($enquiries as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        return view('Enquiry.EnquiryList')->with(['Details' => $enquiries, 'Details1' => $enquiries1]);
    }

    function updateManagerEnquiry() {
        $user = Auth::user();
        $enquiries = Enquiry::query();
        $enquiries1 = 0;
        if ($user->type === 'Manager') {
            $enquiries = $enquiries->where('created_by', $user->id)->where('status_id', '!=', '15')->orderBy("id", "desc");
            $enquiries1 = Enquiry::where('created_by', $user->id)->where('status_id', '!=', '15')->orderBy("id", "desc")->count();
        }

        $enquiries = $enquiries->paginate (10);

        return view('Enquiry.EnquiryList')->with(['Details' => $enquiries, 'Details1' => $enquiries1]);
    }
    function editEnquiry($id){

        $enquiry = Enquiry::where('id',$id)->first();

        return view('Enquiry.EditEnquiry', compact('enquiry'));
    }

    function updateEnquiry(Request $request, $id){

        $enquiry = Enquiry::where('id', $id)->first();
        $enquiry->enquiry_type_id = $request->input('enquiry_type_id');
        $enquiry->company_name = $request->input('company_name');
        $enquiry->complete_com_name = $request->input('complete_com_name');
        $enquiry->contact_person = $request->input('contact_person');
        $enquiry->vertical = $request->input('vertical');
        $enquiry->dob = $request->input('dob');
        $enquiry->location = $request->input('location');
        $enquiry->desig = $request->input('desig');
        $enquiry->status_id = $request->input('status_id');
        $enquiry->contact = $request->input('contact');
        $enquiry->email = $request->input('email');
        $enquiry->user_id = $request->input('user_id');
        $enquiry->break_date = $request->input('break_date');
        $enquiry->next_follow_date = $request->input('next_follow_date');
        $enquiry->next_follow_time = $request->input('next_follow_time');
        $enquiry->remark = $request->input('remark');
        $enquiry->company_type = $request->input('company_type');
        $enquiry->created_by = Auth::user()->id;

         //image
            $image_code = $request->imageBaseString;
            $fileName = uploadImageWithBase64($image_code);
            if(!empty($image_code)){
                $filepath = time() . '_' . rand() . '.png';
                // Storage::disk('s3')->put($filepath, base64_decode($image_code), 'public');
                Storage::disk('s3')->put($filepath, file_get_contents($image_code));
                $enquiry->image = $filepath;
            }
            $enquiry->save();

             //target

        if ($enquiry->status_id == '15') {
            if ($enquiry->enquiry_type_id == '7') {
                $lastTargetRecord = Target::where('user_id', Auth::user()->id)->where(['type' => '7'])->latest()->first();
                if($lastTargetRecord){
                    $lastTargetRecord->complete = $lastTargetRecord->complete + 1;
                    $lastTargetRecord->save();
                    $lastTargetRecord->remaining = $lastTargetRecord->remaining - 1;
                    $lastTargetRecord->save();
                }
            }
            if ($enquiry->enquiry_type_id == '5') {
                $lastTargetRecord = Target::where('user_id', Auth::user()->id)->where(['type' => '5'])->latest()->first();
                if($lastTargetRecord){
                $lastTargetRecord->complete = $lastTargetRecord->complete + 1;
                $lastTargetRecord->save();
                $lastTargetRecord->remaining = $lastTargetRecord->remaining - 1;
                $lastTargetRecord->save();
            }}
            if ($enquiry->enquiry_type_id == '6') {
                $lastTargetRecord = Target::where('user_id', Auth::user()->id)->where(['type' => '6'])->latest()->first();
                if( $lastTargetRecord){
                $lastTargetRecord->complete = $lastTargetRecord->complete + 1;
                $lastTargetRecord->save();
                $lastTargetRecord->remaining = $lastTargetRecord->remaining - 1;
                $lastTargetRecord->save();
            }}
            if ($enquiry->enquiry_type_id == '4') {
                $lastTargetRecord = Target::where('user_id', Auth::user()->id)->where(['type' => '4'])->latest()->first();
                if( $lastTargetRecord){
                $lastTargetRecord->complete = $lastTargetRecord->complete + 1;
                $lastTargetRecord->save();
                $lastTargetRecord->remaining = $lastTargetRecord->remaining - 1;
                $lastTargetRecord->save();
            }}
        }
            return redirect('enquiry-list');


    }

    public function deleteEnquiry($id){
        $enquiry = Enquiry::where('id', $id)->first();
        $enquiry->delete();
        return back();
    }
    // hot list
    function hot() {
        $user = Auth::user();
        $enquiries = Enquiry::query();
        $enquiries1 = null;

        if ($user->type === 'Admin') {
            $enquiries = $enquiries->where('status_id', '10')->orderBy("id", "desc");
            $enquiries1 = $enquiries->where('status_id', '10')->count();
        } elseif ($user->type === 'Manager') {
            // $enquiries = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
            //     $query->where('created_by', $user->id)->where('status_id', '10');
            // });
            // $enquiries1 = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
            //     $query->where('created_by', $user->id)->where('status_id', '10');
            // })->count();
            $enquiries = $enquiries->where('status_id', '10')->where('created_by', $user->id)->orderBy("id", "desc");
            $enquiries1 = $enquiries->where('status_id', '10')->orderBy("id", "desc")->count();
        } elseif ($user->type === 'Staff') {
            $enquiries = $enquiries->where('status_id', '10')->where('created_by', $user->id)->orderBy("id", "desc");
            $enquiries1 = $enquiries->where('status_id', '10')->orderBy("id", "desc")->count();
        }

        if ($enquiries1 === null) {
            $enquiries1 = 0;
        }

        $enquiries = $enquiries->paginate(10);
        foreach ($enquiries as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        $hotTagline = "Total Hot Enquiries";
        return view('Enquiry.EnquiryList')->with(['Details' => $enquiries, 'Details1' => $enquiries1, 'hotTagline'=>$hotTagline ]);
    }

    function holdList(){

        $user = Auth::user();
        $enquiries = Enquiry::query();
        $enquiries1 = null;

        if ($user->type === 'Admin') {
            $enquiries = $enquiries->where('status_id', '16')->orderBy("id", "desc");
            $enquiries1 = $enquiries->where('status_id', '16')->count();
        } elseif ($user->type === 'Manager') {
            // $enquiries = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
            //     $query->where('created_by', $user->id)->where('status_id', '16');
            // });
            // $enquiries1 = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
            //     $query->where('created_by', $user->id)->where('status_id', '16');
            // })->count();
            $enquiries = $enquiries->where('status_id', '16')->where('created_by', $user->id)->orderBy("id", "desc");
            $enquiries1 = $enquiries->where('status_id', '16')->orderBy("id", "desc")->count();

        } elseif ($user->type === 'Staff') {
            $enquiries = $enquiries->where('status_id', '16')->where('created_by', $user->id)->orderBy("id", "desc");
            $enquiries1 = $enquiries->where('status_id', '16')->orderBy("id", "desc")->count();
        }

        if ($enquiries1 === null) {
            $enquiries1 = 0;
        }

        $enquiries = $enquiries->paginate (10);
        foreach ($enquiries as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        $holdTagline = "Total Hold Enquiries";
        return view('Enquiry.EnquiryList')->with(['Details' => $enquiries, 'Details1' => $enquiries1, 'holdTagline'=>$holdTagline ]);

    }

    function teamHotList(){
        return view('Enquiry.TeamHotList');

    }

    public function teamMemberHotList($id){
        $Details = Enquiry::where(['status_id' => 10, 'created_by' => $id])->paginate (10);
        $Details1 = Enquiry::where(['status_id' => 10, 'created_by' => $id])->count();
        return view('Enquiry.EnquiryList')->with(['Details' => $Details,'Details1' => $Details1]);
    }

    public function multySelectMemberHotList(Request $request)
    {
        $selectedUserIds = $request->input('selected_users', []);

        $hotListDetails = Enquiry::whereIn('created_by', $selectedUserIds)
            ->where('status_id', 10)
            ->paginate (10);

        $hotListDetailsCount = Enquiry::whereIn('created_by', $selectedUserIds)
            ->where('status_id', 10)
            ->count();

        return view('Enquiry.EnquiryList')->with([
            'Details' => $hotListDetails,
            'Details1' => $hotListDetailsCount
        ]);
    }

    public function ViewManagerRemark()
    {
        $id = \request('id');
        $Details = Enquiry::find($id);
        return view('Enquiry.EnquiryList')->with(['Details' => $Details]);
    }

    //Break list
    public function breakList(){

        $user = Auth::user();
        $enquiries = Enquiry::query();
        $enquiries1 = null;
        if ($user->type === 'Admin') {
            $enquiries = $enquiries->where('status_id', '15')->orderBy("id", "desc");
            $enquiries1 = $enquiries->where('status_id', '15')->orderBy("id", "desc")->count();
        } elseif ($user->type === 'Manager') {
            // $enquiries = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
            //     $query->where('created_by', $user->id)->where('status_id', '15')->orderBy("id","desc");
            // });
            // $enquiries1 = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
            //     $query->where('created_by', $user->id)->where('status_id', '15')->orderBy("id","desc");
            // })->count();
            $enquiries = $enquiries->where('created_by', $user->id)->where('status_id', '15')->orderBy("id", "desc");
            $enquiries1 = $enquiries->where('created_by', $user->id)->where('status_id', '15')->orderBy("id", "desc")->count();
        } elseif ($user->type === 'Staff') {
            $enquiries = $enquiries->where('created_by', $user->id)->where('status_id', '15')->orderBy("id", "desc");
            $enquiries1 = $enquiries->where('created_by', $user->id)->where('status_id', '15')->orderBy("id", "desc")->count();
        }
        if ($enquiries1 === null) {
            $enquiries1 = 0;
        }
        $enquiries = $enquiries->paginate(10);
        foreach ($enquiries as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        return view('Enquiry.breakEnquiry')->with(['Details' => $enquiries, 'Details1' => $enquiries1 ]);

    }

    public function searchBreakEnquiry(Request $request){

        $from = $request->get('from') == "" ? carbon::parse(date('2020-01-01'))->format('Y-m-d') : $request->get('from');
        $to = $request->get('to') == "" ? carbon::parse(carbon::now())->format('Y-m-d') : $request->get('to');
        $type = $request->get('type') ?? 0;
        $status = $request->get('status') ?? 0;
        $employee = $request->get('employee') ?? 0;
        $follow = $request->get('follow') ?? 0;
        $search1 = $request->get('searchByMobile')?? 0;
        $search = $request->get('searchByCompanyName')?? 0;
        $search3 = $request->get('searchByContactPerson')?? 0;

        $detail = Enquiry::whereBetween('created_at',  array($from . ' 00:00:00', $to . ' 23:59:59'))->where('status_id', '15');

            if (Auth::user()->type === 'Admin') {

            if ($type != 0) {
                $detail =   $detail->where('enquiry_type_id', '=', $type);
            }
            if ($status != 0) {
                $detail =   $detail->where('status_id', '=', $status);
            }
            if ($employee != 0) {
                $detail =   $detail->where('created_by', '=', $employee);
            }
            if ($follow != 0) {
                $detail =   $detail->where('next_follow_date', '=', $follow);
            }
            if ($search1 != 0) {
                $detail =   $detail->where('contact', 'like', '%' . $search1 . '%');
            }
            if ($search != 0) {
                $detail =   $detail->where('company_name', 'like', '%' . $search . '%');
            }
            if ($search3 != 0) {
                $detail =   $detail->where('contact_person', 'like', '%' . $search3 . '%');
            }
        }elseif(Auth::user()->type === 'Manager') {

            $user = Auth::user();
            $detail = $detail->whereHas('GetCreatedby', function ($query) use ($user) {
                $query->where('created_by', $user->id);
            });

            if ($type != 0) {
                $detail =   $detail->where('enquiry_type_id', '=', $type);
            }
            if ($status != 0) {
                $detail =   $detail->where('status_id', '=', $status);
            }
            if ($employee != 0) {
                $detail =   $detail->where('created_by', '=', $employee);
            }
            if ($follow != 0) {
                $detail =   $detail->where('next_follow_date', '=', $follow);
            }
            if ($search1 != 0) {
                $detail =   $detail->where('contact', 'like', '%' . $search1 . '%');
            }
            if ($search != 0) {
                $detail =   $detail->where('company_name', 'like', '%' . $search . '%');
            }
            if ($search3 != 0) {
                $detail =   $detail->where('contact_person', 'like', '%' . $search3 . '%');
            }

        }
        else {

            $detail = $detail->where('created_by', Auth::user()->id);

            if ($type != 0) {
                $detail =   $detail->where('enquiry_type_id', '=', $type);
            }
            if ($status != 0) {
                $detail =   $detail->where('status_id', '=', $status);
            }
            if ($employee != 0) {
                $detail =   $detail->where('created_by', '=', $employee);
            }
            if ($follow != 0) {
                $detail =   $detail->where('next_follow_date', '=', $follow);
            }
            if ($search1 != 0) {
                $detail =   $detail->where('contact', 'like', '%' . $search1 . '%');
            }
            if ($search != 0) {
                $detail =   $detail->where('company_name', 'like', '%' . $search . '%');
            }
            if ($search3 != 0) {
                $detail =   $detail->where('contact_person', 'like', '%' . $search3 . '%');
            }

         }
            $detail2 = $detail->get();
            $detail = $detail->orderBy("id", "desc")->paginate(10);
            $detail1 = $detail2->count();

        if ($request->ajax()) {
            return view('Enquiry.searchresultBreak')->with(['Details' => $detail, 'Details1' => $detail1]);
        }

        // Append the query parameters to the pagination links
        $detail->appends([
            'from' => $from,
            'to' => $to,
            'type' => $type,
            'status' => $status,
            'employee' => $employee,
            'follow' => $follow,
            'searchByMobile' => $search1,
            'searchByCompanyName' => $search,
            'searchByContactPerson' => $search3,
        ]);
        return view('Enquiry.EnquiryList')->with([
            'Details' => $detail,
            'Details1' => $detail1,
            'from' => $from,
            'to' => $to,
            'type' => $type,
            'status' => $status,
            'employee' => $employee,
            'follow' => $follow
        ]);

    }

    public function teamBreakList(){

        $user = Auth::user();
        $enquiries = Enquiry::query();
        $enquiries1 = null;
        if ($user->type === 'Manager') {
            $enquiries = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
                $query->where('created_by', $user->id)->where('status_id', '15')->orderBy("id","desc");
            });
            $enquiries1 = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
                $query->where('created_by', $user->id)->where('status_id', '15')->orderBy("id","desc");
            })->count();
        }
        if ($enquiries1 === null) {
            $enquiries1 = 0;
        }
        $enquiries = $enquiries->paginate(10);
        foreach ($enquiries as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        return view('Enquiry.breakEnquiry')->with(['Details' => $enquiries, 'Details1' => $enquiries1 ]);


    }
    //Allote Client to Manager

    function allotClientModal(Request $request){

        if(!empty($request->id)){
            $enquiry = Enquiry::find($request->id);
            return view('Enquiry.clientAllote.alloteClient',compact('enquiry'));
        } else {
            return view('Enquiry.clientAllote.alloteClient');
        }
    }

    function getUserList($type){
        $base_url = "https://white-force.com/plus/api/getUserList";
        $data['type'] = $type;
        $html = "";
        if(!empty($type)){
            $userlist = file_get_contents($base_url."/".$type);
            $userlist = json_decode($userlist);
            $userslist = $userlist->data;
            foreach ($userslist as $role => $users) {
                $html .= '<optgroup label="' . $role . '">';
                foreach ($users as $id => $user) {
                    $html .= '<option value="' . $id . '">' . $user . '</option>';
                }
                $html .= '</optgroup>';
            }
        }
        return $html;
    }

    function allotClient(Request $request){

        if(!empty($request->enquiry_id)) {
            $enquiry = Enquiry::find($request->enquiry_id);
            $enquiry->allote_date = date('Y-m-d');
            $enquiry->company_sub_type = $request->company_type;
            $enquiry->alloted_software_type = $request->alloted_software_type;
            $enquiry->no_req = $request->no_of_requirement;
            $enquiry->percentage = $request->percentage;
            $enquiry->client_website = $request->company_website;
            $enquiry->clientabt = $request->about_company;

            $file = $request->file('company_logo');
            if (!empty($file)) {
                $company_logo = base64_encode(file_get_contents($file));
            }
            $enquiry->save();

            $alloted = CompanyAllotment::where('enquiry_id',$request->enquiry_id)->delete();

            foreach($request->alloted_to as $alloted_to) {
                $allotment = new CompanyAllotment();
                $allotment->enquiry_id = $request->enquiry_id;
                $allotment->alloted_by = Auth::user()->id;
                $allotment->alloted_to = $alloted_to;
                $allotment->alloted_software_type = $request->alloted_software_type;
                $allotment->save();
            }

            try {
                $url = 'https://white-force.com/plus/api/allot-client-to-manager';
                $data = [
                    'enquiry_id' => $enquiry->id,
                    'client_name' => $enquiry->company_name,
                    'type' => $enquiry->vertical,
                    'alloted_by' => Auth::user()->name,
                    'percentage' => $enquiry->percentage,
                    'clientImage' => $company_logo,
                    'aboutClient' => $enquiry->clientabt,
                    'website' => $enquiry->client_website,
                    'alloted_date' => $enquiry->allote_date,
                    'no_req' => $enquiry->no_req,
                    'address_address' => $enquiry->address_address,
                    'sub_type' => $enquiry->company_sub_type,
                    'alloted_software_type' => $request->alloted_software_type,
                    'alloted_to'=> json_encode($request->alloted_to),
                    'email'=>$enquiry->email
                ];
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
                $response = curl_exec($curl);
                //print_r($response);
                curl_close($curl);
                return redirect()->back()->with('success', 'Client Alloted Successfuly');
            } catch (Exception $e) {
                return redirect()->back()->with('Error', 'Something Went Wrong');
            }
        }



    }

    //feedback
   public function storeFeedback(Request $request)
    {
        $id = $request->input('id');
        $obj = Enquiry::find($id);
        $obj->feedback = $request->input('feedback');
        $obj->save();
        return redirect()->back()->with('success', ' Add Sucessfully ');
    }


    public function storeAgreement(Request $request){


        $id = $request->input('id');
        $obj = Enquiry::find($id);
        $obj->aggrement = $request->input('aggrement');

        $file = $request->file('pdf_upload');
        if ($request->file('pdf_upload') != '') {
            $ISSave = UtilitesTools::ProccedToSaveImage($request->file('pdf_upload'), "pdf/");
            if ($ISSave['success'] == true) {
                $obj->pdf_upload = $ISSave['data'];
            }
        }
        if ($request->file('invoice') != '') {
            $ISSave = UtilitesTools::ProccedToSaveImage($request->file('invoice'), "invoice/");
            if ($ISSave['success'] == true) {
                $obj->invoice = $ISSave['data'];
            }
        }
        $obj->save();
        return redirect()->back()->with('success', ' Add Sucessfully ');

    }

    function cancelAgreement($id)
    {
        $enq = Enquiry::find($id);
        $enq->aggrement = 'no';
        $enq->save();
        return back();
    }

    public function deleteEnquiry_1($id)
    {
        $enquiry = Enquiry::where('id', $id)->first();
        $time = strtotime($enquiry->break_date);
        $month = date("m", $time);
        $year = date("Y", $time);

        $dateFrom = date("$year-$month-01");
        $dateTo = date("$year-$month-t");
        if (Auth::user()->type != 'Admin') {
            if ($enquiry->enquiry_type_id == '7') {
                $lastTargetRecord = Target::where(['user_id' => Auth::user()->id, 'type' => '7'])->whereBetween('date', [$dateFrom, $dateTo])->orderBy('id', 'desc')->first();
                if($lastTargetRecord){
                $lastTargetRecord->complete = $lastTargetRecord->complete - 1;
                $lastTargetRecord->remaining = $lastTargetRecord->remaining + 1;
                $lastTargetRecord->save();
            }}
            if ($enquiry->enquiry_type_id == '5') {
                $lastTargetRecord = Target::where(['type' => '5', 'user_id' => Auth::user()->id])->whereBetween('date', [$dateFrom, $dateTo])->orderBy('id', 'desc')->first();
                if($lastTargetRecord){
                $lastTargetRecord->complete = $lastTargetRecord->complete - 1;
                $lastTargetRecord->remaining = $lastTargetRecord->remaining + 1;
                $lastTargetRecord->save();
            }}
            if ($enquiry->enquiry_type_id == '6') {
                $lastTargetRecord = Target::where(['type' => '6', 'user_id' => Auth::user()->id])->whereBetween('date', [$dateFrom, $dateTo])->orderBy('id', 'desc')->first();
                if($lastTargetRecord){
                $lastTargetRecord->complete = $lastTargetRecord->complete - 1;
                $lastTargetRecord->remaining = $lastTargetRecord->remaining + 1;
                $lastTargetRecord->save();
                }
            }
            if ($enquiry->enquiry_type_id == '4') {
                $lastTargetRecord = Target::where(['type' => '4', 'user_id' => Auth::user()->id])->whereBetween('date', [$dateFrom, $dateTo])->orderBy('id', 'desc')->first();
                if($lastTargetRecord){
                $lastTargetRecord->complete = $lastTargetRecord->complete - 1;
                $lastTargetRecord->remaining = $lastTargetRecord->remaining + 1;
                $lastTargetRecord->save();
            }}
        }

        $enquiry = Enquiry::find($id);
        return $enquiry->delete();
    }

    public function todayEnquiries(){

        $Details = Enquiry::where('created_by', Auth::user()->id)->whereRaw('Date(created_at) = CURDATE()')->paginate (10);
        $Details1 = Enquiry::where('created_by',  Auth::user()->id)->whereRaw('Date(created_at) = CURDATE()')->get()->count();
        foreach ($Details as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        return view('Enquiry.EnquiryList')->with(['Details' => $Details,'Details1' => $Details1]);
    }


}
