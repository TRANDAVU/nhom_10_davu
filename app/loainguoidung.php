<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loainguoidung extends Model
{
    protected $table = 'loainguoidung';

	protected $fillable = ['loainguoidung_ten','mo_ta'];

	public $timestamps = false;
}
