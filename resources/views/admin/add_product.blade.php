@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm  Sản Phẩm
                        </header>
                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                    
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text"  name='product_name' class="form-control" id="exampleInputEmail1"
                                     placeholder="Tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm tiếng anh</label>
                                    <input type="text"  name='product_name_en' class="form-control" id="exampleInputEmail1"
                                     placeholder="Tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" data-validation="number" date-validation-error-msg="Vui lòng nhập số tiền(bằng số)" name='product_price' class="form-control" id="exampleInputEmail1"
                                     placeholder="Giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá gốc</label>
                                    <input type="text" data-validation="number" date-validation-error-msg="Vui lòng nhập số tiền(bằng số)" name='price_cost' class="form-control" id="exampleInputEmail1"
                                     placeholder="Giá gốc">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail1">Kích cỡ sản phẩm</label>
                                    <input type="text" data-role="tagsinput" data-validation-error-msg="Làm ơn điền kích cỡ" name="product_size" class="form-control" id="exampleInputEmail1" placeholder="Điền số size">
                                </div> -->
                                <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Kích cỡ sản phẩm</label>
                                    <textarea type="text" data-validation="number"  data-validation-error-msg="Làm ơn điền kích cỡ" name="product_size" class="form-control" id="exampleInputEmail1" placeholder="Điền số size"></textarea>
                                </div> -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Làm ơn điền số lượng" name="product_quantity" class="form-control" id="exampleInputEmail1" placeholder="Điền số lượng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows= "7" class="form-control" name='product_desc' id="exampleInputPassword1" 
                                    placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows= "7" class="form-control" name='product_content' id="exampleInputPassword1" 
                                    placeholder="Nội dung sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Danh mục sản phẩm</label>
                                    <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key => $cate)
                                        <option value = "{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Thương hiệu</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                    @foreach($brand_product as $key => $brand)
                                        <option value = "{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endforeach 
                                       
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value = "1">Ẩn</option>
                                        <option value = "0">Hiện</option>
                                       
                                    </select>
                                </div>
                                
                                <button type="submit" name ="add_product" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection