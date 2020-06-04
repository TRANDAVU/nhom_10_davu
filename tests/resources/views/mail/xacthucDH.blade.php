<base href="{{asset('')}}">
<?php
    $content=Cart::content();

?>
<div marginheight="0" marginwidth="0" style="background:#f0f0f0">
    <div id="wrapper" style="background-color:#f0f0f0">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="margin:0 auto;width:600px!important;min-width:600px!important" class="container">
            <tbody>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff">
                        <table style="width:580px;border-bottom:1px solid #ff3333" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="left" valign="middle" style="width:500px;height:60px">
                                        <a href="#" style="border:0" target="_blank" width="130" height="35" style="display:block;border:0px">
                                        <img src="https://i.imgur.com/SJMpt6k.png" height="100" width="115" style="display:block;border:0px;float: left;"> <b style="float: left;line-height: 100px;color: red;font-size: 20px;">VEGEFOODS Store</b>
                                        </a>
                                    </td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff">
                        <table style="width:580px" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:24px;color:#ff3333;text-transform:uppercase;font-weight:bold;padding:25px 10px 15px 10px">
                                        Thông Báo Đơn Hàng Bạn Đặt
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding:0 10px 20px 10px;line-height:17px">
                                        Chào {{$ten_khach_hang}},
                                        <br> Cám ơn bạn đã mua sắm tại VEGEFOODS Store
                                        <br>
                                        <br> Đơn hàng của bạn đang 
                                        <b>chờ shop</b>  
                                        <b>xác nhận</b> (trong vòng 24h)
                                        <br> Chúng tôi sẽ thông tin <b>trạng thái đơn hàng</b> trong email tiếp theo.
                                        <br> Bạn vui lòng kiểm tra email thường xuyên nhé.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff">
                        <table style="width:580px;border:1px solid #ff3333;border-top:3px solid #ff3333" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td colspan="2" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#666666;padding:10px 10px 20px 15px;line-height:17px"> 
                                        <b>Đơn hàng của bạn :</b> 
                                        <a style="color:#ed2324;font-weight:bold;text-decoration:none" target="_blank">{{$id}}
                                        </a>
                                        <span style="font-size:12px">   ngày tạo: {{$tao_don}}</span>
                                    </td>
                                </tr>
                                @foreach($content as $c )
                                <tr>
                                    <td align="left" valign="top" style="width:120px;padding-left:15px">
                                        <a  style="border:0"> 
                                        <img src="../user/image/images/{{$c->options->image}}" height="120" width="120" style="display:block;border:0px"> 
                                        </a>
                                        <br>
                                        <br>
                                    </td>
                                    <td align="left" valign="top">
                                        <table style="width:100%" cellpadding="0" cellspacing="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px"> 
                                                        <b>Sản phẩm</b>
                                                    </td>
                                                    <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                                    <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                        <a  style="color:#115fff;text-decoration:none" target="_blank">
                                                        {{$c->name}}
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>

                                            <tbody>
                                                <tr>
                                                    <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px"> 
                                                        <b>Đơn giá</b>
                                                    </td>
                                                    <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                                    <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                        <a style="color:#115fff;text-decoration:none" target="_blank">
                                                        {{number_format($c->price)}} vnđ
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>

                                            <tbody>
                                                <tr>
                                                    <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px"> 
                                                        <b>Số lượng mua</b>
                                                    </td>
                                                    <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                                    <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                        <a href="#" style="color:#115fff;text-decoration:none" target="_blank">
                                                        {{$c->qty}}
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>

                                            <tbody>
                                                <tr>
                                                    <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px"> 
                                                        <b>Tên Shop :</b>
                                                    </td>
                                                    <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px"> 
                                                        <a href="http://vegefoods.com/" style="color:#115fff;text-decoration:none" target="_blank">
                                                        <?php 
                                                            
                                                            $shop=DB::table('shop')->where('id','=',$c->options->shop_id)->first(); 
                                                            echo '<b>'.$shop->tenshop.'</b>';
                                                        ?>
                                                        </a>
                                                        - 
                                                        <?php 
                                                            echo '<b>'.$shop->sdt.'</b>';
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                @endforeach
                                
                                <tr>
                                    <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:15px;padding-right:10px;padding-bottom:5px"> 
                                        <b>Người nhận :</b>
                                    </td>
                                    <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px"> 
                                        <b>{{$nguoi_nhan}}</b> - {{$so_dien_thoai}}
                                        <br>
                                        {{$diachi}}
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:15px;padding-right:10px;padding-bottom:5px"> 
                                        <b>Tổng thanh toán :</b>
                                    </td>
                                    <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                        <h4 style="color: red;">{{Cart::total()}} vnd</h4>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td colspan="2" align="center" valign="top" style="padding-top:20px;padding-bottom:20px;border-bottom:1px solid #ebebeb">
                                        <a href="http://vegefoods.com/" style="border:0px" target="_blank"> 
                                        <img src="https://i.imgur.com/f92hL68.jpg" height="29" width="191" value="Ghé Thăm Shop" style="border:0px"> 
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff;padding-top:20px">
                        <table style="width:500px" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="center" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px"> 
                                        Đây là thư tự động từ hệ thống. Vui lòng không trả lời email này.
                                        <br> Nếu có bất kỳ thắc mắc hay cần giúp đỡ, Bạn vui lòng ghé thăm 
                                        <b style="font-family:Arial,Helvetica,sans-serif;font-size:13px;text-decoration:none;font-weight:bold">Trung tâm trợ giúp</b> của chúng tôi tại địa chỉ: 
                                        <a href="http://vegefoods.com/lien-he" style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#0066cc;text-decoration:none;font-weight:bold" target="_blank">
                                        http://vegefoods.com/lien-he
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
