<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController as MessageController;

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

Route::middleware('AutoLogon')->get('/', function () {
    return view('auth.login');
});


Route::middleware('AutoLogon')->resource('clients','App\Http\Controllers\ClientController');
Route::middleware('AutoLogon')->resource('codes','App\Http\Controllers\CodeController');
Route::middleware('AutoLogon')->resource('jogos','App\Http\Controllers\JogoController');
Route::middleware('AutoLogon')->resource('empresa','App\Http\Controllers\EmpresaController');
Route::middleware('AutoLogon')->get('admin', 'App\Http\Controllers\isAdmin@index');
Route::middleware('AutoLogon')->get('create', 'App\Http\Controllers\isAdmin@userCreate');
Route::middleware('AutoLogon')->post('create/user', 'App\Http\Controllers\isAdmin@store');
Route::middleware('AutoLogon')->get('user/{user}/edit', 'App\Http\Controllers\isAdmin@edit');
Route::middleware('AutoLogon')->post('user/{user}/edit', 'App\Http\Controllers\isAdmin@update');
Route::middleware('AutoLogon')->delete('user/{user}', 'App\Http\Controllers\isAdmin@destroy');
Route::middleware('AutoLogon')->get('user/{user}/edit', 'App\Http\Controllers\isAdmin@edit');
Route::middleware('AutoLogon')->get('tickets', 'App\Http\Controllers\Ticket@index');
Route::middleware('AutoLogon')->get('vendas', 'App\Http\Controllers\VendaController@index');
Route::middleware('AutoLogon')->get('recibo/{venda}', 'App\Http\Controllers\VendaController@show');
Route::middleware('AutoLogon')->get('codesbygame', 'App\Http\Controllers\CodeController@codesByGame');
Route::middleware('AutoLogon')->get('jogos/{jogo}/vender', 'App\Http\Controllers\JogoController@vender');
Route::middleware('AutoLogon')->post('jogos/{jogo}/vender', 'App\Http\Controllers\JogoController@rgVender');

// Route::middleware('AutoLogon')->resource('articulos','App\Http\Controllers\ArticuloController');
// Route::middleware('AutoLogon')->resource('messages','App\Http\Controllers\MessageController');
// Route::middleware('AutoLogon')->resource('aniversarios','App\Http\Controllers\AniversariosController');
// Route::middleware('AutoLogon')->get('sendMessage/{message}', 'App\Http\Controllers\MessageController@SendMessage');
// Route::middleware('AutoLogon')->get('sendMessageTwilio/{message}', 'App\Http\Controllers\MessageController@SendMessageTwilio');
// Route::middleware('AutoLogon')->get('sendMessageExpress/{message}', 'App\Http\Controllers\MessageController@SendMessageExpress');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
