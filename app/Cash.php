<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model {

    protected $table="cashes";

    protected function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

}
