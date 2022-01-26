<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subject_teacher;

class Teacher extends Model
{
    protected $table = 'teachers';
    public $timestamps = false;
    public $guarded = [];

    public function subjects()
    {
        return $this->belongsTo(Subject_teacher::class);
    }
}
