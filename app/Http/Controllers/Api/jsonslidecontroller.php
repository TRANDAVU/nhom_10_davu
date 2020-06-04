<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\quangcao;
use DB;
class jsonslidecontroller extends Controller
{
    public function slide()
    {
        $top=quangcao::where('quangcao_trang_thai',1)
                    ->get();
        return response(['top'=>$top]);
    }

    public function addslide(Request $request)
    {
        $quangcao=new quangcao();
        $quangcao->quangcao_anh=$request->quangcao_anh;
        $quangcao->quangcao_trang_thai=$request->quangcao_trang_thai;
        $quangcao->title=$request->title;
        $quangcao->save();
        return response(['quangcao'=>$quangcao,'status'=>'ok']);
    }

    public function changeslide(Request $request,$id)
    {
        $quangcao=quangcao::find($id);
        $quangcao->quangcao_anh=$request->quangcao_anh;
        $quangcao->quangcao_trang_thai=$request->quangcao_trang_thai;
        $quangcao->title=$request->title;
        $quangcao->save();
        return response(['quangcao'=>$quangcao,'status'=>'ok']);
    }

    public function deleteslide(Request $request,$id)
    {
        $quangcao=quangcao::find($id);
        $quangcao->delete();
        return response(['status'=>'ok']);
    }
}
