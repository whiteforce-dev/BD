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
}
