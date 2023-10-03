<?php

use App\Models\VCorRegComment;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::resource('user', \App\Http\Controllers\UserController::class);
Route::resource('category', \App\Http\Controllers\CategoryController::class);
Route::resource('submission', \App\Http\Controllers\SubmissionController::class);
Route::resource('home', \App\Http\Controllers\HomeController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





//Route::get('/getPDF', [App\Http\Controllers\PDFController::class, 'download']);

Route::group(['middleware'=>'auth'], function () {
    Route::get('permissions-all-users',['middleware'=>'check-permission:user|admin|superadmin','uses'=>'HomeController@allUsers']);
    Route::get('permissions-admin-superadmin',['middleware'=>'check-permission:admin|superadmin','uses'=>'HomeController@adminSuperadmin']);
    Route::get('permissions-superadmin',['middleware'=>'check-permission:superadmin','uses'=>'HomeController@superadmin']);
});

//Route::get('/edit-records', [App\Http\Controllers\UserDetailsController::class, 'index'])->name('edit-records');
Route::get('/edit-records','App\Http\Controllers\UserDetailsController@index');
Route::get('edit/{id}','App\Http\Controllers\UserDetailsController@show');
Route::post('edit/{id}','App\Http\Controllers\UserDetailsController@edit');
Route::get('delete/{id}','App\Http\Controllers\UserDetailsController@destroy');

Route::get('/forget-password', '\App\Http\Controllers\Auth\ForgotPasswordController@getEmail');
Route::post('/forget-password', '\App\Http\Controllers\Auth\ForgotPasswordController@postEmail');


Route::get('/reset-password/{token}', '\App\Http\Controllers\Auth\ResetPasswordController@showResetForm');
Route::post('/reset-password', '\App\Http\Controllers\Auth\ResetPasswordController@reset');

Route::get('/deletebyyear', [\App\Http\Controllers\SubmissionController::class, 'deletebyyear'])->name('deletebyyear');;

Route::get('/getSubByFormRequest',[App\Http\Controllers\HomeController::class, 'getSubByFormRequest'])->name('getSubByFormRequest');


Route::get('/tab1',function (){
    return view('home');
});
Route::get('/tab2',function (){
    return view('home');
});
Route::get('/tab3',function (){
    return view('home');
});
