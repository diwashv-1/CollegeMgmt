<?php

namespace College;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{

    protected  $fillable = [
        'studentId',
        'teacheId',
        'issuedDate',
        'expiryDate'
    ];

    //
}