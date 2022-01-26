<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grade_level;
use App\Section;
class Student extends Model
{
    protected $table = 'enrolled_students';
    public $timestamps = false;
    /* kung ano yung hind lagyan ng data */
    /* but if naka set ang gouded ng empty ibigsabihin lahat ng nasa database table ay pwede lagyan*/
    public $guarded = [];
    /* kapag fillable naman selected fields langs ex. "section_name","section id" */
    /* for ralation of section and student table*/

     public function section(){
        return $this->belongsTo(Section::class);
    }
    public function gradeLevel(){
        return $this->belongsTo(Grade_level::class);
    }
}
