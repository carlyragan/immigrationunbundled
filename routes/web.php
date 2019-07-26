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
	return view('temp1.home');
});
Auth::routes();

Route::get('/immigrant/create', 'ImmigrantController@create')->name('immigrant.create')->middleware('guest');
Route::get('/immigrant/login', 'ImmigrantController@login')->name('immigrant.login')->middleware('guest');
Route::post('/immigrant/store', 'RegisterController@store')->name('immigrant.store');

Route::get('/login', function () {
	return redirect(route('immigrant.login'));
})->name('login');

Route::middleware(['auth'])->group(function () {
	Route::get('/immigrant/step1', 'ImmigrantController@step1')
		->name('immigrant.step1')
		->middleware(['step.save', 'step.move']);

	Route::post('/immigrant/savestep1', 'ImmigrantController@savestep1')->name('immigrant.savestep1');

	Route::get('/immigrant/step2', 'ImmigrantController@step2')
		->name('immigrant.step2')
		->middleware('step.save');

	Route::get('/immigrant/step3', 'ImmigrantController@step3')
		->name('immigrant.step3')
		->middleware('step.save');

	Route::get('/immigrant/step4', 'ImmigrantController@step4')
		->name('immigrant.step4')
		->middleware('step.save');

	Route::get('/immigrant/step5', 'ImmigrantController@step5')
		->name('immigrant.step5')
		->middleware('step.save');

	Route::post('/immigrant/saveUploads', 'ImmigrantController@saveUploads')
		->name('immigrant.saveUploads')
		->middleware('step.save');

	Route::post('/immigrant/saveUploads2', 'ImmigrantController@saveUploads2')
		->name('immigrant.saveUploads2')
		->middleware('step.save');

	Route::get('/immigrant/recalculate', 'ImmigrantController@recalc')
		->name('immigrant.recalc')
		->middleware('step.save');

	Route::get('/immigrant/users', 'UserController@usersList')
		->name('immigrant.users')
		->middleware('step.save');
	Route::post('/immigrant/edit/{id}', 'UserController@edit')
		->name('immigrant.users.edit')
		->middleware('step.save');
	Route::get('/immigrant/detail/{id}', 'UserController@detail')
		->name('immigrant.users.detail')
		->middleware('step.save');
	Route::get('/immigrant/delete/{id}', 'UserController@delete')
		->name('immigrant.users.delete')
		->middleware('step.save');

	Route::get('/immigrant/docs', 'DocumentController@docs')
		->name('immigrant.docs')
		->middleware('step.save');

});

Route::get('/immigrant/book', 'ImmigrantController@calendy')
	->name('immigrant.calendy')
	->middleware('step.save');

Route::get('/immigrant/payment', 'StripePaymentController@stripe')->name('immigrant.payment');
Route::post('/immigrant/paymentPost', 'StripePaymentController@stripePost')->name('immigrant.paymentPost');
Route::get('/immigrant/success', 'StripePaymentController@success')->name('immigrant.success');
