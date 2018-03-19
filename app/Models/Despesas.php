<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use app\User;

class Despesas extends Model
{
    
    protected $fillable = [
        'id' ,
        'descricao',
        'data',
        'valor' 
        ];
   
        public function getDataAttribute($value){
            return Carbon::parse($value)->format('d/m/Y');
        }

        public function user(){
            return $this->belongsTo(User::class);
        }

        public function sucesso(){
            return [
                'success' => true,
                'message' => 'A Recarga foi efetuada com sucesso!'
            ];
        }

        public function error(){
            return [
                'success' => false,
                'message' => 'Ocorreu um erro ao tentar efetuar a recarga'
            ];
        }

       
}
