<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UtilitesTools;
use App\Models\Holiday;

class HolidayController extends Controller
{
    public function addHoliday(){

        return view('holydays.addHolidays');
    }

    public function storeHolidays(Request $request ){

        $holiday = new Holiday();
            $holiday->name = $request->input('name');
            $holiday->date = $request->input('date');
              //image
              $image_code = $request->imageBaseString;
              $basePath = "holiday/";
              $fileName = uploadImageWithBase64($image_code, $basePath);
              $image_path = $basePath . $fileName;
              $holiday->image = $image_path;
              $holiday->save();
            $holiday->save();
            return redirect()->back();
    }

    public function holidays(){

        return view('holydays.viewHolidays');
    }
}
