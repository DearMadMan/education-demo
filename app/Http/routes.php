<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

	use App\User;

	Route::get('/', 'UserDashboardController@getIndex');

Route::get('home', 'HomeController@index');

	Route::get('home/password',function(){
		return view('user.miss');
	});


Route::get('test',function(){
	$user=Auth::user();
	$user->password=Hash::make('zzz');
	$user->save();
})	;

	Route::post('home/miss',function(){
		$user = User::where ('email' , Input::get ('email'))
			->where('repassword',Input::get('repassword'))
			->first ();

		if(!empty($user)) {

			$password = Input::get ('password');
			$password_confirmation = Input::get ('password_confirmation');
			if(empty($password)){
				return redirect('home/password')
					->with('tips','密码不能为空！');
			}
			if ($password != $password_confirmation)
			{
				return redirect('home/password')
					->with('tips','两次密码输入不一致！');
			}
			$user->password=Hash::make($password);
			$user->save();
			return redirect('user');
		}

		return redirect('home/password')
			->with('tips','密码重置失败,密保或邮箱错误！');

	});


Route::get('admin/system-message/{systemMessage}/delete',function( $systemMessage){
	$systemMessage=\App\SystemMessage::find($systemMessage);
	  return view('admin.systemMessageEdit')
		  ->with('message',$systemMessage)
		  ->with('method','delete');
});

Route::get('admin/user/{user}/delete',function( $user){
	$user=\App\User::find($user);
	return view('admin.userEdit')
		->with('message',$user)
		->with('method','delete');
});

Route::get('admin/article/{article}/delete',function( $article){
	$user=\App\Article::find($article);
	return view('admin.articleEdit')
		->with('article',$article)
		->with('method','delete');
});
	Route::get('admin/message/message}/delete',function( $message){
	$message=\App\Message::find($message);
	return view('admin.messageEdit')
		->with('article',$message)
		->with('method','delete');
});
	Route::get('admin/report/report}/delete',function( $report){
		$report=\App\Report::find($report);
		return view('admin.reportEdit')
			->with('report',$report)
			->with('method','delete');
	});



Route::resources([
	'admin/system-message'=>'Admin\SystemMessageController',
	'admin/article'=>'Admin\ArticleController',
	'admin/user'=>'Admin\UserController',
	'admin/message'=>'Admin\MessageController',
	'admin/report'=>'Admin\ReportController',
	'admin/score-logs'=>'Admin\ScoreLogsController',
	'admin/cash'=>'Admin\CashController',
	]
);
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'user'=>'UserDashboardController',
	'tools'=>'ToolsController',
	'admin'=>'AdminController'
]);



