<?php

namespace App;

use App\Teacher;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    public $timestamps = false;
    /* kung ano yung hind lagyan ng data */
    /* but if naka set ang gouded ng empty ibigsabihin lahat ng nasa database table ay pwede lagyan*/
    public $guarded = [];
    /* kapag fillable naman selected fields langs ex. "section_name","section id" */
/*     public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    } */
    /**
     * The teachers that belong to the Subject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roteachersles()
    {
        return $this->belongsToMany(Teacher::class);
    }
}
