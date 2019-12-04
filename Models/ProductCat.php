<?php

namespace Modules\Sia\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCat extends BaseModel{
	
    protected $fillable=['post_id'];
    protected $dates=['created_at','updated_at'];
    protected $primaryKey = 'post_id';
    public $incrementing = true;


    //--- RELATIONSHIP ---
    public function products(){
    	return $this->belongsToMany(Product::class);
	}
}
