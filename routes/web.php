<?php

use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\HBDController;
use App\Http\Controllers\RemarksController;
use App\Http\Controllers\TargetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\HolidayController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/dashboard', function () {
    return view('DashBoard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// TeamController
Route::get('/add-employee', [TeamController::class, 'addEmp']);
Route::post('/store-employee', [TeamController::class, 'storeEmp']);
Route::get('/viewTeam', [TeamController::class, 'viewTeam']);
Route::get('/viewResignMember', [TeamController::class, 'resignMember']);
Route::get('/edit-employee/{id}', [TeamController::class, 'editEmp']);
Route::post('/update-employee/{id}', [TeamController::class, 'updateEmp']);
Route::get('/delete-employee/{id}', [TeamController::class, 'deleteEmp']);
Route::get('/resign-employee/{id}', [TeamController::class, 'resignEmp']);


//Enquiry

Route::get('add-enquiry', [EnquiryController::class, 'addEnquiry']);
Route::post('store-enquiry', [EnquiryController::class, 'storeEnquiry']);
Route::get('enquiry-list', [EnquiryController::class, 'enquiryList']);
Route::get('manager-enquiry-list', [EnquiryController::class, 'managerEnquiry']);
Route::get('edit-enquiry/{id}', [EnquiryController::class, 'editEnquiry']);
Route::post('update-enquiry/{id}', [EnquiryController::class, 'updateEnquiry']);
Route::get('delete-enquiry/{id}', [EnquiryController::class, 'deleteEnquiry']);
Route::get('searchEnquiry', [EnquiryController::class, 'searchEnquiry']);




// show hotlist
Route::get('hot-list', [EnquiryController::class, 'hot']);
Route::get('team-hot-list', [EnquiryController::class, 'teamHotList']);
Route::get('team-member-hotlist/{id}', [EnquiryController::class, 'teamMemberHotList']);
Route::post('multySelectMemberHotList', [EnquiryController::class, 'multySelectMemberHotList']);

Route::get('hold-list', [EnquiryController::class, 'holdList']);

Route::get('break-list', [EnquiryController::class, 'breakList']);
Route::get('mngr-break-list', [EnquiryController::class, 'mngrBreakList']);

//Excel Controller

Route::post('importExcel',[ExcelController::class, 'EnquiryImport']);


//Remarks Controlller

Route::get('addManagerRemark',[RemarksController::class, 'addManagerRemarks']);
Route::post('storeManagerRemark',[RemarksController::class, 'storeManagerRemark']);

//FollowUp Controller
Route::get('addFollowUp', [FollowUpController::class, 'addFollowUp']);
Route::post('storeFollowUp', [FollowUpController::class, 'storeFollowUp']);
Route::get('todayFollowups', [FollowUpController::class, 'todayFollowups']);
Route::get('totalFollowups', [FollowUpController::class, 'totalFollowups']);
Route::get('missedFollowups', [FollowUpController::class, 'missedFollowups']);


//Holidays
Route::get('holidays', [HolidayController::class, 'holidays']);
Route::post('storeHolidays', [HolidayController::class, 'storeHolidays']);
Route::get('addHoliday', [HolidayController::class, 'addHoliday']);
Route::get('editHoliday/{id}', [HolidayController::class, 'editHoliday']);
Route::post('updateHoliday/{id}', [HolidayController::class, 'updateHoliday']);
Route::get('deleteHoliday/{id}', [HolidayController::class, 'deleteHoliday']);

//Hbd Reports
Route::get('viewHbdReport', [HBDController::class, 'viewHbdReport']);
Route::get('searchHbd', [HBDController::class, 'searchHbd']);
Route::get('pendingBirthdays', [HBDController::class, 'pendingBirthdays']);
Route::get('pendingBirthdaysList/{id}', [HBDController::class, 'pendingBirthdaysList'])->name('pendingBirthdaysList');
Route::get('searchPendingHbdCount', [HBDController::class, 'searchPendingHbdCount']);


// Monthly Target
Route::get('assignTarget', [TargetController::class, 'assignTarget']);
Route::get('assignMonthlyTarget/{manager}', [TargetController::class, 'assignMonthlyTarget']);
Route::post('storeMonthlyTarget',[TargetController::class, 'storeMonthlyTarget']);
Route::get('viewMonthlyTarget', [TargetController::class, 'viewMonthlyTarget']);
Route::get('get-table/{id}', [TargetController::class, 'getTable']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


