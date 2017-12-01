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

Route::get('/', 'ChartController@viewchart');
Route::get('/dashboard', 'ChartController@viewchart');

Route::get('/dashboard/{interval}/{transaction}}', 'ChartController@viewChart');


Route::get('/clients', 'ClientController@getClientbyID');
Route::get('/client/{id}','ChartController@getSalesChart');

Route::get('/client/overview/{id}', 'ClientController@getCharts');
Route::get('/overview', 'ChartController@viewchart');

Route::get('/login', function () {
    return view('login');
});
Route::get('/goal/{id}', 'GoalMetersController@getGoal');

Route::get('/sales', function(){
    return view('salesperson');
});

Route::get('/demo', function (){
    return view('demo');
});
Route::post('/demo/transact', 'TransactionController@transact');


Route::post('/control_user/login', 'ControlUserController@login');
Route::post('/control_user/signup', 'ControlUserController@signup');
Route::get('/control_user/logout', 'ControlUserController@logout');


Route::get('/control_user/token/{id}', 'ControlUserController@getToken');
Route::post('/control_user/token', 'ControlUserController@updateToken');

Route::post('/sales_person/login', 'SalesPersonController@login');
Route::post('/sales_person/signup', 'SalesPersonController@signup');

Route::get('/sales_person/token/{id}', 'SalesPersonController@getToken');
Route::post('/sales_person/token', 'SalesPersonController@updateToken');

Route::get('/notify', function () {
    return view('notify');
});
Route::post('/notification/send', 'NotificationController@sendNotification');

Route::get('/message/{id}', function () {
    return view('message');
});

Route::post('/message/send/sp', 'MessageController@sendToSalesPerson');
Route::post('/message/send/cu', 'MessageController@sendToControlUser');
Route::post('/conversation', 'ConversationController@getConversation');