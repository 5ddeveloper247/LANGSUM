<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\TenantInquiry;
use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;

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
    // return view('welcome');
    return view('website/home');
});

Route::get('/excel_import', function () {
    // return view('welcome');
    return view('excel');
});
Route::post('/processExcel', [ExcelController::class, 'processExcel'])->name('import');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/inquiry', function () {
    return view('website/inquiry-form');
});

Route::get('/tenant-inquiry', function () {
    return view('website/tenant-inquiry');
});

Route::post('/SubmitInquiry', [InquiryController::class, 'saveInquiry'])->name('SubmitInquiry');;

Route::post('/validateStep1', [InquiryController::class, 'validateStep1'])->name('validateStep1');

Route::post('/validateStep5', [InquiryController::class, 'validateStep5'])->name('validateStep5');

// tenant validation starts 
Route::post('/validateTenantStep1', [TenantInquiry::class, 'validateTenantStep1'])->name('validateTenantStep1');

Route::post('/validateTenantStep2', [TenantInquiry::class, 'validateTenantStep2'])->name('validateTenantStep2');

Route::post('/validateTenantStep3', [TenantInquiry::class, 'validateTenantStep3'])->name('validateTenantStep3');

Route::post('/validateTenantStep4', [TenantInquiry::class, 'validateTenantStep4'])->name('validateTenantStep4');

Route::post('/validateTenantStep5', [TenantInquiry::class, 'validateTenantStep5'])->name('validateTenantStep5');


Route::post('/SubmitTenant', [TenantInquiry::class, 'SubmitTenant'])->name('SubmitTenant');

Route::post('contactQuery', [InquiryController::class, 'contactQuery'])->name('contactQuery');

Route::get('/inquiry-success', function () {
    return view('website/inquiry_success');
});

Route::get('/tenant-success', function () {
    return view('website/tenant_success');
});

// admin dashboard starts 

Route::group(['middleware' => 'role:admin'], function () {

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('users', [AdminController::class, 'users'])->name('users');

    Route::get('getAllUsers', [AdminController::class, 'getAllUsers'])->name('getAllUsers');

    Route::get('users/{id}', [AdminController::class, 'getSpecificuser']);

    Route::delete('/users/{id}', [AdminController::class, 'deleteUser']);

    Route::post('addUser', [AdminController::class, 'addUser'])->name('addUser');

    Route::post('updateUser', [AdminController::class, 'updateUser'])->name('updateUser');

    Route::get('admin/inquiry', [AdminController::class, 'inquiryView']);

    Route::get('admin/deleteIinquiry/{id}', [AdminController::class, 'deleteInquiry'])->name('admin.delete.inquiry');

    Route::get('admin/deleteSelectedIinquiries', [AdminController::class, 'deleteSelectedIinquiries'])->name('admin.delete.selected.inquiry');

    Route::get('admin/permanantdeleteInquiries', [AdminController::class, 'permanantdeleteInquiries'])->name('admin.permanantdeleteInquiries');


    Route::get('admin/permanantdeleteTenants', [AdminController::class, 'permanantdeleteTenants'])->name('admin.permanantdeleteTenants');


    Route::get('admin/inquiry/edit/{id}', [AdminController::class, 'inquiryDetails'])->name('admin.inquiry.edit');

    Route::post('admin/updateInquiry', [AdminController::class, 'updateInquiry'])->name('updateInquiry');

    Route::get('admin/tenant', [AdminController::class, 'tenantView'])->name('tenantView');

    Route::get('admin/deleteTenant/{id}', [AdminController::class, 'deleteTenant'])->name('admin.delete.tenant');

    Route::get('admin/tenant/edit/{id}', [AdminController::class, 'tenantDetails'])->name('admin.tenant.edit');

    Route::post('admin/updateTenant', [AdminController::class, 'updateTenant'])->name('updateTenant');

    Route::get('admin/deleteallTenant', [AdminController::class, 'deleteallTenant'])->name('admin.delete.tenant.all');

    // to export inquiries
    Route::get('/admin/export/inquiries',  [AdminController::class, 'export'])->name('admin.export.inquiries');
 
    Route::post('/admin/import/inquiries',  [AdminController::class, 'importInquiries'])->name('admin.import.inquiries');

    Route::post('/admin/import/tenant',  [AdminController::class, 'importTenant'])->name('admin.import.tenant');

    // to export tenant
    Route::get('/admin/export/tenant',  [AdminController::class, 'exportTenant'])->name('admin.export.tenant');

    // for contact queries 
    Route::get('/admin/contact',  [AdminController::class, 'contactInquiries'])->name('admin.contact');

    Route::get('/admin/contactQueryDetail',  [AdminController::class, 'contactQueryDetail'])->name('admin.contactQueryDetail');
    
    Route::get('/admin/contactQuery/reply',  [AdminController::class, 'contactQueryReply'])->name('admin.contactQuery.reply');

    Route::get('/admin/contactQuery/getReply',  [AdminController::class, 'GetcontactQueryReply'])->name('admin.contactQuery.getReply');

    Route::get('/admin/audit',  [AdminController::class, 'viewAudit'])->name('admin.audit');







});

Route::group(['middleware' => 'role:user'], function () {
});
























require __DIR__ . '/auth.php';
