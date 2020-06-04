<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tinhtranghd extends Model
{
    protected $table = "tinhtranghd";

    protected $fillable = ['id','tinhtranghd_ten','tinhtranghd_mo_ta'];
}
