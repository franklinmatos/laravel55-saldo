<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

use Illuminate\Http\Request;
use App\User;


class Balance extends Model
{
    // variavel setada false porque no migration dessa tabela nao esta usando o $table->timestamps();
    public $timestamps = false;

    public function deposit(float $value){
        DB::beginTransaction();
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
           DB::commit();
           return [
               'success' => true,
               'message' => 'A Recarga foi efetuada com sucesso!'
           ];

          }else{
           DB::rollback();
           return [
               'success' => false,
               'message' => 'Ocorreu um erro ao tentar efetuar a recarga'
           ];
       }
    }


    public function withdraw(float $value){
        DB::beginTransaction();
        $totalBefore = $this->amount ;
        if( ($totalBefore - $value) < 0){
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Saldo insuficiente.'
            ];
        }

        $this->amount -= number_format($value, 2, '.','');
        $withdraw =  $this->save();

        $historic = auth()->user()->historics()->create([
            'type' => 'O',
            'amount' => $value,
            'total_before' => $totalBefore,
            'total_after' => $this->amount,
            'date' => date('Ymd'),
        ]);
        if($withdraw && $historic){
            DB::commit();
            return [
                'success' => true,
                'message' => 'A retirada foi efetuada com sucesso!'
            ];

        }else{
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Ocorreu um erro ao tentar efetuar a retirada.'
            ];
        }
    }

    public function transfer(float $value, User $sender) : Array
    {

        if( $this->amount < $value){
            DB::rollback();
            return [
                'success' => false,
                'message' => 'O valor de sua retirada é maior que o saldo atual.'
            ];
        }


        DB::beginTransaction();
        /********************************************************************************
         *  Atualiza o proprio saldo
         *
         ********************************************************************************/

        $totalBefore = $this->amount ? $this->amount : 0 ;

        $this->amount -= number_format($value, 2, '.','');
        $transfer=  $this->save();

        $historic = auth()->user()->historics()->create([
            'type'                  => 'T',
            'amount'                => $value,
            'total_before'          => $totalBefore,
            'total_after'           => $this->amount,
            'date'                  => date('Ymd'),
            'user_id_transaction'   => $sender->id,
        ]);

        /********************************************************************************
         *  Atualiza o saldo do recebedor
         *
         ********************************************************************************/

        $sendBalance = $sender->balance()->firstOrCreate([]);
        $totalBeforeSender = $sendBalance->amount ? $sendBalance->amount : 0 ;

        $sendBalance->amount += number_format($value, 2, '.','');
        $transferSender =  $sendBalance->save();

        $historicSender = $sender->historics()->create([
            'type'                  => 'I',
            'amount'                => $value,
            'total_before'          => $totalBeforeSender,
            'total_after'           => $sendBalance->amount,
            'date'                  => date('Ymd'),
            'user_id_transaction'   => auth()->user()->id,
        ]);
        if($transfer && $historic && $transferSender && $historicSender){
            DB::commit();
            return [
                'success' => true,
                'message' => 'A tranferência foi efetuada com sucesso!'
            ];

        }else{
            DB::rollback();
            return [
                'success' => false,
                'message' => 'Ocorreu um erro ao tentar efetuar a transferência.'
            ];
        }
    }

}
