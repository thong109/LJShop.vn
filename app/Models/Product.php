<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'product_name','product_desc','product_status','product_slug','product_views','product_content','product_price','product_image','product_tags'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
