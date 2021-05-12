@extends('layout')
@section('content')
@foreach($product_details as $key =>$value)
<div class="product-details">
    <!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{URL::to('public/uploads/product/',$value->product_image)}}" alt="" />

        </div>


    </div>
    <div class="col-sm-7">
        <div class="product-information">
            <!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{ trans('home.tensanpham')}}:
            @if(config('app.locale') != 'vi') 
                {{$value->product_name_en}}
            @else
                {{$value->product_name}}
            @endif
            </h2>   
            <form action="{{URL::to('/save-cart')}}" method="POST">
                @csrf
                   

                <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                <span>
                    <span>{{number_format($value->product_price,0,',','.').' VNĐ'}}</span>

                    <label>{{ trans('home.soluong')}}:</label>
                    <input name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}" value="1" />
                    <input name="productid_hidden" type="hidden" value="{{$value->product_id}}" />
                    <br>
                    
                    
                </span>
                <!-- @if($value->product_size == NULL)
                @else
                <span>
                    <label>Size</label>
                    <select>
                    @php
                        $sizes = $value->product_size;
                        $product_size = explode(",",$sizes); 
                    @endphp
                    @foreach($product_size as $size){
                        <option value ="{{$sizes}}">{{$sizes}}</option>
                       
                        }
                    @endforeach
                    </select>
                </span>
                @endif -->
                <input type="button" value="{{ trans('home.themgiohang')}}" class="btn btn-primary btn-sm add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
                
            </form>
            <p><b>{{ trans('home.tinhtrang')}}:</b> {{ trans('home.conhang')}}</p>
            <p><b>{{ trans('home.dieukien')}}:</b> {{ trans('home.moi')}} </p>
            <p><b>{{ trans('home.thuonghieu')}}:</b> {{$value->brand_name}}</p>
            <p><b>{{ trans('home.danhmuc')}}:</b> 
                @if(config('app.locale') != 'vi') 
                    {{$value->category_name_en}}
                @else
                    {{$value->category_name}}
                @endif
            </p>

            <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
        </div>
        <!--/product-information-->
    </div>
</div>
<!--/product-details-->

<div class="category-tab shop-details-tab">
    <!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">{{ trans('home.motasp')}}</a></li>
            <li><a href="#companyprofile" data-toggle="tab">{{ trans('home.chitietsp')}}</a></li>
            <li><a href="#reviews" data-toggle="tab">{{ trans('home.danhgia')}}</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details">
            <p>{!!$value->product_desc!!}</p>


        </div>

        <div class="tab-pane fade" id="companyprofile">
            <p>{!!$value->product_content!!}</p>

        </div>

        <div class="tab-pane fade " id="reviews">
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i></a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i></a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i></a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur.</p>
                <p><b>Write Your Review</b></p>

                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name" />
                        <input type="email" placeholder="Email Address" />
                    </span>
                    <textarea name=""></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
<!--/category-tab-->
@endforeach

<div class="recommended_items">
    <!--recommended_items-->
    <h2 class="title text-center">{{ trans('home.sanphamlienquan')}}</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
								@foreach($related as $key => $lienquan)
										<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
                                                    <div class="productinfo text-center">
                                                    <form>
                                                        @csrf
                                                    

                                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}">
                                                            <img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" />
                                                            <h2>{{number_format($lienquan->product_price).' '.'VND'}}</h2>
                                                            <!-- <p>{{$lienquan->product_name}}</p> -->
                                                            <p>@if(config('app.locale') != 'vi') 
                                                                    {{$lienquan->product_name_en}}
                                                                @else
                                                                    {{$lienquan->product_name}}
                                                                @endif
                                                            </p>

                                                        </a>
                                                       
                                                    </form>
                                                    </div>
												
												</div>
											</div>
										</div>
								@endforeach		

								
								</div>
									
							</div>
									
						</div>
</div>
<!--/recommended_items-->

@endsection
