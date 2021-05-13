<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'product_id', 'size'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'tbl_product_size';
    
}
