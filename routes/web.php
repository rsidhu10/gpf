

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/getPDF","ControllerConvertPdf@getPDF");



Route::get('/cases/test', function () {
    return view('/cases/test');
});
Route::get('/aboutus', function () {
    return view('aboutus');
});
Route::get('/contactus', function () {
    return view('contactus');
});

Auth::routes();

// Route::resource('approvals','ApprovalController')->middleware('authenticated');

Route::get('/approvals','ApprovalController@index')->middleware('authenticated');
Route::post('/approvals','ApprovalController@store')->name('approvals.store');


// Route::group(['middleware' => ['web']], function(){
// 		Route::resource('cases','CasesController')->middleware('authenticated');
// });



Route::resource('reports','ReportController')->middleware('authenticated');;
Route::resource('general','GeneralController');


Route::resource('cases','CasesController')->middleware('authenticated');

Route::get('/home', 'HomeController@index')->name('home')->middleware('authenticated');
Route::get('/divuser' , 'DivuserController@index')->name('divhome');
Route::get('verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

Route::GET('admin/home','AdminController@index');
Route::GET('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin','Admin\LoginController@login');
Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email'); 
Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('admin-password/reset','Admin\ResetPasswordController@reset')->name('admin.password.update');
Route::GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin-password.reset'); 

Route::get('/json-circles','AdminApprovalsController@circles');
Route::get('/json-districts','AdminapprovalsController@districts');
Route::get('/json-blocks', 'AdminapprovalsController@blocks');
Route::get('/json-schemes', 'AdminapprovalsController@schemes');
Route::get('/json-schemedata', 'AdminapprovalsController@schemedata');
Route::get('/show-data', 'AdminapprovalsController@showRecord');
Route::get('/show-gpf-adv', 'GpfadvancesController@showAdvance');
Route::get('/json-designs','AdminapprovalsController@mydesignations');

Route::get('/case/circle',     'CasesController@circles');
Route::get('/case/division',   'CasesController@divisions');
Route::get('/case/category',   'CasesController@categories');
Route::get('/case/designation','CasesController@designations');
Route::get('/case/reason',     'CasesController@reasons');
Route::get('/show-gpf-adv',    'CasesController@showcases');
//Route::get('/case/dealer',       'CasesController@flagedcases');
Route::get('/case/dealer',   'CasesController@flagedcases');

Route::get('/home/importantcase', 'HomeController@importantcase');




