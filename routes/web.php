<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [AppController::class, 'dashboard'])->name('dashboard');

    Route::get('/dashboard/create', [AppController::class, 'create'])->name('dashboard.create');
    Route::post('/customer/insert', [AppController::class, 'insert'])->name('customer.insert');
    Route::get('/dashboard/customers', [AppController::class, 'index'])->name('dashboard.index'); 
    Route::get('/dashboard/edit/{id}', [AppController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/update/{id}',[AppController::class,'update'])->name('customer.update');
    Route::get('/dashbaord/profile/{id}',[AppController::class,'profile'])->name('dashboard.profile');
    Route::get('/customer/delete/{id}', [AppController::class, 'delete'])->name('dashboard.delete');
    Route::get('/admin/documents', [AppController::class, 'documents'])->name('dashboard.documents');
    Route::post('/admin/document',[AppController::class,'uploaddocuments'])->name('document.uploaddocuments');
    Route::get('/admin/documents/downloads/{id}',[AppController::class,'downloadDocuments'])->name('document.downloads');
    Route::get('/admin/document/delete/{id}',[AppController::class,'deleteDocuments'])->name('document.delete');
    Route::get('/admin/document/preview/{id}',[AppController::class,'previewDocument'])->name('document.previewDocument');
    Route::get('/admin/documents/list', [AppController::class, 'listDocuments'])->name('document.list');
    Route::get('/dashboard/customerdetails',[AppController::class,'customerdetails'])->name('dashboard.customerdetails');
    Route::get('/dashboard/editdetails/{id}',[AppController::class,'editdetails'])->name('dashboard.editdetails');
    Route::put('/dashboard/updatedetails/{id}',[AppController::class,'updatedetails'])->name('dashboard.updatedetails');
    Route::get('/dashboard/viewprofile/{id}',[AppController::class,'viewprofile'])->name('dashboard.viewprofile');
    Route::get('/dashboard/deletedetails/{id}',[AppController::class,'deletedetails'])->name('dashboard.deletedetails');
    Route::get('/dashboard/customers',[AppController::class,'customers'])->name('dashboard.index');
    Route::get('/dashboard/customerdetails',[AppController::class,'customer'])->name('dashboard.customerdetails');
    Route::get('/dashboard/terms-of-service',[AppController::class,'terms'])->name('dashboard.terms');
    Route::get('/dashboard/quick-processing',[AppController::class,'quickProcessing'])->name('dashboard.quick-processing');
    Route::get('/dashboard/support',[AppController::class,'support'])->name('dashboard.support');
    Route::get('/dashboard/perfomance-analytics',[AppController::class,'perfomanceAnalytics'])->name('dashboard.perfomance-analytics');
    Route::get('/dashboard/emergency-support',[AppController::class,'emergencySupport'])->name('dashboard.emergency-support');
    Route::get('/dashboard/live-chat',[AppController::class,'liveChat'])->name('dashboard.live-chat');
    Route::get('/dashboard/phone-support',[AppController::class,'phoneSupport'])->name('dashboard.phone-support');
    Route::get('/dashboard/email-support',[AppController::class,'emailSupport'])->name('dashboard.email-support');
    Route::get('/dashboard/compose-email',[AppController::class,'composeEmail'])->name('dashbooard.compose-email');
    Route::get('/dashboard/phone-support/general-support',[AppController::class,'generalSupport'])->name('dashboard.general-support');
});



Route::get('/admin/login', function () {
    return redirect()->route('login');
})->name('admin.login');
