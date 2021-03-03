<?php

use App\Models\sendedsms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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


// Página Inicial caso estiver Logaddo , Caso não então pede login
Route::get('/', function () {
    if (auth()->guest()){

        return redirect("/peidas");

    }elseif(auth()->user()->username !== "Briefing" && auth()->user()->email !=="Briefing@gocall.pt" ){
    $sms= \App\Models\sendedsms::where('user_id',Auth::user()->id)->get()->last();
    return view('welcome')->with('userinfo',$sms);
    }else{
        return redirect('/Briefing');
    }
});
    Route::get('peidas', function () {
    return view('peidas');
});

// Registar um novo utilizador.

Route::get('register', function () {
    return view('register');
});

// Limpar a cache das routes

Route::get('clear', function() {
   Artisan::call('route:cache');
   return view ("welcome");
});
Route::get('teste', function() {
   return view ("teste");
});
// Sair do perfil do utilizador
Route::get('logout','\App\Http\Controllers\clientController@logout');

Route::post('login','\App\Http\Controllers\clientController@login');
Route::get('Homepage', function (){
    return view('welcome');
});

//Mostrar os sms Recebidos
Route::get('recivedsms', '\App\Http\Controllers\SmsController@showrecived');
//Mostrar os Numeros de telefone
Route::get('phone', '\App\Http\Controllers\PhoneController@show');

// Mostrar corpo da mensagem e se a variável $contrato existir mostra o contrato.
Route::get('sms/{id}','\App\Http\Controllers\SmsController@show');
// Mostrar as menssagens Enviadas.
Route::get('enviadas', '\App\Http\Controllers\SmsController@showsended');
// Página para adicionar um Número.
Route::get('addphone', function (){
    return view('Newnumber');
});
Route::get('briefing', function (){
    return view('dni');
});
Route::get('lista', function (){
    return view('list');
});

Route::get('sendlist', function (){
    if (Auth::user()->Admin ){
        $list = \App\Models\listas::all();
    }else{
        $t=Auth::user()->id;
        $list = \App\Models\listas::where('user_id',$t)->get();
    }
    return view('listsend')->with('lista',$list);
});


//Route::get('editlist', function (){
//    if (Auth::user()->Admin ){
//        $list = \App\Models\listas::all();
//    }else{
//        $t=Auth::user()->id;
//        $list = \App\Models\listas::where('user_id',$t)->get();
//    }
//    return view('editlist')->with('lista',$list);
//});

Route::get('editlist','\App\Http\Controllers\ListaController@listshow');


Route::get('editlist/{id}','\App\Http\Controllers\ListaController@listedit');

Route::get('deletelist/{id}','\App\Http\Controllers\ListaController@deletelist');

Route::post('editlist/{id}','\App\Http\Controllers\ListaController@listeditid');

Route::get('settings', function (){
    return view('definicoes');
});



Route::get('Briefing', function (){
    return view('dni');
});
//Página para enviar SMS
Route::get('sendSMS',function (){
    return view ("SendSms");
});

// Controller para enviar sms
Route::post('send', '\App\Http\Controllers\SmsController@Send');

Route::post('sendBriefing', '\App\Http\Controllers\SentlistController@Briefing');
Route::post('sendbriefing', '\App\Http\Controllers\SentlistController@Briefing');
// Controller para receber SMS (TWILIO OU VONAGE)
Route::post('sms', '\App\Http\Controllers\SmsController@recive');
// Controller para receber status da SMS (TWILIO OU VONAGE)
Route::post('tete', '\App\Http\Controllers\SmsController@status');
// Controller para telemóvel.
Route::post('addphone', '\App\Http\Controllers\PhoneController@add');

//Delete phone
Route::get('delphone/{id}','\App\Http\Controllers\PhoneController@delete');
//teste
Route::post('addlist', '\App\Http\Controllers\SmsController@lista');
Route::post('sendtolist', '\App\Http\Controllers\SentlistController@sendtoolist');




//Route::post('recivedsms/{mi}','\App\Http\Controllers\SmsController@messageid');


