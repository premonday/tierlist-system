<?php

Route::get('test', function(){
echo 'Composer package running';
});

// News
Route::get('/articles', 'Premonday\Tierlist\ArticlesController@index')->name('news-index');
Route::get('/articles/{post}', 'Premonday\Tierlist\ArticlesController@post')->name('news-post');
