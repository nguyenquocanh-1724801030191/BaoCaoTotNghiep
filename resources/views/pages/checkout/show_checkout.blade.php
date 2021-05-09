@extends('layout')
@section('content')
<section id="cart_items">
    {{-- <div class="container"> --}}
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="{{URL::to('/')}}">Home</a></li>
            <li class="active">Thanh toán giỏ hàng </li>
        </ol>
    </div>

    <div class="shopper-informations">
        <div class="row">
                    <style type="text/css">
						.col-md-6.form-style input[type=text] {
						    margin: 5px 0;
						}
					</style>
            <div class="col-sm-12 clearfix">
                <div class="bill-to">
                    <p><b>Thông tin gửi hàng</b></p>
                    <div class="form-one">
                        <form action="{{URL::to('/confirm-order')}}" method="POST">
                            @csrf
                            <input type="email" name="shipping_email" class="shipping_email" placeholder="Email" required>
                            <input type="text" name="shipping_name" class="shipping_name" placeholder="Họ và tên " required>
                            <input type="text" name="shipping_address" class="shipping_address" placeholder="Địa chỉ " required>
                            <input type="text" name="shipping_phone" class="shipping_phone" placeholder="Số điện thoại" required>
                            <textarea name="shipping_notes" class="shipping_notes" placeholder="Ghi chú mong muốn về đơn hàng của bạn" rows="5"></textarea>

                            @if(Session::get('fee'))
                            <input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
                            @else
                            <input type="hidden" name="order_fee" class="order_fee" value="30000">
                            @endif

                            @if(Session::get('coupon'))
                            @foreach(Session::get('coupon') as $key => $cou)
                            <input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
                            @endforeach
                            @else
                            <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                            @endif

                            <div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
                                    <select name="payment_select" class="form-control input-sm m-bot15 payment_select">
                                        <option value="0">Chuyển khoản</option>
                                        <option value="1">Tiền mặt</option>
                                    </select>
                                </div>
                            </div>
                            <input type="button" value="Đặt hàng" name="send_order" class="btn btn-primary btn-sm send_order">
                

                        </form>
                    </div>
					<div class="col-md-6">	
                        <form>
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn thành phố</label>
                                <select name="city" id="city" class="form-control input-sm m-bot15 choose city">

                                    <option value="">--Chọn tỉnh thành phố--</option>
                                    @foreach($city as $key => $ci)
                                    <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn quận huyện</label>
                                <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                                    <option value="">--Chọn quận huyện--</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn xã phường</label>
                                <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                    <option value="">--Chọn xã phường--</option>
                                </select>
                            </div>

                            <input type="button" value="Tính phí vận chuyển" name="calculate_order" class="btn btn-primary btn-sm calculate_delivery">
                        </form>


                    </div>

                </div>
            </div>

            <div class="col-sm-12 clearfix">
                <div class="table-responsive cart_info">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                    @endif
                    <form action="{{url('/update-cart')}}" method="POST">
                        @csrf
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="image" style="text-align: center">Hình ảnh</td>
                                    <td class="description" style="text-align: center">Tên sp</td>
                                    <td class="price" style="text-align: center">Giá</td>
                                    <td class="quantity" style="text-align: center">Số lượng</td>
                                    <td class="total" style="text-align: center">Tổng tiền</td>
                                    <td>Xóa</td>
                                </tr>
                            </thead>

                            <tbody>
                                @if(Session::get('cart')==true)
                                <?php
										$total = 0;
									?>
                                @foreach(Session::get('cart') as $key => $cart)
                                <?php
										$subtotal = $cart['product_price']*$cart['product_qty'];
										$total+=$subtotal;
									?>
                                <tr>
                                    <td class="cart_product">
                                        <img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" width="100" alt="" />
                                    </td>
                                    <td class="cart_description">
                                        <h5 style="font-size:18px"> {{$cart['product_name']}}</h5>
                                    </td>
                                    <td class="cart_price">
                                    <center>
                                        <p style="margin: 0 0 0px">
                                            {{number_format($cart['product_price'],0,',','.')}}</p>
                                    </center>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">

                                            <center>
                                            <input class="cart_quantity" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" style="text-align: center;width:55%;">
                                            </center>
                                        </div>

                                    </td>
                                    <td class="cart_total" style="font-size:18px; color:red">
                                        {{number_format($subtotal,0,',','.')}} VND
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>


                                @endforeach
                                <tr>
                                    <td><input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="btn btn-default check_out"></td>
                                    <td><a class="btn btn-default check_out" href="{{url('/del-all-product')}}">Xóa
                                            tất cả</a></td>
                                    <td>
                                        @if(Session::get('coupon'))
                                        <a class="btn btn-default check_out" href="{{url('/unset-coupon')}}">Xóa mã
                                            khuyến mãi</a>
                                        @endif
                                    </td>
                                    <td style="font-size:15px" colspan=2>
                                        <p><li>Tổng tiền: <span>{{number_format($total,0,',','.')}} VND</span></li></p>
                                        @if(Session::get('coupon'))
                                        <li>

                                            @foreach(Session::get('coupon') as $key => $cou)
                                            @if($cou['coupon_condition']==1)
                                            Giảm giá  : {{$cou['coupon_number']}} %
                                            <p>
                                                @php
                                                $total_coupon = ($total*$cou['coupon_number'])/100;

                                                @endphp
                                            </p>
                                            <p>
                                                @php
                                                $total_after_coupon = $total-$total_coupon;
                                                @endphp
                                            </p>
                                            @elseif($cou['coupon_condition']==2)
                                            Giảm giá : {{number_format($cou['coupon_number'],0,',','.')}} VND
                                            
                                                @php
                                                $total_coupon = $total - $cou['coupon_number'];

                                                @endphp
                                         
                                                @php
                                                $total_after_coupon = $total_coupon;
                                                @endphp
                                            @endif
                                            @endforeach
                                        </li>
                                        @endif

                                        @if(Session::get('fee'))
                                        <li>
                                            Phí vận chuyển: <span>{{number_format(Session::get('fee'),0,',','.')}}
                                                VND</span>
                                            <a class="cart_quantity_delete" href="{{url('/del-fee')}}"><i class="fa fa-times"></i></a>
                                        </li>
                                        <?php $total_after_fee = $total + Session::get('fee'); ?>
                                        @endif
                                        <li>Tổng đơn hàng:
                                            @php
                                            if(Session::get('fee') && !Session::get('coupon')){
                                            $total_after = $total_after_fee;
                                            echo number_format($total_after,0,',','.').' VND';
                                            }elseif(!Session::get('fee') && Session::get('coupon')){
                                            $total_after = $total_after_coupon;
                                            echo number_format($total_after,0,',','.').' VND';
                                            }elseif(Session::get('fee') && Session::get('coupon')){
                                            $total_after = $total_after_coupon;
                                            $total_after = $total_after + Session::get('fee');
                                            echo number_format($total_after,0,',','.').' VND';
                                            }elseif(!Session::get('fee') && !Session::get('coupon')){
                                            $total_after = $total;
                                            echo number_format($total_after,0,',','.').' VND';
                                            }

                                            @endphp
                                        </li>
                                    </td>
                                    <td></td>
                                </tr>
                                @else
                                <tr>
                                    <td colspan="5">
                                        <center>
                                            <?php
												echo 'Giỏ hàng của bạn đang trống. Vui lòng thêm sản phẩm vào giỏ hàng'
											?>
                                        </center>
                                    </td>
                                </tr>
                                @endif
                            </tbody>


                    </form>
                    @if(Session::get('cart'))
                    <tr>
                        <td>
                            <form method="POST" action="{{url('/check-coupon')}}">
                                @csrf
                                <input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá"><br>
                                <input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tính mã giảm giá">
                            </form>
                        </td>
                    </tr>
                    @endif
                    </table>
                </div>
            </div>

        </div>
    </div>

  
</section>
<!--/#cart_items-->
@endsection
