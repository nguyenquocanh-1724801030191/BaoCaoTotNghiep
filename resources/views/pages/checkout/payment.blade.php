@extends('layout')
@section('content')

<section id="cart_items">
		
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Home</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div>

			
			<div class="review-payment">
				<h2>Giỏ hàng của bạn</h2>
			</div>
			<div class="table-responsive cart_info">
				<?php
				$content = Cart::content();
				
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image" style="text-align: center">Hình ảnh</td>
							<td class="description" style="text-align: center">Tên sp</td>
							<td class="price" style="text-align: center" >Giá</td>
							<td class="quantity" style="text-align: center" >Số lượng</td>
							<td class="total" style="text-align: center" >Tổng</td>
							<td class="Xoa">Xóa</td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $v_content)
						<tr>
							<td class="cart_product">
								<img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="70" alt="" />
							</td>
							<td class="cart_description">
							<h5 style="font-size:18px">{{$v_content->name}}</h5>
								
							</td>
							<td class="cart_price">
								<p style="margin: 0 0 0px">{{number_format($v_content->price).' '.'vnđ'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-cart-quantity')}}" method="POST">
									{{ csrf_field() }}
									<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}"  >
									<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
									</form>
								</div>
							</td>
							<td class="cart_total" style="font-size:18px; color:red">
								
									<?php
									$subtotal = $v_content->price * $v_content->qty;
									echo number_format($subtotal).' '.'vnđ';
									?>
							
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<h4 style="margin:40px 0;font-size: 20px;">Chọn hình thức thanh toán</h4>
			<form method="POST" action="{{URL::to('/order-place')}}">
				{{ csrf_field() }}
			<div class="payment-options">
					<span>
						<label><input name="payment_option" value="1" type="checkbox"> Trả bằng thẻ ATM</label>
					</span>
					<span>
						<label><input name="payment_option" value="2" type="checkbox"> Nhận tiền mặt</label>
					</span>
					<span>
						<label><input name="payment_option" value="3" type="checkbox"> Thanh toán thẻ ghi nợ</label>
					</span>
					<input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
			</div>
			</form>
		
	</section> <!--/#cart_items-->

@endsection