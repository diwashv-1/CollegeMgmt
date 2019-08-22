<?php

namespace College;

use Illuminate\Database\Eloquent\Model;

class staffs extends Model
{

    protected $fillable = [
        'staffName',
        'staffGender',
        'staffAddress',
        'staffImage',
        'contactNumber',
        'enrolledYear',
        'roleId',
        'email',
        'staffCode'


];




    public  function subjects(){


        return $this->belongsToMany(Subject::class,'subject_staffs');
    }




    //
}
