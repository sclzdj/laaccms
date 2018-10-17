<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Transformers\CategoryTransformer;
use Illuminate\Http\Request;
use Modules\Article\Entities\Category;

class CategoryController extends BaseController
{
    public function categories(){
        return $this->response->collection(Category::where('pid',0)->get(),new CategoryTransformer());
    }
}
