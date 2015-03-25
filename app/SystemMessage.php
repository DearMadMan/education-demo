<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemMessage extends Model
{

    protected $fillable = ['title' , 'content','user_id','is_show_everyone'];

    protected $table = "system_messages";

    protected function user ()
    {
        return $this->belongsTo ('App\User' , 'user_id' , 'id');

    }
}
