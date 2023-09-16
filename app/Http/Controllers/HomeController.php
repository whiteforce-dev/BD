<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Aws\S3\Visibility\PortableVisibilityConverter;
use Illuminate\Support\Facades\Auth;
use Storage;
use App\Models\Enquiry;
use App\Models\User;
use App\Models\Target;
use Carbon\Carbon;
use App\Models\CompanyAllotment;
use App\Models\ManagerRemark;
use App\Models\UtilitesTools;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //total enquiries count
        $user = Auth::user();
        $enquiries = Enquiry::query();
        $enquiries1 = null;
        if ($user->type === 'Admin') {
            $enquiries1 = $enquiries->orderBy("id", "desc")->count();
        } elseif ($user->type === 'Manager') {
            $enquiries1 = $enquiries->where('created_by', $user->id)->orderBy("id", "desc")->count();
        } elseif ($user->type === 'Staff') {
            $enquiries1 = $enquiries->where('created_by', $user->id)->orderBy("id", "desc")->count();
        }
        if ($enquiries1 === null) {
            $enquiries1 = 0;
        }

        //hot count

        $hotCount = null;

        if ($user->type === 'Admin') {
            $hotCount = $enquiries->where('status_id', '10')->count();
        } elseif ($user->type === 'Manager') {

            $hotCount = $enquiries->where('status_id', '10')->where('created_by', Auth::user()->id)->orderBy("id", "desc")->count();

        } elseif ($user->type === 'Staff') {
            $hotCount = $enquiries->where('status_id', '10')->where('created_by', Auth::user()->id)->orderBy("id", "desc")->count();
        }

        if ($hotCount === null) {
            $hotCount = 0;
        }

        //today enquiries
        $todayEnquiries = null;
        if ($user->type === 'Admin') {
            $todayEnquiries = Enquiry::whereRaw('Date(created_at) = CURDATE()')->get()->count();

        } elseif ($user->type === 'Manager') {

            $todayEnquiries = Enquiry::where('created_by', $user->id)->whereRaw('Date(created_at) = CURDATE()')->get()->count();


        } elseif ($user->type === 'Staff') {
            $todayEnquiries = Enquiry::where('created_by', $user->id)->whereRaw('Date(created_at) = CURDATE()')->get()->count();

        }

        if ($todayEnquiries === null) {
            $todayEnquiries = 0;
        }

        //Approached

        $approached = null;
        if ($user->type === 'Admin') {
            $approached = Enquiry::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();
        } elseif ($user->type === 'Manager') {

            $approached = Enquiry::where('created_by', $user->id)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();


        } elseif ($user->type === 'Staff') {
            $approached = Enquiry::where('created_by', $user->id)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();

        }

        if ($approached === null) {
            $approached = 0;
        }

        //Approach pending

        $approachedPending = null;
        if ($user->type === 'Admin') {
            $approch = 250;
            $approachedPending =   $approch - $approachedPending = Enquiry::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();
        } elseif ($user->type === 'Manager') {
            $approch = 250;
            $approachedPending =   $approch -   $approachedPending = Enquiry::where('created_by', $user->id)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();


        } elseif ($user->type === 'Staff') {
            $approch = 250;
            $approachedPending =   $approch - $approachedPending = Enquiry::where('created_by', $user->id)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at',Carbon::now()->year)->count();

        }

        if ($approachedPending === null) {
            $approachedPending = 0;
        }

        //Active member

        $activeMember = null;
        if ($user->type === 'Admin') {
            $activeMember =  Auth::user()->where('is_active', 1)->count();
        } elseif ($user->type === 'Manager') {
            $activeMember = Auth::user()->where('created_by', $user->id)->where('is_active', 1)->count();
        }

        if ($activeMember === null) {
            $activeMember = 0;
        }

        //break Enquiry

        $breakEnquiry = null;

        if ($user->type === 'Admin') {
            $breakEnquiry = Enquiry::where('status_id', '15')->count();

        } elseif ($user->type === 'Manager') {

            $breakEnquiry = Enquiry::where('status_id', '15')->where('created_by', Auth::user()->id)->orderBy("id", "desc")->count();
        } elseif ($user->type === 'Staff') {
            $breakEnquiry = Enquiry::where('created_by', $user->id)->where('status_id', '15')->orderBy("id", "desc")->count();

        }

        if ($breakEnquiry === null) {
            $breakEnquiry = 0;
        }

         // Total break Enquiry

         $totalBreakEnquiry = null;

         if ($user->type === 'Manager') {
            $totalBreakEnquiry = Enquiry::whereHas('GetCreatedby', function ($query) use ($user) {
                $query->where('created_by', $user->id)->where('status_id', '15')->orderBy("id","desc");
            })->count();
         }

         if ($totalBreakEnquiry === null) {
             $totalBreakEnquiry = 0;
         }

          // Total Hot Enquiry

          $totalHotEnquiry = null;

          if ($user->type === 'Manager') {
             $totalHotEnquiry = Enquiry::whereHas('GetCreatedby', function ($query) use ($user) {
                 $query->where('created_by', $user->id)->where('status_id', '10');
             })->count();
          }

          if ($totalHotEnquiry === null) {
              $totalHotEnquiry = 0;
          }

             // Total Team Enquiry

             $totalTeamEnquiry = null;

             if ($user->type === 'Manager') {
                $totalTeamEnquiry = Enquiry::whereHas('GetCreatedby', function ($query) use ($user) {
                    $query->where('created_by', $user->id)->orderBy("id","desc");
                })->count();
             }

             if ($totalTeamEnquiry === null) {
                 $totalTeamEnquiry = 0;
             }

        return view('DashBoard', compact('enquiries1', 'hotCount', 'todayEnquiries', 'approached', 'approachedPending', 'activeMember', 'breakEnquiry', 'totalBreakEnquiry', 'totalHotEnquiry', 'totalTeamEnquiry' ));
    }


}
