<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Entitie extends Model {

	//
	public function fields()
    {
        return $this->hasOne('App\Field',"entitie_id","id");
    }
}
