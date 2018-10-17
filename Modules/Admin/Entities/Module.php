<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['title','name','is_default','front_access'];

    public function setDefault(){
        $this->update(['is_defaule'=>'0']);
        $this->is_default='1';
        return $this->save();
    }
    public function getDefault(){
        $module=$this->where(['is_default'=>'1','front_access'=>'1'])->first();
        return $module?$module:$this->where(['name'=>'Admin'])->first();
    }
}
