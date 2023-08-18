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
            return redirect()->back();
    }

    public function holidays(){
        $holiday = Holiday::orderBy("id","desc")->paginate(5);
        return view('holydays.viewHolidays', compact('holiday'));
    }
    public function editHoliday($id){

        $holiday = Holiday::where('id',$id)->first();
        return view('holydays.editHoliday', compact('holiday'));
    }
    public function updateHoliday(Request $request,$id){

        $holiday = Holiday::where('id',$id)->first();
        $holiday->name = $request->input('name');
            $holiday->date = $request->input('date');
              //image
              $image_code = $request->imageBaseString;
              $basePath = "holiday/";
              $fileName = uploadImageWithBase64($image_code, $basePath);
              $image_path = $basePath . $fileName;
              $holiday->image = $image_path;
              $holiday->save();
              return redirect('holidays');

    }
    public function deleteHoliday($id){

        $holiday = Holiday::where('id',$id)->first();
        $holiday->delete();
        return back();
    }


}
