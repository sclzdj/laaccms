<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\Category;
use Modules\Article\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Category $category)
    {
        $categories=$category->getAllTree();
        return view('article::category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Category $category)
    {
        $categories=$category->getAllTree();
        return view('article::category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CategoryRequest $request,Category $category)
    {
        $category->fill($request->all());
        $category->save();
        return redirect('/article/category')->with('success','添加栏目成功');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Category $category)
    {
        $categories=$category->getAllTree($category);
        return view('article::category.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(CategoryRequest $request,Category $category)
    {
        $category->update($request->all());
        return redirect('/article/category')->with('success','编辑栏目成功');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Category $category)
    {
        if($category->hasChild()){
            return back()->with('danger','请先删除子栏目');
        }else{
            $category->delete();
            return redirect('/article/category')->with('success','删除栏目成功');
        }

    }
}
