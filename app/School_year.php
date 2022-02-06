<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enrollee;
use App\Student;

class School_year extends Model
{
    protected $table = 'school_years';
    public $timestamps = false;
    public $guarded = [];

    public function enrollees()
    {
        return $this->hasMany(Enrollee::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
