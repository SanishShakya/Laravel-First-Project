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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('backend/')->namespace('Backend')->name('backend.')->group(function (){
    /*route for tag controller*/
    Route::get('tag/create','TagController@create')->name('tag.create');
    Route::post('tag','TagController@store')->name('tag.store');
    Route::get('tag','TagController@index')->name('tag.index');
    Route::get('tag/{id}','TagController@show')->name('tag.show');
    Route::delete('{id}/tag','TagController@destroy')->name('tag.destroy');
    Route::get('tag/{id}/edit','TagController@edit')->name('tag.edit');
    Route::put('tag/{id}','TagController@update')->name('tag.update');
    /*route for category controller*/
    Route::get('category/create','CategoryController@create')->name('category.create');
    Route::post('category','CategoryController@store')->name('category.store');
    Route::get('category','CategoryController@index')->name('category.index');
    Route::get('category/{id}','CategoryController@show')->name('category.show');
    Route::delete('{id}/category','CategoryController@destroy')->name('category.destroy');
    Route::get('category/{id}/edit','CategoryController@edit')->name('category.edit');
    Route::put('category/{id}','CategoryController@update')->name('category.update');
    /*route for role controller*/
    Route::get('role/create','RoleController@create')->name('role.create');
    Route::post('role','RoleController@store')->name('role.store');
    Route::get('role','RoleController@index')->name('role.index');
    Route::get('role/{id}','RoleController@show')->name('role.show');
    Route::delete('{id}/role','RoleController@destroy')->name('role.destroy');
    Route::get('role/{id}/edit','RoleController@edit')->name('role.edit');
    Route::put('role/{id}','RoleController@update')->name('role.update');
    /*route for unit controller*/
    Route::get('unit/create','UnitController@create')->name('unit.create');
    Route::post('unit','UnitController@store')->name('unit.store');
    Route::get('unit','UnitController@index')->name('unit.index');
    Route::get('unit/{id}','UnitController@show')->name('unit.show');
    Route::delete('{id}/unit','UnitController@destroy')->name('unit.destroy');
    Route::get('unit/{id}/edit','UnitController@edit')->name('unit.edit');
    Route::put('unit/{id}','UnitController@update')->name('unit.update');
    /*route for subcategory controller*/
    Route::get('subcategory/create','SubcategoryController@create')->name('subcategory.create');
    Route::post('subcategory','SubcategoryController@store')->name('subcategory.store');
    Route::get('subcategory','SubcategoryController@index')->name('subcategory.index');
    Route::get('subcategory/{id}','SubcategoryController@show')->name('subcategory.show');
    Route::delete('{id}/subcategory','SubcategoryController@destroy')->name('subcategory.destroy');
    Route::get('subcategory/{id}/edit','SubcategoryController@edit')->name('subcategory.edit');
    Route::put('subcategory/{id}','SubcategoryController@update')->name('subcategory.update');
    /*route for product controller*/
    Route::get('product/create','ProductController@create')->name('product.create');
    Route::post('product','ProductController@store')->name('product.store');
    Route::get('product','ProductController@index')->name('product.index');
    Route::get('product/{id}','ProductController@show')->name('product.show');
    Route::delete('{id}/product','ProductController@destroy')->name('product.destroy');
    Route::get('product/{id}/edit','ProductController@edit')->name('product.edit');
    Route::put('product/{id}','ProductController@update')->name('product.update');
    /*route for module controller*/
    Route::get('module/create','ModuleController@create')->name('module.create');
    Route::post('module','ModuleController@store')->name('module.store');
    Route::get('module','ModuleController@index')->name('module.index');
    Route::get('module/{id}','ModuleController@show')->name('module.show');
    Route::delete('{id}/module','ModuleController@destroy')->name('module.destroy');
    Route::get('module/{id}/edit','ModuleController@edit')->name('module.edit');
    Route::put('module/{id}','ModuleController@update')->name('module.update');
    /*route for permission controller*/
    Route::get('permission/create','PermissionController@create')->name('permission.create');
    Route::post('permission','PermissionController@store')->name('permission.store');
    Route::get('permission','PermissionController@index')->name('permission.index');
    Route::get('permission/{id}','PermissionController@show')->name('permission.show');
    Route::delete('{id}/permission','PermissionController@destroy')->name('permission.destroy');
    Route::get('permission/{id}/edit','PermissionController@edit')->name('permission.edit');
    Route::put('permission/{id}','PermissionController@update')->name('permission.update');
});


