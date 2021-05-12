@extends('layout')
@section('content')
<div class="features_items">
  
    <h2 class="title text-center">{{ trans('home.chonsizephuhop')}}</h2>
   
    <h2 style="color: red;">Cách đo size giày & bảng size giày nam nữ chính xác nhất</h2>
    <p style="font-size: 11px;"><i>POSTED ON 10 THÁNG NĂM, 2021 BY ADMIN</i></p>
    <p style="font-size: 18px;">Chắc hẳn các bạn ai cũng đã từng có ít nhất một lần mua phải giày rộng hơn hoặc chật hơn kích thước chân mình,
        điều đó chẳng vui vẻ gì. Khi chúng ta biết rõ size giày của mình thì sẽ tốt hơn biết bao nhiêu phải không? </p>
    <p style="font-size: 18px;">Có bao giờ bạn thắc mắc đại loại như chân <b>24cm mang size gì?</b> Hay người ta làm thế nào để đo chân mình và tính được size giày họ sẽ đi? … </p>
    <p style="font-size: 18px;">Hôm nay <b>shopQ&A</b> sẽ hướng dẫn cho các bạn <b>cách đo size giày chuẩn quốc tế</b> dựa theo kích thước bàn chân cho nam, nữ và trẻ em.</p>
    <p style="font-size: 18px;">Không những thế, <b>shopQ&A</b> còn chia sẻ với các bạn <b>bảng đo size giày</b> theo từng thương hiệu giúp bạn quy đổi kích thước bàn chân để chọn ra một cỡ giày phù hợp cho bản thân, gia đình, bạn bè và người yêu.</p>

    <h2 style="color: forestgreen;"><center>Cách đo size giày bằng phương pháp đo size chân</center></h2>
    <p style="font-size: 18px; color: red;"><b>1. Cách đo size chân để biết size giày</b></p>
    
    <p style="font-size: 18px"><b style="color: red;">B1:</b> Đặt một tờ giấy A4 dưới sàn nhà, không nên đặt lên sàn nhà có thảm mềm, phải đảm bảo tờ giấy được đặt nơi bằng phẳng, mịn và cứng, để mình có thể viết lên tờ giấy được.</p>
    <center><img src="{{asset('public/frontend/images/step1.jpg')}}" alt="" /></center>   
    <br>
    
    <p style="font-size: 18px"><b style="color: red;">B2:</b> Bước chân lên giữa tờ giấy, chân phải được để yên và duỗi thẳng hết các ngón chân, bạn có thể đứng hoặc ngồi trên ghế khom lưng lại nhưng phải đảm bảo ống chân thẳng vuông góc với sàn nhà.</p>   
    <center><img src="{{asset('public/frontend/images/step2.jpg')}}" alt="" /></center>
    <br>
    
    <p style="font-size: 18px"><b style="color: red;">B3:</b> Dùng bút chì vẽ vòng quanh chân bạn để vẽ ra hình bàn chân trên giấy, bạn có thể đi đôi tất mình dự định mang nó với đôi giày của mình vào rồi vẽ sẽ chính xác hơn.</p>
    <center><img src="{{asset('public/frontend/images/step3.jpg')}}" alt="" /></center>
    <br>
    
    <p style="font-size: 18px"><b style="color: red;">B4:</b> Đánh dấu <b>chiều dài và chiều rộng của bàn chân</b>, vẽ các đường thẳng đi qua đó và vuông góc với nhau tạo ra một hình chữ nhật chứa hình vẽ bàn chân bạn.</p>
    <center><img src="{{asset('public/frontend/images/step4.jpg')}}" alt="" /></center>
    <br>
    
    <p style="font-size: 18px"><b style="color: red;">B5:</b> Dùng thước đo và ghi lại <b>kích thước chiều dài bàn chân</b>, kích thước này sẽ quyết định bạn đi cỡ giày bao nhiêu.</p>
    <center><img src="{{asset('public/frontend/images/step5.jpg')}}" alt="" /></center>
    <br>
    
    <p style="font-size: 18px"><b style="color: red;">B6:</b> Cũng dùng thước ghi lại <b>chiều rộng của bàn chân</b>, nhiều đôi giày sẽ có kích thước chiều rộng khác nhau, số đo này sẽ giúp bạn lựa chọn</p>
    <center><img src="{{asset('public/frontend/images/step6.jpg')}}" alt="" /></center>   
    <br>
    
    <p style="font-size: 18px"><b style="color: red;">B7:</b> Lấy <b>chiều dài và chiều rộng của bàn chân</b> đã được ghi lại trừ đi 0.5 cm (3/16 inches) cho mỗi số. Cái này là để trừ đi khoảng cách nhỏ của đường vẽ bút chì và kích thước thật của chân bạn (trừ hao khi bạn vẽ vòng ngoài của chân sẽ lớn hơn kích thước thật của chân mình).</p>  
    <center><img src="{{asset('public/frontend/images/step7.jpg')}}" alt="" /></center>
    <br>

    <p style="font-size: 18px;">Đến đây thì bạn đã biết được <b>cách đo size chân</b> của mình rồi, bây giờ sẽ đến bước tiếp theo: <b>tính size giày</b>.</p>

    <p style="font-size: 18px; color: red;"><b>2. Cách tính size giày</b></p>
    <p style="font-size: 18px"><b style="color: red;">B8:</b> Các bạn sẽ dùng chiều dài, chiều rộng bàn chân tìm ra size giày đúng của mình bằng cách tham khảo các <b>bảng size giày theo chuẩn quốc tế dưới đây</b>.</p>  

    <p style="font-size: 18px; color: red;"><b>Note</b></p>
    <p style="font-size: 18px"><b style="color: black;"> + </b> Mỗi đất nước sẽ dùng <b>bảng size giày</b> khác nhau, như nước Mỹ thì dùng <b>bảng US Size</b>, nước Anh thì dùng <b>bảng UK Size</b>, còn Việt Nam chúng ta thì dùng <b>bảng Euro Size (EU)</b>.</p>  
    <p style="font-size: 18px"><b style="color: black;"> + </b> Nam, nữ, trẻ em và mỗi thương hiệu riêng đều có <b>bảng quy đổi size giày riêng.</b>.</p>  



    <p style="font-size: 18px; color: red;"><b>2.1 Cách chọn size giày dựa theo chiều dài bàn chân</b></p>
    <p style="font-size: 18px;">Một điều cần lưu ý nữa khi các bạn đối chiếu size trong các bảng quy đổi size giày dưới đây đó là các nhà sản xuất giày sẽ sản xuất size giày lẻ để những người có số đo bàn chân nằm khoảng giữa 2 size cũng có thể tìm cho mình một đôi giày phù hợp.</p>
    <p style="font-size: 18px;">Đó là lý do có các size như 39 1/3 hay 40 2/3, những size lẻ này các nhà buôn thường gọi là size 39.5, 40.5. Trong bài viết dưới đây bumshop sẽ kí hiệu những size đó theo cách khác. VD như size 39.5 là 39 – 40, 40.5 là 40 – 41 và những size khác cũng tương tự cho các bạn dễ hiểu. </p>
    <center><b style="font-size: 18px">Bảng size giày nam</b></center>
    <br>
    <center><img src="{{asset('public/frontend/images/bang-size-giay-nam.jpg')}}" alt="" /></center>
    <br>
    
    <center><b style="font-size: 18px">Bảng size giày nữ</b></center>
    <br>
    <center><img src="{{asset('public/frontend/images/bang-size-giay-nu.jpg')}}" alt="" /></center>
    <br>
    <br>
    
    <h2 style="color: forestgreen;"><center>Bảng size giày chuẩn của các thương hiệu nổi tiếng</center></h2>
   
    <p style="font-size: 18px; color: red;"><b style="color: red;">1. Bảng size giày <b style="color: blue;">Converse</b></b></p>
    <center><b style="font-size: 18px">Bảng size giày Converse nam</b></center>
    <br>
    <center><img src="{{asset('public/frontend/images/th1.jpg')}}" alt="" /></center>
    <br>

    <center><b style="font-size: 18px">Bảng size giày Converse nữ</b></center>
    <br>
    <center><img src="{{asset('public/frontend/images/th2.jpg')}}" alt="" /></center>
    <br>


    <p style="font-size: 18px; color: red;"><b style="color: red;">1. Bảng size giày <b style="color: blue;">Adidas</b></b></p>
    <center><b style="font-size: 18px">Bảng size giày Adidas nam và nữ</b></center>
    <br>
    <center><img src="{{asset('public/frontend/images/th3.jpg')}}" alt="" /></center>
    <br>


    <p style="font-size: 18px; color: red;"><b style="color: red;">1. Bảng size giày <b style="color: blue;">Vans</b></b></p>
    <center><b style="font-size: 18px">Bảng size giày Vans nam và nữ</b></center>
    <br>
    <center><img src="{{asset('public/frontend/images/th4.jpg')}}" alt="" /></center>
    <br>

    <p style="font-size: 18px; color: red;"><b style="color: red;">1. Bảng size giày <b style="color: blue;">Nike</b></b></p>
    <center><b style="font-size: 18px">Bảng size giày Nike nam</b></center>
    <br>
    <center><img src="{{asset('public/frontend/images/th5.jpg')}}" alt="" /></center>
    <br>
    <center><b style="font-size: 18px">Bảng size giày Nike nữ</b></center>
    <br>
    <center><img src="{{asset('public/frontend/images/th6.jpg')}}" alt="" /></center>
    <br>












</div>



@endsection 