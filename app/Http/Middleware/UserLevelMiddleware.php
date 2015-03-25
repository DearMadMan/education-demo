<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;

class UserLevelMiddleware implements Middleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle ($request , Closure $next)
    {
        $user = $request->user ();
        if ($request->is ('user/report','user/publish','user/message','user/score','user/low','user/register')) {
            if(empty($user->repassword))
            {
                return redirect ('user')
                    ->with ('tips' , '请先进入个人资料设置密保！<a href="user/modify-password">点击设置</a>');
            }

            if ($user->user_type_id != 2 && $user->user_type_id != 3) {
                return redirect ('user')
                    ->with ('tips' , '该专区您无权限进入，详情联系管理员');
            }
        }
        if ($request->is ('user/high')) {
            if(empty($user->repassword))
            {
                return redirect ('user')
                    ->with ('tips' , '请先进入个人资料设置密保！<a href="user/modify-password">点击设置</a>');
            }
            if ($user->user_type_id != 3) {
                return redirect ('user')
                    ->with ('tips' , '高级专区您无权限进入，详情联系管理员');
            }
        }

        return $next($request);
    }

}
