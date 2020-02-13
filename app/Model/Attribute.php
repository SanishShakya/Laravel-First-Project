<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use SoftDeletes;

    protected $table = 'attributes';

    protected $fillable = [
       'product_id', 'name', 'value'];


    function  createdBy(){
        return $this->hasOne(User::class,'id','created_by');
    }

}
