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

Route::get('monitor', 'MonitorController@index');
Route::get('api/monitor', 'MonitorController@api');
Route::post('monitor', 'MonitorController@update');
Route::get('dump', 'DumpController@dump');

Route::get('daily', 'DailyAverageController@index');
Route::get('hourly', 'HourlyAverageController@index');


Route::get('run-migrations', function () {
    return Artisan::call('migrate', ["--force"=> true ]);
});

Route::resource('coins', 'CoinController', ['only'=>['index','show']]);
Route::resource('blockchain-jobs', 'JobController', ['only'=>['index','show']]);
Route::resource('icos', 'ICOController', ['only'=>['index','show']]);
Route::resource('blockchain-platforms', 'PlatformController', ['only'=>['index','show']]);
Route::resource('decentralized-exchanges', 'ExchangeController', ['only'=>['index','show']]);

Route::middleware('auth')->group(function() { 
    
    Route::namespace('Admin')->prefix('admin')->group(function(){

        Route::middleware(['role:sysop|admin'])->group(function () {
            Route::get('/', 'DashboardController@index');
            Route::resource('coins', 'CoinController');
            Route::resource('blockchain-jobs', 'JobController');
            Route::resource('icos', 'ICOController');
            Route::resource('blockchain-platforms', 'PlatformController');
            Route::resource('decentralized-exchanges', 'ExchangeController');
        });

        Route::middleware(['role:sysop'])->group(function () {
            Route::resource('users', 'UserController');
            Route::resource('roles', 'RoleController');
        });
    });

    Route::middleware(['role:sysop'])->group(function () {
        Route::get('hourly/update-all', 'HourlyAverageController@update');
        Route::get('daily/update-all', 'DailyAverageController@update');
    });
    
});



Auth::routes();

Route::get('setup-zaskoda', function() {
    $role = \Spatie\Permission\Models\Role::create(['name' => 'sysop']);
    $user = \App\User::where('email','=','zaskoda@gmail.com')->firstOrFail();
    $user->assignRole('sysop');
    return "created";
});

Route::get('/home', 'HomeController@index')->name('home');
