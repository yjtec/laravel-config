<?php 
Route::get('/config/','Yjtec\Config\Controllers\IndexController@index');
Route::post('/config/','Yjtec\Config\Controllers\IndexController@store');