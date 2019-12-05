<?php

namespace Modules\Sia\Models;

class ProductCat extends BaseModel {
    protected $fillable = ['post_id'];
    protected $dates = ['created_at', 'updated_at'];
    protected $primaryKey = 'post_id';
    public $incrementing = true;

    //--- RELATIONSHIP ---
    public function products() {
        $pivot_table = with(new ProductProductCatPivot())->getTable();

        return $this->belongsToMany(Product::class, $pivot_table)
                    ->using(ProductProductCatPivot::class)
                    ;
    }
}
