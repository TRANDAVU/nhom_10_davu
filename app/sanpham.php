<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    protected $table = "sanpham";

    protected $fillable = ['id','shop_id','lohang_id','sanpham_ten','sanpham_anh','sanpham_mo_ta','loaisanpham_id','donvitinh_id','gia_tien','phan_tram_km','active','new'];

	public $timestamps = true;
}
