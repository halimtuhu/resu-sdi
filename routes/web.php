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

Route::get('/', 'HomeController@index');

Auth::routes([
    'register' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/work-order', 'WorkOrderController@index')->name('work-order.index');
Route::get('/work-order/closed', 'WorkOrderController@closed')->name('work-order.closed');
Route::get('/work-order/create', 'WorkOrderController@create')->name('work-order.create');
Route::post('/work-order', 'WorkOrderController@store')->name('work-order.store');
Route::get('/work-order/{id}', 'WorkOrderController@show')->name('work-order.show');
Route::get('/work-order/{id}/edit', 'WorkOrderController@edit')->name('work-order.edit');
Route::put('/work-order/{id}', 'WorkOrderController@update')->name('work-order.update');
Route::get('/work-order/{id}/delete', 'WorkOrderController@delete')->name('work-order.delete');

Route::get('/admin-management', 'AdminManagementController@index')->name('admin-management.index');
Route::get('/admin-management/create', 'AdminManagementController@create')->name('admin-management.create');
Route::post('/admin-management', 'AdminManagementController@store')->name('admin-management.store');
Route::get('/admin-management/{id}/edit', 'AdminManagementController@edit')->name('admin-management.edit');
Route::put('/admin-management/{id}', 'AdminManagementController@update')->name('admin-management.update');
Route::delete('/admin-management/{id}/delete', 'AdminManagementController@delete')->name('admin-management.delete');

Route::get('/technician-management', 'TechnicianManagementController@index')->name('technician-management.index');
Route::get('/technician-management/create', 'TechnicianManagementController@create')->name('technician-management.create');
Route::post('/technician-management', 'TechnicianManagementController@store')->name('technician-management.store');
Route::get('/technician-management/{id}/edit', 'TechnicianManagementController@edit')->name('technician-management.edit');
Route::put('/technician-management/{id}', 'TechnicianManagementController@update')->name('technician-management.update');
Route::delete('/technician-management/{id}/delete', 'AdminManagementController@delete')->name('technician-management.delete');

Route::get('/mail', 'MailingController@mail');
