<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Services\TemplateService;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(TemplateService $service)
    {
        $templates=$service->all();
        return view('admin::template.index',compact('templates'));
    }
    public function set($name)
    {
        \HDModule::saveConfig(['defaultTemplateName'=>$name],  'config');
        return back()->with('success','设置成功');
    }

}
