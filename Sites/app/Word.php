<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    //
    public $timestamps = false;

    protected $guarded = ['id'];

    public static $rules = [
    	'id' => 'required|integer',
    	'word' => 'required',
    	'form' => 'required'
    ];

    public function relation(){
    	return $this->hasMany('App\Relation');
    }

}
