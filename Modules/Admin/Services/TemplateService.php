<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/12
 * Time: 0:12
 */

namespace Modules\Admin\Services;


class TemplateService
{
    public function all(){
        $dirs=glob(public_path('templates/*'));
        $configs=[];
        foreach ($dirs as $dir){
            $configs[]=$this->parseConfig($dir);
        }
        return $configs;
    }
    protected function parseConfig($dir){
        $file=$dir.'/package.json';
        if(is_file($file)){
            $config=file_get_contents($file);
            $config=json_decode($config);
            if(is_object($config)){
                $config=(array)$config;
                $name=basename($dir);
                $config['preview']=url('templates/'.$name.'/'.$config['preview']);
                $config['name']=$name;
                return $config;
            }
        }
    }
}