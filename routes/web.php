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

// front end route

Route::get('/', function () {
    return view('frontend/index');
});

Route::get('/myaccount', function () {
    return view('frontend/myaccount');
});

Route::resource('campaigns', 'CampaignController');

// front end auth

Route::auth();

// Tracking route

Route::get('/{phoneNum}/{message}', 'MessageController@messageWhatsapp')->where('phoneNum', '[\d+]+');

// Admin Interface Routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
{
   CRUD::resource('location', 'Admin\LocationCrudController');
});