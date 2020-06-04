<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nguyenlieusanxuat extends Model
{
    protected $table = "nguyenlieusanxuat";

    protected $fillable = ['id','shop_id','lohang_id','nguyenlieusanxuat_phanbon','nguyenlieusanxuat_hatgiong','nguyenlieusanxuat_nhienlieu','nguyenlieusanxuat_thuottrusau'];

	public $timestamps = true;
}
