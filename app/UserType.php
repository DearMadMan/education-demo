<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model {

	//
    public function user(){
        return $this->belongsTo('App\User','id','user_type_id');
    }

}
