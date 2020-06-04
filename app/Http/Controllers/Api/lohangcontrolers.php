<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\lohang;
use App\shop;
use App\nhacungcap;
class lohangcontrolers extends Controller
{
    public function lohangs($shopid)
	{
		$lohang=lohang::where('shop_id',$shopid)->paginate(8);
		return response(['lohang'=>$lohang]);
	}

    public function addlohangs(Request $req)
    {
        $lh=new lohang();
        $lh->shop_id=$req->shop_id;
        $lh->lohang_ky_hieu=$req->lohang_ky_hieu;
        $lh->lohang_han_su_dung=$req->lohang_han_su_dung;
        $lh->lohang_gia_mua_vao=$req->lohang_gia_mua_vao;
        $lh->lohang_gia_ban_ra=$req->lohang_gia_ban_ra;
        $lh->lohang_so_luong_nhap=$req->lohang_so_luong_nhap;
        $lh->lohang_so_luong_da_ban=$req->lohang_so_luong_da_ban;
        $lh->lohang_so_luong_doi_tra=$req->lohang_so_luong_doi_tra;
        $lh->lohang_so_luong_hien_tai=$req->lohang_so_luong_hien_tai;
        $lh->lohang_tinh_trang=$req->lohang_tinh_trang;
        $lh->nhacungcap_id=$req->nhacungcap_id;
        $lh->save();
        return response(['status'=>'ok']);
    }
    public function changelohangs(Request $req,$id)
    {
        $lh= lohang::find($id);
        $lh->shop_id=$req->shop_id;
        $lh->lohang_ky_hieu=$req->lohang_ky_hieu;
        $lh->lohang_han_su_dung=$req->lohang_han_su_dung;
        $lh->lohang_gia_mua_vao=$req->lohang_gia_mua_vao;
        $lh->lohang_gia_ban_ra=$req->lohang_gia_ban_ra;
        $lh->lohang_so_luong_nhap=$req->lohang_so_luong_nhap;
        $lh->lohang_so_luong_da_ban=$req->lohang_so_luong_da_ban;
        $lh->lohang_so_luong_doi_tra=$req->lohang_so_luong_doi_tra;
        $lh->lohang_so_luong_hien_tai=$req->lohang_so_luong_hien_tai;
        $lh->lohang_tinh_trang=$req->lohang_tinh_trang;
        $lh->nhacungcap_id=$req->nhacungcap_id;
        $lh->save();
        return response(['status'=>'ok']);
    }

    public function deletelohangs($id)
    {
        $lh=lohang::find($id);
        $lh->delete();
        return response(['status'=>'ok']);
    }
}
