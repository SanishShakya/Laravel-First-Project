<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use SoftDeletes;
    protected $table = 'modules';
    protected $fillable = [
        'name','route','status','created_by','updated_by'
    ];
    function createdBy(){
        return $this->hasOne(User::class, 'id','created_by');
    }

    function updatedBy(){
        return $this->hasOne(User::class, 'id','updated_by');
    }
}

