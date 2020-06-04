<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Socialite;
use Session;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\Input;
use Illuminate\paginator;
use Illuminate\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Binhluan;
use App\chitietdonhang;
use App\donhang;
use App\donvitinh;
use App\hinhsanpham;
use App\khachhang;
use App\khuyenmai;
use App\loainguoidung;
use App\loaisanpham;
use App\lohang;
use App\monngon;
use App\nguyenlieu;
use App\nhacungcap;
use App\nhanvien;
use App\quangcao;
use App\sanpham;
use App\shop;
use App\thong_tin_chung_shop;
use App\tinhtranghd;
use App\User;
use App\thanhlapweb;
use App\diemsanxuat;
use App\nguyenlieusanxuat;
use App\quangcaoshop;
use Cart;
use Mail;
use PDF;
use Carbon\Carbon;
use App\Mail\shopping_mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\sanpham_Export;
use App\Imports\sanpham_Import;

use App\Exports\lohang_Export;
use App\Imports\lohang_Import;


session_start();
class jsonshopcontroller extends Controller
{
    public function dkshop(Request $req)
	{
		
			$shop= new shop();
			$shop->image_name=$req->c1;
			$shop->tenshop=$req->c2;
			$shop->dia_chi=$req->c3;
			$shop->sdt=$req->c4;
			$shop->email=$req->c5;
			$shop->shop_mo_ta=$req->c6;
			$shop->user_id=$req->c7;
		$idms=user::where('id',$shop->user_id)->first();
		if($idms->mo_shop==0){
			$shop->save();
			$idms=user::where('id',$shop->user_id)->first();
			DB::table('users')
				->where('id',$idms->id)
				->update([
					'mo_shop'=>1,
				]);
			return response(['status'=>'ok']);
		}
		else{
			return response(['status'=>'err']);
		}
		
    }
    
    public function xemspshop($id){
        $sanphamshop=sanpham::where('active',1)
        ->where('shop_id',$id)
        ->paginate(3);
        return response(['sanphamshop'=>$sanphamshop,'trang'=>$sanphamshop->links()]);
    }

    public function dsshop()
    {
    	$shop=shop::where('active',1)->get();
		return response(['shop'=>$shop]);
		
    }
}
