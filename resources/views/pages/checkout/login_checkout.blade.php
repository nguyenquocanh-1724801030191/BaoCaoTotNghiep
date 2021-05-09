@extends('layout')
@section('content')
<section id="form" ><!--form-->
		<!-- <div class="container"> -->
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập tài khoản</h2>
						<?php
						$message = Session::get('message');
						if($message){
							echo '<span class="" >'.$message.'<span>';
							Session::put('message',null);
						}
						?>
						<form action="{{URL::to('/login-customer')}}" method="POST" id="basic-form">
						{{csrf_field()}}
							<input id = "kiemtraemail" type="email" name="email_account" placeholder="Email Address" required/>
							
							<input id = "kiemtrapasword" type="password"name="password_account" placeholder="Password" required />
						
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng ký</h2>
						
						<form action="{{URL::to('/add-customer')}}" method="POST" id= "basic-form-dangki">
							{{ csrf_field() }}
							<input id="customer_name" type="text" name="customer_name" placeholder="Name" required/>
					

							<input id="customer_email" type="email" name="customer_email" placeholder="Email Address" required/>
							
                            <input id="customer_password" type="password" name="customer_password" placeholder="Password" required/>

                            <input id="customer_phone" type="text" name="customer_phone" placeholder="Phone" required/>
							

							<button type="submit" class="btn btn-default">Đăng ký</button>            
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		<!-- </div> -->
	
	</section><!--/form-->

	<!-- $(document).ready(function() {
	$("#basic-form").validate();
	});

	$(document).ready(function() {
	$("#basic-form-dangki").validate();
	}); -->

	
@endsection   