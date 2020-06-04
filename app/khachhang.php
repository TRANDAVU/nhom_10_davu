<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    protected $table = "khachhang";

    protected $fillable = ['khachhang_ten','khachhang_dia_chi','khachhang_sdt','khachhang_email','user_id'];

	public $timestamps = true;
}
