<?php

namespace Modules\Wechat\Entities;

use Illuminate\Database\Eloquent\Model;

class WechatConfig extends Model
{
    protected $fillable = ['name','value'];
}
