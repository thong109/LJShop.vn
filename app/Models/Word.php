<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name','photo','phone_ext','mobile','email','position','position_other','address','phone',
        'birthday','place_birth','description','addtime','edittime','organid','weight','active',
        'dayinto','dayparty','marital_status','professional','political'
    ];
    protected $primaryKey = 'personid';
    protected $table = 'tbl_word';
}
