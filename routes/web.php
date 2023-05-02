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


// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ

    Route::get('/login', 'Auth\LoginController@login');
    Route::post('/login', 'Auth\LoginController@login');

    Route::get('/register', 'Auth\RegisterController@register');
    Route::post('/register', 'Auth\RegisterController@register');


    Route::get('/added', 'Auth\RegisterController@added');
    Route::post('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::group(['middleware' => 'auth'],function(){

    // 投稿取得
     Route::get('/top','PostsController@index');
     Route::post('posts/index','PostsController@create');

     Route::get('posts/update','PostsController@update');
     Route::post('posts/update','PostsController@update');
     Route::get('posts/{id}/delete','PostsController@delete');

    Route::post('/profile','UsersController@profile');
    Route::get('/profile','UsersController@profile');
    Route::post('/profile/update','UsersController@update');
    Route::get('/profile/{id}','UsersController@about');



    Route::get('/search','UsersController@index');
    // 検索機能
    Route::post('/search-result','UsersController@search');

    //フォロー機能
    Route::get('/search/{id}/follow','UsersController@follow');
    //フォロー解除
    Route::get('/search/{id}/remover','UsersController@remover');

    Route::get('/follow-list','PostsController@index');
    Route::get('/follower-list','PostsController@index');
    //上の手直し版
    Route::get('/follow-list','FollowsController@followList');
    Route::get('/follower-list','FollowsController@followerList');

    // プロフィールページへ
    Route::get('/follower-list/{id}/profile','FollowsController@profile');




    Route::get('/logout', 'Auth\LoginController@logout');
});
