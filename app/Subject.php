<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grade_level;
class Subject extends Model
{
    protected $table = 'subjects';
    public $timestamps = false;
    public $guarded = [];
    /* relationship of subjects and teacher*/
    public function gradeLevel(){
        return $this->belongsTo(Grade_level::class);
    }
}
