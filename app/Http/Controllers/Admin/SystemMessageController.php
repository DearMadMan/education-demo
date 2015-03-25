<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SystemMessage;
use Illuminate\Http\Request;
use Input;

class SystemMessageController extends Controller {

	public function __construct(){
		$this->middleware('admin');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$systemMessages=SystemMessage::orderBy('created_at','desc')
			->simplePaginate(10);
		return view('admin.systemMessage')
			->with('messages',$systemMessages)
			->with('list',1);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$message=new SystemMessage;
		return view('admin.systemMessageEdit')
			->with('message',$message)
			->with('method','post');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$msg=SystemMessage::create(Input::all());
		$id=$msg->save();
		return redirect('admin/system-message')
			->with('tips','Create new message success!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$msg=SystemMessage::find($id);
		return view('admin.systemMessageSingle')
			->with('message',$msg);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$msg=SystemMessage::find($id);
		return view('admin.systemMessageEdit')
			->with('message',$msg)
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
		$msg=SystemMessage::find($id);
		$msg->title=Input::get('title');
		$msg->content=Input::get('content');
		$msg->save();
		return redirect('admin/system-message')
			->with('tips','Update message success!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		SystemMessage::destroy($id);
		return redirect('admin/system-message')
			->with('tips',"Delete message success!");
	}

}
