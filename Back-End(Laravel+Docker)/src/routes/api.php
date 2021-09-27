<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', 'ApiAuthController@login')->name('api.login');
Route::post('/register', 'ApiAuthController@register')->name('api.register');


Route::get('/authorize/{provider}/redirect', 'ApiSocialAuthController@redirectToProvider')->name('api.social.redirect');
Route::get('/authorize/{provider}/callback', 'ApiSocialAuthController@handleProviderCallback')->name('api.social.callback');

// Route::post('/register', 'ApiUserController@register');
// Route::post('/login', 'ApiUserController@login');
// Route::get('/user', 'ApiUserController@userInfo')->middleware('auth:api');
Route::resource('/post', 'ApiPostController')->middleware('auth:api');
Route::get('/current', 'ApiUserController@currentUser')->middleware('auth:api');
// CATEGORIES ::: -------------------------------------------------------------------------
Route::resource('/categories', 'ApiCategoriesController');
Route::resource('/details-categories', 'ApiCategoriesController');
Route::get('product-of-category/{id}', 'ApiCategoriesController@getProductOfCategory');
Route::resource('/add-categories', 'ApiCategoriesController')->middleware('auth:api');
Route::resource('/delete-categories', 'ApiCategoriesController')->middleware('auth:api');
Route::resource('/update-categories', 'ApiCategoriesController')->middleware('auth:api');
//

//PRODUCT ::: ---------------------------------------------------------------------------
Route::resource('/product', 'ApiProductsController');
Route::resource('/details-product', 'ApiProductsController');
Route::resource('/add-product', 'ApiProductsController')->middleware('auth:api');
Route::resource('/delete-product', 'ApiProductsController');
Route::delete('/delete-all-product', 'ApiProductsController@destroyAll');
//

//CART ::: ----------------------------------------------
Route::resource('/cart', 'ApiCartController');
Route::resource('/add-cart', 'ApiCartController');
Route::resource('/delete-cart', 'ApiCartController');
Route::delete('/delete-all-cart', 'ApiCartController@destroyAll');

//CONTACT ::: ----------------------------------------
Route::resource('/contact', 'ApiContactController');
Route::resource('/add-contact','ApiContactController');
Route::resource('/details-contact','ApiContactController');
Route::resource('/delete-contact', 'ApiContactController');
Route::delete('/delete-all-contact', 'ApiContactController@destroyAll');
Route::resource('/update-contact', 'ApiContactController');
//COUPON ::: ---------------------------------------------
Route::resource('/coupon', 'ApiCouponController');
Route::resource('/add-coupon', 'ApiCouponController');