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
class Usershopcontroller extends Controller
{
/*--------------------trang shop-------------*/

	public function getDangkyshop()
	{
		if(Auth::check()==true && Auth::user()->mo_shop == 0){
			$udn=user::where('id',Auth::user()->id)->first();
			return view('shop_user.dangkyshop',compact('udn'));
		}
		else{
			return redirect()->route('trangchu')->with('thongbao_loi_002','bạn nên đăng nhập trước hoặc đã có shop nên không dùng được chức năng này');
		}
		
	}

	public function postDangkyshop(Request $req)
	{
		$shop= new shop();
		$shop->image_name=$req->c1;
		$shop->tenshop=$req->c2;
		$shop->dia_chi=$req->c3;
		$shop->sdt=$req->c4;
		$shop->email=$req->c5;
		$shop->shop_mo_ta=$req->c6;
		$shop->user_id=$req->c7;
		$shop->save();

		$idms=user::where('id',$shop->user_id)->first();
		DB::table('users')
			->where('id',$idms->id)
			->update([
				'mo_shop'=>1,
			]);
		$data=[
                   
                'email'=>$shop->email,
                'shop'=>$shop->tenshop
            ];  
        	
        	Mail::send('mail.mailthongbao',$data,function($mes) use($data){
                $mes->from('thienthanma521@gmail.com');
                $mes->to($data['email'])->subject('mail đặt hàng');
            });
		return redirect()->route('quanlyshop')->with('thongbao001','Đăng ký shop thành công chúng tôi rất vui được hợp tác');
	}
/*----------------------------ql----------------------------------*/
	public function getQuanlyshop()
	{
		if(Auth::check()==false){
			return redirect()->route('trangchu')->with('thongbao_loi_003','Bạn chưa đăng nhập');
		}
		else if( Auth::user()->mo_shop==0){
			return redirect()->route('trangchu')->with('thongbao_loi_003','Bạn chưa có shop');
		}
		else{

			$year=Carbon::now()->year;
    		$month=Carbon::now()->month;

			$shop=shop::where('user_id','=',Auth::user()->id)->first(); 

        	$sl_user = DB::table('shop_hoadon')->where('shop_id',$shop->id)
        							->where(DB::raw("year(created_at)"),'=',$year)
        							->count('khachhang_id');
        							
       	 	$total_money = DB::table('dathangsp')
       	 					->where('shop_id',$shop->id)
       	 					->where(DB::raw("year(created_at)"),'=',$year)
       	 					->sum('chitietdonhang_thanh_tien') ;

        	$total_sale = DB::table('shop_sl')->where('phan_tram_km','>',0)
        				->where('shop_id',$shop->id)
        				->where(DB::raw("year(created_at)"),'=',$year)
        				->count('*');

			$spmt=DB::table('shop_hoadon')->where('shop_id',$shop->id)
										->where(DB::raw("month(created_at)"),'=',$month)
										->count('khachhang_id');

			$sl_usert = DB::table('shop_hoadon')->where('shop_id',$shop->id)
        							->where(DB::raw("month(created_at)"),'=',$month)
        							->count('khachhang_id');
        							
       	 	$total_moneyt = DB::table('dathangsp')
       	 					->where('shop_id',$shop->id)
       	 					->where(DB::raw("month(created_at)"),'=',$month)
       	 					->sum('chitietdonhang_thanh_tien') ;

        	$total_salet = DB::table('shop_sl')->where('phan_tram_km','>',0)
        				->where('shop_id',$shop->id)
        				->where(DB::raw("month(created_at)"),'=',$month)
        				->count('*');

			$spm=DB::table('shop_hoadon')->where('shop_id',$shop->id)
										->where(DB::raw("year(created_at)"),'=',$year)
										->count('khachhang_id');
			
			$visitor = DB::table('dathangsp')
	                    ->where(DB::raw("year(created_at)"),'=',$year)
	                    ->where('shop_id','=',$shop->id)
	                    ->select(
	                        DB::raw("month(created_at) as month"),
	                        DB::raw("SUM(chitietdonhang_thanh_tien) as total_money"),
	                        DB::raw("SUM(id) as total_khach")) 
	                    ->orderBy("created_at")
	                    ->groupBy(DB::raw("month(created_at)"))
	                    ->get();
	        $result[] = ['Month','Money','Khach'];
	        foreach ($visitor as $key => $value) {
	            $result[++$key] = [$value->month, (int)$value->total_money, (int)$value->total_khach];
	        }

	        $bdt = DB::table('dathangsp')
	                    ->where(DB::raw("month(created_at)"),'=',$month)
	                    ->where('shop_id','=',$shop->id)
	                    ->select(
	                        DB::raw("day(created_at) as day"),
	                        DB::raw("SUM(chitietdonhang_thanh_tien) as total_money"),
	                        DB::raw("SUM(id) as total_khach")) 
	                    ->orderBy("created_at")
	                    ->groupBy(DB::raw("day(created_at)"))
	                    ->get();
	        $resultshop[] = ['Day','Money','Khach'];
	        foreach ($bdt as $key => $value) {
	            $resultshop[++$key] = [$value->day, (int)$value->total_money, (int)$value->total_khach];
	        }


			return view('shop_user.quanlyshop',compact('spm','total_sale','total_money','sl_user','spmt','total_salet','total_moneyt','sl_usert'))
					->with('visitor',json_encode($result))
					->with('bdt',json_encode($resultshop));
		}		
	}
/*----------------------------sp----------------------------------*/
	public function getThemsanphamshop()
	{
		$loai=loaisanpham::where('active',1)->get();
		$dvt=donvitinh::where('active',1)->get();
		$shop=shop::where('user_id',Auth::user()->id)->first();
		$lohang=lohang::where('shop_id',$shop->id)->get();
		return view('shop_user.sanpham.themsp',compact('loai','dvt','shop','lohang'));
	}

	public function postThemsanphamshop(Request $req)
	{
		$sanpham=new sanpham();
		$sanpham->shop_id=$req->c1;
		$sanpham->lohang_id=$req->c2;
		$sanpham->sanpham_ten=$req->c3;
		$sanpham->sanpham_anh=$req->c4;
		$sanpham->sanpham_mo_ta=$req->c5;
		$sanpham->loaisanpham_id=$req->c6;
		$sanpham->donvitinh_id=$req->c7;
		$sanpham->gia_tien=$req->c8;
		$sanpham->phan_tram_km=$req->c9;
		$sanpham->active=$req->c10;
		$sanpham->new=$req->c11;
		$sanpham->save();

		return redirect()->route('quanlyshop')->with('thongbao_loi_004','Thêm sản phẩm thành công');
	}

	public function getXemsanphamshop()
	{
		$shop=shop::where('user_id',Auth::user()->id)->first();
		$sanpham=sanpham::where('shop_id',$shop->id)->paginate(8);
		return view('shop_user.sanpham.xemsp',compact('sanpham'));
	}


	public function getSuasanphamshop($id)
	{
		$loai=loaisanpham::where('active',1)->get();
		$dvt=donvitinh::where('active',1)->get();
		$shop=shop::where('user_id',Auth::user()->id)->first();
		$lohang=lohang::where('shop_id',$shop->id)->get();
		$sanpham=sanpham::where('id',$id)->first();
		return view('shop_user.sanpham.suasp',compact('loai','dvt','shop','lohang','sanpham'));
	}

	public function postSuasanphamshop(Request $req,$id)
	{
		$sanpham=sanpham::find($id);
		$sanpham->lohang_id=$req->c2;
		$sanpham->sanpham_ten=$req->c3;
		$sanpham->sanpham_anh=$req->c4;
		$sanpham->sanpham_mo_ta=$req->c5;
		$sanpham->loaisanpham_id=$req->c6;
		$sanpham->donvitinh_id=$req->c7;
		$sanpham->gia_tien=$req->c8;
		$sanpham->phan_tram_km=$req->c9;
		$sanpham->active=$req->c10;
		$sanpham->new=$req->c11;
		$sanpham->save();
		return redirect()->route('xemsanphamshop')->with('thongbao_004','Sửa sản phẩm thành công');
	}

	public function getXoasanphamshop($id)
	{
		$sanpham=sanpham::find($id);
		$sanpham->delete();
        return redirect()->route('xemsanphamshop')->with('thongbao_30','success');
	}

	public function import()
	{
		Excel::import(new sanpham_Import,request()->file('file'));
           
        return back();
	}

	public function getexport()
	{
		return Excel::download(new sanpham_Export, 'sanphamshop.xlsx');
	}
/*----------------------------kh----------------------------------*/
	
	public function getKhachhang()
	{
		$year=Carbon::now()->year;
		$shop=shop::where('user_id',Auth::user()->id)->first();
		$khach=Db::table('khachhang')->where('shop_id',$shop->id)
						->where(DB::raw("year(created_at)"),'=',$year)
						//->unique('khachhang_id')	
						->paginate(8);
		return view('shop_user.khachhang.xem',compact('khach','shop'));
	}

	public function getSuaKhachhang($id)
	{	
		$khach=khachhang::where('id',$id)->first();
		return view('shop_user.khachhang.sua',compact('khach'));
	}

	public function postSuaKhachhang($id,Request $req)
	{
		$khach=khachhang::find($id);
		$khach->khachhang_ten=$req->c1;
		$khach->khachhang_email=$req->c2;
		$khach->khachhang_sdt=$req->c3;
		$khach->khachhang_dia_chi=$req->c4;
		$khach->user_id=$req->c5;
		$khach->save();
		return redirect()->route('khachhangshop')->with('thongbao_30','Sửa sản phẩm thành công');
	}

	public function getXoaKhachhang($id)
	{
		$khach=khachhang::find($id);
		$ctdh=donhang::where('khachhang_id',$id)->count();
        if($ctdh>0){
            return redirect()->route('khachhangshop')->with('thongbao_30','bạn cần xóa bên đơn hàng trước');
        }else{
            $khach->delete();
			return redirect()->route('khachhangshop')->with('thongbao_30','Sửa sản phẩm thành công');
        }
		
	}
/*-------------------------------dh---------------------------*/
	public function getdonhangshop()
	{
		$year=Carbon::now()->year;
		$shop=shop::where('user_id',Auth::user()->id)->first();
		$ttdh=tinhtranghd::all();
		$donhang=donhang::where('shop_id',$shop->id)
					->where(DB::raw("year(created_at)"),'=',$year)
					->paginate(8);
		return view('shop_user.donhang.xem',compact('donhang','tthd'));
	}

	public function getsuadonhangshop($id)
	{
		$ttdh=tinhtranghd::all();
		$donhang=donhang::where('id',$id)->first();
		return view('shop_user.donhang.sua',compact('ttdh','donhang'));
	}

	public function postsuadonhangshop($id,Request $req)
	{
		$donhang=donhang::find($id);
		$donhang->donhang_nguoi_nhan=$req->c1;
		$donhang->donhang_nguoi_nhan_email=$req->c2;
		$donhang->donhang_nguoi_nhan_sdt=$req->c3;
		$donhang->donhang_nguoi_nhan_dia_chi=$req->c4;
		$donhang->tinhtranghd_id=$req->c5;
		$donhang->save();
		return redirect()->route('donhangshop')->with('thongbao_30','Sửa sản phẩm thành công');
	}
//->pluck('*'):lay theo *
//->unique():lay ra gia trị khong chùng
	public function getXoadonhangshop($id)
	{
		$dh=donhang::find($id);
        $ctdh=chitietdonhang::where('donhang_id',$id)->count();
        if($ctdh>0){
            return redirect()->route('donhangshop')->with('thongbao_loi_30','bạn cần xóa bên chi tiết đơn hàng trước');
        }else{
        	$ttc=thong_tin_chung_shop::where('donhang_id',$id)->first();
        	$ttc->delete();
            $dh->delete();
            return redirect()->route('donhangshop')->with('thongbao_30','success');
        }
	}
/*--------------------------------------hoadon-------------------------*/
	public function gethoadonshop()
	{
		$year=Carbon::now()->year;
		$shop=shop::where('user_id',Auth::user()->id)->first();
		$chitietdonhang=chitietdonhang::where('shop_id',$shop->id)
					->where(DB::raw("year(created_at)"),'=',$year)
					->paginate(8);
		return view('shop_user.hoadon.xem',compact('chitietdonhang'));
	}

	public function getbienlai($id)
	{
		$shop=shop::where('user_id',Auth::user()->id)->first();
		$ttbl=khachhang::where('id',$id)->first();
		return view('shop_user.hoadon.bienlai',compact('ttbl'));
	}

	public function getxoahoadonshop($id)
	{
		$donhang=chitietdonhang::find($id);
		$donhang->delete();
		return redirect()->route('hoadonshop')->with('thongbao_30','Xóa sản phẩm thành công');
	}
/*---------------------------------lh-------------------------*/
	public function getLohang()
	{
		$shop=shop::where('user_id',Auth::user()->id)->first();
		$lohang=lohang::where('shop_id',$shop->id)->paginate(8);
		return view('shop_user.lohang.xem',compact('lohang'));
	}

	public function getThemlohang()
    {
        $shop=shop::where('user_id',Auth::user()->id)->first();
        $ncc=nhacungcap::all();
        return view('shop_user.lohang.them',compact('shop','ncc'));
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
        $shop=shop::where('user_id',Auth::user()->id)->first();
        $ncc=nhacungcap::all();
        return view('shop_user.lohang.sua',compact('lhx','shop','ncc'));
    }

    public function postSualohang(Request $req,$id)
    {
        $lh= lohang::find($id);
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
        return redirect()->route('lohangshop')->with('thongbao_24','Sử thành công');
    }

    public function getXoalohang($id)
    {
        $lh=lohang::find($id);
        $lh->delete();
        return redirect()->route('lohangshop')->with('thongbao_30','success');
    }

    public function getexportlohang()
	{
		return Excel::download(new lohang_Export, 'lohangshop.xlsx');
	}
/*-------------------------------------shop----------------------------*/
	public function getShop($id,Request $req)
	{
		
		$anhslide=quangcao::where('quangcao_trang_thai',1)->get();
		$spshop=DB::table('shop_sl')->where('shop_id',$id)->paginate(6);
		$shop=shop::find($id);
		$slideshop=quangcaoshop::where('active',1)->where('shop_id',$id)->get();
		$menu=loaisanpham::all();
		return view('shop_user.shop',compact('anhslide','spshop','shop','menu','slideshop'));
	}	

/*----------------------search shop-----------------------------*/
	public function getsearchshop(Request $req)
	{
		$shop=shop::where('user_id',Auth::user()->id)->first();
		$product=sanpham::where('sanpham_ten','like','%'.$req->skey.'%')
				->Where('shop_id',$shop->id)
                ->orWhere('gia_tien',$req->skey)
                ->paginate(8);
		return view('shop_user.searchshop',compact('product'));
	}
/*-------------------san pham shop----------------------------------*/
	public function getLoaisanphamshop($id_type,$id)
	{
		$shop=shop::find($id);
		$sp_theoloai=DB::table('shop_sl')->where('loaisanpham_id','=',$id_type)
						->where('shop_id',$shop->id)
						->paginate(3);
		$sp_khac=DB::table('shop_sl')->where('loaisanpham_id','<>',$id_type)
									->where('shop_id',$shop->id)
									->paginate(3);
		$loai=loaisanpham::all();
		$ten_sp=loaisanpham::where('id',$id_type)->first();
		if(count($sp_theoloai)>0){
			return view('user.loaisanphamshop',compact('sp_theoloai','loai','sp_khac','ten_sp','shop'));
		}else{
			return redirect()->back()->with('thongbao','chúng tôi đang cập nhật');
		}
	}
/*------------------------getXemslide----------------------------*/    
    public function getXemslideshop()
    {
    	$shop=shop::where('user_id',Auth::user()->id)->first();
        $quangcaoshop=quangcaoshop::where('shop_id',$shop->id)->paginate(4);
        return view('shop_user.quangcaoshop.xem',compact('quangcaoshop'));
    }  

    public function getThemslideshop()
    {
        return view('shop_user.quangcaoshop.them');
    }

    public function postThemslideshop(Request $req)
    {
    	$shop=shop::where('user_id',Auth::user()->id)->first();
        $qc=new quangcaoshop();
        $qc->anh=$req->anh;
        $qc->active=$req->active;
        $qc->mota=$req->mota;
        $qc->shop_id=$shop->id;
        $qc->save();
        return redirect()->back()->with('thongbao_5','Thêm thành công');
    }

    public function getSuaslideshop($id)
    {
        $sl=quangcaoshop::where('id','=',$id)->first();
        return view('shop_user.quangcaoshop.sua',compact('sl'));
    }

    public function postSuaslideshop(Request $req,$id)
    {
    	$shop=shop::where('user_id',Auth::user()->id)->first();
        $sl=quangcaoshop::find($id);
        $sl->anh=$req->anh;
        $sl->active=$req->active;
        $sl->mota=$req->mota;
        $sl->shop_id=$shop->id;
        $sl->save();
        return redirect()->route('xem_slide_shop')->with('thongbao_20','Sửa thành công');
    }

    public function getXoaslideshop($id)
    {
        $sl=quangcaoshop::find($id);
        $sl->delete();
        return redirect()->route('xem_slide_shop')->with('thongbao_30','success');
    }
}
