<?php

Route::get('/', function () {
    return view('auth.login');
});


Route::resource('login','LoginController');
Route::resource('products', 'ProductController');
Route::resource('routes', 'RouteController');
Route::resource('customers', 'CustomerController');
Route::resource('employees', 'EmployeeController');
Route::resource('orders', 'OrderController');
Route::resource('deliveries', 'DeliverieController');
Route::resource('dashboards', 'DashboardController');

Route::resource('eroutes', 'ERouteController');
Route::resource('ecustomers', 'ECustomerController');
Route::resource('eorders', 'EOrderController');


Route::get('products/{id}/destroy', ['uses' => "ProductController@destroy", 'as' => 'products.destroy']);
Route::get('routes/{id}/destroy', ['uses' => "RouteController@destroy", 'as' => 'routes.destroy']);
Route::get('employees/{id}/destroy', ['uses' => "EmployeeController@destroy", 'as' => 'employees.destroy']);
Route::get('customers/{id}/destroy', ['uses' => "CustomerController@destroy", 'as' => 'customers.destroy']);
Route::get('orders/{id}/destroy', ['uses' => "OrderController@destroy", 'as' => 'orders.destroy']);