<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
}
