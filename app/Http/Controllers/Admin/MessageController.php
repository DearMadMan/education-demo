<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Message;
use App\SystemMessage;
use App\User;
use Illuminate\Http\Request;
use Input;

class MessageController extends Controller
{

    public function __construct ()
    {
        $this->middleware ('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index ()
    {
        $messages = Message::orderBy('created_at','desc')
        ->simplePaginate (10);

        return view ('admin.messageList')
            ->with ('messages' , $messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create ()
    {
        //

        $message = new Message;

        return view ('admin.messageEdit')
            ->with ('message' , $message)
            ->with ('method' , 'post');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store ()
    {
        $message = new Message;
        $message->title = Input::get ('title');
        $message->content = Input::get ('content');
        $message->reply = Input::get ('reply');
        $message->is_show = Input::get ('is_show');
        $id = $message->save ();

        return redirect ('admin/message/' . $id)
            ->with ('tips' , "create new message success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show ($id)
    {
        $message = Message::find ($id);

        return view ('admin.messageSingle')
            ->with('message',$message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit ($id)
    {
        $message = Message::find ($id);

        return view ('admin.messageEdit' )
            ->with('message', $message)
            ->with ('method' , 'put');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update ($id)
    {
        $message = Message::find ($id);
      //  $message->title = Input::get ('title');
        $message->content = Input::get ('content');
        $message->reply = Input::get ('reply');
        $message->is_show = Input::get ('is_show');
        $message->award=Input::get('award');


        if( $message->award!=0 && $message->is_show==1)
        {
            $user=User::find($message->user_id);
            $user->score+=$message->award;
            $user->save();

            $systemMessage=New SystemMessage();
            $systemMessage->user_id=$user->id;
            $systemMessage->title="分享奖励: +".$message->award;
            $systemMessage->content="亲的分享已经通过审核，感谢亲的分享。期待亲的再次分享。";
            $systemMessage->save();
        }

        $message->save ();

        return redirect ('admin/message/' . $id)
            ->with ('tips' , 'Update message success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy ($id)
    {
        Message::destroy ($id);

        return redirect ('admin/message')
            ->with ('tips' , 'Delete message Success');
    }

}
