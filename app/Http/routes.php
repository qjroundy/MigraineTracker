<?php 
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Homepage
Route::get('/', function(){
 return view('welcome');   
});

Route::group(['middleware' => 'auth'], function(){
    //Medicine Routes
    Route::resource('medicine', 'MedicineController');

    // Trigger routes
    Route::resource('trigger', 'TriggerController');

    // Journal Routes
    Route::resource('journal', 'JournalController');

    // User Routes
    Route::resource('user', 'UserController');
    Route::get('user/settings/{user}', 'UserController@settings');

    // Note Routes
    Route::resource('note', 'NoteController');

    Route::get('report/generate', 'ReportController@create');
    Route::get('report/{id}', 'ReportController@show');
    Route::get('report', 'ReportController@index');

});

// API Routes
Route::group(['prefix' => 'api'], function () {
    // Triggers
    Route::get('triggers','ApiController@showTriggers');
    Route::post('triggers','ApiController@createTrigger');
    Route::post('triggers/{trigger}/destroy','ApiController@destroyTrigger');

    // Medicines
    Route::get('medicines','ApiController@showMedicines');
    Route::post('medicines','ApiController@createMedicine');
    Route::post('medicines/{medicine}/destroy','ApiController@destroyMedicine');
});

// Authentication Routes
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

//Page Routes
Route::get('home', 'PagesController@dashboard');
Route::get('privacy', 'PagesController@privacy');
Route::get('terms', 'PagesController@terms');
Route::get('about', 'PagesController@about');


// http://bfy.tw/2lbd
Route::get('sandbox', 'SandboxController@index');