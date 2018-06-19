<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    //
    public $timestamps = false;

    public static $rules = [
    	'id' => 'required|integer',
    	'associated_word_id' => 'required|integer',
    	'word' => 'required',
    	'form' => 'required'
    ];
    public function words(){
    	return $this->belongsTo('App\Word');
    }
    public function scopeIdEqual($query,$id){
        return $query->where('word_id',$id);
    }
}
