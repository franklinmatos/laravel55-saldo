<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    // variavel setada false porque no migration dessa tabela nao esta usando o $table->timestamps();
    public $timestamps = false;

    public function deposit(float $value){
        $this->amount += number_format($value, 2, '.','');
       $retorno =  $this->save();

       if($retorno){
           return [
               'success' => true,
               'message' => 'A Recarga foi efetuada com sucesso!'
           ];


           return [
               'success' => false,
               'message' => 'Ocorreu um erro ao tentar efetuar a recarga'
           ];
       }
    }
}
