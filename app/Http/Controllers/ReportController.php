<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
class ReportController extends Controller
{
    public function dailyReports(Request $request){
        $fromnew = $request->from;
        $tonew = $request->to;
        $Date = $fromnew ? Carbon::parse($fromnew) : Carbon::now()->subDay(6);
        $now =   $tonew ? Carbon::parse($tonew) : Carbon::now();
        $diff = 6;
        return view('reports.dayWiseReport', compact('fromnew', 'tonew', 'Date', 'now', 'diff'));
    }

    public function monthlyManagerPage(){

        return view('reports.monthlyEnquiryManagerPage');
    }

    public function getMnagerTeam(Request $request, $id){
        $id = \request('id');
        $Details = User::find($id);
        return view('reports.monthlyEnquiryMngrTeam')->with(['Details' => $Details]);
    }

    public function totalEnquiries(/*Parameters*/){

        $id = \request('id');
        $Details = Enquiry::where('created_by', $id)->orderBy("id", "desc")->paginate(25);
        $Details1 = Enquiry::where('created_by', $id)->orderBy("id", "desc")->count();
        foreach ($Details as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        return view('Enquiry.EnquiryList')->with(['Details' => $Details,'Details1' => $Details1]);
    }
    public function getTeamHot(/*Parameters*/){

        $id = \request('id');
        $Details = Enquiry::where(['status_id' => 10, 'created_by' => $id])->paginate(25);
        $Details1 = Enquiry::where(['status_id' => 10, 'created_by' => $id])->count();
        foreach ($Details as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        return view('Enquiry.EnquiryList')->with(['Details' => $Details,'Details1' => $Details1]);
    }

    public function monthTillDate(/*Parameters*/){

        $id = \request('id');
        $Details = Enquiry::where('created_by', $id)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->paginate(25);
        $Details1 = Enquiry::where('created_by', $id)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();

        foreach ($Details as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        return view('Enquiry.EnquiryList')->with(['Details' => $Details,'Details1' => $Details1]);
    }
    public function recAchieved(/*Parameters*/){

        $id = \request('id');
        $Details = Enquiry::where('created_by', $id)->where(['status_id' => 15, 'enquiry_type_id' => 4])->whereMonth('break_date', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->paginate(25);
        $Details1 = Enquiry::where('created_by', $id)->where(['status_id' => 15, 'enquiry_type_id' => 4])->whereMonth('break_date', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();

        foreach ($Details as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        return view('Enquiry.breakEnquiry')->with(['Details' => $Details,'Details1' => $Details1]);
    }
    public function tempAchieved(/*Parameters*/){

        $id = \request('id');
        $Details = Enquiry::where('created_by', $id)->where(['status_id' => 15, 'enquiry_type_id' => 5])->whereMonth('break_date', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->paginate(25);
        $Details1 = Enquiry::where('created_by', $id)->where(['status_id' => 15, 'enquiry_type_id' => 5])->whereMonth('break_date', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();
        foreach ($Details as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        return view('Enquiry.breakEnquiry')->with(['Details' => $Details,'Details1' => $Details1]);
    }

    public function fmsAchieved(/*Parameters*/){

        $id = \request('id');
        $Details = Enquiry::where('created_by', $id)->where(['status_id' => 15, 'enquiry_type_id' => 6])->whereMonth('break_date', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->paginate(25);
        $Details1 = Enquiry::where('created_by', $id)->where(['status_id' => 15, 'enquiry_type_id' => 6])->whereMonth('break_date', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();

        foreach ($Details as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        return view('Enquiry.breakEnquiry')->with(['Details' => $Details,'Details1' => $Details1]);
    }
    public function payAchieved(/*Parameters*/){

        $id = \request('id');
        $Details = Enquiry::where('created_by', $id)->where(['status_id' => 15, 'enquiry_type_id' => 7])->whereMonth('break_date', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->paginate(25);
        $Details1 = Enquiry::where('created_by', $id)->where(['status_id' => 15, 'enquiry_type_id' => 7])->whereMonth('break_date', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();

        foreach ($Details as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        return view('Enquiry.breakEnquiry')->with(['Details' => $Details,'Details1' => $Details1]);
    }

    public function todayEnquiry(/*Parameters*/){

        $id = \request('id');
        $Details = Enquiry::where('created_by', $id)->whereRaw('Date(created_at) = CURDATE()')->paginate(25);
        $Details1 = Enquiry::where('created_by', $id)->whereRaw('Date(created_at) = CURDATE()')->get()->count();
        foreach ($Details as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        return view('Enquiry.EnquiryList')->with(['Details' => $Details,'Details1' => $Details1]);
    }

    public function teamEnquiryReport(){
        return view('reports.monthlyEnquiryMngrTeam');
    }

    function monthReport()
    {
        $year = request('year');
        $id = request('id');
        $user = User::where('id', $id)->where('is_active', 1)->get();

        return view('reports.pages.mngrMonthWiseReport', compact('year', 'user'));
    }

    public function teamMonthReport(){
         $year = request('year');
         $id = request('id');
         $user = User::where('id', $id)->where('is_active', 1)->get();
         return view('reports.pages.teamMonthWiseReport', compact('year', 'user'));
    }
}
