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
class DashboardController extends Controller
{
    public function totalEnquiryCount(){

        $user = Auth::user();
        $enquiries = Enquiry::query();
        $enquiries1 = null;
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
        $enquiries = $enquiries->paginate(10);
        foreach ($enquiries as $enquiry) {
            if (!empty($enquiry->image)) {
                $disk = Storage::disk('s3');
                $enquiry->image = $disk->temporaryUrl($enquiry->image, now()->addMinutes(5));
            }
        }
        return view('DashBoard',compact(' $enquiries1'));
    }
}
