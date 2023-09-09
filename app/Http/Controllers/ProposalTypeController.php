<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnquiryType;
class ProposalTypeController extends Controller
{
    public function addEnquiryType(){
        return view('enquiryType.addEnquiryType');
    }
    public function  viewEnquiryType()
    {
        $data=EnquiryType::orderBy("id","desc")->get();
        return view('enquiryType.viewEnquiryType')->with(['Details' => $data]);
    }

    function storeEnquiryType(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
            $obj = new enquiryType();
            $obj->name = $request->input('name');
            $obj->status = $request->input('status');
            $obj->save();
            return redirect('viewEnquiryType')->with('success', ' Added Sucessfully');
        }


    function editEnquiryType(Request $request, $id)
    {
            $details = EnquiryType::find($id);
            return view('enquiryType.editEnquiryType')->with(['preview' => $details]);

    }

    function updateEnquiryType(Request $request, $id)
    {
        $obj = EnquiryType::find($id);
        $obj->name = $request->input('name');
        $obj->status = $request->input('status');
        $obj->save();
        return redirect('viewEnquiryType')->with('success', ' Updated Sucessfully ');
    }

    public function deleteEnquiryType($id){
        EnquiryType::find($id)->delete();
        return redirect('viewEnquiryType')->with('success', ' Deleted Sucessfully ');

    }
}
