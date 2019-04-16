<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TacticType extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false;

    public function tactics()
    {
        return $this->hasMany('App\Tactic');
    }
}
