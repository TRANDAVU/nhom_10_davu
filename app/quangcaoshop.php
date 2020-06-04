<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quangcaoshop extends Model
{
    protected $table="quangcaoshop";

    protected $fillable = ['anh','shop_id','mota','active'];

	public $timestamps = true;
}
