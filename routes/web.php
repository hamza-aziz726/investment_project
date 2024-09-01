<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\OtpVerificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Route::get('/fetch-user-data', [ProfileController::class, 'fetchUserData'])->name('fetch.user');

// // Route::put('/profile/update/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
// Route::post('/profile/verify-password/{id}', [ProfileController::class, 'verifyPassword'])->name('profile.verifyPassword');
Route::get('verify-otp', [OtpVerificationController::class, 'showOtpVerificationForm'])->name('otp.verify');
Route::post('verify-otp', [OtpVerificationController::class, 'verifyOtp']);
// Group routes under the 'auth' middleware to ensure authentication
Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/data', [ProfileController::class, 'fetchUserData'])->name('profile.fetchUserData');
    Route::post('/profile/update-personal-info', [ProfileController::class, 'updatePersonalInfo'])->name('profile.updatePersonalInfo');
    Route::post('/profile/update-address', [ProfileController::class, 'updateAddress'])->name('profile.updateAddress');
    Route::post('/profile/verify-password', [ProfileController::class, 'verifyPassword'])->name('profile.verifyPassword');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
    
    Route::get('/investment-plans', [UserController::class, 'investmentPlans'])->name('investment.plans');
    Route::get('/transactions', [UserController::class, 'transactions'])->name('transactions');
    Route::get('/referral', [UserController::class, 'referral'])->name('referral');
    Route::get('/referral/details/{id}', [UserController::class, 'referralDetails'])->name('referral.details');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::get('/withdrawal-requests', [UserController::class, 'withdrawalRequests'])->name('withdrawal.requests');
    Route::post('/withdrawal-requests', [UserController::class, 'submitWithdrawalRequest'])->name('withdrawal.submit');

    // Investments
    Route::get('/user/investments', [UserController::class, 'Investment'])->name('user.investments');
    //Add Investments
    Route::get('/user/add-investment', [UserController::class, 'addInvestment'])->name('add.investment');

    Route::post('/user/save-investment', [UserController::class, 'saveInvestment'])->name('save.investment');

});
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Investment Plans
    Route::get('/admin/investment-plans', [AdminController::class, 'investmentPlans'])->name('admin.investment.plans');
    Route::post('/admin/investment-plans', [AdminController::class, 'storeInvestmentPlan'])->name('admin.investment.plans.store');
    Route::delete('/admin/investment-plans/{id}', [AdminController::class, 'deleteInvestmentPlan'])->name('admin.investment.plans.delete');

    // Users
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

    // Transactions
    Route::get('/admin/transactions', [AdminController::class, 'transactions'])->name('admin.transactions');
    Route::post('/transaction/update-status', [AdminController::class, 'transStatus'])->name('transaction.updateStatus');

    // Investments
    Route::get('/admin/investments', [AdminController::class, 'investments'])->name('admin.investments');

    // Withdrawals
    Route::get('/admin/withdrawals', [AdminController::class, 'withdrawals'])->name('admin.withdrawals');
    Route::post('/admin/withdrawals/{id}/approve', [AdminController::class, 'approveWithdrawal'])->name('admin.withdrawals.approve');

    // Reporting
    Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');

    // Profile
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
});



