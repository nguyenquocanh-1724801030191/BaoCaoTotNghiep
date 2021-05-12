<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Slider;
use App\Contact;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
class ContactController extends Controller
{
    public function lien_he(Request $request){
      $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','0')->take(4)->get();     
      $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
      $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
  

      return view('pages.lienhe.contact')->with('category',$cate_product)->with('brand',$brand_product)->with('slider',$slider);

  }

  //Làm cách tính size giày cho khách hàng
  public function tinh_size(Request $request){
    $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','0')->take(4)->get();     
    $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
    $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 


    return view('pages.tinhsize.size_shoes')->with('category',$cate_product)->with('brand',$brand_product)->with('slider',$slider);

  }
}
