<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model {

	//
    protected $table="reports";

    protected $fillable=['wechat','qq','phone','case','reply'];

    protected function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

}
