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
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;

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

//route to the contact us form on home page which will store user message to message table
Route::post('/Message','FormController@saveMessageData') -> name('contactUsForm');
Route::get('dashboard/help','ViewController@help')->name('help');

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
Route::get('dashboard/viewMyShop','ShopController@viewMyShop')->name('viewMyShop');
Route::post('storeShopMessage','FormController@storeShopMessage')->name('storeShopMessage');

//=================================================Product======================================================

Route::get('dashboard/newProduct','ProductController@showNewProductForm')-> name('showNewProductForm');
Route::get('dashboard/categories','ProductController@showCategories')->name('showCategories');
Route::post('dashboard/storeCategory','ProductController@storeCategory')->name('storeCategory');
Route::post('dashboard/removeCategory','productController@removeCategory')->name('removeCategory');
Route::post('dashboard/addProduct','ProductController@addProduct')->name("addNewProduct");
Route::get('dashboard/viewProductDetails','ViewController@showProductsList')->name('showProductsDetails');
Route::get('dashboard/singleProduct','ViewController@showSpecificProduct')->name('showSpecificProduct');
Route::get('dashboard/removeProduct','ProductController@removeProduct')->name('removeProduct');

//=================================================Messages and Notifications======================================================
Route::get('dashboard/messages','ViewController@showMessages')->name('showMessages');

Route::get('dashboard/readMessage','FormController@markAsRead')->name('markAsRead');
Route::get('dashboard/unreadMessage','FormController@markAsUnread')->name('markAsUnread');

//=================================================User======================================================
//route to My Details tab where you can look up your details and also can update them
Route::get('/dashboard/myDetails', 'ViewController@showMyDetails') -> name('myDetails');

//to update user details
Route::post('/dashboard/updateDetails','FormController@updateUserDetails')->name('updateUserDetails');

//to change password
Route::post('/dashboard/updatePassword','FormController@updatePassword')->name('updatePassword');

//route to Change Password tab.
Route::get('/dashboard/changePassword', function () {
    return view('changePassword');
}) -> name('changePassword');


//=============================================Admin===================================================
Route::get('/dashboard/userList','ViewController@showUserList')->name('showUsersList');
Route::get('/dashboard/specificShop','ViewController@showSpecificShop')->name('showSpecificShop');

Route::get('/dashboard/shopsList','ViewController@showShopList')->name('showShopsList');
Route::get('/dashboard/specificVendor','ViewController@showSpecificVendor')->name('showSpecificVendor');

//=============================================Templates===================================================

Route::get('dashboard/titan-home','ViewController@showTemplateDemo')->name('showTemplateDemo');
Route::get('dashboard/chooseTemplate','ViewController@chooseTemplate')->name('chooseTemplate');
Route::get('dashboard/setTemplate','templateController@setTemplate')->name('setTemplate');
Route::get('dashboard/designTemplate','templateController@designTemplate')->name('designTemplate');
Route::post('dashboard/setSliderImage','templateController@setSliderImage')->name('setSliderImage');
Route::post('dashboard/setSliderText','templateController@setSliderText')->name('setSliderText');
Route::get('dashboard/designTemplateText','templateController@designTemplateText')->name('designTemplateText');
Route::get('dashboard/Templates/removeSliderImage','templateController@removeSliderImage')->name('removeSliderImage');
Route::post('dashboard/Templates/removeSliderText','templateController@removeSliderText')->name('removeSliderText');
//---------------------------------------
Route::get('searchProductCategory','templateController@searchProductCategory')->name('searchProductCategory');
Route::get('showTemplateHome','ViewController@showTemplateHome')->name('showTemplateHome');
Route::get('customerLogIn','CustomerController@customerLogInPage')->name('customerLogInPage');
Route::get('singleProduct','templateController@singleProduct')->name('singleProduct');
Route::get('accountSettings','templateController@accountSettings')->name('accountSettings');
Route::get('updateAccountDetails','CustomerController@updateAccountDetails')->name('updateAccountDetails');
Route::get('gallery','templateController@gallery')->name('gallery');

//=========================================Customer==========================================================

Route::get('customerRegister','CustomerController@customerRegisterPage')->name('customerRegisterPage');
Route::get('authenticateCustomer','CustomerController@authCustomer')->name('authCustomer');
Route::get('registerCustomer','CustomerController@registerCustomer')->name('registerCustomer');
Route::get('logoutCustomer','CustomerController@logout')->name('logoutCustomer');
Route::post('rateProduct','CustomerController@rateProduct')->name('rateProduct');

//=========================================Checkout=============================================================
Route::get('checkoutPage','CheckoutController@showCheckout')->name('checkoutPage');
Route::post('addToCart','CheckoutController@addToCart')->name('addToCart');
Route::get('removeFromCheckout','CheckoutController@removeProduct')->name('removeFromCheckout');

//==============================================Photos===========================================================
Route::get('dashboard/selectCategory','ViewController@selectCategoryPage')->name('uploadPhotos_selectCategory');
Route::post('dashboard/uploadPhotosForm','ViewController@showUploadPhotosForm') -> name('uploadPhotosForm');
Route::post('dashboard/uploadPhotos','ProductController@uploadPhotos')->name('uploadPhotos');
Route::get('dashboard/gallery','ViewController@viewPhotos')->name('viewPhotos');
Route::get('dashboard/removePhoto','ProductController@removePhoto')->name('removePhoto');
Route::post('dashboard/viewPhotos/search','ProductController@search')->name('search');
Route::post('updateViewCounter','ProductController@updateViewCount')->name('updateViewCounter');

//================================================Facebook===================================================
Route::get('dashboard/selectFacebookPage','ViewController@selectFacebookPage')->name('selectFacebookPage');

Route::post('dashboard/createFacebookTab', function (\Illuminate\Http\Request $request){
    require_once __DIR__ . '../vendor/autoload.php';

    $fb = new Facebook\Facebook([
        'app_id' => '373936209778018',
        'app_secret' => '72094c189a4e25895733e4d8b581707c',
        'default_graph_version' => 'v2.10'

    ]);

    $helper = $fb->getRedirectLoginHelper();
    if (isset($_GET['state'])) {
        $helper->getPersistentDataHandler()->set('state', $_GET['state']);
    }

    echo $request->page;
    echo Input::get('accessToken');




})->name('createFacebookTab');
