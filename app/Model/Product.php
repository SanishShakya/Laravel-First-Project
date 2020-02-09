<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['category_id',
        'name','slug','rank','status','meta_description','meta_keyword','created_by','updated_by'
    ];
    function createdBy(){
        return $this->hasOne(User::class, 'id','created_by');
    }
    function categoryName(){
        return $this->hasOne(Category::class, 'id','category_id');
    }
    function updatedBy(){
        return $this->hasOne(User::class, 'id','updated_by');
    }
}

