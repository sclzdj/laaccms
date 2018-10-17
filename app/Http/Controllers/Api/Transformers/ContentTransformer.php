<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/21
 * Time: 15:10
 */

namespace App\Http\Controllers\Api\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Article\Entities\Content;

class ContentTransformer extends TransformerAbstract
{
    protected $availableIncludes=['category'];
    public function transform(Content $content){
        return [
            'id'=>$content->id,
            'title'=>$content->title,
            'author'=>$content->author,
            'thumb'=>$content->thumb,
            'created_at'=>$content->created_at->toDateTimeString(),
        ];
    }
    public function includeCategory(Content $content){
        return $this->item($content->category,new CategoryTransformer());
    }
}