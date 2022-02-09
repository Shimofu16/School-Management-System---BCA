<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrolled_Requirement extends Model
{
    protected $table = 'enrolled_requirements';
    public $timestamps = false;
    public $guarded = [];
}
