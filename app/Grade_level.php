<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enrollee;
use App\Student;

class Grade_level extends Model
{
    protected $table = 'grade_levels';
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
