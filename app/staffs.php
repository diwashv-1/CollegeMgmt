<?php

namespace College;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function subjects(){

        return $this->belongsToMany(Subject::class,'subject_staffs');
    }

public function questions(){

        return $this->hasMany(Question::class, 'staff_id')->select('id', 'question','set')
            ->where('approved',1);

}

    public function scopestaffsId(){

        $email = Auth::user()->email;

        return $teacherId = staffs::where('email', $email)->select('id')->first();
    }



    //
}
