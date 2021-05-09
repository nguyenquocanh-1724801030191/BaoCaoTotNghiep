<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | ShopGiay Q & A</title>
    <base href="{{asset('')}}">
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{('public/frontend/images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +0 34 48 72 892</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> 1999quocanh233@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    {{ trans('home.ngonngu')}}
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{URL::asset('')}}language/en">English</a></li>
                                        
                                        <li><a class="dropdown-item" href="{{URL::asset('')}}language/vi">VietNam</a></li>
                                </ul>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.html"></a>
                        </div>
                        <div class="btn-group pull-right">

                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <!-- <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li> -->

                                <?php
                                   $customer_id = Session::get('customer_id');
                                   $shipping_id = Session::get('shipping_id');
                                   if($customer_id!=NULL && $shipping_id==NULL){ 
                                ?>

                                <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a>
                                </li>

                                <?php
                                 }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                ?>

                                <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a>
                                </li>

                                <?php 
                                }else{
                                ?>

                                <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Thanh
                                        toán</a></li>

                                <?php
                                 }
                                ?>


                                <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a>
                                </li>

                                <?php
                                   $customer_id = Session::get('customer_id');
                                   if($customer_id!=NULL){ 
								?>

                                <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a>
                                </li>

                                <?php
                            	}else{
								?>

                                <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập</a>
                                </li>

                                <?php 
                             	}
                                ?>





                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/trang-chu')}}" >Trang chủ</a></li>
                                <li class="dropdown"><a href="{{URL::to('/trang-chu')}}">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach($category as $key => $cate)                        
                                        <li> 
                                            <a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a>
                                        </li>   
                                        @endforeach
                                    
                                    </ul>
                                </li>

                                <li><a href="{{URL::to('/lien-he')}}">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <form action="{{URL::to('/tim-kiem')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="col-sm-6 pull-right">
                                <div class="input-group">
                                    <input type="text"  name="keywords_submit" class="input-sm form-control" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm btn-default" name="search_item" type="submit" style="margin-top:0;background: #fe980f">Go!</button>
                                    </span> 
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

    <section id="slider">
        <!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <!-- <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol> -->
                        <style type="text/css">
                            img.img.img-responsive.img-slider {
                                height: 350px;
                                padding-right: 100px;
                            }
                        </style>
                        <div class="carousel-inner">
                            @php 
                                $i = 0;
                            @endphp
                            @foreach($slider as $key => $slide)
                                @php 
                                    $i++;
                                @endphp
                                <div class="item {{$i==1 ? 'active' : '' }}">
                                    
                                    <div class="col-sm-12">
                                        <img alt="{{$slide->slider_desc}}" src="{{asset('public/uploads/slider/'.$slide->slider_image)}}" height="200" width="100%" class="img img-responsive img-slider">
                                    
                                    </div>
                                </div>
                            @endforeach  
                           
                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i></a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            @foreach($category as $key => $cate)

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a
                                            href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a>
                                    </h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--/category-products-->

                        <div class="brands_products">
                            <!--brands_products-->
                            <h2>Thương hiệu sản phẩm</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach($brand as $key => $brand)
                                    <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"><span
                                                class="pull-right"></span>{{$brand->brand_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>ShopGiay Q & A</span></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{('public/frontend/images/slide1.jpg')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2020</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{('public/frontend/images/slide1.jpg')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2020</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{asset('public/frontend/images/slide3.jpg')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2020</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{asset('public/frontend/images/slide2.jpg')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2020</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <!-- <img src="{{asset('public/frontend/images/map.png')}}" alt="" /> -->
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Help</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">T-Shirt</a></li>
                                <li><a href="#">Mens</a></li>
                                <li><a href="#">Womens</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i
                                        class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">ShopGiay Q & A.</p>
                    <p class="pull-right">Designed by <span>Quoc Anh</span></p>
                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->



    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script src="{{asset('public/frontend/js/sweetalert.js')}}"></script>
    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <!-- <script src="{{asset('public/frontend/js/jquery.min.js')}}"></script> -->
    <script src="{{asset('public/frontend/js/jquery.validate.min.js')}}"></script>

    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    
    <script type="text/javascript">
    $(document).ready(function() {
        $('.add-to-cart').click(function() {
            var id = $(this).data('id_product');
            // alert(id);
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var cart_product_size = $('.cart_product_size_' + id).val();
            var _token = $('input[name="_token"]').val();
            // alert(cart_product_price);
            $.ajax({
                url: '{{url('/add-cart-ajax')}}',
                method: 'POST',
                data: {
                    cart_product_id: cart_product_id,
                    cart_product_name: cart_product_name,
                    cart_product_image: cart_product_image,
                    cart_product_price: cart_product_price,
                    cart_product_qty: cart_product_qty,
                    cart_product_size: cart_product_size,
                    _token: _token
                },
                success: function(data) {
                    swal({
                        title: "Đã thêm sản phẩm vào giỏ hàng",
                        text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Đi đến giỏ hàng",
                        closeOnConfirm: false
                    }, function() {
                        window.location.href = "{{url('/gio-hang')}}";
                    });

                }
            });
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.choose').on('change', function() {
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            if (action == 'city') {
                result = 'province';
            } else {
                result = 'wards';
            }
            $.ajax({
                url: '{{url('/select-delivery-home')}}',
                method: 'POST',
                data: {
                    action: action,
                    ma_id: ma_id,
                    _token: _token
                },
                success: function(data) {
                    $('#' + result).html(data);
                }
            });
        });
    })
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.calculate_delivery').click(function() {
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var xaid = $('.wards').val();
            var _token = $('input[name="_token"]').val();
            if (matp == '' && maqh == '' && xaid == '') {
                alert('Làm ơn chọn để tính phí vận chuyển');
            } else {
                $.ajax({
                    url: '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data: {
                        matp: matp,
                        maqh: maqh,
                        xaid: xaid,
                        _token: _token
                    },
                    success: function() {
                        location.reload();
                    }
                });
            }
        });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.send_order').click(function() {
            swal({
                title: "Xác nhận đơn hàng",
                text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Mua hàng",
                cancelButtonText: "Đóng,chưa mua",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    var shipping_email = $('.shipping_email').val();
                    var shipping_name = $('.shipping_name').val();
                    var shipping_address = $('.shipping_address').val();
                    var shipping_phone = $('.shipping_phone').val();
                    var shipping_notes = $('.shipping_notes').val();
                    var shipping_method = $('.payment_select').val();
                    var order_fee = $('.order_fee').val();
                    var order_coupon = $('.order_coupon').val();
                    var _token = $('input[name="_token"]').val(); 
                    if(shipping_method==0){
                        $.ajax({
                            url: '{{url('/payment-onlines')}}',
                            method: 'POST',
                            data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
                            success:function(){
                                $(location).attr('href', 'thanh-toan');
                            }
                        }); 

                    }else{
                        $.ajax({
                            url: '{{url('/confirm-order')}}',
                            method: 'POST',
                            data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
                            success:function(){
                               swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                            }
                        }); 
                    window.setTimeout(function() {
                        location.reload();
                    }, 3000);
                    }
                     
                } else {
                    swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");
                }
            });

        })

    })
    </script>




    <!-- <sc type= "text/javascript">
 	$(document).ready(function() {
  $("#basic-form-dangki").validate({
    errorClass: "error fail-alert",
    validClass: "valid success-alert",
    rules: {
	  customer_name : {
        required: true,
        minlength: 3
      },
      customer_email: {
        required: true,
        email: true
	  },
	  customer_password: {
        required: true,
        minlength: 4
	  },
	  customer_phone: {
        required: true,
        number: true,
 
      },
      
    },
    messages : {
	  customer_name: {
		required: "Vui lòng nhập name",
        minlength: "Name phải có ít nhất 3 kí tự"
      },
      customer_email: {
		required: "Vui lòng nhập email",
        email: "Email phải có định dạng: abc@gmail.com"
	  },
	  customer_password: {
		required: "Vui lòng nhập password",
        minlength: "Password phải có ít nhất 4 kí tự",
	  },
	  customer_phone: {
        required: "Vui lòng nhập stđ",
        number: "vui lòng không nhập dưới định dạng số",       
      },
      
    }
  });
});
	</sc> -->
</body>

</html>