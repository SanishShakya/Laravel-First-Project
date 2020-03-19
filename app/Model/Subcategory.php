<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use SoftDeletes;

    protected $table = 'subcategories';

    protected $fillable = ['category_id',
        'name', 'slug', 'rank','status','meta_description','meta_keyword','created_by','updated_by','image'
    ];


    function  createdBy(){
        return $this->hasOne(User::class,'id','created_by');
    }
    public function categoryName()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
