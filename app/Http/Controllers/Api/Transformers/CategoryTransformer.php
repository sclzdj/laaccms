<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/21
 * Time: 15:31
 */

namespace App\Http\Controllers\Api\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Article\Entities\Category;

class CategoryTransformer extends TransformerAbstract
{
    public function transform(Category $category)
    {
        return [
            'id'=>$category->id,
            'name'=>$category->name,
        ];
    }
}