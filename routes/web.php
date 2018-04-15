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

Route::get('sensors', 'SensorsController@index');
Route::get('sensors/{id}', 'SensorsController@show');


Route::get('monitor', 'MonitorController@index');
Route::get('api/monitor', 'MonitorController@api');
Route::get('api/sensors/store-reading', 'Api/SensorController@storeReading');
Route::post('monitor', 'MonitorController@update');
Route::get('dump', 'DumpController@dump');

Route::get('monitor/daily', 'DailyAverageController@index');
Route::get('monitor/hourly', 'HourlyAverageController@index');


Route::get('run-migrations', function () {
    Artisan::call('migrate', ["--force"=> true ]);
    return "migrated...";
});

Route::get('fix-stuff', function () {
    App\Sensor::fixStuff();
    return "fixed...";
});

Route::resource('articles', 'ArticleController', ['only'=>['index','show']]);
Route::resource('coins', 'CoinController', ['only'=>['index','show']]);
Route::resource('blockchain-jobs', 'JobController', ['only'=>['index','show']]);
Route::resource('icos', 'ICOController', ['only'=>['index','show']]);
Route::resource('blockchain-platforms', 'PlatformController', ['only'=>['index','show']]);
Route::resource('decentralized-exchanges', 'ExchangeController', ['only'=>['index','show']]);

Route::middleware('auth')->group(function() { 
    
    Route::namespace('Admin')->prefix('admin')->group(function(){

        Route::middleware(['role:sysop|admin'])->group(function () {
            Route::namespace('Api')->prefix('api')->group(function(){
                Route::resource('images', 'ImageController');
            });
            Route::get('/', 'DashboardController@index');
            Route::resource('images', 'ImageController');
            Route::resource('pages', 'PageController');
            Route::resource('articles', 'ArticleController');
            Route::resource('sensors', 'SensorController');
            Route::get('sensors/{id}/refresh-token', 'SensorController@refreshToken');
            Route::resource('coins', 'CoinController');
            Route::resource('blockchain-jobs', 'JobController');
            Route::resource('icos', 'ICOController');
            Route::resource('blockchain-platforms', 'PlatformController');
            Route::resource('decentralized-exchanges', 'ExchangeController');
            //Route::resource('monitors', 'MonitorsController');
        });

        Route::middleware(['role:sysop'])->group(function () {
            Route::resource('users', 'UserController');
            Route::resource('roles', 'RoleController');
            Route::get('monitor/hourly/update-all', 'HourlyAverageController@update');
            Route::get('monitor/daily/update-all', 'DailyAverageController@update');
            });
    });
   
});

Route::get('/rpi-mine-monitor-how-to', function () {
    $page = \App\Page::where('slug','=','rpi-mine-monitor-how-to')->firstOrFail();
    return view('page')->with(['page'=>$page]);
});


Auth::routes();

Route::get('setup-zaskoda', function() {
    $role = \Spatie\Permission\Models\Role::create(['name' => 'sysop']);
    $user = \App\User::where('email','=','zaskoda@gmail.com')->firstOrFail();
    $user->assignRole('sysop');
    return "created";
});

Route::get('/home', 'HomeController@index')->name('home');
