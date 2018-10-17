@extends('layouts.app')
@section('heads')
    <link rel="stylesheet" href="{{asset('templates/default/css/index.css')}}">
    <link href="https://cdn.bootcss.com/Swiper/4.3.0/css/swiper.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/Swiper/4.3.0/js/swiper.min.js"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">
                        文章列表
                    </div>
                    <div class="card-block">
                        <ul class="list-group">
                            @foreach($contents as $content)
                            <a href="/article/home/content/{{$content['id']}}">
                                <li class="list-group-item">{{$content['title']}}</li>
                            </a>
                            @endforeach
                        </ul>
                    </div>
                    <div class="footer">
                        {{$contents->links()}}
                    </div>
                </div>
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
@endsection