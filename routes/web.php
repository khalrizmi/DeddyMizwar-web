<?php


Route::get('/', function () {
    return view('index');
});

Route::resource('profile', 'ProfileController');
Route::resource('activity', 'ActivityController');
Route::resource('gallery', 'GalleryController');
Route::resource('video', 'VideoController');
Route::resource('question', 'QuestionController');
Route::resource('message', 'MessageController');
Route::resource('about', 'AboutController');
