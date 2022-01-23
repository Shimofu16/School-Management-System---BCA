<?php

namespace App;

use App\Subject;
use App\Section;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    public $timestamps = false;
    public $guarded = [];

  /*   public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    } */
    /**
     * The roles that belong to the Teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
    public function sections(){
        return $this->belongsToMany(Subject::class);
    }
}
