<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'name', 'slug', 'rank', 'description','status','meta_description','meta_keyword','created_by','updated_by','image'
    ];


    function  createdBy(){
        return $this->hasOne(User::class,'id','created_by');
    }
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
