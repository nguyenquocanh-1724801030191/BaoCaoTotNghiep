<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=Ư
    , initial-scale=1.0">
    <title>Gửi mã khuyến mãi cho khách hàng của Shop Giày Q & A</title>
</head>
<body>
    <div>
        <h2><b><i>
        @if($coupon['coupon_condition']==1)
                Giảm {{$coupon['coupon_number']}}%
            @else
                Giảm {{number_format($coupon['coupon_number'],0,',','.')}} VND
            @endif
            cho tổng đơn hàng đặt mua.
        </i></b></h2>
    </div>
    <h4>Gửi mã khuyến mãi cho khách hàng của Shop Giày Q & A</h4>
    <div class="container">
        <p class="code">Sử dụng mã code sau để được giảm giá cho đơn hàng: <span class="promo"> {{$coupon['coupon_code']}}</span></p>
        <p class="code">Số lượng mã code giảm giá là: {{$coupon['coupon_time']}} - hãy nhanh tay truy cập đến website của shop để mua hàng để được giảm giá.</p>
        <p class="expire">Ngày bắt đầu: {{$coupon['start_coupon']}}</p>
        <p class="expire">Ngày hết hạn code: {{$coupon['end_coupon']}}</p>
    </div>
</body>
</html>

