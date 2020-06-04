<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diemsanxuat extends Model
{
    protected $table = "diadiemsanxuat";

    protected $fillable = ['id','shop_id','lohang_id','diadiemsanxuat_ten','diadiemsanxuat_diachi','diadiemsanxuat_hinhanh','diadiemsanxuat_toado_x','diadiemsanxuat_toado_y','diadiemsanxuat_mota'];

	public $timestamps = false;
}
