<?php namespace App\Http\Controllers;

use App\Article;
use App\ArticleType;
use App\Cash;
use App\Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\URL;
use Input;

class AdminController extends Controller
{

    //
    public function __construct ()
    {

        $this->middleware ('admin');

    }

    public function getIndex ()
    {

        return view ('admin.dashboard');
    }

    public function postUpload ()
    {

        if (Input::hasFile ('upload')) {

            $upload = Input::file ('upload');

            $order = ['image/jpeg' , 'image/gif' , 'image/png'];
            if ( ! in_array ($upload->getClientMimeType () , $order)) {
                return "请传入正确的图片类型！";
            }
            $dir = 'images/' . date ('Y-m-d') . '/';
            $name = md5 (time () . rand (0 , 9999999) . $upload->getFilename ()) . '.jpg';
            $target = $upload->move ($dir , $name);
            $target = url ('/') . '/' . $dir . $name;
            $fn = Input::get ('CKEditorFuncNum');
            $str = "<script>window.parent.CKEDITOR.tools.callFunction('$fn', '$target','文件已经上传');</script>";

            return $str;
        }

        if (Input::hasFile ('file')) {

            $upload = Input::file ('file');

            $order = ['image/jpeg' , 'image/gif' , 'image/png'];
            if ( ! in_array ($upload->getClientMimeType () , $order)) {
                return "请传入正确的图片类型！";
            }
            $dir = 'images/' . date ('Y-m-d') . '/';
            $name = md5 (time () . rand (0 , 9999999) . $upload->getFilename ()) . '.jpg';
            $target = $upload->move ($dir , $name);
            $target =  $dir . $name;

            return $target;
        }

    }


    public function getArticleType ($id)
    {
        $articles = Article::where ('article_type_id' , $id);
        $types = ArticleType::find ($id);
        $articles = $articles->OrderBy('created_at','desc')->simplePaginate (10);

        return view ('admin.articleList')
            ->with ('is_type' , $id)
            ->with ('types' , $types)
            ->with ('articles' , $articles);

    }

    public function postUserSearch ()
    {
        $search=Input::get('search');


        $users=User::where('qq','like','%'.$search.'%')
            ->orwhere('wechat','like','%'.$search.'%')
            ->orwhere('phone','like','%'.$search.'%')
            ->orwhere('name','like','%'.$search.'%')
            ->orwhere('email','like','%'.$search.'%')
            ->simplePaginate(10);


        return view('admin.userList')
            ->with('users',$users);

    }

    public function getConfig(){
        return view('admin.config');
    }
    public function postConfig()
    {
        $config=Input::all();
        $configs=json_encode($config);
        $config=Config::find(1);
        $config->value=$configs;
        $config->save();
        return redirect('admin/config')
            ->with('tips','系统配置已经更新！');
    }

    public  function postDelete(){
        $in=Input::get('in');
        $table=Input::get('table');
        $in=trim($in,',');
        $in=explode(',',$in);
      //  DB::connection()->enableQueryLog();
       DB::table($table)->whereIn('id',$in)->delete();
       // $queries = DB::getQueryLog();

    }

    public  function  postPay(){
        $id=Input::get('t_id');

        $cash=Cash::find($id);
        $cash->is_pay=1;
        $cash->save();
    }

}
