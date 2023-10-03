<?php

namespace App\Http\Controllers;
use App\Models\Enquiry;
use App\Models\Remark;
use App\Models\Target;
use Auth;
use Illuminate\Http\Request;
use Storage;
class FollowUpController extends Controller
{
    function addFollowUp(Request $request)
    {
        $id=$request->input('id');
        $details = Enquiry::find($id);
        return view('Enquiry.AddFollowup')->with(['preview' => $details]);
    }

    function storeFollowUp(Request $request)
    {
        $obj = new Remark();
        $obj->status_id = $request->input('status_id');
        $obj->enquiry_id = $request->input('enquiry_id');
        $obj->remark = $request->input('remark');
        $obj->date = $request->input('date');
        $obj->time = $request->input('time');
        $obj->created_by = Auth::user()->id;
        $obj->save();

        $id = $request->input('enquiry_id');
        $obj1 = Enquiry::find($id);
        $obj1->enquiry_type_id = $obj1->enquiry_type_id;
        $obj1->status_id = $obj->status_id;
        $obj1->next_follow_date = $obj->date;
        $obj1->next_follow_time = $obj->time;
        $obj1->remark = $obj->remark;
        $obj1->break_date = $request->input('break_date');
        $obj1->save();

        //target

        if ($obj1->status_id == '15') {
            if ($obj1->enquiry_type_id == '7') {
                $lastTargetRecord = Target::where('user_id', Auth::user()->id)->where(['type' => '7'])->latest()->first();
                if($lastTargetRecord){
                    $lastTargetRecord->complete = $lastTargetRecord->complete + 1;
                    $lastTargetRecord->save();
                    $lastTargetRecord->remaining = $lastTargetRecord->remaining - 1;
                    $lastTargetRecord->save();
                }
            }
            if ($obj1->enquiry_type_id == '5') {
                $lastTargetRecord = Target::where('user_id', Auth::user()->id)->where(['type' => '5'])->latest()->first();
                if($lastTargetRecord){
                $lastTargetRecord->complete = $lastTargetRecord->complete + 1;
                $lastTargetRecord->save();
                $lastTargetRecord->remaining = $lastTargetRecord->remaining - 1;
                $lastTargetRecord->save();
            }}
            if ($obj1->enquiry_type_id == '6') {
                $lastTargetRecord = Target::where('user_id', Auth::user()->id)->where(['type' => '6'])->latest()->first();
                if( $lastTargetRecord){
                $lastTargetRecord->complete = $lastTargetRecord->complete + 1;
                $lastTargetRecord->save();
                $lastTargetRecord->remaining = $lastTargetRecord->remaining - 1;
                $lastTargetRecord->save();
            }}
            if ($obj1->enquiry_type_id == '4') {
                $lastTargetRecord = Target::where('user_id', Auth::user()->id)->where(['type' => '4'])->latest()->first();
                if( $lastTargetRecord){
                $lastTargetRecord->complete = $lastTargetRecord->complete + 1;
                $lastTargetRecord->save();
                $lastTargetRecord->remaining = $lastTargetRecord->remaining - 1;
                $lastTargetRecord->save();
            }}
        }
        return redirect()->back()->with('success', ' Added Sucessfully');
    }
    public function todayFollowups()
    {

        $user = Auth::user();
        $enquiries = Enquiry::query();
        $enquiries1 = null;
        $today = \carbon\carbon::now()->format('Y-m-d');

        if ($user->type === 'Admin') {
            $enquiries = $enquiries->orderBy("id", "desc")->where('next_follow_date', $today);
            $enquiries1 = $enquiries->orderBy("id", "desc")->where('next_follow_date', $today)->count();
        }
        elseif ($user->type === 'Manager')
         {
            // $enquiries = $enquiries->where('next_follow_date', $today)->whereHas('GetCreatedby', function ($query) use ($user) {
            //     $query->where('created_by', $user->id)->orderBy("id","desc");
            // });
            // $enquiries1 = $enquiries->where('next_follow_date', $today)->whereHas('GetCreatedby', function ($query) use ($user) {
            //     $query->where('created_by', $user->id)->orderBy("id","desc");
            // })->count();
            $enquiries = $enquiries->where('created_by', $user->id)->where('next_follow_date', $today)->orderBy("id","desc");
            $enquiries1 = $enquiries->where('created_by', $user->id)->where('next_follow_date', $today)->orderBy("id","desc")->count();
        }
        elseif ($user->type === 'Staff') {
            $enquiries = $enquiries->where('created_by', $user->id)->where('next_follow_date', $today)->orderBy("id","desc");
            $enquiries1 = $enquiries->where('created_by', $user->id)->where('next_follow_date', $today)->orderBy("id","desc")->count();
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

        $todayfollowUp = "Today Followup";
        return view('Enquiry.EnquiryList')->with(['Details' => $enquiries, 'Details1' => $enquiries1, 'todayfollowUp'=>$todayfollowUp ]);
    }

    public function totalFollowups()
    {
        $user = Auth::user();
        if ($user->type === 'Admin') {
            $total= \Carbon\Carbon::now()->format('Y-m-d');
            $enquiries =Enquiry::where('next_follow_date','<', $total)->orderBy("id","desc")->paginate (10);
            $enquiries1 =Enquiry::where('next_follow_date','<', $total)->orderBy("id","desc")->count();
        } else {
            $total= \Carbon\Carbon::now()->format('Y-m-d');
            $enquiries =Enquiry::where('created_by',Auth::user()->id)->where('next_follow_date','<', $total)->orderBy("id","desc")->paginate (10);
            $enquiries1 =Enquiry::where('created_by',Auth::user()->id)->where('next_follow_date','<', $total)->orderBy("id","desc")->count();
        }
        $totalfollowUp = "Total Followup";
        return view('Enquiry.EnquiryList')->with(['Details' => $enquiries, 'Details1' => $enquiries1, 'totalfollowUp'=>$totalfollowUp ]);
    }

    public function missedFollowups()
    {
        $user = Auth::user();
        $enquiries = Enquiry::query();
        $enquiries1 = null;
        $today = \Carbon\Carbon::now()->format('Y-m-d');


        if ($user->type === 'Admin') {
            $totalAtndFollowUp = Remark::whereRaw('created_at' >= $today)
            ->distinct('enquiry_id');
            $totalAtndFollowUp1 = Remark::whereRaw('created_at' >= $today)
            ->distinct('enquiry_id')
            ->count('enquiry_id');
            $enquiries = $enquiries->orderBy("id", "desc")->where('next_follow_date', '<', $today);
            $enquiry = $enquiries->orderBy("id", "desc")->where('next_follow_date', '<', $today)->count();
            $enquiries1 = $enquiry - $totalAtndFollowUp1;
        } elseif ($user->type === 'Manager') {
            $totalAtndFollowUp = Remark::whereRaw('created_at' >= $today)->where('created_by', $user->id)
            ->distinct('enquiry_id');
            $totalAtndFollowUp1 = Remark::whereRaw('created_at' >= $today)->where('created_by', $user->id)
            ->distinct('enquiry_id')
            ->count('enquiry_id');
            // $enquiries = $enquiries->where('next_follow_date', '<', $today)->whereHas('GetCreatedby', function ($query) use ($user) {
            //     $query->where('created_by', $user->id)->orderBy("id", "desc");
            // });
            // $enquiries1 = $enquiries->where('next_follow_date', '<', $today)->whereHas('GetCreatedby', function ($query) use ($user) {
            //     $query->where('created_by', $user->id)->orderBy("id", "desc");
            // })->count();
            $enquiries = $enquiries->where('created_by', $user->id)->where('next_follow_date', '<', $today)->orderBy("id", "desc");
            $enquiry = $enquiries->where('created_by', $user->id)->where('next_follow_date', '<', $today)->orderBy("id", "desc")->count();
            $enquiries1 = $enquiry - $totalAtndFollowUp1;
            // return $enquiries1;
        } elseif ($user->type === 'Staff') {

            $totalAtndFollowUp = Remark::whereRaw('created_at' >= $today)->where('created_by', $user->id)
            ->distinct('enquiry_id');
            $totalAtndFollowUp1 = Remark::whereRaw('created_at' >= $today)->where('created_by', $user->id)
            ->distinct('enquiry_id')
            ->count('enquiry_id');
            $enquiries = $enquiries->where('created_by', $user->id)->where('next_follow_date', '<', $today)->orderBy("id", "desc");
            $enquiry = $enquiries->where('created_by', $user->id)->where('next_follow_date', '<', $today)->orderBy("id", "desc")->count();
            $enquiries1 = $enquiry - $totalAtndFollowUp1;

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
        $missedfollowUp = "Missed Followup";
        return view('Enquiry.EnquiryList')->with(['Details' => $enquiries, 'Details1' => $enquiries1, 'missedfollowUp'=>$missedfollowUp]);
    }

}
