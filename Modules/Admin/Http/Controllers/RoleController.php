<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $roles=Role::where('name','<>',config('hd_module.webmaster'))->OrderBy('id','ASC')->paginate(20);
        return view('admin::role.index',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create(['name' => $request->name,'title'=>$request->title]);
        session()->flash('success','添加角色成功');
        return back();
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(RoleRequest $request,Role $role)
    {
        $role->update(['name' => $request->name,'title'=>$request->title]);
        session()->flash('success','编辑角色成功');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect('/admin/role')->with('success','删除角色成功');
    }
    public function permission(Role $role){
        $modules=\HDModule::getPermissionByGuard('admin');//dd($modules);
        return view('admin::role.permission',compact('role','modules'));
    }
    public function permissionStore(Request $request,Role $role){
        $role->syncPermissions($request->name?$request->name:[]);
        session()->flash('success','配置角色权限成功');
        return back();
    }
}
