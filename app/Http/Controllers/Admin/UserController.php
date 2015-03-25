<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\User;
use App\UserType;
use Hash;
use Input;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct ()
    {
        $this->middleware ('admin');
    }


    public function index ()
    {
        $user = User::simplePaginate (10);

        return view (' admin.userList')
            ->with ('users' , $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create ()
    {
        $user = new User;
        $user->user_type_id = 1;
        $type = UserType::all ()->toArray ();
        $type_list = [];
        foreach ($type as $v) {
            $type_list[ $v['id'] ] = $v['type_name'];
        }

        return view ('admin.userEdit')
            ->with ('user' , $user)
            ->with ('type' , $type_list)
            ->with ('method' , 'post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @param $id
     * @return Response
     */
    public function store (UserRequest $request)
    {
        $user = User::create (Input::all ());
        $user->password=Hash::make('password');
         $user->save ();

        return redirect ('admin/user/' .$user->id)
            ->with ('tips' , "Create New User Success!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show ($id)
    {
        $user = User::find ($id);

        return view ('admin.userSingle')
            ->with ('user' , $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit ($id)
    {
        $user = User::find ($id);
        $type = UserType::all ()->toArray ();
        $type_list = [];
        foreach ($type as $v) {
            $type_list[ $v['id'] ] = $v['type_name'];
        }


        return view ('admin.userEdit')
            ->with ('user' , $user)
            ->with ('type' , $type_list)
            ->with ('method' , 'put');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update (UserUpdateRequest $request , $id)
    {
        $user = User::find ($id);
        $user->nick_name = $request->input ('nick_name');
        $user->user_type_id = $request->input ('user_type_id');
        $user->qq = $request->input ('qq');
        $user->address = $request->input ('address');
        $user->phone = $request->input ('phone');
        $user->wechat = $request->input ('wechat');
        $user->alipay = $request->input ('alipay');
        $user->score = $request->input ('score');
        $password = $request->input ('password');

        $repassword = $request->input ('repassword');
        ! empty($password) ? $user->password = Hash::make ($password) : '';
        ! empty($repassword) ? $user->repassword =  $repassword : '';
        $user->save ();

        return redirect ('admin/user/' . $id)
            ->with ('tips' , 'Update user success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy ($id)
    {
        User::destroy ($id);

        return redirect ('admin/user')
            ->with ('tips' , 'Delete user Success!');

    }

}
