<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account_student extends Model
{
    protected $table = 'account_students';
    public $timestamps = false;
    public $guarded = [];
}
