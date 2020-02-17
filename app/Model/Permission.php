<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;
    protected $table = 'permissions';
    protected $fillable = [
        'name','route','module_id','status','created_by','updated_by'
    ];
    function createdBy(){
        return $this->hasOne(User::class, 'id','created_by');
    }
    function updatedBy(){
        return $this->hasOne(User::class, 'id','updated_by');
    }
    function moduleName(){
        return $this->hasOne(Module::class, 'id','module_id');
    }
}
