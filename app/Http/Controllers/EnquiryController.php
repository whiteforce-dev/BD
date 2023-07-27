<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Target;
use Carbon\Carbon;
use App\Models\CompanyAllotment;
use App\Models\ManagerRemark;
use App\Models\UtilitesTools;
class EnquiryController extends Controller
{
    function AddEnquiry(){

        return view('Enquiry.AddEnquiry');
    }

    function EnquiryList(){
        $user = Auth::user();
        $enquiries = Enquiry::query();
        $enquiries1 = null;

        if ($user->type === 'Admin') {
            $enquiries = $enquiries->orderBy("id", "desc");
            $enquiries1 = $enquiries->orderBy("id", "desc")->count();
        } elseif ($user->type === 'Manager') {
            $enquiries = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
                $query->where('created_by', $user->id);
            });
            $enquiries1 = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
                $query->where('created_by', $user->id);
            })->count();
        } elseif ($user->type === 'Staff') {
            $enquiries = $enquiries->where('created_by', $user->id)->orderBy("id", "desc");
            $enquiries1 = $enquiries->where('created_by', $user->id)->orderBy("id", "desc")->count();
        }
        if ($enquiries1 === null) {
            $enquiries1 = 0;
        }

        $enquiries = $enquiries->paginate(25);

        return view('Enquiry.EnquiryList')->with(['Details' => $enquiries, 'Details1' => $enquiries1 ]);
    }


    function StoreEnquiry(Request $request){

            $enquiry = new Enquiry();
            $enquiry->enquiry_type_id = $request->input('enquiry_type_id');
            $enquiry->company_name = $request->input('company_name');
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
            $enquiry->save();
            return redirect()->back();


    }

    function ManagerEnquiry() {
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

    function UpdateManagerEnquiry() {
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
    function EditEnquiry($id){

        $enquiry = Enquiry::where('id',$id)->first();

        return view('Enquiry.EditEnquiry', compact('enquiry'));
    }

    function UpdateEnquiry(Request $request, $id){

        $enquiry = Enquiry::where('id', $id)->first();
        $enquiry->enquiry_type_id = $request->input('enquiry_type_id');
        $enquiry->company_name = $request->input('company_name');
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
        $enquiry->save();
        return redirect('enquiry-list');


    }

    function Hot() {
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


}
