<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enrollee;
use App\Student;
use App\Subject;
use App\Section;

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
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
