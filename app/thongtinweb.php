<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thongtinweb extends Model
{
    protected $table = "thanhlapweb";

    protected $fillable = ['thanhlapweb_ten','thanhlapweb_anh','thanhlapweb_chucvu','thanhlapweb_thongtin'];
}
