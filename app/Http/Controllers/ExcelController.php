<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\EnquiryType;
use App\Models\Followup_remark;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EnquiryImport;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
class ExcelController extends Controller
{
    public function enquiryImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx,csv',
        ]);

        // Get the file from the request
        $file = $request->file('file');

        // Use Excel::import() with the EnquiryImport class and the file instance
        Excel::import(new EnquiryImport, $file);

        return redirect('enquiry-list')->with('success', 'Data imported successfully.');
    }



}
