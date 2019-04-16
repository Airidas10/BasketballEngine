<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tactic extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'tactic_type_id'];
    protected $visible = ['id', 'name', 'description'];
    // protected $appends = ['tactic_type_name'];


    public function tactic_type()
    {
        return $this->belongsTo('App\TacticType');
    }

    // public function getTacticTypeNameAttribute()
    // {
    //     return $this->tactic_type->name;
    // }
}
