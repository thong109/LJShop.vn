<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'comment_name','comment','comment_date','comment_product_id','comment_parent_comment','comment_status'
    ];
    protected $primaryKey = 'comment_id ';
    protected $table = 'tbl_comment';
    public function product(){
        return $this->belongsTo(Product::class,'comment_product_id');
    }
}
