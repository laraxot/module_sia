<?php

namespace Modules\Sia\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['id','title','description','video_src','created_at','updated_at'];
}
