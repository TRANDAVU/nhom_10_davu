<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
use DB;
use Session;
use App\sanpham;
use App\lohang;
use App\shop;
session_start();
class giohangcontroller extends Controller
{
    public function save_cart(Request $req)
    {
        $sanpham_id=$req->productid_hidden;
        $qty=$req->qty;
        $donvitinh=$req->donvi;
        $giatien=$req->price;
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
        //dd($data);

        $lohang=DB::table('lohang')->where('id',$lohang_id)->first();
        $sl=$lohang->lohang_so_luong_hien_tai;

        if($sl< $qty)
        {
            return redirect()->route('sanpham',$sanpham_id)->with('thongbao00','Số lượng trong kho không đủ mong bạn thông cảm');
        }
        else{
            Cart::add($data);
            return  redirect()->route('shopuser',$shop_id);
        }
        
    }


    public function delete_to_cart($rowId)
    {
        Cart::update($rowId,0);
        if(Cart::count()==0){
            return redirect()->route('trangchu');
        }
        else{
            return redirect()->route('giohang');
        }
    }

    public function Update_cart(Request $req)
    {
        $rowId=$req->rowId_cart;
        $qty=$req->cart_qty;
        
        $lohang=DB::table('lohang')->where('id',$req->lohang_id)->first();
        //dd($lohang);
        $slht=$lohang->lohang_so_luong_hien_tai;


        if($slht < $qty)
        {
            return redirect()->route('giohang')->with('thongbao000','Số lượng trong kho không đủ mong bạn thông cảm');
        }
        else{
            Cart::update($rowId,$qty);
            return redirect()->route('giohang');
        } 
    }
}