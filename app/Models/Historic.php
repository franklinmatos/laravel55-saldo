<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use app\User;

class Historic extends Model
{
    protected $fillable = [
        'type' ,
        'amount',
        'total_before',
        'total_after' ,
        'user_id_transaction',
        'date'];

    public function getDateAttribute($value){
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function type($type = null){
        $types = [
            'I' => 'Entrada',
            'O' => 'Saque',
            'T' => 'Transferência',
        ];
        if(!$type)
            return $types;

        if($this->user_id_transaction != null && $this->type != 'I')
            return "Recebido (Entrada ou Transferência)";
        return $types[$type];

    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function userEnv(){
        return $this->belongsTo(User::class,'user_id_transaction');
    }

    public function search(Array $data,$totalPage)
    {
        return $this->where(function($query){

        })->paginate();
    }
}
