<?php

use Illuminate\Support\Facades\Auth;

Route::get('/a/users', function (App\Entities\User $user) {
    dd($user::all());
});

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Users\Http\Controllers'], function () {
    Auth::routes();
	Route::group(['middleware' => 'auth'], function () {
        Route::resource('projects', 'ProjectController');
        Route::resource('tasks', 'TaskController');

        Route::get('/home', 'HomeController@getHomePage')->name('home');
		Route::post('/home', 'HomeController@postEditUser')->name('home.post');

        Route::group(['prefix' => 'payment'], function () {
            Route::get('/error', 'PaymentController@error')->name('payment.error');
            Route::get('/success', 'PaymentController@success')->name('payment.success');
            Route::any('/callback', 'PaymentController@callback')->name('payment.callback');
            Route::get('/test', 'PaymentController@test')->name('payment.test');
        });

        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', 'ProfileController@index')->name('profile');
            Route::put('/change_email', 'ProfileController@update_email')->name('profile.update_email');
            Route::put('/change_avatar', 'ProfileController@update_avatar')->name('profile.update_avatar');
            Route::put('/change_name', 'ProfileController@update_name')->name('profile.update_name');
        });
	});
});
