<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['category_id', 'subcategory_id', 'unit_id','price','quantity','stock','description','short_decription',
        'name','slug','rank','status','meta_description','meta_keyword','created_by','updated_by'
    ];
    function createdBy(){
        return $this->hasOne(User::class, 'id','created_by');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}

