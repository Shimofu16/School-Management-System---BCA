<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year_level extends Model
{
    protected $table = 'year_level';
    public $timestamps = false;
    /* kung ano yung hind lagyan ng data */
    /* but if naka set ang gouded ng empty ibigsabihin lahat ng nasa database table ay pwede lagyan*/
    public $guarded = [];
    /* kapag fillable naman selected fields langs ex. "section_name","section shit" */

    /* registered student connection */
    public function studentsyl(){
        return $this->hasMany('App\Student');
    }
    /* unregistered student connection */
    public function enrolleesyl(){
        return $this->hasMany('App\Enrollee');
    }
}
