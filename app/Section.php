<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
class Section extends Model
{
    protected $table = 'sections';
    public $timestamps = false;
    public $guarded = [];
    public function students(){
        return $this->hasMany(Student::class);
    }
}
