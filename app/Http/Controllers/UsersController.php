<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{

    //用户授权
    public function __construct(){

        $this->middleware();
    }

    //个人首页
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    //编辑资料页面
    public function edit(User $user){
        return view('users.edit',compact('user'));
    }

    //更新用户信息
    public function update(Request $request,User $user){
        $user->update($request->all());
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}
