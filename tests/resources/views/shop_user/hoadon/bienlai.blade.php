<!DOCTYPE html>
<html>

<head>
    <base href="{{ asset('public/usershop') }}/">
    <title>Hóa đơn</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/filepdf.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        .wrapper {
            margin: 0 auto;
            width: 100%;
            margin-top: 10px;
        }

    </style>

</head>

<body id='area-print'>
    <form >
    <div id="page" class="page">
        <div class="header">
            <?php 
               use Illuminate\Support\Facades\Auth;
               use App\shop;
               $shop=DB::table('nhanvienshop')->where('user_id','=',Auth::user()->id)->first(); 
            ?>
            <div class="logo"><a href="{{route('trangchu')}}" style="font-size: 40px;"><?php echo '<b>'.$shop->tenshop.'</b>';?></a>
            </div>
            
        </div>
        <br/>
        <div class="title">
            HÓA ĐƠN THANH TOÁN
            <br/> -------oOo-------
        </div>
        <br/>
        <br/>
        <div class="panel-body">
            <table class="table table-bordered" style="margin-top:20px;">
                <thead>
                    <tr class="bg-primary">
                        <th width="10%">Tên khách</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th width="20%">Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th name='name' width="10%">{{$ttbl->khachhang_ten}}</th>
                        <th name='email'>{{$ttbl->khachhang_email}}</th>
                        <th name='address' width="20%">{{$ttbl->khachhang_sdt}}</th>
                        <th name='phone'>{{$ttbl->khachhang_dia_chi}}</th>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered" style="margin-top:20px;">
                <thead>
                    <tr class="bg-primary">
                        <th style="width: 5%;">Tên sản phẩm</th>
                        <th width="10%">Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $tien=0; ?>
                    @foreach($spdat as $sp)
                    <tr>
                        <th name='name' width="20%">{{$sp->sanpham_ten}}</th>
                        <th name='quantity'width="40%"><img width="200px" height="100px" src="../user/image/images/{{$sp->sanpham_anh}} " class="thumbnail"></th>
                        <th name='unit_price'>{{$sp->chitietdonhang_so_luong}}</th>
                        <th name='unit_price'>{{number_format($sp->chitietdonhang_thanh_tien)}} vnd</th>
                        <?php $tien=$tien+$sp->chitietdonhang_thanh_tien; ?>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <td colspan="6" class="tong">Tổng cộng</td>
        <td class="cotSo">
           <h4><b> {{number_format($tien+$tien*0.01)}} vnd</b></h4>
        </td>
        </tr>
        </table>
        <div class="footer-right"> BMT/.../... 
            <br/> <?php echo $shop->tenshop;?>
            <br>
            <br>
            <br>
            <br>
            <br> <?php echo $shop->name;?>
        </div>
         <div class='container' style='margin-top:50px;margin-bottom:50px'><div class='row text-left'><button id='btn-print' class='btn btn-info'>Print</button></div></div>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
          $('#btn-print').on('click',function(){
              window.print();
          });
        });
</script>
</body>
</html>
