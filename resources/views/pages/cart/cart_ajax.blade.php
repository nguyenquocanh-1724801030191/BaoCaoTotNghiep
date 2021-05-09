@extends('layout')
@section('content')

<section id="cart_items">
    <!-- <div class="container"> -->
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="{{URL::to('/')}}">Home</a></li>
            <li class="active">Giỏ hàng của bạn</li>
        </ol>
    </div>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @endif
    <div class="table-responsive cart_info">
        <form action="{{url('/update-cart')}}" method="POST">
            @csrf
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image" style="text-align: center">Hình ảnh</td>
                        <td class="description" style="text-align: center">Tên sp</td>
                        <td class="price" style="text-align: center">Giá</td>
                        <td class="size" style="text-align: center; width:80px">Kích cỡ</td>
                        <td class="quantity" style="text-align: center; width:80px">Số lượng</td>
                        
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
                            <img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" width="70" alt="" />
                        </td>
                        <td class="cart_description">
                            <h5 style="font-size:16px"> {{$cart['product_name']}}</h5>
                           
                        </td>
                        <td class="cart_price" >
                            <p style="margin: 0 0 0px">{{number_format($cart['product_price'],0,',','.')}} </p>
                        </td>
                        <!-- <td class="cart_size">
                            <select class="product_size" >
                                    <option disabled style="text-aline:center">Chọn size</option>
                                    <option selected value="1">39</option>
                                    <option value="2">40</option>
                                    <option value="3">41</option>
                                    <option value="4">42</option>
                                   
					        </select>  
                        </td>  -->
                        <td class="cart_size">
                        {{$cart['product_size']}}
                        </td> 
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">

                                <center>
                                <input class="cart_quantity" type="number" min="1"
                                    name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" style="text-align: center;width:55%;">
                                </center>
                            </div>
                           
                        </td>
                        
                        <td class="cart_total" style="font-size:18px; color:red">
                            {{number_format($subtotal,0,',','.')}} VND
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i
                                    class="fa fa-times"></i></a>
                        </td>
                      
                    </tr>
                    {{dd($cart)}}

                    @endforeach
                    <tr>
                        <td style="width:121px"><input type="submit" value="Cập nhật giỏ hàng" name="update_qty"
                                class="btn btn-default check_out"></td>
                        <td style="width:121px"><a class="btn btn-default check_out" href="{{url('/del-all-product')}}">Xóa tất cả</a></td>
                        <td>
                            @if(Session::get('customer_id'))
                            <a class="btn btn-default check_out" href="{{url('/checkout')}}">Đặt hàng</a>
                            @else
                            <a class="btn btn-default check_out" href="{{url('/login-checkout')}}">Đặt hàng</a>
                            @endif
                        </td>
                        <td>
                            @if(Session::get('coupon'))
                            <a  class="btn btn-default check_out" href="{{url('/unset-coupon')}}">Xóa giảm giá</a>
                            @endif
                        </td>
                       
                        <td style="font-size:15px" colspan=2>
                            <p>
                            <li>Tổng tiền: <span>{{number_format($total,0,',','.')}} VND</span></li>
                            </p>
                            @if(Session::get('coupon'))
                            <li>
                                @foreach(Session::get('coupon') as $key => $cou)
                                @if($cou['coupon_condition']==1)
                                Giảm giá: {{$cou['coupon_number']}} %
                                <p>
                                    @php
                                    $total_coupon = ($total*$cou['coupon_number'])/100;
                                    echo '
                                <p>
                            </li>   
                            <li>Tổng giảm: <span>'.number_format($total_coupon,0,',','.').' VND</span></li>
                            </p>';
                            @endphp
                            </p>
                            <p>
                                <li>Tổng tiền đơn hàng: {{number_format($total-$total_coupon,0,',','.')}} VND</li>
                            </p>
                            @elseif($cou['coupon_condition']==2)
                            Giảm giá : {{number_format($cou['coupon_number'],0,',','.')}} VND
                            <p>
                                @php
                                $total_coupon = $total - $cou['coupon_number'];

                                @endphp
                            </p>
                            <p>
                                <li>Tổng tiền đơn hàng: {{number_format($total_coupon,0,',','.')}} VND</li>
                            </p>
                            @endif
                            @endforeach
                            </li>
                            @endif
                           
                        </td>
                        
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
                    <input type="submit" class="btn btn-default check_coupon" name="check_coupon"
                        value="Tính mã giảm giá">                       
                </form>
            </td>
           
            
        </tr>
        @endif
        </table>
    </div>
    <!-- </div> -->
</section>

@endsection