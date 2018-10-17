<div class="left-sidebar-scroll">
    <div class="left-sidebar-content">
        <ul class="sidebar-elements">
            {{--@foreach(app('hd-menu')->all() as $moduleName => $groups)
                <li class="divider">{{$moduleName}}</li>
                @foreach($groups as $modules)
                    @if(\HDModule::hadPermission($modules['permission'],'admin'))
                        <li class="parent">
                            <a href="#"><i class="icon {{$modules['icon']}}"></i><span>{{$modules['title']}}</span></a>
                            <ul class="sub-menu">
                                @foreach($modules['menus'] as $item)
                                    @if(\HDModule::hadPermission($item['permission'],'admin'))
                                        <li>
                                            <a href="{{$item['url']}}" pjax>{{$item['title']}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            @endforeach--}}
            @foreach(\HDModule::getMenuByModule() as $modules)
                @if(\HDModule::hadPermission($modules['permission'],'admin'))
                    <li class="parent" id="menu_left_{{$modules['title']}}">
                        <a href="#"><i class="icon {{$modules['icon']}}"></i><span>{{$modules['title']}}</span></a>
                        <ul class="sub-menu">
                            @foreach($modules['menus'] as $item)
                                @if(\HDModule::hadPermission($item['permission'],'admin'))
                                    <li>
                                        <a href="{{$item['url']}}" pjax>{{$item['title']}}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach


            <li class="divider">技术支持</li>
            <li class="parent"><a href="#"><i class="icon mdi mdi-view-web"></i><span>支持</span></a>
                <ul class="sub-menu">
                    <li>
                        <a href="layouts-primary-header.html">视频教程</a>
                    </li>
                    <li>
                        <a href="layouts-success-header.html">访问官网</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

