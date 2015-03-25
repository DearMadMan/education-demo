<?php namespace App\Http\Controllers\Admin;

use App\Article;
use App\ArticleType;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Input;
use Illuminate\Http\Request;

class ArticleController extends Controller {

	public function __construct()
	{
	    $this->middleware('admin');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$articles=Article::Orderby('created_at','desc')->simplepaginate(15);
		return view('admin.articleList')
			->with('types',0)
			->with('articles',$articles);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$article=new Article;
		$types=ArticleType::all()->toArray();
		$type_list=[];

		foreach ($types as $v) {
			$type_list[$v['id']]=$v['type_name'];
		}


		return view('admin.articleEdit')
			->with('article',$article)
			->with('type_list',$type_list)
			->with('method','post');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$article=new Article;
		$article->title=Input::get('title');
		$article->content=Input::get('content');
		$article->article_type_id=Input::get('article_type_id');
		$article->save();
		return redirect('admin/article/'.$article->id)
			->with('tips','Create article success !');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$article=Article::find($id);
		return view('admin.articleSingle')
			->with('is_type',0)
			->with('article',$article);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$article=Article::find($id);
		$types=ArticleType::all()->toArray();
		$type_list=[];
		foreach($types as $v)
		{
			$type_list[$v['id']]=$v['type_name'];
		}
		return view('admin.articleEdit')
			->with('article',$article)
			->with('type_list',$type_list)
			->with('method','put');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$article=Article::find($id);
		$article->title=Input::get('title');
		$article->content=Input::get('content');
		$article->article_type_id=Input::get('article_type_id');
		$article->save();
		return redirect('admin/article/'.$id)
			->with('tips','Update articles success!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Article::destroy($id);
		return redirect('admin/article')
			->with('tips','Delete article success');
	}

}
