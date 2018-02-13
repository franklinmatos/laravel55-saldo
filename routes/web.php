<?php


$this->get('/','Site\SiteController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

