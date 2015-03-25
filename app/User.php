<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract , CanResetPasswordContract
{

    use Authenticatable , CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name' , 'email' , 'password' , 'nick_name' , 'repassword' , 'qq' , 'address' , 'phone' , 'wechat' , 'alipay'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password' , 'remember_token' , 'repassword'];

    public function type ()
    {
        return $this->hasOne ('App\UserType' , 'id' , 'user_type_id');
    }

    public function message ()
    {
        return $this->hasMany ('App\Message' , 'user_id' , 'id');
    }

    public function systemMessage ()
    {
        return $this->hasMany ('App\SystemMessage' , 'user_id' , 'id');
    }

    public function report ()
    {
        return $this->hasMany('App\Report','user_id','id');
    }

    public function scoreLogs(){
        return $this->hasMany('App\ScoreLogs','user_id','id');
    }

    public function cash(){
        return $this->hasMany('App\Cash','user_id','id');
    }

}
