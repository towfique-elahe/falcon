<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\query_form;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Models\Subscription;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

///////////////////////////////////////////////// frontend
// home
Route::get('/', [SettingsController::class, 'homePlans'])->name('home');

// User Role  = 0
//Admin Role = 1
// Admin Role =  2

///////////////////////////////////////////////// user panel
// dashboard
Route::get('/dashboard', [DashboardController::class, 'showDash'])->middleware(['auth', 'verified'])->name('dashboard');

// profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');
});

// connection
Route::get('/connection',[SubscriptionController::class,'showConnection'])->middleware(['auth', 'verified'])->name('connection');

// subscription
Route::get('/subscription',[SubscriptionController::class,'showSubscription'])->middleware(['auth', 'verified',])->name('subscription');

// dues
Route::get('/dues', [CheckoutController::class, 'showDues'])->middleware(['auth', 'verified'])->name('dues');

// transactions
Route::get('/transactions', [CheckoutController::class, 'showPayment'])->middleware(['auth', 'verified'])->name('transactions');
Route::get('/transaction/{id}', [CheckoutController::class, 'showTransaction'])->middleware(['auth', 'verified'])->name('transaction');

// complain
Route::get('/complain', [ComplainController::class, 'complain'])->name('complain');
Route::post('/store-complain', [ComplainController::class, 'storeComplain'])->name('store_complain');

// plans
Route::get('/plans',[ProfileController::class,'planInput'])->middleware(['auth', 'verified'])->name('plans');

// checkout
Route::get('/planurl/{name?}/{price?}',[ProfileController::class,'urlInput'])->middleware(['auth', 'verified'])->name('planurl');
Route::get('/planurl/{name?}/{price?}/ssl',[SslCommerzPaymentController::class,'payViaAjax'])->middleware(['auth', 'verified']);

// stripe
Route::get('/checkout',[CheckoutController::class, 'checkout'])->middleware(['auth', 'verified'])->name('checkout');
Route::post('/checkout',[CheckoutController::class, 'afterPayment'])->middleware(['auth', 'verified',])->name('checkout.credit-card');

// payment success
Route::get('/payment-success', function () {
    return view('user_panel.payment_success');
})->middleware(['auth', 'verified'])->name('payment_success');

// sslcommerz
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax'])->name('pay_ssl');

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);








///////////////////////////////////////////////// admin panel
// dashboard
Route::get('/admin/dashboard',[DashboardController::class,'adminDash'])->middleware(['auth', 'verified','isAdmin'])->name('adminDashboard');

// connections
// Route::get('/admin/connections', function () {
//     return view('admin.connections');
// })->middleware(['auth', 'verified','isAdmin',])->name('adminConnections');

// dues
Route::get('/admin/dues',[AdminController::class,'dues'])->middleware(['auth', 'verified','isAdmin','isAdmin'])->name('adminDues');
Route::get('/admin/due/{id}',[AdminController::class,'due'])->middleware(['auth', 'verified','isAdmin','isAdmin'])->name('adminDue');

// payments
Route::get('/admin/payments',[CheckoutController::class, 'adminPayments'])->middleware(['auth', 'verified','isAdmin'])->name('adminPayments');
Route::get('/admin/payment/{id}',[CheckoutController::class, 'adminPayment'])->middleware(['auth', 'verified','isAdmin'])->name('adminPayment');
Route::get('/admin/payment/{id}/aprove',[CheckoutController::class, 'approvePay'])->middleware(['auth', 'verified','isAdmin'])->name('approvePay');

// subscriptions
Route::get('/admin/subscriptions',[AdminController::class,'subscript'])->middleware(['auth', 'verified','isAdmin'])->name('adminSubscriptions');
Route::get('/admin/subscription/{id}',[AdminController::class,'subDetails'])->middleware(['auth', 'verified','isAdmin'])->name('adminSubscription');

// users list
Route::get('/admin/users',[ProfileController::class, 'adminUsers'])->middleware(['auth', 'verified','isAdmin'])->name('adminUsers');
Route::get('/admin/user/{id}',[AdminController::class, 'adminUserDetails'])->middleware(['auth', 'verified','isAdmin'])->name('adminUser');

// admin profile
Route::get('/admin/profile',[AdminController::class,'profile'])->middleware(['auth', 'verified','isAdmin'])->name('adminProfile');
Route::post('/admin/update',[AdminController::class,'update'])->middleware(['auth', 'verified','isAdmin'])->name('updateProfile');
Route::post('/admin/password',[AdminController::class,'UpdatePassword'])->middleware(['auth', 'verified','isAdmin'])->name('update.password');

// complains
Route::get('/admin/complains',[ComplainController::class, 'listComplain'])->middleware(['auth', 'verified','isAdmin'])->name('adminComplains');
Route::get('/admin/complain/{id}',[ComplainController::class, 'showComplain'])->middleware(['auth', 'verified','isAdmin'])->name('adminComplain');
Route::get('/admin/complain/solved/{id}',[ComplainController::class, 'destroyComplain'])->middleware(['auth', 'verified','isAdmin'])->name('destroyComplain');










///////////////////////////////////////////////// super admin panel
// dashboard
Route::get('/super-admin/dashboard',[DashboardController::class, 'superDash'])->middleware(['auth', 'verified','isSuperAdmin'])->name('superDashboard');

// settings
Route::get('/super-admin/settings',[SettingsController::class, 'viewPlans'])->middleware(['auth', 'verified','isSuperAdmin'])->name('superSettings');
Route::post('/super-admin/settings/update',[SettingsController::class, 'updatePlans'])->middleware(['auth', 'verified','isSuperAdmin'])->name('updateSettings');

// admins
Route::get('/super-admin/admins',[AdminController::class, 'adminList'])->middleware(['auth', 'verified','isSuperAdmin'])->name('superAdmins');
Route::get('/super-admin/admin/{id}',[AdminController::class, 'adminDetails'])->middleware(['auth', 'verified','isSuperAdmin'])->name('superAdmin');
Route::get('/super-admin/admin/{id}/make-user',[AdminController::class, 'makeUser'])->middleware(['auth', 'verified','isSuperAdmin'])->name('makeUser');
Route::get('/super-admin/admin/{id}/edit',[AdminController::class, 'editAdmin'])->middleware(['auth', 'verified','isSuperAdmin'])->name('editAdmin');
Route::get('/super-admin/admin/{id}/update',[AdminController::class, 'updateAdmin'])->middleware(['auth', 'verified','isSuperAdmin'])->name('updateAdmin');
Route::get('/super-admin/admin/{id}/delete',[AdminController::class, 'deleteAdmin'])->middleware(['auth', 'verified','isSuperAdmin'])->name('deleteAdmin');

// users
Route::get('/super-admin/users',[AdminController::class, 'userList'])->middleware(['auth', 'verified','isSuperAdmin'])->name('superUsers');
Route::get('/super-admin/user/{id}',[AdminController::class, 'userDetails'])->middleware(['auth', 'verified','isSuperAdmin'])->name('superUser');
Route::get('/super-admin/user/{id}/make-admin',[AdminController::class, 'makeAdmin'])->middleware(['auth', 'verified','isSuperAdmin'])->name('makeAdmin');
Route::get('/super-admin/user/{id}/edit',[AdminController::class, 'editUser'])->middleware(['auth', 'verified','isSuperAdmin'])->name('editUser');
Route::get('/super-admin/user/{id}/update',[AdminController::class, 'updateUser'])->middleware(['auth', 'verified','isSuperAdmin'])->name('updateUser');
Route::get('/super-admin/user/{id}/delete',[AdminController::class, 'deleteUser'])->middleware(['auth', 'verified','isSuperAdmin'])->name('deleteUser');


// smtp mail
Route::post('send/mail',[query_form::class,'send_mail'])->name('send.mail');



require __DIR__.'/auth.php';
