<?php

namespace App\Exports;

use App\nguyenlieusanxuat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;
use App\shop;

class nguyenlieusanxuat_Export implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $shop=shop::where('user_id',Auth::user()->id)->first();
        return nguyenlieusanxuat::where('shop_id',$shop->id)->get();
    }
}
