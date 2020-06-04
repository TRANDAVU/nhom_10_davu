<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\sanpham;
use App\lohang;
use DB;
class jsonproductcontroller extends Controller
{
    public function toppr()
    {
        $top=DB::table('topsp')->where('active',1)
                    ->ORDERBY('lohang_so_luong_da_ban','DESC')
                    ->limit('5')
                    ->get();
        return response(['top'=>$top]);
    }

    public function categorypr($id)
    {
        $sanphamdm=sanpham::where('loaisanpham_id',$id)->get();
        if(count($sanphamdm)>0){
            return response(['sanphamdm'=>$sanphamdm]);
        }else{
            return response(['status'=>'error']);
        }
        
    }

    public function product(){
        $sanpham=sanpham::where('active',1)->paginate(3);
        return response(['sanpham'=>$sanpham,'trang'=>$sanpham->links()]);
    }

    public function addpr(Request $request)
    {
        $sanpham=new sanpham();
        $sanpham->shop_id=$request->shop_id;
        $sanpham->lohang_id=$request->lohang_id;
        $sanpham->sanpham_ten=$request->sanpham_ten;
        $sanpham->sanpham_anh=$request->sanpham_anh;
        $sanpham->sanpham_mo_ta=$request->sanpham_mo_ta;
        $sanpham->loaisanpham_id=$request->loaisanpham_id;
        $sanpham->donvitinh_id=$request->donvitinh_id;
        $sanpham->gia_tien=$request->gia_tien;
        $sanpham->phan_tram_km=$request->phan_tram_km;
        $sanpham->active=$request->active;
        $sanpham->new=$request->new;
        $sanpham->save();
        return response(['sanpham'=>$sanpham]);
    }

    public function changepr(Request $request,$id)
    {
        $sanpham=sanpham::find($id);
        $sanpham->shop_id=$request->shop_id;
        $sanpham->lohang_id=$request->lohang_id;
        $sanpham->sanpham_ten=$request->sanpham_ten;
        $sanpham->sanpham_anh=$request->sanpham_anh;
        $sanpham->sanpham_mo_ta=$request->sanpham_mo_ta;
        $sanpham->loaisanpham_id=$request->loaisanpham_id;
        $sanpham->donvitinh_id=$request->donvitinh_id;
        $sanpham->gia_tien=$request->gia_tien;
        $sanpham->phan_tram_km=$request->phan_tram_km;
        $sanpham->active=$request->active;
        $sanpham->new=$request->new;
        $sanpham->save();
        return response(['sanpham'=>$sanpham]);
    }

    public function deletepr(Request $request,$id)
    {
        $sanpham=sanpham::find($id);
        $sanpham->delete();
        return 'ok';
    }
}
