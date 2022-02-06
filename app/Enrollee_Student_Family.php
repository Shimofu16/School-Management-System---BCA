<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enrollee;
class Enrollee_Student_Family extends Model
{
    protected $table = 'enrollee_student_families';
    public $timestamps = false;
    public $guarded = [];
    public function enrollee()
    {
        return $this->belongsTo(Enrollee::class);
    }
}
