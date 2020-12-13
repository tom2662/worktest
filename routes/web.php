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
    return view('welcome');
});

Route::get('/upload', 'TestController@fileUpload')->name('upload');
Route::post('/uploadprocess', 'TestController@fileUploadProcess');
Route::get('/mouseover', 'TestController@mouseOver')->name('mouseover');
Route::post('/mouseoverresult', 'TestController@mouseOverResult');
Route::get('/advancedtable', 'TestController@advancedTable')->name('advancedtable');
Route::get('/multiarray', 'TestController@multiArray');
Route::get('/optimize', 'TestController@optimizeQuery');
Route::get('/recordshowall','TestController@recordsShowAll');