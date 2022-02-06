<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
class Enrolled_Student_Family extends Model
{
    protected $table = 'enrolled_student_families';
    public $timestamps = false;
    public $guarded = [];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
