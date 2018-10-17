<?php

namespace App\Http\Controllers;

use App\Notifications\RegisterEmailNotify;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function emailCheckShow(){
        return view('user.email_check_show');
    }
    public function emailSend(){
        $user=auth('web')->user();
        $user->notify(new RegisterEmailNotify($user));
        return back()->with('success','邮箱发送成功');
    }
    public function emailCheck($token){
        $user=User::where('email_token',$token)->first();
        if($user){
            $user->email_status=1;
            $user->save();
            return redirect('/')->with('success','邮箱验证成功');
        }else{
            return redirect('/')->with('danger','未找到对应用户');
        }
    }
}
