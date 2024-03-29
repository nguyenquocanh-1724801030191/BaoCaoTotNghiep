<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'product_name', 'product_name_en','category_id','brand_id','product_desc','product_content',
        'product_price','product_image','product_status','price_cost','product_size'
    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'tbl_product';
     public function configs(){
         return $this->hasMany('ProductSize', 'product_id','product_id');
     }
}
