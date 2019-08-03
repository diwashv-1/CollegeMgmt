<?php

namespace College;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
        'bookName',
        'authorName',
        'facultyId',
        'selectFac',
        'publisher',
        'price',
        'entryDate',
        'bookCode',
        'bookType',
        'isbnCode',
        'quantity'
    ];
    //
}

