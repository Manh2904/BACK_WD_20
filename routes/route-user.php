<?php

Route::group(['prefix'=>'user','namespace'=>'User','middleware'=>'check_user_login'],function(){
        Route::get('','UserController@index')->name('get.user.index');
        Route::get('profile','UserController@profile')->name('get.user.profile');

        Route::post('ajax_favourite/{idProduct}','UserFavouriteController@addFavourite')->name('ajax_get.user.favourite');
 
        Route::post('ajax_rating','UserRatingController@RatingProduct')->name('ajax_post.user.rating.add');


        Route::get('favourite','UserFavouriteController@index')->name('get.user.favourite');

        Route::get('edit','UpdateUserController@edit')->name('get.user.edit');
        Route::post('edit ','UpdateUserController@store');
        Route::get('change_password','UpdateUserController@change_password')->name('get.user.change_password');
        Route::post('change_password','UpdateUserController@store');

        Route::get('address','UserController@address')->name('get.user.address');
        Route::get('new_address','UpdateUserController@new_address')->name('get.user.new_address');
        Route::post('new_address ','UpdateUserController@store');
        Route::get('edit_address','UpdateUserController@edit_address')->name('get.user.edit_address');
        Route::post('edit_address ','UpdateUserController@store');

        Route::get('orders','UserController@orders')->name('get.user.orders');
        Route::get('cancellation','OrdersUserController@cancellations')->name('get.user.cancellations');
        Route::get('cancellation-orders','OrdersUserController@cancellation_orders')->name('get.user.cancellation_orders');

});
?>
