<?php

namespace College;

use Illuminate\Database\Eloquent\Model;

class RecieveBooks extends Model
{
    protected $fillable = [
        'issue_id',
        'returnedDate'
    ];

    public $timestamps = false;


    //
}
