<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nguyenlieu extends Model
{
     protected $table = 'nguyenlieu';

	protected $fillable = ['sanpham_id','monngon_id'];

	public $timestamps = false;
}
