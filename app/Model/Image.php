<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    protected $table = 'images';

    protected $fillable = ['product_id', 'image', 'title'];


    function  createdBy(){
        return $this->hasOne(User::class,'id','created_by');
    }

}
