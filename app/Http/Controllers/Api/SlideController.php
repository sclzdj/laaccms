<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Transformers\SlideTransformer;
use Illuminate\Http\Request;
use Modules\Article\Entities\Slide;

class SlideController extends BaseController
{
    public function slides(){
        $limit=request()->query('limit',3);
        return $this->response->collection(Slide::where('status','1')->limit($limit)->get(),new SlideTransformer());
    }
}
