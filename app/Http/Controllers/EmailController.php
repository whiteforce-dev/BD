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
use Illuminate\Support\Facades\Mail;

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
        return redirect('viewEmailList')->with('success', 'Email Template Created Successfully.');
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

    public function sendEmail(Request $request)
    {
    $enquiry_id = $request->checkedVals;
     $template_id = $request->template_id;

     
      $template = Email::where('id',$template_id)->first();
      
      if($template_id==19){

    
     $temp = $template->description;
     $name = Auth::user()->name;
     $email = Auth::user()->email;
     $mobile = Auth::user()->mobile;
     $temp = str_replace('[name]', $name, $temp);
     $temp = str_replace('[email]', $email, $temp);
     $temp = str_replace('[mobile]', $mobile, $temp);
foreach ($enquiry_id as $id) {
    $recipients = Enquiry::where('id', $id)->first();

    $data = [
      'reciepent' => $recipients->email,
      'msg' => $temp,
      
    ];
    // $email=$users->email;
    Mail::send('tempView', ["data1" => $data], function ($message) use ($data) {
        $message->from('priyaswhiteforce@gmail.com', 'White-Force');
        $message->subject('Are You Looking For Vendors- Contact White Force Group');
        $message->to($data['reciepent'], $data['msg']);
    });
}
    return 1;


    }
    else
    {
      $temp = $template->description;
      foreach ($enquiry_id as $id) {
        $recipients = Enquiry::where('id', $id)->first();
    
        $data = [
          'reciepent' => $recipients->email,
          'msg' => $temp,
          
        ];
        // $email=$users->email;
        Mail::send('tempView', ["data1" => $data], function ($message) use ($data) {
            $message->from('priyaswhiteforce@gmail.com', 'White-Force');
            $message->subject('Are You Looking For Vendors- Contact White Force Group');
            $message->to($data['reciepent'], $data['msg']);
        });
    }
        return 1;
    }
  }
  // public function sendBirthdayEmail()

  // {
  //   $details = Enquiry::get();
  //   foreach($details as $detail)
  //   {
  //     $birth_date = carbon::parse($detail->dob)->format('d-m');
  //     return $birth_date;
  //     $today =carbon::now()->format('d-m');
      
  //     if($birth_date==$today)
  //     {
        

  //     }

  //   }
  // }
}
