<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;
class Subject_teacher extends Model
{
    protected $table = 'subject_teachers';
    public $timestamps = false;
    public $guarded = [];
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
