<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use DB;
use Session;
use App\sanpham;
use App\lohang;
use App\shop;
session_start();

class giohangapicontrolers extends Controller
{
    public function save_cart(Request $req)
    {
        $sanpham_id=$req->productid_hidden;
        $qty=$req->qty;
        $donvitinh=$req->donvi;
        $shop_id=$req->shop;
        $lohang_id=$req->lohang_id;
        $sanpham = DB::table('sanpham')->where('id',$sanpham_id)->first();
        $data['id']=$sanpham->id;
        $data['qty']=$qty;
        $data['name']=$sanpham->sanpham_ten;
        $data['price']=$sanpham->gia_tien-(($sanpham->gia_tien*$sanpham->phan_tram_km)/100);
        $data['weight']=$sanpham->gia_tien;
        $data['options']['image']=$sanpham->sanpham_anh;
        $data['options']['donvitinh']=$donvitinh;
        $data['options']['shop_id']=$shop_id;
        $data['options']['lohang_id']=$lohang_id;
        
        $lohang=DB::table('lohang')->where('id',$lohang_id)->first();
        $sl=$lohang->lohang_so_luong_hien_tai;

        if($sl< $qty)
        {
            return response(['status'=>'error']);
        }
        else{
            Cart::add($data);
            $content=Cart::content();
            foreach ($content as $row) {
                $rows=$row->rowId;
                $ids=$row->id;
            }
            return response([ 'rows'=>$rows,'ids'=>$ids,'sl'=>Cart::count()]);
        }
    }

    public function updatecart(Request $req)
    {
        $sanpham_id=$req->productid_hidden;
        $qty=$req->qty;
        $donvitinh=$req->donvi;
        $shop_id=$req->shop;
        $lohang_id=$req->lohang_id;
        $sanpham = DB::table('sanpham')->where('id',$sanpham_id)->first();
        $data['id']=$sanpham->id;
        $data['qty']=$qty;
        $data['name']=$sanpham->sanpham_ten;
        $data['price']=$sanpham->gia_tien-(($sanpham->gia_tien*$sanpham->phan_tram_km)/100);
        $data['weight']=$sanpham->gia_tien;
        $data['options']['image']=$sanpham->sanpham_anh;
        $data['options']['donvitinh']=$donvitinh;
        $data['options']['shop_id']=$shop_id;
        $data['options']['lohang_id']=$lohang_id;
        
        $lohang=DB::table('lohang')->where('id',$lohang_id)->first();
        $sl=$lohang->lohang_so_luong_hien_tai;

        if($sl< $qty)
        {
            return response(['status'=>'error']);
        }
        else{
            Cart::add($data);
            $content=Cart::content();
            foreach ($content as $row) {
                $rows=$row->rowId;
                $ids=$row->id;
            }
            return response([ 'rows'=>$rows,'ids'=>$ids,'sl'=>Cart::count()]);
        }
    }

    public function deletecart(Request $req)
    {
        $sanpham_id=$req->productid_hidden;
        $qty=$req->qty;
        $donvitinh=$req->donvi;
        $shop_id=$req->shop;
        $lohang_id=$req->lohang_id;
        $sanpham = DB::table('sanpham')->where('id',$sanpham_id)->first();
        $data['id']=$sanpham->id;
        $data['qty']=$qty;
        $data['name']=$sanpham->sanpham_ten;
        $data['price']=$sanpham->gia_tien-(($sanpham->gia_tien*$sanpham->phan_tram_km)/100);
        $data['weight']=$sanpham->gia_tien;
        $data['options']['image']=$sanpham->sanpham_anh;
        $data['options']['donvitinh']=$donvitinh;
        $data['options']['shop_id']=$shop_id;
        $data['options']['lohang_id']=$lohang_id;
        
        $lohang=DB::table('lohang')->where('id',$lohang_id)->first();
        $sl=$lohang->lohang_so_luong_hien_tai;

        if($sl< $qty)
        {
            return response(['status'=>'error']);
        }
        else{
            Cart::add($data);
            $content=Cart::content();
            foreach ($content as $row) {
                $rows=$row->rowId;
                $ids=$row->id;
                Cart::remove($rows);
            }
            return response([ 'rows'=>$rows,'ids'=>$ids,'sl'=>Cart::count()]);
        }
    }

}
