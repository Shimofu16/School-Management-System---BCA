<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;

class Section extends Model {
    protected $table = 'sections';
    public $timestamps = false;
    /* kung ano yung hind lagyan ng data */
    /* but if naka set ang gouded ng empty ibigsabihin lahat ng nasa database table ay pwede lagyan*/
    public $guarded = [];
    /* kapag fillable naman selected fields langs ex. 'section_name', 'section shit' */

    public function students() {
        return $this->hasMany( 'App\Student' );
    }

    public function sections() {
        return $this->belongsToMany( Teacher::class );
    }
}
