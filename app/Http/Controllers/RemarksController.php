<?php

namespace App\Http\Controllers;
use App\Models\Enquiry;
use App\Models\ManagerRemark;
use Illuminate\Http\Request;

class RemarksController extends Controller
{
    public function addManagerRemarks(Request $request){

        $id = $request->input('id');
        $mngraRemarks = Enquiry::find($id);
        return view('Enquiry.AddManagerRemarks')->with(['preview' => $mngraRemarks]);
    }

    public function storeManagerRemark(Request $request)
    {
        $id = $request->enquiry_id;
        $remark = new ManagerRemark();
        $remark->enquiry_id = $id;
        $remark->remark = $request->manager_remark;
        $remark->save();

        $enquiry = Enquiry::find($id);
        $enquiry->manager_remark = $remark->remark;
        $enquiry->save();
        return redirect()->back()->with('success', ' Added Sucessfully');
    }
}
