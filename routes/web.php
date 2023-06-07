<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\UserController;
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

// this return the welcome page for the user
Route::get('/',[pagesController::class,"index"])->name("welcome");

// this will authonticate the admin when he loged in
Route::post('/admin/authonticate',[AdminController::class,'authonticate'])->name('admin.authonticate');

// this will show the admin the raised issues by some users
Route::get('/admin/issues/{id}',[AdminController::class,'issues'])->name('admin.issues')->middleware('auth');

// this let the admin see the detail of the comment
Route::post('/admin/{id}/see/comment/{cid}',[AdminController::class,'show'])->name('admin.show.comment.details')->middleware("auth");

// this let the admin address the issue as complited
Route::post('/admin/{id}/addresses/issue/{eid}',[AdminController::class,'addressIssue'])->name('admin.address.issue')->middleware('auth');

// tihis will logout the admin from the page
Route::get('/admin/logout/{id}',[AdminController::class,'logout'])->name('admin.logout')->middleware('auth');

// this will redirect the admin with users data to show to him
Route::get('/admin/menu/{id}',[AdminController::class,'index'])->name('admin.menu')->middleware('auth');

// thsi wil lredirect the admin to the whole transaction histry is there 
Route::get('/admin/show/transaction/{id}',[AdminController::class,'transactions'])->name('admin.showTransaction')->middleware('auth');

// this will show the admin the deposite request by the users
Route::get('/admin/show/deposte/{id}',[AdminController::class,'deposite'])->name('admin.showDeposite')->middleware('auth');

// this will show the admin the withdrawal requests 
Route::get('/admin/show/withdrawals/{id}',[AdminController::class,'withdrawals'])->name('admin.showWithdraw')->middleware('auth');

// this will let the admin ban the user from accessing his account
Route::post('/admin/{id}/ban/{uid}',[AdminController::class,'banUser'])->name('admin.banUser')->middleware('auth');

// this will let the admin allow the user account
Route::post('/admin/{id}/allow/{uid}',[AdminController::class,'allow'])->name('admin.allowUser')->middleware('auth');

// this will let  the admin delete the transaction histry 
Route::post('/admin/{id}/delete/transaction/{tid}',[AdminController::class,'transactionDelete'])->name('admin.delete.transaction')->middleware('auth');

// this let the admin to delete the user withdraw request from the database
Route::post('/admin/{id}/delete/withdraw/{wid}',[AdminController::class,'deleteWithdraw'])->name('admin.delete.withdraw')->middleware('auth');

// this let the admin to grunt the deposite for the user
Route::post('/admin/{id}/grant/deposite/{did}',[AdminController::class,'grantDeposite'])->name('admin.grant.deposite')->middleware('auth');

// this will let the admin to revock the deposite 
Route::post('/admin{id}/revock/deposite/{did}',[AdminController::class,'revockDeposite'])->name('admin.revock.deposite')->middleware('auth');

// this route return the main page next to the landing
Route::get('/c5rogers',[pagesController::class,'main'])->name("c5rogers");

// this will return the about page
Route::get('/c5rogers/about',[pagesController::class,'about'])->name('c5rogers.about');

// this will return the sgin up page to the user
Route::get('/user/signup',[UserController::class,'signup'])->name('user.signup')->middleware('guest');

// this will save the user data registered
Route::post('/user/store', [UserController::class,'store'])->name('user.store');

// this one will return the login viw to the user
Route::get('/user/login',[UserController::class,'login'])->name('user.login')->middleware('guest');

// this will logout the user
Route::post('/user/logout',[UserController::class,'logout'])->name('user.logout')->middleware('auth');

// this will return the contact page for the user
Route::get('/user/contact',[ContactController::class,'contact'])->name('user.contact');

// this will send the contact information into contact model
Route::post('/user/contact/send',[ContactController::class,'send'])->name('user.contact.send');

// this will authonticate the user
Route::post('/user/authonticate',[UserController::class,'authonticate'])->name('user.authonticate');

// this will return the menu page for the user
Route::get('/user/menu',[UserController::class,'menu'])->name('user.menu')->middleware('auth');

// this will return the payment menu page to the user
Route::get('/user/payment',[UserController::class,'paymentMenu'])->name('user.payment')->middleware('auth');

// this will return the withdraw ui with the user information 
Route::get('/user/withdraw/{id}',[UserController::class,'withdraw'])->name('user.withdraw')->middleware('auth');

// this will make the withdraw request successfull or invalidate
Route::post('/user/withdraw/cashout/{id}',[UserController::class,'cashOut'])->name('user.cashOut')->middleware('auth');

// this will return the transfer page to the user
Route::get('/user/transfer/{id}',[UserController::class,'transfer'])->name('user.transfer')->middleware('auth');

// this will make the transfer real
Route::post('/user/maketransfer/{id}',[UserController::class,'makeTransfer'])->name('user.makeTransfer')->middleware('auth');

// this return the electric payment page
Route::get('/user/payment/electriccity/{id}',[UserController::class,'electriccity'])->name('pay.electriccity')->middleware('auth');
// this return the dstv payment page
Route::get('/user/payment/dstv/{id}',[UserController::class,'dstv'])->name('pay.dstv')->middleware('auth');
// this return the internet payment page
Route::get('/user/payment/internet/{id}',[UserController::class,'internet'])->name('pay.internet')->middleware("auth");
// this return the school payment page
Route::get('/user/payment/school/{id}',[UserController::class,'school'])->name('pay.school')->middleware('auth');
// this return the shoping payment page
Route::get('/user/payment/shoping/{id}',[UserController::class,'shoping'])->name('pay.shoping')->middleware('auth');
// this return the water payment page
Route::get('/user/payment/water/{id}',[UserController::class,'water'])->name('pay.water')->middleware('auth');

// this is where the payment end point is happen
Route::post('/user/{user_id}/pay/{company_id}',[CompanyController::class,'pay'])->name('comapny.pay')->middleware('auth');

// this will return the user transaction histry to the user
Route::get('/user/transaction/histry/{id}',[UserController::class,'histry'])->name('user.transacation.histry')->middleware('auth');

// this will accept the delete request from the histry page and return back to that page 
Route::delete('/user/transaction/delete/{id}',[UserController::class,'distroy'])->name('user.transaction.delete')->middleware('auth');

// this will return the view of profile information of the user
Route::get('/user/profile/{id}',[UserController::class,'profile'])->name('user.personalInfo')->middleware('auth');

//this will return the edit page for the user profile
Route::get('/user/profile/edit/{id}',[UserController::class,'profileEdit'])->name('user.profile.edit')->middleware('auth');

// this will update the user information sended from the edit page
Route::put('/user/profile/update/{id}',[UserController::class,'updateProfile'])->name('user.profile.update')->middleware('auth');

// this will return the deposite ui to the user
Route::get('/user/deposite/{id}',[UserController::class,'deposite'])->name('user.deposite')->middleware('auth');

// this will make the deposite real 
Route::post('/user/deposite/make/{id}',[UserController::class,'makeDeposite'])->name('user.make.deposite')->middleware('auth');
