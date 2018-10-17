<?php

namespace Modules\Article\Entities;

use houdunwang\arr\Arr;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','pid'];

    //树形结构
    public function getAllTree($category=null){
        $categories=$this->get()->toArray();
        if(!is_null($category)){
            foreach ($categories as $k=>$v){
                $categories[$k]['_selected']=$v['id']==$category['pid'];
                $categories[$k]['_disabled']=$v['id']==$category['id'] || Arr::isChild($categories,$v['id'],$category['id'],'id');
            }
        }
        return Arr::tree($categories,'name','id');
    }
    //是否有子栏目
    public function hasChild(){
        $categories=$this->get()->toArray();
        return Arr::hasChild($categories, $this->id);
    }
}
