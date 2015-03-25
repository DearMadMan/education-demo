<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleType extends Model
{

    protected $table = "article_types";

    protected $fillable = ['type_name' , 'user_permissible'];

    public function article ()
    {
        return  $this->belongsTo ('App\Article' , 'article_type_id' , 'id');
    }

}
