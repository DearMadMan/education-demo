<?php namespace App\Lib;
/**
 * Captcha.php
 * Captcha code
 * 验证码类
 * 验证码宽高接口
 * session命名接口
 * 简单验证or中文验证码
 * 字符数量接口
 * 干扰线个数(水平线 斜线)
 * 干扰点个数接口
 * 格式封装(jpg,gif,png) 默认 jpg
 * $font_name 需要根据页面地址来寻找 比如打开index.php　那么当前路径是index.php
 * 同级目录 调用时字体应该在该目录下
 * 注意:header()前不能有输出
 * 注意：中文字符与英文数字的字节差距 str_split
 */

class Captcha
{
	private static $width=130;
	private static $height=20;
	private static $session_name="Captcha";
	private static $chinese=false;
	private static $char_num=4;
	private static $line_x=4;
	private static $line_y=4;
	private static $pixel=250;
	private static $type="jpg";
	private static $font_name="msyh.ttf";
	private static $font_size=12;
	private static $captcha_string='';
	private static $img=null;
	/**
	 * [GetImage 生成验证码]
	 */
	public static function GetImage()
	{
		self::$type=strtolower(self::$type); //转小写
		$img=imagecreate(self::$width,self::$height) or die("can't found GD Moudle!");

		$bg=imagecolorallocate($img,rand(0,100),rand(0,100),rand(0,100));
		$font_color=(imagecolorallocate($img,255,255,255));

		$str=self::GetString();



		$strinterval=floor(self::$width/self::$char_num);
		$pos_y=abs(floor(self::$height/2)+floor(self::$font_size/2));

		if(self::$chinese)
		{
			$str_arr=str_split($str,3);
		}
		else
		{
			$str_arr=str_split($str);
		}


		$length=mb_strlen($str,"utf-8");
		//输出文字
		for($i=0;$i<$length;$i++)
		{
			$font_color_rand=imagecolorallocate($img, rand(155,255), rand(155,255), rand(155,255));
			imagettftext($img, self::$font_size, rand(0,30), ($strinterval*$i)+3, $pos_y, $font_color_rand,self::$font_name, $str_arr[$i]);
		}


			self::CreateLine($img);
			self::CreatePixel($img);


			self::$img=$img;

	}


	/**
	 *
     */
	public  static function PushImage(){
		self::InsertHeader();

		if(self::$type=="jpg")
		{

			imagejpeg(self::$img);
		}elseif(self::$type=="png")
		{

			imagepng(self::$img);
		}elseif(self::$type=="gif")
		{

			imagegif(self::$img);
		}


		imagedestroy(self::$img);
	}

	/**
	 * 获取验证码字符串
	 * @return string
     */
	public static function GetCaptchaString(){
		return self::$captcha_string;
	}
	public static function CreateLine($img)
	{
		for($i=0;$i<self::$line_x;$i++)
		{
			$font_color=imagecolorallocate($img,rand(0,200), rand(0,155), rand(0,155));
			imageline($img, 0, rand(0,self::$height), self::$width, rand(0,self::$height), $font_color);
		}
		for($i=0;$i<self::$line_y;$i++)
		{
			$font_color=imagecolorallocate($img, rand(0,200), rand(0,155), rand(0,155));
			imageline($img, rand(0,ceil(self::$width/2)), 0, rand(ceil(self::$width/2),self::$width), self::$height, $font_color);
		}
	}

	/**
	 * 加入干扰点
	 * @param $img
     */
	public static function CreatePixel($img)
	{
		for($i=0;$i<self::$pixel;$i++)
		{
			$font_color=imagecolorallocate($img, rand(0,200), rand(0,155), rand(0,155));
			imagesetpixel($img, rand(0,self::$width), rand(0,self::$height), $font_color);
		}
	}
	/**
	 * [GetString 返回字符串并写入session]
	 */
	public static function GetString()
	{
		$str="";
		$chars="";

		if(self::$chinese)
		{

		  $chars="春集丈木研班普导顿睡展跳获艺六波察群皇段急庭创区奥器谢弟店否害草排背止组州朝封睛板角况曲馆育忙质河续哥呼若推境遇雨标姐充围案伦护冷警贝著雪索剧啊船险烟依斗值帮汉慢佛肯闻唱沙局伯族低玩资屋击速顾泪洲团圣旁堂兵七露园牛哭旅街劳型烈姑陈莫鱼异抱宝权鲁简态级票怪寻杀律胜份汽右洋范床舞秘午登楼贵吸责例追较职属渐左录丝牙党继托赶章智冲叶胡吉卖坚喝肉遗救修松临藏担戏善卫药悲敢靠伊村戴词森耳差短祖云规窗散迷油旧适乡架恩投弹铁博雷府压超负勒杂醒洗采毫嘴毕九冰既状乱景席珍童顶派素脱农疑练野按犯拍征坏骨余承置臓彩灯巨琴免环姆暗换技翻束增忍餐洛塞缺忆判欧层付阵玛批岛项狗休懂武革良恶恋委拥娜妙探呀营退摇弄桌熟诺宣银势奖宫忽套康供优课鸟喊降夏困刘罪亡鞋健模败伴守挥鲜财孤枪禁恐伙杰迹妹藸遍盖副坦牌江顺秋萨菜划授归浪听凡预奶雄升碃编典袋莱含盛济蒙棋端腿招释介烧误算义竟确酒需单治卡幸兰念举仅钟怕共毛句息功官待究跟穿室易游程号居考突皮哪费倒价图具刚脑永歌响商礼细专黄块脚味灵改据般破引食仍存众注笔甚某沉血备习校默务土微娘须试怀料调广蜖苏显赛查密议底列富梦错座参八除跑亮假印设线温虽掉京初养香停际致阳纸李纳验助激够严证帝饭忘趣支奇管类未朋且婚台夜青北队久乎越观落尽形影红爸百令周吧识步希亚术留市半热送兴造谈容极随演收首根讲整式取照办强石古华諣拿计您装似足双妻尼转诉米称丽客南领节衣站黑刻统断福城故历惊脸选包紧争另建维绝树系伤示愿持千史谁准联妇纪基买志静阿诗独复痛消社算更拉东神记处让母父应直字场平报友关放至张认接告入笑内英军候民岁往何度山觉路带万男边风解叫任金快原吃妈变通师立象数四失满战远格士音轻目条呢病始达深完今提求清王化空业思切怎非找片罗钱紶吗语元喜曾离飞科言干流欢约各即指合反题必该论交终林请医晚制球决窢传画保读运及则房早院量苦火布品近坐产答星精视五连司巴见明问力理尔点文几定本公特做外孩相西果走将月十实向声车全信重三机工物气每并别真打太新比才便夫再书部水像眼等体却加电主界门利海受听表德少克代员许稜先口由死安写性马光白或住难望教命花结乐色的一是了我不人在他有这个上们来到时大地为子中你说生国年着就那和要她出也得里后自以会家可下而过天去能对小多然于心学么之都好看起发当没成只如事把还用第样道想作种开的一是了我不人在他有这个上们来到时大地为子中你说生国年着就那和要她出也得里后自以会";
		  $char_arr=str_split($chars,3);
		}
		else
		{
			$chars="1234567890abcdefghijklmnopqrstuvwxyz";
			$char_arr=str_split(strtoupper($chars));
		}


			for($i=0;$i<self::$char_num;$i++)
			{
				$str=$str.$char_arr[rand(0,count($char_arr)-1)];
			}
			/*$name=self::$session_name;
			if(!isset($_SESSION))
			{
				die("session not start!");
			}
			$_SESSION["$name"]=$str;*/
		self::$captcha_string=$str;
		return $str;
	}


	/**
	 * [InitFromArray 利用数组的方式初始化静态类]
	 * @param [type] $array [description]
	 */
	public static function InitFromArray($array)
	{

		foreach ($array as $key => $value)
		{

			if(isset(self::$$key))
			{
				//echo "yes<br />";
				self::$$key=$value;
			}
			else
			{

			}

		}


	}

	//如果该页面没echo之类的输出 而且不想手动写header可以使用该方法
	public static  function InsertHeader()
	{

		//self::$type=="jpg"?header("content-type: image/jpeg"):1;
		//self::$type=="png"?header("content-type: image/png"):1;

		switch (strtolower(self::$type)) {
			case 'gif':
				header("Content-type: image/gif;charset=uft-8;");

				break;
			case 'jpg':
				 header("Content-type: image/jpeg;charset=uft-8;");

				break;
			case 'png':
				  header("Content-type: image/png;charset=uft-8;");

				break;
			default:
				# code...
				break;
		}


	}
}
?>