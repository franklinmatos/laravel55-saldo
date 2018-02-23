<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    // variavel setada false porque no migration dessa tabela nao esta usando o $table->timestamps();
    public $timestamps = false;

    public function deposit(float $value){
        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount += number_format($value, 2, '.','');
       $deposit =  $this->save();

       $historic = auth()->user()->historics()->create([
           'type' => 'I',
           'amount' => $value,
           'total_before' => $totalBefore,
           'total_after' => $this->amount,
           'date' => date('Ymd'),
       ]);
       if($deposit && $historic){
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
