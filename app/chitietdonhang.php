<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
    protected $table = "chitietdonhang";

    protected $fillable = ['sanpham_id','donhang_id','chitietdonhang_so_luong','chitietdonhang_thanh_tien'];

	public $timestamps = true;
}
