<?php

$this->group(['middleware'=>['auth'],'namespace'=> 'Admin','prefix' => 'admin'],function(){
    
    $this->get('/', 'AdminController@index')->name('admin.home');
    $this->get('balance', 'BalanceController@index')->name('admin.balance');

    $this->get('balance/deposit','BalanceController@deposit')->name('balance.deposit');
    $this->get('withdraw','BalanceController@withdraw')->name('balance.withdraw');
    $this->post('deposit/store','BalanceController@depositStore')->name('deposit.store');
    $this->post('withdraw/store','BalanceController@withdrawStore')->name('withdraw.store');
});


$this->get('/','Site\SiteController@index')->name('home');

Auth::routes();