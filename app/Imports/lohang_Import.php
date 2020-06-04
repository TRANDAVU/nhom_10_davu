<?php

namespace App\Imports;

use App\lohang;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use App\shop;
class lohang_Import implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

	$shop_id=shop::where('user_id',Auth::user()->id)->first();
         return new lohang([
            'shop_id'    => $shop_id->id, 
            'lohang_id' => $row['lohang_id'],
            'sanpham_ten'     => $row['sanpham_ten'],
            'sanpham_anh'    => $row['sanpham_anh'], 
            'sanpham_mo_ta' => $row['sanpham_mo_ta'],
            'loaisanpham_id'     => $row['name'],
            'donvitinh_id'    => $row['donvitinh_id'], 
            'gia_tien' => $row['gia_tien'],
            'phan_tram_km'     => $row['phan_tram_km'],
            'active'    => $row['active'], 
            'new' => $row['new'],
        ]);
    }
}
