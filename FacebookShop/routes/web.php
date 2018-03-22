<?php

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


//===========================================================Log In and Registration========================================

//to display the log in form
Route::get('/loginform', 'AuthController@showLogInForm' )-> name('loginForm');

//to display vendor registration form
Route::get('/registration', 'AuthController@showVendorRegistrationForm')-> name('registrationForm');

//to create and save vendor data
Route::post('registration','AuthController@saveVendorData') ->name('registerUser');

//to authenticate the vendor/admin
Route::get('authentication','AuthController@authenticate') -> name('authenticate');

//to logout
Route::get('logout','AuthController@logout')-> name('logout');

//======================================================Pages==============================================

//route to the homepage which is the first page to be shown before log in
Route::get('/', 'ViewController@showHome')-> name('home');

//dashboard layout. no content
Route::get('dashboard', 'ViewController@showDashboard') -> name('dashboard');

//====================================================Shop==================================================

/*
 * route to create shop tab.
 * another button should be allocated for it since it the first thing to be done
 */
Route::get('/dashboard/createShop', 'ShopController@showCreateShopForm') -> name('showCreateShopForm');

//route to the form controller which stores shop details
Route::post('/FormController','ShopController@saveShopData') -> name('storeShopDetails');

//to display shop details
Route::get('/dashboard/shopDetails','ShopController@showShopDetails') -> name('showShopDetails');

//to display and update shop details
Route::post('/dashboard/updateShopDetails', 'ShopController@updateShopData') -> name('updateShopDetails');
//=================================================User======================================================
//route to My Details tab where you can look up your details and also can update them
Route::get('/dashboard/myDetails', 'FormController@showMyDetails') -> name('myDetails');

//to update user details
Route::post('/dashboard/updateDetails','FormController@updateUserDetails')->name('updateUserDetails');

//to change password
Route::post('/dashboard/updatePassword','FormController@updatePassword')->name('updatePassword');



//route to Change Password tab.
Route::get('/dashboard/changePassword', function () {
    return view('changePassword');
}) -> name('changePassword');

//route to the contact us form on home page which will store user message to message table
Route::post('/FormController/Message','FormController@saveMessageData');
