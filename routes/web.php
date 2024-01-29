<?php

use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLockerController;
use App\Http\Controllers\Admin\AdminPaymentController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayoutsController;
use App\Http\Controllers\LockerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Models\BookingHistory;
use Illuminate\Auth\Events\Login;
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

// Your protected routes go here

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['web' ,'auth', 'checkUserStatus'])->group(function () {

    Route::post('/home', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    Route::get('/payment', [PaymentController::class, 'index'])->name('user.payment');

    Route::get('/profile', [UserController::class, 'index'])->name('user.profile');
    Route::post('/profile/{id}', [UserController::class, 'update'])->name('user.profileupdate');
    //Route::get('/profile/a/{UserId}', [UserController::class, 'update']);

    //Route::get('/booking/bookinghistory', [BookingController::class, 'bookinghistoryuser'])->name('user.bookinghistory');
    Route::get('/booking/bookinghistory', [BookingController::class, 'mybookinghistory'])->name('user.bookinghistory');

    //Booking Routes
    Route::get('/booking', [BookingController::class, 'index'])->name('user.booking');
    Route::get('/booking/n/newbooking', [BookingController::class, 'newbooking'])->name('user.newbooking');
    Route::post('/booking/n/newbooking/newbooking2ndpart', [BookingController::class, 'handleFormSubmission'])->name('user.newbooking2nd');
    Route::get('/booking/n/newbooking/newbooking2ndpart', [LockerController::class, 'showLockerGrid'])->name('user.newbooking2nd');
    Route::get('/booking/managebooking', [BookingController::class, 'managebookings'])->name('user.managebooking');
    Route::post('/booking/newbooking/store', [BookingController::class, 'store'])->name('user.bookingcreate');
    Route::get('/booking/newbooking/store/view', [BookingController::class, 'bookingsummary'])->name('user.bookingsum');
    Route::get('/booking/managebooking', [BookingController::class, 'managebooking'])->name('user.managebooking');

    //Booking Manage
    Route::get('/booking/managebooking/{bookingId}', [BookingController::class, 'delete'])->name('user.deletebooking');
    Route::get('/booking/managebooking/editbookings/{Id}', [LockerController::class, 'showLockerGrid2']);
    Route::get('/booking/managebooking/editbookings/{bookingId}', [BookingController::class, 'editbookings'])->name('user.editbooking');
    Route::get('/booking/managebooking/editbookings/{Id}', [BookingController::class, 'LoardOldData']);
    Route::post('/booking/managebooking/review/{id}', [BookingController::class, 'reviewpost'])->name('reviewpost');


    //User Payment
    Route::get('/payment/newpayment', [PaymentController::class, 'index'])->name('user.newpayments');
    Route::get('/payment/paymenthistory', [PaymentController::class, 'index2'])->name('user.paymenthistory');
    Route::get('/payment/paymenthistory/topup', [PaymentController::class, 'topupdis'])->name('user.paymenthistorytopup');

    //Page Test
    Route::get('/test', [LayoutsController::class, 'sidebar'])->name('test');



    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });

    // Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->middleware('admin')->name('admin.dashboard');

    Route::group(['middleware' => 'web'], function () {
        Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    });


    //Admin Routes
    //Locker
    Route::get('/admin/dashboard/locker/addnewlocker', [AdminLockerController::class, 'index'])->name('admin.addlocker');
    Route::post('/admin/dashboard/locker/addnewlocker/store', [AdminLockerController::class, 'store'])->name('admin.createlocker');
    Route::get('/admin/dashboard/locker/viewlocker', [AdminLockerController::class, 'index2'])->name('admin.viewlocker');
    Route::get('/admin/dashboard/locker/managelocker', [AdminLockerController::class, 'index3'])->name('admin.managelocker');
    Route::get('/admin/dashboard/locker/viewlocker', [AdminLockerController::class, 'displaylocker'])->name('admin.viewlocker');
    Route::post('/admin/dashboard/locker/managelocker/update/{lockerId}', [AdminLockerController::class, 'update'])->name('admin.updatelocker');
    Route::get('/admin/dashboard/locker/managelocker/delete/{lockerId}', [AdminLockerController::class, 'delete'])->name('admin.lockerdelete');

    //Booking History
    Route::get('/admin/bookinghistory', [BookingController::class, 'bookinghistory'])->name('bookinghistoryview');
    Route::get('/admin/bookingmanage', [AdminBookingController::class, 'bookingmanage'])->name('bookingmanage');
    Route::post('/admin/bookingmanage/statusupdate/{id}', [AdminBookingController::class, 'UpdateBookingStatus'])->name('updatestatus');
    Route::post('/admin/bookingmanage/completion/{id}', [AdminBookingController::class, 'CompleteBooking'])->name('completebooking');
    Route::post('/admin/bookingmanage/keyreturnconfirm/{id}', [BookingController::class, 'keyreturnconfirm'])->name('admin.keyreturnconfirm');

    //To pass Locker table key to Managelocker Blade file
    Route::get('/admin/dashboard/locker/managelocker', [AdminLockerController::class, 'lockerAll'])->name('admin.managelocker');


    //Payment
    Route::get('/admin/dashboard/payment/newpayment/new', [AdminPaymentController::class, 'index'])->name('admin.newpayment');
    Route::get('/admin/dashboard/payment/history/paymenthistory/topupchrge', [AdminPaymentController::class, 'index2'])->name('admin.paymenthistory');
    Route::get('/admin/dashboard/payment/history/paymenthistory/bookingchrge', [AdminPaymentController::class, 'topuphisview'])->name('admin.paymenthistorybookingcharge');
    Route::get('/admin/dashboard/payment/newpayment/new/search',[AdminPaymentController::class, 'search'])->name('admin.paymentusersearch');
    Route::post('/admin/dashboard/payment/newpayment/new/search/proceed', [AdminPaymentController::class, 'paymentproceed'])->name('paymentproceed');
    Route::get('/admin/dashboard/payment/newpayment/new/search/proceed/{id}', [AdminPaymentController::class, 'paymentproceed'])->name('paymentproceed');

    //New Payment
    Route::post('/admin/dashboard/payment/newpayment/new/search/{id}', [AdminPaymentController::class, 'NewTopup'])->name('admin.NewTopup');


    //Payment History
    Route::get('/admin/dashboard/payment/history/paymenthistory/search',[AdminPaymentController::class, 'search_payment_history'])->name('payment-history-usersearch');
    Route::post('/admin/dashboard/locker/managelocker/lockerprice',[AdminLockerController::class, 'updatelockerprice'])->name('admin.lockerpriceupdate');

    //Admin User Management
    Route::get('/admin/dashboard/user/allusers', [AdminUserController::class, 'alluserview'])->name('admin.alluserview');
    Route::post('/admin/dashboard/user/allusers/{id}', [AdminUserController::class, 'credentialupdate'])->name('update.credential');

    //User Contact
    Route::get('/contact', [ContactController::class, 'index'])->name('user.contact');
    Route::post('/contact/send', [ContactController::class, 'store'])->name('user.contactstore');

    //Admin Feedback
    Route::get('/admin/feedback/usermessages', [ContactController::class, 'displaymessage'])->name('admin.displaymessage');
    Route::get('/admin/feedback/userreviews', [AdminLockerController::class, 'viewUserReview'])->name('admin.userreview');
    Route::post('/update-contact-status/{id}', [ContactController::class, 'updateStatus']);
});
