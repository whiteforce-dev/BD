<?php

namespace App\Imports;

use App\Models\Enquiry;
use Carbon\Carbon;
use App\Models\EnquiryType;
use App\Models\Followup_remark;
use Illuminate\Support\Facades\Auth;
use Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class EnquiryImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow(): int
    {
        return 2; // Start reading data from the 2nd row (excluding the subheaders).
    }
    public function model(array $row)
    {

        $dob = !empty($row[6]) ? Carbon::parse($row[6])->format('Y-m-d') : null;

// Separate date and time using explode
$timeParts = explode(' ', $row[12]);

$next_follow_date = !empty($timeParts[0]) ? Carbon::parse($timeParts[0])->format('Y-m-d') : null;
$next_follow_time = !empty($timeParts[1]) ? Carbon::parse($timeParts[1])->format('H:i:s') : null;


        $Enquiry = new Enquiry([
            "company_name" => $row[1],
            "complete_com_name" => $row[2],
            "contact_person" => $row[3],
            "vertical" => $row[4],
            "location" => $row[5],
            "dob" => $dob,
            "desig" => $row[7],
            "enquiry_type_id" => $this->getEnquiryTypeId($row[8]),
            "status_id" => $this->getStatusId(trim($row[9])),
            "contact" => $row[10],
            "email" => $row[11],
            "next_follow_date" => $next_follow_date,
            "next_follow_time" => $next_follow_time,
            "remark" => $row[14],
            "company_type" => $row[15],
            'created_by' => Auth::user()->id,
            'user_id' => Auth::user()->created_by,
        ]);

        return $Enquiry;
    }

    private function getEnquiryTypeId($enquiryType)
    {
        // Retrieve the enquiry type ID based on the given name
        // Replace 'enquiry_types' with the actual table name of your enquiry types if different
        $enquiryTypeModel = EnquiryType::where('name', $enquiryType)->first();

        // If the enquiry type is found, return its ID. Otherwise, return a default value (8 in this case).
        return $enquiryTypeModel ? $enquiryTypeModel->id : 8;
    }


    private function getStatusId($status)
    {
        // Retrieve the status ID based on the given remark
        // Replace 'followup_remarks' with the actual table name of your followup remarks if different
        $followupRemarkModel = Followup_remark::where('remark', $status)->first();

        // If the followup remark is found, return its ID. Otherwise, return a default value (0 in this case).
        return $followupRemarkModel ? $followupRemarkModel->id : 0;
    }
}
