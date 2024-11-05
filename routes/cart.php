<?php

use Illuminate\Support\Facades\Route;
    Route::get('add/{id}','Frontend\ShoppingCartController@add')->name('get.shopping.add');
    Route::group(['namespace'=>'Frontend','middleware'=>'auth'], function () {
        Route::get('don-hang','ShoppingCartController@index')->name('get.shopping.index')->middleware('auth');
            Route::prefix('shopping') ->group(function(){
            Route::get('delete/{id}','ShoppingCartController@delete')->name('get.shopping.delete');
            Route::get('update/{id}','ShoppingCartController@update')->name('ajax_get.shopping.update');
            Route::post('pay','ShoppingCartController@postPay')->name('post.shopping.pay');
        });
});