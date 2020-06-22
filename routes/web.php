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


Route::get('/about', function () {
    return view('app.about');
});

Route::get('/contact', "ContactMessageController@create");
Route::post('Invoice', [
    'uses' => 'ContactMessageController@store',
    'as' => 'contact.store'
]);
Route::get('/', 'PhotoController@index');
Route::post('/views', "PhotoController@views");
Route::get('/video_world', "PhotoController@video_world");
Route::get('/app/gallery_media/{id}', 'PhotoController@index1');

Route::get('/galeries', "GalleryController@index2");


Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/photos/upload_p', 'PhotoController@upload');
    Route::post('/photos/upload_p', 'PhotoController@store');
    Route::post('/photos/updatePhoto/{id}', 'PhotoController@update');
    Route::get('/photos/edit_photo/{id}', 'PhotoController@edit');
    Route::post('/photos/destroy/{id}', 'PhotoController@destroy');

    Route::post('/admin/updateSite/{id}', 'SiteController@update');
    Route::get('/edit_site/{id}', 'SiteController@edit');
    Route::get('/all_sliders', 'SliderController@index');
    Route::get('/add_slider', 'SliderController@create');
    Route::post('/add_slider', 'SliderController@store');

    Route::post('/updateSlider/{id}', 'SliderController@update');
    Route::get('/edit_slider/{id}', 'SliderController@edit');

    Route::post('/albums/delete/{id}', 'GalleryController@destroy');
    Route::post('/albums/updateAlbum/{id}', 'GalleryController@update');
    Route::get('/albums/edit_album/{id}', 'GalleryController@edit');
    Route::get('/create', 'GalleryController@create');
    Route::get('/albums/all_albums', 'GalleryController@index');
    Route::get('/albums/{id}', 'GalleryController@show');
    Route::post('/create', 'GalleryController@store');
});

Route::resource('posts', 'PostsController');
Route::get('/dashboard', 'DashboardController@index');
Route::get('/services', "PagesController@services");
Route::post('/posts/{post}/comments' , 'CommentController@store');
