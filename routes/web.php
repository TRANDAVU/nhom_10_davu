<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*-------------------------trang chu------*/
Route::get('/', [
    'as' => 'trangchu', 
    'uses' => 'Usercontroller@getIndex'
]);
/*-------------------------dn-dk----------*/
Route::get('dang-ky-user', [
    'as' => 'dangkyuser', 
    'uses' => 'Usercontroller@getDangky'
]);


Route::post('dang-ky-user', [
    'as' => 'dangkyuser', 
    'uses' => 'Usercontroller@postDangky'
]);

Route::get('dang-nhap', [
    'as' => 'dangnhap', 
    'uses' => 'Usercontroller@getDangnhap'
]);

Route::post('dang-nhap', [
    'as' => 'dangnhap', 
    'uses' => 'Usercontroller@postDangnhap'
]);

Route::get('dang-xuat', [
    'as' => 'dangxuat', 
    'uses' => 'Usercontroller@getDangxuat'
]);

Route::get('cap-nhat-thong-tin/{id}', [
    'as' => 'capnhatthongtin', 
    'uses' => 'Usercontroller@getcapnhatthongtin'
]);

Route::post('cap-nhat-thong-tin/{id}', [
    'as' => 'capnhatthongtin', 
    'uses' => 'Usercontroller@postcapnhatthongtin'
]);

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');
/*---------------------------shopping cart-----*/
Route::get('gio-hang', [
    'as' => 'giohang', 
    'uses' => 'Usercontroller@getGiohang'
]);

/*---------------------------them vao gio hang---*/

Route::post('/save-cart', 'giohangcontroller@save_cart');
Route::get('/delete-to-cart/{rowId}', 'giohangcontroller@delete_to_cart');
Route::post('/Update-cart', 'giohangcontroller@update_cart');

/*---------------------------loai san pham-----*/

Route::get('loai-san-pham/{id_type}', [
    'as' => 'loaisanpham', 
    'uses' => 'Usercontroller@getLoaisanpham'
]);
/*---------------------------san pham-----*/
Route::get('san-pham/{id}', [
    'as' => 'sanpham', 
    'uses' => 'Usercontroller@getSanpham'
]);
/*---------------------------lien he-----*/
Route::get('lien-he', [
    'as' => 'lienhe', 
    'uses' => 'Usercontroller@getLienhe'
]);

Route::post('lien-he', [
    'as' => 'lienhe', 
    'uses' => 'Usercontroller@postLienhe'
]);
/*---------------------------dat hang-----*/
Route::get('dat-hang', [
    'as' => 'dathang', 
    'uses' => 'Usercontroller@getDathang'
]);

Route::post('dat-hang', [
    'as' => 'dathang', 
    'uses' => 'Usercontroller@postDathang'
]);

/*---------------------------gioi thieu-----*/
Route::get('gioi-thieu', [
    'as' => 'gioithieu', 
    'uses' => 'Usercontroller@getGioithieu'
]);
/*---------------------------mon ngon-----*/
Route::get('mon-ngon', [
    'as' => 'monngon', 
    'uses' => 'Usercontroller@getMonngon'
]);
/*---------------------------search-----*/
Route::get('search', [
    'as' => 'search', 
    'uses' => 'Usercontroller@getSearch'
]);

/*---------------------------shop user-----*/
Route::get('quan-ly-shop', [
    'as' => 'quanlyshop', 
    'uses' => 'Shopusercontroller@getQuanlyshop'
]);

/*--------------------------admin-----------*/

Route::group(['prefix'=>'admin','middleware'=>'checklogin'],function(){
/*--------------------------login admin----*/
    Route::get('dang-xuat-admin', [
    'as' => 'dangxuatadmin', 
    'uses' => 'Admincontroller@getDangxuatadmin'
    ]);
/*-----------------------home admin--------*/
    Route::get('/', [
        'as' => 'admin_home', 
        'uses' => 'Admincontroller@getAdmin'
    ]);

/*-----------------------quang cao--------1*/
    Route::get('xem-slide', [
        'as' => 'xem_slide', 
        'uses' => 'Admincontroller@getXemslide'
    ]);

    Route::get('them-slide', [
        'as' => 'themslide', 
        'uses' => 'Admincontroller@getThemslide'
    ]);

    Route::post('them-slide', [
        'as' => 'themslide', 
        'uses' => 'Admincontroller@postThemslide'
    ]);

    Route::get('sua-slide/{id}', [
        'as' => 'Sua_slide', 
        'uses' => 'Admincontroller@getSuaslide'
    ]);

    Route::post('sua-slide/{id}', [
        'as' => 'Sua_slide', 
        'uses' => 'Admincontroller@postSuaslide'
    ]);

    Route::get('xoa-slide/{id}', [
        'as' => 'xoaslide', 
        'uses' => 'Admincontroller@getXoaslide'
    ]);
/*-----------------------donhang--------2*/
    Route::get('don-hang', [
        'as' => 'donhang', 
        'uses' => 'Admincontroller@getDonhang'
    ]);
    
    Route::get('xoa-don-hang/{id}', [
        'as' => 'xoadonhang', 
        'uses' => 'Admincontroller@getXoadonhang'
    ]);
    
/*-----------------------chi_tiet_don_hang--------3*/
   Route::get('chi-tiet-don-hang', [
        'as' => 'chitietdonhang', 
        'uses' => 'Admincontroller@getChitietdonhang'
    ]);    

   
    Route::get('xoa-chi-tiet-don-hang/{id}', [
        'as' => 'xoachitietdonhang', 
        'uses' => 'Admincontroller@getXoachitietdonhang'
    ]);
    
/*-----------------------don_vi_tinh--------4*/
    Route::get('don-vi-tinh', [
        'as' => 'don_vi_tinh', 
        'uses' => 'Admincontroller@getDonvitinh'
    ]);

    Route::get('them-don-vi-tinh', [
        'as' => 'themdonvitinh', 
        'uses' => 'Admincontroller@getThemdonvitinh'
    ]);

    Route::post('them-don-vi-tinh', [
        'as' => 'themdonvitinh', 
        'uses' => 'Admincontroller@postThemdonvitinh'
    ]);

    Route::get('sua-don-vi-tinh/{id}', [
        'as' => 'Suadonvitinh', 
        'uses' => 'Admincontroller@getSuadonvitinh'
    ]);

    Route::post('sua-don-vi-tinh/{id}', [
        'as' => 'Suadonvitinh', 
        'uses' => 'Admincontroller@postSuadonvitinh'
    ]);

    
    Route::get('xoa-don-vi-tinh/{id}', [
        'as' => 'xoadonvitinh', 
        'uses' => 'Admincontroller@getXoadonvitinh'
    ]);
    
/*-----------------------khach hang--------5*/
    Route::get('khach-hang', [
        'as' => 'khachhang', 
        'uses' => 'Admincontroller@getKhachhang'
    ]);

    
    Route::get('xoa-khach-hang/{id}', [
        'as' => 'xoakhachhang', 
        'uses' => 'Admincontroller@getXoakhachhang'
    ]);
    
/*-----------------------loai nguoi dung--------6*/
    Route::get('loai-nguoi-dung', [
        'as' => 'loainguoidung', 
        'uses' => 'Admincontroller@getLoainguoidung'
    ]);

    Route::get('them-loai-nguoi-dung', [
        'as' => 'themloainguoidung', 
        'uses' => 'Admincontroller@getThemloainguoidung'
    ]);

    Route::post('them-loai-nguoi-dung', [
        'as' => 'themloainguoidung', 
        'uses' => 'Admincontroller@postThemloainguoidung'
    ]);

    Route::get('sua-loai-nguoi-dung/{id}', [
        'as' => 'sualoainguoidung', 
        'uses' => 'Admincontroller@getThemloainguoidung'
    ]);

    Route::post('sua-loai-nguoi-dung/{id}', [
        'as' => 'sualoainguoidung', 
        'uses' => 'Admincontroller@postThemloainguoidung'
    ]);

    
    Route::get('xoa-loai-nguoi-dung/{id}', [
        'as' => 'xoaloainguoidung', 
        'uses' => 'Admincontroller@getXoaloainguoidung'
    ]);
    
/*-----------------------loai san pham--------7*/
    Route::get('loai-san-pham', [
        'as' => 'loaisanphamall', 
        'uses' => 'Admincontroller@getLoaisanpham'
    ]);

    Route::get('them-loai-san-pham', [
        'as' => 'themloaisanphamall', 
        'uses' => 'Admincontroller@getThemloaisanpham'
    ]);

    Route::post('them-loai-san-pham', [
        'as' => 'themloaisanphamall', 
        'uses' => 'Admincontroller@postThemloaisanpham'
    ]);

    Route::get('sua-loai-san-pham/{id}', [
        'as' => 'sualoaisanphamall', 
        'uses' => 'Admincontroller@getSualoaisanpham'
    ]);

    Route::post('sua-loai-san-pham/{id}', [
        'as' => 'sualoaisanphamall', 
        'uses' => 'Admincontroller@postSualoaisanpham'
    ]);

    
    Route::get('xoa-loai-san-pham/{id}', [
        'as' => 'xoaloaisanphamall', 
        'uses' => 'Admincontroller@getXoaloaisanphamall'
    ]);
    
/*-----------------------lo hang--------8*/
    Route::get('lo-hang', [
        'as' => 'lohang', 
        'uses' => 'Admincontroller@getLohang'
    ]);

    Route::get('them-lo-hang', [
        'as' => 'themlohang', 
        'uses' => 'Admincontroller@getThemlohang'
    ]);

    Route::post('them-lo-hang', [
        'as' => 'themlohang', 
        'uses' => 'Admincontroller@postThemlohang'
    ]);

    Route::get('sua-lo-hang/{id}', [
        'as' => 'sualohang', 
        'uses' => 'Admincontroller@getSualohang'
    ]);

    Route::post('sua-lo-hang/{id}', [
        'as' => 'sualohang', 
        'uses' => 'Admincontroller@postSualohang'
    ]);

    
    Route::get('xoa-lo-hang/{id}', [
        'as' => 'xoalohang', 
        'uses' => 'Admincontroller@getXoalohang'
    ]);
    
/*-----------------------mon ngon--------9*/
    Route::get('mon-ngon-all', [
        'as' => 'monngonall', 
        'uses' => 'Admincontroller@getMonngon'
    ]);

    Route::get('them-mon-ngon', [
        'as' => 'themmonngon', 
        'uses' => 'Admincontroller@getthemmonngon'
    ]);

    Route::post('them-mon-ngon', [
        'as' => 'themmonngon', 
        'uses' => 'Admincontroller@postthemmonngon'
    ]);

    Route::get('sua-mon-ngon/{id}', [
        'as' => 'suamonngon', 
        'uses' => 'Admincontroller@getSuamonngon'
    ]);

    Route::post('sua-mon-ngon/{id}', [
        'as' => 'suamonngon', 
        'uses' => 'Admincontroller@postSuamonngon'
    ]);

    
    Route::get('xoa-mon-ngon-all/{id}', [
        'as' => 'xoamonngon', 
        'uses' => 'Admincontroller@getXoamonngon'
    ]);
    
/*-----------------------nha cung cap--------11*/
    Route::get('nha-cung-cap', [
        'as' => 'nhacungcap', 
        'uses' => 'Admincontroller@getNhacungcap'
    ]);

    Route::get('them-nha-cung-cap', [
        'as' => 'themnhacungcap', 
        'uses' => 'Admincontroller@getThemnhacungcap'
    ]);

    Route::post('them-nha-cung-cap', [
        'as' => 'themnhacungcap', 
        'uses' => 'Admincontroller@postThemnhacungcap'
    ]);

    Route::get('sua-nha-cung-cap/{id}', [
        'as' => 'suanhacungcap', 
        'uses' => 'Admincontroller@getSuanhacungcap'
    ]);

    Route::post('sua-nha-cung-cap/{id}', [
        'as' => 'suanhacungcap', 
        'uses' => 'Admincontroller@postSuanhacungcap'
    ]);

    
    Route::get('xoa-nha-cung-cap/{id}', [
        'as' => 'xoanhacungcap', 
        'uses' => 'Admincontroller@getXoanhacungcap'
    ]);
    
/*-----------------------nhan vien--------12*/
    Route::get('nhan-vien', [
        'as' => 'nhanvien', 
        'uses' => 'Admincontroller@getNhanvien'
    ]);

    
    Route::get('xoa-nhan-vien/{id}', [
        'as' => 'xoanhanvien', 
        'uses' => 'Admincontroller@getXoanhanvien'
    ]);
    
/*-----------------------san pham--------12*/
    Route::get('san-pham-all', [
        'as' => 'sanphamall', 
        'uses' => 'Admincontroller@getSanpham'
    ]);

    
    Route::get('xoa-san-pham-all/{id}', [
        'as' => 'xoasanphamall', 
        'uses' => 'Admincontroller@getXoasanphamall'
    ]);
    
/*-----------------------shop--------14*/
    Route::get('shop', [
        'as' => 'shop', 
        'uses' => 'Admincontroller@getShop'
    ]);

    Route::get('them-shop', [
        'as' => 'themshop', 
        'uses' => 'Admincontroller@getThemshop'
    ]);

    Route::post('them-shop', [
        'as' => 'themshop', 
        'uses' => 'Admincontroller@postThemshop'
    ]);

    Route::get('sua-shop/{id}', [
        'as' => 'suashop', 
        'uses' => 'Admincontroller@getSuashop'
    ]);

    Route::post('sua-shop/{id}', [
        'as' => 'suashop', 
        'uses' => 'Admincontroller@postSuashop'
    ]);

    
    Route::get('xoa-shop/{id}', [
        'as' => 'xoashop', 
        'uses' => 'Admincontroller@getXoashop'
    ]);
    
/*-----------------------tinh trang hoa don--------15*/
    Route::get('tinh-trang-hoa-don', [
        'as' => 'tinhtranghoadon', 
        'uses' => 'Admincontroller@getTinhtranghoadon'
    ]);

    Route::get('them-tinh-trang-hoa-don', [
        'as' => 'themtinhtranghoadon', 
        'uses' => 'Admincontroller@getThemtinhtranghoadon'
    ]);

    
    Route::get('xoa-tinh-trang-hoa-don/{id}', [
        'as' => 'xoatinhtranghoadon', 
        'uses' => 'Admincontroller@getXoatinhtranghoadon'
    ]);
    
/*-----------------------user--------14*/
    Route::get('user', [
        'as' => 'user', 
        'uses' => 'Admincontroller@getUser'
    ]);

    Route::get('them-user', [
        'as' => 'themuser', 
        'uses' => 'Admincontroller@getThemuser'
    ]);

    Route::post('them-user', [
        'as' => 'themuser', 
        'uses' => 'Admincontroller@postThemuser'
    ]);

    Route::get('sua-user/{id}', [
        'as' => 'suauser', 
        'uses' => 'Admincontroller@getSuauser'
    ]);

    Route::post('sua-user/{id}', [
        'as' => 'suauser', 
        'uses' => 'Admincontroller@postSuauser'
    ]);

    
    Route::get('xoa-user/{id}', [
        'as' => 'xoauser', 
        'uses' => 'Admincontroller@getXoauser'
    ]);

    /*-----------------------search--------12*/
    Route::get('search-pham-all', [
        'as' => 'searchphamall', 
        'uses' => 'Admincontroller@getSearchsanpham'
    ]);
});

/*---------------------------shop-------*/
    Route::get('shop-user/{id}', [
        'as' => 'shopuser', 
        'uses' => 'Usershopcontroller@getShop'
    ]);

    Route::get('dang-ky-shop', [
        'as' => 'dangkyshop', 
        'uses' => 'Usershopcontroller@getDangkyshop'
    ]);

    Route::post('dang-ky-shop', [
        'as' => 'dangkyshop', 
        'uses' => 'Usershopcontroller@postDangkyshop'
    ]);
/*-------------------------ql----------------------------*/
    Route::get('quan-ly-shop', [
        'as' => 'quanlyshop', 
        'uses' => 'Usershopcontroller@getQuanlyshop'
    ]);
/*-------------------------sp----------------------------*/
    //Route::get('export', 'MyController@export')->name('export');
    //Route::get('importExportView', 'MyController@importExportView');
    //Route::post('import', 'MyController@import')->name('import');

    Route::get('export-san-pham', [
        'as' => 'export', 
        'uses' => 'Usershopcontroller@getexport'
    ]);
   
    Route::post('import-san-pham', [
        'as' => 'import', 
        'uses' => 'Usershopcontroller@import'
    ]);

    Route::get('them-san-pham-shop', [
        'as' => 'themsanphamshop', 
        'uses' => 'Usershopcontroller@getThemsanphamshop'
    ]);

    Route::post('them-san-pham-shop', [
        'as' => 'themsanphamshop', 
        'uses' => 'Usershopcontroller@postThemsanphamshop'
    ]);

    Route::get('xem-san-pham-shop', [
        'as' => 'xemsanphamshop', 
        'uses' => 'Usershopcontroller@getXemsanphamshop'
    ]);

    Route::get('sua-san-pham-shop/{id}', [
        'as' => 'suasanphamshop', 
        'uses' => 'Usershopcontroller@getSuasanphamshop'
    ]);

    Route::post('sua-san-pham-shop/{id}', [
        'as' => 'suasanphamshop', 
        'uses' => 'Usershopcontroller@postSuasanphamshop'
    ]);

    Route::get('xoa-san-pham-shop/{id}', [
        'as' => 'xoasanphamshop', 
        'uses' => 'Usershopcontroller@getXoasanphamshop'
    ]);
/*-------------------------kh----------------------------*/
    Route::get('khach-hang-shop', [
        'as' => 'khachhangshop', 
        'uses' => 'Usershopcontroller@getKhachhang'
    ]);

    Route::get('sua-khach-hang-shop/{id}', [
        'as' => 'suakhachhangshop', 
        'uses' => 'Usershopcontroller@getSuaKhachhang'
    ]);

    Route::post('sua-khach-hang-shop/{id}', [
        'as' => 'suakhachhangshop', 
        'uses' => 'Usershopcontroller@postSuaKhachhang'
    ]);

    Route::get('xoa-khach-hang-shop/{id}', [
        'as' => 'xoakhachhangshop', 
        'uses' => 'Usershopcontroller@getXoaKhachhang'
    ]);
/*-------------------------dh----------------------------*/
    Route::get('don-hang-shop', [
        'as' => 'donhangshop', 
        'uses' => 'Usershopcontroller@getdonhangshop'
    ]);

    Route::get('sua-don-hang-shop/{id}', [
        'as' => 'suadonhangshop', 
        'uses' => 'Usershopcontroller@getsuadonhangshop'
    ]);

    Route::post('sua-don-hang-shop/{id}', [
        'as' => 'suadonhangshop', 
        'uses' => 'Usershopcontroller@postsuadonhangshop'
    ]);

    Route::get('xoa-don-hang-shop/{id}', [
        'as' => 'xoadonhangshop', 
        'uses' => 'Usershopcontroller@getXoadonhangshop'
    ]);

/*-------------------------hd----------------------------*/
    Route::get('hoa-don-shop', [
        'as' => 'hoadonshop', 
        'uses' => 'Usershopcontroller@gethoadonshop'
    ]);

    Route::get('xoa-hoa-don-shop/{id}', [
        'as' => 'xoahoadonshop', 
        'uses' => 'Usershopcontroller@getxoahoadonshop'
    ]);

    Route::get('Bien-lai/{id}', [
        'as' => 'bienlai', 
        'uses' => 'Usershopcontroller@getbienlai'
    ]);
    

/*--------------------------lh----------------------------*/

    Route::get('lo-hang-shop', [
        'as' => 'lohangshop', 
        'uses' => 'Usershopcontroller@getLohang'
    ]);

    Route::get('them-lo-hang-shop', [
        'as' => 'themlohangshop', 
        'uses' => 'Usershopcontroller@getThemlohang'
    ]);

    Route::post('them-lo-hang-shop', [
        'as' => 'themlohangshop', 
        'uses' => 'Usershopcontroller@postThemlohang'
    ]);

    Route::get('sua-lo-hang-shop/{id}', [
        'as' => 'sualohangshop', 
        'uses' => 'Usershopcontroller@getSualohang'
    ]);

    Route::post('sua-lo-hang-shop/{id}', [
        'as' => 'sualohangshop', 
        'uses' => 'Usershopcontroller@postSualohang'
    ]);
   
    Route::get('xoa-lo-hang-shop/{id}', [
        'as' => 'xoalohangshop', 
        'uses' => 'Usershopcontroller@getXoalohang'
    ]);

    Route::get('export-lo-hang', [
        'as' => 'exportlohang', 
        'uses' => 'Usershopcontroller@getexportlohang'
    ]);
   
    Route::get('import-lo-hang', [
        'as' => 'importlohang', 
        'uses' => 'Usershopcontroller@importlohang'
    ]);
/*--------------------------search shop----------------------------*/
    Route::get('search-shop', [
        'as' => 'searchshop', 
        'uses' => 'Usershopcontroller@getsearchshop'
    ]);
/*-----------------------loai san pham shop--------14*/
    Route::get('loai-san-pham-shop/{id_type}/{id}', [
        'as' => 'loaisanphamshop', 
        'uses' => 'Usershopcontroller@getLoaisanphamshop'
    ]);

/*-----------------------quang cao--------1*/
    Route::get('xem-slide-shop', [
        'as' => 'xem_slide_shop', 
        'uses' => 'Usershopcontroller@getXemslideshop'
    ]);

    Route::get('them-slide-shop', [
        'as' => 'themslide_shop', 
        'uses' => 'Usershopcontroller@getThemslideshop'
    ]);

    Route::post('them-slide-shop', [
        'as' => 'themslide_shop', 
        'uses' => 'Usershopcontroller@postThemslideshop'
    ]);

    Route::get('sua-slide-shop/{id}', [
        'as' => 'Sua_slide_shop', 
        'uses' => 'Usershopcontroller@getSuaslideshop'
    ]);

    Route::post('sua-slide-shop/{id}', [
        'as' => 'Sua_slide_shop', 
        'uses' => 'Usershopcontroller@postSuaslideshop'
    ]);

    Route::get('xoa-slide-shop/{id}', [
        'as' => 'xoaslide_shop', 
        'uses' => 'Usershopcontroller@getXoaslideshop'
    ]);
    