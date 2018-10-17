<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\View\FileViewFinder;
use Modules\Article\Entities\Category;
use Modules\Article\Entities\Content;
use Modules\Article\Entities\Slide;
use View;
use App;

class HomeController extends Controller
{
    public function __construct()
    {
        $defaultTemplateName=\HDModule::config('admin.config.defaultTemplateName');
        /*$paths=[public_path('templates/'.$defaultTemplateName)];
        View::setFinder(new FileViewFinder(App::make('files'),$paths));*/
        $finder=app('view')->getFinder();
        $finder->prependLocation(public_path('templates/'.$defaultTemplateName));
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function lists(Category $category)
    {
        $contents=Content::where('category_id',$category->id)->paginate(10);
        return view('lists',compact('category','contents'));
    }

    public function content(Content $content)
    {
        return view('content',compact('content'));
    }
}
