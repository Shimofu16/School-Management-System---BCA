<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';
    public $timestamps = false;
    /* kung ano yung hind lagyan ng data */
    /* but if naka set ang gouded ng empty ibigsabihin lahat ng nasa database table ay pwede lagyan*/
    public $guarded = [];

    public function users(){
        return $this->hasMany('App\User');
    }
}
