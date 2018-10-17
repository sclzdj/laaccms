<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/11
 * Time: 21:23
 */

namespace Modules\Admin\Services;


use Modules\Admin\Entities\Module;

class ModuleService
{
    public function updateCache(){
        \DB::table('modules')->truncate();
        $modules=\HDModule::getModulesLists();
        foreach ($modules as $module){
            $data=[
                'title'=>$module['title'],
                'name'=>$module['name'],
                'is_default'=>'0',
                'front_access'=>$this->front_access($module)
            ];
            Module::create($data);
        }
        return true;
    }
    protected function front_access($module){
        $class="Modules\\".$module['name']."\Http\Controllers\HomeController";
        return class_exists($class) && method_exists($class,'index');
    }
}