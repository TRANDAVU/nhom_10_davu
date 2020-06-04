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
use SimpleSoftwareIO\QrCode\Facades\QrCode;
session_start(); 

class Usercontroller extends Controller
{
	public function getSearch(Request $request)
    {
    	$sanpham=DB::table('shop_sl')->where('sanpham_ten','like','%'.$request->key.'%')
                ->orWhere('gia_tien',$request->key)
                ->paginate(8);
        return view('user.search',compact('sanpham'));
    }
/*---------------------trang chu------------------*/
    public function getIndex()
    {
    	$anhslide=quangcao::where('quangcao_trang_thai',1)->get();
    	$new_product =DB::table('shop_sl')->where('active','=',1)->paginate(4);
    	$sanpham_giamgia =DB::table('shop_sl')->where('phan_tram_km','>',0)->paginate(8);
    	return view('user.trangchu',compact('anhslide','new_product','sanpham_giamgia'));
    }

/*------------------------dn-dk-dx-----------------*/
	public function getDangky()
	{
		return view('user.singup');
	}

	public function postDangky(Request $req)
	{
		$this->validate($req,
        [
            'email'=>'required|unique:users',
            'password'=>'required|min:6|max:20',
            'password,repassword'=>'confirmed',
            'name'=>'required'
        ]
        ,
        [    
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Vui lòng nhập mật khẩu ít nhất 6 ký tự',
            'password.max'=>'Vui lòng nhập mật khẩu không quá 20 ký tự',
            'repassword_confirmation'=>'Mật khẩu và xác nhận mật khẩu không chính xác',


        ]);
        $user = new User();
        $user->email=$req->email;
        $user->name=$req->name;
        $user->diachi=$req->address;
        $user->sodienthoai=$req->phone;
        $user->password=Hash::make($req->password);
        $user->save();
        return view('user.singin');
	}

	public function getDangnhap()
	{
		//dd(Hash::make('123456789'));
		return view('user.singin');
	}

	public function postDangnhap(Request $req)
	{
		$this->validate($req,
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ]
        ,
        [
            'email.required'=>'Vui lòng nhập lại email',
            'email.email'=>'Không đúng định dạng email',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Vui lòng nhập mật khẩu ít nhất 6 ký tự'
        ]);
        $credentials=array('email'=>$req->email,'password'=>$req->password);
        
        if(Auth::attempt($credentials,true) ){
            return redirect()->route('trangchu');
        }
        else{
            return redirect()->back();
        }
	}

	public function getDangxuat()
	{
		Auth::logout();
		Cart::destroy();
        return redirect()->route('trangchu');
	}

	public function getcapnhatthongtin($id)
	{
		if(Auth::check()==true)
		{
			$user=User::where('id',Auth::user()->id)->first();
			return view('user.capnhatthongtin',compact('user'));
		}
		else{
			return redirect()->route('trangchu')->with('thongbao','Bạn cần đăng nhập để dùng chức năng này');
		}
	}

	public function postcapnhatthongtin($id,Request $req)
	{
		$user=user::find($id);
		$user->avatar=$req->c1;
		$user->name=$req->c2;
		$user->email=$req->c3;
		$user->diachi=$req->c4;
		$user->sodienthoai=$req->c5;
		$user->password=Hash::make($req->c6);
		$user->save();
		return redirect()->route('trangchu')->with('thongbao','cập nhật thông tin thành công');
	}

/*-----------------------loai san pham----------------*/
	public function getLoaisanpham(Request $req,$id_type)
	{
		$sp_theoloai=DB::table('shop_sl')->where('loaisanpham_id','=',$id_type)->paginate(3);
		$sp_khac=DB::table('shop_sl')->where('loaisanpham_id','<>',$id_type)->paginate(3);
		$loai=loaisanpham::all();
		$ten_sp=loaisanpham::where('id',$id_type)->first();
		return view('user.loaisanpham',compact('sp_theoloai','loai','sp_khac','ten_sp'));
	}
/*------------------------san pham------------------------*/
	public function getSanpham(Request $req)
	{
		$sanpham=sanpham::where('id',$req->id)->first();
		$donvi=DB::table('donvitinh')
						->join('sanpham','sanpham.donvitinh_id','=','donvitinh.id')
						->where('donvitinh.id','=',$sanpham->donvitinh_id)
						->select('donvitinh.donvitinh_ten')
						->groupby('donvitinh.donvitinh_ten')
						->get();
		$sanpham_tuongtu=sanpham::where('id',$sanpham->id)->paginate(3);
		$sanphammoi=sanpham::where('new',1)->paginate(5);
		$soluong=sanpham::join('lohang','sanpham.lohang_id','lohang.id')
					->where('lohang.id','=',$sanpham->lohang_id)
					->select('lohang.lohang_so_luong_hien_tai as sl')
					->first();
					//dd($req->donvi);
		
        return view('user.chitietsanpham',compact('sanpham','donvi','sanpham_tuongtu','sanphammoi','soluong'));    
        
		
		
	}
/*------------------------gioi thieu------------------------*/
	public function getGioithieu()
	{
		$thongtin=loaisanpham::all();
		$thongtinweb=DB::table('thanhlapweb')->get();
		return view('user.gioithieu',compact('thongtin','thongtinweb'));
	}

	public function postLienhe(Request $req)
	{
		$data=['hoten'=>$req->your_name,'title'=>$req->your_subject,'email'=>$req->editor1,'tinnhan'=>$req->your_message];
        Mail::send('mail.mail',$data,function($mes){
            $mes->from('thienthanma521@gmail.com');
            $mes->to('thienthanma521@gmail.com','hi tech')->subject('mail admin gui');
        });
        return redirect()->route('lienhe')->with('thongbao8','Thông tin của bạn sẽ sớm được phản hồi');
	}
/*------------------------mon ngon------------------------*/
	public function getMonngon()
	{
		$monngon=monngon::where('active',1)->get();
		return view('user.monngon',compact('monngon'));
	}
/*------------------------gio-hang------------------*/
	public function getGiohang()
	{
		if(Cart::count()>0){
			return view('user.shopping_cart');
		}else{
			return  redirect()->route('trangchu')->with('thongbao_2','Không thể vào giỏ hàng của bạn vì giỏ hàng đang trống ');
		}
		
	}

/*------------------------lien he------------------------*/
	public function getLienhe()
	{
		return view('user.lienhe');
	}
/*------------------------dat hang------------------------*/
	public function getDathang(Request $req)
	{
		if(Auth::check()==true && Cart::count()>0){
			$user=DB::table('users')->where('id',Auth::user()->id)->first();
			$mes=sanpham::where('id',$req->idsanpham)->select('sanpham_mo_ta')->get();
			return view('user.dathang',compact('user'));
		}
		else{
			return  redirect()->route('giohang')->with('thongbao','Bạn nên đăng nhập trước');
		}
	}

	function kiemtra()
	{
		$content=Cart::content();
		$input = array();
		$i=0;
		foreach ($content as $value) {
			$input[$i] = $value->options->shop_id;
			$i++;
			$result = array_unique($input);
		}
		
		if(count($result)==1){
			return 1;
		}
		else{
			return 2;
		}
	}

	public function postDathang(Request $req)
	{
		//dd(Usercontroller::kiemtra());
		if(Usercontroller::kiemtra()==2&&Auth::check()==true){
			
				$content=Cart::content();
				foreach ($content as $key =>$cart) {
					$khachhang=new khachhang;
					$khachhang->khachhang_ten=$req->name;
					$khachhang->khachhang_email=$req->email;
					$khachhang->khachhang_sdt=$req->phone;
					$khachhang->khachhang_dia_chi=$req->address;
					$khachhang->user_id=$req->khachhang_id;
					$khachhang->shop_id=$cart->options->shop_id;
					$khachhang->save();



					$donhang=new donhang;
					$donhang->shop_id=$cart->options->shop_id;
				    $donhang->donhang_nguoi_nhan=$khachhang->khachhang_ten;
				    $donhang->donhang_nguoi_nhan_email=$khachhang->khachhang_email;
				    $donhang->donhang_nguoi_nhan_sdt=$khachhang->khachhang_sdt;
				    $donhang->donhang_nguoi_nhan_dia_chi=$khachhang->khachhang_dia_chi;
				    $donhang->donhang_ghi_chu=$req->your_message;
				    $donhang->donhang_tong_tien=$req->total_price;
				    $donhang->hinhthucthanhtoan=$req->payment_method;
				    $donhang->khachhang_id=$khachhang->id;
				    $donhang->tinhtranghd_id=$req->tinhtranghd_id;
					$donhang->save();

					$thong_tin_chung_shop=new thong_tin_chung_shop();
					$thong_tin_chung_shop->shop_id=$cart->options->shop_id;
					$thong_tin_chung_shop->user_id=$khachhang->user_id;
					$thong_tin_chung_shop->donhang_id=$donhang->id;
					$thong_tin_chung_shop->khachhang_id=$khachhang->id;
					$thong_tin_chung_shop->save();

	                $chitiethoadon=new chitietdonhang;
	                $chitiethoadon->sanpham_id=$cart->id;
	                $chitiethoadon->shop_id=$cart->options->shop_id;
	                $chitiethoadon->sanpham_anh=$cart->options->image;
	                $chitiethoadon->donhang_id=$donhang->id;
	                $chitiethoadon->chitietdonhang_so_luong=$cart->qty;
	                $chitiethoadon->chitietdonhang_thanh_tien=$cart->price;
	                $chitiethoadon->save();

	                $idLH= Db::table('lohang')->where('id',$cart->options->lohang_id)->first();
		    		$lohang= DB::table('lohang')->where('id',$idLH->id)->first();
	                DB::table('lohang')
	                		->where('id',$idLH->id) 
	                		->update([
	                			'lohang_so_luong_hien_tai' =>
	                				$lohang->lohang_so_luong_hien_tai-$chitiethoadon->chitietdonhang_so_luong,
								'lohang_so_luong_da_ban' =>
									$lohang->lohang_so_luong_da_ban+$chitiethoadon->chitietdonhang_so_luong,
	                		]);
	                //dd($idLH);
					$data=[
	                    'ten_khach_hang'=>$khachhang->khachhang_ten,
	                    'email'=>$khachhang->khachhang_email,
	                    'id'=>$chitiethoadon->sanpham_id,
	                    'tao_don'=>$donhang->created_at,
	                    'nguoi_nhan'=>$khachhang->khachhang_ten,
	                    'diachi'=>$donhang->donhang_nguoi_nhan_dia_chi,
	                    'so_dien_thoai'=>$donhang->donhang_nguoi_nhan_sdt
	                ];  
	        	}

	        	Mail::send('mail.xacthucDH',$data,function($mes) use($data){
	                $mes->from('thienthanma521@gmail.com');
	                $mes->to($data['email'])->subject('mail đặt hàng');
	            });

	            Cart::destroy();
				return redirect()->route('trangchu')->with('thongbao_1','Cảm ơn bạn đã tin tưởng chúng tôi ');
		}
		elseif(Auth::check()==true&&Usercontroller::kiemtra()==1){
			
				$khachhang=new khachhang;
				$khachhang->khachhang_ten=$req->name;
				$khachhang->khachhang_email=$req->email;
				$khachhang->khachhang_sdt=$req->phone;
				$khachhang->khachhang_dia_chi=$req->address;
				$khachhang->user_id=$req->khachhang_id;
				$khachhang->shop_id=$req->shop;
				$khachhang->save();

				$donhang=new donhang;
				$donhang->shop_id=$req->shop;
				$donhang->donhang_nguoi_nhan=$khachhang->khachhang_ten;
				$donhang->donhang_nguoi_nhan_email=$khachhang->khachhang_email;
				$donhang->donhang_nguoi_nhan_sdt=$khachhang->khachhang_sdt;
				$donhang->donhang_nguoi_nhan_dia_chi=$khachhang->khachhang_dia_chi;
				$donhang->donhang_ghi_chu=$req->your_message;
				$donhang->donhang_tong_tien=$req->total_price;
				$donhang->hinhthucthanhtoan=$req->payment_method;
				$donhang->khachhang_id=$khachhang->id;
				$donhang->tinhtranghd_id=$req->tinhtranghd_id;
				$donhang->save();

				$content=Cart::content();
				foreach ($content as $key =>$cart) {
					

					$thong_tin_chung_shop=new thong_tin_chung_shop();
					$thong_tin_chung_shop->shop_id=$cart->options->shop_id;
					$thong_tin_chung_shop->user_id=$khachhang->user_id;
					$thong_tin_chung_shop->donhang_id=$donhang->id;
					$thong_tin_chung_shop->khachhang_id=$khachhang->id;
					$thong_tin_chung_shop->save();

	                $chitiethoadon=new chitietdonhang;
	                $chitiethoadon->sanpham_id=$cart->id;
	                $chitiethoadon->shop_id=$cart->options->shop_id;
	                $chitiethoadon->sanpham_anh=$cart->options->image;
	                $chitiethoadon->donhang_id=$donhang->id;
	                $chitiethoadon->chitietdonhang_so_luong=$cart->qty;
	                $chitiethoadon->chitietdonhang_thanh_tien=$cart->price;
	                $chitiethoadon->save();

	                $idLH= Db::table('lohang')->where('id',$cart->options->lohang_id)->first();
		    		$lohang= DB::table('lohang')->where('id',$idLH->id)->first();
	                DB::table('lohang')
	                		->where('id',$idLH->id) 
	                		->update([
	                			'lohang_so_luong_hien_tai' =>
	                				$lohang->lohang_so_luong_hien_tai-$chitiethoadon->chitietdonhang_so_luong,
								'lohang_so_luong_da_ban' =>
									$lohang->lohang_so_luong_da_ban+$chitiethoadon->chitietdonhang_so_luong,
	                		]);
	                //dd($idLH);
					$data=[
	                    'ten_khach_hang'=>$khachhang->khachhang_ten,
	                    'email'=>$khachhang->khachhang_email,
	                    'id'=>$chitiethoadon->sanpham_id,
	                    'tao_don'=>$donhang->created_at,
	                    'nguoi_nhan'=>$khachhang->khachhang_ten,
	                    'diachi'=>$donhang->donhang_nguoi_nhan_dia_chi,
	                    'so_dien_thoai'=>$donhang->donhang_nguoi_nhan_sdt
	                ];  
	        	}

	        	Mail::send('mail.xacthucDH',$data,function($mes) use($data){
	                $mes->from('thienthanma521@gmail.com');
	                $mes->to($data['email'])->subject('mail đặt hàng');
	            });

	            Cart::destroy();
				return redirect()->route('trangchu')->with('thongbao_1','Cảm ơn bạn đã tin tưởng chúng tôi ');
		}
		else{
				return  redirect()->route('dathang')->with('thongbao0','Bạn nên đăng nhập trước');
			}
		
	}	
}
