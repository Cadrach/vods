<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    public $fillable = [
        'code',
        'title',
        'html',
        'permalink',
        'last_edited',
    ];
}
