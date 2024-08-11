<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ReportController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[UserController::class,'login'])->name('login');

Route::get('login',[UserController::class,'login']);
Route::post('login_post',[UserController::class,'login_post']);
Route::get('logout',[UserController::class,'logout']);

Route::any('otp_verify_page',[UserController::class,'otp_verify_page']);
Route::any('otp_verify',[UserController::class,'otp_verify']);
Route::get('forgotPassword',[UserController::class,'forgotPassword']);
Route::post('adminUserIdCheck',[UserController::class,'adminUserIdCheck']);
Route::get('confirmPasswordPage/{adminKey}',[UserController::class,'confirmPasswordPage']);
Route::post('confirmPassword',[UserController::class,'confirmPassword']);
Route::get('changePassword',[UserController::class,'changePassword']);
Route::post('updatePassword',[UserController::class,'updatePassword']);



Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('dashboard', [UserController::class,'dashboard']);
    Route::get('profile', [UserController::class,'profile']);
    Route::post('profile_update', [UserController::class,'profile_update']);
    Route::get('logout', [UserController::class,'logout']);
    Route::get('profile', [UserController::class,'profile']);


    // ----------------- Admin Controller ------------------------
    Route::any('admin_list', [UserController::class,'admin_list']);
    Route::any('expiry_resaller_user', [UserController::class,'expiry_admin']);
    Route::get('admin_dashboard_visit', [UserController::class,'admin_dashboard_visit']);
    Route::get('add_admin_user', [UserController::class,'add_admin_user']);
    Route::post('submit_admin_user', [UserController::class,'submit_admin_user']);
    Route::get('edit_admin/{id}', [UserController::class,'edit_admin']);
    Route::get('delete_admin/{id}', [UserController::class,'delete_admin']);
    // ----------------- Admin Controller End------------------------

    // -----------------ImportController ------------------------
    Route::any('import_form', [ImportController::class,'import_form']);
    Route::any('search_import', [ImportController::class,'search_import']);
    Route::get('admin_dashboard_visit', [ImportController::class,'admin_dashboard_visit']);
    Route::post('add_inport_form', [ImportController::class,'add_inport_form']);
    Route::post('submit_admin_user', [ImportController::class,'submit_admin_user']);
    Route::get('edit_inport_form/{id}', [ImportController::class,'edit_inport_form']);
    Route::get('delete_admin/{id}', [ImportController::class,'delete_admin']);
    // -----------------ImportController End------------------------


    // ----------------- Export Controller ------------------------
    Route::any('export_form', [ExportController::class,'export_form']);
    Route::any('search_export', [ExportController::class,'search_export']);
    Route::post('export_form_submit', [ExportController::class,'export_form_submit']);
    Route::get('edit_export/{id}', [ExportController::class,'edit_export']);
    Route::get('get_export_data_ajax', [ExportController::class,'get_export_data_ajax']);
    Route::get('delete_admin/{id}', [ExportController::class,'delete_admin']);
    // ----------------- Export Controller End------------------------


    Route::any('free_time', [ReportController::class,'free_time']);
    Route::any('bill_no_blank', [ReportController::class,'bill_no_blank']);
    Route::get('shipping_sec', [ReportController::class,'shipping_sec']);

});

