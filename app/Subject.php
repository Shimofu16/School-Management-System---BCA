<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;
class Subject extends Model
{
    protected $table = 'subjects';
    public $timestamps = false;
    public $guarded = [];
    /* relationship of subjects and teacher*/
  
}
