<?php

namespace College;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable =[
        'name'
    ];



    public $timestamps = false;


    public function User(){
        return $this->hasMany('College\User');

    }



    //
}
