<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Lib\Captcha;
class ToolsController extends Controller {

	//
    public function getCaptchaImage(Captcha $captcha){

        $captcha->InitFromArray(['width'=>200,'height'=>50,'char_num'=>6,'piexl'=>200]);

        $captcha->GetImage();

        Session::put('captcha',$captcha->GetCaptchaString());
        Session::save();

        return $captcha->PushImage()->header('content-Type','image/jpeg');
    }

    public function getCaptchaString(){


        return session('captcha');
    }

}
