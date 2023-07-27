<?php

use App\Http\Controllers\EnquiryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;

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
Route::get('/add-employee', [TeamController::class, 'AddEmp']);
Route::post('/store-employee', [TeamController::class, 'StoreEmp']);
Route::get('/viewTeam', [TeamController::class, 'ViewTeam']);
Route::get('/viewResignMember', [TeamController::class, 'ResignMember']);
Route::get('/edit-employee/{id}', [TeamController::class, 'EditEmp']);
Route::post('/update-employee/{id}', [TeamController::class, 'UpdateEmp']);
Route::get('/delete-employee/{id}', [TeamController::class, 'DeleteEmp']);
Route::get('/resign-employee/{id}', [TeamController::class, 'ResignEmp']);


//Enquiry

Route::get('add-enquiry', [EnquiryController::class, 'AddEnquiry']);
Route::post('store-enquiry', [EnquiryController::class, 'StoreEnquiry']);
Route::get('enquiry-list', [EnquiryController::class, 'EnquiryList']);
Route::get('manager-enquiry-list', [EnquiryController::class, 'ManagerEnquiry']);
Route::get('edit-enquiry/{id}', [EnquiryController::class, 'EditEnquiry']);
Route::post('update-enquiry/{id}', [EnquiryController::class, 'UpdateEnquiry']);
Route::get('delete-enquiry/{id}', [EnquiryController::class, 'DeleteEnquiry']);
Route::get('search-enquiry', [EnquiryController::class, 'SearchEnquiry']);

// show hotlist
Route::get('hot', [EnquiryController::class, 'Hot']);
Route::get('search-enquiry', [EnquiryController::class, 'SearchEnquiry']);
Route::get('team-hot', [EnquiryController::class, 'AdminTeamHot']);

