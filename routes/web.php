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

Route::get('/dashboard', 'ChartController@viewchart2');

Route::get('/dashboard/{transaction}/{interval}}', 'ChartController@viewChart');

Route::get('/login', function () {
    return view('login');
});

Route::post('/control_user/login', 'ControlUserController@login');
Route::post('/control_user/signup', 'ControlUserController@signup');
Route::get('/control_user/logout', 'ControlUserController@logout');

Route::post('/sales_person/login', 'SalesPersonController@login');
Route::post('/sales_person/signup', 'SalesPersonController@signup');

Route::get('/notify', function () {
    return view('notify');
});

Route::get('/message/{id}', function () {
    return view('message');
});

Route::post('/message/send/sp', 'MessageController@sendToSalesPerson');
Route::post('/message/send/cu', 'MessageController@sendToControlUser');
Route::post('/conversation', 'ConversationController@getConversation');