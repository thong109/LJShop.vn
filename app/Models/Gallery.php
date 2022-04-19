<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "tbl_gallery";
    protected $filltable = [
        'gallery_name','gallery_image','product_id'
    ];
    protected $primaryKey = "gallery_id";
    // public function gallery(){
    //     return $this->belongsTo(Product::class,'product_id','product_id');
    // }
}
