<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grade_level;
use App\Enrollee_Student_Family;
class Enrollee extends Model
{
    protected $table = 'enrollees';
    public $timestamps = false;
    /* kung ano yung hind lagyan ng data */
    /* but if naka set ang gouded ng empty ibigsabihin lahat ng nasa database table ay pwede lagyan*/
    public $guarded = [];
    /* kapag fillable naman selected fields langs ex. "section_name","section shit" */
    /* Year level connection | relation. */
    public function gradeLevel(){
        return $this->belongsTo(Grade_level::class);
    }
    public function families()
    {
        return $this->hasMany(Enrollee_Student_Family::class);
    }
}
