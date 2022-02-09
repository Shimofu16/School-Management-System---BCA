<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enrollee;
class Enrollee_Requirement extends Model
{
    protected $table = 'enrollee_requirements';
    public $timestamps = false;
    public $guarded = [];
    public function enrollee()
    {
        return $this->belongsTo(Enrollee::class);
    }
}
