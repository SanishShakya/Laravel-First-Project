<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $table = 'roles';

    protected $fillable = [
        'name', 'status','meta_description','meta_keyword','created_by','updated_by'
    ];


    function  createdBy(){
        return $this->hasOne(User::class,'id','created_by');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }

}
