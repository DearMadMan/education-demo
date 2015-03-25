<?php namespace App\Http\Controllers;

use App\Article;
use App\Cash;
use App\Http\Requests\ReportRequest;
use App\Http\Requests\StoreUserPostRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Message;
use App\Report;
use App\SystemMessage;
use App\User;
use Auth;
use DB;
use Hash;
use Input;
use Session;


class UserDashboardController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct ()
    {
        $this->middleware ('auth');
        $this->middleware ('userLevel');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function getIndex ()
    {
        //Auth::logout();
        $user = Auth::user ();
        if ($user->is_admin == 1) {
            return redirect ('admin');
        }

        $systemNum = SystemMessage::where ('user_id' , $user->id)
            ->orWhere ('is_show_everyone' , 1)
            ->count ();

        return view ('user.dashboard')
            ->with ('user' , $user)
            ->with ('msg_number' , $systemNum);
    }

    public function getLogout ()
    {
        Auth::logout ();

        return redirect ('/');
    }

    public function getSystemMessage ()
    {

        $messages = SystemMessage::where ('user_id' , Auth::user ()->id)
            ->where('is_delete',0)
            ->orWhere ('is_show_everyone' , 1)
            ->orderBy ('created_at' , 'desc')
            ->simplePaginate (10);

        $user = Auth::user ();
        $systemNum = SystemMessage::where ('user_id' , $user->id)
            ->orWhere ('is_show_everyone' , 1)
            ->count ();

        $user->msg_number = $systemNum;
        $user->save ();

        return view ('user.systemMessage')
            ->with ('title' , '站内信息')
            ->with ('messages' , $messages);
    }

    public function getMyfile ()
    {
        $user = Auth::user ();

        return view ('user.myfile')
            ->with ('user' , $user);
    }

    public function postMyfile (UserUpdateRequest $request)
    {
        $user = Auth::user ();

        $user->nick_name = Input::get ('nick_name');
        $user->qq = Input::get ('qq');
        $user->address = Input::get ('address');
        $user->phone = Input::get ('phone');
        $user->wechat = Input::get ('wechat');
        $user->alipay = Input::get ('alipay');
        $user->save ();

        return redirect ('user/myfile')
            ->with ('tips' , '我的信息更新成功！');


    }

    public function getReport ()
    {
        return view ('user/report');
    }

    public function postReport (ReportRequest $request)
    {
        $user = Auth::user ();


        /* 限制每天分享次数 */

        $time= strtotime(date('Y-m-d'));
        $time=date('Y-m-d H:i:s',$time);

        $count=Report::where('user_id',$user->id)
            ->where('created_at','>',$time)
            ->count();

        if($count>=3){
            return redirect ('user')
                ->with ('tips' , '举报次数过多，亲请明天再来吧~');
        }


        $report = new Report;
        $report->user_id = $user->id;
        $report->wechat = Input::get ('wechat');
        $report->qq = Input::get ('qq');
        $report->phone = Input::get ('phone');
        $report->case = Input::get ('case');
        $report->save ();

        return redirect ('user')
            ->with ('tips' , '您的举报信息已经提交,请等待管理员的回信');
    }

    public function getPublish ()
    {
        $articles = Article::where ('article_type_id' , '2')
            ->where ('is_show' , 1)
            ->orderBy('created_at','desc')
            ->simplePaginate (10);

        return view ('user.articleList')
            ->with ('article_title' , '内部公告')
            ->with ('articles' , $articles);

    }

    public function getArticle ($id)
    {
        $article = Article::find ($id);
        if (empty($article)) {
            return redirect ('user')
                ->with ('tips' , '文章不存在！');
        }

        $article_permissible = $article->type->user_permissible;
        if (empty($article_permissible)) {
            return redirect ('user')
                ->with ('tips' , '您不具备访问该页面的权限，请联系管理员');
        }
        $user_permissible = explode (',' , $article_permissible);
        $user = Auth::user ();
        if ( ! in_array ($user->user_type_id , $user_permissible)) {
            return redirect ('user')
                ->with ('tips' , '您不具备访问该页面的权限，请联系管理员');
        }

        Session::reflash() ;

        return view ('user.articleSingle')
            ->with ('article' , $article);


    }


    public function getMessage ()
    {
        $messages = Message::where ('is_show' , 1)
            ->orderBy ('created_at' , 'desc')
            ->simplePaginate (10);

        return view ('user.message')
            ->with ('messages' , $messages);


    }

    public function postMessage ()
    {
        $user = Auth::user ();


        /* 限制每天分享次数 */

       $time= strtotime(date('Y-m-d'));

        $time=date('Y-m-d H:i:s',$time);

        $count=Message::where('user_id',$user->id)
            ->where('created_at','>',$time)
            ->count();

        if($count>=3){
            return redirect ('user')
                ->with ('tips' , '分享次数过多，亲请明天再来吧~');
        }





        $content = Input::get ('content');
        if ( ! empty($content)) {
            $message = New Message;
            $message->title='来自：'.$user->email."的留言";
            $message->user_id = $user->id;
            $message->content = $content;
            $message->save ();

        }

        return redirect ('user')
            ->with ('tips' , '您的分享已经发送，感谢您的分享~');
    }

    public function getScore ()
    {
        $user = Auth::user ();
        $cashes = Cash::where ('user_id' , $user->id)
            ->orderBy ('created_at' , 'desc')
            ->simplePaginate (10);

        return view ('user.cashes')
            ->with ('cashes' , $cashes)
            ->with ('user' , $user);
    }

    public function postScore ()
    {
        $user = Auth::user ();
        $point = Input::get ('point');
        if($point<=0){
            return redirect ('user')
                ->with ('tips' , '请输入正确的数值！');
        }
        if($point<50){
            return redirect ('user')
                ->with ('tips' , '提现金额必须大于50！');
        }
        $point = abs ($point);
        if ($point > $user->score) {
            return redirect ('user')
                ->with ('tips' , '积分不足,无法提现');
        }

        $cash = new Cash;
        $cash->user_id = $user->id;
        $cash->point = $point;
        $cash->save ();
        $user->score -= $point;
        $user->save ();

        return redirect ('user')
            ->with ('tips' , '您的提现请求已经发送，请耐心等待管理员处理');
    }

    public function getLow ()
    {

        if ( ! Session::has ('pass')) {
            return view ('user.protect')
                ->with ('url' , 'user/low');
        }

        $articles = Article::where ('article_type_id' , '3')
            ->where ('is_show' , 1)
            ->orderBy('created_at','desc')
            ->simplePaginate (10);
        Session::reflash();
        return view ('user.articleList')
            ->with ('article_title' , '初级专区')
            ->with ('articles' , $articles);
    }

    public function getHigh ()
    {
        if ( ! Session::has ('pass')) {
            return view ('user.protect')
                ->with ('url' , 'user/high');
        }
        Session::reflash();
        $articles = Article::where ('article_type_id' , '4')
            ->where ('is_show' , 1)
            ->orderBy('created_at','desc')
            ->simplePaginate (10);

        return view ('user.articleList')
            ->with ('article_title' , '高级专区')
            ->with ('articles' , $articles);
    }

    public function getRegister ()
    {

        if ( ! Session::has ('pass')) {
            return view ('user.protect')
                ->with ('url' , 'user/register');
        }
        Session::reflash();
        return view ('user.register');
    }

    public function postRegister (StoreUserPostRequest $request)
    {
        $name=Input::get('name');
        $a=preg_match('/['.chr(0xa1).'-'.chr(0xff).']/', $name);
        if($a){
            return redirect ('user')
                ->with ('tips' , '用户名:' . $name . '不能含有汉字！');
        }
        Session::reflash();
        $user = new User;
        $user->name = Input::get ('name');
        $user->email = Input::get ('email');
        $user->password = Hash::make (Input::get ('password'));
        // $user->repassword=Input::get('repassword');
        $user->parent_id=Auth::user()->id;
        $user->save ();

        return redirect ('user')
            ->with ('tips' , '用户:' . $user->name . '已经创建成功！');


    }

    public function postRepassword ()
    {

        $user = Auth::user ();
        $pass = false;

        if(empty($user->repassword))
        {
            $pass = true;
            Session::flash ('pass' , $pass);
            return redirect (Input::get ('url'));

        }

        if ($user->repassword == Input::get ('repassword') && $user->repassword != '') {
            $pass = true;
            Session::flash ('pass' , $pass);
            return redirect (Input::get ('url'));

        }

        return redirect ('user')
            ->with ('tips' , '密保效验错误！请输入正确的密保！');


    }


    public function getModifyPassword(){
        $user=Auth::user();
        if(empty($user->repassword))
        {
            return view('user.repassword');
        }
        if ( ! Session::has ('pass')) {
            return view ('user.protect')
                ->with ('url' , 'user/modify-password');
        }
        Session::reflash();
       return view('user.repassword');

    }

    public function postModifyPassword(){
        $user=Auth::user();
        if ( ! Session::has ('pass') && !empty($user->repassword)) {
            return view ('user.protect')
                ->with ('url' , 'user/modify-password');
        }

        $passwrod=Input::get('password');
        $user=Auth::user();
        $rule=['name'=>$user->name,'password'=>$passwrod];
        if(Auth::validate($rule))
        {
            $new_password=Input::get('new_password');
            if(!empty($new_password)){

                $new_password_confirmation=Input::get('new_password_confirmation');

                if($new_password!=$new_password_confirmation){
                    Session::reflash();
                    return redirect('user/modify-password')
                        ->with('tips','两次密码输入不一致！');
                }

                $user->password=Hash::make($new_password);
                
            }
            $new_repassword=Input::get('repassword');
            if(!empty($new_repassword)){
                if(strlen($new_repassword)<6)
                {
                    return redirect('user/myfile')
                        ->with('tips','密保不能小于6位数！');
                }
                $user->repassword=$new_repassword;
            }
            $user->save();
            return redirect('user/myfile')
                ->with('tips','数据更新成功！');
        }

        return redirect('user')
            ->with('tips','密码错误，请重新尝试！');
    }

    public function postDelete(){
        $user=Auth::user();
        $msg_id=Input::get('message_id');
        $message=SystemMessage::find($msg_id);
        if(!empty($message)){
            if($message->user_id==$user->id&&$message->is_show_everyone!=1){
              $message->is_delete=1;
                $message->save();
            }
        }
    }

}
