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
/*
Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
*/



Route::auth();

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');


Route::get('/sections/index', 'SectionController@index');
Route::get('/sections/edit/{section_id}', 'SectionController@editGet');
Route::post('/sections/edit', 'SectionController@editPost');
Route::get('/sections/delete/{section_id}', 'SectionController@delete');

Route::post ( '/sections/create', 'SectionController@create' );


Route::get('/subsection/index/{section_id}', 'SubSectionController@index');
Route::post ( '/subsections/create', 'SubSectionController@create' );
Route::get('/subsection/edit/{subsection_id}', 'SubSectionController@editGet');
Route::post('/subsection/edit', 'SubSectionController@editPost');
Route::get('/subsection/delete/{section_id}/{subsection_id}', 'SubSectionController@delete');

Route::get('/bills/all', 'BillsController@getBills');

Route::get('/bills','BillsController@index');

Route::get('/bills/add/{section_id}', 'BillsController@addSectionToBill');

Route::get('/bills/bill', 'BillsController@createBill');

Route::post('/bills/create', 'BillsController@create');

Route::get('/bills/print/{bill_id}', 'BillsController@printBill');

Route::get('/bills/print2/{bill_id}', 'BillsController@printBill2');


Route::get('/customers/index', 'CustomerController@index');
Route::get('/customer/add', 'CustomerController@add');

Route::get('/customer/edit/{customer_id}', 'CustomerController@editGet');
Route::get('/customer/delete/{customer_id}', 'CustomerController@delete');

Route::get('/customer/details/{customer_id}', 'CustomerController@customerDetails');

Route::post('/customer/create', 'CustomerController@create' );
Route::post('/customer/edit', 'CustomerController@editPost');

Route::get('/payment', 'BillsController@pymentPage');
Route::post('/payment/create', 'BillsController@createPayment');


Route::get('/bill/delete/{bill_id}/{customer_id}', 'BillsController@deleteBill');
