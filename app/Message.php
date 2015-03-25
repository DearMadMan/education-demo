<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	//
    protected $table="messages";

    protected $fillable=['title','content'];

    protected function user(){
      return  $this->belongsTo('App\User','user_id','id');
    }

}
