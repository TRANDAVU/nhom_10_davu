<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    protected $table = "shop";

    protected $fillable = ['image_name','tenshop','dia_chi','sdt','email','shop_mo_ta','user_id','active',];

	public $timestamps = false;
}
