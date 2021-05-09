<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Lang;
use App\Slider;
class HomeController extends Controller
{
    
    public function index(){

        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','0')->take(4)->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id' , 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id' , 'desc')->get();
        if(Session::has('locale')){
            app()->setLocale(Session::get('locale'));
        }
        $all_product = DB::table('tbl_product')->where('product_status','0')
                        ->orderby('product_id' , 'desc')->paginate(15);

        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('all_product', $all_product)->with('slider',$slider);
    }
    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','0')->take(4)->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id' , 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id' , 'desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();

        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('slider',$slider);  

    }
}