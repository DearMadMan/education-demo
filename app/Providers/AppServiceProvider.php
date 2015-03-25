<?php namespace App\Providers;

use App\Config;
use App\User;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{



		$admin=User::find(1);
		$config=Config::find(1);
		$config=json_decode($config->value);

		if(empty($config))
		{
			$config=Config::find(1);
		}
        isset($config->pic_1_a)? '': $config->pic_1_a="";
        isset($config->pic_2_a)? '': $config->pic_2_a="";
        isset($config->pic_3_a)? '': $config->pic_3_a="";
        isset($config->pic_4_a)? '': $config->pic_4_a="";
        isset($config->can_copy)? '': $config->can_copy="";
        isset($config->can_open)? '': $config->can_open="";

		if($config->can_open){

			$ua = strtolower($_SERVER['HTTP_USER_AGENT']);

            $uachar = "/(nokia|Android|sony|ericsson|mot|samsung|sgh|lg|philips|panasonic|alcatel|lenovo|cldc|midp|mobile|iPad|iPhone)/i";

            if(($ua == '' || preg_match($uachar, $ua))&& !strpos(strtolower($_SERVER['REQUEST_URI']),'wap'))
            {

            }
            else{
                die('');
                // 关键性代码
                //die('');  注释掉就可以打开PC端
            }
		}





		View::share('config',$config);
		View::share('admin',$admin);
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

}
