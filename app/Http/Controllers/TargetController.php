<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnquiryType;
use App\Models\Target;
use App\Models\User;
use App\Models\weeklytarget;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TargetController extends Controller
{
    function assignTarget()
   {
      $targettype = EnquiryType::get();
      $userlist = user::where('id', '!=', 4)->get();
      if (Auth::user()->type == 'Admin') {
         $user = User::where(['type' => 'Manager' ,'is_active'=> 1])->get();
         return view('target.assignTargetPage', compact('user', 'targettype', 'userlist'));
      } elseif (Auth::user()->type == 'Manager') {
         $user = User::where(['type' => 'Manager' ,'is_active'=> 1])->get();
         return view('target.assignTargetPage', compact('user'));
      } elseif (Auth::user()->type == 'Staff') {
         $user = User::where('id', Auth::user()->id)->get();
         return view('target.assignTargetPage', compact('user'));
      }
   }

   public function assignMonthlyTarget($manager){

    $user = User::where('created_by', $manager)->where(['is_active'=> 1])->get();
    return view('target.assignMonthlyTarget', compact('user'));
   }
   public function storeMonthlyTarget(Request $request) {
    $team_member_targets = $request->except('_token', 'target_type'); // Get all input except CSRF token and target_type

    foreach ($team_member_targets as $team_id => $target) {
        if (is_numeric($team_id) && is_numeric($target)) {
            $lastRemainingRecord = Target::where('user_id', $team_id)->where(['type' => $request->input('target_type')])->orderBy('id', 'desc')->first();
            $remaining = isset($lastRemainingRecord) ? $lastRemainingRecord->remaining : 0;

            $target_record = new Target();
            $target_record->user_id = $team_id;
            $target_record->month_target = $target;
            $target_record->target = $target + $remaining;
            $target_record->complete = 0;
            $target_record->remaining = $target_record->target;
            $target_record->type = $request->input('target_type');
            $target_record->date = now(); // Use Laravel's Carbon instance for current date and time
            $target_record->save();
        }
    }
    return redirect()->back()->with('success', 'Targets assigned successfully.');
}


public function viewMonthlyTarget(){

    $user = User::where('created_by',)->where(['is_active'=> 1])->get();
    return view('target.viewMonthlyTarget');
}
}
