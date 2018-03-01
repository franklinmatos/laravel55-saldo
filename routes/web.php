<?php

$this->group(['middleware'=>['auth'],'namespace'=> 'Admin','prefix' => 'admin'],function(){
    
    $this->get('/', 'AdminController@index')->name('admin.home');

    $this->get('balance', 'BalanceController@index')->name('admin.balance');
    $this->get('balance/deposit','BalanceController@deposit')->name('balance.deposit');
    $this->post('deposit/store','BalanceController@depositStore')->name('deposit.store');

    $this->get('withdraw','BalanceController@withdraw')->name('balance.withdraw');
    $this->post('withdraw/store','BalanceController@withdrawStore')->name('withdraw.store');

    $this->get('transfer','BalanceController@Transfer')->name('balance.transfer');
    $this->post('confirm-transfer','BalanceController@confirmTransfer')->name('confirm.transfer');
    $this->post('store-transfer','BalanceController@transferStore')->name('transfer.store');


    $this->get('historic','BalanceController@historic')->name('admin.historic');
});


$this->get('/','Site\SiteController@index')->name('home');

Auth::routes();