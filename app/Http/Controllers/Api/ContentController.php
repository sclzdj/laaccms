<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Transformers\ContentTransformer;
use Illuminate\Http\Request;
use Modules\Article\Entities\Content;

class ContentController extends BaseController
{
    public function contents(){
        return $this->response->paginator(Content::paginate(10),new ContentTransformer());
    }
    
    public function show($id)
    {
        $content=Content::find($id);
        return $this->response->item($content,new ContentTransformer());
    }
}
