<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use Cart;
use Mail;
use App\Mail\shopping_mail;
use Carbon\Carbon;
class Admincontroller extends Controller
{
/*------------------------dn-dx admin----------------------------*/
   public function getDangnhapadmin()
   {
       return view('admin.singin.singin');
   }

   public function postDangnhapadmin(Request $req)
   {
       $this->validate($req,
        [
            'Email'=>'required|email',
            'Password'=>'required|min:6|max:20'
        ]
        ,
        [
            'Email.required'=>'Vui lòng nhập lại email',
            'Email.email'=>'Không đúng định dạng email',
            'Password.required'=>'Vui lòng nhập mật khẩu',
            'Password.min'=>'Vui lòng nhập mật khẩu ít nhất 6 ký tự'
        ]);
        $credentials=array('email'=>$req->Email,'password'=>$req->Password);
        //dd($req->Email,$req->Password);
        
        if(Auth::attempt($credentials,true) ){
            return redirect()->route('admin_home');
        }
        else{
            return redirect()->back()->with('thongbao_4','lỗi rồi nhé');
        }
   }

   public function getDangxuatadmin()
    {
        Auth::logout();
        return redirect()->route('trangchu');
    }
/*------------------------home----------------------------*/
    public function getAdmin()
    {
        $year=Carbon::now()->year;
        
        $sl_user = User::count();
        
        $total_money = donhang::where(DB::raw("year(created_at)"),'=',$year)->sum('donhang_tong_tien') ;

        $total_sale = sanpham::where('phan_tram_km','>',0)
                        ->where(DB::raw("year(created_at)"),'=',$year)
                        ->count('id');

        $total_khach_0 = khachhang::where(DB::raw("year(created_at)"),'=',$year)
                        ->count() ;

        $visitor = DB::table('donhang')
                    ->where(DB::raw("year(created_at)"),'=',$year)
                    ->select(
                        DB::raw("month(created_at) as month"),
                        DB::raw("SUM(donhang_tong_tien) as total_money"),
                        DB::raw("SUM(khachhang_id) as total_khach")) 
                    ->orderBy("created_at")
                    ->groupBy(DB::raw("month(created_at)"))
                    ->get();
        $result[] = ['Month','Money','Khach'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [$value->month, (int)$value->total_money, (int)$value->total_khach];
        }
         
        return view('admin.trangchu',compact('sl_user','total_money','total_sale','total_khach_0'))
                ->with('visitor',json_encode($result));
    }

/*------------------------getXemslide----------------------------*/    
    public function getXemslide()
    {
        $quangcao=quangcao::paginate(4);
        return view('admin.quangcao.xem',compact('quangcao'));
    }  

    public function getThemslide()
    {
        return view('admin.quangcao.them');
    }

    public function postThemslide(Request $req)
    {
        $qc=new quangcao();
        $qc->quangcao_anh=$req->image;
        $qc->quangcao_trang_thai=$req->trangthai;
        $qc->title=$req->description;
        $qc->save();
        return redirect()->back()->with('thongbao_5','Thêm thành công');
    }

    public function getSuaslide($id)
    {
        $sl=quangcao::where('id','=',$id)->first();
        return view('admin.quangcao.sua',compact('sl'));
    }

    public function postSuaslide(Request $req,$id)
    {
        $sl=quangcao::find($id);
        $sl->quangcao_anh=$req->c1;
        $sl->quangcao_trang_thai=$req->c2;
        $sl->title=$req->c3;
        $sl->save();
        return redirect()->route('xem_slide')->with('thongbao_20','Sửa thành công');
    }

    public function getXoaslide($id)
    {
        $sl=quangcao::find($id);
        $sl->delete();
        return redirect()->route('xem_slide')->with('thongbao_30','success');
    }
/*------------------------getDonhang----------------------------*/ 
    public function getDonhang()
    {
        $donhang=donhang::paginate(8);
        return view('admin.donhang.xem',compact('donhang'));
    }

    public function getXoadonhang($id)
    {
        $dh=donhang::find($id);
        $ctdh=chitietdonhang::where('donhang_id',$id)->count();
        if($ctdh>0){
            return redirect()->route('donhang')->with('thongbao_loi_30','bạn cần xóa bên chi tiết đơn hàng trước');
        }else{
            $dh->delete();
            return redirect()->route('donhang')->with('thongbao_30','success');
        }
        
    }
/*------------------------getChitietdonhang----------------------------*/ 
    public function getChitietdonhang()
    {
        $chitietdonhang=chitietdonhang::paginate(8);
        return view('admin.chitietdonhang.xem',compact('chitietdonhang'));
    }

    public function getXoachitietdonhang($id)
    {
        $ctdh=chitietdonhang::find($id);
        $ctdh->delete();
        return redirect()->route('chitietdonhang')->with('thongbao_30','success');
        
    }
/*------------------------getDonvitinh----------------------------*/ 
    public function getDonvitinh()
    {
        $donvitinh=donvitinh::paginate(8);
        return view('admin.donvitinh.xem',compact('donvitinh'));
    }

    public function getThemdonvitinh()
    {
        return view('admin.donvitinh.them');
    }

    public function postThemdonvitinh(Request $req)
    {
        $dv=new donvitinh();
        $dv->donvitinh_ten=$req->name;
        $dv->donvitinh_mo_ta=$req->description;
        $dv->save();
        return redirect()->back()->with('thongbao_6','Thêm thành công');
    }

    public function getSuadonvitinh($id)
    {
        $dv=donvitinh::where('id','=',$id)->first();
        return view('admin.donvitinh.sua',compact('dv'));
    }

    public function postSuadonvitinh(Request $req,$id)
    {
        $dv=quangcao::find($id);
        $dv->donvitinh_ten=$req->name;
        $dv->donvitinh_mo_ta=$req->description;
        $dv->save();
        return redirect()->route('don_vi_tinh')->with('thongbao_21','Sửa thành công');
    }

    public function getXoadonvitinh($id)
    {
        $dvt=donvitinh::find($id);
        $dvt->delete();
        return redirect()->route('don_vi_tinh')->with('thongbao_30','success');
        
    }
/*------------------------getKhachhang----------------------------*/ 
    public function getKhachhang()
    {
        $khachhang=khachhang::paginate(8);
        return view('admin.khachhang.xem',compact('khachhang'));
    }

    public function getXoakhachhang($id)
    {
        $kh=khachhang::find($id);
        $dh=donhang::where('khachhang_id',$id)->count();
        if($dh>0){
            return redirect()->route('khachhang')->with('thongbao_loi_31','bạn cần xóa bên đơn hàng trước');
        }else{
            $kh->delete();
            return redirect()->route('khachhang')->with('thongbao_30','success');
        }
    }
/*------------------------getLoainguoidung----------------------------*/ 
    public function getLoainguoidung()
    {
        $loainguoidung=DB::table('loainguoidung')->paginate(8);
        return view('admin.loainguoidung.xem',compact('loainguoidung'));
    }

    public function getThemloainguoidung()
    {
        return view('admin.loainguoidung.them');
    }

    public function postThemloainguoidung(Request $req)
    {
        $nd=new loainguoidung();
        $nd->loainguoidung_ten=$req->c1;
        $nd->mo_ta=$req->c2;
        $nd->save();
        return redirect()->back()->with('thongbao_18','Thêm thành công');
    }

    public function getSualoainguoidung($id)
    {
        $lnd=loainguoidung::where('id','=',$id)->first();
        return view('admin.loainguoidung.sua',compact('lnd'));
    }

    public function postSualoainguoidung(Request $req,$id)
    {
        $lnd=loainguoidung::find($id);
        $lnd->loainguoidung_ten=$req->c1;
        $lnd->mo_ta=$req->c2;
        $lnd->save();
        return redirect()->route('loainguoidung')->with('thongbao_22','Sửa thành công');
    }

    public function getXoaloainguoidung($id)
    {
        $lnd=loainguoidung::find($id);
        $user=user::where('loainguoidung_id',$lnd->id)->count();
        if($user>0){
            return redirect()->route('loainguoidung')->with('thongbao_loi_32','bạn cần xóa bên user trước');
        }else{
            $lnd->delete();
            return redirect()->route('loainguoidung')->with('thongbao_30','success');
        }
    }
/*------------------------getLoaisanpham----------------------------*/ 
    public function getLoaisanpham()
    {
        $loaisanpham=DB::table('loaisanpham')->paginate(8);
        return view('admin.loaisanpham.xem',compact('loaisanpham'));
    }

    public function getThemloaisanpham()
    {
        $nhom=DB::table('nhom')->get();
        return view('admin.loaisanpham.them',compact('nhom'));
    }

    public function postThemloaisanpham(Request $req)
    {
        $lsp= new loaisanpham();
        $lsp->loaisanpham_ten=$req->name;
        $lsp->loaisanpham_anh=$req->img;
        $lsp->loaisanpham_mo_ta=$req->description;
        $lsp->nhom_id=$req->cate;
        $lsp->save();
        return redirect()->back()->with('thongbao_8','Thêm thành công');
    }

    public function getSualoaisanpham($id)
    {
        $lsp= loaisanpham::where('id','=',$id)->first();
        return view('admin.loaisanpham.sua',compact('lsp'));
    }

    public function postSualoaisanpham(Request $req,$id)
    {
        $lsp=loaisanpham::find($id);
        $lsp->loaisanpham_ten=$req->name;
        $lsp->loaisanpham_anh=$req->img;
        $lsp->loaisanpham_mo_ta=$req->description;
        $lsp->nhom_id=$req->cate;
        $lsp->save();
        return redirect()->route('loaisanphamall')->with('thongbao_23','Sửa thành công');
    }

    public function getXoaloaisanphamall($id)
    {
        $lsp=loaisanpham::find($id);
        $sp=sanpham::where('loaisanpham_id',$lsp->id)->count();
        if($sp>0){
            return redirect()->route('loaisanphamall')->with('thongbao_loi_33','bạn cần xóa bên sản phẩm trước');
        }else{
            $lsp->delete();
            return redirect()->route('loaisanphamall')->with('thongbao_30','success');
        }
    }
/*------------------------getLohang----------------------------*/ 
    public function getLohang()
    {
        $lohang=DB::table('lohang')->paginate(8);
        return view('admin.lohang.xem',compact('lohang'));
    }

    public function getThemlohang()
    {
        $ncc=nhacungcap::all();
        $shop=shop::all();
        return view('admin.lohang.them',compact('ncc','shop'));
    }

    public function postThemlohang(Request $req)
    {
        $lh=new lohang();
        $lh->shop_id=$req->c1;
        $lh->lohang_ky_hieu=$req->c2;
        $lh->lohang_han_su_dung=$req->c3;
        $lh->lohang_gia_mua_vao=$req->c4;
        $lh->lohang_gia_ban_ra=$req->c5;
        $lh->lohang_so_luong_nhap=$req->c6;
        $lh->lohang_so_luong_da_ban=$req->c7;
        $lh->lohang_so_luong_doi_tra=$req->c8;
        $lh->lohang_so_luong_hien_tai=$req->c9;
        $lh->lohang_tinh_trang=$req->c10;
        $lh->nhacungcap_id=$req->c11;
        $lh->save();
        return redirect()->back()->with('thongbao_9','Thêm thành công');
    }

    public function getSualohang($id)
    {
        $lhx=lohang::where('id',$id)->first();
        $ncc=nhacungcap::all();
        $shop=shop::all();
        return view('admin.lohang.sua',compact('lhx','ncc','shop'));
    }

    public function postSualohang(Request $req,$id)
    {
        $lh= lohang::find($id);
        $lh->sanpham_id=$req->c1;
        $lh->lohang_ky_hieu=$req->c2;
        $lh->lohang_han_su_dung=$req->c3;
        $lh->lohang_gia_mua_vao=$req->c4;
        $lh->lohang_gia_ban_ra=$req->c5;
        $lh->lohang_so_luong_nhap=$req->c6;
        $lh->lohang_so_luong_da_ban=$req->c7;
        $lh->lohang_so_luong_doi_tra=$req->c8;
        $lh->lohang_so_luong_hien_tai=$req->c9;
        $lh->lohang_tinh_trang=$req->c10;
        $lh->nhacungcap_id=$req->c11;
        $lh->save();
        return redirect()->route('lohang')->with('thongbao_24','Sử thành công');
    }

    public function getXoalohang($id)
    {
        $lh=lohang::find($id);
        $lh->delete();
        return redirect()->route('lohang')->with('thongbao_30','success');
    }
/*------------------------getMonngon----------------------------*/ 
    public function getMonngon()
    {
        $monngon=DB::table('monngon')->paginate(8);
        return view('admin.monngon.xem',compact('monngon'));
    }

    public function getthemmonngon()
    {
        return view('admin.monngon.them');
    }

    public function postthemmonngon(Request $req)
    {
        $mn=new monngon();
        $mn->monngon_tieu_de=$req->c1;
        $mn->monngon_tom_tat=$req->c2;
        $mn->monngon_noi_dung=$req->c3;
        $mn->monngon_anh=$req->c4;
        $mn->active=$req->c5;
        $mn->save();
        return redirect()->back()->with('thongbao_10','Thêm thành công');
    }

    public function getSuamonngon($id)
    {
        $mn=monngon::where('id',$id)->first();
        return view('admin.monngon.sua',compact('mn'));
    }

    public function postSuamonngon(Request $req,$id)
    {
        $mn= monngon::find($id);
        $mn->monngon_tieu_de=$req->c1;
        $mn->monngon_tom_tat=$req->c2;
        $mn->monngon_noi_dung=$req->c3;
        $mn->monngon_anh=$req->c4;
        $mn->active=$req->c5;
        $mn->save();
        return redirect()->route('monngonall')->with('thongbao_25','Sửa thành công');
    }

    public function getXoamonngon($id)
    {
        $mn=monngon::find($id);
        $mn->delete();
        return redirect()->route('monngonall')->with('thongbao_30','success');
    }
/*------------------------getNhacungcap----------------------------*/ 
    public function getNhacungcap()
    {
        $nhacungcap=DB::table('nhacungcap')->paginate(8);
        return view('admin.nhacungcap.xem',compact('nhacungcap'));
    }

    public function getThemnhacungcap()
    {
        return view('admin.nhacungcap.them');
    }

     public function postThemnhacungcap(Request $req)
    {   
        $ncc=new nhacungcap();
        $ncc->nhacungcap_ten=$req->c1;
        $ncc->nhacungcap_dia_chi=$req->c2;
        $ncc->nhacungcap_sdt=$req->c3;
        $ncc->save();
        return redirect()->back()->with('thongbao_11','Thêm thành công');
    }

    public function getSuanhacungcap($id)
    {
        $ncc=nhacungcap::where('id',$id)->first();
        return view('admin.nhacungcap.sua',compact('ncc'));
    }

     public function postSuanhacungcap(Request $req,$id)
    {   
        $ncc= nhacungcap::find($id);
        $ncc->nhacungcap_ten=$req->c1;
        $ncc->nhacungcap_dia_chi=$req->c2;
        $ncc->nhacungcap_sdt=$req->c3;
        $ncc->save();
        return redirect()->route('nhacungcap')->with('thongbao_26','Sửa thành công');
    }

    public function getXoanhacungcap($id)
    {
        $ncc=nhacungcap::find($id);
        $ncc->delete();
        return redirect()->route('nhacungcap')->with('thongbao_30','success');
    }
/*------------------------getNhanvien----------------------------*/ 
    public function getNhanvien()
    {
        $nhanvien=DB::table('nhanvien')->paginate(8);
        return view('admin.nhanvien.xem',compact('nhanvien'));
    }

    public function getXoanhanvien($id)
    {
        $nv=nhanvien::find($id);
        $nv->delete();
        return redirect()->route('nhanvien')->with('thongbao_30','success');
    }
/*------------------------getSanpham----------------------------*/ 
    public function getSanpham()
    {
        $sanpham=DB::table('sanpham')->paginate(8);
        return view('admin.sanpham.xem',compact('sanpham'));
    }

    public function getXoasanphamall($id)
    {
        $sp=sanpham::find($id);
        $chitietdonhang=chitietdonhang::where('sanpham_id',$id)->count();
        if($chitietdonhang>0){
            return redirect()->route('sanphamall')->with('thongbao_loi_38','bạn cần xóa trong bảng chitietdonhang');
        }
        else{
            $sp->delete();
            return redirect()->route('sanphamall')->with('thongbao_30','success');
        }
    }
/*------------------------getShop----------------------------*/ 
    public function getShop()
    {
        $shop=DB::table('shop')->paginate(8);
        return view('admin.shop.xem',compact('shop'));
    }

    public function getThemshop()
    {
        return view('admin.shop.them');
    }

    public function postThemshop(Request $req)
    {
        $shop=new shop();
        $shop->tenshop=$req->c1;
        $shop->shop_mo_ta=$req->c2;
        $shop->image_name=$req->c3;
        $shop->user_id=$req->c4;
        $shop->save();
        return redirect()->back()->with('thongbao_12','Thêm thành công');
    }

    public function getSuashop($id)
    {
        $shop=shop::where('id',$id)->first();
        return view('admin.shop.sua',compact('shop'));
    }

    public function postSuashop(Request $req,$id)
    {
        $shop= shop::find($id);
        $shop->tenshop=$req->c1;
        $shop->shop_mo_ta=$req->c2;
        $shop->image_name=$req->c3;
        $shop->user_id=$req->c4;
        $shop->save();
        return redirect()->route('shop')->with('thongbao_27','Sửa thành công');
    }

    public function getXoashop($id)
    {
        $s=shop::find($id);
        $s->delete();
        return redirect()->route('shop')->with('thongbao_30','success');
    }

/*------------------------getTinhtranghoadon----------------------------*/ 
    public function getTinhtranghoadon()
    {
        $tinhtranghd=DB::table('tinhtranghd')->paginate(8);
        return view('admin.tinhtranghoadon.xem',compact('tinhtranghd'));
    }

     public function getThemtinhtranghoadon()
    {
        return view('admin.tinhtranghoadon.them');
    }

    public function getXoatinhtranghoadon($id)
    {
        $tthd=tinhtranghd::find($id);
        $tthd->delete();
        return redirect()->route('tinhtranghoadon')->with('thongbao_30','success');
    }
/*------------------------getUser----------------------------*/ 
    public function getUser()
    {
        $user=DB::table('Users')->paginate(8);
        return view('admin.user.xem',compact('user'));
    }

    public function getThemuser()
    {
        $all=loainguoidung::all();
        return view('admin.user.them',compact('all'));
    }

    public function postThemuser(Request $req)
    {
        $user=new user();
        $user->avatar=$req->c1;
        $user->name=$req->c2;
        $user->email=$req->c3;
        $user->diachi=$req->c4;
        $user->sodienthoai=$req->c5;
        $user->loainguoidung_id=$req->c6;
        $user->save();
        return redirect()->back()->with('thongbao_13','Thêm thành công');
    }

    public function getSuauser($id)
    {
        $user = user::where('id',$id)->first();
        $all=loainguoidung::all();
        return view('admin.user.sua',compact('user','all'));
    }

    public function postSuauser(Request $req,$id)
    {
        $user=user::find($id);
        $user->avatar=$req->c1;
        $user->name=$req->c2;
        $user->email=$req->c3;
        $user->diachi=$req->c4;
        $user->sodienthoai=$req->c5;
        $user->loainguoidung_id=$req->c6;
        $user->save();
        return redirect()->route('user')->with('thongbao_28','Sửa thành công');
    }

    public function getXoauser($id)
    {
        $tthd=user::find($id);
        $tthd->delete();
        return redirect()->route('user')->with('thongbao_30','success');
    }

    public function getSearchsanpham(Request $req)
    {
        $product=sanpham::where('sanpham_ten','like','%'.$req->skey.'%')
                ->orWhere('gia_tien',$req->skey)
                ->paginate(8);
        return view('admin.search.search',compact('product'));
    }
}
