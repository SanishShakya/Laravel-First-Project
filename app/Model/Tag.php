<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $table = 'tags';

    protected $fillable = [
        'name', 'slug', 'status','meta_description','meta_keyword','created_by','updated_by'
    ];


    function  createdBy(){
        return $this->hasOne(User::class,'id','created_by');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }



}
