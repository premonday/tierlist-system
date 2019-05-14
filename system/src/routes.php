<?php

Route::get('test', function(){
echo 'Composer package running';
});

// News
Route::get('/articles', 'Tierlist\System\ArticlesController@index')->name('news-index');
Route::get('/articles/{post}', 'Tierlist\System\ArticlesController@post')->name('news-post');
