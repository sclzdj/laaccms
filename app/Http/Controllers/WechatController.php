<?php

namespace App\Http\Controllers;

use houdunwang\wechat\WeChat;
use Illuminate\Http\Request;
use Modules\Wechat\Entities\WechatConfig;

class WechatController extends Controller
{
    public function index(WechatConfig $wechat_config)
    {
        $config=array_merge(include base_path('config').'/wechat.php',$wechat_config->pluck('value','name')->toArray());
        dd(WeChat::config($config));
        WeChat::config($config);
    }
}
