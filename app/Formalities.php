<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Formalities extends Model {

	//
	public function result()
    {
        return $this->hasOne('App\Result',"formalitie_id","id");
    }
}
