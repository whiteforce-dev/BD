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
    public function dailyReports(Request $request) {
        $fromnew = $request->from;
        $tonew = $request->to;
        $Date = $fromnew ? Carbon::parse($fromnew) : Carbon::now()->subDay(6);
        $now = $tonew ? Carbon::parse($tonew) : Carbon::now();
        $diff = 6;

        // Build the query to filter users based on your conditions
        $filteredUsers = User::where('created_by', Auth::user()->id)->orWhere('is_active', 1)->get();
        // Pass the filtered users to the view using the compact function
        return view('reports.dayWiseReport', compact('fromnew', 'tonew', 'Date', 'now', 'diff', 'filteredUsers'));
    }

    // Controller method for searching by user
public function dailyReportsSearch(Request $request) {
    $fromnew = $request->from;
    $tonew = $request->to;
    $Date = $fromnew ? Carbon::parse($fromnew) : Carbon::now()->subDay(6);
    $now = $tonew ? Carbon::parse($tonew) : Carbon::now();
    $diff = 6;
    // Get the selected user ID from the request
    $selectedUser = $request->input('employee');
    // Build the query to filter users based on your conditions
    $usersQuery =User::query();

    if ($selectedUser !== 'all') { // Check if a specific user is selected
       $usersQuery->where('id', $selectedUser);
    }
    $filteredUsers  = $usersQuery->get();
    // Pass the filtered users to the view using the compact function
    return view('reports.pages.dayWiseReportBySearch', compact('fromnew', 'tonew', 'Date', 'now', 'diff', 'filteredUsers'));
}

    public function monthlyManagerPage(){

        return view('reports.monthlyEnquiryManagerPage');
    }

    public function getMnagerTeam(Request $request, $id){
        $id = \request('id');
        $Details = User::find($id);
        return view('reports.monthlyEnquiryMngrTeam')->with(['Details' => $Details]);
    }

  public function getMngrMonthlyTeam(){
        return view('reports.TeamMonthlyReport');
    }
    public function totalEnquiries(/*Parameters*/){

        $id = \request('id');
        $Details = Enquiry::where('created_by', $id)->orderBy("id", "desc")->paginate (10);
        $Details1 = Enquiry::where('created_by', $id)->orderBy("id", "desc")->count();
        foreach ($Details as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        $totalMonthEnquiry = "Total Enquiries";
        return view('Enquiry.EnquiryList')->with(['Details' => $Details,'Details1' => $Details1, 'totalMonthEnquiry'=>$totalMonthEnquiry]);
    }
    public function getTeamHot(/*Parameters*/){

        $id = \request('id');
        $Details = Enquiry::where(['status_id' => 10, 'created_by' => $id])->paginate (10);
        $Details1 = Enquiry::where(['status_id' => 10, 'created_by' => $id])->count();
        foreach ($Details as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        $hotMonthEnquiry = "Hot Enquiries";

        return view('Enquiry.EnquiryList')->with(['Details' => $Details,'Details1' => $Details1, 'hotMonthEnquiry'=>$hotMonthEnquiry]);
    }

    public function monthTillDate(/*Parameters*/){

        $id = \request('id');
        $Details = Enquiry::where('created_by', $id)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->paginate (10);
        $Details1 = Enquiry::where('created_by', $id)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();

        foreach ($Details as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        $mtdMonthEnquiry = "Month Till Date Enquiries";
        return view('Enquiry.EnquiryList')->with(['Details' => $Details,'Details1' => $Details1, 'mtdMonthEnquiry'=>$mtdMonthEnquiry]);
    }
    public function recAchieved(/*Parameters*/){

        $id = \request('id');
        $Details = Enquiry::where('created_by', $id)->where(['status_id' => 15, 'enquiry_type_id' => 4])->whereMonth('break_date', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->paginate (10);
        $Details1 = Enquiry::where('created_by', $id)->where(['status_id' => 15, 'enquiry_type_id' => 4])->whereMonth('break_date', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();

        foreach ($Details as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        $recMonthEnquiry = "Recuirment Achieve Enquiries";
        return view('Enquiry.breakEnquiry')->with(['Details' => $Details,'Details1' => $Details1, 'recMonthEnquiry'=>$recMonthEnquiry]);
    }
    public function tempAchieved(/*Parameters*/){

        $id = \request('id');
        $Details = Enquiry::where('created_by', $id)->where(['status_id' => 15, 'enquiry_type_id' => 5])->whereMonth('break_date', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->paginate (10);
        $Details1 = Enquiry::where('created_by', $id)->where(['status_id' => 15, 'enquiry_type_id' => 5])->whereMonth('break_date', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();
        foreach ($Details as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        $tempMonthEnquiry = "Temp Achieve Enquiries";
        return view('Enquiry.breakEnquiry')->with(['Details' => $Details,'Details1' => $Details1, 'tempMonthEnquiry'=>$tempMonthEnquiry]);
    }

    public function fmsAchieved(/*Parameters*/){

        $id = \request('id');
        $Details = Enquiry::where('created_by', $id)->where(['status_id' => 15, 'enquiry_type_id' => 6])->whereMonth('break_date', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->paginate (10);
        $Details1 = Enquiry::where('created_by', $id)->where(['status_id' => 15, 'enquiry_type_id' => 6])->whereMonth('break_date', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();

        foreach ($Details as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        $fmsMonthEnquiry = "FMS Achieve Enquiries";
        return view('Enquiry.breakEnquiry')->with(['Details' => $Details,'Details1' => $Details1, 'fmsMonthEnquiry'=>$fmsMonthEnquiry]);
    }
    public function payAchieved(/*Parameters*/){

        $id = \request('id');
        $Details = Enquiry::where('created_by', $id)->where(['status_id' => 15, 'enquiry_type_id' => 7])->whereMonth('break_date', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->paginate (10);
        $Details1 = Enquiry::where('created_by', $id)->where(['status_id' => 15, 'enquiry_type_id' => 7])->whereMonth('break_date', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();

        foreach ($Details as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        $payrollMonthEnquiry = "Payroll Achieve Enquiries";
        return view('Enquiry.breakEnquiry')->with(['Details' => $Details,'Details1' => $Details1, 'payrollMonthEnquiry'=>$payrollMonthEnquiry]);
    }

    public function todayEnquiry(/*Parameters*/){

        $id = \request('id');
        $Details = Enquiry::where('created_by', $id)->whereRaw('Date(created_at) = CURDATE()')->paginate (10);
        $Details1 = Enquiry::where('created_by', $id)->whereRaw('Date(created_at) = CURDATE()')->get()->count();
        foreach ($Details as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        $todayMonthEnquiry = "Today Enquiries";
        return view('Enquiry.EnquiryList')->with(['Details' => $Details,'Details1' => $Details1, 'todayMonthEnquiry'=>$todayMonthEnquiry]);
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
        if ( $id) {
            $user_list = User::where('id', $id)->where('is_active', 1)->get(); // Use 'first' to retrieve a single user
            return view('reports.pages.teamMonthWiseReport', compact('year', 'user_list'));
        } else {
            $user_list = User::where('created_by', Auth::user()->id)->where('is_active', 1)->get();
            return view('reports.pages.teamMonthWiseReport', compact('year', 'user_list'));
        }

    }
}
