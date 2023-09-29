<?php

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

class HBDController extends Controller
{
    public function viewHbdReport()
{
    $user = Auth::user();
    $enquiries = Enquiry::query();
    $enquiries1 = null;

    $today = Carbon::now()->format('m-d');
    $tomorrow = Carbon::now()->addDay()->format('m-d');

    if ($user->type === 'Admin') {
        $enquiries = $enquiries->orderBy("id", "desc");
        $enquiries1 = $enquiries->orderBy("id", "desc")->count();
    } elseif ($user->type === 'Manager') {
        $enquiries = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
            $query->where('created_by', $user->id)->orderBy("id","desc");
        });
        $enquiries1 = $enquiries->whereHas('GetCreatedby', function ($query) use ($user) {
            $query->where('created_by', $user->id)->orderBy("id","desc");
        })->count();
    } elseif ($user->type === 'Staff') {
        $enquiries = $enquiries->where('created_by', $user->id)->orderBy("id", "desc");
        $enquiries1 = $enquiries->where('created_by', $user->id)->orderBy("id", "desc")->count();
    }

    if ($enquiries1 === null) {
        $enquiries1 = 0;
    }
    $enquiries = $enquiries->whereNotNull('dob')
        ->orderByRaw("CASE
            WHEN DATE_FORMAT(dob, '%m-%d') = '$today' THEN 1
            WHEN DATE_FORMAT(dob, '%m-%d') = '$tomorrow' THEN 2
            ELSE 3
        END")
        ->orderByRaw("DATE_FORMAT(dob, '%m-%d') ASC")
        ->paginate(10);
    foreach ($enquiries as $enquiry) {
        if (!empty($enquiry->image)) {
            $disk = Storage::disk('s3');
            $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
        }
    }
    return view('hbdReports.viewHbdReport')->with(['Details' => $enquiries, 'Details1' => $enquiries1 ]);
}

public function searchHbd()
{
    $status = request('status');
    $days = request('days');
    $selectedUser = request('employee'); // Get the selected user from the form

    $query = Enquiry::query();

    if (Auth::user()->type == 'Staff' || Auth::user()->type == 'Manager') {
        if ($status != null) {
            $query->whereRaw("DATE_FORMAT(dob, '%m%d') BETWEEN DATE_FORMAT(NOW(), '%m%d') AND DATE_FORMAT(DATE_ADD(NOW(), INTERVAL $days DAY), '%m%d')")
                ->where(['status_id' => $status, 'created_by' => Auth::user()->id]);
        } else {
            $query->whereRaw("DATE_FORMAT(dob, '%m%d') BETWEEN DATE_FORMAT(NOW(), '%m%d') AND DATE_FORMAT(DATE_ADD(NOW(), INTERVAL $days DAY), '%m%d')")
                ->where(['created_by' => Auth::user()->id]);
        }
    }

    if (Auth::user()->type == 'Admin') {
        if ($status != null) {
            $query->whereRaw("DATE_FORMAT(dob, '%m%d') BETWEEN DATE_FORMAT(NOW(), '%m%d') AND DATE_FORMAT(DATE_ADD(NOW(), INTERVAL $days DAY), '%m%d')")
                ->where(['status_id' => $status]);
        } else {
            $query->whereRaw("DATE_FORMAT(dob, '%m%d') BETWEEN DATE_FORMAT(NOW(), '%m%d') AND DATE_FORMAT(DATE_ADD(NOW(), INTERVAL $days DAY), '%m%d')");
        }

        // Add a condition to filter by selected user
        if (!empty($selectedUser)) {
            $query->where('created_by', $selectedUser);
        }
    }

    $enquiries = $query->paginate(10);

    return view('hbdReports.hbdReportBySearch')->with(['Details' => $enquiries]);
}




    public function pendingBirthdays() {
        $loggedInUser = Auth::user();
        if ($loggedInUser->type === 'Admin') {
            // Fetch data for all users
            $users = User::where('is_active', 1)->get();
        } elseif ($loggedInUser->type === 'Manager') {
            // Fetch data for team members
            $users = User::where('created_by', $loggedInUser->id)->where('is_active', 1)->get();
        } else {
            // Fetch data for the current user
            $users = collect([$loggedInUser]);
        }
        foreach ($users as $user) {
            $user->totalClients = Enquiry::where('created_by', $user->id)->count();
            $user->addedBirthdays = Enquiry::where('created_by', $user->id)->whereNotNull('dob')->count();
            $user->pendingBirthdays = Enquiry::where('created_by', $user->id)->whereNull('dob')->count();
        }
        return view('hbdReports.pendingBirthdays')->with([
            'users' => $users,
        ]);
    }
    // public function pendingBirthdaysList($id) {
    //     $details = Enquiry::where(['created_by' => $id])->whereNull('dob')->paginate(25);
    //     $detailsCount = Enquiry::where(['created_by' => $id])->whereNull('dob')->count();

    //     return view('Enquiry.EnquiryList')->with(['details' => $details, 'detailsCount' => $detailsCount]);
    // }
    // public function pendingBirthdaysList($id) {
    //     $user = User::findOrFail($id);
    //     $enquiries = Enquiry::where('created_by', $user->id)
    //         ->whereNull('dob')
    //         ->paginate(25);
    //         $enquiries1 = Enquiry::where('created_by', $user->id)
    //         ->whereNull('dob')
    //         ->count();
    //     return view('Enquiry.EnquiryList')->with(['Details' => $enquiries, 'Details1' => $enquiries1 , 'user' => $user ]);
    // }



    // public function pendingbirthdayslist($id, $type, $from_date, $to_date, $status)
    // {
    //     $query = Enquiry::where('created_by', $id);

    //     if ($from_date && $to_date) {
    //         $query->whereBetween('created_at', [$from_date, $to_date]);
    //     }

    //     if ($type === 'added') {
    //         $query->whereNotNull('dob');
    //     } elseif ($type === 'pending') {
    //         $query->whereNull('dob');
    //     }

    //     if ($status !== 'all') {
    //         $query->where('status_id', $status);
    //     }

    //     $clientCount = $query->paginate(25);

    //     return view('Enquiry.EnquiryList')->with([
    //         'from_date' => $from_date,
    //         'to_date' => $to_date,
    //         'status' => $status,
    //         'enquiries' => $clientCount,
    //     ]);
    // }

      public function searchPendingHbdCount(Request $request){
                $fromDate = $request->input('from_date', '2020-01-01');
            $toDate = $request->input('to_date', now()->format('Y-m-d'));
            $status = $request->input('status', null);
            $usersQuery = User::where('type', '!=', 'Admin');
            if (Auth::user()->type == 'Staff') {
                $usersQuery->where('id', Auth::user()->id)->where('is_active', 1);
            }
            $users = $usersQuery->where('is_active', 1)->get();

            foreach ($users as $user) {
                $user->totalClients = Enquiry::where('created_by', $user->id)->count();
                $user->addedBirthdays = Enquiry::where('created_by', $user->id)->whereNotNull('dob')->count();
                $user->pendingBirthdays = Enquiry::where('created_by', $user->id)
                    ->whereNull('dob')
                    ->when($status, function ($query) use ($status) {
                        return $query->where('status_id', $status);
                    })
                    ->whereBetween('created_at', [$fromDate, $toDate])
                    ->count();
    }

    return view('hbdReports.pendingBirthdays')->with([
        'users' => $users,
        'from_date' => $fromDate,
        'to_date' => $toDate,
        'status' => $status,
    ]);
      }

//       $fromDate = $request->input('from_date', '2020-01-01');
//       $toDate = $request->input('to_date', now()->format('Y-m-d'));
//       $status = $request->input('status', null);

//       $usersQuery = User::where('type', '!=', 'Admin');
//       if (Auth::user()->type == 'Staff') {
//           $usersQuery->where('id', $id)->where('is_active', 1);
//       }
//       $users = $usersQuery->where('is_active', 1)->get();

//       foreach ($users as $user) {
//           $user->totalClients = Enquiry::where('created_by', $user->id)->count();
//           $user->addedBirthdays = Enquiry::where('created_by', $user->id)->whereNotNull('dob')->count();
//           $user->pendingBirthdays = Enquiry::where('created_by', $user->id)
//               ->whereNull('dob')
//               ->when($status, function ($query) use ($status) {
//                   return $query->where('status_id', $status);
//               })
//               ->whereBetween('created_at', [$fromDate, $toDate])
//               ->count();
// }

// return view('hbdReports.pendingBirthdays')->with([
//   'users' => $users,
//   'from_date' => $fromDate,
//   'to_date' => $toDate,
//   'status' => $status,
// ]);

//  return view('Enquiry.EnquiryList')->with([
//      'Details' => $enquiries,
//      'Details1' => $enquiriesCount,
//      'user' => $user,
//      'from_date' => $fromDate,
//      'to_date' => $toDate,
//      'status' => $status,
//  ]);
      public function pendingBirthdaysList(Request $request, $id) {
        $user = User::findOrFail($id);
        $fromDate = $request->input('from_date', '1999-01-01' );
        $toDate = $request->input('to_date', now()->format('Y-m-d'));
        $status = $request->input('status', null);

        $enquiries = Enquiry::where('created_by', $user->id)
            ->whereNull('dob')
            ->when($status, function ($query) use ($status) {
                return $query->where('status_id', $status);
            })->whereBetween('created_at', [$fromDate, $toDate])->paginate(25);
            $enquiries1 = Enquiry::where('created_by', $user->id)
            ->whereNull('dob')
            ->when($status, function ($query) use ($status) {
                return $query->where('status_id', $status);
            })->whereBetween('created_at', [$fromDate, $toDate])->count();
        return view('Enquiry.EnquiryList')->with([
            'Details' => $enquiries,
            'Details1' => $enquiries1 ,
            'user' => $user,
            'from_date' => $fromDate,
            'to_date' => $toDate,
            'status' => $status,
        ]);
    }

      public function report()
      {

        $status = request('status');
        $days = request('days');
        $user = Auth::user();

        $query = Enquiry::query();

        // Filter by user type
        if ($user->type === 'Manager' || $user->type === 'Staff') {
            $query->where('created_by', $user->id);
        } elseif ($user->type === 'Admin') {
            // Additional condition for Admin user type
            $query->get();
        }

        // Filter by status
        if ($status !== null) {
            $query->where('status_id', $status);
        }

        // Filter by date range
        $query->whereRaw("DATE_FORMAT(dob, '%m%d') BETWEEN DATE_FORMAT(NOW(), '%m%d') AND DATE_FORMAT(DATE_ADD(NOW(), INTERVAL ? DAY), '%m%d')", [$days]);

        // Retrieve the results without pagination
        $hrdata = $query->paginate(5);

        return view('reports.hbdReport', compact('hrdata'));


      }

      public function addedBirthdaysList($id){
        $loggedInUser = Auth::user();
        if ($loggedInUser->type === 'Admin') {
            $Details = Enquiry::whereNotNull('dob')->paginate(10);
        $Details1 = Enquiry::whereNotNull('dob')->count();
        } elseif ($loggedInUser->type === 'Manager') {
                $Details = Enquiry::where('created_by', $id)->whereNotNull('dob')->paginate(10);
            $Details1 = Enquiry::where('created_by', $id)->whereNotNull('dob')->count();
        } elseif($loggedInUser->type === 'Staff') {
            $Details = Enquiry::where('created_by', $id)->whereNotNull('dob')->pagiate(10);
        $Details1 = Enquiry::where('created_by', $id)->whereNotNull('dob')->count();
        }
        return view('Enquiry.EnquiryList')->with(['Details' => $Details, 'Details1' => $Details1 ]);
      }
}
