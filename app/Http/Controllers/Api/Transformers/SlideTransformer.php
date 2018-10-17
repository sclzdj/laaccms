<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/21
 * Time: 16:00
 */

namespace App\Http\Controllers\Api\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Article\Entities\Slide;

class SlideTransformer extends  TransformerAbstract
{
    public function transform(Slide $slide)
    {
        return [
            'id'=>$slide->id,
            'title'=>$slide->title,
            'url'=>$slide->url,
            'pic'=>$slide->pic,
        ];
    }
}