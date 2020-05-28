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

    use Illuminate\Support\Facades\Auth;

    Auth::routes();

    Route::get('/', 'IndexController@index')->name('main');

    // Create new paste
    Route::post('/create', 'PasteController@store');

    // Social media authorization
    Route::get('/vkauth', 'SocialUserController@vkauth')->name('vkauth');
    Route::get('/vkauth_callback', 'SocialUserController@vkauth_callback');

    // My Pastes page
    Route::get('/my-pastes/{page}', 'UserController@ViewMyPastes')->name('my-pastes');

    // Search
    Route::post('/search', 'PasteController@find')->name('search');

    // Display paste
    Route::get('/{hash}', 'PasteController@show');
