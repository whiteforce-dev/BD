<?php

namespace App\Http\Controllers;
use App\Models\Email;
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

class EmailController extends Controller
{
    public function addEmailTemplate()
    {
        return view('email.createEmailTemplate');
    }

    public function storeEmailTemplate(Request $request){

        $temp = new Email();
        $temp->name = $request->input('name');
        $temp->description = $request->input('description');
        $temp->created_by = Auth::user()->name;
        $temp->save();
        //  ?dd($temp);
        return redirect('viewEmailList')->back()->with('success', 'Email Template Created Successfully.');
    }

     public  function viewEmailList()
    {
      $mails = Email::get();
      return view('email.viewEmail', compact('mails'));
    }


    function editTemplate($id)
    {
      $mails = Email::find($id);
      return view('email.editEmailTemplate', ['data' => $mails]);
    }

    function updateTemplate(Request $request)
    {

      $data = Email::find($request->id);
      $data->name = $request->name;
      $data->description = $request->description;
      $data->save();
      return redirect('viewEmailList')->with('success2', 'Email Template Edit Successfully.');
    }


    function deleteTemplate($id)
    {

      $data = Email::find($id);
      $data->delete();

      return redirect('viewEmailList')->with('success1', 'Email Template has been deleted Successfully.');
    }
}
