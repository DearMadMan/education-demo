<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    //
    protected $table = 'articles';

    protected $fillable = ['title' , 'content' , 'article_type_id' , 'is_show' , 'is_show_outside'];

    public function type ()
    {
        return  $this->hasOne('App\ArticleType','id','article_type_id');
    }

}
