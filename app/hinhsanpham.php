<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hinhsanpham extends Model
{
    protected $table = "hinhsanpham";

    protected $fillable = ['id','hinhsanpham_ten','sanpham_id'];

	public $timestamps = false;
}
