@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách đơn hàng
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
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày tháng đặt hàng</th>
                        <th>Tình trạng đơn hàng</th>
                        <th style="width:100px;">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach($order as $key => $ord)
                    @php
                    $i++;
                    @endphp
                    <tr>
                        <td><i>{{$i}}</i></td>
                        <td>{{$ord->order_code}}</td>
                        <td>{{$ord->created_at}}</td>
                        <td>
                            @if($ord->order_status==1)
                                Đơn hàng mới
                            @else 
                                Đã xử lý - Đã giao hàng
                            @endif
                        </td>


                        <td>
                            <a href="{{URL::to('/view-order/'.$ord->order_code)}}" class="active styling-edit"
                                ui-toggle-class="">
                                <i class="fa fa-eye text-success text-active"></i></a>
                                <br>
                            <a onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này không ? ')"
                                href="{{URL::to('/delete-order/'.$ord->order_code)}}" class="active styling-edit"
                                ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiện thị 10 đơn hàng trên 1 trang</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$order->links()!!}
          </ul>
        </div>
      </div>
    </footer>
    </div>
</div>
@endsection