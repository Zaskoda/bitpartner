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

Route::get('/monitor', 'MonitorController@index');
Route::get('/api/monitor', 'MonitorController@api');
Route::post('/monitor', 'MonitorController@update');
Route::get('/dump', 'DumpController@dump');
Route::get('/run-migrations', function () {
    return Artisan::call('migrate', ["--force"=> true ]);
});
Route::get('/daily', 'DailyAverageController@index');
Route::get('/daily/update', 'DailyAverageController@update');
Route::get('/hourly', 'HourlyAverageController@index');
Route::get('/hourly/update', 'HourlyAverageController@update');

Route::resource('/coins', 'CoinController');

Auth::routes();

Route::get('/setup', function() {
    $role = \Spatie\Permission\Models\Role::create(['name' => 'sysop']);
    $user = \App\User::where('email','=','zaskoda@gmail.com')->firstOrFail();
    $user->assignRole('sysop');
    return "created";
});

Route::group(['middleware' => ['role:sysop']], function () {
    Route::get('/test', function() {
        return "works";
    });
});

Route::get('/home', 'HomeController@index')->name('home');
