@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-9">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <?php
      $message = Session::get('message');
      if($message){
        echo '<span class="text-success">'.$message.'<span>';
        Session::put('message',null);
      }
      ?>
      <table class="table table-striped b-t b-light" >
        <thead>
          <tr>
             
            <th>Tên sản phẩm</th>
            <th>Giá bán</th>  
            <th>Giá gốc</th>  
            <th>Hình sản phẩm</th>
            <th>Số lượng</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Hiện thị</th>
            <th style="width:100px;">Thao tác</th>
            
            <!-- <th>Ngày thêm</th> -->
            
          </tr>
        </thead>
        <tbody>
        
          
          @foreach($all_product as $key => $pro)
         
          <tr>
           
            <td>{{ $pro->product_name }}</td>
            <td>{{ number_format($pro->product_price,0,',','.') }} VND</td>
            <td>{{ number_format($pro->price_cost,0,',','.') }} VND</td>
            <td><img src="public/uploads/product/{{ $pro->product_image }}" height="100" width="100"></td>
            <td>{{ $pro->product_quantity }}</td>
            <td>{{ $pro->category_name }}</td>
            <td>{{ $pro->brand_name }}</td>
            <td><span class="text-ellipsis">
              <?php
              if($pro->product_status==0){
                ?>
                <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
               }
              ?>
            </span></td>
 
            <td>
              <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a> <br>
                <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không ? ')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">                
                <i class="fa fa-times text-danger text"></i></a>
            </td>
            <td></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiện thị 5 sản phẩm trên 1 trang</small>
        </div>        
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$all_product->links()!!}
          </ul>
        </div>
      </div>
     
    </footer>
    
  </div>
</div>
@endsection