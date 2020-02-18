<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;

    protected $table = 'units';

    protected $fillable = [
        'name', 'status','created_by','updated_by'
    ];


    function  createdBy(){
        return $this->hasOne(User::class,'id','created_by');
    }


}
