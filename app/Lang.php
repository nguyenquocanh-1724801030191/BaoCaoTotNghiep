<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'sp_vi', 'sp_en'
    ];
    protected $primaryKey = 'id_lang ';
 	protected $table = 'tbl_lang';
}
