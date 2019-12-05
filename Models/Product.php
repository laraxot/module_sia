<?php

namespace Modules\Sia\Models;

class Product extends BaseModel {
    protected $fillable = ['post_id'];
    protected $dates = ['created_at', 'updated_at'];
    protected $primaryKey = 'post_id';
    public $incrementing = true;

    //--- RELATIONSHIP ---
    public function productCats() {
        $pivot_table = with(new ProductProductCatPivot())->getTable();

        return $this->belongsToMany(ProductCat::class, $pivot_table)
                    ->using(ProductProductCatPivot::class)
                    ;
    }
}
