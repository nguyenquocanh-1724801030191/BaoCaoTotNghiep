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
							<td class="quantity" style="text-align: center">Số lượng</td>
							<td class="total" style="text-align: center">Tổng tiền</td>
							<td>Xóa</td>
						</tr>
					</thead>
					<tbody><?php $total =0; ?>
                    @foreach($content as $v_content)
						<tr>
							<td class="cart_product">
                            <img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="70" alt="" />
							</td>
							<td class="cart_description">
								<h5 style="font-size:18px">{{$v_content->name}}</h5>
								<!-- <p>Web ID: 1089772</p> -->
							</td>
							<td class="cart_price" >
                            <p style="margin: 0 0 0px">{{number_format($v_content->price).' '.'vnđ'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
                                    <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                        {{ csrf_field() }}
                                        <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}"  >
                                        <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                        <input style="background-color: bisque" type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
									</form>
								</div>
								
							</td>
							<td class="cart_total" style="font-size:18px; color:red">
                                <?php
									$subtotal = $v_content->price * $v_content->qty;
									$total += $subtotal;
									echo number_format($subtotal).' '.'vnđ';
								?>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						
                    </tbody>
                    @endforeach
				</table>
			</div>
		<!-- </div> -->
	</section> 
    
	<section id="do_action">
	
			
			<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
                            <li>Tổng <span>{{number_format($total).' '.'vnđ'}}</span></li>
							<li>Thuế <span>không tính</span></li>
							<li>Phí vận chuyển <span>Free</span></li>		
							<li>Thành tiền <span>{{number_format($total).' '.'vnđ'}}</span></li>
						</ul>
						<!-- 	<a class="btn btn-default update" href="">Update</a> -->
							<?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id!=NULL){ 
                            ?>
                                  
                                <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Đặt hàng</a>
                            <?php
                            }else{
                            ?>
                                <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Đặt hàng</a>
                            <?php 
                            }
                            ?>
					</div>
				</div>
			</div>
		
	</section><!--/#do_action-->
	
@endsection                   