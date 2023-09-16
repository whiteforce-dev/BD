<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Hashids\Hashids;
use App\Models\User;
use App\Models\UtilitesTools;
use Illuminate\Support\Facades\Hash;
use App\helper\helper\uploadImageWithBase64;
class TeamController extends Controller
{

    function addEmp(){

        return view('TeamMember.AddEmp');
    }

    function storeEmp(Request $request){

                $Emp = new user();
                $Emp->name = $request->input('name');
                $Emp->email = $request->input('email');
                $Emp->mobile = $request->input('mobile');
                $Emp->type = $request->input('type');
                $Emp->password = Hash::make($request->input('password'));
                $Emp->created_by = Auth::user()->id;

                    //image
                $image_code = $request->imageBaseString;
                $basePath = "Employee/";
                $fileName = uploadImageWithBase64($image_code, $basePath);
                $image_path = $basePath . $fileName;
                $Emp->image = $image_path;
                $Emp->save();


                $temp = '7EYE' . $Emp->id . strtoupper(substr($Emp->designation, '0', '1')) . strtoupper(substr($Emp->name, '0', '2'));
                $Emp->emp_code = $temp;
                $Emp->save();

                return redirect()->back()->with('success', ' Added Sucessfully');
    }

    function viewTeam(){
        // $Details=User::whereNotIn('id', [Auth::user()->id])->where('created_by',[Auth::user()->id])->orderBy("is_active","desc")->paginate('9');
        $Details = User::where('created_by', Auth::user()->id)->paginate(15);
        return view('TeamMember.TeamMemberList', compact('Details'));
    }

   public function mngrPage(){
      return view('TeamMember.managerPage');
    }
    public function viewMember($id){
           $Details=User::where('created_by',$id)->where("is_active", 1)->paginate('9');
           return view('TeamMember.TeamMemberList', compact('Details'));
    }

    function resignMember(){
        $Details = User::paginate(9);
        return view('TeamMember.ResignedMember', compact('Details'));
    }



    function editEmp($id){
        $Emp = User::where('id', $id)->first();
        return view('TeamMember.EditEmp', compact('Emp'));
    }

    function updateEmp(Request $request, $id){
                $Emp = User::where('id', $id)->first();
                $Emp->name = $request->input('name');
                $Emp->email = $request->input('email');
                $Emp->mobile = $request->input('mobile');
                $Emp->type = $request->input('type');
                $Emp->created_by = Auth::user()->id;
                $image = $request->img;

                //image
                $image_code = $request->imageBaseString;
                $basePath = "Employee/";
                $fileName = uploadImageWithBase64($image_code, $basePath);
                $image_path = $basePath . $fileName;
                $Emp->image = $image_path;
                $Emp->save();

                $temp = '7EYE' . $Emp->id . strtoupper(substr($Emp->designation, '0', '1')) . strtoupper(substr($Emp->name, '0', '2'));
                $Emp->emp_code = $temp;
                $Emp->save();
                return redirect('/viewTeam')->with('success', ' Updated Sucessfully');

    }

    function resignEmp($id){
        $obj = User::find($id);
        $obj->is_active = 0;
        $obj->save();
        return redirect()->back()->with('success', ' Deleted Sucessfully');
    }
    function deleteEmp($id){
        $Emp = User::where('id', $id)->first();
        $Emp->delete();
        return redirect()->back()->with('success', ' Deleted Sucessfully');
    }
}
