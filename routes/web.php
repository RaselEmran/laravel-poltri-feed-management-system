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
 Route::get('/logout','SuperAdminController@logout')->name('logout');

Route::get('/','AdminController@index');

Route::post('/admin/login','AdminController@login')->name('admin.login');

Route::group(['as'=>'admin.','prefix'=>'admin','middleware' => ['Admin']], function(){
     Route::get('/dashboard','AdminController@showdashbord')->name('dashboard');
     Route::get('/profile','AdminController@profile')->name('profile');
     Route::post('/profile-from/{id}','AdminController@profile_from')->name('profile-from');
     Route::get('/change','AdminController@change')->name('change');
     Route::post('/sett/change','AdminController@pass');
     Route::post('/pass-change/{id}','AdminController@pass_change')->name('pass-change');

     //........customer
     Route::get('/customer','BuyerController@index')->name('customer');
     Route::post('/customer/store','BuyerController@store')->name('customer.store');
     Route::post('/customer/edit','BuyerController@edit')->name('customer.edit');
     Route::post('/customer/update','BuyerController@update')->name('customer.update');
     Route::get('/customer/delete/{id}','BuyerController@delete')->name('customer.delete');
     Route::get('/customer/view/{id}','BuyerController@view')->name('customer.view');
     Route::get('/customer/urinvoice/{id}','BuyerController@urinvoice')->name('urinvoice');
     Route::get('/customer/end-calan/{id}','SellController@end_calan')->name('end-calan');
     Route::post('/sell.sell-end-store','SellController@end_store')->name('sell.sell-end-store');
     Route::post('/save-cash','CashController@save_cash')->name('save-cash');
     Route::post('/customer/end-sellcalan','CalanController@end_sellcalan')->name('customer.sells-end');
     //....calan
     Route::post('/add-calan','CalanController@add_calan')->name('add-calan');
     Route::get('/view-calan/{bid}/calan/{cid}','CalanController@view_calan');

     //....category
     Route::get('/category','CategoryController@index')->name('category');
     Route::post('/category/store','CategoryController@store')->name('category.store');
     Route::post('/category/edit','CategoryController@edit');
     Route::post('/category/update','CategoryController@update')->name('category.update');
     Route::get('/category/delete/{id}','CategoryController@delete')->name('category.delete');



     //....pos
     Route::get('/sell/product-print','PrintController@reg_print')->name('sell.product-print');
     Route::get('/sell-product/regular','SellController@index')->name('sell-product.regular');
     Route::get('/sell-product/regular-cust','SellController@regular')->name('sell-product.regular-cust');
     Route::post('/sell/regcusstore','SellController@regcusstore')->name('sell.regcusstore');
     Route::post('/regsell/invoice','SellController@reg_invoice');
     Route::post('regsell/cust-name','SellController@cust_invoice');
     Route::post('/sell/regstore','SellController@reg_store')->name('sell.regstore');

     //reregular...
     Route::get('/sell/mob-product-print','PrintController@mobile_print');
     Route::get('/sell-product/mobile','SellController@mobile')->name('sell-product.mobile');
     Route::post('/sell-product/mobstore','SellController@mobstore')->name('sell.mobstore');

     //sell info

     Route::get('/sellinfo/items','SellController@sell_items')->name('sellinfo');
     Route::get('/allsellinfo/items','SellController@allsellinfo')->name('allsellinfo');
     Route::get('/admin/mobile-view/{id}','PrintController@mobile_view')->name('mobile-view');
     Route::get('/admin/regular-view/{id}','PrintController@regular_view')->name('regular-view');
     Route::get('/sellinfo/print/{id}','PrintController@print')->name('sellinfo.print');

     //statement customer

     Route::get('/statement/{id}','StatementController@statement')->name('statement');

     //cash............
     Route::get('/customer/view-cash/{id}','CashController@view_cash')->name('view-cash');
     Route::post('/save-profile_deposit','CalanController@save_profile_deposit')->name('save-profile_deposit');
     Route::post('/save-jer_profile','CalanController@save_jer_profile')->name('save-jer_profile');
     Route::post('/save-profile_withdraw','CalanController@save_profile_withdraw')->name('save-profile_withdraw');




Route::get('/calan-print/{id}','PrintController@calan_print')->name('calan_print');


	});


// Route::get('/', function () {
//     return view('admin.main');
// });
