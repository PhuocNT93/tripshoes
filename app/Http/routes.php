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
Route::group([ 'namespace' => 'Frontend' ], function () {
	/*Log in with access code and email*/
	Route::post('/postLogin', 'AuthController@postLogin');
	
	Route::post('/postRegister', 'UserController@postRegister');
	Route::get('/sendusemail', 'HomeController@contact');
	Route::post('/postSendCode', 'HomeController@postSendCode');
	Route::get('/signup', 'HomeController@signup');
	Route::get('/', 'HomeController@index');//21,22,1,11,5
	Route::post('/sendEmailChangePassword','PasswordController@sendEmailChangePassword');
	Route::get('/resetPassword', 'PasswordController@resetPassword');
	Route::post('/postResetPassword', 'PasswordController@postResetPassword');
	/*Log out*/
	Route::get('/logout', 'UserController@logout');
	/*Trip*/
	Route::get('/trip',['as' => 'trip','uses' => 'TripController@index']);
	Route::get('/trip/{id}',['uses' => 'TripController@show']);
	/*Profile with ajax*/
	Route::get('/profile',['as' =>'profile', 'uses' => 'UserController@getprofile']);
	Route::post('profile/avatar/', ['as' => 'profile.upload', 'uses' => 'UserController@upload']);
	/*My booking*/
	Route::get('bookings', ['as' => 'booking.index', 'uses' => 'MyBookingController@index']);
	Route::get('bookings/{id}', ['as' => 'booking.show', 'uses' => 'MyBookingController@show']);
	/*Information website*/
	Route::get('about',['as' => 'about', 'uses' => 'InfoController@about']);
	Route::get('support',['as' => 'support', 'uses' => 'InfoController@support']);
	/*Blog*/
	Route::get('/blog',['as' => 'blog.index', 'uses' => 'BlogController@index']);
	Route::get('/blog/{id}', ['as' => 'blog.article', 'uses' => 'BlogController@article']);
});


Route::get('/trip1', function(){
	$banner = false;
	$text_banner = '';
	return view('frontend.trips_checkout_1', compact('banner', 'text_banner'));
});
Route::get('/trip2', function(){
	$banner = false;
	$text_banner = '';
	return view('frontend.trips_checkout_2', compact('banner', 'text_banner'));
});
Route::get('/trip3', function(){
	$banner = false;
	$text_banner = '';
	return view('frontend.trips_checkout_3', compact('banner', 'text_banner'));
});
