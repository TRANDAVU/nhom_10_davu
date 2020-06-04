<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use All\donhang;
class ChartDataController extends Controller
{
    public function getAllMont()
    {
    	$post=donhang::orderBy('created_at','ASC')
    			->pluck('created_at');
    	return $post; 
    }
}
