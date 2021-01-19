<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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
require __DIR__ . '/auth.php';



//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('peidas', function () {
    return view('peidas');
});

Route::get('register', function () {
    return view('register');
});

Route::get('clear', function() {
   Artisan::call('route:cache');

    dd('Route das imagens cache limpo');
});
Route::post('sms', '\App\Http\Controllers\SmsController@recive');

/*Route::post('login','\App\Http\Controllers\clientController@login');*/


Route::get('recivesms', function () {
    return view('ffssms');
});
Route::post('sms/{id}','\App\Http\Controllers\SmsController@Show');
