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
        $detail2 = $detail->get();
        $detail = $detail->paginate(25);
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
            $enquiries = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
                $query->where('created_by', $user->id)->orderBy("id","desc");
            });
            $enquiries1 = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
                $query->where('created_by', $user->id)->orderBy("id","desc");
            })->count();
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
        return view('Enquiry.EnquiryList')->with(['Details' => $enquiries, 'Details1' => $enquiries1 ]);
    }


    function storeEnquiry(Request $request){

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

                return redirect('enquiry-list');


    }

    function managerEnquiry() {
        $user = Auth::user();
        $enquiries = Enquiry::query();
        $enquiries1 = 0;
        if ($user->type === 'Manager') {
            $enquiries = $enquiries->where('created_by', $user->id)->where('status_id', '!=', '15')->orderBy("id", "desc");
            $enquiries->each(function ($enquiri) {
                if (!empty($enquiri->image)) { // Corrected line
                    $disk = Storage::disk('s3');
                    $enquiri->image = $disk->temporaryUrl($enquiri->image, now()->addMinutes(5));

                }
            });
            $enquiries1 = Enquiry::where('created_by', $user->id)->where('status_id', '!=', '15')->orderBy("id", "desc")->count();
        }
        $enquiries = $enquiries->paginate(25);
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

        $enquiries = $enquiries->paginate(25);

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
            $enquiries = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
                $query->where('created_by', $user->id)->where('status_id', '10');
            });
            $enquiries1 = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
                $query->where('created_by', $user->id)->where('status_id', '10');
            })->count();
        } elseif ($user->type === 'Staff') {
            $enquiries = $enquiries->where('status_id', '10')->where('created_by', $user->id)->orderBy("id", "desc");
            $enquiries1 = $enquiries->where('status_id', '10')->orderBy("id", "desc")->count();
        }

        if ($enquiries1 === null) {
            $enquiries1 = 0;
        }

        $enquiries = $enquiries->paginate(25);

        return view('Enquiry.EnquiryList')->with(['Details' => $enquiries, 'Details1' => $enquiries1 ]);
    }

    function holdList(){

        $user = Auth::user();
        $enquiries = Enquiry::query();
        $enquiries1 = null;

        if ($user->type === 'Admin') {
            $enquiries = $enquiries->where('status_id', '16')->orderBy("id", "desc");
            $enquiries1 = $enquiries->where('status_id', '16')->count();
        } elseif ($user->type === 'Manager') {
            $enquiries = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
                $query->where('created_by', $user->id)->where('status_id', '16');
            });
            $enquiries1 = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
                $query->where('created_by', $user->id)->where('status_id', '16');
            })->count();
        } elseif ($user->type === 'Staff') {
            $enquiries = $enquiries->where('status_id', '16')->where('created_by', $user->id)->orderBy("id", "desc");
            $enquiries1 = $enquiries->where('status_id', '16')->orderBy("id", "desc")->count();
        }

        if ($enquiries1 === null) {
            $enquiries1 = 0;
        }

        $enquiries = $enquiries->paginate(25);

        return view('Enquiry.EnquiryList')->with(['Details' => $enquiries, 'Details1' => $enquiries1 ]);

    }

    function teamHotList(){
        return view('Enquiry.TeamHotList');

    }

    public function teamMemberHotList($id){
        $Details = Enquiry::where(['status_id' => 10, 'created_by' => $id])->paginate(25);
        $Details1 = Enquiry::where(['status_id' => 10, 'created_by' => $id])->count();
        return view('Enquiry.EnquiryList')->with(['Details' => $Details,'Details1' => $Details1]);
    }

    public function multySelectMemberHotList(Request $request)
    {
        $selectedUserIds = $request->input('selected_users', []);

        $hotListDetails = Enquiry::whereIn('created_by', $selectedUserIds)
            ->where('status_id', 10)
            ->paginate(25);

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


}
