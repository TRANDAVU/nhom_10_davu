<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([/*'middleware'=>'auth:api'*/],function (){

	Route::post('/register','Api\jsonusercontroller@register');
	Route::post('/login','Api\jsonusercontroller@login');
	Route::put('/change/{id}','Api\jsonusercontroller@change');
	Route::delete('/delete/{id}','Api\jsonusercontroller@delete');

	Route::get('/toppr','Api\jsonproductcontroller@toppr');
	Route::get('/product','Api\jsonproductcontroller@product');
	Route::get('/categorypr/{id}','Api\jsonproductcontroller@categorypr');
	Route::post('/addpr','Api\jsonproductcontroller@addpr');
	Route::put('/changepr/{id}','Api\jsonproductcontroller@changepr');
	Route::delete('/deletepr/{id}','Api\jsonproductcontroller@deletepr');

	Route::get('/slide','Api\jsonslidecontroller@slide');
	Route::post('/addslide','Api\jsonslidecontroller@addslide');
	Route::put('/changeslide/{id}','Api\jsonslidecontroller@changeslide');
	Route::delete('/deleteslide/{id}','Api\jsonslidecontroller@deleteslide');

	Route::post('/dkshop','Api\jsonshopcontroller@dkshop');
	Route::get('/xemspshop/{id}','Api\jsonshopcontroller@xemspshop');
	Route::get('/dsshop','Api\jsonshopcontroller@dsshop');
		
	Route::post('/addcart', 'Api\giohangapicontrolers@save_cart');
	Route::post('/deletecart', 'Api\giohangapicontrolers@deletecart');
	Route::post('/updatecart', 'Api\giohangapicontrolers@updatecart');

	Route::get('/lohangs/{idshop}','Api\lohangcontrolers@lohangs');
	Route::post('/addlohangs','Api\lohangcontrolers@addlohangs');
	Route::put('/changelohangs/{id}','Api\lohangcontrolers@changelohangs');
	Route::delete('/deletelohangs/{id}','Api\lohangcontrolers@deletelohangs');
});
	
