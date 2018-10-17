@extends('layouts.app')
@section('heads')
    <link rel="stylesheet" href="{{asset('templates/default/css/index.css')}}">
    <link href="https://cdn.bootcss.com/Swiper/4.3.0/css/swiper.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/Swiper/4.3.0/js/swiper.min.js"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header">
                        置顶文章
                    </div>
                    <div class="card-block">
                        <ul class="list-group">
                            @lists(['is_top'=>1])
                            <a href="{{$item['url']}}">
                                <li class="list-group-item">{{$item['title']}}</li>
                            </a>
                            @endlists
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                @slide(["width"=>"100%","height"=>"300px"])
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header">
                        热门文章
                    </div>
                    <div class="card-block">
                        <ul class="list-group">
                            @lists(['is_hot'=>1])
                            <a href="{{$item['url']}}">
                                <li class="list-group-item">{{$item['title']}}</li>
                            </a>
                            @endlists
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            @category
            <div class="col-sm-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        {{$item['name']}}
                    </div>
                    <div class="card-block">
                        <ul class="list-group">
                            @lists(['category_ids'=>[$item['id']]])
                            <a href="{{$item['url']}}">
                                <li class="list-group-item">{{$item['title']}}</li>
                            </a>
                            @endlists
                        </ul>
                    </div>
                </div>
            </div>
            @endcategory
        </div>
    </div>
@endsection