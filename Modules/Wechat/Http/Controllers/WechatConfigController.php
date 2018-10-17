<?php
namespace Modules\Wechat\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Wechat\Entities\WechatConfig;
use Modules\Wechat\Http\Requests\WechatConfigRequest;
class WechatConfigController extends Controller
{
    //显示列表
    public function index(WechatConfig $wechat_config)
    {
        $wechat_config = $wechat_config->pluck('value','name');
        return view('wechat::wechat_config.index', compact('wechat_config'));
    }

    //保存数据
    public function store(WechatConfigRequest $request,WechatConfig $wechat_config)
    {
        $wechat_config->truncate();
        foreach ($request->all() as $name=>$value){
            $wechat_config->create(['name'=>$name,'value'=>$value]);
        }
        return redirect('/wechat/wechat_config')->with('success', '保存成功');
    }

}
