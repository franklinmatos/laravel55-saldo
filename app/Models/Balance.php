<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    // variavel setada false porque no migration dessa tabela nao esta usando o $table->timestamps();
    public $timestamps = false;
}
