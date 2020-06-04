<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thong_tin_chung_shop extends Model
{
    protected $table = "thong_tin_chung_shop";

    protected $fillable = ['id','shop_id','lohang_id','donhang_id','khachhang_id','user_id'];

	public $timestamps = false;
}
