<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\sanpham;
use App\lohang;
class Searchcontroller extends Controller
{
    public function getSearch(Request $request)
    {
    	$sanpham=DB::table('shop_sl')->where('sanpham_ten','like','%'.$request->key.'%')
                ->orWhere('gia_tien',$request->key)
                ->get()
                ->paginate(8);
        return view('user.search',compact('sanpham'));
    }
}
