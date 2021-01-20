<?php

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
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
// });

Route::group(['as' => 'admin.', 'namespace' => 'Admin', 'prefix'=>'admin', 'middleware'=>['auth', 'admin']], 
function(){
	Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
	Route::get('/barnatoret', [App\Http\Controllers\BarnatoreController::class, 'index'])->name('barnatoret');
	Route::get('/barnatoret_detajet/{id}', [App\Http\Controllers\BarnatoreController::class, 'detajet'])->name('barnatorja_detajet');

	Route::get('/punetoret', [App\Http\Controllers\PunetoretController::class, 'getAll'])->name('punetoret');
	Route::get('/shto_punetore', [App\Http\Controllers\PunetoretController::class, 'addWorkerForm'])->name('punetor_shto');
	Route::post('/shto_punetore', [App\Http\Controllers\PunetoretController::class, 'shto'])->name('punetoret_shto');
	Route::get('/punetoret/{id}', [App\Http\Controllers\PunetoretController::class, 'get'])->name('ndrysho_punetor');
	Route::post('/ndrysho_punetor/{id}', [App\Http\Controllers\PunetoretController::class, 'ndrysho'])->name('punetor_ndrysho');

	Route::get('/depo', [App\Http\Controllers\DepoController::class, 'getAll'])->name('depo');
	Route::get('/depo_add_form', [App\Http\Controllers\DepoController::class, 'addForm'])->name('depo_add_form');
	Route::post('/depo_add', [App\Http\Controllers\DepoController::class, 'add'])->name('depo_add');

	Route::get('/transfero_form/{id}', [App\Http\Controllers\DepoController::class, 'transferoForm'])->name('transfero_form');
	Route::post('/transfero', [App\Http\Controllers\DepoController::class, 'transfero'])->name('transfero');

	Route::get('/shitjet', [App\Http\Controllers\ShitjetController::class, 'getAll'])->name('shitjet');
	Route::get('/shitjet/{id}', [App\Http\Controllers\ShitjetController::class, 'getOne'])->name('shitjet_one');
});

Route::group(['as' => 'user.', 'namespace' => 'User', 'prefix'=>'user', 'middleware'=>['auth', 'user']], 
function(){
	// Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');

	Route::get('/shitje_form/{id}', [App\Http\Controllers\ShitjetController::class, 'index'])->name('shitje_form');	
	Route::post('/shitje/{id}', [App\Http\Controllers\ShitjetController::class, 'shitje'])->name('shitje');	

	Route::get('/shitjet/{id}', [App\Http\Controllers\ShitjetController::class, 'getOne'])->name('shitjet');
	Route::post('/anulo_shitje/{id}', [App\Http\Controllers\ShitjetController::class, 'anulo'])->name('anulo_shitje');
});
