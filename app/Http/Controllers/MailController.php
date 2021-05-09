<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Mail;
use App\Coupon;
use App\Customer;
use Carbon\Carbon;

class MailController extends Controller
{
    public function send_coupon($coupon_time,$coupon_condition,$coupon_number,$coupon_code){
        $customer = Customer::where('customer_vip','=',NULL)->get();
        $coupon = Coupon::where('coupon_code',$coupon_code)->first();
        $start_coupon = $coupon->coupon_date_start;
        $end_coupon = $coupon->coupon_date_end;

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

        $title_mail = "Mã khuyến mãi của Shop Giày Q & A dành cho khách hàng ngày".' '.$now;
        $data=[
        ];
        foreach($customer as $normal){
            $data['email'][] = $normal->customer_email;
        }
        // dd($data);

        $coupon = array(
            'start_coupon' => $start_coupon,
            'end_coupon' => $end_coupon,
            'coupon_time'=> $coupon_time,
            'coupon_condition'=> $coupon_condition,
            'coupon_number'=> $coupon_number,
            'coupon_code'=> $coupon_code
        );

        Mail::send('pages.send_coupon',['coupon' => $coupon], function($message) use ($title_mail,$data){
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'],$title_mail);
        });
        return redirect()->back()->with('message','Gửi mã khuyến mãi cho khách thành công');

    }
    public function send_coupon_vip($coupon_time,$coupon_condition,$coupon_number,$coupon_code){
        $customer_vip = Customer::where('customer_vip',1)->get();
        $coupon = Coupon::where('coupon_code',$coupon_code)->first();
        $start_coupon = $coupon->coupon_date_start;
        $end_coupon = $coupon->coupon_date_end;

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

        $title_mail = "Mã khuyến mãi của Shop Giày Q & A dành cho khách hàng ngày".' '.$now;
        $data=[
        ];
        foreach($customer_vip as $vip){
            $data['email'][] = $vip->customer_email;
        }
        // dd($data);

        $coupon = array(
            'start_coupon' => $start_coupon,
            'end_coupon' => $end_coupon,
            'coupon_time'=> $coupon_time,
            'coupon_condition'=> $coupon_condition,
            'coupon_number'=> $coupon_number,
            'coupon_code'=> $coupon_code
        );

        Mail::send('pages.send_coupon_vip',  ['coupon' => $coupon] , function($message) use ($title_mail,$data){
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'],$title_mail);
        });
       
        return redirect()->back()->with('message','Gửi mã khuyến mãi cho khách vip thành công');

    }
    public function mail_order(){
        return view('pages.mail.mail_order');    
    }
}
