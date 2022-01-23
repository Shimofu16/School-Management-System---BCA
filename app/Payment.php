<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    public $timestamps = false;
    /* kung ano yung hind lagyan ng data */
    /* but if naka set ang gouded ng empty ibigsabihin lahat ng nasa database table ay pwede lagyan*/
    public $guarded = [];
    /* kapag fillable naman selected fields langs ex. "section_name","section shit" */
    /* Year level connection | relation. */
    public function studentPayments(){
        return $this->hasMany('App\Enrollee');
    }

}
