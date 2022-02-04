<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School_year extends Model
{
    protected $table = 'school_years';
    public $timestamps = false;
    public $guarded = [];
}
