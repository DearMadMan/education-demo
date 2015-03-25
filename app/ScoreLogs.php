<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreLogs extends Model {

	//
    protected $table="score_logs";

    protected $fillable=['user_id','type','summary'];


    protected function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
