<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model {

	//

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function formalitie()
    {
        return $this->belongsTo('App\Formalities');
    }
    
    public function companie()
    {
        return $this->belongsTo('App\Companie');
    }
    public function specialist()
    {
        return $this->belongsTo('App\Specialist');
    }

    public function typeexam()
    {
        return $this->belongsTo('App\Typeexam');
    }
    
    public function entitie()
    {
        return $this->belongsTo('App\Entitie');
    }

}
