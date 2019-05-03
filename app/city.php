<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $fillable = ['name'];

    public function districts()
    {
    	return $this->hasMany('App\districts');
    }
}
