<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeexam extends Model {

	//
	public function entitie()
    {
        return $this->belongsTo('App\Entitie');
    }

}
