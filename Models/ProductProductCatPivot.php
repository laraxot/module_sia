<?php

namespace Modules\Sia\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductProductCatPivot extends Pivot {
    protected $fillable = ['id', 'product_post_id', 'product_cat_post_id'];
    protected $dates = ['created_at', 'updated_at'];
    protected $primaryKey = 'post_id';
    public $incrementing = true;
}
