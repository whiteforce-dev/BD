<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\UtilitesTools;
use Illuminate\Support\Facades\Hash;
class TeamController extends Controller
{
    function AddEmp(){

        return view('TeamMember.AddEmp');
    }

    function StoreEmp(Request $request){

                $Emp = new user();
                $Emp->name = $request->input('name');
                $Emp->email = $request->input('email');
                $Emp->mobile = $request->input('mobile');
                $Emp->type = $request->input('type');
                $Emp->password = Hash::make($request->input('password'));
                $Emp->created_by = Auth::user()->id;
                $image = $request->img;

                $ISSave = UtilitesTools::ProccedToSaveImage($request->file('img'), "Employee/");
                if ($ISSave['success'] == true) {

                    $Emp->image = $ISSave['data'];

                }


                $Emp->save();
                $temp = '7EYE' . $Emp->id . strtoupper(substr($Emp->designation, '0', '1')) . strtoupper(substr($Emp->name, '0', '2'));
                $Emp->emp_code = $temp;
                $Emp->save();

                return redirect()->back()->with('success', ' Added Sucessfully');
    }

    function ViewTeam(){
        // $Details=User::whereNotIn('id', [Auth::user()->id])->where('created_by',[Auth::user()->id])->orderBy("is_active","desc")->paginate('9');
        $Details = User::paginate(9);
        return view('TeamMember.TeamMemberList', compact('Details'));
    }



    function EditEmp($id){
        $Emp = User::where('id', $id)->first();
        return view('TeamMember.EditEmp', compact('Emp'));
    }

    function UpdateEmp(Request $request, $id){


                $Emp = User::where('id', $id)->first();
                $Emp->name = $request->input('name');
                $Emp->email = $request->input('email');
                $Emp->mobile = $request->input('mobile');
                $Emp->type = $request->input('type');
                $Emp->created_by = Auth::user()->id;
                $image = $request->img;

                $ISSave = UtilitesTools::ProccedToSaveImage($request->file('img'), "Employee/");
                if ($ISSave['success'] == true) {
                    $Emp->image = $ISSave['data'];
                }
                $Emp->save();
                $temp = '7EYE' . $Emp->id . strtoupper(substr($Emp->designation, '0', '1')) . strtoupper(substr($Emp->name, '0', '2'));
                $Emp->emp_code = $temp;
                $Emp->save();
                return redirect()->back()->with('success', ' Updated Sucessfully');

    }

    function ResignEmp($id){
        $obj = User::find($id);
        $obj->is_active = 0;
        $obj->save();
        return redirect()->back()->with('success', ' Deleted Sucessfully');
    }
    function DeleteEmp($id){
        $Emp = User::where('id', $id)->first();
        $Emp->delete();
        return redirect()->back()->with('success', ' Deleted Sucessfully');
    }
}
